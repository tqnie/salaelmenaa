<div class="back-wrapper">
    <div class="back-wrapper-inner gym-page-wrapper">
        <div class="back-course-filter pb-100 pt-120">
            <div class="container">   
                <div class="back__course__area   back-sidebar">          
                    <div class="row align-items-center back-vertical-middle shorting__course mb-50 ">
                        <div class="col-md-6 back-search">
                            <form action="">
                                <input type="text" name="input" placeholder="بحث...">
                                <button> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg> </button>
                            </form>
                        </div>
                        <div class="col-md-6 text-right  ">
                            <a href="{{route('offer.create',[$product->id,'seller'])}}" class=back-btn">اشتراك تاجر</a>
                            <a href="{{route('offer.create',[$product->id,'buyer'])}}" class="back-btn">اشتراك مشتري</a>
                  
                        </div>
                    </div>
                </div>                                                    
                <div class="row d-flex align-items-end">
                    <div class="col-lg-5">
                        <div class="back__title__section text-left">
                            <h6 class="back__subtitle">{{$product->title}}</h6>
                            <h2 class="back__tittle">    {{$product->body}}     </h2>
                            <h2 class="back__tittle">  ان كنت تبيع هذا المنتج سجل كتاجر وان كنت تريد شراء هذا المنتج سجل كمشتري وتقابل مع التاجر في صفحة مستقلة تحدث اليه بالتواصل المرئي</h2>
                        </div>
                    </div>
                  
                    <div class="col-lg-7 text-right">
                        <div class="back-filter">
                            <button class="active" data-filter="*">الكل</button>
                            <button data-filter=".buyer">تجار</button>
                            <button data-filter=".seller">مشترين</button>
                        </div>
                    </div>
                </div>  
                     
                <div class="row back-grid">     
                  @foreach ($users as $user)
                  <div class="single-studies col-lg-6 grid-item @if($user->seller>0) {{'seller'}} @endif   @if($user->buyer>0) {{'buyer'}} @endif   ">
                    <div class="inner-course">
                        <div class="case-img">
                            <img src="{{$user->avatar}}" alt="Course Image">
                        </div>
                        <div class="case-content">
                            <ul class="meta-course">
                                <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>{{$user->seller+$user->buyer}} </li>
                                <li class="back-book"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg> {{$product->title}}</li>
                            </ul>
                            <h4 class="case-title"> <a href="{{route('offers.user',[$product->slug,$user->id])}}">{{$user->bio}}</a></h4>
                            <div class="back__user">
                                <img src="{{$user->avatar}}" alt="user">{{$user->name}}
                            </div>
                            {{-- <ul class="back-ratings">
                                <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg> 4.9</li>
                            </ul> --}}
                        </div>
                    </div>
                </div> 
                  @endforeach
                                                              
                </div>
            </div>
        </div>
</div>
</div>
