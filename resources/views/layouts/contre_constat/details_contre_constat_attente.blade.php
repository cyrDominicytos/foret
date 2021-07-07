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
	<div class="row" >
		<div class="col-md-12">
			<h3 style="text-align: center;">CONSTAT DE CONFORMITÉ D’UNE PROCÉDURE D’EXPORTATION</h3>
			<div class="card">
				<div class="card-header" style="background-color: #ABB2B9">
					<h3 class="card-title" style="font-weight: bold;text-align: center;width: 100%;">DETAILS DE LA PROCEDURE</h3>
				</div>
				
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
								echo Form::text('date_procedure',formater_datetime($procedureEnAttentesDetails->created_at),array('class' => 'form-control','disabled'=>'true'));
								
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
								echo Form::text('Date_dparture',formater_date($procedureEnAttentesDetails->date_depart),array('class' => 'form-control','disabled'=>'true'));
								
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
								
							?>
								
							</div>
						</div>

					</div>


					</div>
				</div>



			</div>
		</div>
	</div>

	<div class="row" style="margin-top: 2%;">
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

	<div class="row" style="margin-top: 2%">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header" style="background-color: #ABB2B9;">
					<h3 class="card-title" style="font-weight: bold;text-align: center;width: 100%;">DÉTAIL DU CONSTAT DE CONFORMITÉ </h3>
				</div>

		<div class="card-body">
			<div class="col-md-12">
				<div class="row offset-md-1 col-md-10">
					<table>
						<tr>
							<td><span style="font-size: 18px;font-weight: bold">Conformité au contenu de la demande du réquérant </span></td>
							<td>
								<?php
							echo Form::label('conforme1', ' SONT CONFORMES',array('style'=>'font-size:14px;margin-left:15px;font-size:14px;'));
							echo "<br>"; 
							echo Form::checkbox('conforme1','1',($procedureEnAttentesDetails->conformite_contenu_procedure_exportation==1) ? (1) : (0),array('style'=>'width:80px;height:40px;margin-left:25px;background-color:blue','disabled'=>'true'));
								?>	
							</td>
							<td>
								<?php
							echo Form::label('no_conforme1', 'SONT NON CONFORMES',array('style'=>'font-size:14px;margin-left:15px;font-size:14px;'));
							echo "<br>"; 
							echo Form::checkbox('no_conforme1','0',($procedureEnAttentesDetails->conformite_contenu_procedure_exportation==0) ? (1) : (0),array('style'=>'width:80px;height:40px;margin-left:25px;','disabled'=>'true'));
								?>	
							</td>
						</tr>
						<tr><td>&nbsp;</td></tr>
						<tr><td>&nbsp;</td></tr>
						<tr>
							<td><span style="font-size: 18px;font-weight: bold">Conformité à le règlementation en vigeur en république du Bénin </span></td>
							<td>
								<?php
							echo Form::label('conforme2', ' SONT CONFORMES',array('style'=>'font-size:14px;margin-left:15px;font-size:14px;'));
							echo "<br>"; 
							echo Form::checkbox('conforme2','1',($procedureEnAttentesDetails->conformite_reglementation==1) ? (1) : (0),array('style'=>'width:80px;height:40px;margin-left:25px;','disabled'=>'true'));
								?>	
							</td>
							<td>
								<?php
							echo Form::label('no_conforme2', 'SONT NON CONFORMES',array('style'=>'font-size:14px;margin-left:15px;font-size:14px;'));
							echo "<br>"; 
							echo Form::checkbox('no_conforme2','0',($procedureEnAttentesDetails->conformite_reglementation==0) ? (1) : (0),array('style'=>'width:80px;height:40px;margin-left:25px;','disabled'=>'true'));
								?>	
							</td>
						</tr>
					</table>
				</div>
			<?php
			
				if (!empty($procedureEnAttentesDetails->observation)) {
			?>
			<div class="row" style="margin-top: 2%;">
						<div class="col-md-12">
							<div class="form-group" id="id_observation">
								<?php

								echo Form::label('observation', 'Observation');

								echo Form::textarea('observation',$procedureEnAttentesDetails->observation,array('class' => 'form-control','style'=>'resize:none;','maxlength'=>'1000','rows'=>'4','disabled'=>'true'));
													
								?>
							</div>
						</div>
				</div>
					
			<?php
				}
				
			?>
					<div class="row" style="margin-top: 3%">
						<div class="col-md-4">
							<div class="form-group">

								<?php

									echo Form::label('date_let_pass', 'Date du Constat de conformité:');

									echo Form::text('date_let_pass',formater_datetime($procedureEnAttentesDetails->date_constat),array('class' => 'form-control','readonly' => 'readonly'));
													
										?>
													
									</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">

								<?php

									echo Form::label('num_constat', 'Numéro du Constat de Conformité' );
									echo Form::text('num_constat',$procedureEnAttentesDetails->numero,array('class' => 'form-control','readonly' => 'readonly'));
													
								?>
													
							</div>
						</div>

						

					<div class="col-md-4">
						<div class="form-group">
								<?php

									echo Form::label('info_agent', 'Grade, Nom et prénom de l’agent' );
											echo Form::text('info_agent',forestier_forestier_id($procedureEnAttentesDetails->id_agent_traitant)->grade.', '.user_forestier_id($procedureEnAttentesDetails->id_agent_traitant)->firstname.' '.user_forestier_id($procedureEnAttentesDetails->id_agent_traitant)->name,array('class' => 'form-control','readonly' => 'readonly'));
													
								?>
					
						</div>
					</div>

						
					</div>

					


					</div>
				</div>

				

			</div>
		</div>
	</div>


	<div class="row" style="margin-top: 2%">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header" style="background-color: #ABB2B9;">
					<h3 class="card-title" style="font-weight: bold;text-align: center;width: 100%;">DETAILS DU LAISSEZ-PASSER </h3>
				</div>
				
						<div class="card-body">
							
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<?php
											echo Form::label('name_user', 'Nom et prénom de l\'usager');
											echo Form::text('name _user',prenom_user_id($detailsLaissezPassers->id_user_usagers).' '.nom_user_id($detailsLaissezPassers->id_user_usagers),array('class' => 'form-control', 'readonly' => 'readonly'));
											
											?>
											
										</div>
									</div>

									<div class="col-md-3">
										<div class="form-group">
											<?php
											echo Form::label('ref_professional_card', 'Référence carte professionnelle');
											echo Form::text('ref_professional_card',$detailsLaissezPassers->reference_carte_professionnelle_usagers,array('class' => 'form-control', 'readonly' => 'readonly'));
											
											?>
											
										</div>
									</div>

									<div class="col-md-3">
										<div class="form-group">
											<?php
											echo Form::label('ref_export_card', 'Référence carte exportateur');
											echo Form::text('ref_export_card',$detailsLaissezPassers->reference_permis_coupe_usagers,array('class' => 'form-control', 'readonly' => 'readonly'));
											
											?>
											
										</div>
									</div>

									<div class="col-md-3">
										<div class="form-group">
											<?php
											echo Form::label('date_pass', 'Date du laissez-passer');
											echo Form::text('date_pass',formater_datetime($detailsLaissezPassers->date_laissez_passer),array('class' => 'form-control', 'readonly' => 'readonly'));
											
											?>
											
										</div>
									</div>

									
								</div>
							</div>

							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<?php
											echo Form::label('agent_delivery', 'Agent émetteur du laissez-passer');
											echo Form::text('agent_delivery',forestier_user_id($detailsLaissezPassers->id_user_forestiers)->grade.', '.prenom_user_id($detailsLaissezPassers->id_user_forestiers).' '.nom_user_id($detailsLaissezPassers->id_user_forestiers),array('class' => 'form-control', 'readonly' => 'readonly'));
											
											?>
											
										</div>
									</div>

									<div class="col-md-3">
										<div class="form-group">
											<?php
											echo Form::label('agent_poste', 'Poste de l\'agent');
											echo Form::text('agent_poste',$detailsLaissezPassers->nom_poste,array('class' => 'form-control', 'readonly' => 'readonly'));
											
											?>
											
										</div>
									</div>

									<div class="col-md-3">
										<div class="form-group">
											<?php
											echo Form::label('start_pass_validity', 'Début de validité');
											echo Form::text('start_pass_validity',$detailsLaissezPassers->debut_validite,array('class' => 'form-control', 'readonly' => 'readonly'));
											
											?>
											
										</div>
									</div>

									<div class="col-md-3">
										<div class="form-group">
											<?php
											echo Form::label('end_pass_validity', 'Fin de validite');
											echo Form::text('end_pass_validity',$detailsLaissezPassers->fin_validite,array('class' => 'form-control', 'readonly' => 'readonly'));
											
											?>
											
										</div>
									</div>
									

									
								</div>
							</div>

						</div>					

					</div>
				</div>



			</div>


<div class="row" style="margin-top: 2%;">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header" style="background-color: #ABB2B9;">
					<h3 class="card-title" style="font-weight: bold;text-align: center;width: 100%;">DOCUMENTS ATTACHES A LA PROCEDURE </h3>
				</div>
			
			<div class="row">
				<div class="mt-2 col-md-12">
					<center><div class="dropdown">
					  <span class="dropbtn btn"><?= (show_upload_docs($procedureEnAttentesDetails->id_procedure_exportation) != "")? ("Veuillez cliquer pour visualiser les documents") : ("Aucun document disponible"); ?></span>
					  <div class="dropdown-content" >
					  	 <?= show_upload_docs($procedureEnAttentesDetails->id_procedure_exportation); ?>
					    
					  </div>
					</div></center>
				</div>
			</div>
		</div>
	</div>
</div>
	

	<div class="row" style="margin-top: 2%; margin-bottom: 1%;">
						
		<div class="col-md-2 offset-md-5">
							
			<a class="btn btn-block btn-info annuler" href="{{session('back')}}">Retour</a>				
							
		</div>
	</div>

</div>
<script>

	document.getElementById('save').disabled=true;
    document.getElementById('reject').disabled=true;

    var conforme = document.getElementById("conforme");

    var no_conforme = document.getElementById("no_conforme");
   

function store_reject()
{

	document.getElementById('form').submit();
}    

function verify()
{
               
if (conforme.checked) {
    	document.getElementById('save').disabled=false;
    	document.getElementById('reject').disabled=true;
    	
    }

if (no_conforme.checked) {
	

		document.getElementById('save').disabled=true;
    	document.getElementById('reject').disabled=false;
    	
    }

               
}
</script>