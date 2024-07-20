<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoCreateRequest extends FormRequest
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
            'title' => 'bail|nullable|max:191',
            'description' => 'bail|required|nullable|max:250',
            'video'  => 'bail|required|mimes:mp4|max:10000',
            'image'=>'bail|mimes:jpeg,jpg,png,gif|required|max:10000',
            's_thumbnail'=> 'bail|mimes:jpeg,jpg,png,gif|required|max:10000',
        ];
    }
}
