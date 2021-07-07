<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CommuneStoreCrudRequest as StoreRequest;
use App\Http\Requests\Admin\CommuneStoreCrudRequest as UpdateRequest;

class CommuneCrudController extends \App\Http\Controllers\Admin\SuperAdminController {

    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup() {
        $this->crud->setModel("App\Models\Commune");
        $this->crud->setRoute(backpack_url('commune'));
        $this->crud->setEntityNameStrings('commune', 'Communes');
        
        //parent::setLayout();
        parent::gestionPermissionsAutres();
        $this->crud->disableDetailsRow();

        $this->filtres();
    }

    protected function setupListOperation() {
        $this->crud->setColumns([
            [
                'name'  => 'nom',
                'label' => __('Nom'),
                'type'  => 'text',
            ],
            [
                'label' => __('Département'),
                'name' => 'id_departement',
                'type' => 'select', 
                'entity' => 'departement', // the method that defines the relationship in your Model
                'attribute' => "nom", // foreign key attribute that is shown to user
                'model' => 'App\Models\Departement', // foreign key model                
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
            ['name' => 'nom', 'type' => 'text', 'label' => __('Nom'),
                'wrapper' => [
                    'class' => 'form-group col-md-6'
                ],
            ],
            [
                'label' => __('département'),
                'name' => 'id_departement',
                'type' => 'select2', 
                'entity' => 'departement', // the method that defines the relationship in your Model
                'attribute' => "nom", // foreign key attribute that is shown to user
                'model' => 'App\Models\Departement', // foreign key model
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
