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
			
			<h3 style="text-align: center;"><?= (isset($av)) ? ($t = "EXTENSION DE L'AVIS TECHNIQUE") : ($t = "EMISSION DE L'AVIS TECHNIQUE") ?></h3>
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
					<h3 class="card-title" style="font-weight: bold;text-align: center;width: 100%">NATURE ET QUANTITE DES PRODUITS</h3>
				</div>

				<div class="card-body">
					<div class="col-md-12">
					
					<table id="example1" class="table table-bordered table-striped">
		                  <thead>
		                  <tr>
		                    <th>Société/Nom et Prénoms</th>
		                    <th>Espèces Produits</th>
		                    <th>Nature de la recette</th>
		                    <th>Prix Unitaire (FCFA)/m3</th>
		                    <th>Volume (m3)</th>
		                    <th>Montant (FCFA)</th>
		                   
		                  </tr>
		                  </thead>
		                  <tbody>
		                  		<?php $total = 0; ?>
		                  	
		           				@foreach($caracteristiques as $caracteristique)
		           					<?php $total += $caracteristique->volume * $caracteristique->prix_unitaire;?>
				                  <tr>
				                   <td>{{user_usager_id($donnees->id_usager)->firstname .' '.user_usager_id($donnees->id_usager)->name}}</td>
				                   <td>{{$caracteristique->espece_produits}}</td>
				                   <td>{{$caracteristique->nature_recette}}</td>
				                   <td>{{$caracteristique->prix_unitaire}}</td>
				                   <td>{{ $caracteristique->volume}}</td>
				                   <td>{{$caracteristique->volume * $caracteristique->prix_unitaire}}</td>
				                  </tr>               
	 							@endforeach
	 							<tr>
	 								<td colspan="5" style="text-align: center; font-weight: bold;">TOTAL</td>
	 								<td>{{ $total }}</td>
	 						
	 							</tr>
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
					
					<h3 class="card-title" style="font-weight: bold;text-align: center;width: 100%;"><?= (isset($av)) ? ($title = "FORMULAIRE D'EXTENSION DE L'AVIS TECHNIQUE") : ($title = "FORMULAIRE D'EMISSION DE L'AVIS TECHNIQUE") ?></h3>
				</div>
				<?php
					
					echo Form::open(array('url' => (isset($av)) ? ('avis_technique/etendre') : ('avis_technique/attente') , 'method' => 'POST','id' => 'lp_form'));

				?>
				@csrf

				<div class="card-body">
					<div class="col-md-12">
					<?php
						if(isset($av))
						{
							?>
						
						<input type="hidden" name="id_to_upd" value=<?= $procedureEnAttentesDetails->id ?> />
					<?php
					}
					?>
						<div class="row" style="margin-top: 3%">

							<div class="offset-md-1 col-md-4">
									<div class="form-group">

											
										<?php
																			

										  echo Form::hidden('id_p', $procedureEnAttentesDetails->id);
									

											echo Form::label('start_validity_avis', 'Début Validité');
											echo Form::label('start_validity_avis', '*',array('style' => 'color:red'));				
											echo Form::date('start_validity_avis',\Carbon\Carbon::now(),array('class' => 'form-control','placeholder'=>'', 'onchange' => 'changeDate()', 'id' => 'start_validity_avis'));
															
												?>
															
											</div>
									</div>

							<div class="col-md-4 offset-md-2">
									<div class="form-group">

												<?php
											echo Form::label('end_validity_avis', 'Fin Validité');				
											echo Form::text('end_validity_avis',date('Y-m-d'),array('class' => 'form-control', 'readonly' => 'readonly', 'id' => 'end_validity_avis'));
															
												?>
															
									</div>
							</div>					

					</div>

					<div class="row" style="margin-top: 3%">
						<div class="offset-md-1 col-md-4">
							<div class="form-group">

								<?php

									echo Form::label('date_let_pass', 'Fait le:');
													
									echo Form::text('date_let_pass',date('Y-m-d'),array('class' => 'form-control','readonly' => 'readonly'));
													
										?>
													
									</div>
						</div>

						<div class="col-md-4 offset-md-2">
							<div class="form-group">

										<?php

											echo Form::label('info_agent', 'DRAF' );
											echo Form::text('info_agent',Auth::user()->firstname.' '.Auth::user()->name,array('class' => 'form-control','readonly' => 'readonly'));
													
										?>
													
							</div>
						</div>
					</div>

					<div class="row" style="margin-top: 4%">

						<div class="offset-md-2 col-md-2" id="reject">
							
							<div class="form-group">
								
								<a href="" style="color: white;" class="btn btn-block btn-danger" data-toggle="modal" data-target="#rejectModal">Rejeter</a>  			
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

									if(isset($av)){
										echo Form::submit('Etendre', array('class' => 'btn btn-block btn-success'));
									}else{
										echo Form::submit('Emettre', array('class' => 'btn btn-block btn-success'));
									}
									
								?>			
							</div>
							
						</div>
					</div>

			</div>




					</div>
				</div>

				

		
		</div>
	</div>



	<div id="rejectModal" data-backdrop="static" class="modal fade" role="dialog">

                <div class="modal-dialog">



                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #E74C3C;">
                            <h4 class="modal-title">Rejet d'une demande d'avis technique'</h4>
                            <div class="modal-close-area modal-close-df">
                                <button type="button" class="close" data-dismiss="modal" onclick="refresh()" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                            </div>
                        </div>
                   
                        <div class="modal-body">
                            <?php
                            	echo Form::textarea('reasonRejectAvis', '', ['id' => 'reasonRejectAvis', 'rows' => 8, 'cols' => 20, 'style' => 'resize:none', 'class' => 'form-control', 'placeholder' => 'Taper ici la raison du rejet'])

                            ?>
                        </div>
                        <div class="modal-footer">
		                    <?php
									echo Form::button('Valider', array('class' => 'btn btn-danger','onclick'=>"if(document.getElementById('reasonRejectAvis').value != ''){document.getElementById('lp_form').submit();}"));
							?>
		                    <a onclick="refresh()" class="btn btn-default" style="background-color: #C0C1C5;color: white;" data-dismiss="modal">Non</a>
                
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
var l = <?= (isset($av)) ? (1) : (0) ?>;
var stard_date = document.getElementById('start_validity_avis');
var end_date = document.getElementById('end_validity_avis');
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

	document.getElementById("start_validity_avis").setAttribute("min", addDate(new Date(), 0));



	if(l == 1){

		document.getElementById("reject").style.display = "none";
	}

    
    

</script>



