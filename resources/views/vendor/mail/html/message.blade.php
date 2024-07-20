@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => url('/') ])
    <img src="{{ asset('images/logo2.svg') }}" class="ml-2" style="height: 41px;width: 160px;" alt="">
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent
