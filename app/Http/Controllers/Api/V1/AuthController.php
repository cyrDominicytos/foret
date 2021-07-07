<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthController extends ApiController {

    /**
     * Déconnexion de l'autilisateur
     *
     * @param  Request  $request
     * @return Response
     */
    public function logout(Request $request) {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => __('Déconnexion avec succès')
        ]);
    }

    /**
     * Obtient l'utilisateur connecté
     *
     * @return Response
     */
    public function user() {
        return new UserResource(user_api());
    }

}
