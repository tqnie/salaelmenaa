<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;


#[Layout('layouts.app')]
class Notify extends Component
{

    public function user(){
        return auth()->user();
    }
    public function render()
    {
        return view('livewire.notify',['user'=>$this->user()]);
    }
}
