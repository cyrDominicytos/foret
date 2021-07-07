<?php

namespace App\Http\Requests;

use App\Models\BackpackUser;
use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest 
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Rules pour les téléphones
     * 
     * @return array
     */
    protected function telephobeRules() {
        return [
            'sometimes',
            'nullable',
            'digits_between:7,12',
        ];
    }


}
