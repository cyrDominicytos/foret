<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\LaissezPasser;
use App\Models\DemandeAnnuelle;
use App\Models\ProduitsExportesParAnnee;
use App\Models\ConstatConformite;
use App\Models\ContreConstat;
use App\Models\Usager;
use App\Models\EtatVersement;
use App\Models\AvisTechnique;
use App\Models\Forestier;
use App\Models\CaracteristiqueProduitProcedureExportation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class PDFController extends Controller
{
    public $modelLaissezPasser = null;
    public $modelCarac = null;
    public $modelEtatversement = null;
    public $modelAvistechnique = null;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $options = null;
    function __construct()
    {
      $this->options = ['isJavascriptEnabled' => true, 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'isPhpEnabled' => true ,   "dpi" => 96] ;
      $this->modelLaissezPasser = new LaissezPasser();
      $this->modelEtatversement = new EtatVersement();
      $this->modelCarac = new CaracteristiqueProduitProcedureExportation();
      $this->modelAvistechnique = new AvisTechnique();
    }
    

    public function generateCC()
    {
        /*$data = ['title' => 'Welcome to ItSolutionStuff.com'];
        //$pdf = PDF::loadView('/constat_conformite', $data);
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('/constat_conformite', $data);
        return $pdf->download('constat_conformite.pdf');*/

        //return $this->PDFGENERETOR('/constat_conformite', 'constat_conformite');
       // return $this->PDFGENERETOR('/demande_annuelle', 'demande_annuelle');
         $pdfControler = new PDFController();
        $pdfControler->generateDemandeAnnuelle(1);
    }

     public function generateDemandeAnnuelle($id=false)
    {
       if($id!= false){
        $demande_annuelle = DemandeAnnuelle::where('id', $id)->first();
        if($demande_annuelle != null)
        {
          $data = [];
          $data['usager'] =  Usager::firstWhere('id_user', Auth::user()->id);
            if( $data['usager']!= null){
                $produit_exporte = new ProduitsExportesParAnnee();
                $data['produit_exporte'] =  $produit_exporte->get_produit_exportes_par_annee($data['usager']->id,date('Y')    );
                if(count($data['produit_exporte']) <= 0)
                     $data['no_data_found'] = "Aucun produit exporté en ".(date('Y')-1);
            }

                $full_name = Auth::user()->firstname."_".Auth::user()->name;
                $file_path = "public/demande_annuelle/".date('Y')."/".$full_name."/";
                $file_path2 = "demande_annuelle/".date('Y')."/".$full_name."/";
                $file_path = perform_links($file_path);
                $file_path2 = perform_links($file_path2);
                $file_extension= ".pdf";
                $pdf_name = perform_links2(perform_links('demande_annuelle_'.$demande_annuelle->numero."_".$full_name));
                save_file_in_doc($pdf_name.$file_extension, $file_path2, $id,'demande_annuelles', 17);

                $data['demande_annuelle']  = $demande_annuelle ;
                $this->PDFGENERETOR('/demande_annuelle', $pdf_name,$data, $file_path,"Demande Annuelle");
            /*$this->PDFGENERETOR('/demande_annuelle', 'demande_annuelle_'.Auth::user()->firstname."_".Auth::user()->firstname.'_'.date('Y'),$data,"public/pdf/demande_annuelle/");*/
        }
       }

        
    }



     public function generateConstatConformite($id=false)
    {
       if($id!= false){
        $cc = new ConstatConformite();
        $constat_conformite = $cc->get_constat_conformite_all_info_by_id($id)->first();
        if($constat_conformite != null)
        {

          $data = [];
          $agent = Forestier::where('id_user',Auth::user()->id)->first();
          
          $pdf_name = "constat_conformite"."_".str_replace("°", "_", str_replace("/", "_",$constat_conformite->numero))."_".$constat_conformite->prenom_user."_".$constat_conformite->nom_user;

          $file_path = "public/constat_conformite/".date('Y')."/".$constat_conformite->prenom_user."_".$constat_conformite->nom_user."/";

          $file_path2 = "constat_conformite/".date('Y')."/".$constat_conformite->prenom_user."_".$constat_conformite->nom_user."/";
          $file_extension= ".pdf";
          $modelCaracProdExportation = new CaracteristiqueProduitProcedureExportation();
          $data['agent']  =  $agent;
          $data['constat_conformite']  =  $constat_conformite;
          $data['caracProdExportations'] = $modelCaracProdExportation->get_caracteristique_procedure_exportation_by_id($constat_conformite->id_procedure_exportation); 
 
            $this->PDFGENERETOR('/constat_conformite', $pdf_name,$data,$file_path);

            save_file_in_doc($pdf_name.$file_extension, $file_path2, $constat_conformite->id_procedure_exportation,'constat_conformites', 3);
        }
       }else{

       }

        
    }


    public function generateContreConstat($id=false)
    {
       if($id!= false){
        $cc = new ContreConstat();
        $constre_constat = $cc->get_Contre_constat_all_info_by_id($id)->first();
        if($constre_constat != null)
        {

          $agent = Forestier::where('id_user',Auth::user()->id)->first();
          $data = [];

          $pdf_name = "constre_constat"."_".str_replace("°", "_", str_replace("/", "_",$constre_constat->numero))."_".$constre_constat->prenom_user."_".$constre_constat->nom_user;

          $file_path = "public/constre_constat/".date('Y')."/".$constre_constat->prenom_user."_".$constre_constat->nom_user."/";

          $file_path2 = "constre_constat/".date('Y')."/".$constre_constat->prenom_user."_".$constre_constat->nom_user."/";
          
          $data['constre_constat']  =  $constre_constat;
          $data['agent']  =  $agent;
          $file_extension= ".pdf";
            $this->PDFGENERETOR('/contre_constat',$pdf_name ,$data,"public/constre_constat/".date('Y')."/".$constre_constat->prenom_user."_".$constre_constat->nom_user."/");

             save_file_in_doc($pdf_name.$file_extension, $file_path2, $constre_constat->id_procedure_exportation,'contre_constats', 5);
        }
       }else{

       }

        
    }

    

   
    public function PDFGENERETOR($view, $pdf_name,$data=[], $file_path="",$title="Titre du Document")
    {
        $data['title'] = $title;
        $pdf = PDF::setOptions($this->options)->loadView($view, $data);

        Storage::put($file_path.$pdf_name.".pdf", $pdf->output());

        return $pdf->download($pdf_name.".pdf");
    } 

    public function PDFGENERETOR2($view, $pdf_name,$data=[], $file_path="",$title="Titre du Document")
    {
        $data['title'] = $title;
        $pdf = PDF::setOptions($this->options)->loadView($view, $data);
        $pdf->setPaper('A4', 'landscape');
        Storage::put($file_path.$pdf_name.".pdf", $pdf->output());

        return $pdf->download($pdf_name.".pdf");
    } 


    public function generateAT($id,$caracteristiques)
    {
      $avis_technique = AvisTechnique::where('id', $id)->first();
      if($avis_technique != null){
        $data = [];
        $data['donnees'] = $this->modelAvistechnique->get_avis_techniques_all_info_by_id_for_poste($id,forestier_user_id(Auth::user()->id)->id_poste)->first();
        $donnees = $data['donnees'];

        if(isset($data['donnees']) && $data['donnees'] != null){

          $data['caracteristiques'] = $caracteristiques;

          $id_proced = AvisTechnique::where('id',$id)->first()->id_procedure_exportation;
          $etat_vers = EtatVersement::where('id_procedure_exportation',$id_proced)->first();
          $data['etat_versement_data'] = $etat_vers;

          $full_name = prenom_user_id($donnees->id_user_usagers).'_'.nom_user_id($donnees->id_user_usagers);
            $file_path = "public/avis_technique/".date('Y')."/".$full_name."/";
            $file_path = perform_links($file_path);
            $file_path2 = "avis_technique/".date('Y')."/".$full_name."/";
            $pdf_name = perform_links2(perform_links("avis_technique_".$donnees->numero."_".$full_name));
            $file_extension= ".pdf";

            save_file_in_doc($pdf_name.$file_extension, $file_path2, $donnees->id_procedure_exportation,'avis_technique', 7);

            $this->PDFGENERETOR('files/avis_technique', $pdf_name, $data, $file_path , "Génération de l'avis technique");

             
        }

      }
        
    } 


    public function generateBS()
    {
        $data = ['title' => 'Welcome to ItSolutionStuff.com'];
        $pdf = PDF::loadView('/bordereau_sortie', $data);

        return $pdf->download('bordereau_sortie.pdf');
    } 


    public function generatePDF2()
    {
      $data = ['title' => 'Welcome to ItSolutionStuff.com'];
      return view('/contre_constat', $data);
    }

    public function generateLP($id_l)
    { 
        $id_procedure_export = LaissezPasser::where('id', $id_l)->first();
        if($id_procedure_export != null){
              $data = [];
              $data['donnees'] = $this->modelLaissezPasser->get_laissez_passers_all_info_by_id_for_poste($id_l,forestier_user_id(Auth::user()->id)->id_poste)->first();
              $donnees = $data['donnees'];
          $data['caracteristiques'] = $this->modelCarac->get_caracteristique_procedure_exportation_by_id($id_procedure_export->id_procedure_exportation);
          $caracteristiques = $data['caracteristiques'];
        
            $full_name = prenom_user_id($donnees->id_user_usagers).'_'.nom_user_id($donnees->id_user_usagers);
            $file_path = "public/laissez_passer/".date('Y')."/".$full_name."/";
            $file_path2 = "laissez_passer/".date('Y')."/".$full_name."/";
            $file_path = perform_links($file_path);
            $pdf_name = perform_links2(perform_links("laissez_passer_".$donnees->numero."_".$full_name));
            $file_extension= ".pdf";

         
              save_file_in_doc($pdf_name.$file_extension, $file_path2, $donnees->id_procedure_exportation,'laissez_passer', 4);
              
            $this->PDFGENERETOR('files/laissez_passer', $pdf_name, $data, $file_path , "Génération de laissez-passer");

        }

        
    }

    public function generateET($id_e,$caracteristiques){

       
        $data = [];
        $data['donnees'] = $this->modelEtatversement->get_etat_versements_all_info_by_id_for_poste($id_e,forestier_user_id(Auth::user()->id)->id_poste)->first();
              $donnees = $data['donnees'];

        if(isset($data['donnees']) && $data['donnees'] != null){
                           
          
          $data['caracteristiques'] = $caracteristiques;
        
            $full_name = prenom_user_id($donnees->id_user_usagers).'_'.nom_user_id($donnees->id_user_usagers);
            $file_path = "public/etat_versement/".date('Y')."/".$full_name."/";
            $file_path = perform_links($file_path);
            $file_path2 = "etat_versement/".date('Y')."/".$full_name."/";
            $pdf_name = perform_links2(perform_links("etat_versement_".$donnees->numero."_".$full_name));
            $file_extension= ".pdf";

            $this->PDFGENERETOR2('files/etat_versement', $pdf_name, $data, $file_path , "Génération de l'état de versement");

             save_file_in_doc($pdf_name.$file_extension, $file_path2, $donnees->id_procedure_exportation,'etat_versement', 6);

        }


    }




}