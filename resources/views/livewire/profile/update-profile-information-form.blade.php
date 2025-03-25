<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;

new class extends Component
{
    use WithFileUploads;

    public string $name = '';
    public string $bio = '';
    public string $email = '';
    public  $avatar;
    public string $country= '';
    public string $city= '';
    public string $address= '';
    public string $mobile= '';
    public string $profession= '';

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->bio = Auth::user()->bio??'';
        $this->mobile = Auth::user()->mobile??'';
        $this->country = Auth::user()->country??'';
        $this->city = Auth::user()->city??'';
        $this->address = Auth::user()->address??'';
        $this->profession = Auth::user()->profession??'';
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'bio' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'profession' => ['nullable', 'string', 'max:255'],
            'mobile' => ['nullable', 'string', 'max:255'],
            'avatar' => ['nullable', 'image', 'max:255'],
           'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }
        if($this->avatar){
            $user->avatar=$this->avatar->store('users');
        }
        $user->save();

        $this->dispatch('profile-updated', name: $user->name);
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function sendVerification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }
}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form wire:submit="updateProfileInformation" class="mt-6 space-y-6">
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model="name" id="name" name="name" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <div>
            <x-input-label for="mobile" :value="__('رقم الجوال')" />
            <x-text-input wire:model="mobile" id="mobile" class="block mt-1 w-full" type="text" name="mobile" />
            <x-input-error :messages="$errors->get('mobile')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" name="email" type="email" class="mt-1 block w-full" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! auth()->user()->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button wire:click.prevent="sendVerification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
        <div>
            <x-input-label for="bio" :value="__('bio')" />
            <x-textarea-input wire:model="bio" id="bio" name="bio" type="text" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('bio')" />
        </div>
        <div  x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
        x-on:livewire-upload-finish="uploading = false"
        x-on:livewire-upload-cancel="uploading = false"
        x-on:livewire-upload-error="uploading = false"
        x-on:livewire-upload-progress="progress = $event.detail.progress">
            <x-input-label for="avatar" :value="__('صورة شخصية ')" />
            <x-text-input wire:model="avatar" id="avatar" class="block mt-1 w-full" type="file" name="avatar" />
            <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
                {{-- <div wire:loading wire:target="avatar">Uploading...</div> --}}
            {{-- @if ($avatar)
                <img src="{{ $avatar->temporaryUrl() }}" width="90"> --}}
            @if(Auth::user()->avatar)
                <img src="{{ asset('storage/'.Auth::user()->avatar) }}" width="90">
            @endif
            <div x-show="uploading">
                <progress max="100" x-bind:value="progress"></progress>
            </div>
        </div>
        <div>
            <x-input-label for="country" :value="__('الدولة')" />
            <x-text-input wire:model="country" id="country" class="block mt-1 w-full" type="text" name="country" />
            <x-input-error :messages="$errors->get('country')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="city" :value="__('المدينة')" />
            <x-text-input wire:model="city" id="city" class="block mt-1 w-full" type="text" name="city" />
            <x-input-error :messages="$errors->get('city')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="profession" :value="__('المهنة')" />
            <x-text-input wire:model="profession" id="profession" class="block mt-1 w-full" type="text"
                name="profession" />
            <x-input-error :messages="$errors->get('profession')" class="mt-2" />
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <x-action-message class="me-3" on="profile-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section>
