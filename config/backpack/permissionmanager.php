<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Models
    |--------------------------------------------------------------------------
    |
    | Models used in the User, Role and Permission CRUDs.
    |
    */

    'models' => [
        //'user'       => App\Models\BackpackUser::class,
        'user'       => App\Models\User::class, //V4.1
        'permission' => App\Models\Permission::class,
        'role'       => App\Models\Role::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Disallow the user interface for creating/updating permissions or roles.
    |--------------------------------------------------------------------------
    | Roles and permissions are used in code by their name
    | - ex: $user->hasPermissionTo('edit articles');
    |
    | So after the developer has entered all permissions and roles, the administrator should either:
    | - not have access to the panels
    | or
    | - creating and updating should be disabled
    */

    'allow_permission_create' => true,
    'allow_permission_update' => true,
    'allow_permission_delete' => true,
    'allow_role_create'       => true,
    'allow_role_update'       => true,
    'allow_role_delete'       => false,

    /*
    |--------------------------------------------------------------------------
    | Multiple-guards functionality
    |--------------------------------------------------------------------------
    |
    */
    'multiple_guards' => true,

];
