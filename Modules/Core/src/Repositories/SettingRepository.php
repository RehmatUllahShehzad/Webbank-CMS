<?php


namespace Topdot\Core\Repositories;


use Topdot\Core\Models\TempMedia;
use Illuminate\Http\Request;

class SettingRepository
{
    public function update(Request $request)
    {
        saveGeneralSetting("site_title",$request->site_title);

        if ( $request->hasFile('site_logo')  ){
            $media = TempMedia::create()->addMediaFromRequest('site_logo')->toMediaCollection('site_logo');
            saveGeneralSetting("site_logo",route('api.medias.show',$media));
        } 
        if ( $request->hasFile('site_logo_small')  ){
            $media = TempMedia::create()->addMediaFromRequest('site_logo_small')->toMediaCollection('site_logo_small');
            saveGeneralSetting("site_logo_small",route('api.medias.show',$media));
        }
        if ( $request->hasFile('banner_image')  ){
            $media = TempMedia::create()->addMediaFromRequest('banner_image')->toMediaCollection('banner_image');
            saveGeneralSetting("banner_image",route('api.medias.show',$media));
        } 
        
        saveGeneralSetting("copyright_text",$request->copyright_text);
        saveGeneralSetting("store_contact_email",$request->store_contact_email);
        saveGeneralSetting("store_contact_phone",$request->store_contact_phone);
        saveGeneralSetting("store_contact_address",$request->store_contact_address);
        saveGeneralSetting("facebook_url",$request->facebook_url);
        saveGeneralSetting("twitter_url",$request->twitter_url);
        saveGeneralSetting("linkedin_url",$request->linkedin_url);
        saveGeneralSetting("instagram_url",$request->instagram_url);

        saveGeneralSetting("banner_cta_link",$request->banner_cta_link);
        saveGeneralSetting("banner_cta_text",$request->banner_cta_text);
        saveGeneralSetting("banner_description",$request->banner_description);
        saveGeneralSetting("banner_heading",$request->banner_heading);
        saveGeneralSetting("contact_us_email",$request->contact_us_email);
        saveGeneralSetting("specialty_finance_email",$request->specialty_finance_email);
        saveGeneralSetting("become_partner_email",$request->become_partner_email);

        saveGeneralSetting("timing",$request->timing);
        saveGeneralSetting("phone",$request->phone);
        saveGeneralSetting("alert_title",$request->alert_title);
        
        return true;
    }
}
