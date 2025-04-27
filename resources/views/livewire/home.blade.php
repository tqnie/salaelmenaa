<div> 
    <!--================= back wrapper Start Here =================-->
    <div class="back-wrapper">
     <div class="back-wrapper-inner gym-page-wrapper">
         <!--================= Slider Section Start =================-->
         <div class="back-slider-part">
             <div class="home-banner-part-use">
                 <div class="single-slide">
                     <div class="slider-img">
                         <img class="desktop" src="{{asset('assets/images/gym/1.jpg')}}" alt="Slider Image 1">
                         <img class="mobile" src="{{asset('assets/images/gym/1.jpg')}}" alt="Slider Image 1">
                     </div>
                     <div class="container">
                         <div class="slider-content">
                             <div class="content-part">
                                 <span class="slider-pretitle">{{setting('slider_subtitle')}}</span>
                                 <h2 class="slider-title">{{setting('slider_title')}}</h2>
                                 <p class="slider-subtitle">
                                    {{setting('slider_desc')}}
                                 </p>
                                 <a href="{{setting('slider_url')}}" class="back-btn">تواصل معنا</a>                                        
                             </div>
                         </div>
                     </div>                        
                 </div>
             </div>
         </div>
         <!--================= Slider Section End Here =================--> 
         <div class="back_popular_topics pt-120 pb-120">
             <div class="container "> 
                 <div class="back__title__section text-center">
                    
                     <p class="">{{setting('section1_desc')}}</h2>
                 </div>                       
                 <div class="back__title__section text-center">
                     <h6 class="back__subtitle">{{setting('section1_subtitle')}}</h6>
                     <h2 class="back__tittle">{{setting('section1_title')}}</h2>
                 </div>                       
                 <div class="back-sidebar">
                    <div class="back__title__section text-center m-5">
                        <div class="col-md-6 back-search">
                            <form wire:submit="products" class="mb-3">
                                <input type="text" wire:model="query" name="input" placeholder="بحث...">
                                <button> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg> </button>
                            </form>
                        </div> 
                    </div>                       
                 </div>                       
                 <div class="row">
                     @foreach ($products as $product)
                     <div class="col-md-3">
                         <div class="item__inner">                                    
                             <div class="icon">
                                 <img src="{{$product->image}}" class="m-auto" style="max-height: 120px" alt="{{$product->title}}">
                             </div>
                             <div class="back-content">
                                 <h3 class="back-title"><a href="{{route('product-users',$product->slug)}}">{{$product->title}}</a></h3>
                                 <p>{{$product->offers->count()}} فيديو </p>
                             </div>                                    
                         </div>
                     </div>
                     @endforeach
                    
                 </div>
             </div>
             <div class="text-center pt-20">
                {{ $products->links(('pagination::bootstrap')) }}
                 {{-- <a href="javascript:void(0)"  class="back-btn-border">تحميل المزيد</a> --}}
             </div>
         </div>

         <div class="back-step__area step__area p-relative pt-120 pb-30">
            <div class="step__shape">
                <img class="step__shape-2" src="{{asset('assets/images/step/shape/dot.png')}}" alt="طريقة جديدة لادارة التجارة الالكترونية">
            </div>
            <div class="container step__width">
                <div class="row">
                    <div class="col-xxl-7 offset-xxl-2 col-xl-7 offset-xl-2 col-lg-7 offset-lg-2">
                       <div class="step__title-content text-center pb-50">
                           <span class="step__pre-title">الخطوات هي :</span>
                           <h2 class="step__title">طريقة جديدة لادارة التجارة الالكترونية</h2>
                       </div>
                    </div>
                    <div class="col-xxl-7 col-xl-7 col-lg-8 col-md-12 col-sm-12">
                        <div class="step__image-area">
                            <img src="{{asset('assets/images/step/image1.png')}}" alt="boy-image">
                        </div>
                    </div>
                    <div class="col-xxl-5 col-xl-5 col-lg-4 col-md-12">
                        <div class="step__content">
                            <div class="step__content1">
                                <div class="step__content1--icon">
                                    <div class="step__content1--icon-1">
                                        <span>01</span>
                                    </div>
                                </div>
                                <div class="step__content1--content">
                                   <h4> للحصول على عملاء</h4>
                                   <p>للحصول على عملاء لمتجرك اشترك في المنتج المعروض <br />الذي تبيع او شارك بمنتجك في منصة سلة الميناء </p>
                                </div>
                            </div>
                            <div class="step__content2">
                                <div class="step__content2--icon">
                                    <div class="step__content2--icon-2">
                                        <span>02</span>
                                    </div>
                                </div>
                                <div class="step__content2--content">
                                   <h4>سيشترك</h4>
                                   <p>سيشترك المشترين <br> في المنتج الذي اخترته
                                   </p>
                                </div>
                            </div>
                            <div class="step__content3">
                                <div class="step__content3--icon">
                                    <div class="step__content3--icon-3">
                                       <span>03</span>
                                    </div>
                                </div>
                                <div class="step__content3--content">
                                    <h4>ادخل على المشتري</h4>
                                    <p>ادخل على المشتري واضف فيديو له واعرض عروضك  <br> عليه باضافة فيديوهات كذلك طرق التواصل بك
                                    </p>
                                </div>
                            </div>
                            <div class="step__content4">
                                <div class="step__content4--icon">
                                    <div class="step__content4--icon-4">
                                        <span>04</span>
                                    </div>
                                </div>
                                <div class="step__content4--content">
                                    <h4>سيتجاوب المشتري</h4>
                                    <p>سيتجاوب المشتري ويضيف فيديو لك <br>ويطلب شراء المنتج منك
                                    </p>
                                </div>
                            </div>
                            <div class="step__content1">
                                <div class="step__content1--icon">
                                    <div class="step__content1--icon-1">
                                        <span>05</span>
                                    </div>
                                </div>
                                <div class="step__content1--content">
                                   <h4>جهز الطلب </h4>
                                   <p>وارسل فاتورة الدفع بالايميل <br />من خلال منصة ميسر
                                   </p>
                                </div>
                            </div>
                            <div class="step__content2">
                                <div class="step__content2--icon">
                                    <div class="step__content2--icon-2">
                                        <span>06</span>
                                    </div>
                                </div>
                                <div class="step__content2--content">
                                   <h4> اشحن الطلب </h4>
                                   <p> للمشتري عبر شركات الشحن <br> مثل سمسا او ارامكس      
                                   </p>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
       
    
     </div>
 </div>
 <!--================= Back Wrapper End Here =================-->
 
</div>