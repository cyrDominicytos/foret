<?php

namespace App\Http\Controllers\Admin;

class SuperAdminController extends \Backpack\CRUD\app\Http\Controllers\CrudController
{

    /**
     * Set layout admin
     *
     * @return void
     */
    protected function setLayout(){
        $this->crud->setCreateView('admin.crud.create');
        $this->crud->setEditView('admin.crud.edit');
        $this->crud->setListView('admin.crud.list');
        $this->crud->setReorderView('admin.crud.reorder');
        $this->crud->setRevisionsView('admin.crud.revisions');
        $this->crud->setShowView('admin.crud.show');
    }
    
    /**
     * Gestion des permissions autres que le CRUD ordinaire
     *
     * @return void
     */
    protected function gestionPermissionsAutres(){
        /*
        |--------------------------------------------------------------------------
        | Details Row : pour les enregistrements longs
        |--------------------------------------------------------------------------
        */
        $this->crud->enableDetailsRow();
        $this->crud->allowAccess('details_row');       
        /*
        |--------------------------------------------------------------------------
        | Export buttons
        |--------------------------------------------------------------------------
        */
        $this->crud->enableExportButtons();        
        /*
        |--------------------------------------------------------------------------
        | Revisions
        |--------------------------------------------------------------------------
        */
        $this->crud->allowAccess('revisions');
        $this->crud->with('revisionHistory');        
        /*
        |--------------------------------------------------------------------------
        | Clone buttons
        |--------------------------------------------------------------------------
        */
        $this->crud->denyAccess('clone');
        $this->crud->addButton('top', 'bulk_clone', 'view', 'crud::buttons.bulk_clone', 'beginning');
        
    }
}
