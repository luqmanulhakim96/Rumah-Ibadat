<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Notifications\Notifiable;


class UserRole extends Model implements Auditable
{
    use HasFactory, Notifiable;
    use \OwenIt\Auditing\Auditable;


    protected $fillable = [

        'user_id',//user id

        'tokong', //cina
        'kuil', //hindu
        'gurdwara', //gurdwara
        'gereja',//kristian
    ];

    public function user()
    {
        return $this->belongsTo('\App\Models\User', 'user_id');
    }
}
