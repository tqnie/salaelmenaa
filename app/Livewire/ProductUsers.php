<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class ProductUsers extends Component
{
    use WithPagination;
    #[Url]
    public $slug;

    public ?Product $product;
    public $users = [];
    public function mount()
    {

        if ($this->slug) {
            $this->product = Product::where('slug', $this->slug)->first();
              $this->users = User::whereHas('offers', function ($query) {
                return $query->where('product_id', $this->product->id);
            })->withCount(['offers as seller' => fn($q) => $q->where('product_id', $this->product->id)->where('type', 'seller'), 'offers as buyer' => fn($q) => $q->where('product_id', $this->product->id)->where('type', 'buyer')])->get();
        }
        
    }

    public function render()
    {
        return view('livewire.product-users',);
    }
}
