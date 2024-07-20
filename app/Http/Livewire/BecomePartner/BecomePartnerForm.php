<?php

namespace App\Http\Livewire\BecomePartner;
use App\Mail\BecomePartner;

use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use App\Models\Form;
use Illuminate\Support\Facades\Http;

class BecomePartnerForm extends Component
{
    public $first_name;
    public $last_name;
    public $email;
    public $company;
    public $website;
    public $no_of_employees;
    public $years_in_business;
    public $annual_revenue;
    public $credit_volume;
    public $capital_raise;
    public $date_capital_raise;
    public $product_stage;
    public $gRecaptchaResponse;
   
    
    

    public function mount()
    {
        $this->initializeInputs();
    }

    public function render()
    {
        return view('livewire.become-partner.become-partner-form');
    }
    public function submit()
    { 
        $data = $this->validate([
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'phone' => 'required',
            'description' => 'required|max:500',
            'email' => 'required|email',
            'company' => 'required',
            'website' => 'required',
            'no_of_employees' => 'required|numeric',
            'years_in_business' => 'required|numeric',
            'annual_revenue' => 'required|numeric',
            'credit_volume' => 'required|numeric',
            'capital_raise' => 'required|numeric',
            'date_capital_raise' => 'required',
            'product_stage' => 'required',
            'gRecaptchaResponse' => 'required',
        ]);

        Form::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'type' => Form::TYPE_BECOME_PARTNER,
            'extra_data' => [
                'company' => $this->company,
                'website' => $this->website,
                'no_of_employees' => $this->no_of_employees,
                'years_in_business' => $this->years_in_business,
                'annual_revenue' => $this->annual_revenue,
                'credit_volume' => $this->credit_volume,
                'capital_raise' => $this->capital_raise,
                'date_capital_raise' => $this->date_capital_raise,
                'product_stage' => $this->product_stage,
                'description_of_opportunity' => $this->description,
                'phone' => $this->phone,
            ]
        ]);

        if ( !$this->verifyCaptcha() ){
            $this->addError('captcha','Google thinks you are a bot, please refresh and try again');
            return;
        }

        try {
            unset($data['gRecaptchaResponse']);
            Mail::send(new BecomePartner($data));
            session()->flash('message', 'Your form has been submitted successfully');
            $this->emit('reset-captcha');
            $this->initializeInputs();
            } catch (\Exception $exception) {
                session()->flash('error', 'Error while submitting form: '.$exception->getMessage());
            
            
            } 
    }
  

    public function initializeInputs()
    {
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->phone = '';
        $this->description = '';
        $this->company = '';
        $this->website = '';
        $this->no_of_employees = '';
        $this->years_in_business = '';
        $this->annual_revenue = '';
        $this->credit_volume = '';
        $this->capital_raise = '';
        $this->date_capital_raise = '';
        $this->product_stage ='';
        $this->gRecaptchaResponse =null;
    }

    private function verifyCaptcha()
    {
        $response = Http::post('https://www.google.com/recaptcha/api/siteverify?secret=' . config('services.recaptcha.secret') . '&response=' . $this->gRecaptchaResponse)->json();
        
        if ( isset($response['success']) && $response['success'] == true ){
            return true;
        }

        return false;
    }
}
