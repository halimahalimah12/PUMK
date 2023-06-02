<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PengajuanLunasSendingEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $pengajuan1;
    public function __construct($pengajuan1)
    {
        $this->pengajuan = $pengajuan1;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('example@example.com', 'PUMK')
                    ->subject('Pengajuan Lunas.')
                    ->view('emails.PengajuanLunas-mail');
    }
}
