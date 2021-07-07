<?php

namespace App\Http\Controllers\Admin\PermissionManager;

use Backpack\CRUD\app\Http\Controllers\CrudController;
//use Backpack\PermissionManager\app\Http\Requests\UserStoreCrudRequest as StoreRequest;
//use Backpack\PermissionManager\app\Http\Requests\UserUpdateCrudRequest as UpdateRequest;
use App\Http\Requests\Admin\UserStoreCrudRequest as StoreRequest;
use App\Http\Requests\Admin\UserUpdateCrudRequest as UpdateRequest;
use Illuminate\Support\Facades\Hash;

class UserCrudController extends \App\Http\Controllers\Admin\SuperAdminController {

    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
//    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation {
//        store as traitStore;
//    }
//    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation {
//        update as traitUpdate;
//    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
//    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    public function setup() {
        $this->crud->setModel(config('backpack.permissionmanager.models.user'));
        $this->crud->setEntityNameStrings(trans('backpack::permissionmanager.user'), trans('backpack::permissionmanager.users'));
        $this->crud->setRoute(backpack_url('user'));

        //parent::setLayout();
        parent::gestionPermissionsAutres();
        $this->crud->setDetailsRowView('admin.user.details_row');
        $this->crud->disableDetailsRow();

        $this->filtres();
    }

    public function setupListOperation() {
        $this->crud->setColumns([
            [
                'name' => 'name',
                'label' => trans('backpack::permissionmanager.name'),
                'type' => 'text',
            ],
            [
                'name' => 'firstname',
                'label' => trans('backpack::permissionmanager.firstname'),
                'type' => 'text',
            ],
            [
                'name' => 'email',
                'label' => trans('backpack::permissionmanager.email'),
                'type' => 'email',
            ],
            [
                'name' => 'telephone',
                'label' => 'Telephone',
                'type' => 'text',
            ],
            [// n-n relationship (with pivot table)
                'label' => trans('backpack::permissionmanager.roles'), // Table column heading
                'type' => 'select_multiple',
                'name' => 'roles', // the method that defines the relationship in your Model
                'entity' => 'roles', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model' => config('permission.models.role'), // foreign key model
            ],
            [// n-n relationship (with pivot table)
                'label' => trans('backpack::permissionmanager.extra_permissions'), // Table column heading
                'type' => 'select_multiple',
                'name' => 'permissions', // the method that defines the relationship in your Model
                'entity' => 'permissions', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model' => config('permission.models.permission'), // foreign key model
            ],
        ]);
    }

    public function setupCreateOperation() {
        $this->addUserFields();
        $this->crud->setValidation(StoreRequest::class);
    }

    public function setupUpdateOperation() {
        $this->addUserFields();
        $this->crud->setValidation(UpdateRequest::class);
    }

    /**
     * Store a newly created resource in the database.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store() {
        $this->crud->setRequest($this->crud->validateRequest());
        $this->crud->setRequest($this->handlePasswordInput($this->crud->getRequest()));
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
        $this->crud->setRequest($this->handlePasswordInput($this->crud->getRequest()));
        $this->crud->unsetValidation(); // validation has already been run

        return $this->traitUpdate();
    }

    /**
     * Handle password input fields.
     */
    protected function handlePasswordInput($request) {
        // Remove fields not present on the user.
        $request->request->remove('password_confirmation');
        $request->request->remove('roles_show');
        $request->request->remove('permissions_show');

        // Encrypt password if specified.
        if ($request->input('password')) {
            $request->request->set('password', Hash::make($request->input('password')));
        } else {
            $request->request->remove('password');
        }

        return $request;
    }

    protected function addUserFields() {
        $this->crud->addFields([
            [
                'name' => 'name',
                'label' => trans('backpack::permissionmanager.name'),
                'type' => 'text',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ], // change the HTML attributes for the field wrapper - mostly for resizing fields
            ],
            [
                'name' => 'firstname',
                'label' => trans('backpack::permissionmanager.firstname'),
                'type' => 'text',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
            ],
            [
                'name' => 'email',
                'label' => trans('backpack::permissionmanager.email'),
                'type' => 'email',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
            ],
            [
                'name' => 'telephone',
                'label' => 'Telephone',
                'type' => 'text',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
            ],
            [
                'name' => 'password',
                'label' => trans('backpack::permissionmanager.password'),
                'type' => 'password',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
            ],
            [
                'name' => 'password_confirmation',
                'label' => trans('backpack::permissionmanager.password_confirmation'),
                'type' => 'password',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
            ],
            [// Checklist
                'label' => trans('backpack::permissionmanager.roles'),
                'type' => 'checklist',
                'name' => 'roles',
                'entity' => 'roles',
                'attribute' => 'display_name',
                'model' => config('permission.models.role'),
                'pivot' => true,
            ],
//            [
//                // two interconnected entities
//                'label' => trans('backpack::permissionmanager.user_role_permission'),
//                'field_unique_name' => 'user_role_permission',
//                'type' => 'checklist_dependency',
//                'name' => ['roles', 'permissions'],
//                'subfields' => [
//                    'primary' => [
//                        'label' => trans('backpack::permissionmanager.roles'),
//                        'name' => 'roles', // the method that defines the relationship in your Model
//                        'entity' => 'roles', // the method that defines the relationship in your Model
//                        'entity_secondary' => 'permissions', // the method that defines the relationship in your Model
//                        'attribute' => 'display_name', // foreign key attribute that is shown to user
//                        'model' => config('permission.models.role'), // foreign key model
//                        'pivot' => true, // on create&update, do you need to add/delete pivot table entries?]
//                        'number_columns' => 3, //can be 1,2,3,4,6
//                    ],
//                    'secondary' => [
//                        'label' => ucfirst(trans('backpack::permissionmanager.permission_singular')),
//                        'name' => 'permissions', // the method that defines the relationship in your Model
//                        'entity' => 'permissions', // the method that defines the relationship in your Model
//                        'entity_primary' => 'roles', // the method that defines the relationship in your Model
//                        'attribute' => 'display_name', // foreign key attribute that is shown to user
//                        'model' => config('permission.models.permission'), // foreign key model
//                        'pivot' => true, // on create&update, do you need to add/delete pivot table entries?]
//                        'number_columns' => 3, //can be 1,2,3,4,6
//                    ],
//                ],
//            ],
        ]);
    }

    /**
     * Liste des filtres
     *
     * @return void
     */
    private function filtres() {

        $roles = \App\Models\Role::pluck('name', 'id')->toArray();
        $this->crud->addFilter([
            'name' => 'role_id',
            'type' => 'select2',
            'label' => __('Rôle')
                ], function() use ($roles) {
            return $roles;
        }, function($value) { // if the filter is active
            $role = \App\Models\Role::find($value);
            $userIds = \App\Models\User::role($role)->pluck('users.id');
            $this->crud->addClause('whereIn', 'id', $userIds);
        });
    }

}
