<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;


class SearchPostTitle extends Component
{
    public $search = '';
    // public function updatedSearch(){
    //     $this->dispatch('searchtitle', search: $this->search);
    // }

    public function update(){
        $this->dispatch('searchtitle', search: $this->search);
       }

    public function render()
    {
        return view('livewire.search-post-title');
    }
}
