<style type="text/css">
	.panel {
	  padding: 0 18px;
	  display: none;
	  background-color: white;
	  overflow: hidden;
	}

	.bg-red{
		background-color: #EC7063;
	}

	.annuler{
		color: white;
	}

	
</style>

<div class="container-fluid" style="margin-top: 2%;">
	<div class="row" style="margin-bottom: 3%;">
		<div class="col-md-12">
			<h3 style="text-align: center;">SCANNING D’UNE PROCÉDURE D’EXPORTATION</h3>
			<div class="card">
				<div class="card-header" style="background-color: #ABB2B9">
					<h3 class="card-title" style="font-weight: bold;text-align: center;width: 100%;">DETAILS DE LA PROCEDURE</h3>
				</div>
				<?php
					
					echo Form::open(array('route' => 'scan.create', 'method' => 'post', 'id'=> 'idProcedureForm3', 'enctype'=> 'multipart/form-data'))

				?>
				@csrf
				<input type="number" name="id" hidden="" value="{{(isset($procedureEnAttentesDetails->id_procedure_exportation)) ? ($procedureEnAttentesDetails->id_procedure_exportation) : ($procedureEnAttentesDetails->id) }}">
				<div class="card-body">
					<div class="col-md-12">
						<div class="row">

						<div class="col-md-3">
							<div class="form-group">


								<?php


								echo Form::label('proc_number', 'Numéro de procédure');
								echo Form::text('proc_number',$procedureEnAttentesDetails->numero,array('class' => 'form-control', 'readonly' => 'readonly'));
								
								?>
								
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

							<?php

								echo Form::label('date_procedure', 'Date de procédure');
								echo Form::text('date_procedure',$procedureEnAttentesDetails->created_at,array('class' => 'form-control','disabled'=>'true'));
								
							?>	
							
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('full_name', 'Nom et prénoms du réquérant');
								echo Form::text('full_name_requerant',$procedureEnAttentesDetails->prenom_user.' '.$procedureEnAttentesDetails->nom_user,array('class' => 'form-control','disabled'=>'true'));
								
								?>
								
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('card_number', 'Numéro de carte');
								echo Form::text('card_number',$procedureEnAttentesDetails->reference_carte_professionnelle_usagers,array('class' => 'form-control','disabled'=>'true'));
								
								?>
								
							</div>
						</div>

					</div>

					<div class="row" style="margin-top: 3%">

						<div class="col-md-3">
							<div class="form-group">

							<?php

								echo Form::label('place_of_origin', 'Lieu Provenance');
								echo Form::text('place_of_origin',$procedureEnAttentesDetails->nom_communes_provenance,array('class' => 'form-control','disabled'=>'true'));
								
							?>	
							
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

							<?php

								echo Form::label('dpartment_of_origin', 'Département de provenance');
								echo Form::text('dpartment_of_origin',nom_departement_id($procedureEnAttentesDetails->departement_provenance),array('class' => 'form-control','disabled'=>'true'));
								
							?>	
							
							</div>
						</div>


						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('to', 'En destination de');
								echo Form::text('to',$procedureEnAttentesDetails->titre_pays,array('class' => 'form-control','disabled'=>'true'));
								
								?>
								
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

							<?php

								echo Form::label('ref_doc_of_origin', 'Référence Document de provenance');
								echo Form::text('ref_doc_of_origin',$procedureEnAttentesDetails->reference_document_provenance,array('class' => 'form-control','disabled'=>'true'));
								
							?>	
							

							</div>
						</div>

					</div>

					

					<div class="row" style="margin-top: 3%">

						<div class="col-md-3">
							<div class="form-group">

							<?php

								echo Form::label('potting_place', 'Lieu Empotage');
								echo Form::text('potting_place',$procedureEnAttentesDetails->localite_empotage,array('class' => 'form-control','disabled'=>'true'));
								
							?>	
							
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('commune_empotage', 'Commune Empotage');
								echo Form::text('commune_empotage',nom_commune_id($procedureEnAttentesDetails->commune_empotage),array('class' => 'form-control','disabled'=>'true'));
								
								?>
								
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('dpartment_empotage', 'Département Empotage');

								

								echo Form::text('dpartment_empotage',$procedureEnAttentesDetails->nom_departement_provenance,array('class' => 'form-control','disabled'=>'true'));
								
								?>
								
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

							<?php

								echo Form::label('Date_dparture', 'Date départ');
								echo Form::text('Date_dparture',$procedureEnAttentesDetails->date_depart,array('class' => 'form-control','disabled'=>'true'));
								
							?>	
							
							</div>
						</div>

					</div>



					<div class="row" style="margin-top: 3%">

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('ref_container', 'Référence conteneur');
								echo Form::text('ref_container',$procedureEnAttentesDetails->reference_conteneur,array('class' => 'form-control','disabled'=>'true'));
								
							?>
								
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('ref_plond', 'Référence de plomb');
								echo Form::text('ref_plond',$procedureEnAttentesDetails->reference_plomb,array('class' => 'form-control','disabled'=>'true'));
								
								?>
								
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('ref_transport', 'Référence transport');
								echo Form::text('ref_transport',$procedureEnAttentesDetails->reference_transporteur,array('class' => 'form-control','disabled'=>'true'));
								
							?>
								
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('driver_name', 'Nom conducteur');
								echo Form::text('driver_name',$procedureEnAttentesDetails->nom_conducteur,array('class' => 'form-control','disabled'=>'true'));

								echo Form::hidden('id_p',$procedureEnAttentesDetails->id,array('class' => 'form-control'));

									echo Form::hidden('num',$procedureEnAttentesDetails->numero,array('class' => 'form-control'));

									echo Form::hidden('departement_empotage',$procedureEnAttentesDetails->departement_empotage,array('class' => 'form-control'));
								
							?>
								
							</div>
						</div>

					</div>


					</div>
				</div>



			</div>
		</div>
	</div>




	<div class="row" style="margin-bottom: 3%;">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header" style="background-color: #ABB2B9">
					<h3 class="card-title" style="font-weight: bold;text-align: center;width: 100%">NATURE ET QUANTITE DES PRODUITS</h3>
				</div>

				<div class="card-body">
					<div class="col-md-12">
					
					<table id="example1" class="table table-bordered table-striped">
		                  <thead>
		                  <tr>
		                    <th>Catégories</th>
		                    <th>Produits</th>
		        		    <th>Epaisseurs</th>
		                    <th>Largeurs</th>
		                    <th>Longueurs</th>
		                    <th>Volumes</th>
		                   
		                  </tr>
		                  </thead>
		                  <tbody>
		           				@foreach($caracProdExportations as $caracProdExportation)
				                  <tr>
				                   <td>{{$caracProdExportation->categorie}}</td>
				                   <td>{{$caracProdExportation->espece_produits}}</td>
				                   <td>{{$caracProdExportation->epaisseur}}</td>
				                   <td>{{$caracProdExportation->largeur}}</td>
				                   <td>{{$caracProdExportation->longueur}}</td>
				                   <td>{{$caracProdExportation->volume}}</td>
				                  </tr>               
	 							@endforeach
	                  </tbody>
                  
               	 </table>

					


					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row" style="margin-bottom: 3%">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header" style="background-color: #ABB2B9;">
				<h3 class="card-title" style="font-weight: bold;text-align: center;width: 100%;">DOCUMENTS ATTACHES A LA PROCEDURE</h3>
			</div>
			<div class="row">
				<div class="mt-2 col-md-12">
					<center><div class="dropdown">
					  <span class="dropbtn btn"><?= (show_upload_docs((isset($procedureEnAttentesDetails->id_procedure_exportation)) ? ($procedureEnAttentesDetails->id_procedure_exportation) : ($procedureEnAttentesDetails->id)) != "")? ("Veuillez cliquer pour visualiser les documents") : ("Aucun document disponible"); ?></span>
					  <div class="dropdown-content" >
					  	 <?= show_upload_docs((isset($procedureEnAttentesDetails->id_procedure_exportation)) ? ($procedureEnAttentesDetails->id_procedure_exportation) : ($procedureEnAttentesDetails->id)); ?>
					    
					  </div>
					</div></center>
				</div>
			</div>
		</div>
	</div>
</div>

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header" style="background-color: #ABB2B9;">
					<h3 class="card-title" style="font-weight: bold;text-align: center;width: 100%;">RESULTAT DU SCANNING</h3>
				</div>

		<div class="card-body">
			<div class="col-md-12">
				<div class="row offset-md-1 col-md-10">
					<table style="width: 100%">
						<tr>
							<td>
								<?php
							echo Form::label('conforme1', 'SCANNING CONFORME',array('style'=>'font-size:14px;margin-left:15px;font-size:14px;'));
							echo "<br>"; 
							echo Form::radio('conforme','1','',array('style'=>'width:80px;height:40px;margin-left:25px;','required'=>'true','id'=>'conforme','onclick'=>'checkfile()
'));
								?>
							</td>
							<td>
								<?php
							echo Form::label('conforme2', 'SCANNING NON CONFORME',array('style'=>'font-size:14px;margin-left:15px;font-size:14px;'));
							echo "<br>"; 
							echo Form::radio('conforme','0','',array('style'=>'width:80px;height:40px;margin-left:25px;','id'=>'no_conform','onclick'=>'checkfile()
'));
								?>		
							</td>
						</tr>
					</table>
				</div>
				
				<div class="row" style="margin-top: 2%;">
						<div class="col-md-12">
							<div class="form-group" id="id_observation">
								<?php

								echo Form::label('observation', 'Observation');

								echo Form::textarea('observation', (isset($procedureEnAttentesDetails->raison_rejet)) ? ($procedureEnAttentesDetails->raison_rejet) : ("") ,array('class' => 'form-control','style'=>'resize:none;','maxlength'=>'1000','rows'=>'4'));
													
								?>
							</div>
						</div>
				</div>
				<div class="row">
				

							<div class="col-md-3 offset-md-4">
							<div class="form-group">

								<?php

								echo Form::label('vgm', 'Joindre le relevé de scanning');
								echo Form::label('vgm', '*',array('style' => 'color:red'));
								echo Form::input('file','scanning',null, array('class' => 'form-control','id'=>'vgm','onchange'=>'checkfile();', 'title'=>'Seuls les documents pdf, image ou word sont autorisés'));
								
								?>
								
							</div>
						</div>			

			</div>
				

					<div class="row" style="margin-top: 3%">
						<div class="offset-md-1 col-md-4">
							<div class="form-group">
								<?php
									echo Form::label('date_let_pass', 'Date du Scanning');
									echo Form::text('date_let_pass', date('Y-m-d'), array('class' => 'form-control','readonly' => 'readonly'));			
								?>				
							</div>
						</div>

						<div class="col-md-4 offset-md-2">
							<div class="form-group">

									<?php

										echo Form::label('info_agent', 'Grade, Nom et prénom de l’agent' );
										echo Form::text('info_agent', "".intervenant_user_id(Auth::user()->id)->grade.', '.Auth::user()->firstname.' '.Auth::user()->name,array('class' => 'form-control','readonly' => 'readonly'));
												
									?>
													
							</div>
						</div>
					</div>

				</div>
				</div>
			</div>
		</div>
				
		</div>

		<div class="row" style="margin-top: 1%">

		<div class="offset-md-1 col-md-3">
							
			<div class="form-group">
 							
				<?php

				echo Form::button('Rejeter',array('class' => 'form-control btn btn-block bg-red','id'=>'reject', 'onclick'=> 'rejet_scan();'));
							
				?>
											
			</div>
		</div>

		<div class="col-md-3 offset-md-1">
			<div class="form-group">
				<a class="btn btn-block btn-info annuler" href="{{session('back')}}">Retour</a>				
			</div>
		</div>

		<div class="col-md-3 offset-md-1">
			<div class="form-group">

				<?php
				echo Form::submit('Valider', array('class' => 'btn btn-block btn-success','id'=>'save'));
				?>			
			</div>
							
		</div>
	</div>
	</div>


			</div>
		</div>

	</div>

	
	<?php
	echo Form::close() 
	?>

</div>
<script>
var vgm = document.getElementById("vgm");
var reject = document.getElementById("reject");
var save = document.getElementById("save");

	(function () {
		save.disabled = true;
		reject.disabled = true;
	})();

	function checkfile() {
		if(vgm.value  != "")
		{
			if(verify()){
					save.disabled = false;
					reject.disabled = true;
			}else{
				save.disabled = true;
				reject.disabled = false;
			}
		}else{
			save.disabled = true;
			reject.disabled = true;
		}
	}


function verify()
{
               
if (document.getElementById("conforme").checked)
	return true;
	return false;
               
}

function rejet_scan()
{
	document.getElementById("idProcedureForm3").submit();
}

</script>