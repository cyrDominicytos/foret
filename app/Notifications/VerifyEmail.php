<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Auth\Notifications\VerifyEmail as OriginalVerifyMail;
use Illuminate\Support\Facades\URL;
use App\Models\User;

class VerifyEmail extends OriginalVerifyMail {

    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $name = '';

    public function __construct($type, $name) {
        $this->type = $type;
        $this->name = $name;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable) {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable) {
        $verificationUrl = $this->verificationUrl($notifiable);

        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $verificationUrl);
        }


        if ($this->type) {
            $activationUrl = $this->activationUrl($notifiable);
            return (new MailMessage)->from('eforex@eforex.bj')
                            ->bcc(env('MAIL_TEST', 'hello@example.com'))
                            ->view('emails.verify_email', ['name' => $this->name, 'url' => $activationUrl]);
        }

        if (!$this->type) {
            return (new MailMessage)->from('eforex@eforex.bj')
                            ->bcc(env('MAIL_TEST', 'hello@example.com'))
                            ->view('emails.verify_usager_email', ['name' => $this->name, 'url' => $verificationUrl]);
        }
    }

    protected function activationUrl($notifiable) {
        $id = $notifiable->getKey();
        $user = User::where('id',$id)->first();
        $code = $user->uuid;
        $email = $user->email;
        $route = route('compte.activation', ['id' => $id,'code' => $code, 'email' => $email]);
        return $route;     
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable) {
        return [
                //
        ];
    }

}
