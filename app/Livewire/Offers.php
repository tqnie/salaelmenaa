<?php

namespace App\Livewire;


use App\Models\Package;
use App\Models\Offer;
use App\Models\Product;
use App\Models\User;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;
use Orchid\Support\Facades\Toast;

#[Layout('layouts.app')]

class Offers extends Component
{

    use WithPagination;
    #[Url()]
    public $perPage = 5;
    #[Url]
    public $search; 
    #[Url]
    public $type;
    #[Url]
    public $user;
    public ?Product $product;
    public function mount()
    {
        if ($this->type) {
            $this->product = Product::where('slug', $this->type)->first();
          
        }
        if (Auth::user()) {
            $user = User::find(Auth::id());
        }
    }
  

  
    public function offers()
    {
        return Offer::my($this->user)->search($this->search)->get();
    }
    public function render()
    {
        return view('livewire.offers', ['offers' => $this->offers(),'user'=>Auth::user()]);
    }
}
