<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Symfony\Component\Console\Input\InputOption;
use Illuminate\Http\Request;
use App\Http\Controllers\CadastrController;
class CallRoute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $data;
    protected $name = 'route:call';

    protected $signature = 'route:call {uri} {numbers}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Call route from CLI';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CadastrController $data)
    {
        parent::__construct();
        $this->data = $data;

    }



    public function handle(Request $request)
    {

       // var_dump($request); die();
        $arguments = $this->argument();
        if($arguments["numbers"]) $request->merge(['numbers' => $arguments["numbers"]]);

        $headers = ['CN', 'Адрес', 'Стоимость', 'Площадь'];
        $cadastrs = $this->data->getData($request);

        $items = $cadastrs->toArray();

        $this->table($headers, $items);
    }

}
