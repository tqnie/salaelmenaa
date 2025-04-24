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
                {{ $products->links(('pagination::simple-bootstrap-5')) }}
                 {{-- <a href="javascript:void(0)"  class="back-btn-border">تحميل المزيد</a> --}}
             </div>
         </div>

       
       
    
     </div>
 </div>
 <!--================= Back Wrapper End Here =================-->
 
</div>