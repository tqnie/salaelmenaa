<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;


#[Layout('layouts.app')]
class Home extends Component
{
    use WithPagination, WithoutUrlPagination; 

    public $query = '';
    public function products(){
        return Product::where('title', 'like', '%'.$this->query.'%')->active()->latest()->paginate(20);
    }
    public function render()
    {
        return view('livewire.home',['products'=>$this->products()]);
    }
}
