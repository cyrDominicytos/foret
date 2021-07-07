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
			<h3 style="text-align: center;">APPOSITION DU VISA SUR L'AVIS TECHNIQUE </h3>
			<div class="card">
				<div class="card-header" style="background-color: #ABB2B9">
					<h3 class="card-title" style="font-weight: bold;text-align: center;width: 100%;">DETAILS DE LA PROCEDURE</h3>
				</div>
				<?php
					
					echo Form::open(array('url' => '/visa/store', 'method' => 'POST','id'=>'forms','enctype'=> 'multipart/form-data'))

				?>
				@csrf
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
								echo Form::hidden('id_p',$procedureEnAttentesDetails->id_procedure_exportation,array('class' => 'form-control'));

									echo Form::hidden('num_contre_constat',$procedureEnAttentesDetails->numero,array('class' => 'form-control'));


									echo Form::hidden('departement_empotage',$procedureEnAttentesDetails->departement_empotage,array('class' => 'form-control'));
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


<div class="row" style="margin-top: 2%">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header" style="background-color: #ABB2B9;">
					<h3 class="card-title" style="font-weight: bold;text-align: center;width: 100%;">VISÉ AVIS TECHNIQUE </h3>
				</div>

		<div class="card-body">
			<div class="row">
				

							<div class="col-md-3 offset-md-4">
							<div class="form-group">

								<?php

								echo Form::label('visa', 'Joindre l\'Avis Technique visé');
								echo Form::label('visa', '*',array('style' => 'color:red'));
								echo Form::input('file','visa',null, array('class' => 'form-control','id'=>'visa','onchange'=>'checkfile();', 'title'=>'Seuls les documents pdf, image ou word sont autorisés'));
								
								?>
								
							</div>
						</div>
						<div class="col-md-1">
							<div class="form-group">

								<?php
								echo Form::label('', '');
								?>
								<div class="" style="border: 1px solid black;background-color: #D2E2F9 ;border-radius: 5px;" >
									<a title="Cliquez pour télécharger l'Avis Technique" href="<?= show_doc($procedureEnAttentesDetails->id_procedure_exportation,7)['link'] ?>" class="btn"><i class="fa fa-download"></i></a>
								</div>
							</div>
						</div>		

				

			</div>
		</div>

		<div class="row">
						<div class="col-md-8 offset-md-2">
							<div class="form-group">
								<?php

								
									
								echo Form::label('observation', 'Observation');

								echo Form::textarea('observation','',array('class' => 'form-control','style'=>'resize:none;','maxlength'=>'1000','rows'=>'4'));
							
								?>
							</div>
						</div>
				</div>

		<div class="row" style="margin-top: 2%">
						<div class="offset-md-1 col-md-4">
							<div class="form-group">

								<?php

									echo Form::label('date_visa', 'Date du Visa');

									echo Form::text('date_visa',date('Y-m-d H:i:s'),array('class' => 'form-control','readonly' => 'readonly'));
													
										?>
													
									</div>
						</div>

						<div class="col-md-4 offset-md-2">
							<div class="form-group">

										<?php

											echo Form::label('info_agent', 'Grade, Nom et prénom de l’agent' );
											echo Form::text('info_agent',forestier_user_id(Auth::user()->id)->grade.', '.Auth::user()->firstname.' '.Auth::user()->name,array('class' => 'form-control','readonly' => 'readonly'));
													
										?>
													
							</div>
						</div>
					</div>
		


			</div>
		</div>
	</div>



	<div class="row" style="margin-top: 1%">

		<div class="offset-md-2 col-md-2">
							
			<div class="form-group">
 							
				<?php

				echo Form::button('Rejeter',array('class' => 'form-control btn btn-block bg-red','id'=>'reject','onclick'=>'store_reject()'));
							
				?>
											
			</div>
		</div>

		<div class="col-md-2 offset-md-1">
			<div class="form-group">
				<a class="btn btn-block btn-info annuler" href="{{session('back')}}">Retour</a>				
			</div>
		</div>

		<div class="col-md-2 offset-md-1">
			<div class="form-group">

				<?php
				echo Form::submit('Viser', array('class' => 'btn btn-block btn-success','id'=>'save'));
				?>			
			</div>
							
		</div>
	</div>
	
		<?php
		echo Form::close() 
		?>
</div>


<script>
	var visa = document.getElementById("visa");
	var submits = document.getElementById("save");
	var reject = document.getElementById("reject");
	

function store_reject()
{
	document.getElementById('forms').submit();
}    

(function () {
		submits.disabled = true;
})();

	function checkfile() {
		if(visa.value  != "")
		{
			submits.disabled = false;
			reject.disabled = true;
		}else{
			submits.disabled = true;
			reject.disabled = false;
		}
	}
</script>