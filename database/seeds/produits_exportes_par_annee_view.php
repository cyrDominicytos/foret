<?php

use Illuminate\Database\Seeder;

class produits_exportes_par_annee_view extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //
        DB::statement('CREATE OR REPLACE VIEW produits_exportes_par_annees
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
'
        );
    }

}
