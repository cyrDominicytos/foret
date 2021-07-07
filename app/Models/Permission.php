<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
//use Backpack\CRUD\ModelTraits\SpatieTranslatable\HasTranslations;

class Permission extends \Spatie\Permission\Models\Permission
{
    use CrudTrait;
    use \Spatie\Translatable\HasTranslations;

    protected $fillable = ['name', 'display_name', 'guard_name', 'updated_at', 'created_at'];
    protected $translatable = ['display_name'];
    
}
