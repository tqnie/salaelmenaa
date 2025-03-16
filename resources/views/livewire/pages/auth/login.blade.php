<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.app')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('home', absolute: false), navigate: false);
    }
}; ?>

<div>


    <!-- Session Status -->
 
   <div class="back-wrapper">
            <div class="back-wrapper-inner">
                <div class="back-login-page pt-120 pb-120">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="login-left-content">
                                    <h1>سجل دخول <br>تمتع بالكثير من الفيديوهات الدعائية.</h1>
                                    <p>سجل الان اذا لم يكن لديك حساب <a href="{{route('register')}}">اشترك</a></p>
                                    <img src="{{asset('assets/images/login/2.png')}}" alt="login">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="login-right-form">
                                    <form wire:submit="login">
                                        
                                        <span class="back-or"> ........ سجل بواسطة البريد الالكتروني و كلمة المرور ........ </span>
                                        <x-auth-session-status class="mb-4" :status="session('status')" />
                                        <p>
                                            <x-input-label for="email" :value="__('Email')" />
                                            <x-text-input wire:model="form.email" id="email"   type="email" name="email" required autofocus autocomplete="username" />
                                            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
                                           </p>
                                        <p>
                                            <x-input-label for="password" :value="__('Password')" />

                                            <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full"
                                                            type="password"
                                                            name="password"
                                                            required autocomplete="current-password" />
                                
                                            <x-input-error :messages="$errors->get('form.password')" class="mt-2" /> 

                                        </p>
                                        <div class="back-check-box">
                                            <input type="checkbox" wire:model="form.remember" id="box-1"> تذكرني
                                            @if (Route::has('password.request'))
                                                <a  href="{{ route('password.request') }}" wire:navigate>
                                                    {{ __('Forgot your password?') }}
                                                </a>
                                            @endif
                                        </div> 
                        
                                        <x-primary-button class="ms-3">
                                            {{ __('Log in') }}
                                        </x-primary-button> 
                                        <em class="signup">اذا لم يكن لديك حساب  <a href="{{route('register')}}">اشتراك جديد</a></em>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  
</div>
