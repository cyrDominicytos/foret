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


.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  right: 0;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1;}
.dropdown:hover .dropdown-content {display: block;}
.dropdown:hover .dropbtn {background-color: #3e8e41;}
	
</style>

<div class="container-fluid" style="margin-top: 2%;">
	<div class="row" style="margin-bottom: 3%;">
		<div class="col-md-12">
			<h3 style="text-align: center;">PROCEDURE D'EXPORTATION <?= $process->numero ?> </h3>
			<div class="card">
				<div class="card-header" style="background-color: #ABB2B9">
					<h3 class="card-title" style="font-weight: bold;text-align: center;width: 100%;">DETAILS DE LA PROCEDURE</h3>
				</div>
				
				@csrf
				<div class="card-body">
					<div class="col-md-12">
						<div class="col-md-12">
					<?php
						echo Form::open(array('route' => 'process.create', 'method' => 'post', 'id'=> 'idProcedureForm'))
					?>
					<input type="number" name="len1" hidden="" id="len1">
					<input type="number" name="len2" hidden="" id="len2">
					<input type="number" name="len3" hidden="" id="len3">
					<input type="number" name="len4" hidden="" id="len4">
					<input type="number" name="volume_total" hidden="" id="volume_total">
					<div class="row">

						<div class="col-md-4">
							<div class="form-group">
							<?php

								echo Form::label('full_name', 'Nom et prénom du demandeur');
								echo Form::text('full_name_requerant',
									 $process->prenom_user .' '.$process->nom_user ,array('class' => 'form-control','disabled'=>'true'));
								
								?>
							
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">

								<?php
								echo Form::label('numero_carte_professionnelle', 'Numéro carte professionnelle');
								echo Form::text('numero_carte_professionnelle',$process->reference_carte_professionnelle_usagers,array('class' => 'form-control','disabled'=>'true'));
								
								?>
								
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<?php

								echo Form::label('card_number_expo', 'Numéro de carte exportateur');
								echo Form::text('numero_carte_exportateur',$process->reference_permis_coupe_usagers,array('class' => 'form-control','disabled'=>'true'));
								
								?>
								
							</div>
						</div>

					</div>

					<div class="row" style="margin-top: 3%">

						<div class="col-md-4">
							<div class="form-group">
								<?php

								echo Form::label('dpartment_empotage', 'Département de provenance');
								echo Form::text('numero_carte_exportateur',nom_departement_id($process->departement_provenance),array('class' => 'form-control','disabled'=>'true'));
								?>
								
																
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<?php

								echo Form::label('dpartment_of_origin', 'Commune de provenance');
								echo Form::text('numero_carte_exportateur',nom_commune_id($process->commune_provenance),array('class' => 'form-control','disabled'=>'true'));													
								?>
								
									
								
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<?php

								echo Form::label('to', 'En destination de');
								echo Form::text('numero_carte_exportateur',nom_pays_id($process->id_pays),array('class' => 'form-control','disabled'=>'true'));								
								?>
																
							</div>
						</div>

					</div>

					<div class="row" style="margin-top: 3%">

						<div class="col-md-4">
							<div class="form-group">

								<?php

								echo Form::label('dpartment_empotage', 'Département Empotage');
								echo Form::text('numero_carte_exportateur',nom_departement_id($process->departement_empotage),array('class' => 'form-control','disabled'=>'true'));
								?>
								
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<?php
								
								echo Form::label('commune_empotage', 'Commune Empotage');
								echo Form::text('numero_carte_exportateur',nom_commune_id($process->commune_empotage),array('class' => 'form-control','disabled'=>'true'));
								?>
								
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">

								<?php

								echo Form::label('potting_place', 'Lieu Empotage');
								echo Form::text('numero_carte_exportateur',$process->localite_empotage,array('class' => 'form-control','disabled'=>'true'));
								

							?>								
							</div>
						</div>
					</div>


					<div class="row" style="margin-top: 3%">
						<div class="col-md-4">
							<div class="form-group">
								<?php

								echo Form::label('Date_dparture', 'Date départ');
								echo Form::text('numero_carte_exportateur',formater_date($process->date_depart),array('class' => 'form-control','disabled'=>'true'));
								
								?>	
							 </div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<?php

								echo Form::label('ref_doc_of_origin', 'Document de provenance');
								echo Form::text('numero_carte_exportateur',$process->reference_document_provenance,array('class' => 'form-control','disabled'=>'true'));
								
								?>	
							</div>
						</div>


						<div class="col-md-4">
							<div class="form-group">

								<?php

									echo Form::label('ref_file', 'Statut actuel de la procédure');
									echo Form::text('numero_carte_exportateur',$process->libelle_statut,array('class' => 'form-control','disabled'=>'true'));

								?>
								
							</div>
						</div>

						
					</div>



					<div class="row" style="margin-top: 3%">

						

						<div class="col-md-4">
							<div class="form-group">
								<?php
								
								echo Form::label('commune_empotage', 'Poste');
								echo Form::text('numero_carte_exportateur',$process->nom_poste,array('class' => 'form-control','disabled'=>'true'));
								?>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">

								<?php

								echo Form::label('ref_container', 'Référence conteneur');
								echo Form::text('numero_carte_exportateur',$process->reference_conteneur,array('class' => 'form-control','disabled'=>'true'));
								
							?>
								
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">

								<?php

								echo Form::label('ref_plond', 'Référence de plomb');
								
								echo Form::text('numero_carte_exportateur',$process->reference_plomb,array('class' => 'form-control','disabled'=>'true'));
								?>
								
							</div>
						</div>
					</div>

					<div class="row">

						<div class="col-md-4">
							<div class="form-group">

								<?php

								echo Form::label('ref_transport', 'Référence transport');
								
								echo Form::text('numero_carte_exportateur',$process->reference_transporteur,array('class' => 'form-control','disabled'=>'true'));
							?>
								
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">

								<?php

								echo Form::label('driver_name', 'Nom et prénom du conducteur');
								
								echo Form::text('numero_carte_exportateur',$process->nom_conducteur,array('class' => 'form-control','disabled'=>'true'));
							?>
								
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">

								<?php

								echo Form::label('driver_name', 'Volume Total (m3)');
								
								echo Form::text('numero_carte_exportateur',$process->volume_total,array('class' => 'form-control','disabled'=>'true'));
							?>
								
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
					<h3 class="card-title" style="font-weight: bold;text-align: center;width: 100%">NATURE ET QUANTITE DES PRODUITS EXPORTES</h3>
				</div>

				<div class="card-body">
					<div class="col-md-12">
					
					<table id="example1" class="table table-bordered table-striped">
		                  <thead>
		                  <tr>
		                    <th>Catégories</th>
		                    <th>Espèces</th>
		                    <th>Produits</th>
		        		    
		                    <th>Longueur</th>
		                    <th>Largeur</th>
		                    <th>Epaisseur</th>
		                    <th>Volume (m3)</th>
		                   
		                  </tr>
		                  </thead>
		                  <tbody>
		           				@foreach($caracteristique as $produit_exportes)
				                  <tr>
				                   <td>{{$produit_exportes->categorie}}</td>
				                   <td>{{$produit_exportes->espece_produits}}</td>
				                   <td>{{$produit_exportes->type_produits}}</td>
				                   <td>{{$produit_exportes->longueur}}</td>
				                   <td>{{$produit_exportes->largeur}}</td>
				                   <td>{{ $produit_exportes->epaisseur}}</td>
				                   <td>{{$produit_exportes->volume}}</td>
				                  </tr>               
	 							@endforeach
	                  </tbody>
                  	
               	 </table>
               	 <p style="color: red; text-align: center; font-weight: bold;" ><?=(isset($no_data_found)) ? ($no_data_found) : ('') ?></p>
               	 
					


					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- process has cc -->
	<?php 
			$constatConformite = has_constat_conformite($process->id);
			if(has_constat_conformite($process->id)){
				?>
			<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header" style="background-color: #ABB2B9;">
					<h3 class="card-title" style="font-weight: bold;text-align: center;width: 100%;">DÉTAIL DU CONSTAT DE CONFORMITÉ</h3>
				</div>

		<div class="card-body">
			<div class="col-md-12">
				<div class="row offset-md-1 col-md-10">
					<table>
						<tr>
							<td><span style="font-size: 18px;font-weight: bold">Conformité au contenu de la demande du réquérant :</span></td>
							<td>
								<?php
							echo Form::label('conforme1', ' SONT CONFORMES',array('style'=>'font-size:14px;margin-left:15px;font-size:14px;'));
							echo "<br>"; 
							echo Form::checkbox('conforme1','1',($constatConformite->conformite_contenu_procedure_exportation==1) ? (1) : (0),array('style'=>'width:80px;height:40px;margin-left:25px;background-color:blue','disabled'=>'true'));
								?>	
							</td>
							<td>
								<?php
							echo Form::label('no_conforme1', 'SONT NON CONFORMES',array('style'=>'font-size:14px;margin-left:15px;font-size:14px;'));
							echo "<br>"; 
							echo Form::checkbox('no_conforme1','0',($constatConformite->conformite_contenu_procedure_exportation==0) ? (1) : (0),array('style'=>'width:80px;height:40px;margin-left:25px;','disabled'=>'true'));
								?>	
							</td>
						</tr>
						<tr><td>&nbsp;</td></tr>
						<tr><td>&nbsp;</td></tr>
						<tr>
							<td><span style="font-size: 18px;font-weight: bold">Conformité à le règlementation en vigeur en république du Bénin :</span></td>
							<td>
								<?php
							echo Form::label('conforme2', ' SONT CONFORMES',array('style'=>'font-size:14px;margin-left:15px;font-size:14px;'));
							echo "<br>"; 
							echo Form::checkbox('conforme2','1',($constatConformite->conformite_reglementation==1) ? (1) : (0),array('style'=>'width:80px;height:40px;margin-left:25px;','disabled'=>'true'));
								?>	
							</td>
							<td>
								<?php
							echo Form::label('no_conforme2', 'SONT NON CONFORMES',array('style'=>'font-size:14px;margin-left:15px;font-size:14px;'));
							echo "<br>"; 
							echo Form::checkbox('no_conforme2','0',($constatConformite->conformite_reglementation==0) ? (1) : (0),array('style'=>'width:80px;height:40px;margin-left:25px;','disabled'=>'true'));
								?>	
							</td>
						</tr>
					</table>
				</div>
				
				<?php
			
			if (!empty(trim($constatConformite->observation))) {
			?>
				<div class="row" style="margin-top: 2%;">
						<div class="col-md-12">
							<div class="form-group" id="id_observation">
								<?php

								echo Form::label('observation', 'Observation');

								echo Form::textarea('observation',$constatConformite->observation,array('class' => 'form-control','style'=>'resize:none;','maxlength'=>'1000','rows'=>'4','disabled'=>'true'));
													
								?>
							</div>
						</div>
				</div>
					
			<?php
				}
				
			?>
				

					<div class="row" style="margin-top: 3%">
						<div class="offset-md-1 col-md-4">
							<div class="form-group">

								<?php

									echo Form::label('date_let_pass', 'Date du Constat de conformité');

									echo Form::text('date_let_pass',formater_datetime($constatConformite->date_constat),array('class' => 'form-control','readonly' => 'readonly'));
													
										?>
													
									</div>
						</div>

						<div class="col-md-4 offset-md-2">
							<div class="form-group">

										<?php

											echo Form::label('info_agent', 'Grade, Nom et prénom de l’agent' );
											echo Form::text('info_agent',forestier_forestier_id($constatConformite->id_agent_traitant)->grade.', '.user_forestier_id($constatConformite->id_agent_traitant)->firstname.' '.user_forestier_id($constatConformite->id_agent_traitant)->name,array('class' => 'form-control','readonly' => 'readonly'));
													
										?>
													
							</div>
						</div>
					</div>

					

				</div>
				</div>


			</div>
		</div>
	</div>

	<?php
		}else{
			$cc_rejeter = has_constat_conformite_rejeter($process->id);
			if(has_constat_conformite_rejeter($process->id)){
			?>
				<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header" style="background-color: #ABB2B9;">
					<h3 class="card-title" style="font-weight: bold;text-align: center;width: 100%;">Décision du Constat de Conformité </h3>
				</div>

		<div class="card-body">
			<div class="col-md-12">
					
				<?php
				if (trim($cc_rejeter->raison_rejet!="")) {
					
				?>
				<div class="row col-md-10 offset-md-1" style="margin-top: 1%">

						<?php

						echo Form::textarea('observation',$cc_rejeter->raison_rejet,array('class' => 'form-control','style'=>'resize:none;border: 1px solid white;font-weight: bold;color: red;font-size: 18px;background-color:white','maxlength'=>'1000','rows'=>'4','disabled'=>true));
													
						?>

				</div>
				<?php
				}
				?>
					<div class="row" style="margin-top: 3%">
						<div class="offset-md-1 col-md-4">
							<div class="form-group">

								<?php

									echo Form::label('date_let_pass', 'Date du rejet');


									echo Form::text('date_let_pass',formater_datetime($cc_rejeter->date_rejet),array('class' => 'form-control','readonly' => 'readonly'));
													
										?>
													
									</div>
						</div>

						<div class="col-md-4 offset-md-2">
							<div class="form-group">

										<?php

										echo Form::label('info_agent', 'Grade, Nom et prénom de l’agent' );
											echo Form::text('info_agent',forestier_forestier_id($cc_rejeter->id_agent_traitant)->grade.', '.user_forestier_id($cc_rejeter->id_agent_traitant)->firstname.' '.user_forestier_id($cc_rejeter->id_agent_traitant)->name,array('class' => 'form-control','readonly' => 'readonly'));
													
													
										?>
													
							</div>
						</div>
					</div>

					


					</div>
				</div>

				
			</div>
		</div>
	</div>

			<?php
			}
		}
	?>
	<!-- process has cc end -->
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header" style="background-color: #ABB2B9;">
					<h3 class="card-title" style="font-weight: bold;text-align: center;width: 100%;">DOCUMENTS ATTACHES A LA PROCEDURE</h3>
				</div>
				<div class="row">
					<div class="offset-md-4 mt-2 col-md-8 mb-5">
						<div class="dropdown">
						  <span class="dropbtn btn"><?= (show_upload_docs($process->id) != "")? ("Veuillez cliquer pour visualiser les documents") : ("Aucun document disponible"); ?></span>
						  <div class="dropdown-content" >
						  	<?= show_upload_docs($process->id); ?>
						    
						  </div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-body">
					<div class="col-md-12">
					
							<div class="row" style="margin-top: 3%">
								<div class="offset-md-1 col-md-12">

									
								</div>
							</div>
							<div class="row" style="margin-top: 4%">
							
							<div class="col-md-2 offset-md-5">
								<div class="form-group">
									<a class="btn btn-block btn-info annuler" href="{{session('back')}}">Retour</a>				
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
</div>
<script>
	var certifier = document.getElementById("certifier");
	var submit = document.getElementById("submit");

	(function () {
		 certifier.checked  = false;
		
	})();


	function checkCertifier() {
		if(certifier.checked)
		{
			submit.disabled = false;
		}else{
			submit.disabled = true;
		}
	}
</script>