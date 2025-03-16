<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\Forms\SubscriptionForm;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
 use App\Models\Package;
use Illuminate\Support\Facades\Auth;
use Orchid\Support\Facades\Toast;

#[Layout('layouts.app')]

class Subscription extends Component
{
    #[Url]
    public ?Package $package;
   
    public SubscriptionForm $subscriptionForm;

    public function newSubscription(): void
    {
        $user=Auth::user();
        if (!$user) {
            Toast::error('سجل دخول لاضافة');
            return;
        }
        if (!$user->role_id) {
            Toast::error('بانتظار تفعيل العضوية ');
            return;
        }
        $this->subscriptionForm->store($user->id,$this->package->id);
        $this->subscriptionForm->reset();
        Toast::success('تم الارسال بنجاح');
    }
    public function render()
    {
        return view('livewire.subscription');
    }
}
