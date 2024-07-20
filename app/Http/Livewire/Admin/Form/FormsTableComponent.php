<?php

namespace App\Http\Livewire\Admin\Form;

use Exception;
use App\Models\Form;
use Livewire\Component;
use Livewire\WithPagination;
use Topdot\Core\Traits\HasSorting;
use Illuminate\Support\Facades\Auth;
use Topdot\Core\Traits\ResetsPagination;
use Topdot\Core\Traits\InteractsWithRequests;

class FormsTableComponent extends Component
{

    protected string $paginationTheme = 'bootstrap';

    use withPagination,
        InteractsWithRequests,
        HasSorting,
        ResetsPagination;

    public string $email;
    public string $type;

    protected $listeners = [
        'delete' => 'delete'
    ];


    public function mount()
    {
        $this->email = '';
        $this->type = '';
    }

    public function render()
    {
        return view('livewire.admin.form.forms-table-component', [
            'forms' => $this->getForms()
        ]);
    }

    public function getForms()
    {      
        if($this->email !==''){
            return Form::where('email',"LIKE","%{$this->email}%")->paginate(10);
        }
        if($this->type =='contact_us' || $this->type =='become_partner' ){
            return Form::where('type',$this->type)->paginate(10);
        }
       
        return Form::where('email',"LIKE","%{$this->email}%")->paginate(10);
    }

    public function getAttributes(): array
    {
        return [
            'email' => $this->email,
            'type' => $this->type,
        ];
    }
    
    public function delete(Form $contact)
    {
        $user = Auth::user();
        try {
            if(!$user->hasPermissionTo((config('cms.routeNamePrefix').'forms.destroy')) && !$user->isAdmin() ){
                abort(403, 'Forbidden! User does not have permission');
            }
            $contact->delete();
            $this->emit('alert-success', 'form record Deleted');
        } catch (Exception $exception) {
            $this->emit('alert-danger', $exception->getMessage());
        }
    }
}
