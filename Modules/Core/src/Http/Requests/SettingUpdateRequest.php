<?php

namespace Topdot\Core\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingUpdateRequest extends FormRequest
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
            'site_logo' => 'nullable|image',
            'store_contact_email' => 'nullable|email',
            'specialty_finance_email' => 'nullable|email',
            'become_partner_email' => 'nullable|email',
            'store_contact_phone' => 'nullable|max:20',
            'facebook_url' => 'nullable|active_url',
            'twitter_url' => 'nullable|active_url',
            'linkedin_url' => 'nullable|active_url',
            'instagram_url' => 'nullable|active_url',
            'banner_image' => 'nullable|image',
            'banner_description' => 'bail|nullable|max:191',
            'banner_cta_text' => 'bail|nullable|max:191',
            'banner_heading' => 'bail|nullable|max:191',
            'banner_cta_link' => 'bail|nullable|max:191',
        ];
    }
}
