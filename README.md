<p align="center"><img src="xx.png"></p>

<p align="center">
    eForex
</p>

## À propos de eForex

eForex est le projet de digitalisation des procédures d'exportation et de controle des produits foresrtiers au Bénin.

## Commandes

Liste des commandes de l'application



## Installation et Configuration de l'application pour un noveau projet
php V3
- Cloner le projet
- copier .env.example vers .env et paramétrer .env
- composer install. Si php -v montre la bonne version (php v3.0 minimum) et que composer sort toujours erreur, faire (composer install --ignore-platform-reqs)
    https://stackoverflow.com/questions/45914104/composer-uses-wrong-php-version-but-php-v-shows-the-correct-one-ubuntu
- créer sa BD en local et mettre à jour les parametres dans .env
- php artisan app:startup  (le faire une seule fois avec le mode local dans le .env)
- Vérifier si la vue produits_exportes_par_annees est créé, sinon exécuter la requette dans le sgbd:

(
CREATE OR REPLACE VIEW produits_exportes_par_annees
AS

SELECT 
	id_usager AS id_usager,
	caracteristique_produit_procedure_exportations.id_espece_produit AS id_espece_produit,
	 caracteristique_produit_procedure_exportations.id_type_produit AS id_type_produit,
	 SUM(caracteristique_produit_procedure_exportations.volume) AS volume,
	 procedure_exportations.commune_provenance AS id_commune_provenance,
	 procedure_exportations.commune_empotage AS id_commune_empotage,
	 YEAR(procedure_exportations.date_depart) AS annee
FROM procedure_exportations, caracteristique_produit_procedure_exportations

GROUP BY id_usager, annee, id_espece_produit, id_type_produit, id_commune_provenance, id_commune_empotage
)

- php artisan key:generate



================ Cache clearing ====================
Clear Cache:
php artisan cache:clear

Clear Route Cache
php artisan route:clear

Clear View Cache:
php artisan view:clear

Clear Config Cache:
php artisan config:clear

================================


## Ressources
https://backpackforlaravel.com/docs/4.0/base-how-to
https://coreui.io
https://adminlte.io/themes/v3/index.html
https://github.com/Laravel-Backpack/Base/issues/190#issuecomment-338617617
