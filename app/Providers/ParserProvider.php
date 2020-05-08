<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Parsers\Parser;

class ParserProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(Parser::class, function(){
            return new Parser();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
