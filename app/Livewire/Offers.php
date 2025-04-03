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
    public $slug_product;
    #[Url]
    public $user_id;
    public ?User $user=null;
    public ?Product $product=null;
    public function mount()
    {

        if ($this->slug_product) {
            $this->product = Product::where('slug', $this->slug_product)->first();
        }
        if ($this->user_id) {
            $this->user = User::find($this->user_id);
        }
    }



    public function offers()
    {
        $user=$this->user;
        $authUser=Auth::user();
        return Offer::when($user,function($query)use($authUser,$user){
            if($this->user->id!=$authUser->id){
                return $query->getToUser($this->user->id??null);
            }
        })->getMy($authUser->id??null)->product($this->product->id??null)->active()->search($this->search)->get();
    }
    public function render()
    {
        return view('livewire.offers', ['offers' => $this->offers()]);
    }
}
