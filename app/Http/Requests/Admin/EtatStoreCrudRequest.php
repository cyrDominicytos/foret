<?php

namespace App\Http\Requests\Admin;

class EtatStoreCrudRequest extends \App\Http\Requests\BaseRequest
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
            'titre' => [
                'required',
                'string',
                'max:191',
            ],
            'pay_id' => [
                'required',
                'integer',
                \Illuminate\Validation\Rule::in(
                        \App\Models\Pay::pluck('id')->toArray()
                ),
            ],            
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
