<?php

//DynamicDepdendent.php

namespace App\Http\Controllers\Dynamic;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DynamicController extends Controller
{
    function index()
    {
echo 'DynamicDependent';
    }




    function fetch(Request $request)
    {
	     $select = $request->get('select');
	     $value = $request->get('value');
	     $dependent = $request->get('dependent');
	     $data = DB::table('type_produits')
	       ->where($select, $value)
	       ->groupBy($dependent)
	       ->get();
	     $output = '<option value="">Select '.ucfirst($dependent).'</option>';
	     foreach($data as $row)
	     {
	      $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
	     }
	     echo $output;
    } 

    function typeProduit(Request $request)
    {
	     $select = $request->get('select');
	     $value = $request->get('value');

	     $data = DB::table('type_produits')
	       ->where('categorie', $value)
	       
	       ->get();
	    $output = '';

	     foreach($data as $row)
	     {

	      $output .= '<option value="'.$row->id.'">'.$row->designation.'</option>';
	     }
	     echo $output;
    } 

     function communeDepartementProvenance(Request $request)
    {
	     $select = $request->get('select');
	     $value = $request->get('value');

	     $data = DB::table('communes')
	       ->where('id_departement', $value)
	       ->get();
	    $output = '';
	     foreach($data as $row)
	     {

	      $output .= '<option value="'.$row->id.'">'.$row->nom.'</option>';
	     }
	     echo $output;
    }
     function communeDepartementEmpotage(Request $request)
    {
	     $select = $request->get('select');
	     $value = $request->get('value');

	     $data = DB::table('communes')
	       ->where('id_departement', $value)
	       ->where('statut', 1)
	       ->get();
	    $output = '';
	     foreach($data as $row)
	     {

	      $output .= '<option value="'.$row->id.'">'.$row->nom.'</option>';
	     }
	     echo $output;
    }

     function posteCommuneEmpotage(Request $request)
    {
	     $select = $request->get('select');
	     $value = $request->get('value');

	     $data = DB::table('postes')
	       ->where('id_commune', $value)
	       ->whereIn('type', [106,105])
	       ->get();
	    $output = '';

	     foreach($data as $row)
	     {
	      $output .= '<option value="'.$row->id.'">'.$row->nom.'</option>';
	     }
	     echo $output;
    }


}

?>
