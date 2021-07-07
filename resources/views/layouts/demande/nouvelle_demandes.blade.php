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
						
					<h3 class="card-title" style="font-weight: bold;text-align: center;width: 100%">DÉMANDE D'EXPORTATION ANNUELLE AU TITRE DE L'ANNEE 2021</h4>
			</div>
			<div class="card-body">
				<div class="col-md-12">
					<?php
						echo Form::open(array('route' => 'demande.create', 'method' => 'post', 'id'=> 'idProcedureForm'))
					?>
					<input type="number" name="len1" hidden="" id="len1">
					<input type="number" name="len2" hidden="" id="len2">
					<input type="number" name="len3" hidden="" id="len3">
					<input type="number" name="len4" hidden="" id="len4">
					<input type="number" name="volume_total" hidden="" id="volume_total">

					<div class="row">

						<div class="col-md-3">
							<div class="form-group">
							<?php

								echo Form::label('full_name', 'Nom et prénom du demandeur');
								echo Form::text('full_name_requerant',
									 Auth::user()->name .' '.Auth::user()->firstname ,array('class' => 'form-control','disabled'=>'true'));
								
								?>
							
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('numero_carte_professionnelle', 'Numéro carte professionnelle');
								echo Form::text('numero_carte_professionnelle',$usager->reference_carte_professionnelle,array('class' => 'form-control','disabled'=>'true'));
								
								?>
								
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<?php

								echo Form::label('card_number_expo', 'Numéro de carte exportateur');
								echo Form::text('numero_carte_exportateur',$usager->reference_permis_coupe,array('class' => 'form-control','disabled'=>'true'));
								
								?>
								
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<?php

								echo Form::label('Date_dparture', 'Date départ');
								echo Form::label('Date_dparture', '*',array('style' => 'color:red'));
								echo Form::date('date_departs','',array('class' => 'form-control','placeholder'=>'Sélectionner la date','id'=>'date_depart','required'=>true,'title'=>"Saisir la date de départ"));
								
								?>	
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

						<div class="col-md-4">
							<div class="form-group">

								<?php

								echo Form::label('dpartment_of_origin', 'Département de provenance');
								echo Form::label('dpartment_of_origin', '*',array('style' => 'color:red'));
								echo Form::select('dpartment_of_origin', array('Alibori' => 'Alibori','Atacora' => 'Atacora', 'Atlantique' => 'Atlantique', 'Borgou' => 'Borgou','Collines' => 'Collines','Couffo' => 'Couffo','Donga' => 'Donga','Littoral' => 'Littoral','Mono' => 'Mono','Ouémé' => 'Ouémé','Plateau' => 'Plateau','Zou' => 'Zou'), '',array('class'=>'form-control'));
								
								?>
								
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">

								<?php

								echo Form::label('to', 'En destination de');
								echo Form::label('to', '*',array('style' => 'color:red'));
								echo Form::select('to', array('A' => 'Sélectionner le pays de destination','Afghanistan' => 'Afghanistan','Afrique du Sud' => 'Afrique du Sud', 'Albanie' => 'Albanie', 'Algérie' => 'Algérie','Allemagne' => 'Allemagne','Andorre' => 'Andorre','Angola' => 'Angola','Antigua-et-Barbuda' => 'Antigua-et-Barbuda','Arabie Saoudite' => 'Arabie Saoudite','Argentine' => 'Argentine','Arménie' => 'Arménie','Australie' => 'Australie','Autriche' => 'Autriche','Azerbaïdjan' => 'Azerbaïdjan','Bahamas' => 'Bahamas','Bahreïn' => 'Bahreïn','Bangladesh' => 'Bangladesh','Barbade' => 'Barbade','Belgique' => 'Belgique','Belize' => 'Belize','Bénin' => 'Bénin','Bhoutan' => 'Bhoutan','Biélorussie' => 'Biélorussie','Birmanie' => 'Birmanie','Bolivie' => 'Bolivie','Bosnie-Herzégovine' => 'Bosnie-Herzégovine','Botswana' => 'Botswana','Brésil' => 'Brésil','Brunei' => 'Brunei','Bulgarie' => 'Bulgarie','Burkina Faso' => 'Burkina Faso','Burundi' => 'Burundi','Cambodge' => 'Cambodge','Cameroun' => 'Cameroun','Canada' => 'Canada','Cap-Vert' => 'Cap-Vert','Aplahoué' => 'Aplahoué','Djakotomey' => 'Djakotomey','Dogbo' => 'Dogbo','Klouékanmey' => 'Klouékanmey','Lalo' => 'Lalo','Toviklin' => 'Toviklin','Bassila' => 'Bassila','Copargo' => 'Copargo','Djougou' => 'Djougou','Ouaké' => 'Ouaké','Cotonou' => 'Cotonou','Athiémé' => 'Athiémé','Bopa' => 'Bopa','Comè' => 'Comè','Grand-Popo' => 'Grand-Popo','Houéyogbé' => 'Houéyogbé','Lokossa' => 'Lokossa','Adjarra' => 'Adjarra','Adjohoun' => 'Adjohoun','Aguégués' => 'Aguégués','Akpro-Missérété' => 'Akpro-Missérété','Avrankou' => 'Avrankou','Bonou' => 'Bonou','Dangbo' => 'Dangbo','Porto-Novo' => 'Porto-Novo','Sèmè-Podji' => 'Sèmè-Podji','Adja-ouèrè' => 'Adja-ouèrè','Ifangni' => 'Ifangni','Kétou' => 'Kétou','Pobè' => 'Pobè','Sakété' => 'Sakété','Abomey' => 'Abomey','Agbangnizoun' => 'Agbangnizoun','Bohicon' => 'Bohicon','Covè' => 'Covè','Djidja' => 'Djidja','Ouinhi' => 'Ouinhi','Zagnanado' => 'Zagnanado','Za-kpota' => 'Za-kpota','Zogbodomè' => 'Zogbodomè'), '',array('class'=>'form-control'));
								
								?>
								
							</div>
						</div>

					</div>


					<div class="row" style="margin-top: 3%">

						<div class="col-md-6">
							<div class="form-group">

							<?php

								echo Form::label('ref_doc_of_origin', 'Référence Document de provenance');
								echo Form::label('ref_doc_of_origin', '*',array('style' => 'color:red'));
								echo Form::text('ref_doc_of_origin','',array('class' => 'form-control','placeholder'=>'Saisir les références','maxlength'=>'60'));
								
							?>	
							

							</div>
						</div>

						<div class="col-md-4 offset-md-1">
							<div class="form-group">

								<?php

								echo Form::label('ref_file', 'Document de référence (pdf)');
								echo Form::label('ref_file', '*',array('style' => 'color:red'));
								echo Form::input('file','ref_file',null, array('class' => 'form-control'));
								
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

								echo Form::label('Date_dparture', 'Date départ');
								echo Form::label('Date_dparture', '*',array('style' => 'color:red'));
								echo Form::date('Date_dparture','',array('class' => 'form-control','placeholder'=>'Sélectionner la date'));
								
							?>	
							
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

							<?php

								echo Form::label('potting_place', 'Lieu Empotage');
								echo Form::label('potting_place', '*',array('style' => 'color:red'));
								echo Form::text('potting_place','',array('class' => 'form-control','placeholder'=>'Saisir la localité','maxlength'=>'60'));
								
							?>	
							
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('commune_empotage', 'Commune Empotage');
								echo Form::label('commune_empotage', '*',array('style' => 'color:red'));
								echo Form::select('commune_empotage', array('Banikoara' => 'Banikoara','Gogonou' => 'Gogonou', 'Kandi' => 'Kandi', 'Karimama' => 'Karimama','Malanville' => 'Malanville','Ségbana' => 'Ségbana','Boukoumbé' => 'Boukoumbé','Cobli' => 'Cobli','Kérou' => 'Kérou','Kouandé' => 'Kouandé','Matéri' => 'Matéri','Péhunco' => 'Péhunco','Tanguiéta' => 'Tanguiéta','Toukountouna' => 'Toukountouna','Abomey-Calavi' => 'Abomey-Calavi','Allada' => 'Allada','Kpomassè' => 'Kpomassè','Ouidah' => 'Ouidah','Sô-Ava' => 'Sô-Ava','Toffo' => 'Toffo','Tori' => 'Tori','Zê' => 'Zê','Bembèrèkè' => 'Bembèrèkè','Kalalé' => 'Kalalé','N’Dali' => 'N’Dali','Nikki' => 'Nikki','Parakou' => 'Parakou','Pèrèrè' => 'Pèrèrè','Sinendé' => 'Sinendé','Tchaourou' => 'Tchaourou','Bantè' => 'Bantè','Dassa-Zoumè' => 'Dassa-Zoumè','Glazoué' => 'Glazoué','Ouessè' => 'Ouessè','Savalou' => 'Savalou','Savè' => 'Savè','Aplahoué' => 'Aplahoué','Djakotomey' => 'Djakotomey','Dogbo' => 'Dogbo','Klouékanmey' => 'Klouékanmey','Lalo' => 'Lalo','Toviklin' => 'Toviklin','Bassila' => 'Bassila','Copargo' => 'Copargo','Djougou' => 'Djougou','Ouaké' => 'Ouaké','Cotonou' => 'Cotonou','Athiémé' => 'Athiémé','Bopa' => 'Bopa','Comè' => 'Comè','Grand-Popo' => 'Grand-Popo','Houéyogbé' => 'Houéyogbé','Lokossa' => 'Lokossa','Adjarra' => 'Adjarra','Adjohoun' => 'Adjohoun','Aguégués' => 'Aguégués','Akpro-Missérété' => 'Akpro-Missérété','Avrankou' => 'Avrankou','Bonou' => 'Bonou','Dangbo' => 'Dangbo','Porto-Novo' => 'Porto-Novo','Sèmè-Podji' => 'Sèmè-Podji','Adja-ouèrè' => 'Adja-ouèrè','Ifangni' => 'Ifangni','Kétou' => 'Kétou','Pobè' => 'Pobè','Sakété' => 'Sakété','Abomey' => 'Abomey','Agbangnizoun' => 'Agbangnizoun','Bohicon' => 'Bohicon','Covè' => 'Covè','Djidja' => 'Djidja','Ouinhi' => 'Ouinhi','Zagnanado' => 'Zagnanado','Za-kpota' => 'Za-kpota','Zogbodomè' => 'Zogbodomè'), '',array('class'=>'form-control'));
								
								?>
								
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('dpartment_empotage', 'Département Empotage');
								echo Form::label('dpartment_empotage', '*',array('style' => 'color:red'));
								echo Form::select('dpartment_empotage', array('Alibori' => 'Alibori','Atacora' => 'Atacora', 'Atlantique' => 'Atlantique', 'Borgou' => 'Borgou','Collines' => 'Collines','Couffo' => 'Couffo','Donga' => 'Donga','Littoral' => 'Littoral','Mono' => 'Mono','Ouémé' => 'Ouémé','Plateau' => 'Plateau','Zou' => 'Zou'), '',array('class'=>'form-control'));
								
								?>
								
							</div>
						</div>

					</div>



					<div class="row" style="margin-top: 3%">

						

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('ref_container', 'Référence conteneur');
								echo Form::text('ref_container','',array('class' => 'form-control','placeholder'=>'Saisir la référence du conteneur','maxlength'=>'60'));
								
							?>
								
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('ref_plond', 'Référence de plomb');
								
								echo Form::text('ref_plond','',array('class' => 'form-control','placeholder'=>'Saisir la référence du plond','maxlength'=>'60'));
								
								?>
								
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('ref_transport', 'Référence transport');
								echo Form::text('ref_transport','',array('class' => 'form-control','placeholder'=>'Saisir le numéro du véhicule','maxlength'=>'60'));
								
							?>
								
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">

								<?php

								echo Form::label('driver_name', 'Nom conducteur');
								echo Form::text('driver_name','',array('class' => 'form-control','placeholder'=>'Saisir le nom du conducteur','maxlength'=>'60'));
								
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
						echo Form::label('essence_bille', '*',array('style' => 'color:red'));
						echo Form::select('essence_bille', array('A' => 'A','B' => 'B', 'C'=>'C'), '',array('class'=>'form-control'));
								
					?>
								
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">

					<?php

						echo Form::label('dimension_bille', 'Dimensions(Ep x L x l en mm)');
						echo Form::label('dimension_bille', '*',array('style' => 'color:red'));
						echo Form::text('dimension_bille','',array('class' => 'form-control','placeholder'=>'Saisir les dimensions','maxlength'=>'60'));
								
					?>
								
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">

					<?php

						echo Form::label('volume_bille', 'Volume(m3)');
						echo Form::label('volume_bille', '*',array('style' => 'color:red'));
						echo Form::number('volume_bille','',array('class' => 'form-control','placeholder'=>'Saisir le volume','min'=>'1','max'=>'999999'));
								
					?>
								
				</div>
			</div>

</div>

<div class="row" style="margin-top: 3%">

	<div class="col-md-3">
		<div class="form-group">

			<?php

				// echo Form::label('product_grumes', 'Produit');
								
				echo Form::text('product_grumes','Grumes',array('class' => 'form-control','disabled'=>'true','maxlength'=>'60'));
								
			?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

		<?php

			// echo Form::label('essence_grumes', 'Essence');
			// echo Form::label('essence_grumes', '*',array('style' => 'color:red'));
			echo Form::select('essence_grumes', array('A' => 'A','B' => 'B', 'C'=>'C'), '',array('class'=>'form-control'));
								
		?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

			<?php

				// echo Form::label('dimension_grumes', 'Dimensions(Ep x L x l en mm)');
				// echo Form::label('dimension_grumes', '*',array('style' => 'color:red'));
				echo Form::text('dimension_grumes','',array('class' => 'form-control','placeholder'=>'Saisir les dimensions','maxlength'=>'60'));
								
			?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

			<?php

				// echo Form::label('volume_grumes', 'Volume(m3)');
				// echo Form::label('volume_grumes', '*',array('style' => 'color:red'));
				echo Form::text('volume_grumes','',array('class' => 'form-control','placeholder'=>'Saisir le volume','min'=>'1','max'=>'1'));
								
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
						echo Form::label('essence_madriers', '*',array('style' => 'color:red'));
						echo Form::select('essence_madriers', array('A' => 'A','B' => 'B', 'C'=>'C'), '',array('class'=>'form-control'));
								
					?>
								
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">

					<?php

						echo Form::label('dimension_madriers', 'Dimensions(Ep x L x l en mm)');
						echo Form::label('dimension_madriers', '*',array('style' => 'color:red'));
						echo Form::text('dimension_madriers','',array('class' => 'form-control','placeholder'=>'Saisir les dimensions','maxlength'=>'60'));
								
					?>
								
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">

					<?php

						echo Form::label('volume_madriers', 'Volume(m3)');
						echo Form::label('volume_madriers', '*',array('style' => 'color:red'));
						echo Form::text('volume_madriers','',array('class' => 'form-control','placeholder'=>'Saisir le volume','min'=>'1','max'=>'999999'));
								
					?>
								
				</div>
			</div>

</div>

<div class="row" style="margin-top: 3%">

	<div class="col-md-3">
		<div class="form-group">

			<?php

				// echo Form::label('product_equarris', 'Produit');
								
				echo Form::text('product_equarris','Equarris',array('class' => 'form-control','disabled'=>'true'));
								
			?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

		<?php

			// echo Form::label('essence_equarris', 'Essence');
			// echo Form::label('essence_equarris', '*',array('style' => 'color:red'));
			echo Form::select('essence_equarris', array('A' => 'A','B' => 'B', 'C'=>'C'), '',array('class'=>'form-control'));
								
		?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

			<?php

				// echo Form::label('dimension_equarris', 'Dimensions(Ep x L x l en mm)');
				// echo Form::label('dimension_equarris', '*',array('style' => 'color:red'));
				echo Form::text('dimension_equarris','',array('class' => 'form-control','placeholder'=>'Saisir les dimensions','maxlength'=>'60'));
								
			?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

			<?php

				// echo Form::label('volume_equarris', 'Volume(m3)');
				// echo Form::label('volume_equarris', '*',array('style' => 'color:red'));
				echo Form::text('volume_equarris','',array('class' => 'form-control','placeholder'=>'Saisir le volume','min'=>'1','max'=>'999999'));
								
			?>
								
		</div>
	</div>

</div>

<div class="row" style="margin-top: 3%">

	<div class="col-md-3">
		<div class="form-group">

			<?php

				// echo Form::label('product_plats', 'Produit');
								
				echo Form::text('product_plats','Plats',array('class' => 'form-control','disabled'=>'true'));
								
			?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

		<?php

			// echo Form::label('essence_plats', 'Essence');
			// echo Form::label('essence_plats', '*',array('style' => 'color:red'));
			echo Form::select('essence_plats', array('A' => 'A','B' => 'B', 'C'=>'C'), '',array('class'=>'form-control'));
								
		?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

			<?php

				// echo Form::label('dimension_plats', 'Dimensions(Ep x L x l en mm)');
				// echo Form::label('dimension_plats', '*',array('style' => 'color:red'));
				echo Form::text('dimension_plats','',array('class' => 'form-control','placeholder'=>'Saisir les dimensions','maxlength'=>'60'));
								
			?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

			<?php

				// echo Form::label('volume_plats', 'Volume(m3)');
				// echo Form::label('volume_plats', '*',array('style' => 'color:red'));
				echo Form::text('volume_plats','',array('class' => 'form-control','placeholder'=>'Saisir le volume','min'=>'1','max'=>'999999'));
								
			?>
								
		</div>
	</div>

</div>

<div class="row" style="margin-top: 3%">

	<div class="col-md-3">
		<div class="form-group">

			<?php

				// echo Form::label('product_poteaux', 'Produit');
								
				echo Form::text('product_poteaux','Poteaux',array('class' => 'form-control','disabled'=>'true'));
								
			?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

		<?php

			// echo Form::label('essence_poteaux', 'Essence');
			// echo Form::label('essence_poteaux', '*',array('style' => 'color:red'));
			echo Form::select('essence_poteaux', array('A' => 'A','B' => 'B', 'C'=>'C'), '',array('class'=>'form-control'));
								
		?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

			<?php

				// echo Form::label('dimension_poteaux', 'Dimensions(Ep x L x l en mm)');
				// echo Form::label('dimension_poteaux', '*',array('style' => 'color:red'));
				echo Form::text('dimension_poteaux','',array('class' => 'form-control','placeholder'=>'Saisir les dimensions','maxlength'=>'60'));
								
			?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

			<?php

				// echo Form::label('volume_poteaux', 'Volume(m3)');
				// echo Form::label('volume_poteaux', '*',array('style' => 'color:red'));
				echo Form::text('volume_poteaux','',array('class' => 'form-control','placeholder'=>'Saisir le volume','min'=>'1','max'=>'999999'));
								
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
						echo Form::label('essence_bastaing', '*',array('style' => 'color:red'));
						echo Form::select('essence_bastaing', array('A' => 'A','B' => 'B', 'C'=>'C'), '',array('class'=>'form-control'));
								
					?>
								
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">

					<?php

						echo Form::label('dimension_bastaing', 'Dimensions(Ep x L x l en mm)');
						echo Form::label('dimension_bastaing', '*',array('style' => 'color:red'));
						echo Form::text('dimension_bastaing','',array('class' => 'form-control','placeholder'=>'Saisir les dimensions','maxlength'=>'60'));
								
					?>
								
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">

					<?php

						echo Form::label('volume_bastaing', 'Volume(m3)');
						echo Form::label('volume_bastaing', '*',array('style' => 'color:red'));
						echo Form::text('volume_bastaing','',array('class' => 'form-control','placeholder'=>'Saisir le volume','min'=>'1','max'=>'999999'));
								
					?>
								
				</div>
			</div>

</div>

<div class="row" style="margin-top: 3%">

	<div class="col-md-3">
		<div class="form-group">

			<?php

				// echo Form::label('product_planches', 'Produit');
								
				echo Form::text('product_planches','Planches',array('class' => 'form-control','disabled'=>'true'));
								
			?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

		<?php

			// echo Form::label('essence_planches', 'Essence');
			// echo Form::label('essence_planches', '*',array('style' => 'color:red'));
			echo Form::select('essence_planches', array('A' => 'A','B' => 'B', 'C'=>'C'), '',array('class'=>'form-control'));
								
		?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

			<?php

				// echo Form::label('dimension_planches', 'Dimensions(Ep x L x l en mm)');
				// echo Form::label('dimension_planches', '*',array('style' => 'color:red'));
				echo Form::text('dimension_planches','',array('class' => 'form-control','placeholder'=>'Saisir les dimensions','maxlength'=>'60'));
								
			?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

			<?php

				// echo Form::label('volume_planches', 'Volume(m3)');
				// echo Form::label('volume_planches', '*',array('style' => 'color:red'));
				echo Form::text('volume_planches','',array('class' => 'form-control','placeholder'=>'Saisir le volume','min'=>'1','max'=>'999999'));
								
			?>
								
		</div>
	</div>

</div>

<div class="row" style="margin-top: 3%">

	<div class="col-md-3">
		<div class="form-group">

			<?php

				// echo Form::label('product_chevrons', 'Produit');
								
				echo Form::text('product_chevrons','Chevrons',array('class' => 'form-control','disabled'=>'true'));
								
			?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

		<?php

			// echo Form::label('essence_chevrons', 'Essence');
			// echo Form::label('essence_chevrons', '*',array('style' => 'color:red'));
			echo Form::select('essence_chevrons', array('A' => 'A','B' => 'B', 'C'=>'C'), '',array('class'=>'form-control'));
								
		?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

			<?php

				// echo Form::label('dimension_chevrons', 'Dimensions(Ep x L x l en mm)');
				// echo Form::label('dimension_chevrons', '*',array('style' => 'color:red'));
				echo Form::text('dimension_chevrons','',array('class' => 'form-control','placeholder'=>'Saisir les dimensions','maxlength'=>'60'));
								
			?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

			<?php

				// echo Form::label('volume_chevrons', 'Volume(m3)');
				// echo Form::label('volume_chevrons', '*',array('style' => 'color:red'));
				echo Form::text('volume_chevrons','',array('class' => 'form-control','placeholder'=>'Saisir le volume','min'=>'1','max'=>'999999'));
								
			?>
								
		</div>
	</div>

</div>

<div class="row" style="margin-top: 3%">

	<div class="col-md-3">
		<div class="form-group">

			<?php

				// echo Form::label('product_parquets', 'Produit');
								
				echo Form::text('product_parquets','Parquets',array('class' => 'form-control','disabled'=>'true'));
								
			?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

		<?php

			// echo Form::label('essence_parquets', 'Essence');
			// echo Form::label('essence_parquets', '*',array('style' => 'color:red'));
			echo Form::select('essence_parquets', array('A' => 'A','B' => 'B', 'C'=>'C'), '',array('class'=>'form-control'));
								
		?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

			<?php

				// echo Form::label('dimension_parquets', 'Dimensions(Ep x L x l en mm)');
				// echo Form::label('dimension_parquets', '*',array('style' => 'color:red'));
				echo Form::text('dimension_parquets','',array('class' => 'form-control','placeholder'=>'Saisir les dimensions','maxlength'=>'60'));
								
			?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

			<?php

				// echo Form::label('volume_parquets', 'Volume(m3)');
				// echo Form::label('volume_parquets', '*',array('style' => 'color:red'));
				echo Form::text('volume_parquets','',array('class' => 'form-control','placeholder'=>'Saisir le volume','min'=>'1','max'=>'999999'));
								
			?>
								
		</div>
	</div>

</div>

<div class="row" style="margin-top: 3%">

	<div class="col-md-3">
		<div class="form-group">

			<?php

				// echo Form::label('product_frises', 'Produit');
								
				echo Form::text('product_frises','Frises',array('class' => 'form-control','disabled'=>'true'));
								
			?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

		<?php

			// echo Form::label('essence_frises', 'Essence');
			// echo Form::label('essence_frises', '*',array('style' => 'color:red'));
			echo Form::select('essence_frises', array('A' => 'A','B' => 'B', 'C'=>'C'), '',array('class'=>'form-control'));
								
		?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

			<?php

				// echo Form::label('dimension_frises', 'Dimensions(Ep x L x l en mm)');
				// echo Form::label('dimension_frises', '*',array('style' => 'color:red'));
				echo Form::text('dimension_frises','',array('class' => 'form-control','placeholder'=>'Saisir les dimensions','maxlength'=>'60'));
								
			?>
								
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">

			<?php

				// echo Form::label('volume_frises', 'Volume(m3)');
				// echo Form::label('volume_frises', '*',array('style' => 'color:red'));
				echo Form::text('volume_frises','',array('class' => 'form-control','placeholder'=>'Saisir le volume','min'=>'1','max'=>'999999'));
								
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
						echo Form::label('essence_prod_finish', '*',array('style' => 'color:red'));
						echo Form::select('essence_prod_finish', array('A' => 'A','B' => 'B', 'C'=>'C'), '',array('class'=>'form-control'));
								
					?>
								
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">

					<?php

						echo Form::label('dimension_prod_finish', 'Dimensions(Ep x L x l en mm)');
						echo Form::label('dimension_prod_finish', '*',array('style' => 'color:red'));
						echo Form::text('dimension_prod_finish','',array('class' => 'form-control','placeholder'=>'Saisir les dimensions','maxlength'=>'60'));
								
					?>
								
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">

					<?php

						echo Form::label('volume_prod_finish', 'Volume(m3)');
						echo Form::label('volume_prod_finish', '*',array('style' => 'color:red'));
						echo Form::text('volume_prod_finish','',array('class' => 'form-control','placeholder'=>'Saisir le volume','min'=>'1','max'=>'999999'));
								
					?>
								
				</div>
			</div>

</div>


</div>







<div class="row" style="margin-top: 3%">

	<div class="col-md-2 offset-md-7">
		<div class="form-group">

			<?php

				echo Form::submit('Enregistrer',array('class' => 'form-control btn btn-block bg-gradient-success','disabled'=>'true'));
	
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









