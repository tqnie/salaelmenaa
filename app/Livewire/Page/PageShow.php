<?php

namespace App\Livewire\Page;

use App\Models\Page;
use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('layouts.app')]
class PageShow extends Component
{
    public Page $page;
    public function mount(Page $page){
        SEOMeta::setTitle($page->title);
    }
    public function render()
    {
        return view('livewire.page.page-show');
    }
}

