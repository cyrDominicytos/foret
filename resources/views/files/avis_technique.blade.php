<!DOCTYPE html>
<html>
	<head>
		<title>AVIS TECHNIQUE</title>
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
		}

		.dynamic{
			font-weight: bold;
		}

		



	</style>


	<body onload="print()">
		
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
			
			<p class="reference"></p>

			<h2 style="text-align: center;">EXPORTATION DE PRODUITS LIGNEUX</h2>

			<h1 style="text-align: center;">AVIS TECHNIQUE</h1>
			
		</div>
		<table>
			

				<tr>
					<td style="width: 50%;line-height: 10px;"><span>Mr/Mme : </span><span class="dynamic">{{nom_user_id($donnees->id_user_usagers)}} {{prenom_user_id($donnees->id_user_usagers)}}</span></td>
					<td>
						<span class="dynamic">Tél : </span>{{ $donnees->telephone_user }}<span class="dynamic"></span>
					</td>
					
				</tr>
			
				<tr>
					<td style="width: 50%;line-height: 20px;"><span>Résident à : </span><span class="dynamic">{{ $donnees->adresse_user }}</span></td>
					<td style="width: 50%;"><span>Représentant la Société : </span><span class="dynamic">{{nom_user_id($donnees->id_user_usagers)}} {{prenom_user_id($donnees->id_user_usagers)}}</span></td>
				</tr>

				<tr>
					<td style="width: 100%;line-height: 20px;" colspan="2"><span>Carte commerçant Produits forestiers N° : </span><span class="dynamic">{{ $donnees->reference_carte_professionnelle_usagers }}</span></td>
					
				</tr>

				<tr>
					<td style="width: 100%;line-height: 20px;" colspan="2"><span>Titulaire de l'autorisation d'exploitation : </span><span class="dynamic">{{ $donnees->reference_permis_coupe_usagers }}</span></td>
				</tr>

				<tr>
					<td style="width: 100%;line-height: 20px;" colspan="2"><span>Quantité annuelle accordée : </span><span class="dynamic"></span></td>
				</tr>

				<tr>
					<td style="width: 50%;line-height: 20px;"><span>Référence Constat de conformité N° : </span><span class="dynamic" style="font-size: 13px;">{{ $donnees->numero }}</span></td>
					<td style="width: 50%;"><span>délivré par : </span><span class="dynamic">{{nom_user_id($donnees->id_user_forestiers)}} {{prenom_user_id($donnees->id_user_forestiers)}}</span></td>
				</tr>

				<tr>
					<td style="width: 100%;line-height: 20px;" colspan="2"><span>est autorisé(e) à exporter : </span><span class="dynamic"></span></td>
				</tr>

			</table>

		<h3 style="text-align: center;">NATURE ET QUANTITE DES PRODUITS ACCORDEES</h3>

		<table  id="second_tab">
			<thead>
				<tr>
					<th rowspan="2">NATURE DES PRODUIS</th>
					<th rowspan="2">ESPECE<br>(Nom commun; nom scientifique) </th>
					<th colspan="3">VOLUME (m3)</th>
				</tr>	
			</thead>

			<tbody>
				<tr>
					<th>déjà chargé</th>
					<th>du présent chargement</th>
					<th>restant</th>
				</tr>
				@foreach($caracteristiques as $caracteristique)
				<tr>
					<td>{{$caracteristique->type_produits}}</td>
					<td>{{$caracteristique->espece_produits}}</td>
					<td></td>
					<td>{{$caracteristique->volume}}</td>
					<td></td>
				</tr>
				@endforeach

			</tbody>
			
		</table>



		
		<table class="third_table" style="width: 100%;">

			<tr>
				<td style="width: 60%;line-height: 20px;"><span>Quittance N°: </span><span class="dynamic">{{$etat_versement_data->numero_quittance }}</span></td>
				<td style="width: 50%;line-height: 20px;"><span> du </span><span class="dynamic">{{$donnees->created_at}}</span> <span> délivré à </span></td>
			</tr>

			<tr>
				<td style="width: 100%;line-height: 20px;" colspan="2"><span>Nom du commissaire agréé en douane : </span><span class="dynamic">{{$etat_versement_data->nom_commissaire_agree }}</span></td>
				<td style="width: 60%;line-height: 20px;"><span>Contact : </span><span class="dynamic">{{$etat_versement_data->contact_commissaire_agree }}</span></td>
			</tr>

			<tr>
				<td style="width: 60%;line-height: 20px;"><span>Port d'embarquement/Frontière : </span><span class="dynamic"></span></td>
				<td style="width: 50%;line-height: 20px;"><span>Provenance : </span><span class="dynamic">{{nom_commune_id($donnees->commune_provenance)}}</span></td>
			</tr>

			<tr>
				<td style="width: 60%;line-height: 20px;"><span>Destination : </span><span class="dynamic">{{$donnees->titre_pays}}</span></td>
				<td style="width: 60%;line-height: 20px;"><span>Adresse du destinataire : </span><span class="dynamic"></span></td>
			</tr>

			<tr>
				<td style="width: 60%;line-height: 20px;"><span>Moyen de transport : </span><span class="dynamic"></span></td>
				<td style="width: 60%;line-height: 20px;"><span>Référence de Conteneur/Emballage : </span><span class="dynamic">{{$donnees->reference_conteneur}}</span></td>
			</tr>

			<tr>
				<td style="width: 60%;line-height: 20px;"><span>Référence plomb : </span><span class="dynamic">{{$donnees->reference_plomb}}</span></td>
				<td style="line-height: 20px;"><span>Valable du : </span> <span class="dynamic">{{$donnees->debut_validite}}</span> au <span class="dynamic">{{$donnees->fin_validite}}</span> </td>
			</tr>

		</table>

		

		<p style="text-align: right;"><span>Cotonou, le </span> <?= date('d/m/Y')?></p>

			<p style="float: left;font-weight: bold;">Visa au poste de contrôle des frontières</p>
			<p style="float: right;"><span style="font-weight: bold;">Le Directeur Général des Eaux, Forêts et Chasse<br></span><span style="font-style: italic;">(Signature, grade, nom et cachet)</span></p>
			
			
	</body>
</html>