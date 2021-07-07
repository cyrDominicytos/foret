<?php

namespace App\Observers;

use App\Models\Pay;
use Webpatser\Uuid\Uuid;

class PayObserver {

    /**
     * Handle to the note "creating" event.
     *
     * @param  Pay  $model
     * @return void
     */
    public function creating(Pay $model) {
        $model->uuid = Uuid::generate();
    }
}
