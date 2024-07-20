<?php

namespace App\Http\Livewire\Admin\News;

use Livewire\Component;
use Livewire\WithPagination;
use App\Repositories\NewsRepository;
use App\Models\News;
use Topdot\Core\Traits\HasSorting;
use Topdot\Core\Traits\InteractsWithRequests;
use Topdot\Core\Traits\ResetsPagination;



class NewsTableComponent extends Component
{
    protected string $paginationTheme = 'bootstrap';
    use withPagination,
        InteractsWithRequests,
        HasSorting,
        ResetsPagination;

    protected $listeners = [
        'delete' => 'delete',
        'render' => 'render'
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
        return view('livewire.admin.news.news-table-component',[
            'news' => $this->getNews()
        ]);
    }

    public function delete(News $news)
    {
        try {
            (new NewsRepository())->delete($news);
            $this->emit('alert-success','News Deleted.');
        }catch (\Exception $exception){
            $this->emit('alert-danger',$exception->getMessage());
        }
    }


    public function getNews()
    {
        return (new NewsRepository())->get($this->getRequest($this->getAttributes()),10,$this->sortOrder,$this->orderBy);
    }

    public function getAttributes(): array
    {
        return [
            'title' => $this->title,
            'status' => $this->active,
            'createdAt' => $this->cratedAt,
        ];
    }

}
