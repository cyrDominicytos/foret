<!DOCTYPE html>
<html>
	<head>
		<title>LAISSEZ-PASSER</title>
		<meta charset="utf-8">
	</head>

	<style type="text/css">
		body{
			
			margin: auto;
			font-family:  Times New Roman;
		}

		h4,h5{
			margin: 0px;
		}

		
		.reference{
			text-align: right;
			
		}

		#second_tab{
			border-collapse: collapse;
		}

		 #second_tab td, th{
			border:1px solid black;
			padding: 10px;
		}

		.dynamic{
			font-weight: bold;
		}

		



	</style>


	<body>
		
		<div class="container">
			<table>
				<tr>
					<td style="width: 15%;">
						<img src="{{ asset('img/logo_dgefc.jpeg') }}"  alt="Logo">
					</td>
					<td  style="width: 85%; text-align: center;">
						<h4>REPUBLIQUE DU BENIN</h4>
						<span style="font-size: 10px">FRATERNITE - JUSTICE - TRAVAIL</span>
						<p style="margin-top: 3px; margin-bottom: 3px; font-size: 10px;">......................................</p>
						<h4>DIRECTION GENERALE DES EAUX, FORETS ET CHASSE</h4>
						<p style="margin-top: 1px; margin-bottom: 1px; font-style: italic;font-size: 10px;">TEL : (229) 21-33-06-62 FAX : 21-33-21-92/21-33-04-21 | BP. 393 COTONOU(R.BENIN) | E-mail:foretsbenin@yahoo.fr</p>
						<p style="margin-top: 3px; margin-bottom: 3px; font-size: 10px;">......................................</p>
					</td>
				</tr>
			</table>
			
			<p class="reference">{{$donnees->numero}}</p>

			<h3 style="text-align: center;">CIRCULATION DE PRODUITS FORESTIERS TRANFORMES</h3>

			<h2 style="text-align: center;color: red">LAISSEZ-PASSER SPECIAL</h2>
			
		</div>
		<table class="first_tab" style="width: 100%;">
			

				<tr>
					<td style="width: 100%;line-height: 20px;" colspan="2"><span>Mr/Mme: </span><span class="dynamic">{{nom_user_id($donnees->id_user_usagers)}} {{prenom_user_id($donnees->id_user_usagers)}}</span></td>
					
				</tr>
			
				<tr>
					<td style="width: 50%;line-height: 30px;"><span>Profession: </span><span class="dynamic">Transitaire</span></td>
					<td style="width: 50%;"><span>Résident: </span><span class="dynamic">Calavi</span></td>
				</tr>

				<tr>
					<td style="width: 40%;line-height: 30px;"><span>Commune: </span><span class="dynamic">{{nom_commune_id($donnees->commune_provenance)}}</span></td>
					<td style="width: 40%;line-height: 30px;"><span>Tél: </span><span class="dynamic">69 04 20 44</span></td>
				</tr>

				<tr>
					<td style="width: 40%;line-height: 30px;" colspan="2"><span>Carte de commerçant N° / Pièce d'Identité N°: </span><span class="dynamic">{{$donnees->reference_carte_professionnelle_usagers}}</span></td>
				</tr>

				<tr>
					
					<td style="width: 40%;line-height: 30px;" colspan="2"><span>Référence des documents d'exploitation: </span><span class="dynamic">{{$donnees->reference_document_provenance}}</span> est autorisé à faire circuler:</td>
				</tr>

			</table>

		<h3 style="text-align: center;">NATURE ET QUANTITE</h3>

		<table class="second_tab" id="second_tab" style="width: 100%;margin-bottom: 5%;">
			<tr>
				<th>NATURE</th>
				<th>ESPECE</th>
				<th>QUANTITE CHARGEE</th>
				<th>OBSERVATIONS</th>
			</tr>

			@foreach($caracteristiques as $caracteristique)
                 
			<tr>
               <td>{{$caracteristique->type_produits}}</td>
               <td>{{$caracteristique->espece_produits}}</td>
               <td>{{$caracteristique->volume}}</td>
               <td></td>
                                
			</tr>
			@endforeach
			
		</table>


		
		<table class="third_table" style="width: 100%;">

			<tr>
				<td style="width: 50%;line-height: 30px;"><span>Lieu de départ: </span><span class="dynamic">{{$donnees->localite_empotage}}</span></td>
				<td style="width: 50%;line-height: 30px;"><span>Destination: </span><span class="dynamic">{{$donnees->titre_pays}}</span></td>
			</tr>

			<tr>
				<td style="width: 100%;line-height: 30px;" colspan="2"><span>Itinérarire: </span><span class="dynamic">{{$donnees->nom_communes_provenance}} - {{nom_commune_id($donnees->commune_empotage)}}</span></td>
			</tr>

			<tr>
				<td style="width: 50%;line-height: 30px;"><span>Référence du moyen de transport: </span><span class="dynamic">{{$donnees->reference_transporteur}}</span></td>
				<td style="width: 50%;line-height: 30px;"><span>Conduit par: </span><span class="dynamic">{{$donnees->nom_conducteur}}</span></td>
			</tr>

			<tr>
				<td style="width: 50%;line-height: 30px;"><span>Tél: </span><span class="dynamic">6425632</span></td>
				<td style="width: 50%;line-height: 30px;"><span>Référence conteneur: </span><span class="dynamic">{{$donnees->reference_conteneur}}</span></td>
			</tr>

			<tr>
				<td style="width: 50%;line-height: 30px;"> <span>Valable du </span><span class="dynamic">{{$donnees->debut_validite}}</span></td>
				<td style="width: 50%;line-height: 30px;"> <span> au </span><span class="dynamic">{{$donnees->fin_validite}}</span></td>
			</tr>

		</table>

		
		<div style="width: 100%;">
			<p style="text-align: right;">Fait à {{$donnees->poste_adresse}}, le <?= date('d/m/Y')?></p>

			<p style="float: right;"><span>Le Directeur Général des Eaux, Forêts et Chasse<br></span><span style="font-style: italic;font-weight: normal;padding-left: 8%;">(Signature, grade, nom et cachet)</span></p>
			
		</div>
			
			
	</body>
</html>