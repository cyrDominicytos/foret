<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ForestierUpdateCrudRequest extends FormRequest
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
        $userModel = config('backpack.permissionmanager.models.user');
        $userModel = new $userModel();
        $routeSegmentWithId = empty(config('backpack.base.route_prefix')) ? '2' : '3';

        $userId = $this->get('id') ?? \Request::instance()->segment($routeSegmentWithId);

        if (!$userModel->find($userId)) {
            abort(400, 'Could not find that entry in the database.');
        }

        return [
            'email'    => 'required|unique:'.config('permission.table_names.users', 'users').',email,'.$userId,
            'name'     => ['required','string','max:100',],
            'firstname'     => ['required','string','max:150',],
            'titre'     => ['required','string','max:200',],
            'grade'     => ['required','string','max:150',],
            'telephone' => ['nullable','numeric','min:999999','max:9999999999',],
//            'password' => ['nullable', 'confirmed', 'string', 'regex:/^(?=[^a-z]*[a-z])(?=[^A-Z]*[A-Z])(?=\D*\d)(?=[^!@?]*[!@?]).{8,}$/'],
        ];
    }
}
