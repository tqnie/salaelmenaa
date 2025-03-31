<?php

namespace App\Livewire\Forms;

use App\Models\Offer;
use App\Models\User;
use App\Settings\SettingProfits;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Auth;

class OfferForm extends Form
{
  
    use WithFileUploads;
    
    #[Validate('required|string')]
    public ?string $title = '';
    #[Validate('required|string')]
    public ?string $body = '';
    #[Validate('nullable|string')]
    public ?string $type = 'buyer';
    public ?int $productId;
    public ?int $userId;
    public ?int $toUserId;
    #[Validate('nullable|image')]
    public  $image;
    #[Validate('required|mimes:mp4,mov,avi,mkv|max:102400')]
    public  $video;
  
    public ?Offer $offer;
    public function setUser(?User $user)
    {
        if ($user) $this->userId = $user->id;
    }
    
    public function setType(string $type)
    {
        $this->type = $type;
    }
    public function setProduct(int $productId)
    {
        $this->productId = $productId;
    }
    public function setToUser(User $user)
    {
        $this->toUserId = $user->id;
    }
    public function store(): void
    {
 // 'id','title','body','views','image','video','user_id','product_id','type','status'
        $validated =   $this->validate();
        $offer = new Offer();
        $offer->fill($validated);
        if ($this->image) {
            $url=$this->image->store('offers');
            $offer->image = asset('storage/'.$url);
        }
        if ($this->video) {
            $video=$this->video->store('offers');
            $offer->video =asset('storage/'.$video) ;
        }
         $offer->product_id = $this->productId;
         $offer->to_user_id = $this->toUserId;
         $offer->user_id = $this->userId;
        
        $offer->status =null;
        $offer->save();
        $this->offer = $offer;
    }
}
