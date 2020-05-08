<?php
namespace Tests\Unit;

use Tests\TestCase;
use GuzzleHttp\Psr7\Response;
use App\Parsers\Parser;
use Illuminate\Support\Facades\File;
use Mockery;
use GuzzleHttp\Client;

class ParserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */



    public function testBasicTest()
    {

       $path = storage_path("testing/parser.json") ;

        $json = file_get_contents($path);

        $parsedData = json_decode($json);
        $objects = [];
        foreach($parsedData as $item){
            if(isset($item->data)){
                if(isset($item->data->attrs)){
                    $object = $item->data->attrs;
                    array_push($objects, $object);

                }
            }

        }
        $this->assertCount(
            2,
            $objects, "json parsed and contains 2 element"
        );

    }
}
