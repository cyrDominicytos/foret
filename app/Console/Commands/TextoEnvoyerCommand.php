<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Twilio;
use Plivo\RestAPI;

class TextoEnvoyerCommand extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
//    protected $signature = 'notifier_push_mobile:fcm {titre} {message} {pushTimeToLive} {sound} {token*?}';
    protected $signature = 'notifier:sms 
                            {mobile : Tél cellulaire } 
                            {message : Corps du message}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notification SMS';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        $mobile = $this->argument('mobile');
        $message = $this->argument('message');
        $gateway = env('SMS_GATEWAY');
        \Log::info("gateway = $gateway");

        if (app()->environment() == 'local') {
            \Log::info("mobile = $mobile");
            \Log::info("message = $message");
        } else {
            $this->envoyerNotification($gateway, $mobile, $message);
        }
    }

    /**
     * Fonction permettre d'envoyer la notification
     * 
     * @param type $titre
     * @param type $message
     * @param type $pushTimeToLive
     * @param type $sound
     * @param array $tokens
     * 
     * @return void
     */
    private function envoyerNotification($gateway, $mobile, $message) {
        \Log::info("$mobile = $message");
        if ($gateway == "nexmo") {
            //$mobile = "+15147059421";
            $basic = new \Nexmo\Client\Credentials\Basic(env('NEXMO_KEY'), env('NEXMO_SECRET'));
            $client = new \Nexmo\Client($basic);

            $reponse = $client->message()->send([
                'to' => $mobile,
                'from' => config('services.nexmo.sms_from'),
                'text' => $message
            ]);
            
        } elseif ($gateway == "plivo") {
            /* $auth_id = config("services.plivo.auth_id");
              $auth_token = config("services.plivo.auth_token");
              $p = new RestAPI($auth_id, $auth_token);

              $params = array(
              'src' => config("services.plivo.from_number"),
              'dst' => $mobile,
              'text' => $message
              );
              $p->send_message($params); */
        } elseif ($gateway == "twilio") {
            Twilio::message($mobile, $message);
        } elseif ($gateway == "messagebird") {
            //$mobile = "+15147059421";
            $accessKey = config("services.messagebird.access_key");
            $originator = config("services.messagebird.originator");
            //$originator = "+13068019410";
            \Log::info($originator);
            $messageBirdClient = new \MessageBird\Client($accessKey);
            $messageBird = new \MessageBird\Objects\Message;
            $messageBird->originator = $originator;
            $messageBird->recipients = [$mobile];
            $messageBird->body = $message;

            $response = $messageBirdClient->messages->create($messageBird);

            //\Log::info($response->getStatus());
        }
    }

}
