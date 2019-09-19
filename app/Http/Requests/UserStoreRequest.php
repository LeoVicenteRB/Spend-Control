<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'local'=>'required',
            'tipo' => 'required',
            'data'=>'required',
            'preco'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'local.required' => 'O campo Local é obrigatório!',
            'tipo.required' => 'O campo Tipo é obrigatório!',
            'data.required' => 'O campo Data é obrigatório!',
            'preco.required' => 'O campo Preço é obrigatório!',
        ];
}
