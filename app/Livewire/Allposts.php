<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Allposts extends Component
{
    use WithPagination;
    public $search;
    public $sort = 'desc';
    #[Url()]
    public function setSort($sort)
    {
        $this->sort = ($sort === 'desc') ? 'desc' : 'asc';
    }

    #[Computed()]
    public function posts()
    {
        return Post::published()->orderBy('published_at', $this->sort)
        ->where($this->getSearchCondition())->Paginate(3);
    }

    public function getSearchCondition(){

        return function ($query) {
            $query->where('title', 'like', "%{$this->search}%");
        };
    }


    #[On('search')]//to declare that a specific method should be triggered when a particular event is fired.
    public function updateSearch($search){
     $this->search = $search;
    }



    public function render()
    {
        return view('livewire.allposts');
    }
}
