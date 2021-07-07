<?php

namespace App\Http\Requests\Admin;

class TypeProduitStoreCrudRequest extends \App\Http\Requests\BaseRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'designation' => [
                'required',
                'string',
                'max:191',
            ],
            'observation' => ['max:255',],
            'categorie' => ['required', 'integer',\Illuminate\Validation\Rule::in([1,2,3,4]),],
            'statut'     => ['required', 'integer',\Illuminate\Validation\Rule::in([1,2]),],
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
