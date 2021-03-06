<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreElementsetsRequest extends FormRequest
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
            'name' => 'required',
            'label' => 'required',
            
            'uri' => 'required|unique:elementsets,uri,'.$this->route('elementset'),
            'members.*' => 'exists:users,id',
            
        ];
    }
}
