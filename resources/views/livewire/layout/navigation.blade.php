<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: false);
    }
}; ?>
  <header id="back-header" class="back-header back-header-three">
    <div class="menu-part">
        <div class="container">
             <div class="back-main-menu">
                <nav>
                     <div class="menu-toggle">
                        <div class="logo">
                            <a href="{{ route('home') }}" class="logo-text"> 
                                <x-application-logo   />
                            </a>
                        </div>
                        <button type="button" id="menu-btn">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div> 
                    <!--================= Menu Structure =================--> 
                    <div class="back-inner-menus">
                        <ul id="backmenu" class="back-menus back-sub-shadow">
                            <li class="mega-inner"><a href="#">الرئيسية</a></li>
                            <li> <a href="{{route('profile')}}">حسابي</a></li>                                                                   
                             <li> <a href="{{route('posts.index')}}">المدونة</a></li>
                            <li> <a href="{{route('page.show','contact-us')}}">اتصل بنا</a></li>
                        </ul>                                
                        <div class="searchbar-part">
                            @auth
                                <button wire:click="logout"  >تسجيل خروج</button>
                                <a href="{{route('profile')}}" class="back-btn">الملف الشخصي</a>

                            @else
                                <div class="back-login">
                                    <a href="{{route('login')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-unlock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 9.9-1"></path></svg>
                                    تسجيل دخول</a>
                                </div>
                                <a href="{{route('home')}}"  class="back-btn">اشتراك</a>
                            @endauth
                        </div>
                    </div>
                </nav>
            </div>
         </div>
    </div>
</header>
 