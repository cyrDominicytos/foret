<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{

    /**
     * Gets the social redirect.
     *
     * @param string $provider The provider
     *
     * @return Redirect
     */
    public function getSocialRedirect($provider)
    {
        $providerKey = Config::get('services.'.$provider);

        if (empty($providerKey)) {
            redirect()->to('register')->with('error', __('Aucun fournisseur social connu'));                
        }

        return Socialite::driver($provider)->redirect();
    }

    /**
     * Gets the social handle.
     *
     * @param string $provider The provider
     *
     * @return Redirect
     */
    public function getSocialHandle($provider)
    {
        if (request()->input('denied') != '') {
            return redirect()->to('login')
                ->with('error', __("Vous n'avez pas partagé les données du réseau social avec notre site Internet."));
        }
        if (request()->input('error_code') != '' || !is_null(request()->input('error_code'))) {
            \Log::info(request()->all());
            return redirect()->to('register')
                ->with('error', __('Erreur lors de votre inscription à partir de facebook.'));
        }
        \Log::info(request()->all());

        try{
            $socialUserObject = Socialite::driver($provider)->user();
        } catch (\Exception $ex) {
            \Log::error($ex->getMessage());
            return redirect(route('register'))->with('error', __("Le réseau facebook met trop de temps à répondre. Essayez le formulaire d'inscription directe."));
        }
        $user = User::where('email', '=', $socialUserObject->getEmail())->first();
        
        if(!$user){
            $nom = null;
            $prenom = null;
            $nomComplet = explode(" ", $socialUserObject->getName());
            $nomComplet[0];
            if(count($nomComplet) > 1){
                $prenom = $nomComplet[1];
            }

            $user = User::create([
                'pseudo'           => $prenom."-".strtoupper(uniqid()),//$socialUserObject->getNickname(),
                'name'           => $nom,
                'prenom'            => $prenom,
                'email'                => $socialUserObject->getEmail(),
                'password'             => bcrypt(str_random(10)),
                'email_verified_at'    => now(),
                'reseau_social'    => $socialUserObject->getId()
            ]);
            $user->assignRole(Role::transporteur()->name);
        }
        
        
        auth()->login($user, true);
        return redirect('home')->with('success', __('Effectué avec succès'));
    }

}
