<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\EtatStoreCrudRequest as StoreRequest;
use App\Http\Requests\Admin\EtatStoreCrudRequest as UpdateRequest;

class EtatCrudController extends \App\Http\Controllers\Admin\SuperAdminController {

    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup() {
        $this->crud->setModel("App\Models\Etat");
        $this->crud->setRoute(admin_route_prefixe() . "/etat");
        $this->crud->setEntityNameStrings('etat', 'etats');
        
        //parent::setLayout();
        parent::gestionPermissionsAutres();
        $this->crud->disableDetailsRow();

        $this->filtres();
    }

    protected function setupListOperation() {
        $this->crud->setColumns([
            [
                'name'  => 'titre',
                'label' => __('Nom'),
                'type'  => 'text',
            ],
            [
                'label' => __('Pays'),
                'name' => 'pay_id',
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
            ['name' => 'titre', 'type' => 'text', 'label' => __('Nom'),
                'wrapper' => [
                    'class' => 'form-group col-md-6'
                ],
            ],
            [
                'label' => __('Pays'),
                'name' => 'pay_id',
                'type' => 'select2', 
                'entity' => 'pay', // the method that defines the relationship in your Model
                'attribute' => "titre", // foreign key attribute that is shown to user
                'model' => 'App\Models\Pay', // foreign key model
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
