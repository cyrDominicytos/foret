<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\GradeStoreCrudRequest as StoreRequest;
use App\Http\Requests\Admin\GradeStoreCrudRequest as UpdateRequest;

class GradeCrudController extends \App\Http\Controllers\Admin\SuperAdminController {

    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup() {
        $this->crud->setModel("App\Models\Grade");
        $this->crud->setRoute(backpack_url('grade'));
        $this->crud->setEntityNameStrings('grade', 'Grade');
        
        //parent::setLayout();
        parent::gestionPermissionsAutres();
        $this->crud->disableDetailsRow();

        $this->filtres();
    }

    protected function setupListOperation() {
        $this->crud->setColumns([
            [
                'name'  => 'libelle',
                'label' => __('Libellé'),
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
            ['name' => 'libelle', 'type' => 'text', 'label' => __('Libellé'),
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
