<?php

namespace App\Mail\Permohonan;

use App\Models\RumahIbadat;
use App\Models\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SemakSemulaMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($permohonan)
    {
        $this->permohonan = $permohonan;
        $this->rumah_ibadat = RumahIbadat::findorfail($permohonan->rumah_ibadat_id);
        $this->user = User::findOrFail($this->permohonan->user_id);

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $permohonan = $this->permohonan;
        $rumah_ibadat = $this->rumah_ibadat;
        $user = $this->user;

        return $this->to($user->email, $user->name)
            ->from(env('MAIL_FROM_ADDRESS'))
            ->subject('Semakan Semula Permohonan ' . $this->permohonan->getPermohonanID())
            ->view('email.permohonan-semak-semula', compact('permohonan', 'rumah_ibadat', 'user'));
    }
}