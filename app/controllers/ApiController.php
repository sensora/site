<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ApiController extends BaseController
{
    protected $user;
    protected $sensor;
    protected $apikey;
    protected $data;

    public function __construct(User $user, Sensor $sensor, ApiKey $apikey, Data $data)
    {
        parent::__construct();

        $this->sensor   = $sensor;
        $this->user     = $user;
        $this->apikey   = $apikey;
        $this->data     = $data;

        $this->beforeFilter('@checkValidSensor', ['only' => ['sensorUpload']]);
        $this->beforeFilter('@checkApiKey', ['only' => ['sensorInfo', 'locateSensors']]);
    }

    public function checkValidSensor($route, $request)
    {
        $apiKey     = Input::get('api_key');
        $sensorId   = Input::get('sensor_id');

        try {
            $sensor = $this->sensor->where('uuid', '=', $sensorId)->firstOrFail();
        }catch(ModelNotFoundException $e) {
            return Response::json(array(
                'success'   =>  false,
                'error'     =>  array(
                    'message'   =>  'Sensor not found.'
                ),
            ))->setCallback(Input::get('callback'));
        }

        if ( ! $sensor->user->apikey || $sensor->user->apikey->key != $apiKey ) {
            return Response::json(array(
                'success'   =>  false,
                'error'     =>  array(
                    'message'   =>  'Wrong API key.'
                ),
            ))->setCallback(Input::get('callback'));
        }
    }

    public function checkApiKey($route, $request)
    {
        $apiKey     = Input::get('api_key');

        try {
            $key = $this->apikey->where('key', '=', $apiKey)->firstOrFail();
        }catch(ModelNotFoundException $e) {
            return Response::json(array(
                'success'   =>  false,
                'error'     =>  array(
                    'message'   =>  'API Key not found.'
                ),
            ))->setCallback(Input::get('callback'));
        }

        // if ( $key->user->apicalls <= 0 ) {
        //     // TODO:
        // }
    }

    public function sensorUpload()
    {
        $sensorId   = Input::get('sensor_id');

        try {
            $sensor = $this->sensor->where('uuid', '=', $sensorId)->firstOrFail();
        }catch(ModelNotFoundException $e) {
            return Response::json(array(
                'success'   =>  false,
                'error'     =>  array(
                    'message'   =>  'Sensor not found.'
                ),
            ))->setCallback(Input::get('callback'));
        }

        $rawPostData = file_get_contents("php://input");

        $data = json_decode($rawPostData);

        foreach ($data->data as $row) {
            $dataRaw = [
                'sensor_id'     =>  $sensor->id,
                'temperature'   =>  isset($row->temperature) ? $row->temperature : null,
                'moisture'      =>  isset($row->moisture) ? $row->moisture : null,
                'pressure'      =>  isset($row->pressure) ? $row->pressure : null,
                'noise'         =>  isset($row->noise) ? $row->noise : null,
                'light'         =>  isset($row->light) ? $row->light : null,
            ];

            if ( isset($row->created_at) ) {
                $dataRaw['created_at'] =    $row->created_at;
            }

            $this->data->create($dataRaw);
        }

        return Response::json([
            'success'   =>  true,
        ])->setCallback(Input::get('callback'));
    }

    public function sensorInfo($uuid = null)
    {
        $uuids = explode(',', $uuid);
        $uuids = array_map('trim', $uuids);

        $sensors = $this->sensor->whereIn('uuid', $uuids)->get();

        return Response::json($sensors->toArray())
                ->setCallback(Input::get('callback'));
    }

    public function sensorData($uuid, $from = null, $to = null)
    {
        $result = $this->sensor->with('data')->where('uuid', '=', $uuid)->get();

        return Response::json($result)
                ->setCallback(Input::get('callback'));
    }

    public function locateSensors($latitude = null, $longitude = null, $areasize = '5')
    {
        $sensors = $this->sensor->near($latitude, $longitude, $areasize);

        // $response = [];
        // foreach ($sensors as $sensor) {
        //     $sensor->data = $this->data->where('sensor_id', '=', $sensor->id)->get();

        //     $response[] = $sensor;
        // }

        return Response::json($sensors)
                ->setCallback(Input::get('callback'));
    }
}