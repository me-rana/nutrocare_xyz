@extends('frontend.theme.main')
@section('content-section')
<main>
    <!-- Swiper -->
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        @foreach ($banners as $banner)
              <div class="swiper-slide banner-responsive"><img src="{{ asset($banner->image) }}" style="height: 100%; width: 100%" alt="" srcset=""></div>
        @endforeach
  
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
      <div class="autoplay-progress">
        <svg viewBox="0 0 48 48">
          <circle cx="24" cy="24" r="20"></circle>
        </svg>
        <span></span>
      </div>
    </div>
  
    <!-- Catgeory Menu Stared -->
    <div class="bg-dark text-white" style="width: 100dvw">
      <ul class="d-flex container ul" style="overflow-x: auto">
          <li class="d-inline-block li"><a href="{{ url('/') }}">All</a></li>
        @foreach ($categories as $category)
          <li class="d-inline-block li"><a href="{{ url($category->slug) }}">{{ $category->category_name }}</a></li>
        @endforeach         
      </ul>
    </div>
  
    <!-- Page Section Started -->
    <div class="container pt-5">
          <div class="row">
              <div class="col-md-3">
                <h6 class="text-uppercase text-decoration-underline"><strong>Recent Posts</strong></h6>
                @foreach ($recent_posts as $post)
                <div class="d-flex align-items-center" style="width: 90%">
                  <a href="{{ url($post->getcategory->slug."/".$post->slug) }}">
                    <img src="{{ asset($post->image) }}" alt="" height="50px" width="70px" class="d-inline-block">
                  </a>
                  <div class="d-inline-block ps-2">
                    <p style="color: rgb(0,0,0,0.5)"><i class="fa-solid fa-calendar-days"></i> {{ date_format($post->created_at,"M d, Y") }} <span class="ps-2"><i class="fa-solid fa-icons"></i> {{ $post->getcategory->category_name }}</span></p>
                    <a href="{{ url($post->getcategory->slug."/".$post->slug) }}" class="link">
                    <h6 style="margin-top: -15px">{{ $post->title }}</h6>
                    </a>
                  </div>
                </div>
                @endforeach


                <h6 class="text-uppercase text-decoration-underline pt-3"><strong>Related Posts</strong></h6>
                @foreach ($related_posts as $post)
                <div class="d-flex align-items-center" style="width: 90%">
                  <a href="{{ url($post->getcategory->slug."/".$post->slug) }}">
                    <img src="{{ asset($post->image) }}" alt="" height="50px" width="70px" class="d-inline-block">
                  </a>
                  <div class="d-inline-block ps-2">
                    <p style="color: rgb(0,0,0,0.5)"><i class="fa-solid fa-calendar-days"></i> {{ date_format($post->created_at,"M d, Y") }} <span class="ps-2"><i class="fa-solid fa-icons"></i> {{ $post->getcategory->category_name }}</span></p>
                    <a href="{{ url($post->getcategory->slug."/".$post->slug) }}" class="link">
                    <h6 style="margin-top: -15px">{{ $post->title }}</h6>
                    </a>
                  </div>
                </div>
                @endforeach
              </div>




              <div class="col-md-9">
                <img src="{{ asset($post->image) }}" class="post-image-responsive" />
                <p style="color: rgb(0,0,0,0.5); margin-top: 10px;"><i class="fa-solid fa-calendar-days"></i> {{ date_format($post->created_at,"M d, Y") }} <span class="ps-2"><i class="fa-solid fa-icons"></i> {{ $post->getcategory->category_name }}</span></p>
                <h1 class="text-uppercase"><strong>{{ $post->title }}</strong></h1>
                {!! $post->description !!}
              </div>
          </div>
    </div><!--Container -->

    
  @if (Session::get('post') != null && $read_posts->count() > 0)
      <!-- Blog Post Stared -->
  <div class="container pt-5">
    <h3 class="text-center text-uppercase"><strong>Recently Viewed</strong></h3>
    <div class="row">
     @foreach ($read_posts as $post)
      <div class="col-sm-12 col-6 col-md-4 pt-4">
        <a href="{{ url($post->getcategory->slug.'/'.$post->slug) }}">
        <div class="card">
        <a href="{{ url($post->getcategory->slug.'/'.$post->slug) }}">
            <img src="{{ asset($post->image) }}" style="height: 100%" class="responsive-image" alt="" srcset="">
        </a>
        <div class="container">
          <a href="{{ url($post->getcategory->slug) }}">
          <p style="color: rgb(0,0,0,0.5)" class="text-center text-uppercase pt-2">Beauty</p>
          </a>
          <h5 class="text-center text-dark">
            {{ Str::limit($post->title, 25, '...') }}
          </h5>
        </div>
      </div>
      </a>
    </div>
    @endforeach
    </div>
  </div>
  @endif

  </main>
@endsection
        