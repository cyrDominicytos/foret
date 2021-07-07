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
						
					<h3 class="card-title" style="font-weight: bold;text-align: center;width: 100%">CONTRE CONSTAT DE CONFORMITÉ D’UNE PROCÉDURE D’EXPORTATION</h4>
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

						<div class="col-md-2">
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
						<div class="col-md-1" style="margin-top: 31px" >
							<div class="form-group">
								<!-- <a href=""> -->
								<button class="form-control" title="Télécharger la carte" style="border: 1px solid black;background-color: #D2E2F9 ;">
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
								<button class="form-control" title="Télécharger la référence" style="border: 1px solid black;background-color: #D2E2F9 ;">
									<i class="fa fa-download"></i>
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

				<h4 style="text-align: center;width: 100%;margin-top: 3%;font-weight: bold;">Nature et quantité des produits:
				</h4>

<div style="margin-top: 2%">
<button class="accordion">Catégorie 1</button>
<div class="panel">

<div class="row" style="margin-top: 3%">
	<div class="col-md-3">
		<div class="form-group">

			<?php

				echo Form::label('product_bille', 'Produit');
								
				echo Form::text('product_bille','Bille',array('class' => 'form-control','disabled'=>'true'));
								
					?>
								
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">

					<?php

						echo Form::label('essence_bille', 'Essence');
						echo Form::text('essence_bille','XXX',array('class' => 'form-control','disabled'=>'true'));
								
					?>
								
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">

					<?php

						echo Form::label('dimension_bille', 'Dimensions(Ep x L x l en mm)');
						echo Form::text('dimension_bille','34x22x33',array('class' => 'form-control','disabled'=>'true'));
								
					?>
								
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">

					<?php

						echo Form::label('volume_bille', 'Volume(m3)');
						echo Form::text('volume_bille','20',array('class' => 'form-control','disabled'=>'true'));
								
					?>
								
				</div>
			</div>

</div>

<div class="row" style="margin-top: 3%">

	<div class="col-md-3">
		<div class="form-group">

			<?php

				echo Form::label('product_grumes', 'Produit');
								
				echo Form::text('product_grumes','Grumes',array('class' => 'form-control','disabled'=>'true'));
								
			?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

		<?php

			echo Form::label('essence_grumes', 'Essence');
			echo Form::text('essence_grumes','XXX',array('class' => 'form-control','disabled'=>'true'));
		?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

			<?php

				echo Form::label('dimension_grumes', 'Dimensions(Ep x L x l en mm)');
				echo Form::text('dimension_grumes','34x22x33',array('class' => 'form-control','disabled'=>'true'));
								
			?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

			<?php

				echo Form::label('volume_grumes', 'Volume(m3)');
				echo Form::text('volume_grumes','20',array('class' => 'form-control','disabled'=>'true'));
								
			?>
								
		</div>
	</div>

</div>
</div>








<button class="accordion">Catégorie 2</button>
<div class="panel">

<div class="row" style="margin-top: 3%">
	<div class="col-md-3">
		<div class="form-group">

			<?php

				echo Form::label('product_madriers', 'Produit');
								
				echo Form::text('product_madriers','Madriers',array('class' => 'form-control','disabled'=>'true'));
								
					?>
								
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">

					<?php

						echo Form::label('essence_madriers', 'Essence');
						echo Form::text('essence_madriers','XXX',array('class' => 'form-control','disabled'=>'true'));
								
					?>
								
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">

					<?php

						echo Form::label('dimension_madriers', 'Dimensions(Ep x L x l en mm)');
						echo Form::text('dimension_madriers','34x22x33',array('class' => 'form-control','disabled'=>'true'));
								
					?>
								
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">

					<?php

						echo Form::label('volume_madriers', 'Volume(m3)');
						echo Form::text('volume_madriers','20',array('class' => 'form-control','disabled'=>'true'));
								
					?>
								
				</div>
			</div>

</div>

<div class="row" style="margin-top: 3%">

	<div class="col-md-3">
		<div class="form-group">

			<?php

				echo Form::label('product_equarris', 'Produit');
								
				echo Form::text('product_equarris','Equarris',array('class' => 'form-control','disabled'=>'true'));
								
			?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

		<?php

			echo Form::label('essence_equarris', 'Essence');
			echo Form::text('essence_equarris','',array('class' => 'form-control','disabled'=>'true'));
								
		?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

			<?php

				echo Form::label('dimension_equarris', 'Dimensions(Ep x L x l en mm)');
				echo Form::text('dimension_equarris','',array('class' => 'form-control','disabled'=>'true'));
								
			?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

			<?php

				echo Form::label('volume_equarris', 'Volume(m3)');
				echo Form::text('volume_equarris','0',array('class' => 'form-control','disabled'=>'true'));
								
			?>
								
		</div>
	</div>

</div>

<div class="row" style="margin-top: 3%">

	<div class="col-md-3">
		<div class="form-group">

			<?php

				echo Form::label('product_plats', 'Produit');
								
				echo Form::text('product_plats','Plats',array('class' => 'form-control','disabled'=>'true'));
								
			?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

		<?php

			echo Form::label('essence_plats', 'Essence');
			echo Form::text('essence_plats','',array('class' => 'form-control','disabled'=>'true'));
								
		?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

			<?php

				echo Form::label('dimension_plats', 'Dimensions(Ep x L x l en mm)');
				echo Form::text('dimension_plats','',array('class' => 'form-control','disabled'=>'true'));
								
			?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

			<?php

				echo Form::label('volume_plats', 'Volume(m3)');
				echo Form::text('volume_plats','0',array('class' => 'form-control','disabled'=>'true'));
								
			?>
								
		</div>
	</div>

</div>

<div class="row" style="margin-top: 3%">

	<div class="col-md-3">
		<div class="form-group">

			<?php

				echo Form::label('product_poteaux', 'Produit');
								
				echo Form::text('product_poteaux','Poteaux',array('class' => 'form-control','disabled'=>'true'));
								
			?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

		<?php

			echo Form::label('essence_poteaux', 'Essence');
			echo Form::text('essence_poteaux','',array('class' => 'form-control','disabled'=>'true'));
								
		?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

			<?php

				echo Form::label('dimension_poteaux', 'Dimensions(Ep x L x l en mm)');
				echo Form::text('dimension_poteaux','',array('class' => 'form-control','disabled'=>'true'));
								
			?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

			<?php

				echo Form::label('volume_poteaux', 'Volume(m3)');
				echo Form::text('volume_poteaux','0',array('class' => 'form-control','disabled'=>'true'));
								
			?>
								
		</div>
	</div>

</div>

</div>












<button class="accordion">Catégorie 3</button>
<div class="panel">

<div class="row" style="margin-top: 3%">
	<div class="col-md-3">
		<div class="form-group">

			<?php

				echo Form::label('product_bastaing', 'Produit');
								
				echo Form::text('product_bastaing','Bastaing',array('class' => 'form-control','disabled'=>'true'));
								
					?>
								
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">

					<?php

						echo Form::label('essence_bastaing', 'Essence');
						echo Form::text('essence_bastaing','',array('class' => 'form-control','disabled'=>'true'));
								
					?>
								
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">

					<?php

						echo Form::label('dimension_bastaing', 'Dimensions(Ep x L x l en mm)');
						echo Form::text('dimension_bastaing','',array('class' => 'form-control','disabled'=>'true'));
								
					?>
								
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">

					<?php

						echo Form::label('volume_bastaing', 'Volume(m3)');
						echo Form::text('volume_bastaing','0',array('class' => 'form-control','disabled'=>'true'));
								
					?>
								
				</div>
			</div>

</div>

<div class="row" style="margin-top: 3%">

	<div class="col-md-3">
		<div class="form-group">

			<?php

				echo Form::label('product_planches', 'Produit');
								
				echo Form::text('product_planches','Planches',array('class' => 'form-control','disabled'=>'true'));
								
			?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

		<?php

			echo Form::label('essence_planches', 'Essence');
			echo Form::text('essence_planches','XXXXX',array('class' => 'form-control','disabled'=>'true'));
								
		?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

			<?php

				echo Form::label('dimension_planches', 'Dimensions(Ep x L x l en mm)');
				echo Form::text('dimension_planches','34x22x33',array('class' => 'form-control','disabled'=>'true'));
								
			?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

			<?php

				echo Form::label('volume_planches', 'Volume(m3)');
				echo Form::text('volume_planches','20',array('class' => 'form-control','disabled'=>'true'));
								
			?>
								
		</div>
	</div>

</div>

<div class="row" style="margin-top: 3%">

	<div class="col-md-3">
		<div class="form-group">

			<?php

				echo Form::label('product_chevrons', 'Produit');
								
				echo Form::text('product_chevrons','Chevrons',array('class' => 'form-control','disabled'=>'true'));
								
			?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

		<?php

			echo Form::label('essence_chevrons', 'Essence');
			echo Form::text('essence_chevrons','AAA',array('class' => 'form-control','disabled'=>'true'));
								
		?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

			<?php

				echo Form::label('dimension_chevrons', 'Dimensions(Ep x L x l en mm)');
				echo Form::text('dimension_chevrons','34x22x33',array('class' => 'form-control','disabled'=>'true'));
								
			?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

			<?php

				echo Form::label('volume_chevrons', 'Volume(m3)');
				echo Form::text('volume_chevrons','20',array('class' => 'form-control','disabled'=>'true'));
								
			?>
								
		</div>
	</div>

</div>

<div class="row" style="margin-top: 3%">

	<div class="col-md-3">
		<div class="form-group">

			<?php

				echo Form::label('product_parquets', 'Produit');
								
				echo Form::text('product_parquets','Parquets',array('class' => 'form-control','disabled'=>'true'));
								
			?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

		<?php

			echo Form::label('essence_parquets', 'Essence');
			echo Form::text('essence_parquets','',array('class' => 'form-control','disabled'=>'true'));
								
		?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

			<?php

				echo Form::label('dimension_parquets', 'Dimensions(Ep x L x l en mm)');
				echo Form::text('dimension_parquets','',array('class' => 'form-control','disabled'=>'true'));
								
			?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

			<?php

				echo Form::label('volume_parquets', 'Volume(m3)');
				echo Form::text('volume_parquets','0',array('class' => 'form-control','disabled'=>'true'));
								
			?>
								
		</div>
	</div>

</div>

<div class="row" style="margin-top: 3%">

	<div class="col-md-3">
		<div class="form-group">

			<?php

				echo Form::label('product_frises', 'Produit');
								
				echo Form::text('product_frises','Frises',array('class' => 'form-control','disabled'=>'true'));
								
			?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

		<?php

			echo Form::label('essence_frises', 'Essence');
			echo Form::text('essence_frises','',array('class' => 'form-control','disabled'=>'true'));
								
		?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

			<?php

				echo Form::label('dimension_frises', 'Dimensions(Ep x L x l en mm)');
				echo Form::text('dimension_frises','',array('class' => 'form-control','disabled'=>'true'));
								
			?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

			<?php

				echo Form::label('volume_frises', 'Volume(m3)');
				echo Form::text('volume_frises','0',array('class' => 'form-control','disabled'=>'true'));
								
			?>
								
		</div>
	</div>

</div>

</div>







<button class="accordion">Catégorie 4</button>
<div class="panel">

<div class="row" style="margin-top: 3%">
	<div class="col-md-3">
		<div class="form-group">

			<?php

				echo Form::label('prod_finish', 'Produit');
								
				echo Form::text('prod_finish','Produit finis élaborés',array('class' => 'form-control','disabled'=>'true'));
								
					?>
								
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">

					<?php

						echo Form::label('essence_prod_finish', 'Essence');
						echo Form::text('essence_prod_finish','',array('class' => 'form-control','disabled'=>'true'));
								
					?>
								
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">

					<?php

						echo Form::label('dimension_prod_finish', 'Dimensions(Ep x L x l en mm)');
						echo Form::text('dimension_prod_finish','',array('class' => 'form-control','disabled'=>'true'));
								
					?>
								
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">

					<?php

						echo Form::label('volume_prod_finish', 'Volume(m3)');
						echo Form::text('volume_prod_finish','0',array('class' => 'form-control','disabled'=>'true'));
								
					?>
								
				</div>
			</div>

</div>


</div>



<div class="row" style="margin-top: 3%">

			<div class="col-md-1 offset-md-9">
				<div style="margin-top: 10%" class="form-group">
					<span>TOTAL</span>
								
				</div>
			</div>
	
			<div class="col-md-2 ">
				<div class="form-group">

					<?php

						echo Form::text('total_volume','100',array('class' => 'form-control','disabled'=>'true'));
								
					?>
								
				</div>
			</div>

</div>


<h4 style="text-align: center;width: 100%;margin-top: 3%;font-weight: bold;">Décision Constat de Conformité :
				</h4>

<div class="row" style="margin-top: 3%">

	<div class="col-md-4">
				<div style="margin-top: 8%" class="form-group">
					<span style="font-size: 18px;font-weight: bold">Au contenu de la demande du réquérant:</span>
								
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

<div class="col-md-2" style="border: none;">
	<div class="form-group">

		<?php
			echo Form::label('no_conforme1', 'NON CONFORMES',array('style'=>'font-size:14px;'));
			echo "<br>"; 
			echo Form::checkbox('no_conforme1','','',array('style'=>'width:80px;height:40Px;margin-left:25px;'));
		?>	
							
	</div>
</div>						

</div>


<div class="row" style="margin-top: 3%">

	<div class="col-md-4">
				<div style="margin-top: 8%" class="form-group">
					<span style="font-size: 18px;font-weight: bold">A le règlementation en vigeur en république du Bénin:</span>
								
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
			echo Form::label('no_conforme2', 'NON CONFORMES',array('style'=>'font-size:14px;'));
			echo "<br>"; 
			echo Form::checkbox('no_conforme2','','',array('style'=>'width:80px;height:40Px;margin-left:25px'));
		?>	
							
	</div>
</div>						

</div>


<div class="row" style="margin-top: 3%">
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

				echo Form::label('number_constat', 'Numéro du Constat de Conformité');
								
				echo Form::text('number_constat','448876/DGEFC/IF3362',array('class' => 'form-control','disabled'=>'true'));
								
					?>
								
				</div>
	</div>

			
</div>


<div class="row" style="margin-top: 3%">

			<div class="col-md-4">
				<div class="form-group">

					<?php

						echo Form::label('info_agent', 'Grade, Nom et prénom de l’agent');
						echo Form::text('info_agent','Lieutenant Jean ZOHOUN',array('class' => 'form-control','disabled'=>'true'));
								
					?>
								
				</div>
			</div>
	

			<div class="col-md-3 offset-md-4">
				<div class="form-group">

					<?php

						echo Form::label('constat_signe', 'Version signée du constat de conformité');
						echo Form::text('constat_signe','Certificat_conformite/xxx338.pdf',array('class' => 'form-control','disabled'=>'true'));
								
					?>
								
				</div>
			</div>

			<div class="col-md-1" style="margin-top: 31px" >
							<div class="form-group">
								<!-- <a href=""> -->
								<button class="form-control" title="Télécharger le constat de conformité" style="border: 1px solid black;background-color: #D2E2F9 ;">
									<i class="fa fa-download"></i>
								</button>
								<!-- </a> -->
								
							</div>
			</div>

</div>

<h4 style="text-align: center;width: 100%;margin-top: 5%;font-weight: bold;">Décision  Contre Conformité :
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
			echo Form::label('conforme', 'SONT CONFORMES',array('style'=>'font-size:14px;'));
			echo "<br>"; 
			echo Form::checkbox('conforme','','',array('style'=>'width:80px;height:40Px;margin-left:25px'));
		?>	
							
	</div>
</div>

<div class="col-md-2" style="border: none;">
	<div class="form-group">

		<?php
			echo Form::label('no_conforme', 'NON CONFORMES',array('style'=>'font-size:14px;'));
			echo "<br>"; 
			echo Form::checkbox('no_conforme','','',array('style'=>'width:80px;height:40Px;margin-left:25px;'));
		?>	
							
	</div>
</div>						

</div>


<div class="row" style="margin-top: 3%">
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
						echo Form::text('info_agent','Lieutenant Alpha OMEGA',array('class' => 'form-control','disabled'=>'true'));
								
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