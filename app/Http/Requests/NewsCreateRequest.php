<?php

namespace App\Http\Requests;

use App\Models\News;
use Illuminate\Foundation\Http\FormRequest;

class NewsCreateRequest extends FormRequest
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
        $news = $this->route('news');

        return [
            'title' => 'bail|required|nullable|max:191',
            'description' => 'bail|required|nullable|max:5000',
            'feature' => ($news && $news->feature ? '' : 'required|') . "bail|mimes:jpeg,jpg,png,gif|max:10000",
            'date' => 'bail|required',
        ];
    }
    
    public function messages()
    {
        return [
            'feature.required' => 'The feature image field is required',
        ];
    }
}
