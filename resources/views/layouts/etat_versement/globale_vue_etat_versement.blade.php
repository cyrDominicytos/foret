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
						echo Form::open(array('route' => 'etat.print', 'method' => 'post', 'id'=> 'idProcedureForm'))
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
	 								<td>{{$process->montant_total}} </td>
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
					<h3 class="card-title" style="font-weight: bold;text-align: center;width: 100%;">DOCUMENTS ASSOCIES</h3>
				</div>
				<div class="row">
					<div class="offset-md-4 mt-2 col-md-8 mb-5">
						<div class="dropdown">
						  <span class="dropbtn btn"><?= (show_upload_docs($process->id_procedure_exportation) != "")? ("Veuillez cliquer pour visualiser les documents") : ("Aucun document disponible"); ?></span>
						  <div class="dropdown-content" >
						  	<?= show_upload_docs($process->id_procedure_exportation); ?>
						    
						  </div>
						</div>
					</div>
				</div>
				

				


			</div>
			<div class="card-body">
					<div class="col-md-12">
						<div class="row" style="margin-top: 4%">
						
							<div class="col-md-2 offset-md-5">
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
