x<style type="text/css">
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
	.parent 
	{
  		height: 5em; /* hauteur du parent */
  		line-height: 5em; /* hauteur de ligne (identique) */
  		white-space: nowrap; /* interdiction de passer à la ligne */
	}
	.element
	{
  		margin-top: 50vh; /* poussé de la moitié de hauteur de viewport */
  		transform: translateY(-50%); /* tiré de la moitié de sa propre hauteur */
	}

	
</style>

<div class="container-fluid" style="margin-top: 2%;">
	<div class="row" style="margin-bottom: 3%;">
		<div class="col-md-12">
			<h3 style="text-align: center;">CONSTAT DE CONFORMITÉ D’UNE PROCÉDURE D’EXPORTATION</h3>
			<div class="card">
				<div class="card-header" style="background-color: #ABB2B9">
					<h3 class="card-title" style="font-weight: bold;text-align: center;width: 100%;">DETAILS DE LA PROCEDURE</h3>
				</div>
				<?php
					
					echo Form::open(array('url' => 'constat_conformite/attente', 'method' => 'POST'))

				?>
				@csrf
				<div class="card-body">
					<div class="col-md-12">
						<div class="row">

						<div class="col-md-3">
							<div class="form-group">


								<?php


								echo Form::label('proc_number', 'Numéro de procédure');
								echo Form::text('proc_number',$constatConformite->numero,array('class' => 'form-control', 'readonly' => 'readonly'));
								
								?>
								
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

							<?php

								echo Form::label('date_procedure', 'Date de procédure');
								echo Form::text('date_procedure',$constatConformite->created_at,array('class' => 'form-control','disabled'=>'true'));
								
							?>	
							
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('full_name', 'Nom et prénoms du réquérant');
								echo Form::text('full_name_requerant',$constatConformite->prenom_user.' '.$constatConformite->nom_user,array('class' => 'form-control','disabled'=>'true'));
								
								?>
								
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('card_number', 'Numéro de carte');
								echo Form::text('card_number',$constatConformite->reference_carte_professionnelle_usagers,array('class' => 'form-control','disabled'=>'true'));
								
								?>
								
							</div>
						</div>

					</div>

					<div class="row" style="margin-top: 3%">

						<div class="col-md-3">
							<div class="form-group">

							<?php

								echo Form::label('place_of_origin', 'Lieu Provenance');
								echo Form::text('place_of_origin',$constatConformite->nom_communes_provenance,array('class' => 'form-control','disabled'=>'true'));
								
							?>	
							
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

							<?php

								echo Form::label('dpartment_of_origin', 'Département de provenance');
								echo Form::text('dpartment_of_origin',nom_departement_id($constatConformite->departement_provenance),array('class' => 'form-control','disabled'=>'true'));
								
							?>	
							
							</div>
						</div>


						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('to', 'En destination de');
								echo Form::text('to',$constatConformite->titre_pays,array('class' => 'form-control','disabled'=>'true'));
								
								?>
								
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

							<?php

								echo Form::label('ref_doc_of_origin', 'Référence Document de provenance');
								echo Form::text('ref_doc_of_origin',$constatConformite->reference_document_provenance,array('class' => 'form-control','disabled'=>'true'));
								
							?>	
							

							</div>
						</div>

					</div>

					

					<div class="row" style="margin-top: 3%">

						<div class="col-md-3">
							<div class="form-group">

							<?php

								echo Form::label('potting_place', 'Lieu Empotage');
								echo Form::text('potting_place',$constatConformite->localite_empotage,array('class' => 'form-control','disabled'=>'true'));
								
							?>	
							
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('commune_empotage', 'Commune Empotage');
								echo Form::text('commune_empotage',nom_commune_id($constatConformite->commune_empotage),array('class' => 'form-control','disabled'=>'true'));
								
								?>
								
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('dpartment_empotage', 'Département Empotage');

								

								echo Form::text('dpartment_empotage',$constatConformite->nom_departement_provenance,array('class' => 'form-control','disabled'=>'true'));
								
								?>
								
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

							<?php

								echo Form::label('Date_dparture', 'Date départ');
								echo Form::text('Date_dparture',$constatConformite->date_depart,array('class' => 'form-control','disabled'=>'true'));
								
							?>	
							
							</div>
						</div>

					</div>



					<div class="row" style="margin-top: 3%">

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('ref_container', 'Référence conteneur');
								echo Form::text('ref_container',$constatConformite->reference_conteneur,array('class' => 'form-control','disabled'=>'true'));
								
							?>
								
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('ref_plond', 'Référence de plomb');
								echo Form::text('ref_plond',$constatConformite->reference_plomb,array('class' => 'form-control','disabled'=>'true'));
								
								?>
								
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('ref_transport', 'Référence transport');
								echo Form::text('ref_transport',$constatConformite->reference_transporteur,array('class' => 'form-control','disabled'=>'true'));
								
							?>
								
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('driver_name', 'Nom conducteur');
								echo Form::text('driver_name',$constatConformite->nom_conducteur,array('class' => 'form-control','disabled'=>'true'));
								
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

									echo Form::text('date_let_pass',$constatConformite->date_constat,array('class' => 'form-control','readonly' => 'readonly'));
													
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

	<div class="row" style="margin-top: 2%; margin-bottom: 3%">
						<div class="col-md-12">
					<div class="card">
						<div class="card-header" style="background-color: #ABB2B9;">
						<h3 class="card-title" style="font-weight: bold;text-align: center;width: 100%;">DOCUMENTS ATTACHES A LA PROCEDURE</h3>
						</div>
					<div class="row">
				<div class="mt-2 col-md-12">
					<center><div class="dropdown">
					  <span class="dropbtn btn"><?= (show_upload_docs($constatConformite->id_procedure_exportation) != "")? ("Veuillez cliquer pour visualiser les documents") : ("Aucun document disponible"); ?></span>
					  <div class="dropdown-content" >
					  	 <?= show_upload_docs($constatConformite->id_procedure_exportation); ?>
					    
					  </div>
					</div></center>
				</div>
			</div>
					</div>
						</div>
					</div>

	<div class="row" style=" margin-bottom: 1%">
						
		<div class="col-md-2 offset-md-5">
							
			<a class="btn btn-block btn-info annuler" href="{{session('back')}}">Retour</a>				
							
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

	// $(document).ready(function () {
         
 //        alert("cccccccccccccc");

 //        });
</script>