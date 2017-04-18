<?php

namespace GeoRiver\Http\Requests\API;

use GeoRiver\Models\activityUser;
use InfyOm\Generator\Request\APIRequest;

class CreateactivityUserAPIRequest extends APIRequest
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
        return activityUser::$rules;
    }
}
