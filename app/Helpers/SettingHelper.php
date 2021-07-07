<?php 

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Models\Pay;
use App\Models\Commune;
use App\Models\Departement;
use App\Models\Usager;
use App\Models\ProcedureExportation;
use App\Models\DemandeAnnuelle;
use App\Models\CaracteristiqueProduitProcedureExportation;
use App\Models\TypeProduit;
use App\Models\EspeceProduit;
use App\Models\LaissezPasser;
use App\Models\Forestier;
use App\Models\Poste;
use App\Models\ConstatConformite;
use App\Models\ContreConstat;
use App\Models\RejetProcedureExportation;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Models\EtatVersement;
use App\Models\AvisTechnique;
use App\Models\Intervenant;



if (!function_exists('show_usager_docs')) 
{

    function show_usager_docs($id) {
      $docs = "";
      $demande = DemandeAnnuelle::where('id', $id)->first();
      if($demande)
      {
        
         $links = get_doc(10, $demande->id_usager);
         $docs = ($links) ? ($docs."<a href=".asset('storage/'.$links->chemin.$links->nom_fichier)."  target='_blank'>".$links->nom_fichier."</a>") : ($docs);

         $links = get_doc(11, $demande->id_usager);
         $docs = ($links) ? ($docs."<a href=".asset('storage/'.$links->chemin.$links->nom_fichier)."  target='_blank'>".$links->nom_fichier."</a>") : ($docs);

         $links = get_doc(12, $demande->id_usager);
         $docs = ($links) ? ($docs."<a href=".asset('storage/'.$links->chemin.$links->nom_fichier)."  target='_blank'>".$links->nom_fichier."</a>") : ($docs);
      
         //demande annuelle
         $links = get_doc(17, $id);
         $docs = ($links) ? ($docs."<a href=".asset('storage/'.$links->chemin.$links->nom_fichier)."  target='_blank'>".$links->nom_fichier."</a>") : ($docs);
        
      }else{
         
         $demande = usager_id_user(Auth::user()->id);
         $links = get_doc(10, $demande->id);
         $docs = ($links) ? ($docs."<a href=".asset('storage/'.$links->chemin.$links->nom_fichier)."  target='_blank'>".$links->nom_fichier."</a>") : ($docs);

         $links = get_doc(11, $demande->id);
         $docs = ($links) ? ($docs."<a href=".asset('storage/'.$links->chemin.$links->nom_fichier)."  target='_blank'>".$links->nom_fichier."</a>") : ($docs);

         $links = get_doc(12, $demande->id);
         $docs = ($links) ? ($docs."<a href=".asset('storage/'.$links->chemin.$links->nom_fichier)."  target='_blank'>".$links->nom_fichier."</a>") : ($docs);
      
         
      }
      return $docs;
    }
}
if (!function_exists('show_doc')) 
{
    function show_doc($id, $cat) {
      $docs = [];
      $links = get_doc($cat, $id);
      if($links)
      {
         $docs['link'] = asset('storage/'.$links->chemin.$links->nom_fichier);
         $docs['file_name'] = $links->nom_fichier;
      }else{
         $docs['link'] = null;
         $docs['file_name'] = null;
      }
      return $docs;
    }
}


if (!function_exists('show_upload_docs')) 
{

    function show_upload_docs($id) {
       $porcess = ProcedureExportation::where('id',$id)->first();
       $usager = null;
       $user = null;
       $docs = "";
     //  $usager = Usager::where('id', $porcess->id_usager)->first();
       $docs = show_usager_docs($porcess->id_demande_annuelle);
      
       if($porcess)
       {
            
            //demande annuelle
           /* $links = get_doc(17, $porcess->id_demande_annuelle);
            $docs = ($links) ? ($docs."<a href=".asset('storage/'.$links->chemin.$links->nom_fichier)."  target='_blank'>".$links->nom_fichier."</a>") : ($docs);*/
           
            //document de reference
            $links = get_doc(2, $porcess->id);
            $docs = ($links) ? ($docs."<a href=".asset('storage/'.$links->chemin.$links->nom_fichier)."  target='_blank'>".$links->nom_fichier."</a>") : ($docs);

            

            //constat de conformité
            if($porcess->id_statut >= 2){
                $links = get_doc(3, $porcess->id);
                $docs = ($links) ? ($docs."<a href=".asset('storage/'.$links->chemin.$links->nom_fichier)."  target='_blank'>".$links->nom_fichier."</a>") : ($docs);
            }

            //VGM
            $links = get_doc(16, $porcess->id);
            $docs = ($links) ? ($docs."<a href=".asset('storage/'.$links->chemin.$links->nom_fichier)."  target='_blank'>".$links->nom_fichier."</a>") : ($docs);


            //laissez-passer
            if($porcess->id_statut >= 3){
                $links = get_doc(4, $porcess->id);
                $docs = ($links) ? ($docs."<a href=".asset('storage/'.$links->chemin.$links->nom_fichier)."  target='_blank'>".$links->nom_fichier."</a>") : ($docs);
            }

            //contre constat
            if($porcess->id_statut >= 4){
                $links = get_doc(5, $porcess->id);
                $docs = ($links) ? ($docs."<a href=".asset('storage/'.$links->chemin.$links->nom_fichier)."  target='_blank'>".$links->nom_fichier."</a>") : ($docs);
            }
            //etat de versement non regle
            if($porcess->id_statut >= 5){
                $links = get_doc(6, $porcess->id);
                $docs = ($links) ? ($docs."<a href=".asset('storage/'.$links->chemin.$links->nom_fichier)."  target='_blank'>".$links->nom_fichier."</a>") : ($docs);
            }
             //quittance de paiement
            if($porcess->id_statut >= 6){
                $links = get_doc(1, $porcess->id);
                $docs = ($links) ? ($docs."<a href=".asset('storage/'.$links->chemin.$links->nom_fichier)."  target='_blank'>".$links->nom_fichier."</a>") : ($docs);
            }
            
            //avis technique non vise
            if($porcess->id_statut >= 7){
                $links = get_doc(7, $porcess->id);
                $docs = ($links) ? ($docs."<a href=".asset('storage/'.$links->chemin.$links->nom_fichier)."  target='_blank'>".$links->nom_fichier."</a>") : ($docs);
            }

            //avis technique vise
            if($porcess->id_statut >= 7){
                $links = get_doc(8, $porcess->id);
                $docs = ($links) ? ($docs."<a href=".asset('storage/'.$links->chemin.$links->nom_fichier)."  target='_blank'>".$links->nom_fichier."</a>") : ($docs);
            }
            //releve de scanning
            if($porcess->id_statut >= 7){
                $links = get_doc(9, $porcess->id);
                $docs = ($links) ? ($docs."<a href=".asset('storage/'.$links->chemin.$links->nom_fichier)."  target='_blank'>".$links->nom_fichier."</a>") : ($docs);
            }

            //BFU Bruit 
            if($porcess->id_statut >= 7){
                $links = get_doc(13, $porcess->id);
                $docs = ($links) ? ($docs."<a href=".asset('storage/'.$links->chemin.$links->nom_fichier)."  target='_blank'>".$links->nom_fichier."</a>") : ($docs);
            }
            
            //BFU Complet
            if($porcess->id_statut >= 7){
                $links = get_doc(14, $porcess->id);
                $docs = ($links) ? ($docs."<a href=".asset('storage/'.$links->chemin.$links->nom_fichier)."  target='_blank'>".$links->nom_fichier."</a>") : ($docs);
            }

            //BFU regle
            if($porcess->id_statut >= 7){
                $links = get_doc(15, $porcess->id);
                $docs = ($links) ? ($docs."<a href=".asset('storage/'.$links->chemin.$links->nom_fichier)."  target='_blank'>".$links->nom_fichier."</a>") : ($docs);
            }

            //Liauidqtion regle
            if($porcess->id_statut >= 7){
                $links = get_doc(18, $porcess->id);
                $docs = ($links) ? ($docs."<a href=".asset('storage/'.$links->chemin.$links->nom_fichier)."  target='_blank'>".$links->nom_fichier."</a>") : ($docs);
            }
            

       }
       return $docs;
    }
}




if (!function_exists('email_liste')) 
{

    function email_liste($id_poste, $code) {

       $poste = Poste::find($id_poste); 
       $parent = $poste->postesParents()->where('type', $code)->get(); 

       if(count($parent)>0)
       {
           return $parent[0]->forestiers->pluck('id_user');
            
       }
        return null;     
    }
}

    

    if (!function_exists('save_file_in_doc')) 
    {

    function save_file_in_doc($pdf_name, $file_path, $entite_id,$nom_entite, $categorie_doc)
    {
                $doc = new Document();
                $doc->nom_fichier = $pdf_name;
                $doc->nom_entite = $nom_entite;
                $doc->entite_id = $entite_id;
                $doc->chemin = $file_path;
                $doc->id_categorie_document = $categorie_doc;
                $doc->save();  
    }
}



if (!function_exists('email_liste_for_poste')) 
{

    function email_liste_for_poste($id_poste) {

       $poste = Poste::find($id_poste); 
       
       $parent = $poste->forestiers->pluck('id_user')->toArray();

      if(count($parent)>0)
       {
            return $parent;
       }
        return null;     
    }

}

if (!function_exists('get_doc')) 
{

    function get_doc($id_categorie_document, $id_entite) {

       return Document::where('id_categorie_document', $id_categorie_document)->where('entite_id',$id_entite)->first();   
    }

}

if (!function_exists('user_is_usager')) 
{

    function user_is_usager($id) {
        $user = Usager::where('id_user', $id)->first();  
        if($user)
        	return 1;
        	return 0;
    }

}

if (!function_exists('perform_links2')) 
{

    function perform_links2($links) {

    	return str_replace("/", "_", $links);

    }

}


if (!function_exists('perform_links')) 
{

    function perform_links($links) {


   $transliteration = array(
    'Ĳ' => 'I', 'Ö' => 'O','Œ' => 'O','Ü' => 'U','ä' => 'a','æ' => 'a',
    'ĳ' => 'i','ö' => 'o','œ' => 'o','ü' => 'u','ß' => 's','ſ' => 's',
    'À' => 'A','Á' => 'A','Â' => 'A','Ã' => 'A','Ä' => 'A','Å' => 'A',
    'Æ' => 'A','Ā' => 'A','Ą' => 'A','Ă' => 'A','Ç' => 'C','Ć' => 'C',
    'Č' => 'C','Ĉ' => 'C','Ċ' => 'C','Ď' => 'D','Đ' => 'D','È' => 'E',
    'É' => 'E','Ê' => 'E','Ë' => 'E','Ē' => 'E','Ę' => 'E','Ě' => 'E',
    'Ĕ' => 'E','Ė' => 'E','Ĝ' => 'G','Ğ' => 'G','Ġ' => 'G','Ģ' => 'G',
    'Ĥ' => 'H','Ħ' => 'H','Ì' => 'I','Í' => 'I','Î' => 'I','Ï' => 'I',
    'Ī' => 'I','Ĩ' => 'I','Ĭ' => 'I','Į' => 'I','İ' => 'I','Ĵ' => 'J',
    'Ķ' => 'K','Ľ' => 'K','Ĺ' => 'K','Ļ' => 'K','Ŀ' => 'K','Ł' => 'L',
    'Ñ' => 'N','Ń' => 'N','Ň' => 'N','Ņ' => 'N','Ŋ' => 'N','Ò' => 'O',
    'Ó' => 'O','Ô' => 'O','Õ' => 'O','Ø' => 'O','Ō' => 'O','Ő' => 'O',
    'Ŏ' => 'O','Ŕ' => 'R','Ř' => 'R','Ŗ' => 'R','Ś' => 'S','Ş' => 'S',
    'Ŝ' => 'S','Ș' => 'S','Š' => 'S','Ť' => 'T','Ţ' => 'T','Ŧ' => 'T',
    'Ț' => 'T','Ù' => 'U','Ú' => 'U','Û' => 'U','Ū' => 'U','Ů' => 'U',
    'Ű' => 'U','Ŭ' => 'U','Ũ' => 'U','Ų' => 'U','Ŵ' => 'W','Ŷ' => 'Y',
    'Ÿ' => 'Y','Ý' => 'Y','Ź' => 'Z','Ż' => 'Z','Ž' => 'Z','à' => 'a',
    'á' => 'a','â' => 'a','ã' => 'a','ā' => 'a','ą' => 'a','ă' => 'a',
    'å' => 'a','ç' => 'c','ć' => 'c','č' => 'c','ĉ' => 'c','ċ' => 'c',
    'ď' => 'd','đ' => 'd','è' => 'e','é' => 'e','ê' => 'e','ë' => 'e',
    'ē' => 'e','ę' => 'e','ě' => 'e','ĕ' => 'e','ė' => 'e','ƒ' => 'f',
    'ĝ' => 'g','ğ' => 'g','ġ' => 'g','ģ' => 'g','ĥ' => 'h','ħ' => 'h',
    'ì' => 'i','í' => 'i','î' => 'i','ï' => 'i','ī' => 'i','ĩ' => 'i',
    'ĭ' => 'i','į' => 'i','ı' => 'i','ĵ' => 'j','ķ' => 'k','ĸ' => 'k',
    'ł' => 'l','ľ' => 'l','ĺ' => 'l','ļ' => 'l','ŀ' => 'l','ñ' => 'n',
    'ń' => 'n','ň' => 'n','ņ' => 'n','ŉ' => 'n','ŋ' => 'n','ò' => 'o',
    'ó' => 'o','ô' => 'o','õ' => 'o','ø' => 'o','ō' => 'o','ő' => 'o',
    'ŏ' => 'o','ŕ' => 'r','ř' => 'r','ŗ' => 'r','ś' => 's','š' => 's',
    'ť' => 't','ù' => 'u','ú' => 'u','û' => 'u','ū' => 'u','ů' => 'u',
    'ű' => 'u','ŭ' => 'u','ũ' => 'u','ų' => 'u','ŵ' => 'w','ÿ' => 'y',
    'ý' => 'y','ŷ' => 'y','ż' => 'z','ź' => 'z','ž' => 'z','Α' => 'A',
    'Ά' => 'A','Ἀ' => 'A','Ἁ' => 'A','Ἂ' => 'A','Ἃ' => 'A','Ἄ' => 'A',
    'Ἅ' => 'A','Ἆ' => 'A','Ἇ' => 'A','ᾈ' => 'A','ᾉ' => 'A','ᾊ' => 'A',
    'ᾋ' => 'A','ᾌ' => 'A','ᾍ' => 'A','ᾎ' => 'A','ᾏ' => 'A','Ᾰ' => 'A',
    'Ᾱ' => 'A','Ὰ' => 'A','ᾼ' => 'A','Β' => 'B','Γ' => 'G','Δ' => 'D',
    'Ε' => 'E','Έ' => 'E','Ἐ' => 'E','Ἑ' => 'E','Ἒ' => 'E','Ἓ' => 'E',
    'Ἔ' => 'E','Ἕ' => 'E','Ὲ' => 'E','Ζ' => 'Z','Η' => 'I','Ή' => 'I',
    'Ἠ' => 'I','Ἡ' => 'I','Ἢ' => 'I','Ἣ' => 'I','Ἤ' => 'I','Ἥ' => 'I',
    'Ἦ' => 'I','Ἧ' => 'I','ᾘ' => 'I','ᾙ' => 'I','ᾚ' => 'I','ᾛ' => 'I',
    'ᾜ' => 'I','ᾝ' => 'I','ᾞ' => 'I','ᾟ' => 'I','Ὴ' => 'I','ῌ' => 'I',
    'Θ' => 'T','Ι' => 'I','Ί' => 'I','Ϊ' => 'I','Ἰ' => 'I','Ἱ' => 'I',
    'Ἲ' => 'I','Ἳ' => 'I','Ἴ' => 'I','Ἵ' => 'I','Ἶ' => 'I','Ἷ' => 'I',
    'Ῐ' => 'I','Ῑ' => 'I','Ὶ' => 'I','Κ' => 'K','Λ' => 'L','Μ' => 'M',
    'Ν' => 'N','Ξ' => 'K','Ο' => 'O','Ό' => 'O','Ὀ' => 'O','Ὁ' => 'O',
    'Ὂ' => 'O','Ὃ' => 'O','Ὄ' => 'O','Ὅ' => 'O','Ὸ' => 'O','Π' => 'P',
    'Ρ' => 'R','Ῥ' => 'R','Σ' => 'S','Τ' => 'T','Υ' => 'Y','Ύ' => 'Y',
    'Ϋ' => 'Y','Ὑ' => 'Y','Ὓ' => 'Y','Ὕ' => 'Y','Ὗ' => 'Y','Ῠ' => 'Y',
    'Ῡ' => 'Y','Ὺ' => 'Y','Φ' => 'F','Χ' => 'X','Ψ' => 'P','Ω' => 'O',
    'Ώ' => 'O','Ὠ' => 'O','Ὡ' => 'O','Ὢ' => 'O','Ὣ' => 'O','Ὤ' => 'O',
    'Ὥ' => 'O','Ὦ' => 'O','Ὧ' => 'O','ᾨ' => 'O','ᾩ' => 'O','ᾪ' => 'O',
    'ᾫ' => 'O','ᾬ' => 'O','ᾭ' => 'O','ᾮ' => 'O','ᾯ' => 'O','Ὼ' => 'O',
    'ῼ' => 'O','α' => 'a','ά' => 'a','ἀ' => 'a','ἁ' => 'a','ἂ' => 'a',
    'ἃ' => 'a','ἄ' => 'a','ἅ' => 'a','ἆ' => 'a','ἇ' => 'a','ᾀ' => 'a',
    'ᾁ' => 'a','ᾂ' => 'a','ᾃ' => 'a','ᾄ' => 'a','ᾅ' => 'a','ᾆ' => 'a',
    'ᾇ' => 'a','ὰ' => 'a','ᾰ' => 'a','ᾱ' => 'a','ᾲ' => 'a','ᾳ' => 'a',
    'ᾴ' => 'a','ᾶ' => 'a','ᾷ' => 'a','β' => 'b','γ' => 'g','δ' => 'd',
    'ε' => 'e','έ' => 'e','ἐ' => 'e','ἑ' => 'e','ἒ' => 'e','ἓ' => 'e',
    'ἔ' => 'e','ἕ' => 'e','ὲ' => 'e','ζ' => 'z','η' => 'i','ή' => 'i',
    'ἠ' => 'i','ἡ' => 'i','ἢ' => 'i','ἣ' => 'i','ἤ' => 'i','ἥ' => 'i',
    'ἦ' => 'i','ἧ' => 'i','ᾐ' => 'i','ᾑ' => 'i','ᾒ' => 'i','ᾓ' => 'i',
    'ᾔ' => 'i','ᾕ' => 'i','ᾖ' => 'i','ᾗ' => 'i','ὴ' => 'i','ῂ' => 'i',
    'ῃ' => 'i','ῄ' => 'i','ῆ' => 'i','ῇ' => 'i','θ' => 't','ι' => 'i',
    'ί' => 'i','ϊ' => 'i','ΐ' => 'i','ἰ' => 'i','ἱ' => 'i','ἲ' => 'i',
    'ἳ' => 'i','ἴ' => 'i','ἵ' => 'i','ἶ' => 'i','ἷ' => 'i','ὶ' => 'i',
    'ῐ' => 'i','ῑ' => 'i','ῒ' => 'i','ῖ' => 'i','ῗ' => 'i','κ' => 'k',
    'λ' => 'l','μ' => 'm','ν' => 'n','ξ' => 'k','ο' => 'o','ό' => 'o',
    'ὀ' => 'o','ὁ' => 'o','ὂ' => 'o','ὃ' => 'o','ὄ' => 'o','ὅ' => 'o',
    'ὸ' => 'o','π' => 'p','ρ' => 'r','ῤ' => 'r','ῥ' => 'r','σ' => 's',
    'ς' => 's','τ' => 't','υ' => 'y','ύ' => 'y','ϋ' => 'y','ΰ' => 'y',
    'ὐ' => 'y','ὑ' => 'y','ὒ' => 'y','ὓ' => 'y','ὔ' => 'y','ὕ' => 'y',
    'ὖ' => 'y','ὗ' => 'y','ὺ' => 'y','ῠ' => 'y','ῡ' => 'y','ῢ' => 'y',
    'ῦ' => 'y','ῧ' => 'y','φ' => 'f','χ' => 'x','ψ' => 'p','ω' => 'o',
    'ώ' => 'o','ὠ' => 'o','ὡ' => 'o','ὢ' => 'o','ὣ' => 'o','ὤ' => 'o',
    'ὥ' => 'o','ὦ' => 'o','ὧ' => 'o','ᾠ' => 'o','ᾡ' => 'o','ᾢ' => 'o',
    'ᾣ' => 'o','ᾤ' => 'o','ᾥ' => 'o','ᾦ' => 'o','ᾧ' => 'o','ὼ' => 'o',
    'ῲ' => 'o','ῳ' => 'o','ῴ' => 'o','ῶ' => 'o','ῷ' => 'o','А' => 'A',
    'Б' => 'B','В' => 'V','Г' => 'G','Д' => 'D','Е' => 'E','Ё' => 'E',
    'Ж' => 'Z','З' => 'Z','И' => 'I','Й' => 'I','К' => 'K','Л' => 'L',
    'М' => 'M','Н' => 'N','О' => 'O','П' => 'P','Р' => 'R','С' => 'S',
    'Т' => 'T','У' => 'U','Ф' => 'F','Х' => 'K','Ц' => 'T','Ч' => 'C',
    'Ш' => 'S','Щ' => 'S','Ы' => 'Y','Э' => 'E','Ю' => 'Y','Я' => 'Y',
    'а' => 'A','б' => 'B','в' => 'V','г' => 'G','д' => 'D','е' => 'E',
    'ё' => 'E','ж' => 'Z','з' => 'Z','и' => 'I','й' => 'I','к' => 'K',
    'л' => 'L','м' => 'M','н' => 'N','о' => 'O','п' => 'P','р' => 'R',
    'с' => 'S','т' => 'T','у' => 'U','ф' => 'F','х' => 'K','ц' => 'T',
    'ч' => 'C','ш' => 'S','щ' => 'S','ы' => 'Y','э' => 'E','ю' => 'Y',
    'я' => 'Y','ð' => 'd','Ð' => 'D','þ' => 't','Þ' => 'T','ა' => 'a',
    'ბ' => 'b','გ' => 'g','დ' => 'd','ე' => 'e','ვ' => 'v','ზ' => 'z',
    'თ' => 't','ი' => 'i','კ' => 'k','ლ' => 'l','მ' => 'm','ნ' => 'n',
    'ო' => 'o','პ' => 'p','ჟ' => 'z','რ' => 'r','ს' => 's','ტ' => 't',
    'უ' => 'u','ფ' => 'p','ქ' => 'k','ღ' => 'g','ყ' => 'q','შ' => 's',
    'ჩ' => 'c','ც' => 't','ძ' => 'd','წ' => 't','ჭ' => 'c','ხ' => 'k',
    'ჯ' => 'j','ჰ' => 'h' 
    );
    $links = str_replace( array_keys( $transliteration ),
                        array_values( $transliteration ),
                        $links);
        $links = str_replace("°", "_", $links);
        //$links = str_replace("/", "_", $links);
        $links = str_replace(" ", "_", $links);
		$links = str_replace("(", "", $links);
		$links = str_replace(")", "", $links);
		$links = str_replace("[", "", $links);
		$links = str_replace("]", "", $links);
		$links = str_replace("}", "", $links);
		$links = str_replace("{", "", $links);
         return $links;
    }

}

if (!function_exists('user_is_forestier')) 
{

    function user_is_forestier($id) {
        $user = Forestier::where('id_user', $id)->first();  
        if($user)
        	return 1;
        	return 0;
    }

}

if (!function_exists('process_code')) {

   function process_code( $num="6",$dep ,$code="DGEFC/IF")
	{
	 
	 //return strtoupper($num)."/".$code;
	 return "N°".$num."/".numero_departement($dep)."/".$code;
	}

}



if (!function_exists('info_menu_constat')) {

   function info_menu_constat()
	{
	 
	$modelProcedureExportation = new ProcedureExportation();

	$modelConstatConformite = new ConstatConformite();

	$modelRejetProcedureExportation = new RejetProcedureExportation();

	$procedureEnAttentes = $modelProcedureExportation->get_procedure_exportation_all_info_by_statut_for_poste(1,forestier_user_id(Auth::user()->id)->id_poste);

	$procedureRejetes = $modelRejetProcedureExportation->get_procedure_rejeter_statut_apres_for_poste(1002,forestier_user_id(Auth::user()->id)->id_poste);

	$constat_delivre = $modelConstatConformite->get_constat_conformites_all_info(forestier_user_id(Auth::user()->id)->id_poste);

	 $data_menu['constat_en_attente']  = $procedureEnAttentes->count();
	 $data_menu['constat_en_rejete']  = $procedureRejetes->count();
	 $data_menu['constat_delivre']  = $constat_delivre->count();

	 
	 	return $data_menu;
	 	
	 
	}

}

if (!function_exists('demande_user_info')) {

   function demande_user_info()
	{
	     $id_usager = usager_id_user(Auth::user()->id) ? (usager_id_user(Auth::user()->id)) : Auth::user()->id;
        $id_usager = usager_id_user(Auth::user()->id);
        $demandes_annuelle = new DemandeAnnuelle();
        $demandes = usager_id_user(Auth::user()->id) ? ($demandes_annuelle->where('id_usager',usager_id_user(Auth::user()->id)->id)
                                    ->orderBy('created_at','DESC')->get()) : DemandeAnnuelle::all();
	      $data_menu['demandes_annuelle'] = $demandes->count();
	 	  return $data_menu;
	 	
	}

}



if (!function_exists('etat_user_info')) {

   function etat_user_info()
	{
        
        $id_usager = usager_id_user(Auth::user()->id) ? (usager_id_user(Auth::user()->id)) : Auth::user()->id;
        $modelEtatVersement = new EtatVersement();
        $etat_regle = $modelEtatVersement->get_etat_versement_regle_all_info_by_user($id_usager->id);
         $etat_non_regle = $modelEtatVersement->get_etat_versement_non_regle_all_info_by_user($id_usager->id);

	      $data_menu['etat_regle'] = $etat_regle->count();
	      //echo $etat_non_regle->count();
	      $data_menu['etat_non_regle'] =  $etat_non_regle->count();
	 	  return $data_menu;
	 	
	 
	}

}



/*if (!function_exists('demande_user_info')) {

   function demande_user_info()
    {
        $id_usager = usager_id_user(Auth::user()->id);
        $id_usager = usager_id_user(Auth::user()->id) ? (usager_id_user(Auth::user()->id)) : Auth::user()->id;
        $modelEtatVersement = new EtatVersement();
        $etat_regle = $modelEtatVersement->get_etat_versement_regle_all_info_by_user($id_usager->id);
         $etat_non_regle = $modelEtatVersement->get_etat_versement_non_regle_all_info_by_user($id_usager->id);

          $data_menu['etat_regle'] = $etat_regle->count();
          //echo $etat_non_regle->count();
          $data_menu['etat_non_regle'] =  $etat_non_regle->count();
          return $data_menu;
        
     
    }

}*/

if (!function_exists('process_user_info')) {
   function process_user_info()
	{
        $id_usager = usager_id_user(Auth::user()->id) ? (usager_id_user(Auth::user()->id)) : Auth::user()->id;
          $modelProcedure = new ProcedureExportation();
                if(user_web()->intervenant){
                     $process_toutes = $modelProcedure->get_procedure_exportation_all_info();
               
                   $process_traitement =  $modelProcedure->get_procedure_exportation_all_info_en_traitement_for_intervenant(); 
                   $process_fermer = $modelProcedure->get_procedure_exportation_all_info_fermer_for_intervenant();
                $process_rejeter = $modelProcedure->get_procedure_exportation_all_info_rejeter_for_intervenant();

                }else{
                   $process_toutes = user_web()->usager ? ( $modelProcedure->get_procedure_exportation_all_info_by_user($id_usager->id)) : ( $modelProcedure->get_procedure_exportation_all_info_sector(forestier_user_id(Auth::user()->id)->id_poste)) ;
               
                $process_traitement = user_web()->usager ? ( $modelProcedure->get_procedure_exportation_all_info_en_traitement($id_usager->id)) : ( $modelProcedure->get_procedure_exportation_all_info_en_traitement_sector(forestier_user_id(Auth::user()->id)->id_poste)) ;

                
                $process_fermer = user_web()->usager ? ( $modelProcedure->get_procedure_exportation_all_info_fermer($id_usager->id)) : ( $modelProcedure->get_procedure_exportation_all_info_fermer_sector(forestier_user_id(Auth::user()->id)->id_poste)) ;

                
                $process_rejeter = user_web()->usager ? ( $modelProcedure->get_procedure_exportation_all_info_rejeter($id_usager->id)) : ( $modelProcedure->get_procedure_exportation_all_info_rejeter_sector(forestier_user_id(Auth::user()->id)->id_poste)) ;
                }
               

          $data_menu['process_toutes'] = $process_toutes->count();
			    $data_menu['process_traitement'] =  $process_traitement->count();
			    $data_menu['process_fermer'] =  $process_fermer->count();
			    $data_menu['process_rejeter'] =  $process_rejeter->count();
			 	return $data_menu;	 	
	}

}


if (!function_exists('benin_control_info')) {
   function benin_control_info()
    {
         $modelProcedure = new ProcedureExportation();
         $bc_attente =  $modelProcedure->get_procedure_exportation_all_info_by_statut_for_intervenant(9);
         $bc_conforme =  $modelProcedure->get_procedure_exportation_all_info_by_statut_for_intervenant(10);
         $bc_non_conforme =  $modelProcedure->get_procedure_exportation_all_info_by_statut_for_intervenant(10010);
        $data_menu['bc_attente'] = $bc_attente->count();
        $data_menu['bc_conforme'] =  $bc_conforme->count();
        $data_menu['bc_non_conforme'] =  $bc_non_conforme->count();
        return $data_menu;      
    }

}

if (!function_exists('attente_fermeture')) {
   function attente_fermeture()
    {
         $modelProcedure = new ProcedureExportation();
         $bc_attente =  $modelProcedure->get_procedure_exportation_all_info_by_statut_for_intervenant(12);
        $data_menu['attente_fermeture'] = $bc_attente->count();
       
        return $data_menu;      
    }

}

if (!function_exists('douane_info')) {
   function douane_info()
    {

         $modelProcedure = new ProcedureExportation();
         $bfu_attente =  $modelProcedure->get_procedure_exportation_all_info_by_statut_for_intervenant(10);
         $bfu_delivre =  $modelProcedure->get_procedure_exportation_all_info_by_statut_for_intervenant(11);
         
        $data_menu['bfu_attente'] = $bfu_attente->count();
        $data_menu['bfu_delivre'] = $bfu_delivre->count();
        return $data_menu;      
    }

}

if (!function_exists('bfu_user_info')) {
   function bfu_user_info()
    {

         $modelProcedure = new ProcedureExportation();
         $bfu_attente =  $modelProcedure->get_procedure_exportation_all_info_by_statut(usager_id_user(Auth::user()->id)->id,11);
         $bfu_regle =  $modelProcedure->get_procedure_exportation_all_info_by_statut(usager_id_user(Auth::user()->id)->id,12);

        $data_menu['bfu_attente'] = $bfu_attente->count();
        $data_menu['bfu_regle'] = $bfu_regle->count();
        return $data_menu;      
    }

}

if (!function_exists('cncb_info')) {
   function cncb_info()
    {
         $modelProcedure = new ProcedureExportation();
         $vgm_attente =  $modelProcedure->get_procedure_exportation_all_info_vgm_attente();
         $vgm_conforme =  $modelProcedure->get_procedure_exportation_all_info_vgm_obtenue();
       
        $data_menu['vgm_attente'] = $vgm_attente->count();
        $data_menu['vgm_recues'] =  $vgm_conforme->count();
        return $data_menu;      
    }

}

if (!function_exists('visa_info')) {
   function visa_info()
    {
         $modelProcedure = new ProcedureExportation();
         $visa_attente =  $modelProcedure->get_procedure_exportation_all_info_by_statut_for_intervenant(7);
         $visa_delivre =  $modelProcedure->get_procedure_exportation_all_info_by_statut_for_intervenant(9);
         $visa_rejete =  $modelProcedure->get_procedure_exportation_all_info_by_statut_for_intervenant(1009);
        $data_menu['visa_attente'] = $visa_attente->count();
        $data_menu['visa_delivre'] =  $visa_delivre->count();
        $data_menu['visa_rejete'] =  $visa_rejete->count();
        return $data_menu;     
    }

}



if (!function_exists('info_menu_contre_constat')) {

   function info_menu_contre_constat()
	{
	 
	$modelProcedureExportation = new ProcedureExportation();

	$modelContreConstat = new ContreConstat();

	$modelRejetProcedureExportation = new RejetProcedureExportation();

	$procedureEnAttentes = $modelProcedureExportation->get_procedure_exportation_all_info_by_statut_for_poste(3,forestier_user_id(Auth::user()->id)->id_poste);

	$procedureRejetes = $modelRejetProcedureExportation->get_procedure_rejeter_statut_apres_for_poste(1004,forestier_user_id(Auth::user()->id)->id_poste);

	$contre_constat_delivre = $modelContreConstat->get_contre_constats_all_info(forestier_user_id(Auth::user()->id)->id_poste);

	 $data_menu['contre_constat_en_attente']  = $procedureEnAttentes->count();
	 $data_menu['contre_constat_en_rejete']  = $procedureRejetes->count();
	 $data_menu['contre_constat_delivre']  = $contre_constat_delivre->count();

	 
	 	return $data_menu;
	 	
	 
	}

}

if (!function_exists('info_menu_laissez_passer')) {

   function info_menu_laissez_passer()
    {
     
    $modelProcedureExportation = new ProcedureExportation();

    $modelLaissezPasser = new LaissezPasser();

    $modelDemandeRejet = new RejetProcedureExportation();

    $passDelivres = $modelLaissezPasser->get_laissez_passers_all_info(forestier_user_id(Auth::user()->id)->id_poste);

    $procedureEnAttentes = $modelProcedureExportation->get_procedure_exportation_all_info_by_statut_for_poste(2, forestier_user_id(Auth::user()->id)->id_poste);

    $procedureEnAttentesExtension = $modelProcedureExportation->get_procedure_exportation_all_info_by_statut(7,forestier_user_id(Auth::user()->id)->id_poste);

    $procedureRejetes =  $modelDemandeRejet->get_procedure_rejeter_statut_apres_for_poste(1003,forestier_user_id(Auth::user()->id)->id_poste);

     $data_menu['lp_delivre']  = $passDelivres->count();
     $data_menu['procedure_attente_lp']  = $procedureEnAttentes->count();
     $data_menu['lp_a_etendre']  = $procedureEnAttentesExtension->count();
     $data_menu['demande_lp_rejet']  = $procedureRejetes->count();

     
        return $data_menu;
        
     
    }

}



if (!function_exists('info_menu_etat_versement')) {

   function info_menu_etat_versement()
    {
     
    $modelProcedureExportation = new ProcedureExportation();

    $modelEtatVersement = new EtatVersement();

    $etatDelivres = $modelEtatVersement->get_etat_versements_all_info(forestier_user_id(Auth::user()->id)->id_poste);
    
    $etatAttentes = $modelProcedureExportation->get_procedure_exportation_all_info_by_statut_for_poste(4,forestier_user_id(Auth::user()->id)->id_poste);

     $data_menu['etat_delivre']  = $etatDelivres->count();
     $data_menu['etat_en_attente']  = $etatAttentes->count();
          
        return $data_menu;
        
     
    }

}

if (!function_exists('info_menu_avis_technique')) {

   function info_menu_avis_technique()
    {
     
    $modelProcedureExportation = new ProcedureExportation();

    $modelAvisTechnique = new AvisTechnique();

    $modelAvisRejet = new RejetProcedureExportation();


    $avis_delivres = $modelAvisTechnique->get_avis_techniques_all_info(forestier_user_id(Auth::user()->id)->id_poste);
    
     $avis_attentes = $modelProcedureExportation->get_procedure_exportation_all_info_by_statut_for_poste(6, forestier_user_id(Auth::user()->id)->id_poste);

     $avis_rejet = $modelAvisRejet->get_procedure_rejeter_statut_apres_for_poste(1007,forestier_user_id(Auth::user()->id)->id_poste);

     $avis_etendre = $modelAvisTechnique->get_avis_techniques_to_extend_by_id_for_poste(forestier_user_id(Auth::user()->id)->id_poste);

     $data_menu['avis_delivres']  = $avis_delivres->count();
     $data_menu['avis_attentes']  = $avis_attentes->count();
     $data_menu['avis_rejet']  = $avis_rejet->count();
     $data_menu['avis_etendre']  = $avis_etendre->count();
          
        return $data_menu;
        
     
    }

}


if (!function_exists('demande_code')) {

   function demande_code( $num="6",$code="DGEFC/DRAF/SA")
	{
	 
	 //return strtoupper($num)."/".$code;
	 return "N°".$num."/".$code;
	}

}


if (!function_exists('process_code_CIF')) {

   function process_code_CIF($num, $code="DGEFC/DRAF")
	{
	 
	 //return strtoupper($num)."/".$code;
	 return "N° A".$num."/".$code;
	}

}

if (!function_exists('process_code_DRAF')) {

   function process_code_DRAF($num, $date, $code="DGEFC/DRAF/SAFN/SA")
    {
     
     //return strtoupper($num)."/".$code;
     return "N° ".$num."/".$date."/".$code;
    }

}


if (!function_exists('process_statut')) {

   function process_statut()
	{
	 
	 return [


	 		];
	}

}

if (!function_exists('nom_pays_id')) {

   function nom_pays_id($id)
	{
	 
	 $pays =  Pay::firstWhere('id', $id);
	 if($pays)
	 	return $pays->titre;
	 	return "";
	

	}

}

if (!function_exists('nom_user_id')) {

   function nom_user_id($id)
	{
	 
	 $nom_user =  User::firstWhere('id', $id);
	 if($nom_user)
	 	return $nom_user->name;
	 	return "";

	}

}



if (!function_exists('prenom_user_id')) {

   function prenom_user_id($id)
	{
	 
	 $prenom_user =  User::firstWhere('id', $id);
	 if($prenom_user)
	 	return $prenom_user->firstname;
	 	return "";
	}

}

if (!function_exists('user_by_id')) {

   function user_by_id($id)
	{
	 
	 $nom_user =  User::firstWhere('id', $id);
	 if($nom_user)
	 	return $nom_user;
	 	return null;

	}

}

if (!function_exists('nom_departement_id')) {

   function nom_departement_id($id)
	{
	 
	 $dep =  Departement::firstWhere('id', $id);
	 if($dep)
	 	return $dep->nom;
	 	return "";
	

	}
}

if (!function_exists('next_num_process')) {

   function next_num_process($departement)
	{
	 
	 $process = new  ProcedureExportation();
	/* $lastProcess = $process->where('departement_empotage',$departement)->where('commune_empotage',$commune)->max('created_at');*/

	 $depArray = [$departement, departement_mirror($departement)];
	 $lastProcess = $process->whereIn('departement_empotage',$depArray)
	 ->whereRaw('created_at = (select max(`created_at`) from procedure_exportations where `departement_empotage` IN ('.$departement.', '.departement_mirror($departement).'))')->get();

	 if(count($lastProcess) > 0)
	 {
	 	/*echo ($departement);
	 	echo "<br>";
	 	echo ($commune);
	 	dd($lastProcess);*/
	 	$numero = explode('/' , $lastProcess[0]->numero , 1);
	 	if(count($numero) > 0)
	 		return (int) trim(str_replace("N°","",$numero[0]));
	 		return 0;


	 }
	 	return 0;
	}
}


if (!function_exists('next_num_demande')) {

   function next_num_demande()
	{
		 $demande = new  DemandeAnnuelle();
		 $lastDemande = DemandeAnnuelle::count();
		 return  ($lastDemande>0)?($lastDemande+1):(1);
	 		
	}
}
if (!function_exists('section_traiter_link')) {

   function section_traiter_link($statut,$id)
  {
    switch ($statut) {
      case 1:
      return Route('show.traiter_constat',$id);
      case 1002:
      return Route('show.traiter_constat', $id); 
      default:
          return Route('show.traiter_constat',$id);
    }
      
  }
}
if (!function_exists('section_voir_link')) {

   function section_voir_link($statut,$id)
  {
    /*switch ($statut) {
      case 1:
      return Route('show.en_attente_constat',$id);
      case 1002:
      return Route('show.constat_rejete', $id); 
      default:
          return Route('show.en_attente_constat',$id);
    }*/
     return Route('process_show',$id);
      
  }
}

if (!function_exists('cif_traiter_link')) {

   function cif_traiter_link($statut,$id)
  {
    switch ($statut) {
      case 2:
      return Route('show.en_attente',$id);
      case 1003:
      return Route('show.demande_LP_rejet', id_rejet_process($id,1003)->id); 
      default:
      return Route('show.en_attente',$id);
    }
      
  }
}

if (!function_exists('douane_traiter_link')) {

   function douane_traiter_link($statut,$id)
  {
    switch ($statut) 
    {
      case 10:
      return Route('joindre_bfu',$id);
      case 12:
      return Route('liquider',$id); 
      default:
      return  Route('joindre_bfu',$id);
    }
      
  }
}


if (!function_exists('draf_traiter_link')) {

   function draf_traiter_link($statut,$id)
  {
    switch ($statut) {
      case 3:
      return Route('show.en_attente_contre_constat_traiter',$id);
      case 4:
      return Route('show.etat_attente', $id); 
      case 1004:
      return Route('show.en_attente_contre_constat_traiter',$id);
      case 6:
      return Route('show.avis_en_attente', $id);
      case 1007:
      return Route('show.demande_AT_rejet', id_rejet_process($id,1007)->id);
      
      default:
          return Route('show.en_attente_contre_constat_traiter',$id);
    }
      
  }
}

if (!function_exists('draf_voir_link')) {

   function draf_voir_link($statut,$id)
  {
    switch ($statut) {
      case 3:
      return route('show.en_attente_contre_constat_traiter',$id);
      case 4:
      return Route('show.etat_attente', $id); 
      case 1004:
      return Route('show.en_attente_contre_constat_traiter',id_rejet_process($id,1004)->id);
      case 6:
      return Route('show.avis_en_attente', $id);
      case 1007:
      return Route('show.demande_AT_rejet', id_rejet_process($id,1007)->id);
      
      default:
          return Route('show.en_attente_contre_constat_traiter',$id);
    }
      
  }
}

if (!function_exists('id_rejet_process')) {

   function id_rejet_process($process,$statut)
  {
    
    return  RejetProcedureExportation::where('id_statut_apres_rejet',$statut)
            ->where('id_procedure_exportation',$process)->first(); 
  }
}



if (!function_exists('nom_commune_id')) {

   function nom_commune_id($id)
	{
	 
	 $commune =  Commune::firstWhere('id', $id);
	 if($commune)
	 	return $commune->nom;
	 	return "";
	

	}
}

if (!function_exists('demande_has_process')) {

   function demande_has_process($id)
	{
	 
	 $process =  ProcedureExportation::firstWhere('id_demande_annuelle', $id);
	 if($process)
	 	return true;
	 	return false;
	

	}
}

//Recupérer l'objet usager avec l'id du user
if (!function_exists('usager_id_user')) {

   function usager_id_user($id)
	{
	  $usager = Usager::firstWhere('id_user', $id);
	  if($usager)
	  	return $usager;
	  	return null;

	}
}

//Recupérer l'objet user avec l'id de l'usager
if (!function_exists('user_usager_id')) {

   function user_usager_id($id)
	{
	  $usager = Usager::firstWhere('id', $id);
	  if($usager)
	  	{
	  		$user_id =  $usager->id_user;
	  		 $user = User::firstWhere('id', $user_id);
	  		 if($user)
			  	return $user;
			  	return null;
	  	}		
	  	return null;

	}
}

//Recupérer l'objet user avec l'id du forestier
if (!function_exists('user_forestier_id')) {

   function user_forestier_id($id)
	{
	  $forestier = Forestier::firstWhere('id', $id);
	
	  if($forestier)
	  	{

	  		$user_id =  $forestier->id_user;

	  		$user = User::firstWhere('id', $user_id);
	  		 if($user)
			  	return $user;
			  	return null;
	  	}		
	  	return null;

	}
}

//Recupérer l'objet user avec l'id du forestier
if (!function_exists('user_forestier_id')) {

   function user_forestier_id($id)
    {
      $forestier = Forestier::firstWhere('id', $id);
    
      if($forestier)
        {
            $user_id =  $forestier->get()[0]->id_user;

            $user = User::firstWhere('id', $user_id);
             if($user)
                return $user;
                return null;
        }       
        return null;

    }
}

//Recupérer l'objet user avec l'id du forestier
if (!function_exists('user_usager_id')) {

   function user_forestier_id($id)
    {
      $forestier = Forestier::firstWhere('id', $id);
    
      if($forestier)
        {
            $user_id =  $forestier->get()[0]->id_user;

            $user = User::firstWhere('id', $user_id);
             if($user)
                return $user;
                return null;
        }       
        return null;

    }
}

//Recupérer l'objet user avec l'id du forestier
if (!function_exists('user_forestier_id2')) {

   function user_forestier_id2($id)
	{
	  $usager = Forestier::firstWhere('id', $id);
	 
	  if($usager)
	  	{

	  		// $user_id =  $usager->get()[0]->id_user;
	  		$user_id = $usager->id_user;
	  		 $user = User::firstWhere('id', $user_id);
	  		 if($user)
			  	return $user;
			  	return null;
	  	}		
	  	return null;

	}
}


//Recupérer l'objet forestier avec l'id du user
if (!function_exists('forestier_user_id')) {

   function forestier_user_id($id)
	{
	  $usager = Forestier::firstWhere('id_user', $id);
	  if($usager)
			  	return $usager;
			  	return null;
	}
}

//Recupérer l'objet intervenant avec l'id du user
if (!function_exists('intervenant_user_id')) {

   function intervenant_user_id($id)
  {
    $usager = Intervenant::firstWhere('id_user', $id);
    if($usager)
          return $usager;
          return null;
  }
}


//Recupérer l'objet forestier avec l'id du user
if (!function_exists('forestier_forestier_id')) {

   function forestier_forestier_id($id)
	{
	  $usager = Forestier::firstWhere('id', $id);
	  if($usager)
			  	return $usager;
			  	return null;
	}
}


if (!function_exists('all_years')) {

   function all_years()
	{
	 return DemandeAnnuelle::distinct()->get(['demande_pour_annee']);
	 
	}
}



if (!function_exists('demande_has_proces')) {

   function usager_makes_demande($id, $annee)
	{
	  //$demande =   DemandeAnnuelle::where('id_usager', $id)->whereYear('created_at', $annee)->first();
	  $demande =   DemandeAnnuelle::where('id_usager', $id)->where('demande_pour_annee', $annee)->first();

	  if($demande)
	  	return true;
	  	return false;
	}
}


	if (!function_exists('numero_departement')) {

	   function numero_departement($id)
		{
		 
		 switch ($id) {
		 	case 1:
		 		return '01';
		 	case 2:
		 		return '01';
		 	case 3:
		 		return '02';
		 	case 4:
		 		return '02';
		 	case 5:
		 		return '03';
		 	case 6:
		 		return '03';
		 	case 7:
		 		return '04';
		 	case 8:
		 		return '04';
		 	case 9:
		 		return '05';
		 	case 10:
		 		return '05';
		 	case 11:
		 		return '06';
		 	case 12:
		 		return '06';
		 		
		 	
		 	default:
		 		return '';
		 }
		 
	}
}




	if (!function_exists('departement_mirror')) {

	   function departement_mirror($id)
		{
		 
		 switch ($id) 
		 {
		 	case 1:
		 		return 2;
		 	case 2:
		 		return 1;
		 	case 3:
		 		return 4;
		 	case 4:
		 		return 3;
		 	case 5:
		 		return 6;
		 	case 6:
		 		return 5;
		 	case 7:
		 		return 8;
		 	case 8:
		 		return 7;
		 	case 9:
		 		return 10;
		 	case 10:
		 		return 9;
		 	case 11:
		 		return 12;
		 	case 12:
		 		return 11;
		 		
		 	
		 	default:
		 		return '';
		 }
		 
	}

}





if (!function_exists('type_produit')) {

   function type_produit($id, $produit)
	{
		
	     $data = TypeProduit::where('categorie', $id)
	       ->get();
	    $output = '';

	     foreach($data as $row)
	     {

	      $output .= ($row->id == $produit) ? ('<option value="'.$row->id.'" selected>'.$row->designation.'</option>') : ('<option value="'.$row->id.'">'.$row->designation.'</option>')

	      

	      ;
	     }

	    
	     return $output;
	}

}

if (!function_exists('espece_produit')) {

   function espece_produit($espece)
	{
		
	     $data = EspeceProduit::all();
	    $output = '';

	     foreach($data as $row)
	     {

	      $output .= ($row->id == $espece) ? ('<option value="'.$row->id.'" selected>'.$row->designation.'</option>') : ('<option value="'.$row->id.'">'.$row->designation.'</option>');
	     }
	     return $output;
	}

}


if (!function_exists('carateristique_save')) {
   function carateristique_save(Request $request, $nombre, $categorie, $process)
	{
   			
   		if($nombre > 0)
   		{
            $volume_total = 0;
             $data1 = [];
              //dd($request);
             $j = 0;
             $nbr = 0;
             while ( $nbr < $nombre) {
             	if($request->input('espece_'.$categorie.$j) > 0){
             		 $data1 =[
                    "id_procedure_exportation"=>$process,
                    "id_espece_produit"=>$request->input('espece_'.$categorie.$j),
                    "id_type_produit"=>$request->input('produit_'.$categorie.$j),
                    "epaisseur"=>$request->input('epaisseur_'.$categorie.$j),
                    "largeur"=>$request->input('largeur_'.$categorie.$j),
                    "longueur"=>$request->input('longueur_'.$categorie.$j),
                    "volume"=>$request->input('volume_'.$categorie.$j),
                ];
                $volume_total += $request->input('volume_'.$categorie.$j);
                CaracteristiqueProduitProcedureExportation::create($data1);
                	$nbr++;
             	}
             	$j++;
             }
			 return $volume_total;	
		
   		}
         
       
        
	    
	}

}

// --------------------------------------Update etat_versement------------------------------------


if (!function_exists('carateristique_update')) {
   function carateristique_update(Request $request, $carateristique)
    {
            
    
            $montant_total = 0;
             $data1 = [];
           
             foreach ($carateristique as $caract) {

                  if($request->input('esp_'.$caract->id) != ""){
                     $data1 =[

                     "type_exploitation" => $request->input('esp_'.$caract->id),
                     "nature_recette" => $request->input('rec_'.$caract->id)
                ];

                $montant_total += $caract->volume * $caract->prix_unitaire;

                CaracteristiqueProduitProcedureExportation::where('id',(int)$caract->id)->update($data1);
               
                  
                }
             
            
    }  
     return $montant_total;

    }
}



if (!function_exists('recaptcha_verify')) {
    function recaptcha_verify(array $data) {      
        //var_dump($data);exit;
        //$json = json_encode($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($json)));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $ret = curl_exec($ch);
        return json_decode($ret)->success;
    }
}

if (!function_exists('getMonthList')) {
    function getMonthList()
{
	return ["01"=>"Janvier", "02"=>"Février","03"=>"Mars", "04"=>"Avril", "05"=>"Mai", "06"=>"Juin", "07"=>"Juillet", "08"=>"Août", "09"=>"Septembre", "10"=>"Octobre","11"=>"Novembre", "12"=>"Décembre"];
}
}

if (!function_exists('formater_date')) {
    function formater_date($text)
 {
  $date=date_create($text);
  return  date_format($date,"d-m-Y");
 }
}

if (!function_exists('formater_datetime')) {
    function formater_datetime($text)
 {
  $date=date_create($text);
  return  date_format($date,"d-m-Y à H:i:s");
 }
}


if (!function_exists('has_constat_conformite')) {
    function has_constat_conformite($id)
 {
    $cc = new ConstatConformite();
    $constat = $cc->firstWhere('id_procedure_exportation', $id);
    return ($constat) ? ($constat) : null;
 }
}

if (!function_exists('has_constat_conformite_rejeter')) {
    function has_constat_conformite_rejeter($id)
 {
    $cc = new RejetProcedureExportation();
    $constat = $cc->where('id_procedure_exportation', $id)->where('id_statut_apres_rejet', 1002)->first();
    return ($constat) ? ($constat) : null;
 }
}

