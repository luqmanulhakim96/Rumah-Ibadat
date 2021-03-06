<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Peruntukan extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;


    protected $fillable = [

        'total_fund',
        'current_fund',
        'balance_fund',

        'total_tokong',
        'current_tokong',
        'balance_tokong',

        'total_kuil',
        'current_kuil',
        'balance_kuil',

        'total_gurdwara',
        'current_gurdwara',
        'balance_gurdwara',

        'total_gereja',
        'current_gereja',
        'balance_gereja',
    ];
}
