<?php

use Illuminate\Support\Facades\Auth;

/**
 * Logged user
 *
 * @return \App\Models\User
 */
if (!function_exists('user_api')) {

    function user_api() {
        return Auth::user();    //API Guard, s'il y a lieu
    }

}
