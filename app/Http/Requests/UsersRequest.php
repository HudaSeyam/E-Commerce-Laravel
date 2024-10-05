<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            "name"        =>  "required",
           /* "type"         =>  "required",
            "user_img"    =>  "nullable|mimes:jpeg,bmp,png,jpg,gif,svg",*/
            "email"        =>  "required",
            "password"     =>  "required",
           /* "location"     =>  "required",
            "mobile"       =>  "required",*/
            
        ];
    }
}


