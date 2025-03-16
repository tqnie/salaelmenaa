<?php

namespace App\Livewire\Page;

use App\Models\Page;
use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('layouts.app')]
class PageShow extends Component
{
    public Page $page;
    public function mount(Page $page){

    }
    public function render()
    {
        return view('livewire.page.page-show');
    }
}

