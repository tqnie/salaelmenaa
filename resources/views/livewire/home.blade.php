<x-app-layout>
    <!--================= back wrapper Start Here =================-->
    <div class="back-wrapper">
     <div class="back-wrapper-inner gym-page-wrapper">
         <!--================= Slider Section Start =================-->
         <div class="back-slider-part">
             <div class="home-banner-part-use">
                 <div class="single-slide">
                     <div class="slider-img">
                         <img class="desktop" src="{{asset('assets/images/gym/1.jpg')}}" alt="Slider Image 1">
                         <img class="mobile" src="{{asset('assets/images/gym/11.jpg')}}" alt="Slider Image 1">
                     </div>
                     <div class="container">
                         <div class="slider-content">
                             <div class="content-part">
                                 <span class="slider-pretitle">سلة بورت</span>
                                 <h2 class="slider-title">
                                    اذا لديك مقترح  <br> بخصوص منتجات جديدة.
                                 </h2>
                                 <p class="slider-subtitle">
                                    لم يسبق ان عرضت فارجاء التواصل معنا<br>لنشر المنتجات .
                                 </p>
                                 <a href="{{route('page.show','contact-us')}}" class="back-btn">تواصل معنا</a>                                        
                             </div>
                         </div>
                     </div>                        
                 </div>
             </div>
         </div>
         <!--================= Slider Section End Here =================--> 
         <div class="back_popular_topics pt-120 pb-120">
             <div class="container"> 
                 <div class="back__title__section text-center">
                     <h6 class="back__subtitle">المنتجات</h6>
                     <h2 class="back__tittle"> احصائيات المنتجات </h2>
                 </div>                       
                 <div class="back__title__section text-center">
                    <form wire:submit="search">
                        <input type="text" wire:model="query">
                 
                        <button type="submit">بحث عن منتج</button>
                    </form>
                 </div>                       
                 <div class="row">
                     @foreach ($products as $product)
                     <div class="col-md-3">
                         <div class="item__inner">                                    
                             <div class="icon">
                                 <img src="{{$product->image}}" alt="{{$product->title}}">
                             </div>
                             <div class="back-content">
                                 <h3 class="back-title"><a href="{{route('product-users',$product->slug)}}">{{$product->title}}</a></h3>
                                 <p>{{$product->offers->count()}} تاجر </p>
                             </div>                                    
                         </div>
                     </div>
                     @endforeach
                    
                 </div>
             </div>
             <div class="text-center pt-20">
                {{ $posts->links() }}
                 {{-- <a href="javascript:void(0)"  class="back-btn-border">تحميل المزيد</a> --}}
             </div>
         </div>

       
       
    
     </div>
 </div>
 <!--================= Back Wrapper End Here =================-->

</x-app-layout>
