<?php

namespace App\Http\Controllers\Usager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;

class UsagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function newDemand()
    {
         return view('/demande_annuelle');
    }
     public function newProcces()
    {
         return view('/nouvelle_procedure');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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

    public function buildProduct(Request $request)
    {

    $form = "
    <div class='row' id='$request->line_id' style='margin-top: 3%'>
        <div class='col-md-5'>
            <div class='row'>
                <div class='col-md-4'>
                    
                </div>
                <div class='col-md-4'>
                    <div class='form-group'>
                        <select class='form-control'  id='produit_$request->line_id' name='produit_$request->line_id'>
                        ".type_produit($request->categorie, $request->produit)."
                        </select>          
                    </div>
                </div>
                <div class='col-md-4'>
                    <div class='form-group'>
                        <select class='form-control' id='espece_$request->line_id' name='espece_$request->line_id'>
                            ".espece_produit($request->essence)."
                        </select>          
                    </div>
                </div>
            </div>
            
        </div>

        <div class='col-md-7'>
            <div class='row'>
                <div class='col-md-10'>
                    <div class='row'>
                        <div class='col-md-3'>
                            <div class='form-group'>
                                <input class='form-control' placeholder='Saisir l'épaisseur' min='0.1' step='any' name='epaisseur_$request->line_id' type='number' value='$request->epaisseur' id='dimension_bille'>          
                            </div>
                        </div>
                        <div class='col-md-3'>
                            <div class='form-group'>
                               <input class='form-control' placeholder='Saisir la longueur' min='0.1' step='any' name='longueur_$request->line_id' type='number' value='$request->longueur' id='dimension_bille'>          
                            </div>
                        </div>
                        <div class='col-md-3'>
                            <div class='form-group'>
                                <input class='form-control' placeholder='Saisir la largeur' min='0.1' step='any' name='largeur_$request->line_id' type='number' value='$request->largeur' id='dimension_bille'>            
                            </div>
                        </div>
                        <div class='col-md-3'>
                            <div class='form-group'>
                                <input class='form-control' placeholder='Saisir le volume' min='0.1' step='any' name='volume_$request->line_id' type='number' value='$request->volume' id='dimension_bille'>            
                            </div>
                        </div>
                    </div>
                </div>
                <div class='col-md-2'>
                    <div class='row'>
                        <div class='col-md-1'>
                            <div class='form-group $request->line_id' style='margin-top: 0px;'>
                                <button style='border: 1px solid black;background-color: red ;' title='Supprimer ce produit' onclick='rmChild($request->line_id);'>
                                        <i class='fa fa-minus'></i>
                                </button>   
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>              
    </div>

        ";
return $form;
    }
}
