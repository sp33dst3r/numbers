<?php

namespace App\Parsers;
use GuzzleHttp\Client;

class Parser{
    public $service = 'http://pkk.bigland.ru/api/test/plots';

    public function getNumbers($numbers){

        $client = new Client();
        $response = $client->request('GET', $this->service, [
            'json' => ['collection' => array("plots" => array_map('trim', $numbers))]
        ]);
        return $response->getBody();

     }

    public function parseData($data){
        $parsedData = json_decode($data->getContents());
        $objects = [];
        foreach($parsedData as $item){
            if(isset($item->data)){
                if(isset($item->data->attrs)){
                    $object = $item->data->attrs;
                    array_push($objects, $object);

                }
            }

        }
        return $objects;
    }

}
