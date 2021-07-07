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
			
			<h3 style="text-align: center;">DETAILS D'UN LAISSEZ-PASSER DELIVRE</h3>
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
								echo Form::text('date_procedure',$procedureEnAttentesDetails->date_depart,array('class' => 'form-control','disabled'=>'true'));
								
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

								echo Form::label('to', 'En destination de:');
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
					<h3 class="card-title" style="font-weight: bold;text-align: center;width: 100%">DETAILS DU LAISSEZ-PASSER</h3>
				</div>
				
				<div class="card-body">
					<div class="col-md-12">
						
						<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<?php
											echo Form::label('name_user', 'Nom et prénom de l\'usager');
											echo Form::text('name _user',nom_user_id($detailsLaissezPassers->id_user_usagers).' '.prenom_user_id($detailsLaissezPassers->id_user_usagers),array('class' => 'form-control', 'readonly' => 'readonly'));
											
											?>
											
										</div>
									</div>

									<div class="offset-md-1 col-md-3">
										<div class="form-group">
											<?php
											echo Form::label('ref_professional_card', 'Référence carte professionnelle');
											echo Form::text('ref_professional_card',$detailsLaissezPassers->reference_carte_professionnelle_usagers,array('class' => 'form-control', 'readonly' => 'readonly'));
											
											?>
											
										</div>
									</div>

									<div class="offset-md-1 col-md-3">
										<div class="form-group">
											<?php
											echo Form::label('ref_export_card', 'Référence carte exportateur');
											echo Form::text('ref_export_card',$detailsLaissezPassers->reference_permis_coupe_usagers,array('class' => 'form-control', 'readonly' => 'readonly'));
											
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
											echo Form::text('agent_delivery',nom_user_id($detailsLaissezPassers->id_user_forestiers).' '.prenom_user_id($detailsLaissezPassers->id_user_forestiers),array('class' => 'form-control', 'readonly' => 'readonly'));
											
											?>
											
										</div>
									</div>

									<div class="offset-md-1 col-md-3">
										<div class="form-group">
											<?php
											echo Form::label('agent_poste', 'Poste de l\'agent');
											echo Form::text('agent_poste',$detailsLaissezPassers->nom_poste,array('class' => 'form-control', 'readonly' => 'readonly'));
											
											?>
											
										</div>
									</div>

									<div class="offset-md-1 col-md-3">
										<div class="form-group">
											<?php
											echo Form::label('date_pass', 'Date du laissez-passer');
											echo Form::text('date_pass',$detailsLaissezPassers->date_laissez_passer,array('class' => 'form-control', 'readonly' => 'readonly'));
											
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
											echo Form::label('start_pass_validity', 'Début de validité');
											echo Form::text('start_pass_validity',$detailsLaissezPassers->debut_validite,array('class' => 'form-control', 'readonly' => 'readonly'));
											
											?>
											
										</div>
									</div>

									<div class="offset-md-1 col-md-3">
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
	</div>

	<div class="card">
				<div class="card-header" style="background-color: #ABB2B9;">
					<h3 class="card-title" style="font-weight: bold;text-align: center;width: 100%;">DOCUMENTS ATTACHES A LA PROCEDURE</h3>
				</div>
				<div class="row">
					<div class="offset-md-4 mt-2 col-md-8 mb-5">
						<div class="dropdown">
						  <span class="dropbtn btn"><?= (show_upload_docs($procedureEnAttentesDetails->id) != "")? ("Veuillez cliquer pour visualiser les documents") : ("Aucun document disponible"); ?></span>
						  <div class="dropdown-content" >
						  	<?= show_upload_docs($procedureEnAttentesDetails->id); ?>
						    
						  </div>
						</div>
					</div>
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
<script>
var acc = document.getElementsByClassName("accordion");
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


    
    

</script>

