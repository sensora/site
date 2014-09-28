<?php
class PaypalPaymentController extends BaseController
{
    protected $paypalPayment;
    private $_apiContext;
    private $_paymentId;

    public function __construct(Payment $paypalPayment)
    {
        parent::__construct();

        $this->_apiContext = Paypalpayment:: ApiContext(
            Paypalpayment::OAuthTokenCredential(
                $_ENV['PAYPAL_ID'],
                $_ENV['PAYPAL_SECRET']
            )
        );

        $this->_apiContext->setConfig(array(
            'mode' => 'live',
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => __DIR__.'/../PayPal.log',
            'log.LogLevel' => 'FINE'
        ));

        $this->paypalPayment = $paypalPayment;
    }

    public function create()
    {
        $payer = Paypalpayment::Payer();
        $payer->setPayment_method("paypal");

        $item = Paypalpayment::Item();
        $item->setName('API credits');
        $item->setSKU($this->currentUser->id);
        $item->setQuantity('1');
        $item->setCurrency('MXN');
        $item->setPrice("10.00");

        $itemList = Paypalpayment::ItemList();
        $itemList->setItems(array($item));

        $amount = Paypalpayment:: Amount();
        $amount->setCurrency("MXN");
        $amount->setTotal("10.00");

        $transaction = Paypalpayment:: Transaction();
        $transaction->setItemList($itemList);
        $transaction->setAmount($amount);
        $transaction->setDescription("Credits for sensora.net API");
        $redirectUrls = Paypalpayment:: RedirectUrls();
        $redirectUrls->setReturn_url( url('payments/confirmpayment') );
        $redirectUrls->setCancel_url( url('payments/cancelpayment') );

        $payment = Paypalpayment:: Payment();
        $payment->setIntent("sale");
        $payment->setPayer($payer);
        $payment->setRedirectUrls($redirectUrls);
        $payment->setTransactions(array($transaction));

        $response = $payment->create($this->_apiContext);

        //set the trasaction id , make sure $_paymentId var is set within your class
        $this->_paymentId = $response->id;
        Session::put('_paymentId',  $response->id);

        //dump the repose data when create the payment
        $redirectUrl = $response->links[1]->href;
        return Redirect::to( $redirectUrl );
    }

    /*
    Use this call to get a list of payments.
    url:payment/
    */



    public function index()
    {
        $payments = $this->currentUser->payments()->paginate(15);
        return View::make('payments.index', compact('payments'));
    }

    /*
        Use this call to get details about payments that have not completed,
        such as payments that are created and approved, or if a payment has failed.
        url:payment/PAY-3B7201824D767003LKHZSVOA
    */

    public function show($payment_id)
    {
       $payment = Paypalpayment::get($payment_id,$this->_apiContext);

       echo "<pre>";

       print_r($payment);
    }

    public function getConfirmpayment()
    {
        $payer_id = Input::get('PayerID');
        $payment_id = Session::get('_paymentId');
        $payment = Paypalpayment::get($payment_id, $this->_apiContext);

        $paymentExecution = Paypalpayment::PaymentExecution();
        $paymentExecution->setPayer_id( $payer_id );

        $executePayment = $payment->execute($paymentExecution, $this->_apiContext);
        $resultArray = $executePayment->toArray();
        $pay_id = $resultArray['id'];

        $this->paypalPayment->user_id = $this->currentUser->id;
        $this->paypalPayment->payment_id = $pay_id;

        if ( ! $this->paypalPayment->save() ) {
            return Redirect::route('payments.index')
                    ->withInput()
                    ->withErrors( $this->paypalPayment->getErrors() );
        }
        Mail::send('emails.payment', array('pay_id' => $pay_id), function($message)
        {
            $message->to($this->currentUser->email, $this->currentUser->name)->subject('Payment reciept from Sensora');
        });

        return Redirect::route('payments.index')
                ->withSuccess('Thanks for your support. You are making the world a better place :D');

    }
    public function getCancelpayment()
    {
         return Redirect::route('payments.index')
                    ->withInput()
                    ->withErrors('Order cancelled. Do not worry we are still cool :)');
    }
}