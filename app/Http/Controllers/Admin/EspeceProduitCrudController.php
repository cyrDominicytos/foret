<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\EspeceProduitStoreCrudRequest as StoreRequest;
use App\Http\Requests\Admin\EspeceProduitStoreCrudRequest as UpdateRequest;

class EspeceProduitCrudController extends \App\Http\Controllers\Admin\SuperAdminController {

    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;

//    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup() {
        $this->crud->setModel("App\Models\EspeceProduit");
        $this->crud->setRoute(backpack_url('espece_produit'));
        $this->crud->setEntityNameStrings('espece produit', 'Espèces produit');

        //parent::setLayout();
        parent::gestionPermissionsAutres();
        $this->crud->disableDetailsRow();

        $this->filtres();
    }

    protected function setupListOperation() {
        $this->crud->setColumns([
            [
                'name' => 'designation',
                'label' => __('Désignation'),
                'type' => 'text',
            ],
            [   
                'name' => 'prix_unitaire', // The db column name
                'label' => __('Prix unitaire (fCFA)'), // Table column heading
                'type' => 'number',
            //'prefix'        => 'fCFA',
            //'suffix'        => ' fCFA',
             'decimals'      => 2,
            // 'dec_point'     => ',',
            // 'thousands_sep' => '.',
            // decimals, dec_point and thousands_sep are used to format the number;
            // for details on how they work check out PHP's number_format() method, they're passed directly to it;
            // https://www.php.net/manual/en/function.number-format.php
            ],
            [
                'name' => 'observation',
                'label' => __('Observation'),
                'type' => 'text',
            ],
            [
                'name' => 'statut',
                'label' => __('Statut'),
                'type' => 'text',
            ],
        ]);
    }

    public function setupCreateOperation() {
        $this->addFields();
        $this->crud->setValidation(StoreRequest::class);
    }

    public function setupUpdateOperation() {
        $this->addFields();
        $this->crud->setValidation(UpdateRequest::class);
    }

    protected function addFields() {
        $this->crud->addFields([
            ['name' => 'designation', 'type' => 'text', 'label' => __('Désignation'),
                'wrapper' => [
                    'class' => 'form-group col-md-6'
                ],
            ],
            [// Number
                'name' => 'prix_unitaire',
                'label' => 'Prix unitaire',
                'type' => 'number',
                // optionals
                'attributes' => ["step" => "any"], // allow decimals
                'prefix' => "CFA",
//                 'suffix'     => ".00",
                'wrapper' => [
                    'class' => 'form-group col-md-6'
                ],
            ],
            ['name' => 'observation', 'type' => 'text', 'label' => __('Observation'),
                'wrapper' => [
                    'class' => 'form-group col-md-6'
                ],
            ],
            [// select_from_array
                'name' => 'statut',
                'label' => "Statut",
                'type' => 'select_from_array',
//                'options' => Poste::all()->pluck('nom', 'id'),
                'options' => ['1' => 'Activé', '2' => 'Désactivé'],
                'allows_null' => false,
//                'default' => '',
                // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
                'wrapper' => [
                    'class' => 'form-group col-md-6'
                ],
            ],
        ]);
    }

    /**
     * Liste des filtres
     *
     * @return void
     */
    private function filtres() {
        
    }

}
