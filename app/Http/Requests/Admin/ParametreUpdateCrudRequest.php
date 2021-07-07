<?php

namespace App\Http\Requests\Admin;

class ParametreUpdateCrudRequest extends \App\Http\Requests\BaseRequest
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
        $Model = 'App\Models\Parametre';
        $Model = new $Model();
        $routeSegmentWithId = empty(config('backpack.base.route_prefix')) ? '2' : '3';

        $id = $this->get('id') ?? \Request::instance()->segment($routeSegmentWithId);

        if (!$Model->find($id)) {
            abort(400, 'Could not find that entry in the database.');
        }
        
        
        return [
            'code' => ['required','string','max:20','unique:App\Models\Parametre,code,'.$id,],
            'designation' => ['required','string','max:150',],
            'double_value' => ['nullable','numeric',],
            'int_value' => ['nullable','numeric',],
            'string_value' => ['nullable','string',],
                    
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
