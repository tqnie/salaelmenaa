<div>
  

            <!--================= Course Section Start Here =================-->
            <div class="back__course__area pt-120 pb-90">
              <img class="back__shape__1" src="{{asset('assets/images/course/shape/1.png')}}" alt="Shape Image">
              <img class="back__shape__2" src="{{asset('assets/images/course/shape/02.png')}}" alt="Shape Image">
              <div class="container">
                  <div class="back__title__section text-center">
                      <h6 class="back__subtitle"></h6>
                      <h2 class="back__tittle">قسم الفيديو  </h2>
                  </div>
                  <div class="col-md-6 text-right  ">
                   @if($user) <a href="{{route('offer.create',['product'=>$product->id,'type'=>'seller','user'=>$user->id])}}" class="back-btn m-3">اضف فيديو</a>@endif
                    {{-- <a href="{{route('offer.create',[$product->id,'buyer'])}}" class="back-btn">اشتراك مستأجر</a> --}}
          
                </div>
                  <div class="row">
                    @foreach ($offers as $offer) 
                      <div class="col-lg-4">
                          <div class="course__item mb-30">
                              <div class="course__thumb">
                                  <a href="{{$offer->video}}" class=" popup-videos"><img src="{{$offer->image??asset('assets/images/avatar.png')}}" alt="{{$offer->title}}"></a>
                              </div>
                              <div class="course__inner">
                                  <span class="back-category cate-1">@if($offer->product) {{$offer->product->title}}@endif</span>
                                  <h3 class="back-course-title"><a href="{{$offer->video}}" class=" popup-videos">{{$offer->title}}</a></h3>
                                  <div class="course__card-icon d-flex align-items-center">
                                      <div class="course__card-icon--1">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                          <span> {{$offer->views}}+</span>
                                      </div>
                                      <div class="course__card-icon--2">
                                          {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                          <span>4.9</span> --}}
                                      </div>
                                      <div class="back__user">
                                        {{$offer->user->name}}<img src="{{$offer->user->avatar??asset('assets/images/avatar.png')}}" alt="{{$offer->user->name}}">
                                      </div>
                                  </div>
                              </div>                                    
                          </div>
                      </div>
                      @endforeach           
                  </div>
              </div>
          </div>
          <!--================= Course Section End Here =================-->

</div>
