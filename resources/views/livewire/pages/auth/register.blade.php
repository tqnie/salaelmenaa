<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.app')] class extends Component

{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);
        $users =  User::where('ip',request()->ip())->where('role_id',4)->get();
        if($users->count() > 0 ||  str_contains($validated['email'], 'mailmaxy.one')){
            $validated['role_id']=4;
        }else{
            $validated['role_id']=1;
        }
        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(route('home', absolute: false), navigate: false);
    }
}; ?>

<div>
    <div class="back-wrapper">
        <div class="back-wrapper-inner">
            <div class="back-login-page back-signup-page pt-120 pb-120">
                <div class="container">
                    <div class="row align-center">
                        <div class="col-lg-6">
                            <div class="login-left-content">
                                <h1>انشاء حساب<br>مجاني.</h1>
                                <p>اشترك واحصل علي مساحة جديد لاعلاناتك.</p>
                                <img src="{{asset('assets/images/login/2.png')}}" alt="login">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="login-right-form">
                                <form wire:submit="register">
                                    
                                    <span class="back-or"> ........ تسجيل مستخدم جديد........ </span>
                                    <p>
                                        <x-input-label for="name" :value="__('Name')" />
                                        <x-text-input wire:model="name" id="name"  type="text" name="name" required autofocus autocomplete="name" />
                                        <x-input-error :messages="$errors->get('name')"  />
                                    </p>
                                    <p>
                                        <x-input-label for="email" :value="__('Email')" />
                                        <x-text-input wire:model="email" id="email"  type="email" name="email" required autocomplete="username" />
                                        <x-input-error :messages="$errors->get('email')"  />
                                    </p>
                                    <p>
                                        <x-input-label for="password" :value="__('Password')" />
                                        <x-text-input wire:model="password" id="password" 
                                                        type="password"
                                                        name="password"
                                                        required autocomplete="new-password" />

                                        <x-input-error :messages="$errors->get('password')"  />
                                    </p>
                                    <p>
                                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                                        <x-text-input wire:model="password_confirmation" id="password_confirmation" 
                                                        type="password"
                                                        name="password_confirmation" required autocomplete="new-password" />
                            
                                        <x-input-error :messages="$errors->get('password_confirmation')"  />
                                    </p>
                                    
                                    <x-primary-button  >
                                        {{ __('Register') }}
                                    </x-primary-button>
                                     <em class="signup">اذا كنت تمتلك حساب ? <a href="{{ route('login') }}">سجل دخول</a></em>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     
</div>
