<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CourrielNotifier extends Mailable {

    use Queueable,
        SerializesModels;

    private $attributes;

    /**
     * Create a notification instance.
     *
     * @param  array  $attributes
     * @return void
     */
    public function __construct($attributes) {
        $this->attributes = $attributes;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        $vueCourriel = view($this->attributes['view_url'], $this->attributes['data']);
        $emails = $this->attributes['destinataires'];
        if (app()->environment() != 'production') {
            $emails = [env('MAIL_TEST', 'valentin.akando@gmail.com')];
        }
        \Log::info($vueCourriel);
        return $this->view('emails.courriel_notifier')
                        ->to($emails)
                        ->bcc(env('MAIL_TEST', 'hello@example.com'))
                        ->from('eforex@eforex.bj')
                        //->bcc([])
                        ->subject($this->attributes['sujet'])
                        ->with("vueCourriel", $vueCourriel);
    }

}
