<?php

namespace Topdot\Cms\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageUpdateRequest extends FormRequest
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
        if (isset($this->news->id)) {
            $id = $this->news->id;
        } elseif (isset($this->carrier->id)) {
            $id = $this->carrier->id;
        } else {
            $id = $this->page->id;
        }

        return [
            'title' => 'required',
            'slug' => 'required|unique:pages,slug,'.$id,
            'meta_title' => 'nullable|max:191',
            'meta_description' => 'nullable|max:250',
            'meta' => 'nullable|max:500',
            'video_link' => 'required_if:is_streaming_page,1'
        ];
    }
}
