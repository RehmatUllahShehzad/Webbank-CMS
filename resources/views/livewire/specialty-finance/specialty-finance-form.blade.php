<div class="form-box">
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="fname">First Name</label>
                <input class="w-100" type="text" wire:model.defer="first_name" id="fname" placeholder="John">
                @error('first_name')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="lname">Last Name</label>
                <input class="w-100" type="text" wire:model.defer="last_name" id="lname" placeholder="Doe">
                @error('last_name')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
      
        <div class="col-md-12 col-lg-12 col-xl-12 col-12">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" wire:model.defer="email" id="email" placeholder="name@email.com">
                @error('email')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-12 col-lg-12 col-xl-12 col-12">
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="number" wire:model.defer="phone" id="phone" placeholder="000-000-0000"
                    pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
                @error('phone')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-12 col-lg-12 col-xl-12 col-12">
            <div class="form-group">
                <label for="company">Company</label>
                <input type="text" wire:model.defer="company" id="company" placeholder="Corporation">
                @error('company')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="col-md-12 col-lg-12 col-xl-12 col-12">
            <div class="form-group">
                <label for="message">Description of Opportunity</label>
                <textarea maxlength="500" wire:model.defer="description" type="text" id="message"
                    placeholder="Description of Opportunity"></textarea>
                @error('description')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-6 col-12">
            <div id="captcha-box" wire:ignore></div>
            @error('gRecaptchaResponse')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-12 col-lg-12 col-xl-12 col-12">
            <div class="form-submit-btn">
                <button type="button" class="general-btn" wire:click="submit">
                    Submit
                    @include('layouts.livewire.button-loading')
                </button>
            </div>
        </div>
        
        <br>
        <div class="row mt-2 mb-2">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <div  class="row mt-2 mb-2">
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
</div>
<script>
    var verifyCallback = function(response) {
        @this.set('gRecaptchaResponse', response)
    }

    var onloadCallback = function() {
        let widget = grecaptcha.render('captcha-box', {
            'sitekey': '{{ config('services.recaptcha.key') }}',
            'callback': verifyCallback,
            'theme': 'dark'
        });
    };

    window.addEventListener('DOMContentLoaded', function() {
        document.addEventListener('DOMContentLoaded', function() {
            window.Livewire.on('reset-captcha', function() {
                grecaptcha.reset(widget);
            })
        })
    })
</script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer> </script>
