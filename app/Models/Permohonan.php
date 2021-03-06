<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Notifications\Notifiable;

class Permohonan extends Model implements Auditable
{
    use HasFactory;
    use Notifiable;
    use \OwenIt\Auditing\Auditable;


    protected $fillable = [

        'reference_number',          //displayed id

        'rumah_ibadat_id',          //rumah ibadat id
        'user_id',                  //user id

        //remarks permohonan
        'status',                   //(0-Semak Semula)(1-Sedang Diproses)(2-Lulus)(3-Tidak Lulus)(4-Batal)
        'batch',                    //1 Batch can have 10 permohonan & batch start after...

        //before permohonan
        'application_letter',               //attachment
        'registration_certificate',         //attachment
        'account_statement',                //attachment

        'spending_statement',               //attachment
        'support_letter',                   //attachment
        'committee_member',                 //attachment
        'certificate_or_letter_temple',     //attachment
        'invitation_letter',                //attachment

        'review_to_applicant_id',           //to identify user who give this status "Semak Semula"
        'review_to_applicant',

        'not_approved_id',                  //to identify user who give this status "Tidak Lullus"

        'exco_id',                          //flag_exco
        'exco_date_time',                   //date-time
        'review_exco',


        'yb_id',                            //flag_yb
        'yb_date_time',                     //date-time
        'review_yb',
        'payment_method',                   //(1-Check)(2-EFT)
        'total_fund',                       //total fund apporved
        'surat_kelulusan',                  //attachment

        'upen_id',                          //flag_upen
        'upen_date_time',                   //date-time
    ];

    public function getPermohonanID()
    {
        $rumah_ibadat = RumahIbadat::where('id', $this->rumah_ibadat_id)->first();

        if($rumah_ibadat->category == "TOKONG"){

            return sprintf('T%06d', $this->reference_number);

        }elseif($rumah_ibadat->category == "KUIL" ){

            return sprintf('K%06d', $this->reference_number);

        }elseif($rumah_ibadat->category == "GURDWARA"){

            return sprintf('G%06d', $this->reference_number);

        }elseif ($rumah_ibadat->category == "GEREJA") {

            return sprintf('C%06d', $this->reference_number);
        }
    }

    public function user()
    {
        return $this->belongsTo('\App\Models\User', 'user_id');
    }

    public function rumah_ibadat()
    {
        return $this->belongsTo('\App\Models\RumahIbadat', 'rumah_ibadat_id');
    }

    public function tujuan()
    {
        return $this->hasMany('App\Models\Tujuan');
    }
}
