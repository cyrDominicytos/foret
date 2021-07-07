<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Forestier;
use App\Models\Usager;
use App\Models\Intervenant;
use Illuminate\Support\Facades\Validator;

class ProfileController extends \App\Http\Controllers\AppController {

    protected $nomResource = "user";

    public function __construct() {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        $user = user_web();
        $this->data['nom'] = $user->name;
        $this->data['prenom'] = $user->firstname;
        $this->data['email'] = $user->email;
        $this->data['adresse'] = $user->adresse;

        if ($user->forestier) {
            $this->data['titre'] = $user->forestier->titre;
            $this->data['grade'] = $user->forestier->grade;
            $this->data['poste'] = $user->forestier->poste->nom;
        }
        if ($user->intervenant) {
            $this->data['titre_intervenant'] = $user->intervenant->titre;
            $this->data['poste_intervenant'] = $user->intervenant->poste->nom;
        }
        if ($user->usager) {
            $this->data['reference_carte_professionnelle'] = $user->usager->reference_carte_professionnelle;
            $this->data['reference_permis_coupe'] = $user->usager->reference_permis_coupe;
        }
        return view("profile", $this->data);
    }

    protected function autreUpdateValidator(array $data) {
        $user = user_web();
        return Validator::make($data, [
                    'firstname' => ['required', 'string', 'max:200'],
                    'name' => ['required', 'string', 'max:100'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],                    
                    'password' => ['nullable', 'confirmed', 'string', 'regex:/^(?=[^a-z]*[a-z])(?=[^A-Z]*[A-Z])(?=\D*\d)(?=[^!@?]*[!@?]).{8,}$/'],
        ]);
    }
    protected function forestierUpdateValidator(array $data) {
        $user = user_web();
        return Validator::make($data, [
                    'firstname' => ['required', 'string', 'max:200'],
                    'name' => ['required', 'string', 'max:100'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
                    'titre' => 'required',
                    'grade' => 'required',
                    'password' => ['nullable', 'confirmed', 'string', 'regex:/^(?=[^a-z]*[a-z])(?=[^A-Z]*[A-Z])(?=\D*\d)(?=[^!@?]*[!@?]).{8,}$/'],
        ]);
    }

    protected function intervenantUpdateValidator(array $data) {
        $user = user_web();
        return Validator::make($data, [
                    'firstname' => ['required', 'string', 'max:200'],
                    'name' => ['required', 'string', 'max:100'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
                    'titre_intervenant' => 'required',
                    'password' => ['nullable', 'confirmed', 'string', 'regex:/^(?=[^a-z]*[a-z])(?=[^A-Z]*[A-Z])(?=\D*\d)(?=[^!@?]*[!@?]).{8,}$/'],
        ]);
    }

    protected function usagerUpdateValidator(array $data) {
        $user = user_web();
        return Validator::make($data, [
                    'firstname' => ['required', 'string', 'max:200'],
                    'name' => ['required', 'string', 'max:100'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
                    'reference_carte_professionnelle' => ['required', 'max:100'],
                    'reference_permis_coupe' => ['required', 'max:100'],
                    'password' => ['nullable', 'confirmed', 'string', 'regex:/^(?=[^a-z]*[a-z])(?=[^A-Z]*[A-Z])(?=\D*\d)(?=[^!@?]*[!@?]).{8,}$/'],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = user_web();
         if($request->input('password')){
            $donnees_user['password'] = Hash::make($request->input('password'));
        } 
//        else {
//            unset($donnees_user['password']);
//        }
        $alertInfoMessage = __("Profil mis à jour avec succès.");
        
        //forestier
        if($forestier = $user->forestier){
        $this->forestierUpdateValidator($request->all())->validate();

        $donnees_user['name']= $request->input('name');
        $donnees_user['firstname']= $request->input('firstname');
        $donnees_user['email']= $request->input('email');
        $donnees_user['adresse'] = $request->input('adresse');
        
        $donnees_forestier['titre']= $request->input('titre');
        $donnees_forestier['grade']= $request->input('grade');
               
            Forestier::where('id', $forestier->id)->update($donnees_forestier);
        }

        //intervenant
        elseif ($intervenant = $user->intervenant) {
            $this->intervenantUpdateValidator($request->all())->validate();

            $donnees_user['name'] = $request->input('name');
            $donnees_user['firstname'] = $request->input('firstname');
            $donnees_user['email'] = $request->input('email');
            $donnees_user['adresse'] = $request->input('adresse');

            $donnees_intervenant['titre'] = $request->input('titre_intervenant');
            
            Intervenant::where('id', $intervenant->id)->update($donnees_intervenant);
        }

        //usager
        elseif ($usager = $user->usager) {
            $this->usagerUpdateValidator($request->all())->validate();

            $donnees_user['name'] = $request->input('name');
            $donnees_user['firstname'] = $request->input('firstname');
            $donnees_user['email'] = $request->input('email');
            $donnees_user['adresse'] = $request->input('adresse');

            $donnees_usager['reference_carte_professionnelle'] = $request->input('reference_carte_professionnelle');
            $donnees_usager['reference_permis_coupe'] = $request->input('reference_permis_coupe');
           
            Usager::where('id', $usager->id)->update($donnees_usager);
            
            if($request->hasFile('carte_professionnelle'))
            {
                $id_usager = user_web()->usager->id;
                $full_name = user_web()->firstname."_".user_web()->name;
                $file_path = "public/carte_professionnelle/".date('Y')."/".user_web()->firstname."_".user_web()->name."/";
                $file_path2 = "carte_professionnelle/".date('Y')."/".user_web()->firstname."_".user_web()->name."/";
                $file_path = perform_links($file_path);
                $file_extension= $request->file('carte_professionnelle')->getClientOriginalExtension();
                $pdf_name = perform_links2(perform_links('carte_professionnelle'.$id_usager."_".$full_name)).'.'.$file_extension;
                $request->file('carte_professionnelle')->storeAs($file_path, $pdf_name);
             save_file_in_doc($pdf_name, $file_path2, $id_usager,'usagers', 10);

        }
            if($request->hasFile('permis_coupe'))
            {
                $id_usager = user_web()->usager->id;
                $full_name = user_web()->firstname."_".user_web()->name;
                $file_path = "public/permis_coupe/".date('Y')."/".user_web()->firstname."_".user_web()->name."/";
                $file_path2 = "permis_coupe/".date('Y')."/".user_web()->firstname."_".user_web()->name."/";
                $file_path = perform_links($file_path);
                $file_extension= $request->file('permis_coupe')->getClientOriginalExtension();
                $pdf_name = perform_links2(perform_links('permis_coupe'.$id_usager."_".$full_name)).'.'.$file_extension;
                $request->file('permis_coupe')->storeAs($file_path, $pdf_name);
             save_file_in_doc($pdf_name, $file_path2, $id_usager,'usagers', 11);

        }
        }

        //autre
        else {
            $this->autreUpdateValidator($request->all())->validate();
            $donnees_user['name'] = $request->input('name');
            $donnees_user['firstname'] = $request->input('firstname');
            $donnees_user['email'] = $request->input('email');           
            $donnees_user['adresse'] = $request->input('adresse');           
        }



        User::where('id', $user->id)->update($donnees_user);

        return redirect(route('home'))->with('success', $alertInfoMessage);
    }

}
