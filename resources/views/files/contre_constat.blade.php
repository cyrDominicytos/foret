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
.dynamic{
		font-weight: bold;
		color: black;
	}

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

input[type=checkbox] {
width: 20px;
height: 20px;
-moz-appearance: none;
}

/*cambria, Monotype Corsiva, Agency FB, Arial Narrow*/
</style>

<body style="font-family: Agency FB;" onload="print()">
<table style="width: 100%;">
<tr style="width: 100%; font-family: Arial Narrow;">
<td style="width: 15%;">
<img src="{{ asset('img/logo_dgefc.jpeg') }}"  alt="Logo">
</td>
<td style="width: 85%; text-align: center;">
<h4>REPUBLIQUE DU BENIN</h4>
<h4>MINISTERE DU CADRE DE VIE ET DU DEVELOPPEMENT DURABLE</h4>
<p style="margin-top: 3px; margin-bottom: 3px; font-size: 10px;">@@@@@@@@@@@@@@@@@@</p>
<h4>DIRECTION GENERALE DES EAUX, FORETS ET CHASSE</h4>
<p style="margin-top: 1px; margin-bottom: 1px; font-weight: bold; font-style: italic;">TEL : (229) 21-33-06-62 FAX : 21-33-21-92/21-33-04-21 BP. 393 COTONOU(R.BENIN),</p>
<p style="margin-top: 1px; margin-bottom: 1px; font-weight: bold; font-style: italic;">e-mail:foretsbenin@yahoo.fr</p>
</td>
</tr>
<tr style="">
<td colspan="2">
<p>
<strong><span class="dynamic"><?= isset($constre_constat) ? ($constre_constat->numero) : ("")?></span></strong><strong style="text-align: right; float: right; margin-right: 15%;">Date <span class="dynamic"><?= date('Y-m-d');?></span></strong>
</p>
<h3 style="text-align: center; text-decoration: underline;">EXPORTATION DE PRODUITS FORESTIERS</h3>
<h4 style="text-align: center; text-decoration: underline;">CONTRE-CONSTAT DE CONFORMITE</h4>
<p style="text-align: justify-all;">

<p>
L'an deux mil <span class="dynamic"><?= date('Y');?></span> et le <span class="dynamic"><?= date('d')." ".getMonthList()[date('m')];?></span> à la requête de :

Mr/Mme <span class="dynamic"><?= isset($constre_constat) ? ($constre_constat->nom_user." ".$constre_constat->prenom_user) : ("")?></span> de la société........................
Titulaire de la carte professionnelle Commerçant N°<span class="dynamic"><?= isset($constre_constat) ? ($constre_constat->reference_carte_professionnelle_usagers) : ("")?></span>
</p>
<p>
Nous soussignés
</p>
<p>
En qualité de collaborateurs de DRAF avons procédé au contrôle de références du conteneur et du plomb et attestons que :
</p>
<p>
Réf du conteneur <span class="dynamic"><?= isset($constre_constat) ? ($constre_constat->reference_conteneur) : ("")?></span> Réf plomb <span class="dynamic"><?= isset($constre_constat) ? ($constre_constat->reference_plomb) : ("")?></span>

Référence des documents de provenance <span class="dynamic"><?= isset($constre_constat) ? ($constre_constat->reference_document_provenance) : ("")?></span>

Empoté à <span class="dynamic"><?= isset($constre_constat) ? ($constre_constat->localite_empotage) : ("")?></span> Commune <span class="dynamic"><?= isset($constre_constat) ? (nom_commune_id($constre_constat->commune_empotage)) : ("")?></span> Département <span class="dynamic"><?= isset($constre_constat) ? (nom_departement_id($constre_constat->departement_empotage)) : ("")?></span>

En destination de <span class="dynamic"><?= isset($constre_constat) ? ($constre_constat->titre_pays) : ("")?></span> N° du camion <span class="dynamic"><?= isset($constre_constat) ? ($constre_constat->reference_transporteur) : ("")?></span>
</p>
<p>
<label>Sont conformes </label><input type="checkbox" name="oui" checked="">
<label> Non conformes </label><input type="checkbox" name="non">
<label> aux informations du constat de conformité <span class="dynamic"><?= isset($constre_constat) ? ($constre_constat->numero) : ("")?></span></label>
</p>
<p>
En foi de quoi le présent contre constat de conformité est délivré
</p>
<p>
Autres mentions utiles
</p>
<p>
<span class="dynamic"><?= isset($constre_constat) ? ($constre_constat->observation) : ("")?></span>
</p>
<br>
<table style="width: 100%;" class="end_table">
<tr>
<td><strong >Le réquerant</strong></td>
<td>&nbsp;</td>
<td><strong>Collaborateur DRAF</strong></td>
</tr>
<tr>
<td>
	<strong>(Nom, Prénom, Signature et Contact)</strong>
	<p><span class="dynamic"><?= isset($constre_constat) ? ($constre_constat->nom_user." ".$constre_constat->prenom_user) : ("")?></span>
	</p>
</td>
<td>&nbsp;</td>
<td>(Prénom, Grade et Signature)
	<p>
		<span class="dynamic"><?= isset($constre_constat) ? (Auth::user()->firstname." ".$agent->grade) : ("")?></span>
	</p>
</td>
</tr>

</table>
</p>

</td>
</tr>
</table>


</body>
</html>