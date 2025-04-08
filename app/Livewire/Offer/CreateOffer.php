<?php

namespace App\Livewire\Offer;


use App\Livewire\Forms\OfferForm;
use App\Models\Package;
use App\Models\Offer;
use App\Models\Product;
use App\Models\Subscription;
use App\Models\User;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Masmerise\Toasterer\Toasterer;

use Livewire\WithFileUploads;
use Masmerise\Toaster\Toaster;

#[Layout('layouts.app')]

class CreateOffer extends Component
{

    use WithFileUploads;
    public OfferForm $offerForm;
    #[Url]
    public $product;
    public ?Product $productDetials = null;
    #[Url]
    public $type;
    #[Url]
    public ?User $user = null;
    #[Url]
    public $package;
    public ?Subscription $subscription = null;

    public function mount()
    {
        SEOMeta::setTitle('اضافة فيديو');
        if (Auth::user()) {
            $user = User::find(Auth::id());
            if ($this->product) {
                $this->productDetials = Product::find($this->product);
            }
            $subscription = Subscription::where('user_id', $user->id)->where(function ($query) {

                return $query->where('status', null)->orWhere('status', 'accepted');
            })->first();

            if ($subscription != null) {
                if ($subscription->quantity > 0) {
                    $this->subscription  = $subscription;
                } else {
                    $subscription->update(['status' => 'complated']);
                }
            }
            $status = null;
            if (setting('offer_status') == 'approved') {
                $status = $subscription->status == 'accepted' ? 'approved' : null;
            } else {
                $status = setting('offer_status');
            }
            $this->offerForm->setStatus($status);
            $this->offerForm->setType($this->type);
            $this->offerForm->setUser($user);

            $this->offerForm->setToUser($this->user ?? $user);
            if ($this->productDetials) {
                $this->offerForm->setProduct($this->productDetials->id);
            }
        }
    }



    public function rmOffer(int $productTransferId): void
    {
        $offer = Offer::find($productTransferId);
        if ($offer) {
            $offer->delete();
            Toaster::success('تم حذف الفيديو ');
        }
    }
    public function addOffer(): void
    {
        if (!Auth::Id()) {
            Toaster::warning('انت غير مشترك سجل دخول ثم اضف اعلان');
            return;
        }
        if (!Auth::user()->role_id) {
            Toaster::error('بانتظار تفعيل العضوية ');
            return;
        }
        if ($this->subscription == null) {
            $package = Package::find($this->package);
            if (!$package) {
                Toaster::error('اختر باقة');
                return;
            }
            if ($package) {
                $this->subscription = Subscription::create([
                    'package_id' => $this->package,
                    'status' => null,
                    'user_id' => Auth::Id(),
                    'quantity' => $package->quantity
                ]);
            }
        }
        $this->offerForm->store();
        if ($this->offerForm->offer) {

            if ($this->subscription && setting('offer_status') == 'approved') {
                $this->subscription->update(['quantity' => $this->subscription->quantity - 1]);
            }
            $this->offerForm->reset();

            $user = User::find(Auth::Id());
            $this->offerForm->setUser($user);
            try {
                Toaster::success('تم اضافةً الاعلان ');
            } catch (\Throwable $th) {
                Toaster::error('خطا في ارسال  الاشعار');
            }
        } else {
            Toaster::error('أكمل الحقول');
        }
    }


    public function offers()
    {
        return Offer::getMy(Auth::Id())->get();
    }
    public function render()
    {
        return view('livewire.offer.create', ['offers' => $this->offers(), 'user' => Auth::user()]);
    }
}
