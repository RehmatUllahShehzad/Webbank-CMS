@component('mail::message')
# Specialty Finance Form WebBank

@foreach($data as $key=>$value)

<strong>{{Str::of($key)->replace("_"," ")->title()}}:</strong> {{$value}} <br>
@endforeach

Thanks,<br>
{{ getGeneralSetting('site_title') }}
@endcomponent
