<div class="form-box">
    <div class="row">
        <div class="col-md-6 col-lg-6 col-xl-6 col-12">
            <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" wire:model.defer="first_name" id="fname" placeholder="John">
                @error('first_name')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-6 col-12">
            <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" wire:model.defer="last_name" id="lname" placeholder="Doe">
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
                <label for="brandPartners">Brand Partner</label>
                <select wire:model.defer="brandPartners" id="brandPartners">
                    <option value="" selected>Brand Partner</option>
                    <option value="Avant">Avant</option>
                    <option value="Cleo">Cleo</option>
                    <option value="DigniFi">DigniFi</option>
                    <option value="iCreditWorks">iCreditWorks</option>
                    <option value="Jasper">Jasper</option>
                    <option value="Lane Health">Lane Health</option>
                    <option value="Klarna">Klarna</option>
                    <option value="Mosaic">Mosaic</option>
                    <option value="Oportun">Oportun</option>
                    <option value="Petal">Petal</option>
                    <option value="Prosper">Prosper</option>
                    <option value="Yamaha">Yamaha</option>
                    <option value="Unsure">Unsure</option>
                    <option value="notApplicable">Not Applicable</option>
                </select>
                @error('brandPartners')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-12 col-lg-12 col-xl-12 col-12">
            <div class="form-group">
                <label for="message">MESSAGE</label>
                <textarea wire:model.defer="message" type="text" id="message"
                    placeholder="Additional Details"></textarea>
                @error('message')
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
                {{-- <input type="submit" class="general-btn" value="Get In Touch"> --}}
                <button type="button" class="general-btn" wire:click="submit">
                    Submit
                    @include('layouts.livewire.button-loading')
                </button>
            </div>
        </div>
    </div>
    <br>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        
    </div>
    <div>
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>
</div>
    <script>
        var verifyCallback = function(response) {
            console.log(response);
            @this.set('gRecaptchaResponse', response)
        }

        var onloadCallback = function() {
            widget = grecaptcha.render('captcha-box', {
                'sitekey': '{{ config('services.recaptcha.key') }}',
                'callback': verifyCallback,
                'theme': 'dark'
            });
        };

        document.addEventListener('DOMContentLoaded', function() {
            window.Livewire.on('reset-captcha', function() {
                grecaptcha.reset(widget);
            })
        })
    </script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer> </script>
