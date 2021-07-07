<?php

namespace App\Observers;

use App\Models\Ville;
use Webpatser\Uuid\Uuid;

class VilleObserver {

    /**
     * Handle to the model "creating" event.
     *
     * @param  Ville  $model
     * @return void
     */
    public function creating(Ville $model) {
        $model->uuid = Uuid::generate();
    }
}
