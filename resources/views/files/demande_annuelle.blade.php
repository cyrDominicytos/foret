<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>eForex - Constat de conformité</title>

    
</head>
<style type="text/css">
	 /*@font-face {
      font-family: "Agency FB";
      font-style: normal;
      src: url("{{asset('fonts/font/AGENCYR.TTF') }}");
      // IE9 Compat Modes 
      src: 
        local(Agency FB"), 
        local("Agency FB"), 
        url("{{ asset('fonts/font/AGENCYR.TTF') }}") format("truetype");
    }*/


	.table td, th{
		border: 1px solid black;
		
	}
	.table{
		width: 96%;
		margin-left: 2%;
		margin-right: 2%;
		border-collapse: collapse;

	}
	h4,h5{
		margin: 0px;
	}
	p{
		font-size: 14px;
	}

	.end_table strong{
		font-size: 13px;
	}

	.dynamic{
			font-weight: bold;
		}

	input[type=checkbox] {
    width: 20px;
    height: 20px;
    -moz-appearance: none;
}

/*cambria, Monotype Corsiva, Agency FB, Arial Narrow    <span class="dynamic"> */
</style>

<body style="font-family: Agency FB;">
	<table  style="width: 100%;">
		<tr  style="width: 100%; font-family:  Arial Narrow;">
			<td style="width: 15%;">
				<img src="{{ asset('img/logo_dgefc.jpeg') }}"  alt="Logo">
			</td>
			<td  style="width: 85%; text-align: center;">
				<h4>REPUBLIQUE DU BENIN</h4>
				<h4>MINISTERE DU CADRE DE VIE ET DU DEVELOPPEMENT DURABLE</h4>
				<p style="margin-top: 3px; margin-bottom: 3px; font-size: 10px;">@@@@@@@@@@@@@@@@@@</p>
				<h4>DIRECTION GENERALE DES EAUX, FORETS ET CHASSE</h4>
				<p style="margin-top: 1px; margin-bottom: 1px; font-weight: bold; font-style: italic;">TEL : (229) 21-33-06-62 FAX : 21-33-21-92/21-33-04-21 BP. 393 COTONOU(R.BENIN),</p>
				<p style="margin-top: 1px; margin-bottom: 1px; font-weight: bold; font-style: italic;">E-mail:foretsbenin@yahoo.fr</p>
			</td>
		</tr>
		<tr style="">
			<td colspan="2">
				<h3 style="text-align: center; text-decoration: underline;">DEMANDE ANNUELLE AU TITRE DE L'ANNEE 2021</h3>
				<p style="text-align: justify-all;">
					<p>
						<strong> <span class="dynamic"><?= isset($demande_annuelle) ? ($demande_annuelle->numero) : ("")?></span></strong><strong style="text-align: right; float: right; margin-right: 15%;">Date <?=date('d-m-Y') ?></strong>
					</p>
					<!--<p>Date de la demande <span class="dynamic"></span> </p>-->
					<p>Nom et Prénoms : <span class="dynamic"><?= Auth::user()->name .' '.Auth::user()->firstname ?></span></p>
					<p>Adresse du demandeur <span class="dynamic"><?= Auth::user()->adresse ?></span></p>
					<p>Référence de la carte professionnelle de commerçant 2020 : 
						<span class="dynamic"><?= usager_id_user(Auth::user()->id)->reference_carte_professionnelle ?></span></p>
					<p>Référence de la carte d’importateur de 2020 : <span class="dynamic"><?= usager_id_user(Auth::user()->id)->reference_permis_coupe ?></span></p>
					
				</p>
				<h3 style="text-align: center;">VOLUME EXPORTES EN <?= date('Y')-1?></h3>
			</td>
		</tr>
	</table>

	<table class="table">
		<thead>
			<tr>
				<th>Espèces</th>
				<th>Quantité totale à exporter (m3)</th>
				<th>Préciser Provenance des produits</th>
				<th>Préciser Lieu de transformation</th>
				<th>Préciser Site d’empotage</th>
				<th>Types de produits exportés</th>
			</tr>
		</thead>
		<tbody>

		
			@foreach($produit_exporte as $produit_exportes)
          <tr>
           <td>{{$produit_exportes->espece_produits}}</td>
           <td>{{$produit_exportes->volume}}</td>
           <td>{{$produit_exportes->commune_provenance}}</td>
           <td>{{ nom_commune_id($produit_exportes->id_commune_empotage) }}</td>
           <td>{{ nom_commune_id($produit_exportes->id_commune_empotage) }}</td>
           <td>{{nom_commune_id($produit_exportes->type_produits)}}</td>
          </tr>               
		@endforeach
      </tbody>
	</table>
	<p style="color: red; text-align: center; font-weight: bold;" ><?=(isset($no_data_found)) ? ($no_data_found) : ('') ?></p>
	<h3 style="text-align: center;">Autres informations utiles</h3>
	<section style="width: 100%; text-align: justify;">

		<p><?= isset($demande_annuelle) ? ($demande_annuelle->autre_information) : ("")?></p>
		<p style="text-align: right;">Je certifie exact toutes les informations fournies</p>
		<p style="text-align: right;">Fait à Cotonou, le <?= date('d')." ".getMonthList()[date('m')]." ".date('Y');?></p>
	</section>

</body>
</html>