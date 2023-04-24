<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Channels\MailChannel;
use App\Models\Pembayaran;

class PembayaranNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $pembayaran;
    public function __construct($pembayaran)
    {
        $this->pembayaran = $pembayaran;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray( $notifiable)
    {
        return [
            'kartu_piutang_id' => $this->pembayaran->kartu_piutang_id,
            'pengirim_id' => $this->pembayaran->kartu_piutang->pengajuan->data_mitra_id,
            'pembayaran_id' => $this->pembayaran->id,
            'title' => 'Pembayaran Tagihan',
            'messages' =>  $this->pembayaran->kartu_piutang->pengajuan->data_mitra->nm.' Melakukan pembayaran tagihan.',
            'url' => route('pembayaran.index'),
        ];
    }
}