<?php

namespace Topdot\Slider\Http\Livewire;

use Exception;
use Livewire\Component;
use Topdot\Slider\Models\Slider;
use Livewire\WithPagination;
use Topdot\Core\Traits\HasSorting;
use Topdot\Core\Traits\ResetsPagination;
use Topdot\Slider\Repositories\SliderRepository;
use Topdot\Core\Traits\InteractsWithRequests;

class TableComponent extends Component
{
    protected string $paginationTheme = 'bootstrap';
    use withPagination,
        InteractsWithRequests,
        HasSorting,
        ResetsPagination;

    protected $listeners = [
        'delete' => 'delete'
    ];

    public string $title;
    public string $active;
    public string $cratedAt;


    public function mount()
    {
        $this->title = '';
        $this->active = '-1';
        $this->cratedAt = '';
        $this->orderBy = 'id';
        $this->sortOrder = 'DESC';
        $this->sortArrow = '';
    }


    public function render()
    {
        return view('slider::livewire.table-component',[
            'sliders' => $this->getSlider()
        ]);
    }

    public function delete(Slider $slider)
    {
        try {
            (new SliderRepository())->delete($slider);
            $this->emit('alert-success','Slider Deleted');
        }catch (Exception $exception){
            $this->emit('alert-danger',$exception->getMessage());
        }
    }


    public function getSlider()
    {
        return (new SliderRepository())->get($this->getRequest($this->getAttributes()),10,$this->sortOrder,$this->orderBy);
    }

    public function getAttributes(): array
    {
        return [
            'title' => $this->title,
            'createdAt' => $this->cratedAt,
        ];
    }

}
