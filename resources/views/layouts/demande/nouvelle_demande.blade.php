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
			<h3 style="text-align: center;">DEMANDE ANNUELLE AU TITRE DE L'ANNEE <?=date('Y')?> </h3>
			<div class="card">
				<div class="card-header" style="background-color: #ABB2B9">
					<h3 class="card-title" style="font-weight: bold;text-align: center;width: 100%;">INFORMATIONS DE L'USAGER</h3>
				</div>
				<?php
					
					echo Form::open(array('route' =>(isset($demande)) ? ("demande.update") : ("demande.create"), 'method' => 'POST'));
					if(isset($demande))
					{
					?>
						<input type="number" hidden="" name="id" value="<?= $demande->id ?>">
					<?php
					}
				?>
				@csrf
				<div class="card-body">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">


									<?php

									echo Form::label('proc_number', 'Nom et Prénom du demandeur');
									echo Form::text('proc_number',
									 ($user) ? ($user->name.' '.$user->firstname) : (''),array('class' => 'form-control', 'readonly' => 'readonly'));
									
									?>
									
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">


									<?php


									echo Form::label('proc_number', 'Date de la demande');
									echo Form::text('proc_number',date('d-m-Y'),array('class' => 'form-control', 'readonly' => 'readonly'));
									
									?>
									
								</div>
							</div>

						</div>

						<div class="row" style="margin-top: 3%">

							<div class="col-md-4">
								<div class="form-group">

								<?php

									echo Form::label('place_of_origin', 'Numéro carte professionnelle');
									echo Form::text('place_of_origin',($usager) ? ($usager->reference_carte_professionnelle) : (''),array('class' => 'form-control','disabled'=>'true'));
									
								?>	
								
								</div>
							</div>

						<div class="col-md-4">
							<div class="form-group">

							<?php

								echo Form::label('dpartment_of_origin', 'Numéro carte importateur');
								echo Form::text('dpartment_of_origin',($usager) ? ($usager->reference_permis_coupe) : (''),array('class' => 'form-control','disabled'=>'true'));
								
							?>	
							
							</div>
						</div>


						<div class="col-md-4">
							<div class="form-group">

								<?php

								echo Form::label('to', 'Adresse du demandeur :');
								echo Form::text('to', ($user) ? ($user->adresse) : (''),array('class' => 'form-control','disabled'=>'true'));
								
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
					<h3 class="card-title" style="font-weight: bold;text-align: center;width: 100%">VOLUMES EXPORTES EN <?= (isset($demande)) ? ($demande->demande_pour_annee-1) : (date('Y')-1)  ?></h3>
				</div>

				<div class="card-body">
					<div class="col-md-12">
					
					<table id="example1" class="table table-bordered table-striped">
		                  <thead>
		                  <tr>
		                    <th>Espèce</th>
		                    <th>Produits</th>
		        		    <th>Quantité totale à exporter (m3)</th>
		                    <th>Provenance des produits</th>
		                    <th>Lieu de transformation</th>
		                    <th>Site d’empotage</th>
		                   
		                  </tr>
		                  </thead>
		                  <tbody>
		           				@foreach($produit_exporte as $produit_exportes)
				                  <tr>
				                   <td>{{$produit_exportes->espece_produits}}</td>
				                   <td>{{$produit_exportes->type_produits}}</td>
				                   <td>{{$produit_exportes->volume}}</td>
				                   <td>{{$produit_exportes->commune_provenance}}</td>
				                   <td>{{ nom_commune_id($produit_exportes->id_commune_empotage) }}</td>
				                   <td>{{nom_commune_id($produit_exportes->id_commune_empotage)}}</td>
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

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header" style="background-color: #ABB2B9;">
					<h3 class="card-title" style="font-weight: bold;text-align: center;width: 100%;">SOUMISSION DE LA DEMANDE</h3>
				</div>

				<div class="card-body">
					<div class="col-md-12">
					
						<div class="row" style="margin-top: 3%">

							<div class="offset-md-1 col-md-10 offset-md-1">
									<div class="form-group">

											
										<?php
										

											echo Form::label('start_validity', 'Autres Informations utiles');
															
											echo Form::textarea('autre_info',(isset($demande)) ? ($demande->autre_information) : (""),array('class' => 'form-control','placeholder'=>'Saisissez toutes informations utiles à propos de votre demande',(isset($vue)) ? ("disabled") : (""),'maxlength'=>1000));
															
												?>
															
											</div>
									</div>

							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
	<div class="card-header" style="background-color: #ABB2B9;">
					<h3 class="card-title" style="font-weight: bold;text-align: center;width: 100%;">DOCUMENTS ASSOCIES</h3>
				</div>
				<div class="row">
					<div class="mt-2 col-md-12">
						<center> 
						<div class="dropdown">
						  <span class="dropbtn btn"><?= (show_usager_docs((isset($demande)) ? ($demande->id) : (0)) != "")? ("Veuillez cliquer pour visualiser les documents") : ("Aucun document disponible"); ?></span>
						  <div class="dropdown-content" >
						  	<?= show_usager_docs((isset($demande)) ? ($demande->id) : (0)); ?>
						    
						  </div>
						</div>
						</center>
					</div>
				</div>

				<?php
						if(isset($vue))
						{?>
						<div class="row" style="margin-top: 4%">
							<div class="col-md-4 offset-md-4">
								<div class="form-group">
									<a class="btn btn-block btn-info annuler" href="{{session('back')}}">Retour</a>				
								</div>
								
							</div>
						</div>
						<?php
						}else{
				?>
					<div class="row" style="margin-top: 3%">
						<div class="offset-md-1 col-md-12">

							<div class="form-group">
								<input type="checkbox" name="certifier" value="0" id="certifier" onchange="checkCertifier();">
								<!--<?php
								echo Form::checkbox('certifier', '0');								
								?>-->	
								<label>Je <span style="color: red;"><?= Auth::user()->name .' '.Auth::user()->firstname ?></span>  certifie exact toutes les informations fournies</label>
								
												
												
							</div>
						</div>
					</div>
					<div class="row" style="margin-top: 4%">
						<div class="offset-md-2 col-md-2">
						
							<div class="form-group">
	
							<?php
									echo Form::submit((isset($demande)) ? ("Modifier") : ("Enregistrer"), array('class' => 'btn btn-block btn-success', 'disabled'=> true, 'id'=>'submit'));
								?>	
													
							</div>
					</div>

					<div class="col-md-2 offset-md-1">
						<div class="form-group">
									
						</div>
					</div>

					<div class="col-md-2 offset-md-1">
						<div class="form-group">
							<a class="btn btn-block btn-info annuler" href="{{Route('demandes', ['details' => 'toute'])}}">Retour</a>				
						</div>
						
					</div>
				</div>
				<?php
				}
					echo Form::close() 
				?>
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