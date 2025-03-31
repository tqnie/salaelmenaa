<div>
 
   <!--================= back wrapper Start Here =================-->
   <div class="back-wrapper">
    <div class="back-wrapper-inner">
        <!--================= Back Breadcrumbs Section Start Here =================-->
        <div class="back-breadcrumbs">
            <div class="breadcrumbs-wrap">
                <img class="desktop" src="{{asset('assets/images/breadcrumbs/1.jpg')}}" alt="Breadcrumbs">
                <img class="mobile" src="{{asset('assets/images/breadcrumbs/1.jpg')}}" alt="Breadcrumbs">
                <div class="breadcrumbs-inner">
                    <div class="container">
                        <div class="breadcrumbs-text">
                            <h1 class="breadcrumbs-title"> اضف فيديو </h1>
                            <div class="back-nav">
                                <ul>
                                    <li><a href="{{route('home')}}">الرئيسية</a></li>
                                    <li>اشترك الان في {{$productDetials->title}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                
        </div>
        
        <div id="back-contact" class="back-contact-page pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!--================= Form Section Start Here =================-->
                       
                        <!--================= Form Section End Here =================-->
 
                        <!--================= Form Section Start Here =================-->
                        <div class="back-blog-form">  
                            <div class="back-title-sec">
                                <h2>وقم بالاشتراك في  {{$productDetials->title}}</h2>
                            </div> 
                            <div class="row pt-50"> 
                               
                                <div class="col-lg-12">
                                    <div id="blog-form" class="blog-form">
                                        <x-auth-session-status class="mb-4" :status="session('status')" />
                                        
                                        <form wire:submit="addOffer"   enctype="multipart/form-data" id="contact-form" >                                                    
                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <div class="back-input">
                                                        <x-input-label for="title" :value="__('العنوان')" />
                                                        <x-text-input wire:model="offerForm.title" id="title" placeholder="العنوان" type="text"
                                                            name="title" required />
                                                        <x-input-error :messages="$errors->get('offerForm.title')" class="mt-2" />
                                                     </div>
                                                </div>

                                                <div class="col-lg-6 pdl-5">
                                                    <div class="back-input">
                                                        <x-input-label for="type" :value="__('القسم')" />
                                                        <select wire:model="offerForm.type" class="from-control" id="type" placeholder="القسم" 
                                                            name="type">
                                                            <option @selected(old('offerForm.type',$type)=='seller') value="seller">بائع</option>
                                                            <option @selected(old('offerForm.type',$type)=='buyer')  value="buyer">مشتري</option>
                                                        </select>
                                                        <x-input-error :messages="$errors->get('offerForm.type')" class="mt-2" />               
                                                    </div>
                                                </div>
                                                
                                                

                                                <div class="col-lg-12">
                                                    <div class="back-textarea">
                                                        <x-input-label for="body" :value="__('محتوي الاعلان')" />
                                                        <x-textarea-input wire:model="offerForm.body" id="body" type="text"
                                                            name="body" required />
                                                        <x-input-error :messages="$errors->get('offerForm.body')" class="mt-2" />
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div   x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
                                                    x-on:livewire-upload-finish="uploading = false"
                                                    x-on:livewire-upload-cancel="uploading = false"
                                                    x-on:livewire-upload-error="uploading = false"
                                                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                                                        <x-input-label for="views" :value="__('صورة')" />
                                                      
                                                        <x-input-error :messages="$errors->get('offerForm.image')" class="mt-2" />
                                                            <div x-show="uploading">
                                                                <progress max="100" x-bind:value="progress"></progress>
                                                            </div>
                                                    </div>
                                                    <x-text-input wire:model="offerForm.image" id="image" type="file"
                                                    name="image" />
                                                </div>                                               
                                                <div class="col-lg-12">
                                                    <div   x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
                                                    x-on:livewire-upload-finish="uploading = false"
                                                    x-on:livewire-upload-cancel="uploading = false"
                                                    x-on:livewire-upload-error="uploading = false"
                                                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                                                        <x-input-label for="views" :value="__('فيديو')" />
                                                        <x-text-input wire:model="offerForm.video" id="video" type="file"
                                                            name="video" />
                                                       
                                                            <div x-show="uploading">
                                                                <progress max="100" x-bind:value="progress"></progress>
                                                            </div>
                                                    </div>
                                                    <x-input-error :messages="$errors->get('offerForm.video')" class="mt-2" />
                                                </div>   
                                                @if($offerForm->type=='seller' && $subscription=null) 
                                                    <div class="col-lg-12 pdl-5">
                                                        <div class="back-input">
                                                            <x-input-label for="package" :value="__('نوع الاشتراك')" />
                                                            <select wire:model="package" class="from-control" id="package" placeholder="الباقة" 
                                                                name="package">
                                                                @foreach(App\Models\Package::get() as $package)
                                                                    <option @selected(old('package')==$package->id) value="{{$package->id}}">{{$package->title}}</option>
                                                                @endforeach 
                                                            </select>
                                                            <x-input-error :messages="$errors->get('package')" class="mt-2" />               
                                                        </div>
                                                    </div> 
                                                    @else 
                                                     
                                                @endif                                           
                                                <div class="col-lg-12">      
                                                    <x-primary-button >
                                                        {{ __('اضافة ') }}
                                                    </x-primary-button>       
                                                </div>
                                            </div>                                                    
                                        </form>
                                    </div>
                                </div>
                            </div>                                      
                        </div>
                        <!--================= Form Section End Here =================-->
 
                    </div>
                </div>        
            </div>
        </div>
    </div>
</div>
 
</div>
