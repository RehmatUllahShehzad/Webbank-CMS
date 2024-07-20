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
                <label for="Website">Website</label>
                <input type="url" wire:model.defer="website" id="Website" placeholder="www.company.com">
                @error('website')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-12 col-lg-12 col-xl-12 col-12">
            <div class="form-group">
                <label for="employees">NUMBER OF EMPLOYEES</label>
                <input type="text" wire:model.defer="no_of_employees" id="employees" placeholder="120">
                @error('no_of_employees')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-12 col-lg-12 col-xl-12 col-12">
            <div class="form-group">
                <label for="years">Years in Business</label>
                <input type="text" wire:model.defer="years_in_business" id="years" placeholder="Years">
                @error('years_in_business')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-12 col-lg-12 col-xl-12 col-12">
            <div class="form-group">
                <label for="revenue">ANNUAL REVENUE</label>
                <input type="text" wire:model.defer="annual_revenue" id="revenue" placeholder="$6,000,000">
                @error('annual_revenue')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-12 col-lg-12 col-xl-12 col-12">
            <div class="form-group">
                <label for="productVloume">Projected year-one product volume</label>
                <input type="text" id="productVloume" wire:model.defer="credit_volume"
                    placeholder="Projected year-one credit product volume">
                @error('credit_volume')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-12 col-lg-12 col-xl-12 col-12">
            <div class="form-group">
                <label for="capitalAmount">Amount of most recent capital raise</label>
                <input type="text" id="capitalAmount" wire:model.defer="capital_raise" placeholder="$6,000,000">
                @error('capital_raise')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-12 col-lg-12 col-xl-12 col-12">
            <div class="form-group">
                <label for="capitalDate">Date of most recent capital raise</label>
                <div class="input-group date" data-date-format="mm-dd-yyyy">
                    <input class="form-control date" wire:model.defer="date_capital_raise" type="date">
                    <span class="input-group-addon"><em class="glyphicon glyphicon-calendar"></em></span>
                </div>
                <div>
                    @error('date_capital_raise')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-12 col-xl-12 col-12">
            <div class="form-group">
                <label for="productStage">PRODUCT STAGE</label>
                <select wire:model.defer="product_stage" id="">
                    <option value="" selected>Select option</option>
                    <option value="In Market">In Market</option>
                    <option value="In Testing">In Testing</option>
                    <option value="Under Development">Under Development</option>
                </select>
                @error('product_stage')
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
