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
						
					<h3 class="card-title" style="font-weight: bold;text-align: center;width: 100%">DEMANDE D’EXPORTATION AU TITRE DE L’ANNÉE  2021</h4>
			</div>
			<div class="card-body">
				<div class="col-md-12">

					<div class="row">

						<div class="col-md-4">
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

								echo Form::label('card_number_pro', 'Numéro carte professionnelle');
								echo Form::text('cart_number_pro','xxx-xxx-xxx',array('class' => 'form-control','disabled'=>'true'));
								
								?>
								
							</div>
						</div>

						<div class="col-md-1" style="margin-top: 31px" >
							<div class="form-group">
								<!-- <a href=""> -->
								<button class="form-control" title="Télécharger la carte professionnelle" style="border: 1px solid black;background-color: #D2E2F9 ;">
									<i class="fa fa-download"></i>
								</button>
								<!-- </a> -->
								
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('card_number_expo', 'Numéro de carte exportateur');
								echo Form::text('card_number_expo','xxx-xxx-xxx',array('class' => 'form-control','disabled'=>'true'));
								
								?>
								
							</div>
						</div>

						<div class="col-md-1" style="margin-top: 31px" >
							<div class="form-group">
								<!-- <a href=""> -->
								<button class="form-control" title="Télécharger la carte exportateur" style="border: 1px solid black;background-color: #D2E2F9 ;">
									<i class="fa fa-download"></i>
								</button>
								<!-- </a> -->
								
							</div>
						</div>

					</div>

					<div class="row" style="margin-top: 3%">

						<div class="col-md-4">
							<div class="form-group">

								<?php

								echo Form::label('full_name', 'Nom et prénom du demandeur');
								echo Form::text('full_name_requerant','Valentin AKANDO',array('class' => 'form-control','disabled'=>'true'));
								
								?>
								
							</div>
						</div>

						

						<div class="col-md-7">
							<div class="form-group">

								<?php

								echo Form::label('address_demandeur', 'Adresse du demandeur');
								echo Form::text('address_demandeur','Rue 1230 Agla, Cotonou',array('class' => 'form-control','disabled'=>'true'));
								
								?>
								
							</div>
						</div>

					</div>


				<h4 style="text-align: center;width: 100%;margin-top: 3%;font-weight: bold;">Volume exporté en 2020:
				</h4>

<div style="margin-top: 2%">
<button class="accordion" style="font-weight: bold;font-size: 20px;">Teck</button>
<div class="panel">

<div class="row" style="margin-top: 3%">
	<div class="col-md-4">
		<div class="form-group">

			<?php

				echo Form::label('qte_export_teck', 'Quantité totale à exporter (m3)');
				echo Form::label('qte_export_teck', '*',array('style' => 'color:red'));				
				echo Form::number('qte_export_teck','',array('class' => 'form-control','placeholder'=>'Saisir le volume','min'=>'1','max'=>'999999'));
								
					?>
								
		</div>
	</div>


	<div class="col-md-4">
				<div class="form-group">

					<?php

						echo Form::label('origin_product_teck', 'Provenance 
des produits');
						echo Form::label('origin_product_teck', '*',array('style' => 'color:red'));
						echo Form::text('origin_product_teck','',array('class' => 'form-control','placeholder'=>'Saisir la provenance','maxlength'=>'60'));
								
					?>
								
				</div>
	</div>

	<div class="col-md-4">
				<div class="form-group">

					<?php

						echo Form::label('process_place_teck', 'Lieu de transformation');
						echo Form::label('process_place_teck', '*',array('style' => 'color:red'));
						echo Form::text('process_place_teck','',array('class' => 'form-control','placeholder'=>'Saisir le lieu','maxlength'=>'60'));
								
					?>
								
				</div>
	</div>

	<div class="col-md-4 offset-md-1">
		<div class="form-group">

			<?php

				echo Form::label('potting_site_teck', 'Site d’empotage');
				echo Form::label('potting_site_teck', '*',array('style' => 'color:red'));
				echo Form::text('potting_site_teck','',array('class' => 'form-control','placeholder'=>'Saisir le lieu','maxlength'=>'60'));
								
			?>
								
		</div>
	</div>

	<div class="col-md-4 offset-md-2">
				<div class="form-group">

					<?php

						echo Form::label('product_type_teck', 'Type produit');
						echo Form::label('product_type_teck', '*',array('style' => 'color:red'));
						echo Form::select('product_type_teck', array('Sélectionner le type' => 'Sélectionner le type','B' => 'B', 'C'=>'C'), '',array('class'=>'form-control'));
								
					?>
								
				</div>
	</div>
		

</div>

</div>








<button class="accordion" style="font-weight: bold;font-size: 20px;">Gmelina</button>
<div class="panel">

<div class="row" style="margin-top: 3%">
	<div class="col-md-4">
		<div class="form-group">

			<?php

				echo Form::label('qte_export_gmelina', 'Quantité totale à exporter (m3)');
				echo Form::label('qte_export_gmelina', '*',array('style' => 'color:red'));				
				echo Form::number('qte_export_gmelina','',array('class' => 'form-control','placeholder'=>'Saisir le volume','min'=>'1','max'=>'999999'));
								
					?>
								
		</div>
	</div>


	<div class="col-md-4">
				<div class="form-group">

					<?php

						echo Form::label('origin_product_gmelina', 'Provenance 
des produits');
						echo Form::label('origin_product_gmelina', '*',array('style' => 'color:red'));
						echo Form::text('origin_product_gmelina','',array('class' => 'form-control','placeholder'=>'Saisir la provenance','maxlength'=>'60'));
								
					?>
								
				</div>
	</div>

	<div class="col-md-4">
				<div class="form-group">

					<?php

						echo Form::label('process_place_gmelina', 'Lieu de transformation');
						echo Form::label('process_place_gmelina', '*',array('style' => 'color:red'));
						echo Form::text('process_place_gmelina','',array('class' => 'form-control','placeholder'=>'Saisir le lieu','maxlength'=>'60'));
								
					?>
								
				</div>
	</div>

	<div class="col-md-4 offset-md-1">
		<div class="form-group">

			<?php

				echo Form::label('potting_site_gmelina', 'Site d’empotage');
				echo Form::label('potting_site_gmelina', '*',array('style' => 'color:red'));
				echo Form::text('potting_site_gmelina','',array('class' => 'form-control','placeholder'=>'Saisir le lieu','maxlength'=>'60'));
								
			?>
								
		</div>
	</div>

	<div class="col-md-4 offset-md-2">
				<div class="form-group">

					<?php

						echo Form::label('product_type_gmelina', 'Type produit');
						echo Form::label('product_type_gmelina', '*',array('style' => 'color:red'));
						echo Form::select('product_type_gmelina', array('Sélectionner le type' => 'Sélectionner le type','B' => 'B', 'C'=>'C'), '',array('class'=>'form-control'));
								
					?>
								
				</div>
	</div>
		

</div>
</div>












<button class="accordion" style="font-weight: bold;font-size: 20px;">Acacia</button>
<div class="panel">

<div class="row" style="margin-top: 3%">
	<div class="col-md-4">
		<div class="form-group">

			<?php

				echo Form::label('qte_export_acacia', 'Quantité totale à exporter (m3)');
				echo Form::label('qte_export_acacia', '*',array('style' => 'color:red'));				
				echo Form::number('qte_export_acacia','',array('class' => 'form-control','placeholder'=>'Saisir le volume','min'=>'1','max'=>'999999'));
								
					?>
								
		</div>
	</div>


	<div class="col-md-4">
				<div class="form-group">

					<?php

						echo Form::label('origin_product_acacia', 'Provenance 
des produits');
						echo Form::label('origin_product_acacia', '*',array('style' => 'color:red'));
						echo Form::text('origin_product_acacia','',array('class' => 'form-control','placeholder'=>'Saisir la provenance','maxlength'=>'60'));
								
					?>
								
				</div>
	</div>

	<div class="col-md-4">
				<div class="form-group">

					<?php

						echo Form::label('process_place_acacia', 'Lieu de transformation');
						echo Form::label('process_place_acacia', '*',array('style' => 'color:red'));
						echo Form::text('process_place_acacia','',array('class' => 'form-control','placeholder'=>'Saisir le lieu','maxlength'=>'60'));
								
					?>
								
				</div>
	</div>

	<div class="col-md-4 offset-md-1">
		<div class="form-group">

			<?php

				echo Form::label('potting_site_acacia', 'Site d’empotage');
				echo Form::label('potting_site_acacia', '*',array('style' => 'color:red'));
				echo Form::text('potting_site_acacia','',array('class' => 'form-control','placeholder'=>'Saisir le lieu','maxlength'=>'60'));
								
			?>
								
		</div>
	</div>

	<div class="col-md-4 offset-md-2">
				<div class="form-group">

					<?php

						echo Form::label('product_type_acacia', 'Type produit');
						echo Form::label('product_type_acacia', '*',array('style' => 'color:red'));
						echo Form::select('product_type_acacia', array('Sélectionner le type' => 'Sélectionner le type','B' => 'B', 'C'=>'C'), '',array('class'=>'form-control'));
								
					?>
								
				</div>
	</div>
		

</div>
</div>








<button class="accordion" style="font-weight: bold;font-size: 20px;">Autre espèce </button>
<div class="panel">

<div class="row" style="margin-top: 3%">
	<div class="col-md-4">
		<div class="form-group">

			<?php

				echo Form::label('qte_export_other_species', 'Quantité totale à exporter (m3)');
				echo Form::label('qte_export_other_species', '*',array('style' => 'color:red'));				
				echo Form::number('qte_export_other_species','',array('class' => 'form-control','placeholder'=>'Saisir le volume','min'=>'1','max'=>'999999'));
								
					?>
								
		</div>
	</div>


	<div class="col-md-4">
				<div class="form-group">

					<?php

						echo Form::label('origin_product_other_species', 'Provenance 
des produits');
						echo Form::label('origin_product_other_species', '*',array('style' => 'color:red'));
						echo Form::text('origin_product_other_species','',array('class' => 'form-control','placeholder'=>'Saisir la provenance','maxlength'=>'60'));
								
					?>
								
				</div>
	</div>

	<div class="col-md-4">
				<div class="form-group">

					<?php

						echo Form::label('process_place_other_species', 'Lieu de transformation');
						echo Form::label('process_place_other_species', '*',array('style' => 'color:red'));
						echo Form::text('process_place_other_species','',array('class' => 'form-control','placeholder'=>'Saisir le lieu','maxlength'=>'60'));
								
					?>
								
				</div>
	</div>

	<div class="col-md-4 offset-md-1">
		<div class="form-group">

			<?php

				echo Form::label('potting_site_other_species', 'Site d’empotage');
				echo Form::label('potting_site_other_species', '*',array('style' => 'color:red'));
				echo Form::text('potting_site_other_speciesa','',array('class' => 'form-control','placeholder'=>'Saisir le lieu','maxlength'=>'60'));
								
			?>
								
		</div>
	</div>

	<div class="col-md-4 offset-md-2">
				<div class="form-group">

					<?php

						echo Form::label('product_type_other_species', 'Type produit');
						echo Form::label('product_type_other_species', '*',array('style' => 'color:red'));
						echo Form::select('product_type_other_species', array('Sélectionner le type' => 'Sélectionner le type','B' => 'B', 'C'=>'C'), '',array('class'=>'form-control'));
								
					?>
								
				</div>
	</div>
		

</div>

</div>




<button class="accordion" style="font-weight: bold;font-size: 20px;">Autre produit </button>
<div class="panel">

<div class="row" style="margin-top: 3%">
	<div class="col-md-4">
		<div class="form-group">

			<?php

				echo Form::label('qte_export_other_product', 'Quantité totale à exporter (m3)');
				echo Form::label('qte_export_other_product', '*',array('style' => 'color:red'));				
				echo Form::number('qte_export_other_product','',array('class' => 'form-control','placeholder'=>'Saisir le volume','min'=>'1','max'=>'999999'));
								
					?>
								
		</div>
	</div>


	<div class="col-md-4">
				<div class="form-group">

					<?php

						echo Form::label('origin_product_other_product', 'Provenance 
des produits');
						echo Form::label('origin_product_other_product', '*',array('style' => 'color:red'));
						echo Form::text('origin_product_other_product','',array('class' => 'form-control','placeholder'=>'Saisir la provenance','maxlength'=>'6O'));
								
					?>
								
				</div>
	</div>

	<div class="col-md-4">
				<div class="form-group">

					<?php

						echo Form::label('process_place_other_product', 'Lieu de transformation');
						echo Form::label('process_place_other_product', '*',array('style' => 'color:red'));
						echo Form::text('process_place_other_product','',array('class' => 'form-control','placeholder'=>'Saisir le lieu','maxlength'=>'60'));
								
					?>
								
				</div>
	</div>

	<div class="col-md-4 offset-md-1">
		<div class="form-group">

			<?php

				echo Form::label('potting_site_other_product', 'Site d’empotage');
				echo Form::label('potting_site_other_product', '*',array('style' => 'color:red'));
				echo Form::text('potting_site_other_product','',array('class' => 'form-control','placeholder'=>'Saisir le lieu','maxlength'=>'60'));
								
			?>
								
		</div>
	</div>

	<div class="col-md-4 offset-md-2">
				<div class="form-group">

					<?php

						echo Form::label('product_type_other_product', 'Type produit');
						echo Form::label('product_type_other_product', '*',array('style' => 'color:red'));
						echo Form::select('product_type_other_product', array('Sélectionner le type' => 'Sélectionner le type','B' => 'B', 'C'=>'C'), '',array('class'=>'form-control'));
								
					?>
								
				</div>
	</div>
		

</div>


</div>


<div class="row" style="margin-top: 3%">
	<div class="col-md-12">
		<div class="form-group">

			<?php

				echo Form::label('other_information', 'Autres informations utiles');				
				echo Form::textarea('other_information','',array('class' => 'form-control','placeholder'=>'Saisir ici','rows'=>'4','cols'=>'20','maxlength'=>'400','style'=>'resize:none'));
								
					?>
								
		</div>
	</div>
</div>

<div class="row" style="margin-top: 3%">
	<div class="col-md-5 offset-md-7">
		<div class="form-group">

			<span>Je, <span style="color: red;font-weight: bold;">Valentin AKANDO</span>, certifie exactes toutes les informations fournies</span>
								
		</div>
	</div>
</div>





<div class="row" style="margin-top: 3%">

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