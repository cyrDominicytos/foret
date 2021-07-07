<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ForestierStoreCrudRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'    => 'required|unique:'.config('permission.table_names.users', 'users').',email',
            'name'     => ['required','string','max:100',],
            'firstname' => ['required','string','max:150',],
            'titre'     => ['required','string','max:200',],
            'grade'     => ['required','string','max:100',],
            'telephone' => ['nullable','numeric','min:999999','max:9999999999',],
            'nouveau_poste'     => 'required',
//            'password' => 'required|confirmed|string|min:8',
//            'password' => ['required', 'confirmed', 'string', 'regex:/^(?=[^a-z]*[a-z])(?=[^A-Z]*[A-Z])(?=\D*\d)(?=[^!@?]*[!@?]).{8,}$/'],
        ];
    }
}
