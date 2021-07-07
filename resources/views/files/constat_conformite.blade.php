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
		color: black;
	}

	input[type=checkbox] {
    width: 20px;
    height: 20px;
    -moz-appearance: none;
}

/*cambria, Monotype Corsiva, Agency FB, Arial Narrow*/
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
				<h3 style="text-align: center; text-decoration: underline;">CONSTAT DE CONFORMITE DE PRODUITS FORESTIERS LIGNEUX</h3>
				<p style="text-align: justify-all;">
					<p>
						<strong><span class="dynamic"><?= isset($constat_conformite) ? ($constat_conformite->numero) : ("")?></span></strong><strong style="text-align: right; float: right; margin-right: 15%;">Date <span class="dynamic"><?= date('Y-m-d');?></span></strong>
					</p>
					<p>
						L'an deux mil <span class="dynamic"><?= date('Y');?></span> et le <span class="dynamic"><?= date('d')." ".getMonthList()[date('m')];?></span> à la requête de Mr/Mme <span class="dynamic"><?= isset($constat_conformite) ? ($constat_conformite->nom_user." ".$constat_conformite->prenom_user) : ("")?></span> 
					</p>
					<p>
						Référence de la carte de commerçant de produit forestier <span class="dynamic"><?= isset($constat_conformite) ? ($constat_conformite->reference_carte_professionnelle_usagers) : ("")?></span>  nous soussignés en qualité de RSCEFC <span class="dynamic"><?= isset($constat_conformite) ? (Auth::user()->firstname." ".Auth::user()->name) : ("")?></span> atteste que:
					</p>
				</p>
				<h3 style="text-align: center;">NATURES ET QUANTITE DES PRODUITS CHARGES</h3>
			</td>
		</tr>
	</table>

	<table class="table">
		<thead>
			<tr>
				<th>Catégorie</th>
				<th>Produits</th>
				<th>Essences</th>
				<th>Dimensions (ExpxlxL) en mm</th>
				<th>Volume(m3)</th>
			</tr>
		</thead>
		        <tbody>
		        @foreach($caracProdExportations as $caracProdExportation)
				 <tr>
				    <td>{{$caracProdExportation->categorie}}</td>
				    <td>{{$caracProdExportation->type_produits}}</td>
				    <td>{{$caracProdExportation->espece_produits}}</td>
				    <td>{{$caracProdExportation->epaisseur}} * {{$caracProdExportation->largeur}} * {{$caracProdExportation->longueur}}</td>
				    <td>{{$caracProdExportation->volume}}</td>
				    
				</tr>               
	 			@endforeach
		</tbody>
	<tfoot>
		<tr>
			<td colspan="4">TOTAL</td>
			<td>{{$constat_conformite->volume_total}}</td>
		</tr>
	</tfoot>
		
	</table>
	<section style="width: 100%; text-align: justify;">
		<p>En provenance de <span class="dynamic"><?= isset($constat_conformite) ? ($constat_conformite->nom_communes_provenance) : ("")?></span> Département <span class="dynamic"><?= isset($constat_conformite) ? ($constat_conformite->nom_departement_provenance) : ("")?></span> en destination de <span class="dynamic"><?= isset($constat_conformite) ? ($constat_conformite->titre_pays) : ("")?></span></p>
		<p>Référence des documents de provenance <span class="dynamic"><?= isset($constat_conformite) ? ($constat_conformite->reference_document_provenance) : ("")?></span> Véhicule N°<span class="dynamic"><?= isset($constat_conformite) ? ($constat_conformite->reference_transporteur) : ("")?></span> </p>
		<p>Empoter à <span class="dynamic"><?= isset($constat_conformite) ? ($constat_conformite->localite_empotage) : ("")?></span> Commune <span class="dynamic"><?= isset($constat_conformite) ? (nom_commune_id($constat_conformite->commune_empotage)) : ("")?></span> Département <span class="dynamic"><?= isset($constat_conformite) ? (nom_departement_id($constat_conformite->departement_empotage)) : ("")?></span> </p>
		<p>
			Date de départ: <span class="dynamic"><?= isset($constat_conformite) ? ($constat_conformite->date_depart) : ("")?></span> Référence du conteneur <span class="dynamic"><?= isset($constat_conformite) ? ($constat_conformite->reference_conteneur) : ("")?></span> Référence du plomb <span class="dynamic"><?= isset($constat_conformite) ? ($constat_conformite->reference_plomb) : ("")?></span>
		</p>
		
		
		<p>
			<label> Sont conformes </label><input type="checkbox" checked name="oui">
			<label> Non conformes </label><input type="checkbox" name="non">
			<label> au contenu de la demande du réquérant.</label>
		</p>
		<p>
			<label> Sont conformes </label><input type="checkbox" checked name="oui2">
			<label> Non conformes </label><input type="checkbox" name="non2">
			<label> à la règlementation en vigueur en République du Bénin.</label>
		</p>
		<table style="width: 100%;" class="end_table">
			<tr>
				<td><strong >Le réquerant</strong></td>
				<td>&nbsp;</td>
				<td><strong>(Garde Nom, Prénom et Signature)</strong></td>
			</tr>
			<tr>
				<td>
					<span class="dynamic"><?= isset($constat_conformite) ? ($constat_conformite->nom_user." ".$constat_conformite->prenom_user) : ("")?></span>
				</td>
				<td>&nbsp;</td>
				<td>
					<p><span class="dynamic"><?= isset($constat_conformite) ? (Auth::user()->firstname." ".$agent->grade) : ("")?></span>
					</p>
				</td>
			</tr>
		</table>
		
	</section>

</body>
</html>