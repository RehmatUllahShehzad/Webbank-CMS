<?php

namespace Topdot\Slider\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderCreateRequest extends FormRequest
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
            'title' => 'required',
            'slug' => 'required|unique:pages,slug',
            'meta_title' => 'nullable|max:191',
            'meta_description' => 'nullable|max:250',
            'meta' => 'nullable|max:500',
            'image' => 'bail|mimes:jpeg,jpg,png,gif|max:10000',
        ];
    }
}
