<?php

namespace GeoRiver\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use GeoRiver\Models\travel;

class UpdatetravelRequest extends FormRequest
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
	   if ($this->route('travelsE')){
	   
	
    return [
        'password' => 'required',
    ];
	
	}
        return travel::$rules;
    }
}
