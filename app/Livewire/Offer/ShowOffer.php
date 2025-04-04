<?php

namespace App\Livewire\Offer;


use App\Models\Offer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Orchid\Support\Facades\Toast;

#[Layout('layouts.app')]

class ShowOffer extends Component
{
    #[Url]
    public ?Offer $offer;

    public function mount()
    {
        if (Auth::user()) {
            $user = User::find(Auth::id());
        }
    }

    public function rmOffer(int $Id): void
    {
        $offer = Offer::find($Id);
        if ($offer) {
            $offer->delete();
            Toast::success('تم حذف');
        }
    }

    public function render()
    {
        return view('livewire.offer.show', ['user' => Auth::user()]);
    }
}
