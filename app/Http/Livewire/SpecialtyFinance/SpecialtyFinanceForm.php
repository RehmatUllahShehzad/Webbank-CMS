<?php

namespace App\Http\Livewire\SpecialtyFinance;


use App\Mail\SpecialtyFinance;
use App\Models\Form;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Illuminate\Support\Facades\Http;


class SpecialtyFinanceForm extends Component
{

    public $email;
    public $name;
    public $description;
    public $phone;
    public $company;
    public $gRecaptchaResponse;


    public function mount()
    {
        $this->initializeInputs();
    }

    public function render()
    {
        return view('livewire.specialty-finance.specialty-finance-form');
    }

    public function submit()
    {
        $data = $this->validate([
            'email' => 'required|email',
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'company' => 'required',
            'phone' => 'required|numeric',
            'description' => 'required|max:500',
            'gRecaptchaResponse' => 'required',
        ]);

        Form::create([
            'email' => $this->email,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'type' => Form::TYPE_SPECIALTY_FINANCE,
            'extra_data' => [
                'company' => $this->company,
                'phone' => $this->phone,
                'description_of_opportunity' => $this->description,
            ]
        ]);

        if (!$this->verifyCaptcha()) {
            $this->addError('gRecaptchaResponse', 'Google thinks you are a bot, please refresh and try again');
            return;
        }
        try {
            unset($data['gRecaptchaResponse']);
            Mail::send(new SpecialtyFinance($data));
            session()->flash('message', 'Your form has been submitted successfully');
            $this->emit('reset-captcha');
            $this->initializeInputs();
        } catch (\Exception $exception) {
            session()->flash('error', 'Error while submitting form: ' . $exception->getMessage());
        }
    }


    public function initializeInputs()
    {
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->phone = '';
        $this->company = '';
        $this->description = '';
        $this->gRecaptchaResponse = null;
    }

    private function verifyCaptcha()
    {
        $response = Http::post('https://www.google.com/recaptcha/api/siteverify?secret=' . config('services.recaptcha.secret') . '&response=' . $this->gRecaptchaResponse)->json();

        if (isset($response['success']) && $response['success'] == true) {
            return true;
        }

        return false;
    }
}
