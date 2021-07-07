<!DOCTYPE html>
<html>
	<head>
		<title>ETAT DE VERSEMENT</title>
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
			padding: 4px;
		}

		.dynamic{
			font-weight: bold;
		}

		.soulign{
			text-decoration: underline;
			text-align: center;
		}



	</style>


	<body>
		
			<table style="width: 100%;">
				<tr>
					<td style="width: 15%;">
						<img src="{{ asset('img/logo_dgefc.jpeg') }}"  alt="Logo">
					</td>
					<td  style="width: 85%; text-align: center;">
						<h4>REPUBLIQUE DU BENIN</h4>
						<span style="font-size: 10px">FRATERNITE - JUSTICE - TRAVAIL</span>
						<p style="margin-top: 3px; margin-bottom: 3px; font-size: 10px;">......................................</p>
						<h4>DIRECTION GENERALE DES EAUX, FORETS ET CHASSE</h4>
						<p style="margin-top: 1px; margin-bottom: 1px; font-style: italic;font-size: 10px;">TEL : (229) 21-33-06-62 FAX : 21-33-21-92/21-33-04-21 | BP. 393 COTONOU(R.BENIN)<br> E-mail:foretsbenin@yahoo.fr</p>
						<hr>
					</td>
				</tr>
			</table>
		
		
		<p style="float: left;">{{ $donnees->numero}}</p>
		<p style="float: right;">Cotonou, le <?= date('d/m/Y')?> </p><br>
		<h2 class="soulign">Etat de versement des Recettes Forestières à l'Exportation
		</h2>
		<p style="text-align: center;">Mois <?= getMonthList()[date('m')].' '.date('Y') ?>  </p>

		<p style="text-align: center;">Réf : Article 21 tableau 17 de la loi 2017-40 du 29 décembre 2017 portant loi de finances, pour la gestion 2018</p>

		<h3 style="text-align: center;">Intitulé du compte de versement : 46618 << Produits relatifs aux services intermédiaires de recettes >> </h3>

		<table  class="second_tab" id="second_tab" style="width: 100%;margin-bottom: 3%;margin-left: 5%;">
			<thead>
				<tr>
					<th>Société / Nom et Prénoms</th>
					<th>Type de Produit</th>
					<th>Type d'exploitation / Origine</th>
					<th>Nature de la recette</th>
					<th>Prix unitaire (FCFA)/m3</th>
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
				                   <td>{{$caracteristique->type_exploitation}}</td>
				                   <td>{{$caracteristique->nature_recette}}</td>
				                   <td>{{$caracteristique->prix_unitaire}}</td>
				                   <td>{{ $caracteristique->volume}}</td>
				                   <td>{{$caracteristique->volume * $caracteristique->prix_unitaire}}</td>
				                  </tr>               
	 							@endforeach
	 							<tr>
	 								<td colspan="6" style="text-align: center; font-weight: bold;">TOTAL</td>
	 								<td style="font-weight: bold;" >{{ $total }}</td>
	 						
	 							</tr>
	                  </tbody>
		</table>

		<p>Arrêté le présent état de versement à la somme de : {{ $donnees->montant_total }}</p>
		<h6 style="line-height: 1%;">Pour acquit : </h6>
		<h6 style="text-decoration: underline;line-height: 1%">Quittance <span style="text-decoration: none;">:</span></h6>

		<h6 style="text-decoration: underline;line-height: 1%">Signature et cachet <span style="text-decoration: none;">:</span></h6>


			
			
	</body>
</html>