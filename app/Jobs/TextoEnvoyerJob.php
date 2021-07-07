<?php

namespace App\Jobs;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;

class TextoEnvoyerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 3;
    
    /**
     * The number of seconds to wait before retrying the job.
     *
     * @var int
     */
    public $retryAfter = 5;

    private $options;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($options)
    {
        $this->options = $options;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $mobileEnvoi = $this->options['mobile'];
        if(app()->environment() == 'local'){
            $mobileEnvoi = env('SMS_TEST');
        }
        $message = $this->options['message'];

        try{
            //$message = $message." | ".config('app.name');
            $parametres = [
                'mobile' => $mobileEnvoi,
                'message' => $message,
            ];
            \Log::info("==Artisan::call mobile");
            $output = Artisan::call('notifier:sms', $parametres);
            \Log::info($output);
            \Log::info("Artisan::call mobile==");
            
        } catch (Exception $ex) {
            \Log::error($ex->getMessage());
        }
    }
}
