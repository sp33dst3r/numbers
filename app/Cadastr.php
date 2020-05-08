<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cadastr extends Model
{
    //
    protected $table = "cadastr";
    protected $fillable = [
        'cn', 'address', 'cad_cost', "area_value"
    ];
}
