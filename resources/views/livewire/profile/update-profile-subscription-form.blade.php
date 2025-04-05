<?php

use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;

new class extends Component
{
    use WithFileUploads;

    public  $package = '';
    public ?Subscription $subscription ; 

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->subscription = Auth::user()->subscription;
      
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileSubscription(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'package' => ['required', 'string', 'max:255']
        ]);
       // $user->subscription_id=$this->package;
        
        $user->save();

        $this->dispatch('profile-updated', name: $user->name);
    }

   
}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            تفاصيل الاشتراك 
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
           تابع صفحة الاشتراكات الخاصة بك
        </p>
    </header>

    <form wire:submit="updateProfileSubscription" class="mt-6 space-y-6">
        <div class="col-lg-12 pdl-5">
            <div class="back-input">
                <x-input-label for="package" :value="__('نوع الاشتراك')" />
                @if($this->subscription==null) 
                <select wire:model="package" class="from-control" id="package" placeholder="الباقة" 
                    name="package">
                    <option   value="">اختر الباقة</option>

                    @foreach(App\Models\Package::where('id','!=',(setting('register_package_id')??4))->get() as $package)
                        <option @selected(old('package')==$package->id) value="{{$package->id}}">{{$package->title}}</option>
                    @endforeach 
                </select>
                @else  
<div class="from-control">{{$this->subscription->package->title}} <br />  عدد الفيديوهات : {{$this->subscription->quantity}} </div> 
                @endif  
                <x-input-error :messages="$errors->get('package')" class="mt-2" />               
            </div>
        </div> 
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <x-action-message class="me-3" on="profile-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section>
