<?php

class PaypalPaymentController extends BaseController {

    /**
     * object to authenticate the call.
     * @param object $_apiContext
     */
    private $_apiContext;
    private $_paymentId;

    /**
     * Set the ClientId and the ClientSecret.
     * @param 
     *string $_ClientId
     *string $_ClientSecret
     */

    /*
     *   These construct set the SDK configuration dynamiclly, 
     *   If you want to pick your configuration from the sdk_config.ini file
     *   make sure to update you configuration there then grape the credentials using this code :
     *   $this->_cred= Paypalpayment::OAuthTokenCredential();
    */
    public function __construct()
    {
        // ### Api Context
        // Pass in a `ApiContext` object to authenticate 
        // the call. You can also send a unique request id 
        // (that ensures idempotency). The SDK generates
        // a request id if you do not pass one explicitly. 

        $this->_apiContext = Paypalpayment:: ApiContext(
            Paypalpayment::OAuthTokenCredential(
                $_ENV['PAYPAL_ID'],
                $_ENV['PAYPAL_SECRET']
            )
        );

        // dynamic configuration instead of using sdk_config.ini

        $this->_apiContext->setConfig(array(
            'mode' => 'sandbox',
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => __DIR__.'/../PayPal.log',
            'log.LogLevel' => 'FINE'
        ));

    }

    /*
     * Create payment using credit card
     * url:payment/create
    */
    public function create()
    {
       
        $payer = Paypalpayment::Payer();
        $payer->setPayment_method("paypal");

        $item = Paypalpayment::Item();
        $item->setName('API credits');
        $item->setSKU('12345');
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
        $baseUrl = Request::root();
        $redirectUrls = Paypalpayment:: RedirectUrls();
        $redirectUrls->setReturn_url($baseUrl.'/payment/confirmpayment');
        $redirectUrls->setCancel_url($baseUrl.'/payment/cancelpayment');

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

        //this is will take you to complete your payment on paypal
        //when you confirm your payment it will redirect you back to the rturned url set above
        //inmycase sitename/payment/confirmpayment this will execute the getConfirmpayment function bellow
        //the return url will content a PayerID var
        return Redirect::to( $redirectUrl );
    }

    /*
    Use this call to get a list of payments. 
    url:payment/
    */



    public function index()
    {
        echo "<pre>";

        $payments = Paypalpayment::all(array('count' => 1, 'start_index' => 0),$this->_apiContext);

        print_r($payments);
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
        $pago = $executePayment->toArray();
        dd($pago['transactions'][0]['item_list']['items'][0]);

        //check your response and whatever you want with the response
        //....
    }
    public function getCancelpayment()
    {
        return 'Display the view that you want to show if  user cancel';
    }
    

}