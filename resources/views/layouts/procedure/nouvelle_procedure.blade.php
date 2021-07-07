<style type="text/css">
.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #ccc; 
}

.panel {
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;
}
.accordion:after {
  content: '\02795'; /* Unicode character for "plus" sign (+) */
  font-size: 13px;
  color: #777;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2796"; /* Unicode character for "minus" sign (-) */
}

.bg-gradient-orange {
    background: #F6B14D linear-gradient(
180deg 
, #D8850E, #F6B14D) repeat-x !important;
}
.bg-gradient-orange {
    color: #fff;
}
.bg-gradient-orange.btn:hover {
    color: #fff;
}


/*Fieldset

fieldset {
  background-color: #ccc;
  

}

legend {
  background-color: gray;
  color: white;
  padding: 5px 10px;
  text-align:  center;
}

, 'pattern'=>"[0-9]{3}-[0-9]{2}-[0-9]{3}"S
*/


#loader {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  background: rgba(0,0,0,0.75) url(images/loading2.gif) no-repeat center center;
  z-index: 10000;
}

</style>

<div class="container-fluid" style="margin-top: 2%">
	<div class="row">
		
		<div class="col-md-12">

		<div class="card">
			<div class="card-header">
						
					<h3 class="card-title" style="font-weight: bold;text-align: center;width: 100%">DÉMARRER UNE PROCÉDURE D’EXPORTATION</h4>
			</div>
			<div class="card-body">
				<div class="col-md-12">
					<?php
						echo Form::open(array('route' =>(isset($process)) ? ("process.update") : ("process.create"), 'method' => 'post', 'id'=> 'idProcedureForm', 'enctype'=> 'multipart/form-data'))
					?>
					<input type="number" name="len1" hidden="" id="len1">
					<input type="number" name="len2" hidden="" id="len2">
					<input type="number" name="len3" hidden="" id="len3">
					<input type="number" name="len4" hidden="" id="len4">
					<input type="number" name="volume_total" hidden="" id="volume_total">
					<?php
					if(isset($process))
					{
					?>
						<input type="number" hidden="" name="id" value="<?= $process->id ?>">
						
					<?php
					}
					?>
					<div class="row">

						<div class="col-md-4">
							<div class="form-group">
							<?php

								echo Form::label('full_name', 'Nom et prénom du demandeur');
								echo Form::text('full_name_requerant',
									 Auth::user()->name .' '.Auth::user()->firstname ,array('class' => 'form-control','disabled'=>'true'));
								
								?>
							
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">

								<?php

								echo Form::label('numero_carte_professionnelle', 'Numéro carte professionnelle');
								echo Form::text('numero_carte_professionnelle',$usager->reference_carte_professionnelle,array('class' => 'form-control','disabled'=>'true'));
								
								?>
								
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<?php

								echo Form::label('card_number_expo', 'Numéro de carte exportateur');
								echo Form::text('numero_carte_exportateur',$usager->reference_permis_coupe,array('class' => 'form-control','disabled'=>'true'));
								
								?>
								
							</div>
						</div>

					</div>

					<div class="row" style="margin-top: 3%">

						<div class="col-md-4">
							<div class="form-group">
								<?php

								echo Form::label('dpartment_empotage', 'Département de provenance');
								echo Form::label('dpartment_empotage', '*',array('style' => 'color:red','required'=>true));
								?>
								<select name="departement_provenance" id="departement_provenance" title="Choisir le département de provenance" class="form-control" required="">
									@foreach($departement as $departements)
										<option value="{{$departements->id}}">{{$departements->nom}}</option>
									@endforeach
									
								</select>
																
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<?php

								echo Form::label('dpartment_of_origin', 'Lieu de provenance');
								echo Form::label('dpartment_of_origin', '*',array('style' => 'color:red','required'=>true));														
								?>
								<select name="commune_provenance" id="commune_provenance" title="Choisir la commune de provenance" class="form-control" required="">
									@foreach($commune as $communes)
										<option value="{{$communes->id}}">{{$communes->nom}}</option>
									@endforeach
									
								</select>
									
								</select>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<?php

								echo Form::label('to', 'En destination de');
								echo Form::label('to', '*',array('style' => 'color:red'));
																
								?>
								<select name="pays_destination" class="form-control" id="pays_destination" required="">
									@foreach($pays as $pay)
										<option value="{{$pay->id}}">{{$pay->titre}}</option>
									@endforeach
									
								</select>								
							</div>
						</div>

					</div>

					<div class="row" style="margin-top: 3%">

						<div class="col-md-4">
							<div class="form-group">

								<?php

								echo Form::label('dpartment_empotage', 'Département Empotage');
								echo Form::label('dpartment_empotage', '*',array('style' => 'color:red'));
								?>
								<select name="departement_empotage"  title="Choisir le departement d'empotage" class="form-control" required="" id="departement_empotage">
									@foreach($departement as $departements)
										<option value="{{$departements->id}}">{{$departements->nom}}</option>
									@endforeach
									
								</select>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<?php
								
								echo Form::label('commune_empotage', 'Commune Empotage');
								echo Form::label('commune_empotage', '*',array('style' => 'color:red'));
								?>
								<select name="commune_empotage"  title="choisir la commune d'empotage" class="form-control" required="" id="commune_empotage">
									@foreach($commune as $communes)
										<option value="{{$communes->id}}">{{$communes->nom}}</option>
									@endforeach
									
								</select>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">

								<?php

								echo Form::label('potting_place', 'Lieu Empotage');
								echo Form::label('potting_place', '*',array('style' => 'color:red'));
								echo Form::text('localite_empotage',(isset($process)) ? ($process->localite_empotage) : (""),array('class' => 'form-control','placeholder'=>'Saisir la localité','maxlength'=>'60','required'=>true,'title'=>"Saisir le lieu d'empotage"));
								

							?>								
							</div>
						</div>
					</div>


					<div class="row" style="margin-top: 3%">
						<div class="col-md-4">
							<div class="form-group">
								<?php

								echo Form::label('Date_dparture', 'Date départ');
								echo Form::label('Date_dparture', '*',array('style' => 'color:red'));
								echo Form::date('date_departs',(isset($process)) ? ($process->date_depart) : (""),array('class' => 'form-control','placeholder'=>'Sélectionner la date','id'=>'date_depart','required'=>true,'title'=>"Saisir la date de départ"));
								
								?>	
							 </div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<?php

								echo Form::label('ref_doc_of_origin', 'Document de provenance');
								echo Form::label('ref_doc_of_origin', '*',array('style' => 'color:red'));
								echo Form::text('reference_document_provenance',(isset($process)) ? ($process->reference_document_provenance) : (""),array('class' => 'form-control','placeholder'=>'Saisir la référence du document de provenance','maxlength'=>'60', 'title'=>'Saisir la référence du document de provenance','required'=>true));
								
								?>	
							</div>
						</div>

						<?php if(!isset($process)){?>
						<div class="col-md-4">
							<div class="form-group">

								<?php

								echo Form::label('ref_file', 'Document de référence (pdf)');
								echo Form::label('ref_file', '*',array('style' => 'color:red'));
								echo Form::input('file','document_reference',null, array('class' => 'form-control', 'title'=>'Seuls les documents pdf, image ou word sont autorisés','required'=>true));
								
								?>
								
							</div>
						</div>
						<?php }else{ ?>
						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('ref_file', 'Document de référence (pdf)');
								echo Form::label('ref_file', '*',array('style' => 'color:red'));
								echo Form::input('file','document_reference',null, array('class' => 'form-control', 'title'=>'Seuls les documents pdf, image ou word sont autorisés'));
								
								?>
								
							</div>
						</div>
						<div class="col-md-1">
							<div class="form-group">

								<?php
								echo Form::label('', '');
								?>
								<div class="" style="border: 1px solid black;background-color: #D2E2F9 ;border-radius: 5px;" >
									<a href="<?= show_doc($process->id,2)['link'] ?>" class="btn" target='_blank' ><i class="fa fa-download"></i></a>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
					



					<div class="row" style="margin-top: 3%">

						

						<div class="col-md-4">
							<div class="form-group">
								<?php
								
								echo Form::label('commune_empotage', 'Poste');
								echo Form::label('commune_empotage', '*',array('style' => 'color:red'));
								?>
								<select name="poste"  title="choisir un poste forestier"class="form-control" required=""
								 id="poste">
									@foreach($poste as $postes)
										<option value="{{$postes->id}}">{{$postes->nom}}</option>
									@endforeach
									
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">

								<?php

								echo Form::label('ref_container', 'Référence conteneur');
								echo Form::label('commune_empotage', '*',array('style' => 'color:red'));
								echo Form::text('reference_conteneur',(isset($process)) ? ($process->reference_plomb) : (""),array('class' => 'form-control','placeholder'=>'Saisir la référence du conteneur','maxlength'=>'60','required'=>true,'title'=>'Saisir la référence du conteneur'));
								
							?>
								
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">

								<?php

								echo Form::label('ref_plond', 'Référence de plomb');
								echo Form::label('commune_empotage', '*',array('style' => 'color:red'));
								echo Form::text('reference_plomb',(isset($process)) ? ($process->reference_plomb) : (""),array('class' => 'form-control','placeholder'=>'Saisir la référence du plomb','maxlength'=>'60',
									'required'=>true,'title'=>'Saisir la référence du plomb'));
								
								?>
								
							</div>
						</div>
					</div>

					<div class="row">

						<div class="col-md-4">
							<div class="form-group">

								<?php

								echo Form::label('ref_transport', 'Référence transport');
								echo Form::label('commune_empotage', '*',array('style' => 'color:red'));
								echo Form::text('reference_transporteur',(isset($process)) ? ($process->reference_transporteur): (""),array('class' => 'form-control','placeholder'=>'Saisir le numéro du véhicule','maxlength'=>'60','required'=>true,'title'=>'Saisir le numéro du véhicule'));
								
							?>
								
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">

								<?php

								echo Form::label('driver_name', 'Nom et prénom du conducteur');
								echo Form::label('commune_empotage', '*',array('style' => 'color:red'));
								echo Form::text('nom_conducteur',(isset($process)) ? ($process->nom_conducteur): (""),array('class' => 'form-control','placeholder'=>'Saisir le nom du conducteur','maxlength'=>'60','required'=>true,'title'=>'Saisir le nom du conducteur'));
								
							?>
								
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">

								<?php

								echo Form::label('driver_name', 'Téléphone du conducteur');
								echo Form::label('commune_empotage', '*',array('style' => 'color:red'));
								echo Form::tel('telephone_conducteur',(isset($process)) ? ($process->telephone_conducteur): ("+229"),array('class' => 'form-control','placeholder'=>'97000000','maxlength'=>'13','minlength'=>'8','required'=>true,'title'=>'Saisir un téléphone valid du Bénin', 'pattern'=>"^((\+229)|(00229)|())((51)|(6[0-9]{1})|(9[0-1-4-5-6-7-8-9]{1}))([0-9]{6})"));
								
							?>
								
							</div>
						</div>


					</div>

				<h4 style="text-align: center;width: 100%;margin-top: 3%;font-weight: bold;">Nature et quantité des produits:
				</h4>

<div class="row" style="margin-top: 3%;">
		<div class="col-md-5">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<?php

							echo Form::label('essence_bille', 'Catégories');
							echo Form::label('essence_bille', '*',array('style' => 'color:red'));
							echo Form::select('categorie',  array('1' => '1','2' => '2', '3'=>'3', '4'=>'4'), '',array('class'=>'form-control', 'id'=>'categorie','required'=>true,'title'=>'Choisir une catégorie'));
									
						?>				
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<?php

						echo Form::label('product_bille', 'Produit');
					    echo Form::label('essence_bille', '*',array('style' => 'color:red'));
											
						?>
								<select name="produit" class="form-control" required="" id="produit" title="Choisir un nom produit">
									@foreach($produit as $produits)
										<option value="{{$produits->id}}">{{$produits->designation}}</option>
									@endforeach
								</select>		
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<?php

							echo Form::label('essence_bille', 'Essence');
							echo Form::label('essence_bille', '*',array('style' => 'color:red'));
						?>
								<select name="essence" class="form-control" required="" id="essence"title="Choisir une essence">
									@foreach($essence as $essences)
										<option value="{{$essences->id}}">{{$essences->designation}}</option>
									@endforeach
								</select>			
					</div>
				</div>
			</div>
			
		</div>

		<div class="col-md-7">
			<div class="row">
				<div class="col-md-10">
					<div class="row">
						<div class="col-md-3">
					<div class="form-group">
						<?php
							echo Form::label('dimension_bille', 'Epaisser');
							echo Form::number('epaisseur','',array('class' => 'form-control','placeholder'=>"Saisir l'épaisseur",'min'=>'0.1','step'=>'any', 'id'=>'epaisseur'));
									
						?>			
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<?php

							echo Form::label('dimension_bille', 'Longueur');
							echo Form::number('longueur','',array('class' => 'form-control','placeholder'=>"Saisir la longueur",'min'=>'0.1','step'=>'any', 'id'=>'longueur'));
							
									
						?>			
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<?php

							echo Form::label('dimension_bille', 'Largeur');
							echo Form::number('largeur','',array('class' => 'form-control','placeholder'=>"Saisir la largeur",'min'=>'0.1','step'=>'any', 'id'=>'largeur'));
									
						?>			
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<?php

							echo Form::label('dimension_bille', 'Volume');
							echo Form::label('dimension_bille', '*',array('style' => 'color:red'));
							echo Form::number('volume',(isset($process)) ? (1) : (0),array('class' => 'form-control','placeholder'=>"Saisir la largeur",'min'=>'0.1','step'=>'any', 'id'=>'volume','required'=>true));
							
						?>	
							
					</div>

				</div>
						
					</div>
				</div>
				<div class="col-md-2">
					<div class="row">
						<div class="col-md-1">
							<div class="form-group" style="margin-top: 35px;">
								<button id="addBtn"  style="border: 1px solid black;background-color: green ;"  title="Ajouter ce produit">
										<i class="fa fa-plus"></i>
								</button>	
							</div>
						</div>
					</div>
				</div>
				
							
			</div>
		</div>				
	</div>



<div style="margin-top: 2%;" id="details">
<span class="accordion c1">Catégorie 1</span>
<div class="panel c1">
	<?php
	if(isset($caracteristique1))
	{
		$i=0;
		$line = 0;
        foreach ($caracteristique1 as $cat1)
        {
         $line_id = '1'.$i 
         ?>
		  <div class='row' id='{{$line_id}}' style='margin-top: 3%'>
	        <div class='col-md-5'>
	            <div class='row'>
	                <div class='col-md-4'>
	                    
	                </div>
	                <div class='col-md-4'>
	                    <div class='form-group'>
	                        <select class='form-control'  id='produit_{{$line_id}}' name='produit_{{$line_id}}'>
	                       <?=  type_produit(1, $cat1->id_type_produit)?>
	                        </select>          
	                    </div>
	                </div>
	                <div class='col-md-4'>
	                    <div class='form-group'>
	                        <select class='form-control' id='espece_{{$line_id}}' name='espece_{{$line_id}}'>
	                            <?=  espece_produit($cat1->id_espece_produit)?>
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
	                                <input class='form-control' placeholder="Saisir l'épaisseur" min='0.1' step='any' name='epaisseur_{{$line_id}}' type='number' value='{{$cat1->epaisseur}}' >          
	                            </div>
	                        </div>
	                        <div class='col-md-3'>
	                            <div class='form-group'>
	                               <input class='form-control' placeholder='Saisir la longueur' min='0.1' step='any' name='longueur_{{$line_id}}' type='number' value='{{$cat1->longueur}}' >          
	                            </div>
	                        </div>
	                        <div class='col-md-3'>
	                            <div class='form-group'>
	                                <input class='form-control' placeholder='Saisir la largeur' min='0.1' step='any' name='largeur_{{$line_id}}' type='number' value='{{$cat1->largeur}}' >            
	                            </div>
	                        </div>
	                        <div class='col-md-3'>
	                            <div class='form-group'>
	                                <input class='form-control' placeholder='Saisir le volume' min='0.1' step='any' name='volume_{{$line_id}}' type='number' value='{{$cat1->volume}}' >            
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class='col-md-2'>
	                    <div class='row'>
	                        <div class='col-md-1'>
	                            <div class='form-group {{$line_id}}' style='margin-top: 0px;'>
	                                <button style='border: 1px solid black;background-color: red ;' title='Supprimer ce produit' onclick='rmChild(<?=$line_id?>);'>
	                                        <i class='fa fa-minus'></i>
	                                </button>   
	                            </div>
	                        </div>
	                    </div>
	                </div>

	            </div>
	        </div>              
	    </div>
	    <?php
	    $i++;
		}

	}
   ?>
</div>




<span class="accordion c2">Catégorie 2</span>
<div class="panel c2">

	<?php
	if(isset($caracteristique2))
	{
		$i=0;
		$line = 0;
        foreach ($caracteristique2 as $cat1)
        {
         $line_id = '2'.$i 
         ?>
		  <div class='row' id='{{$line_id}}' style='margin-top: 3%'>
	        <div class='col-md-5'>
	            <div class='row'>
	                <div class='col-md-4'>
	                    
	                </div>
	                <div class='col-md-4'>
	                    <div class='form-group'>
	                        <select class='form-control'  id='produit_{{$line_id}}' name='produit_{{$line_id}}'>
	                        <?=  type_produit(2, $cat1->id_type_produit)?>
	                        </select>          
	                    </div>
	                </div>
	                <div class='col-md-4'>
	                    <div class='form-group'>
	                        <select class='form-control' id='espece_{{$line_id}}' name='espece_{{$line_id}}'>
	                            <?=  espece_produit($cat1->id_espece_produit)?>
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
	                                <input class='form-control' placeholder="Saisir l'épaisseur" min='0.1' step='any' name='epaisseur_{{$line_id}}' type='number' value='{{$cat1->epaisseur}}' >          
	                            </div>
	                        </div>
	                        <div class='col-md-3'>
	                            <div class='form-group'>
	                               <input class='form-control' placeholder='Saisir la longueur' min='0.1' step='any' name='longueur_{{$line_id}}' type='number' value='{{$cat1->longueur}}' >          
	                            </div>
	                        </div>
	                        <div class='col-md-3'>
	                            <div class='form-group'>
	                                <input class='form-control' placeholder='Saisir la largeur' min='0.1' step='any' name='largeur_{{$line_id}}' type='number' value='{{$cat1->largeur}}' >            
	                            </div>
	                        </div>
	                        <div class='col-md-3'>
	                            <div class='form-group'>
	                                <input class='form-control' placeholder='Saisir le volume' min='0.1' step='any' name='volume_{{$line_id}}' type='number' value='{{$cat1->volume}}' >            
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class='col-md-2'>
	                    <div class='row'>
	                        <div class='col-md-1'>
	                            <div class='form-group {{$line_id}}' style='margin-top: 0px;'>
	                                <button style='border: 1px solid black;background-color: red ;' title='Supprimer ce produit' onclick='rmChild(<?=$line_id?>);'>
	                                        <i class='fa fa-minus'></i>
	                                </button>   
	                            </div>
	                        </div>
	                    </div>
	                </div>

	            </div>
	        </div>              
	    </div>
	    <?php
	    $i++;
		}

	}
   ?>

</div>



<button class="accordion c3">Catégorie 3</button>
<div class="panel c3">
	<?php
	if(isset($caracteristique3))
	{
		$i=0;
		$line = 0;
        foreach ($caracteristique3 as $cat1)
        {
         $line_id = '3'.$i 
         ?>
		  <div class='row' id='{{$line_id}}' style='margin-top: 3%'>
	        <div class='col-md-5'>
	            <div class='row'>
	                <div class='col-md-4'>
	                    
	                </div>
	                <div class='col-md-4'>
	                    <div class='form-group'>
	                        <select class='form-control'  id='produit_{{$line_id}}' name='produit_{{$line_id}}'>
	                        <?=  type_produit(3, $cat1->id_type_produit)?>
	                        </select>          
	                    </div>
	                </div>
	                <div class='col-md-4'>
	                    <div class='form-group'>
	                        <select class='form-control' id='espece_{{$line_id}}' name='espece_{{$line_id}}'>
	                           <?=  espece_produit($cat1->id_espece_produit)?>
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
	                                <input class='form-control' placeholder="Saisir l'épaisseur" min='0.1' step='any' name='epaisseur_{{$line_id}}' type='number' value='{{$cat1->epaisseur}}' >          
	                            </div>
	                        </div>
	                        <div class='col-md-3'>
	                            <div class='form-group'>
	                               <input class='form-control' placeholder='Saisir la longueur' min='0.1' step='any' name='longueur_{{$line_id}}' type='number' value='{{$cat1->longueur}}' >          
	                            </div>
	                        </div>
	                        <div class='col-md-3'>
	                            <div class='form-group'>
	                                <input class='form-control' placeholder='Saisir la largeur' min='0.1' step='any' name='largeur_{{$line_id}}' type='number' value='{{$cat1->largeur}}' >            
	                            </div>
	                        </div>
	                        <div class='col-md-3'>
	                            <div class='form-group'>
	                                <input class='form-control' placeholder='Saisir le volume' min='0.1' step='any' name='volume_{{$line_id}}' type='number' value='{{$cat1->volume}}' >            
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class='col-md-2'>
	                    <div class='row'>
	                        <div class='col-md-1'>
	                            <div class='form-group {{$line_id}}' style='margin-top: 0px;'>
	                                <button style='border: 1px solid black;background-color: red ;' title='Supprimer ce produit' onclick='rmChild(<?=$line_id?>);'>
	                                        <i class='fa fa-minus'></i>
	                                </button>   
	                            </div>
	                        </div>
	                    </div>
	                </div>

	            </div>
	        </div>              
	    </div>
	    <?php
	    $i++;
		}

	}
   ?>

</div>


<button class="accordion c4">Catégorie 4</button>
<div class="panel c4">
	<?php
	if(isset($caracteristique4))
	{
		$i=0;
		$line = 0;
        foreach ($caracteristique4 as $cat1)
        {
         $line_id = '4'.$i 
         ?>
		  <div class='row' id='{{$line_id}}' style='margin-top: 3%'>
	        <div class='col-md-5'>
	            <div class='row'>
	                <div class='col-md-4'>
	                    
	                </div>
	                <div class='col-md-4'>
	                    <div class='form-group'>
	                        <select class='form-control'  id='produit_{{$line_id}}' name='produit_{{$line_id}}'>
	                        <?=  type_produit(4, $cat1->id_type_produit)?>
	                        </select>          
	                    </div>
	                </div>
	                <div class='col-md-4'>
	                    <div class='form-group'>
	                        <select class='form-control' id='espece_{{$line_id}}' name='espece_{{$line_id}}'>
	                            <?=  espece_produit($cat1->id_espece_produit)?>
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
	                                <input class='form-control' placeholder="Saisir l'épaisseur" min='0.1' step='any' name='epaisseur_{{$line_id}}' type='number' value='{{$cat1->epaisseur}}' >          
	                            </div>
	                        </div>
	                        <div class='col-md-3'>
	                            <div class='form-group'>
	                               <input class='form-control' placeholder='Saisir la longueur' min='0.1' step='any' name='longueur_{{$line_id}}' type='number' value='{{$cat1->longueur}}' >          
	                            </div>
	                        </div>
	                        <div class='col-md-3'>
	                            <div class='form-group'>
	                                <input class='form-control' placeholder='Saisir la largeur' min='0.1' step='any' name='largeur_{{$line_id}}' type='number' value='{{$cat1->largeur}}' >            
	                            </div>
	                        </div>
	                        <div class='col-md-3'>
	                            <div class='form-group'>
	                                <input class='form-control' placeholder='Saisir le volume' min='0.1' step='any' name='volume_{{$line_id}}' type='number' value='{{$cat1->volume}}' >            
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class='col-md-2'>
	                    <div class='row'>
	                        <div class='col-md-1'>
	                            <div class='form-group {{$line_id}}' style='margin-top: 0px;'>
	                                <button style='border: 1px solid black;background-color: red ;' title='Supprimer ce produit' onclick='rmChild(<?=$line_id?>);'>
	                                        <i class='fa fa-minus'></i>
	                                </button>   
	                            </div>
	                        </div>
	                    </div>
	                </div>

	            </div>
	        </div>              
	    </div>
	    <?php
	    $i++;
		}

	}
   ?>
</div>







<div class="row" style="margin-top: 3%">

	<div class="col-md-2 offset-md-7">
		<div class="form-group">

			<?php

				echo Form::submit((isset($process)) ? ("Modifier") : ("Enregistrer"),array('class' => 'form-control btn btn-block bg-gradient-success'));
	
			?>	
							
		</div>
</div>

<div class="col-md-2 offset-md-1">
	<div class="form-group">
						
				<a class="btn btn-block btn-info" href="{{session('back')}}">Retour</a>												
	</div>
</div>

						
						

</div>



				</div>

				</div>
	{{ Form::close() }}
			</div>
			
		</div>
		</div>
	
	</div>	
</div>
<script type="text/javascript">
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0 so need to add 1 to make it 1!
var yyyy = today.getFullYear();
if(dd<10){
  dd='0'+dd
} 
if(mm<10){
  mm='0'+mm
} 

today = yyyy+'-'+mm+'-'+dd;
end = yyyy+'-'+'12'+'-'+'31';
document.getElementById("date_depart").setAttribute("min", today);
document.getElementById("date_depart").setAttribute("max", end);
var newLineData ="";
var details = document.getElementById("details");
var categorie = document.getElementById("categorie");
var categorie1 = document.getElementsByClassName("c1");
var categorie2 = document.getElementsByClassName("c2");
var categorie3 = document.getElementsByClassName("c3");
var categorie4 = document.getElementsByClassName("c4");
var produit = document.getElementById("produit");
var essence = document.getElementById("essence");
var longueur = document.getElementById("longueur");
var largeur = document.getElementById("largeur");
var epaisseur = document.getElementById("epaisseur");
var volume_total = document.getElementById("volume_total");
var len1 = document.getElementById("len1");
var len2 = document.getElementById("len2");
var len3 = document.getElementById("len3");
var len4 = document.getElementById("len4");


details.style.display = "none";
categorie1[0].style.display = "none";
categorie1[1].style.display = "none";
categorie2[0].style.display = "none";
categorie2[1].style.display = "none";
categorie3[0].style.display = "none";
categorie3[1].style.display = "none";
categorie4[0].style.display = "none";
categorie4[1].style.display = "none";


var vue = <?= isset($vue) ? ($vue) : (0) ?>;
var nbrcat1 = <?= isset($nbrcat1) ? ($nbrcat1) : (0)  ?>;
var nbrcat2 = <?= isset($nbrcat2) ? ($nbrcat2) : (0)  ?>;
var nbrcat3 = <?= isset($nbrcat3) ? ($nbrcat3) : (0)  ?>;
var nbrcat4 = <?= isset($nbrcat4) ? ($nbrcat4) : (0)  ?>;
var categorieList = [0,0,0,0];




/*var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
*/
function addProduct() {
	var categorie_value =  categorie.value;
	var produit_value =  produit.value;
	var essence_value =  essence.value;
	var epaisseur_value =  epaisseur.value;
	var longueur_value =  longueur.value;
	var largeur_value =  largeur.value;
	var volume_value =  volume.value;

	detailsToggle(1);
	addCategorie(categorie_value);
	switch(categorie_value) {
	  case "1":
	    	categorie1[0].style.display = "block";
	    	categorie1[1].style.display = "block";
	    	categorie1[1].innerHTML += newLineData;	
	    	detailsToggle(1);
	    	
	    break;
	  case "2":
	    categorie2[0].style.display = "block";
	    categorie2[1].style.display = "block";
	    categorie2[1].innerHTML += newLineData;	
	    detailsToggle(1);
	    break;
	  case "3":
	    categorie3[0].style.display = "block";
	    categorie3[1].style.display = "block";
	    categorie3[1].innerHTML += newLineData;	
	    detailsToggle(1);
	    break;
	   case "4":
	    categorie4[0].style.display = "block";
	    categorie4[1].style.display = "block";
	    categorie4[1].innerHTML += newLineData;	
	    detailsToggle(1);
	    break;
	  default:
	  	detailsToggle(0);
	  	break;
	}
}

	



function addProductUpdate() {

	detailsToggle(1);
		//addCategorie(categorie_value);
		if (nbrcat1 > 0)
		{
		    categorie1[0].style.display = "block";
	    	categorie1[1].style.display = "block";
	    }

	    if (nbrcat2 > 0)
		{
		    categorie2[0].style.display = "block";
		    categorie2[1].style.display = "block";
	    }

	    if (nbrcat3 > 0)
		{
		    categorie3[0].style.display = "block";
		    categorie3[1].style.display = "block";
	    }

	    if (nbrcat4 > 0)
		{
		    categorie4[0].style.display = "block";
		    categorie4[1].style.display = "block";
	    }
	    

}

function detailsToggle(id) {
	if(id==1)
		details.style.display = "block";
	else
		details.style.display = "none";
}

function addCategorie(id) {
	if(categorieList.indexOf(id)==-1)
		categorieList.push(id);
}

function rmChild(id) {
	 var line = document.getElementById(id);
	 var str = ""+id;
     var cat = str.substring(1, 0);
  	 line.remove();
     
	 categorieList[cat-1] -= 1;
	 document.getElementById("len"+cat).value = categorieList[cat-1];
	 if( categorieList[cat-1]==0)
	 	categorieToggle(cat);
}


function categorieToggle(id) {

	switch(id) {
	  case "1":
	    	categorie1[0].style.display = "none";
	    	categorie1[1].style.display = "none";
	    	
	    break;
	  case "2":
	    categorie2[0].style.display = "none";
	    categorie2[1].style.display = "none";
	    
	    break;
	  case "3":
	    categorie3[0].style.display = "none";
	    categorie3[1].style.display = "none";
	   
	    break;
	   case "4":
	    categorie4[0].style.display = "none";
	    categorie4[1].style.display = "none";
	    
	    break;
	  default:
	  	detailsToggle(0);
	  	break;
	    

	}

}

function myCheckFields() {
  
 $("#idProcedureForm").validate().element("#volume");
} 


function addSelected(id, value) {
  
    $(id+' option').filter(
    	function(value){
                      return this.value == value; 

                  }
     ).attr('selected', 'selected')
} 




</script>










