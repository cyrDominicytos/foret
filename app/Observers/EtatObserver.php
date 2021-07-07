<?php

namespace App\Observers;

use App\Models\Etat;
use Webpatser\Uuid\Uuid;

class EtatObserver {

    /**
     * Handle to the note "creating" event.
     *
     * @param  Etat  $model
     * @return void
     */
    public function creating(Etat $model) {
        $model->uuid = Uuid::generate();
    }
}
