<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class WebController extends Controller
{
    //
    public $data;

    public function __construct(CadastrController $data)
    {
        // DI setting
        $this->data = $data;
    }

    public function getWeb(Request $request){
        try{
            $cadastrs = $this->data->getData($request);
            return view('welcome', [ "cadastrs" => $cadastrs]);
        }catch(\Exception $e){

            return redirect('/')->with('error', 'oops. something\'s wrong');

        }


    }

}
