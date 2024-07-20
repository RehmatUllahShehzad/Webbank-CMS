<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Video;
class VideoUpdateRequest extends FormRequest
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
      
        $video = Video::find($this->route('video'));
        
        if($video[0]->image && $video[0]->s_thumbnail && $video[0]->video)
        {
            return [
                'title' => 'bail|nullable|max:191',
                'description' => 'bail|nullable|max:250',
                'video'  => 'bail|mimes:mp4',
                'image'=>'bail|mimes:jpeg,jpg,png,gif|max:10000',
                's_thumbnail'=> 'bail|mimes:jpeg,jpg,png,gif|max:10000',
            ];
        }
        else
        {
            return [
                'title' => 'bail|nullable|max:191',
                'description' => 'bail|nullable|max:250',
                'video'  => 'bail|required|mimes:mp4',
                'image'=>'bail|mimes:jpeg,jpg,png,gif|required|max:10000',
                's_thumbnail'=> 'bail|mimes:jpeg,jpg,png,gif|required|max:10000',
            ];
        }
     
    }
}
