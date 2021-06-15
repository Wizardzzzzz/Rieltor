<?php
namespace App\Services;
use GuzzleHttp\Client;
class Geocoding{
    private $key = "83dc628c563625f7bd82cc5349c4212f";
    public function getCoordinate($adress,$city){
        $client = new Client();
        $res = $client->request('GET',"http://api.positionstack.com/v1/forward?access_key=".$this->key."&query=".$adress);

        return json_decode($res->getBody(),true);
    }
}
