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
			<h3 style="text-align: center;">EMISSION DE LAISSEZ-PASSER</h3>
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
								echo Form::text('date_procedure',$procedureEnAttentesDetails->created_at,array('class' => 'form-control','readonly' => 'readonly'));
								
							?>	
							
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('full_name', 'Nom et prénoms du réquérant');
								echo Form::text('full_name_requerant',$procedureEnAttentesDetails->prenom_user.' '.$procedureEnAttentesDetails->nom_user,array('class' => 'form-control','readonly' => 'readonly'));
								
								?>
								
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('card_number', 'Numéro de carte');
								echo Form::text('card_number',$procedureEnAttentesDetails->reference_carte_professionnelle_usagers,array('class' => 'form-control','readonly' => 'readonly'));
								
								?>
								
							</div>
						</div>

					</div>

					<div class="row" style="margin-top: 3%">

						<div class="col-md-3">
							<div class="form-group">

							<?php

								echo Form::label('place_of_origin', 'Lieu Provenance');
								echo Form::text('place_of_origin',$procedureEnAttentesDetails->nom_communes_provenance,array('class' => 'form-control','readonly' => 'readonly'));
								
							?>	
							
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

							<?php

								echo Form::label('dpartment_of_origin', 'Département de provenance');
								echo Form::text('dpartment_of_origin',nom_departement_id($procedureEnAttentesDetails->departement_provenance),array('class' => 'form-control','readonly' => 'readonly'));
								
							?>	
							
							</div>
						</div>


						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('to', 'En destination de:');
								echo Form::text('to',$procedureEnAttentesDetails->titre_pays,array('class' => 'form-control','readonly' => 'readonly'));
								
								?>
								
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

							<?php

								echo Form::label('ref_doc_of_origin', 'Référence Document de provenance');
								echo Form::text('ref_doc_of_origin',$procedureEnAttentesDetails->reference_document_provenance,array('class' => 'form-control','readonly' => 'readonly'));
								
							?>	
							

							</div>
						</div>

					</div>

					

					<div class="row" style="margin-top: 3%">

						<div class="col-md-3">
							<div class="form-group">

							<?php

								echo Form::label('potting_place', 'Lieu Empotage');
								echo Form::text('potting_place',$procedureEnAttentesDetails->localite_empotage,array('class' => 'form-control','readonly' => 'readonly'));
								
							?>	
							
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('commune_empotage', 'Commune Empotage');
								echo Form::text('commune_empotage',nom_commune_id($procedureEnAttentesDetails->commune_empotage),array('class' => 'form-control','readonly' => 'readonly'));
								
								?>
								
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('dpartment_empotage', 'Département Empotage');
								echo Form::text('dpartment_empotage',$procedureEnAttentesDetails->nom_departement_provenance,array('class' => 'form-control','readonly' => 'readonly'));
								
								?>
								
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

							<?php

								echo Form::label('Date_dparture', 'Date départ');
								echo Form::text('Date_dparture',$procedureEnAttentesDetails->date_depart,array('class' => 'form-control','readonly' => 'readonly'));
								
							?>	
							
							</div>
						</div>

					</div>



					<div class="row" style="margin-top: 3%">

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('ref_container', 'Référence conteneur');
								echo Form::text('ref_container',$procedureEnAttentesDetails->reference_conteneur,array('class' => 'form-control','readonly' => 'readonly'));
								
							?>
								
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('ref_plond', 'Référence de plomb');
								echo Form::text('ref_plond',$procedureEnAttentesDetails->reference_plomb,array('class' => 'form-control','readonly' => 'readonly'));
								
								?>
								
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('ref_transport', 'Référence transport');
								echo Form::text('ref_transport',$procedureEnAttentesDetails->reference_transporteur,array('class' => 'form-control','readonly' => 'readonly'));
								
							?>
								
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('driver_name', 'Nom conducteur');
								echo Form::text('driver_name',$procedureEnAttentesDetails->nom_conducteur,array('class' => 'form-control','readonly' => 'readonly'));
								
							?>
								
							</div>
						</div>

					</div>

					<div class="row" style="margin-top: 3%">

						
					<div class="col-md-3">
								<?php

									echo Form::label('traitant_agent', 'Agent traitant');
									echo Form::text('traitant_agent',(user_by_id($rejetInfos->id_agent_traitant)) ? (user_by_id($rejetInfos->id_agent_traitant)->name.' '.user_by_id($rejetInfos->id_agent_traitant)->firstname) : (null) ,array('class' => 'form-control','readonly' => 'readonly'));
								
								?>
								
								
							</div>

							<div class="col-md-3">
								<?php

									echo Form::label('reject_date', 'Date de rejet');
									echo Form::text('reject_date',$rejetInfos->date_rejet,array('class' => 'form-control','readonly' => 'readonly'));
								
								?>
								
								
							</div>

							<div class="col-md-12">
								<?php

									echo Form::label('reject_raison', 'Raison de rejet');
									echo Form::textarea('reject_raison', $rejetInfos->raison_rejet, ['id' => 'reasonReject', 'rows' => 8, 'cols' => 60, 'style' => 'resize:none', 'class' => 'form-control', 'readonly' => 'readonly'])
								
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


		<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header" style="background-color: #ABB2B9;">
					<h3 class="card-title" style="font-weight: bold;text-align: center;width: 100%;">FORMULAIRE D'EMISSION DE LAISSEZ-PASSER</h3>
				</div>
				<?php
					
					echo Form::open(array('url' => 'laissez_passer/attente', 'method' => 'POST'));

				?>
				@csrf

				<div class="card-body">
					<div class="col-md-12">
					
						<div class="row" style="margin-top: 3%">

							<div class="offset-md-1 col-md-4">
									<div class="form-group">

											
										<?php
																			

										  echo Form::hidden('id_p', $procedureEnAttentesDetails->id);
									

											echo Form::label('start_validity', 'Début Validité');
											echo Form::label('start_validity', '*',array('style' => 'color:red'));				
											echo Form::date('start_validity',\Carbon\Carbon::now(),array('class' => 'form-control','placeholder'=>'', 'onchange' => 'changeDate()', 'id' => 'start_validity'));
															
												?>
															
											</div>
									</div>

							<div class="col-md-4 offset-md-2">
									<div class="form-group">

												<?php
											echo Form::label('end_validity', 'Fin Validité');				
											echo Form::text('end_validity',date('Y-m-d'),array('class' => 'form-control', 'readonly' => 'readonly', 'id' => 'end_validity'));
															
												?>
															
									</div>
							</div>					

					</div>

					<div class="row" style="margin-top: 3%">
						<div class="offset-md-1 col-md-4">
							<div class="form-group">

								<?php

									echo Form::label('date_let_pass', 'Fait le:');
													
									echo Form::text('date_let_pass',date('d-m-Y'),array('class' => 'form-control','readonly' => 'readonly'));
													
										?>
													
									</div>
						</div>

						<div class="col-md-4 offset-md-2">
							<div class="form-group">

										<?php

											echo Form::label('info_agent', 'Chef de l\'Inspection Forestière' );
											echo Form::text('info_agent',Auth::user()->firstname.' '.Auth::user()->name,array('class' => 'form-control','readonly' => 'readonly'));
													
										?>
													
							</div>
						</div>
					</div>

					<div class="row" style="margin-top: 4%">

						<div class="col-md-3 offset-md-2">
							<div class="form-group">
								<a class="btn btn-block btn-info annuler" href="{{session('back')}}">Retour</a>				
							</div>
						</div>

						<div class="col-md-3 offset-md-2">
							<div class="form-group">

								
								<?php
									echo Form::submit('Emettre', array('class' => 'btn btn-block btn-success'));
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
					echo Form::close() 
				?>


</div>
<script>
var delai = <?= $delaiValidite->int_value ?>;
var stard_date = document.getElementById('start_validity');
var end_date = document.getElementById('end_validity');
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

(function() {

	var d = new Date();
	end_date.value = addDate(d, delai)
	
})();

function refresh()  {
    window.location.reload()

    }

function changeDate(){
	
	end_date.value = addDate(new Date(stard_date.value) , delai);
		

	}

	function addDate(date1, dalais){
	
		
		
		date1.setDate(date1.getDate() + dalais);
		var year = date1.getFullYear();
		var month = date1.getMonth() + 1;
		var day = date1.getDate()

		if(day < 10){
			day = '0' + day;
		}
		if(month < 10){
			month = '0' + month;
		}

		return year+'-'+month+'-'+day;
		
	}

	document.getElementById("start_validity").setAttribute("min", addDate(new Date(), 0));



	

    
    

</script>

