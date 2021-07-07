<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ParametreStoreCrudRequest as StoreRequest;
use App\Http\Requests\Admin\ParametreUpdateCrudRequest as UpdateRequest;

class ParametreCrudController extends \App\Http\Controllers\Admin\SuperAdminController {

    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation {
        store as traitStore;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation {
        update as traitUpdate;
    }

//    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup() {
        $this->crud->setModel("App\Models\Parametre");
        $this->crud->setRoute(backpack_url('parametre'));
        $this->crud->setEntityNameStrings('parametre', 'Parametre');

        //parent::setLayout();
        parent::gestionPermissionsAutres();
        $this->crud->disableDetailsRow();

        $this->filtres();
    }

    protected function setupListOperation() {
        $this->crud->setColumns([
            [
                'name' => 'code',
                'label' => __('Code du paramètre'),
                'type' => 'text',
            ],
            [
                'name' => 'designation',
                'label' => __('Désignation'),
                'type' => 'text',
            ],
            [
                'name' => 'int_value', // The db column name
                'label' => __('Integer_Value'), // Table column heading
                'type' => 'number',
            //'prefix'        => 'fCFA',
            //'suffix'        => ' fCFA',
            //'decimals'      => 2,
            // 'dec_point'     => ',',
            // 'thousands_sep' => '.',
            // decimals, dec_point and thousands_sep are used to format the number;
            // for details on how they work check out PHP's number_format() method, they're passed directly to it;
            // https://www.php.net/manual/en/function.number-format.php
            ],
            [
                'name' => 'double_value', // The db column name
                'label' => __('Double_Value'), // Table column heading
                'type' => 'number',
                //'prefix'        => 'fCFA',
                //'suffix'        => ' fCFA',
                'decimals' => 2,
            // 'dec_point'     => ',',
            // 'thousands_sep' => '.',
            // decimals, dec_point and thousands_sep are used to format the number;
            // for details on how they work check out PHP's number_format() method, they're passed directly to it;
            // https://www.php.net/manual/en/function.number-format.php
            ],
            [
                'name' => 'string_value',
                'label' => __('String_Value'),
                'type' => 'text',
            ],
            [
                'name' => 'nom_user',
                'label' => __('Drenière modification faite par'),
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
    
    
      /**
     * Store a newly created resource in the database.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store() {
        $this->crud->setRequest($this->crud->validateRequest());
        $this->crud->setRequest($this->handleUserInput($this->crud->getRequest()));
//               dd($this->crud->getRequest()->input('modification_faite_par'));
        $this->crud->unsetValidation(); // validation has already been run

        return $this->traitStore();
    }

    /**
     * Update the specified resource in the database.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update() {
        $this->crud->setRequest($this->crud->validateRequest());
        $this->crud->setRequest($this->handleUserInput($this->crud->getRequest()));
        $this->crud->unsetValidation(); // validation has already been run

        return $this->traitUpdate();
    }
    
     /**
     * Handle password input fields.
     */
    protected function handleUserInput($request) {
        //        dd(user_admin()->id);
            $request->request->set('modification_faite_par', user_admin()->id);
        return $request;
    }
    

    protected function addFields() {
        $this->crud->addFields([
            [   'name' => 'code',
                'label' => __('Code du paramètre'),
                'type' => 'text',
                'wrapper' => [
                    'class' => 'form-group col-md-6'
                ],
            ],
            [   'name' => 'designation',
                'label' => __('Désignation'),
                'type' => 'text',
                'wrapper' => [
                    'class' => 'form-group col-md-6'
                ],
            ],
            
               
               [// Number
                'name' => 'int_value',
                'label' => 'Integer_Value',
                'type' => 'number',
                // optionals
                //'attributes' => ["step" => "any"], // allow decimals
                //'prefix' => "CFA",
                //'suffix'     => ".00",
                'wrapper' => [
                    'class' => 'form-group col-md-6'
                ],
            ],
            
            
            [ // Number
                'name' => 'double_value',
                'label' => 'Double_Value',
                'type' => 'number',
                // optionals
                'attributes' => ["step" => "any"], // allow decimals
               // 'prefix' => "CFA",
                 'suffix'     => ".00",
                'wrapper' => [
                    'class' => 'form-group col-md-6'
                ],
            ],

            [   'name' => 'string_value',
                'label' => __('String_Value'),
                'type' => 'text',
                'wrapper' => [
                    'class' => 'form-group col-md-6'
                ],
            ],
            [   'name' => 'modification_faite_par',
                'label' => __('modification_faite_par'),
                'type' => 'hidden',
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
