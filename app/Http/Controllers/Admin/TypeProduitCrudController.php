<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\TypeProduitStoreCrudRequest as StoreRequest;
use App\Http\Requests\Admin\TypeProduitStoreCrudRequest as UpdateRequest;

class TypeProduitCrudController extends \App\Http\Controllers\Admin\SuperAdminController {

    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
//    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup() {
        $this->crud->setModel("App\Models\TypeProduit");
        $this->crud->setRoute(backpack_url('type_produit'));
        $this->crud->setEntityNameStrings('type produit', 'Type produit');
        
        //parent::setLayout();
        parent::gestionPermissionsAutres();
        $this->crud->disableDetailsRow();

        $this->filtres();
    }

    protected function setupListOperation() {
        $this->crud->setColumns([
            [
                'name'  => 'designation',
                'label' => __('Désignation'),
                'type'  => 'text',
            ],
            [
                'name'  => 'categorie',
                'label' => __('Catégorie'),
                'type'  => 'text',
            ],
            [
                'name'  => 'observation',
                'label' => __('Observation'),
                'type'  => 'text',
            ],
            [
                'name'  => 'statut',
                'label' => __('Statut'),
                'type'  => 'text',
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
            ['name' => 'categorie', 'type' => 'text', 'label' => __('Catégorie'),
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
