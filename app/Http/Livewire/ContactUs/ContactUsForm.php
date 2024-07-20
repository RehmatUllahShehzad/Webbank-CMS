<?php

namespace App\Http\Livewire\ContactUs;

use App\Mail\ContactUs;
use App\Models\Form;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use App\Repositories\ContactRepository;
use Illuminate\Support\Facades\Http;


class ContactUsForm extends Component
{
    public $email;
    public $first_name;
    public $last_name;
    public $phone;
    public $message;
    public $brandPartners;
    public $gRecaptchaResponse;
 

    public function mount()
    {
        $this->initializeInputs();
    }

    public function render()
    {
        return view('livewire.contact-us.contact-us-form');
    }

    
    public function submit()
    {
        $data = $this->validate([
            'email' => 'required|email',
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'message' => 'required|max:700',
            'brandPartners'=>'required',
            'phone'=>'required|numeric',
            'gRecaptchaResponse' => 'required',
        ]);

        Form::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'type' => Form::TYPE_CONTACT_US,
            'extra_data' => [
                'message' => $this->message,
                'brandPartners' => $this->brandPartners,
                'phone' => $this->phone,
            ]
        ]);

        if ( !$this->verifyCaptcha() ){
            $this->addError('gRecaptchaResponse','Google thinks you are a bot, please refresh and try again');
            return;
        }
        try {
            unset($data['gRecaptchaResponse']);
            Mail::send(new ContactUs($data));
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
        $this->phone = '';
        $this->email = '';
        $this->message = '';
        $this->brandPartners = '';
        $this->gRecaptchaResponse = null;

        

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

