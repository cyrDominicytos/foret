<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Recapcha implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        
        $request = request();
        $data = array(
            'secret' => config('eforex.recaptcha.secret'),
            'response' => $value,
            'remoteip'=>$request->getClientIp()
        );         
        return (recaptcha_verify($data))? true : false;    
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Erreur Captcha! Réessayer ou contacter votre admin.';
    }
}
