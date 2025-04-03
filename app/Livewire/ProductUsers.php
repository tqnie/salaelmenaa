<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\ProductUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

#[Layout('layouts.app')]
class ProductUsers extends Component
{
    use WithPagination;
    #[Url]
    public $slug;

    public ?Product $product=Null;
    public ?ProductUser $productUser=Null;

    public function mount()
    {
        if ($this->slug) {
            $this->product = Product::where('slug', $this->slug)->first();
            $user=Auth::user();
            if($user){
               $this->productUser = ProductUser::where('user_id',$user->id)->where('product_id',$this->product->id)->first();
            }
        }
    }
    public function subscripProduct($type){
        $user=Auth::user();
        if($this->productUser){
            Toaster::success('انت مشترك  في قسم .'.$this->product->name);
            return;
        }
        if($user){ 
           ProductUser::create([
                'user_id'=>$user->id,'type'=>$type,
            ]);
            Toaster::success('تم الاشتراك في قسم .'.$this->product->name);
        }
    }

    public function users()
    { 
        $productId = $this->product->id;
        return  User::whereHas('productUser', function ($query) use ($productId) {
            return $query->where('product_id', $productId);
        })->withCount(['offers as seller' => fn($q) => $q->where('product_id', $productId)->where('type', 'seller'), 'offers as buyer' => fn($q) => $q->where('product_id', $productId)->where('type', 'buyer')])->get();
    }
    public function render()
    {
        return view('livewire.product-users', ['users' => $this->users()]);
    }
}
