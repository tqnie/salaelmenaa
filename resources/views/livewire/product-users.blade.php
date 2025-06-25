<div class="back-wrapper">
    <div class="back-wrapper-inner gym-page-wrapper">
        <div class="back-course-filter pb-100 pt-120">
            <div class="container">   <h3 class="back__subtitle  text-center">{{setting('section2_desc')}}</h3></div>

            <div class="container">   
                <div class="back__course__area   back-sidebar">          
                    <div class="row align-items-center back-vertical-middle shorting__course mb-50 ">
                        <div class="col-md-6 back-search">
                            <form action=""  class="mb-3">
                                <input type="text" name="input" placeholder="بحث...">
                                <button> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg> </button>
                            </form>
                        </div>
                        <div class="col-md-6 text-right  ">
                            <a href="javascript:void(0)" wire:click="subscripProduct('seller')" class="back-btn">اشتراك مؤجر</a>
                            <a href="javascript:void(0)" wire:click="subscripProduct('buyer')" class="back-btn">اشتراك مستأجر</a>
                  
                        </div>
                    </div>
                </div>                                                    
                <div class="row d-flex align-items-end">
                    <div class="col-lg-2">
                        <div class="  m-img">
                            <img class="" src="{{$product->image}}" style="max-height: 120px;" alt="{{$product->title}}">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="back__title__section " style="text-align: right">
                            <h6 class="back__subtitle">{{$product->title}}</h6>
                            <h2 class="back__tittle" style="margin-bottom: 20px">{{$product->body}}</h2>
                        </div>
                    </div>
                  
                    <div class="col-lg-5 text-right">
                        <div class="back-filter">
                            <button class="active" data-filter="*">الكل</button>
                            <button data-filter=".seller">تجار</button>
                            <button data-filter=".buyer">مستأجرين</button>
                        </div>
                    </div>
                </div>  
                     
                <div class="row back-grid">     
                  @foreach ($users as $user)
                  <div class="single-studies col-lg-6 grid-item {{$user->productUser->type}}">
                    <div class="inner-course">
                        <div class="case-img">
                            <img src="{{$user->avatar}}" alt="{{$user->name}}">
                        </div>
                        <div class="case-content">
                            <ul class="meta-course">
                                <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>{{$user->seller+$user->buyer}} </li>
                                <li class="back-book"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg> {{$product->title}}</li>
                            </ul>
                            <h4 class="case-title"> <a href="{{route('offers.user',[$product->slug,$user->productUser->type,$user->id])}}">{{$user->bio}}</a></h4>
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
