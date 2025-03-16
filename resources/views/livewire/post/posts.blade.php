<div>
    {{-- sHn*/)CQ8?}%je>% --}}
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
                                <h1 class="breadcrumbs-title">المقالات</h1>
                                <div class="back-nav pt-20">
                                    <ul>
                                        <li><a href="{{route('home')}}">الرئيسية</a></li>
                                        <li>المقالات</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
            <!--================= Blog Section Start Here =================-->
            <div class="back__blog__area back-blog-page pt-120 pb-115">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="blog-grid">
                                @foreach ($posts as $post)
                                <div class="single-blog">
                                    <div class="inner-blog">
                                        <div class="blog-img">
                                            <img src="{{ $post->image }}" alt="{{ $post->title }}">
                                        </div>
                                        <div class="blog-content">
                                            <ul class="top-part">
                                                <li>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> عام
                                                </li>
                                                <li class="date-part">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg> {{ $post->updated_at->ago() }}
                                                </li>
                                                 
                                            </ul>

                                            <h3 class="blog-title"><a href="{{ route('posts.show', $post->slug) }}"> {{ $post->title }}</a></h3>
                                            <p class="blog-desc"> ... </p>
                                            <a href="{{ route('posts.show', $post->slug) }}" class="back-btn-border">المزيد <i class="arrow_right"></i></a>
                                        </div>
                                    </div>
                                </div>
                               @endforeach
                            </div> 
                            <!--================= Pagination Section End Here =================-->
                            {{ $posts->links('livewire::bootstrap') }}
                            <!--================= Pagination Section End Here =================-->  
                        </div>
                        <div class="col-lg-4">
                            <div class="back-sidebar pl-30 md-pl-0">
                                <div class="widget back-blog-search">
                                    <h3 class="widget-title">البحث</h3>
                                    <form action="{{ route('posts.index') }}" method="GET">
                                        <input type="text" name="search" wire:model.live="search"  value="{{old('search')}}"  placeholder="بحث عن مقال">
                                        <button> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg> </button>
                                    </form>
                                </div>
                                <div class="widget back-recent-post">
                                    <h3 class="widget-title">مقالات هامة</h3>
                                    <ul class="recent-posts">
                                        
                                        @foreach (\App\Models\Post::limit(5)->get() as $itemPost)
                                        <li>
                                            <a href="{{ route('posts.show', $itemPost->slug) }}"><span class="post-images"><img src="{{ asset('storage/' . $itemPost->image) }}"
                                                alt="{{ $itemPost->title }}"></span></a>
                                            <div class="titles">
                                                <h4><a href="{{ route('posts.show', $itemPost->slug) }}">{{ $itemPost->title }}</a></h4>
                                                <span>{{ $post->updated_at->ago() }}</span>
                                            </div>                                                
                                        </li>  
                                        
                                    @endforeach
                                                                                  
                                    </ul>
                                </div> 

                                <div class="widget">
                                    <h3 class="widget-title">الاقسام</h3>
                                    <ul class="recent-category">
                                        <li> <a href="#">عام <span class="category-count">مقال {{$posts->count()}}</span></a></li>
                                    </ul>
                                </div>
                                 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--================= Blog Section End Here =================-->

        </div>
    </div>
    
</div>
