<?php

namespace App\Parsers;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use Psr\Http\Message\RequestInterface;
use Redirect;
class Parser{
    public $service = 'http://pkk.bigland.ru/api/test/plots';
    public function getNumbers($numbers){
        // $stack = HandlerStack::create();
         // my middleware
         /* $stack->push(Middleware::mapRequest(function (RequestInterface $request) {
             $contentsRequest = (string) $request->getBody();
             echo "<pre>", print_r($contentsRequest), "</pre>";

             return $request;
         })); */


          /* $stack->push(function (callable $handler) {
             return function (RequestInterface $request, array $options) use ($handler) {
                 return $handler($request, $options)->then(
                     function ($response) use ($request) {
                         // work here
                         $contentsRequest = (string) $request->getBody();
                       //  echo "<pre>", print_r($contentsRequest), "</pre>";
                         return $response;
                     }
                 );
             };
         }); */

        $client = new Client();

        $response = $client->request('GET', $this->service, [
            'json' => ['collection' => array("plots" => array_map('trim', $numbers))] // or 'json' => [...]
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
