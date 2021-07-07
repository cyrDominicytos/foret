<?php

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

/**
 * Logged user Admin
 *
 * @return BackpackUser
 */
if (!function_exists('user_admin')) {

    function user_admin() {
        return backpack_user(); //Backpack Guard
    }

}

/**
 * Logged user
 *
 * @return User
 */
if (!function_exists('user_web')) {

    function user_web() {
        return Auth::user();    //API Guard, s'il y a lieu
    }

}

/**
 * Guard par défaut du web
 *
 * @return string
 */
if (!function_exists('guard_web')) {

    function guard_web() {
        return config('auth.defaults.guard');
    }

}

/**
 * Guard par défaut du backpack (Admin)
 *
 * @return string
 */
if (!function_exists('guard_admin')) {

    function guard_admin() {
        return backpack_guard_name();
    }

}

/**
 * Random password temp for SMS
 * 
 * @param int $long
 * 
 * @return string $string
 */
if (!function_exists('rand_password_temp')) {

    function rand_password_temp($long) {
        return rand_majuscule_nombre($long);
    }

}

/**
 * Random password temp for SMS
 * 
 * @param int $long
 * 
 * @return string $string
 */
if (!function_exists('rand_majuscule_nombre')) {

    function rand_majuscule_nombre($long) {
        $characters = 'ABCDEFGHIJKLMNPQRSTUVWXYZ123456789';
        $string = '';
        for ($i = 0; $i < $long; $i++) {
            $string .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $string;
    }

}

/**
 * Random minuscule nombre
 * 
 * @param int $long
 * 
 * @return string $string
 */
if (!function_exists('rand_minuscule_nombre')) {

    function rand_minuscule_nombre($long) {
        $characters = 'abcdefghijklmnpqrstuvwxyz123456789';
        $string = '';
        for ($i = 0; $i < $long; $i++) {
            $string .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $string;
    }

}

/**
 * Obtenir la date après avoir ajouté ou soustraire l'heure de la date système
 * 
 * @param int $heure
 * 
 * @return Carbon
 */
if (!function_exists('date_calcul_heure')) {

    function date_calcul_heure($heure = 0) {
        return Carbon::now()->addHours($heure);
    }

}

/**
 * Obtenir le ou les courriels paramétrés dans la BD et convertir en array
 * 
 * @param string $emails
 * 
 * @return Carbon
 */
if (!function_exists('setting_value_to_emails')) {

    function setting_value_to_emails($emails) {
        $emails = preg_replace('/\s+/', '', $emails);
        if (strpos($emails, ',') !== false) {
            return explode(',', $emails);
        } else {
            return [$emails];
        }
    }

}

/**
 * Obtenir l'URL publique des médias téléversés
 * https://laravel.com/docs/5.7/filesystem
 * 
 * @param string $media
 * 
 * @return url
 */
if (!function_exists('url_media')) {

    function url_media($media, $type = "user") {
        if (!$media || strpos($media, '.') === false) {
            if ($type == "type") {
                return asset("img/type.jpg");
            }
            return asset("img/avatar.jpg");
        }
        //backpack_avatar_url(backpack_auth()->user())
        return asset("storage/$media");
    }

}

/**
 * Liste sexe
 * 
 * @return void
 */
if (!function_exists('liste_sexe')) {

    function liste_sexe() {
        return ['Masculin' => 'Masculin', 'Féminin' => 'Féminin'];
    }

}

/**
 * Get user by email
 * 
 * @param string $matricule
 * 
 * @return User
 */
if (!function_exists('user_by_email')) {

    function user_by_email($email) {
        return User::byEmail($email)->where('email', $email)
                        ->first();
    }

}

/**
 * Décode json string sous forme de array
 * 
 * @param string $valeur
 * 
 * @return Ecole
 */
if (!function_exists('decode_json_array')) {

    function decode_json_array($valeur) {
        return json_decode($valeur, true);
    }

}
/**
 * Admin système : route préfixe
 * 
 * @return string
 */
if (!function_exists('admin_route_prefixe')) {

    function admin_route_prefixe() {
        return 'admin';
    }

}

/**
 * Donne la langue courante
 * 
 * @return string
 */
if (!function_exists('langue')) {

    function langue() {
        return app()->getLocale();
    }

}

/**
 * Donne la langue courante
 * 
 * @return array
 */
if (!function_exists('langues_disponibles')) {

    function langues_disponibles() {
        return [
            'fr' => __('Français'),
            'en' => __('Anglais'),
            'es' => __('Espagnol'),
            'pt' => __('Portugais'),
        ];
    }

}

/**
 * Jsute pour factoriser le Mail queue et tracker l'erreur pouvant subvenir
 * @param Class $classEnvoi Description
 * @return string
 * */
if (!function_exists('mail_queue')) {

    function mail_queue($classEnvoi) {
        try{
            if (app()->environment() == 'local') {
                \Mail::send($classEnvoi->onConnection('sync'));
            }elseif (app()->environment() == 'production') {
                \Mail::queue($classEnvoi->onConnection('sync'));
            }else{
                \Mail::queue($classEnvoi->onConnection('sync'));
            }
        } catch (Exception $ex) {
            \Log::info($ex->getMessage());
        }
    }

}

/**
 * Préfixe des tables du projet (Application)
 * @return string
 * */
if (!function_exists('prefixe_table')) {

    function prefixe_table() {
        return env('PREFIXE_TABLE', 'gl_');
    }

}

/**
 * Fonction unique pour envoyer les mail
 * @param Class $classEnvoi Description
 * @return string
 * */
if (!function_exists('mail_send')) {

    function mail_send(String $view_url,  $data, Array $destinataires, String $sujet) {
       $attributes = [
                'view_url' => $view_url,
                'data' => $data,
                'destinataires' => $destinataires,
                'sujet' => $sujet
            ];    
       
       mail_queue(new \App\Mail\CourrielNotifier($attributes)); //  Telescope ne marche pas ici (à trouver pourquoi)
       if (app()->environment() == 'local') {
       return new \App\Mail\CourrielNotifier($attributes); //  Cette partie permet simplement de voir dans telescope en attentant de trouver pourquoi    
       }
       }

}


