 
<div>
  <!--================= Back Wrapper Start Here =================-->
  <div class="back-wrapper">
   <div class="back-wrapper-inner">
        <div class="back-breadcrumbs back-breadcrumbs-blog-single">
           <div class="breadcrumbs-wrap">
               <img class="desktop" src="{{asset('assets/images/breadcrumbs/3.jpg')}}" alt="Breadcrumbs">
               <img class="mobile" src="{{asset('assets/images/breadcrumbs/33.jpg')}}" alt="Breadcrumbs">
               <div class="breadcrumbs-inner">
                   <div class="container">
                       <div class="breadcrumbs-text">
                           <span> </span>
                           <h1 class="breadcrumbs-title">{{ $page->title }}</h1>
                           <div class="back-nav pt-20">
                               <ul>
                                   <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg> {{$page->created_at}}</li>
                                </ul>
                           </div>
                       </div>
                   </div>
               </div>
           </div>                
       </div>
       <!--================= Back Breadcrumbs Section End Here =================-->

       <!--================= Blog Single Start Here =================-->
       <div class="back__blog__area back-blog-page-single pt-120 pb-120">
           <div class="container">
               <div class="row">
                   <div class="col-lg-12">
                       <div class="blog-single-inner">
                           <div class="blog-content">
                               <div class="blog-image">
                                   <img src="{{$page->image}}" alt="{{$page->title}}">
                               </div>

                               {!! $page->body !!}

                             
                              
                           </div>
                       </div>                          
                   </div>                            
               </div>
           </div>
       </div>

   </div>
</div>


   </div>
