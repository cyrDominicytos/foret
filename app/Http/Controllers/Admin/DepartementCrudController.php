<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\DepartementStoreCrudRequest as StoreRequest;
use App\Http\Requests\Admin\DepartementStoreCrudRequest as UpdateRequest;

class DepartementCrudController extends \App\Http\Controllers\Admin\SuperAdminController {

    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
//    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup() {
        $this->crud->setModel("App\Models\Departement");
        $this->crud->setRoute(backpack_url('departement'));
        $this->crud->setEntityNameStrings('Departement', 'Departements');

        //parent::setLayout();
        parent::gestionPermissionsAutres();
        $this->crud->disableDetailsRow();

        $this->filtres();
    }

    protected function setupListOperation() {
        $this->crud->setColumns([
            [
                'name' => 'nom',
                'label' => __('Nom'),
                'type' => 'text',
            ],
            [
                'label' => __('Pays'),
                'name' => 'id_pays',
                'type' => 'select',
                'entity' => 'pay', // the method that defines the relationship in your Model
                'attribute' => "titre", // foreign key attribute that is shown to user
                'model' => 'App\Models\pay', // foreign key model                
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
                'label' => __('Pays'),
                'name' => 'id_pays',
                'type' => 'select2',
                'entity' => 'pay', // the method that defines the relationship in your Model
                'attribute' => "titre", // foreign key attribute that is shown to user
                'model' => 'App\Models\Pay', // foreign key model
                // also optional
                'options' => (function ($query) {
                    return $query->orderBy('titre', 'ASC')->where('id', 23)->get();
                }), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
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
