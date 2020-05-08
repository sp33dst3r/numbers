<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Cadastr;
use App\Parsers\Parser;

class CadastrController extends Controller
{
    private $parser;
    public function __construct( Parser $parser) {
        $this->parser = $parser;
    }

    public function getData(Request $request){
        $numbers = $request->input('numbers');

        if($numbers){
            $numbers = explode(',', $numbers);

                $data = $this->parser->getNumbers($numbers);


            $items = $this->parser->parseData($data);
            foreach($items as $item){
                Cadastr::updateOrCreate(
                    [
                        'cn' => $item->cn,
                        'address' => $item->address,
                        'area_value' => $item->area_value,
                        'cad_cost' => $item->cad_cost,
                    ]
                );
            }

        }


        return Cadastr::all(["cn", "address", "cad_cost", "area_value"]);


    }
}
