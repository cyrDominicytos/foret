<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PayStoreCrudRequest as StoreRequest;
use App\Http\Requests\Admin\PayStoreCrudRequest as UpdateRequest;

class PayCrudController extends \App\Http\Controllers\Admin\SuperAdminController {

    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
//    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup() {
        $this->crud->setModel("App\Models\Pay");
        $this->crud->setRoute(admin_route_prefixe() . "/pay");
        $this->crud->setEntityNameStrings('pay', 'pays');
        
        //parent::setLayout();
        parent::gestionPermissionsAutres();
        $this->crud->disableDetailsRow();

        $this->filtres();
    }

    protected function setupListOperation() {
        $this->crud->setColumns([
            [
                'name' => 'titre',
                'label' => __('Nom'),
                'type' => 'text',
            ],
            [
                'name' => 'code',
                'label' => __('Code'),
                'type' => 'text',
            ],
            [
                'name' => 'indicatif',
                'label' => __('Indicatif'),
                'type' => 'number',
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
            ['name' => 'code', 'type' => 'text', 'label' => __('Code'),
                'wrapper' => [
                    'class' => 'form-group col-md-6'
                ],
            ],
            ['name' => 'indicatif', 'type' => 'number', 'label' => __('Indicatif'),
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
