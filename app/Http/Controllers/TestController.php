<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProcedureExportation;
use App\Models\Forestier;
use App\Models\ConstatConformite;
use App\Models\Poste;
use App\Models\Usager;
use App\Models\User;
use Mail;
class TestController extends AppController
{
    public $modelProcedure = null;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('web');
        $this->modelProcedure = new ProcedureExportation();
    }
    
    public function test()
    {  
        dd(notificationATObtenu(1));
        // $pdfControler->generateConstatConformite($id_constat);
      //$usager = Usager::find(1);
     // $usager = Usager::find(1);
     
     //dd(user_usager_id(1));
   //$poste = Poste::find(13); 
   // $parent = $poste->postesParents()->where('type', 103)->get(); 
     //  $parent = $poste->forestiers->pluck('id_user')->toArray();

    //dd(email_liste(13, 103));
      /* $poste = Poste::find(2); 
       $posteInspection = $poste->postesParents()->where('type', 105)->get(); 
       dd($posteInspection);
       dd($posteInspection[0]->forestiers->pluck('email'));
       dd($poste->postesParents->pluck('id'));
       dd($poste->forestiers->pluck('email'));*/
       
    }

    /**
     * Stest mail.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function testMail()
    {  
        
        $view_url = 'emails.test_mail_form';
                $data = [
                    'prenom' => 'Valentin',
                    'nom' => 'Akando',
                    'phone' => '514-217-2503',
                    'message' => 'test mail',
                ];
                $destinataires = ['valentin.akando@gmail.com'];
                $sujet = 'Test mail';
        mail_send($view_url,  $data, $destinataires, $sujet);
        
       // Cette partie permet simplement de voir dans le navigateur avec /testmail
       // $attributes = [
       //         'view_url' => $view_url,
       //         'data' => $data,
       //         'destinataires' => $destinataires,
       //         'sujet' => $sujet
       //     ];    
       
       // return new \App\Mail\CourrielNotifier($attributes);
        
    }

    
    public function testMail2()
    {
        $data = array('name'=>"Our Code World");
        // Path or name to the blade template to be rendered
        $template_path = 'emails.test_mail';

        Mail::send($template_path, $data, function($message) {
            // Set the receiver and subject of the mail.
            $message->to('cyrdominicytos@gmail.com', 'Receiver Name')->subject('Laravel HTML Mail');
            // Set the sender
            $message->from('mymail@mymailaccount.com','Our Code World');
        });

        return "Basic email sent, check your inbox.";
    }


}
