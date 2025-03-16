<?php

namespace App\Livewire\Forms;

use App\Models\Subscription;
use Livewire\Attributes\Validate;
use Livewire\Form;
class SubscriptionForm extends Form
{


    #[Validate('required|string')]
    public string $title = '';
    #[Validate('required|string')]
    public string $body = '';
    #[Validate('required|string')]
    public  $image ;
    #[Validate('required|string')]
    public string $package = '';


    public ?Subscription $subscription;

    public function store($userId,$packageId): void
    {

        $subscription = new Subscription();
        $subscription->fill($this->only('days','body','price'));
        $subscription->user_id = $userId;
        $subscription->package_id = $packageId;
        $subscription->end_date = now()->addDays($this->days);
        $subscription->status = null;
        $subscription->save();
        $this->subscription = $subscription;
    }
}
