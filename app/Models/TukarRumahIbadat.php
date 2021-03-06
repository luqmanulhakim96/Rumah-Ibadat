<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class TukarRumahIbadat extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [

        'user_id',                  //user id

        'reference_number',
        'status',                   //(0-Tidak Lulus)(1-Sedang Diproses)(2-Lulus)

        'category',                 //(Gereja (Kristian))(Tokong (Budha & Tao))(Kuil (Hindu & Gurdwara))
        'rumah_ibadat_id',

        'comment',
        'supported_document',
    ];

    public function getPermohonanID()
    {
        return sprintf('X-%06d', $this->reference_number);
    }

    public function user()
    {
        return $this->belongsTo('\App\Models\User', 'user_id');
    }

}
