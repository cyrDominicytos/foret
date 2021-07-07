<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Poste;

class PosteUpdateCrudRequest extends FormRequest
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
        $entityModel = new Poste();
        $routeSegmentWithId = empty(config('backpack.base.route_prefix')) ? '2' : '3';

        $entityId = $this->get('id') ?? \Request::instance()->segment($routeSegmentWithId);

        if (!$entityModel->find($entityId)) {
            abort(400, 'Could not find that entry in the database.');
        }

        return [
            'nom'     => ['required','string','max:100',],
            'id_commune'  => ['required','integer',\Illuminate\Validation\Rule::in(\App\Models\Commune::all()->pluck('id')),],
            'type'     => ['required', 'integer',\Illuminate\Validation\Rule::in(\App\Models\TypesPostes::all()->pluck('numero_type')),],
            'statut'     => ['required', 'integer',\Illuminate\Validation\Rule::in([1,2]),]
        ];
    }
}
