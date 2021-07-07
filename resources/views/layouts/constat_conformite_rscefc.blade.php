<style type="text/css">
.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #ccc; 
}

.panel {
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;
}
.accordion:after {
  content: '\02795'; /* Unicode character for "plus" sign (+) */
  font-size: 13px;
  color: #777;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2796"; /* Unicode character for "minus" sign (-) */
}

.bg-gradient-orange {
    background: #F6B14D linear-gradient(
180deg 
, #D8850E, #F6B14D) repeat-x !important;
}
.bg-gradient-orange {
    color: #fff;
}
.bg-gradient-orange.btn:hover {
    color: #fff;
}
</style>

<div class="container-fluid" style="margin-top: 2%">
	<div class="row">
		
		<div class="col-md-12">

		<div class="card">
			<div class="card-header">
						
					<h3 class="card-title" style="font-weight: bold;text-align: center;width: 100%">CONSTAT DE CONFORMITÉ D’UNE PROCÉDURE D’EXPORTATION</h4>
			</div>
			<div class="card-body">
				<div style="margin-bottom: 3%">
					<h5 style="font-weight: bold;text-align: center;width: 100%">DÉTAILS DE LA DEMANDE</h5>
				</div>
				<div class="col-md-12">

					<div class="row">

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('proc_number', 'Numéro de procédure');
								echo Form::text('proc_number','448876/DGEFC/YYYY',array('class' => 'form-control','disabled'=>'true'));
								
								?>
								
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

							<?php

								echo Form::label('date_procedure', 'Date de procédure');
								echo Form::text('date_procedure',date('d/m/Y'),array('class' => 'form-control','disabled'=>'true'));
								
							?>	
							
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('full_name', 'Nom et prénoms du réquérant');
								echo Form::text('full_name_requerant','Valentin AKANDO',array('class' => 'form-control','disabled'=>'true'));
								
								?>
								
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('card_number', 'Numéro de carte');
								echo Form::text('card_number','xxx-xxx-xxx',array('class' => 'form-control','disabled'=>'true'));
								
								?>
								
							</div>
						</div>

					</div>

					<div class="row" style="margin-top: 3%">

						<div class="col-md-4">
							<div class="form-group">

							<?php

								echo Form::label('place_of_origin', 'Lieu Provenance');
								echo Form::text('place_of_origin','Gogoro',array('class' => 'form-control','disabled'=>'true'));
								
							?>	
							
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">

							<?php

								echo Form::label('dpartment_of_origin', 'Département de provenance');
								echo Form::text('dpartment_of_origin','Zou',array('class' => 'form-control','disabled'=>'true'));
								
							?>	
							
							</div>
						</div>


						<div class="col-md-4">
							<div class="form-group">

								<?php

								echo Form::label('to', 'En destination de:');
								echo Form::text('to','Allemangne',array('class' => 'form-control','disabled'=>'true'));
								
								?>
								
							</div>
						</div>

					</div>


					<div class="row" style="margin-top: 3%">

						<div class="col-md-6">
							<div class="form-group">

							<?php

								echo Form::label('ref_doc_of_origin', 'Référence Document de provenance');
								echo Form::text('ref_doc_of_origin','Xxx-xxxx-xxx',array('class' => 'form-control','disabled'=>'true'));
								
							?>	
							

							</div>
						</div>

						<div class="col-md-4 offset-md-1">
							<div class="form-group">

								<?php

								echo Form::label('ref_file', 'Document de référence (pdf)');
								echo Form::text('ref_file','Reference.pdf',array('class' => 'form-control','disabled'=>'true'));
								
								
								?>
								
							</div>
						</div>

						<div class="col-md-1" style="margin-top: 31px" >
							<div class="form-group">
								<!-- <a href=""> -->
								<button class="form-control" style="border: 1px solid black;background-color: #D2E2F9 ;">
									<i class="fa fa-plus"></i>
								</button>
								<!-- </a> -->
								
							</div>
						</div>

					</div>

					<div class="row" style="margin-top: 3%">

						<div class="col-md-3">
							<div class="form-group">

							<?php

								echo Form::label('potting_place', 'Lieu Empotage');
								echo Form::text('potting_place','Savè',array('class' => 'form-control','disabled'=>'true'));
								
							?>	
							
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('commune_empotage', 'Commune Empotage');
								echo Form::text('commune_empotage','Savè',array('class' => 'form-control','disabled'=>'true'));
								
								?>
								
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('dpartment_empotage', 'Département Empotage');
								echo Form::text('dpartment_empotage','Zou',array('class' => 'form-control','disabled'=>'true'));
								
								?>
								
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

							<?php

								echo Form::label('Date_dparture', 'Date départ');
								echo Form::text('Date_dparture','20/02/2021',array('class' => 'form-control','disabled'=>'true'));
								
							?>	
							
							</div>
						</div>

					</div>



					<div class="row" style="margin-top: 3%">

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('ref_container', 'Référence conteneur');
								echo Form::text('ref_container','xx-444-fff',array('class' => 'form-control','disabled'=>'true'));
								
							?>
								
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('ref_plond', 'Référence de plomb');
								echo Form::text('ref_plond','2345/vvv-fff',array('class' => 'form-control','disabled'=>'true'));
								
								?>
								
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('ref_transport', 'Référence transport');
								echo Form::text('ref_transport','AG-3930-RB',array('class' => 'form-control','disabled'=>'true'));
								
							?>
								
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('driver_name', 'Nom conducteur');
								echo Form::text('driver_name','Jean AGOSSA',array('class' => 'form-control','disabled'=>'true'));
								
							?>
								
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
		           
				                  <tr>
				                   <td></td>
				                   <td></td>
				                   <td></td>
				                   <td></td>
				                   <td></td>
				                   <td></td>
				                  </tr>               
	 
	                  </tbody>
                  
               	 </table>

					


					</div>
				</div>
			</div>
		</div>
	</div>




<h4 style="text-align: center;width: 100%;margin-top: 3%;font-weight: bold;">Décision Constat de Conformité :
				</h4>

<div class="row" style="margin-top: 3%">

	<div class="col-md-4">
				<div style="margin-top: 8%" class="form-group">
					<span style="font-size: 18px;font-weight: bold">Conformité au contenu de la demande du réquérant:</span>
								
				</div>
	</div>

<div class="col-md-4">
	<div class="form-group" style="margin-left: 20%">

		<?php
			echo Form::label('conforme1', 'SONT CONFORMES',array('style'=>'font-size:14px;'));
			echo "<br>"; 
			echo Form::checkbox('conforme1','','',array('style'=>'width:80px;height:40Px;margin-left:25px'));
		?>	
							
	</div>
</div>

<div class="col-md-4" style="border: none;">
	<div class="form-group">

		<?php
			echo Form::label('no_conforme1', 'SONT NON CONFORMES',array('style'=>'font-size:14px;'));
			echo "<br>"; 
			echo Form::checkbox('no_conforme1','','',array('style'=>'width:80px;height:40Px;margin-left:25px;'));
		?>	
							
	</div>
</div>						

</div>


<div class="row" style="margin-top: 3%">

	<div class="col-md-4">
				<div style="margin-top: 8%" class="form-group">
					<span style="font-size: 18px;font-weight: bold">Conformité à le règlementation en vigeur en république du Bénin:</span>
								
				</div>
	</div>

<div class="col-md-4">
	<div class="form-group" style="margin-left: 20%">

		<?php
			echo Form::label('conforme2', 'SONT CONFORMES',array('style'=>'font-size:14px;'));
			echo "<br>"; 
			echo Form::checkbox('conforme2','','',array('style'=>'width:80px;height:40Px;margin-left:25px'));
		?>	
							
	</div>
</div>

<div class="col-md-4">
	<div class="form-group">

		<?php
			echo Form::label('no_conforme2', 'SONT NON CONFORMES',array('style'=>'font-size:14px;'));
			echo "<br>"; 
			echo Form::checkbox('no_conforme2','','',array('style'=>'width:80px;height:40Px;margin-left:25px'));
		?>	
							
	</div>
</div>						

</div>


<div class="row" style="margin-top: 5%">
	<div class="col-md-4">
		<div class="form-group">

			<?php

				echo Form::label('date_constat', 'Date du Constat de conformité');
								
				echo Form::text('date_constat','20/01/2021',array('class' => 'form-control','disabled'=>'true'));
								
					?>
								
				</div>
			</div>

			<div class="col-md-4 offset-md-4">
				<div class="form-group">

					<?php

						echo Form::label('info_agent', 'Grade, Nom et prénom de l’agent');
						echo Form::text('info_agent','Lieutenant Jean ZOHOUN',array('class' => 'form-control','disabled'=>'true'));
								
					?>
								
				</div>
			</div>
</div>







<div class="row" style="margin-top: 8%">

	<div class="col-md-2 offset-md-7">
		<div class="form-group">

			<?php

				echo Form::submit('Enregistrer',array('class' => 'form-control btn btn-block bg-gradient-success'));
	
			?>	
							
		</div>
</div>

<div class="col-md-2 offset-md-1">
	<div class="form-group">

		<?php

			echo Form::button('Annuler',array('class' => 'form-control btn btn-block bg-gradient-orange'));
	
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