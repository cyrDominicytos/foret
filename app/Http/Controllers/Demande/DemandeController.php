<?php

namespace App\Http\Controllers\Demande;
use App\Http\Controllers\Demande;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PDFController;



use App\Models\DemandeAnnuelle;
use App\Models\ProcedureExportation;
use App\Models\CaracteristiqueProduitProcedureExportation;
use Illuminate\Http\Request;

use App\Models\ProduitsExportesParAnnee;
use App\Models\Usager;
use App\Models\TypeProduit;
use App\Models\EspeceProduit;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;


class DemandeController extends Controller
{

    protected $data = []; 
    protected $home =null; 
    public function __construct()
    {
        $this->home = new HomeController();
        $this->middleware('web');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
         $data = [
            "numero"=>demande_code(next_num_demande()),
            "id_usager"=>usager_id_user(Auth::user()->id)->id,            
            "autre_information"=> trim($request->autre_info),
            "demande_pour_annee"=>date('Y'),
        ];

       DemandeAnnuelle::create($data);
       $demande = DemandeAnnuelle::max('id');  
       $pdfControler = new PDFController();
       $pdfControler->generateDemandeAnnuelle($demande);
       notificationCreationDemandeAnnuelle($demande );
       return redirect('demandes/toute')->with('success', "Demande annuelle enregistrée avec succès");        
    }



    /**all
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function nouvelle_demande($demande=false)
    {
         $data = [];
         $data['user'] = null;
         $data['produit_exporte'] = [];

         $data['usager'] =  Usager::firstWhere('id_user', Auth::user()->id);
                if( $data['usager']!= null){
                    $data['user'] =  Auth::user();
                    $produit_exporte = new ProduitsExportesParAnnee();
                    $data['produit_exporte'] =  $produit_exporte->get_produit_exportes_par_annee($data['usager']->id,date('Y')-1);
                    if( count($data['produit_exporte']) <= 0)
                         $data['no_data_found'] = "Aucun produit exporté en ".(date('Y')-1);
                }


        if($demande == false)
        {

             if(usager_makes_demande(usager_id_user(Auth::user()->id) ? (usager_id_user(Auth::user()->id)->id) : (null), date('Y')))
                 return redirect('demandes/toute')->with('error', "Vous avez déjà éffectué votre demande annuelle au titre de l'année ".date('Y'));

        }else{

            if(demande_has_process($demande))
                 return redirect('demandes/toute')->with('error', "Vous avez déjà demarré de procédure pour cette demande, elle ne peut plus être modifiée" );
                $data['demande'] = DemandeAnnuelle::firstWhere('id', $demande); 
                
                $data['user'] = user_usager_id($data['demande']->id_usager);
                if($data['demande']== null)
                    return redirect('demandes/toute')->with('error', "La demande à laquelle vous essayez d'acceder n'existe pas" );
               
                
        }
         return view('/nouvelle_demande', $data);
        
    }


    public function liste($details)
    {
        if($details != "toute")
            return redirect('/home')->with('warning', "La page à laquelle vous essayez d'accéder n'existe pas !");
        $data = [];
        $demandes_annuelle = new DemandeAnnuelle();

        if (user_web()->usager) {

          session(['back' => Route('demandes', ['details' =>  ($details)])]);



           $data['demandes'] =  $demandes_annuelle->where('id_usager',usager_id_user(Auth::user()->id)->id)->orderBy('created_at','DESC')->get();
           return view('/liste_demandes', [
            'details' => $details,
            'demandes' =>   $data['demandes'],
        ]
        );
        } elseif (user_web()->hasRole(['Commandant_BFSP', 'Agent_Forestier_BFSP','Directeur_DGEFC'])) {
            session(['back' => Route('demandes', ['details' =>  ($details)])]);

            $data['demandes'] =  DemandeAnnuelle::all();
            return view('/liste_demandes', [
            'details' => $details,
            'demandes' =>   $data['demandes'],
        ]
        );
        }else{
            return redirect('/home')->with('warning', "Vous n'etes pas éligible à éffectuer cette action !");
        } 

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($demande)
    {
         $data = [];
         $data['produit_exporte'] = [];

         $data['demande'] = DemandeAnnuelle::firstWhere('id', $demande); 
      
              
            if($data['demande']!= null)
            {   
 
                $data['usager'] =  Usager::firstWhere('id', $data['demande']->id_usager);
                $produit_exporte = new ProduitsExportesParAnnee();
                $data['produit_exporte'] =  $produit_exporte->get_produit_exportes_par_annee( $data['usager'],$data['demande']->demande_pour_annee-1);
                if( count($data['produit_exporte']) <= 0)
                $data['no_data_found'] = "Aucun produit exporté en ".($data['demande']->demande_pour_annee-1);

                $data['vue'] = true;
                $data['user'] = user_usager_id($data['demande']->id_usager);
                return view('/nouvelle_demande', $data);
                 
            }else{
              
                return redirect('demandes/toute')->with('error', "La demande à laquelle vous essayez d'acceder n'existe pas" );
            }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = [           
            "autre_information"=> trim($request->autre_info),
        ];
       //dd($data);
       DemandeAnnuelle::where('id',$request->id)->update($data); 
        $pdfControler = new PDFController();
        $pdfControler->generateDemandeAnnuelle($request->id);
       notificationMiseAJourDemande($request->id );
       return redirect('demandes/toute')->with('success', "Demande annuelle mise à jour avec succès");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
