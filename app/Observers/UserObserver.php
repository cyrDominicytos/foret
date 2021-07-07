<?php

namespace App\Observers;

use App\Models\BackpackUser;
use App\Models\User;
use Webpatser\Uuid\Uuid;

class UserObserver
{
    /**
     * Handle to the user "creating" event.
     *
     * @param  BackpackUser  $model
     * @return void
     */
    public function creating(User $model)
    {
        $model->uuid = Uuid::generate();
    }
    
    /**
     * Handle to the user "created" event.
     *
     * @param  BackpackUser  $user
     * @return void
     */
    public function created(User $user)
    {
        
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  BackpackUser  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  BackpackUser  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }
}
