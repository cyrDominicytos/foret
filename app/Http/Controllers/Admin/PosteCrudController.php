<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Http\Requests\Admin\PosteStoreCrudRequest as StoreRequest;
use App\Http\Requests\Admin\PosteUpdateCrudRequest as UpdateRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\Poste;
use App\Models\Commune;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;

class PosteCrudController extends \App\Http\Controllers\Admin\SuperAdminController {

    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;

    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;

    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;

    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

//    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    public function setup() {
        $this->crud->setModel("App\Models\Poste");
        $this->crud->setEntityNameStrings('Postes', 'Postes'); //détermine le nom affiché dans le titre du crud
        $this->crud->setRoute(backpack_url('poste'));


        //parent::setLayout();
        parent::gestionPermissionsAutres();
//        $this->crud->setDetailsRowView('admin.user.details_row');
        $this->crud->disableDetailsRow();
    }

    public function setupListOperation() {
        $this->crud->setColumns([
            [
                'name' => 'nom',
                'label' => 'Nom',
                'type' => 'text',
            ],
            [// 1-n relationship
                'label' => 'Commune', // Table column heading
                'type' => 'select',
                'name' => 'id_commune', // the column that contains the ID of that connected entity;
                'entity' => 'commune', // the method that defines the relationship in your Model
                'attribute' => 'nom', // foreign key attribute that is shown to user
                'model' => "App\Models\Commune", // foreign key model
            ],
            [// n-n relationship (with pivot table)
                'label' => 'Postes fils', // Table column heading
                'type' => 'select_multiple',
                'name' => 'postesFils', // the method that defines the relationship in your Model
                'entity' => 'postesFils', // the method that defines the relationship in your Model
                'attribute' => 'nom', // foreign key attribute that is shown to user
                'model' => "App\Models\Poste", // foreign key model
            ],
            [// n-n relationship (with pivot table)
                'label' => 'Postes Patents', // Table column heading
                'type' => 'select_multiple',
                'name' => 'postesParents', // the method that defines the relationship in your Model
                'entity' => 'postesParents', // the method that defines the relationship in your Model
                'attribute' => 'nom', // foreign key attribute that is shown to user
                'model' => "App\Models\Poste", // foreign key model
            ],
            [
                'name' => 'adresse',
                'label' => 'Adresse',
                'type' => 'text',
            ],
            [
                'name' => 'telephone',
                'label' => 'Téléphone',
                'type' => 'text',
            ],
            [
                'name' => 'observation',
                'label' => 'Observation',
                'type' => 'text',
            ],
            [
                'name' => 'statut',
                'label' => 'Statut',
                'type' => 'text',
            ],
            [
                'name' => 'type',
                'label' => 'Type',
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
            [
                'name' => 'nom',
                'label' => 'Nom',
                'type' => 'text',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
            ],
            [
                'name' => 'telephone',
                'label' => 'Téléphone',
                'type' => 'text',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
            ],
            [
                // Select
                'label' => "Commune",
                'type' => 'select',
                'name' => 'id_commune', // the db column for the foreign key
                // optional 
                // 'entity' should point to the method that defines the relationship in your Model
                // defining entity will make Backpack guess 'model' and 'attribute'
                'entity' => 'commune',
                // optional - manually specify the related model and attribute
                'model' => "App\Models\Commune", // related model
                'attribute' => 'nom', // foreign key attribute that is shown to user
                // optional - force the related options to be a custom query, instead of all();
                'options' => (function ($query) {
                    return $query->orderBy('nom', 'ASC')->get();
                }), //  you can use this to filter the results show in the select
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
            ],
            [
                'name' => 'adresse',
                'label' => 'Adresse',
                'type' => 'text',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
            ],
            [
                // select_from_array
                'name' => 'type',
                'label' => "Type",
                'type' => 'select_from_array',
                'options' => \App\Models\TypesPostes::all()->pluck('titre','numero_type'),
                'allows_null' => false,
//                'default' => 'one',
                // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
                'wrapper' => [
                    'class' => 'form-group col-md-4'
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
                    'class' => 'form-group col-md-4'
                ],
            ],
            [
                'name' => 'observation',
                'label' => 'Observation',
                'type' => 'text',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
            ],
            [
                // SelectMultiple = n-n relationship (with pivot table)
                'label' => "Postes fils",
                'type' => 'select_multiple',
                'name' => 'postesFils', // the method that defines the relationship in your Model
                // optional
                'entity' => 'postesFils', // the method that defines the relationship in your Model
                'model' => "App\Models\Poste", // foreign key model
                'attribute' => 'nom', // foreign key attribute that is shown to user
                'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
                // also optional
                'options' => (function ($query) {
                    return $query->orderBy('nom', 'ASC')->get();
                }), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
            ],
            [
                // SelectMultiple = n-n relationship (with pivot table)
                'label' => "Postes parents",
                'type' => 'select_multiple',
                'name' => 'postesParents', // the method that defines the relationship in your Model
                // optional
                'entity' => 'postesParents', // the method that defines the relationship in your Model
                'model' => "App\Models\Poste", // foreign key model
                'attribute' => 'nom', // foreign key attribute that is shown to user
                'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
                // also optional
                'options' => (function ($query) {
                    return $query->orderBy('nom', 'ASC')->get();
                }), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
            ],
        ]);
    }

    protected function setupShowOperation() {
        // by default the Show operation will try to show all columns in the db table,
        // but we can easily take over, and have full control of what columns are shown,
        // by changing this config for the Show operation 
        $this->crud->set('show.setFromDb', false);

        // example logic
        $this->crud->addColumn([
            'name' => 'nom',
            'label' => 'Nom',
            'type' => 'text',
        ]);
        $this->crud->addColumn([
            // 1-n relationship
            'label' => 'Commune', // Table column heading
            'type' => 'select',
            'name' => 'id_commune', // the column that contains the ID of that connected entity;
            'entity' => 'commune', // the method that defines the relationship in your Model
            'attribute' => 'nom', // foreign key attribute that is shown to user
            'model' => "App\Models\Commune", // foreign key model
        ]);
        $this->crud->addColumn([
            // n-n relationship (with pivot table)
            'label' => 'Postes fils', // Table column heading
            'type' => 'select_multiple',
            'name' => 'postesFils', // the method that defines the relationship in your Model
            'entity' => 'postesFils', // the method that defines the relationship in your Model
            'attribute' => 'nom', // foreign key attribute that is shown to user
            'model' => "App\Models\Poste", // foreign key model
        ]);
        $this->crud->addColumn([
            // n-n relationship (with pivot table)
            'label' => 'Postes Patents', // Table column heading
            'type' => 'select_multiple',
            'name' => 'postesParents', // the method that defines the relationship in your Model
            'entity' => 'postesParents', // the method that defines the relationship in your Model
            'attribute' => 'nom', // foreign key attribute that is shown to user
            'model' => "App\Models\Poste", // foreign key model
        ]);
        $this->crud->addColumn([
            'name' => 'adresse',
            'label' => 'Adresse',
            'type' => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'telephone',
            'label' => 'Téléphone',
            'type' => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'observation',
            'label' => 'Observation',
            'type' => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'statut',
            'label' => 'Statut',
            'type' => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'type',
            'label' => 'Type',
            'type' => 'text',
        ]);
        $this->crud->addColumn([
            // any type of relationship
            'name' => 'forestiers', // name of relationship method in the model
            'type' => 'relationship',
            'label' => 'Forestiers au poste', // Table column heading
                // OPTIONAL
//            'entity'    => 'forestiers', // the method that defines the relationship in your Model
            'attribute' => 'prenom_nom', // foreign key attribute that is shown to user
//            'model'     => App\Models\Forestier::class, // foreign key model
        ]);

//        $this->crud->addColumn('text');
        // $this->crud->removeColumn('date');
        // $this->crud->removeColumn('extras');
        // Note: if you HAVEN'T set show.setFromDb to false, the removeColumn() calls won't work
        // because setFromDb() is called AFTER setupShowOperation(); we know this is not intuitive at all
        // and we plan to change behaviour in the next version; see this Github issue for more details
        // https://github.com/Laravel-Backpack/CRUD/issues/3108
    }

}
