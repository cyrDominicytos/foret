<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Forestier;
use App\Models\Usager;
use App\Models\Intervenant;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Webpatser\Uuid\Uuid;

class activationController extends \App\Http\Controllers\AppController {

    protected $nomResource = "user";

    public function __construct() {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id, $code, $email) {
        $this->data['code']= $code;
        $this->data['valid_link']= User::where('uuid',$code)->first() ? true : false;
        return view("auth.passwords.activate_compte", $this->data);
    }

    protected function Validator(array $data) {
        return Validator::make($data, [
                    'code' => 'required',
                    'email' => ['required', Rule::in([User::where('uuid',$data['code'])->first()->email])],                    
                    'password' => ['required', 'string','confirmed', 'regex:/^(?=[^a-z]*[a-z])(?=[^A-Z]*[A-Z])(?=\D*\d)(?=[^!@?]*[!@?]).{8,}$/'],
        ]);
    }
    
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function activate(Request $request)
    {
        $this->Validator($request->all())->validate();
        $dataUser['password'] = Hash::make($request->input('password'));
        $dataUser['uuid'] = Uuid::generate();
        $dataUser['email_verified_at'] = Carbon::now();
        
        $user = User::where('uuid',$request->input('code'))->first();        
        
        $user->update($dataUser);
        
        $alertInfoMessage = __("Votre compte activer avec succès.");

        return redirect(route('home'))->with('success', $alertInfoMessage);
    }

}
