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
						echo Form::open(array('route' => 'etat.save_regle', 'method' => 'post', 'id'=> 'idRegleQuittanceForm','onsubmit'=> 'return checkAll()', 'enctype'=> 'multipart/form-data'))
					?>
					<input type="number" name="id" hidden="" value="{{$process->id}}">
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
								echo Form::text('numero_carte_exportateur',$process->date_depart,array('class' => 'form-control','disabled'=>'true'));
								
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
					<h3 class="card-title" style="font-weight: bold;text-align: center;width: 100%">ETAT DE VERSEMENT DES RECETTES FORESTIERES</h3>
				</div>

				<div class="card-body">
					<div class="col-md-12">
					
					<table id="example1" class="table table-bordered table-striped">
		                  <thead>
		                  <tr>
		                    <th>Société/Nom et Prénoms</th>
		                    <th>Espèces Produits</th>
		                    <th>Type d'expoitation / Origine</th>
		        		    
		                    <th>Nature de la recette</th>
		                    <th>Prix Unitaire (FCFA)/m3</th>
		                    <th>Volume (m3)</th>
		                    <th>Montant (FCFA)</th>
		                   
		                  </tr>
		                  </thead>
		                  <tbody>
		           				@foreach($caracteristique as $produit_exportes)
				                  <tr>
				                   <td>{{$process->prenom_user .' '.$process->nom_user}}</td>
				                   <td>{{$produit_exportes->espece_produits}}</td>
				                   <td>{{$produit_exportes->type_exploitation}}</td>
				                   <td>{{$produit_exportes->nature_recette	}}</td>
				                   <td>{{$produit_exportes->prix_unitaire}}</td>
				                   <td>{{ $produit_exportes->volume}}</td>
				                   <td>{{$produit_exportes->volume * $produit_exportes->prix_unitaire}}</td>
				                  </tr>               
	 							@endforeach
	 							<tr>
	 								<td colspan="6" style="text-align: center; font-weight: bold;">TOTAL</td>
	 								<td style="font-weight: bold;">{{$process->montant_total}} </td>
	 							</tr>
	                  </tbody>
                  	
               	 </table>
               	 <p style="color: red; text-align: center; font-weight: bold;" ><?=(isset($no_data_found)) ? ($no_data_found) : ('') ?></p>
               	 
					


					</div>
				</div>
			</div>
		</div>
	</div>

		<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header" style="background-color: #ABB2B9;">
					<h3 class="card-title" style="font-weight: bold;text-align: center;width: 100%;">REGLER L'ETAT DE VERSEMENT</h3>
				</div>

				<div class="card-body">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">

									<?php

									echo Form::label('ref_transport', 'Numéro de quittance');
									echo Form::label('commune_empotage', '*',array('style' => 'color:red'));
									echo Form::text('numero_quittance',"",array('class' => 'form-control','placeholder'=>'Saisir le numéro de la quittance','maxlength'=>'30','id'=>'numero_quittance','required'=>true,'title'=>'Saisir le numéro de la quittance', 'onchange'=>'checkAll();'));
									
								?>
									
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">

									<?php

									echo Form::label('driver_name', 'Date quittance');
									echo Form::label('Date_dparture', '*',array('style' => 'color:red'));
									echo Form::date('date_departs',"",array('class' => 'form-control','placeholder'=>'Sélectionner la date','id'=>'date_depart2','required'=>true,'title'=>"Saisir la date de départ", 'onchange'=>'checkAll();'));
									
								?>
									
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">

									<?php

									echo Form::label('driver_name', 'Lieu De Délivrance');
									echo Form::label('commune_empotage', '*',array('style' => 'color:red'));
									echo Form::text('delivre_a',"",array('class' => 'form-control','placeholder'=>'Saisir le lieu de la quittance','maxlength'=>'60','required'=>true,'id'=>'delivre_a','title'=>'Saisir le lieu de la quittance', 'onchange'=>'checkAll();'));
									
								?>
									
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4">
								<div class="form-group">

									<?php

									echo Form::label('ref_transport', 'Nom du Commissionnaire Agréé ');
									echo Form::label('commune_empotage', '*',array('style' => 'color:red'));
									echo Form::text('nom_commissaire_agree','',array('class' => 'form-control','placeholder'=>'Saisir nom du commissionnaire Agréé','maxlength'=>'60','id'=>'nom_commissaire_agree','required'=>true,'title'=>'Saisir le nom du commissionnaire Agréé', 'onchange'=>'checkAll();'));
									
								?>
									
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">

									<?php

									echo Form::label('driver_name', 'Tel du commissionnaire ');
									echo Form::label('commune_empotage', '*',array('style' => 'color:red'));
									echo Form::tel('contact_commissaire_agree',"+229",array('class' => 'form-control','placeholder'=>'61000000','maxlength'=>'13','minlength'=>'8','id'=>'contact','required'=>true,'title'=>'Saisir le contact du commissionnaire', 'pattern'=>"^^((\+229)|(00229)|())((51)|(6[0-9]{1})|(9[0-1-4-5-6-7-8-9]{1}))([0-9]{6})", 'onchange'=>'checkAll();'));
									
								?>
									
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">

											<?php

											echo Form::label('ref_file', 'Quittance de paiement (pdf)');
											echo Form::label('ref_file', '*',array('style' => 'color:red'));
											?>
											<input type="file" name="quittance" id="quittance" required="" onchange="checkfile();"  title='Seuls les documents pdf, image ou word sont autorisés'>
								</div>
							</div>
						</div>
							
							<div class="row" style="margin-top: 4%">
								<div class="offset-md-2 col-md-2">
								
									<div class="form-group">
		 
									<?php
											echo Form::submit("Enregistrer", array('class' => 'btn btn-block btn-success',  'id'=>'submit', 'onclick'=>'checkfile();'));
										?>	
															
									</div>
							</div>

							<div class="col-md-2 offset-md-1">
								<div class="form-group">
											
								</div>
							</div>

							<div class="col-md-2 offset-md-1">
								<div class="form-group">
									<a class="btn btn-block btn-info annuler" href="{{session('back')}}">Retour</a>				
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
	</div>
</div>
<script>
	var quittance = document.getElementById("quittance");
	var numero_quittance = document.getElementById("numero_quittance");
	var date_depart2 = document.getElementById("date_depart2");
	var delivre_a = document.getElementById("delivre_a");
	var nom_commissaire_agree = document.getElementById("nom_commissaire_agree");
	var contact = document.getElementById("contact");
	var submit = document.getElementById("submit");


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
document.getElementById("date_depart2").setAttribute("max", today);


	(function () {
		submit.disabled = true;
	})();

	function checkfile() {
		if(quittance.value  != "" && checkAll())
		{
			submit.disabled = false;
		}else{
			submit.disabled = true;
		}
	}
	function checkAll() {
	  
		/*if(quittance.value  != "" && numero_quittance.value  != "" && date_depart2.value  != "" && delivre_a.value  != "" && nom_commissaire_agree.value  != "" && contact.value  != "")
		{

			submit.disabled = false;
			return  true;
		}else{
			submit.disabled = true;
			return  false;
		}*/

		$("#idRegleQuittanceForm").find('.error').removeClass('error');

		if( $("#idRegleQuittanceForm").validate().element("#numero_quittance") && 
			$("#idRegleQuittanceForm").validate().element("#date_depart2") &&  
			$("#idRegleQuittanceForm").validate().element("#delivre_a") && 
			$("#idRegleQuittanceForm").validate().element("#nom_commissaire_agree") && 
			$("#idRegleQuittanceForm").validate().element("#contact")&& 
			$("#idRegleQuittanceForm").validate().element("#quittance"))
		{

			submit.disabled = false;
			return  true;
		}else{
			submit.disabled = true;
			return  false;
		}
	}



function inputReset(element) {
    if (element.hasClass('error')) {
        element.removeClass("error");
        element.siblings('.error-message').remove();
    }
}


</script>