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
  <!-- Category Section Started -->
  <div class="bg-dark text-white" style="width: 100dvw">
    <ul class="d-flex container ul" style="overflow-x: auto">
        <li class="d-inline-block li"><a href="{{ url('/') }}">All</a></li>
      @foreach ($categories as $category)
        <li class="d-inline-block li"><a href="{{ url("category/".$category->slug) }}">{{ $category->category_name }}</a></li>
      @endforeach         
    </ul>
  </div>

  <!-- Blog Post Stared -->
  <div class="container">
    <div class="row">
     @foreach ($posts as $post)
      <div class="col-sm-12 col-6 col-md-4 pt-4">
        <a href="{{ url("post/".$post->getcategory->slug.'/'.$post->slug) }}">
        <div class="card">
        <a href="{{ url("post/".$post->getcategory->slug.'/'.$post->slug) }}">
            <img src="{{ asset($post->image) }}" style="height: 100%" class="responsive-image" alt="" srcset="">
        </a>
        <div class="container">
          <a href="{{ url("category/".$post->getcategory->slug) }}">
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
    

    </div><!-- Row -->
  </div><!--Container -->

  @if (Session::get('post') != null && $read_posts->count() > 0)
      <!-- Blog Post Stared -->
  <div class="container pt-5">
    <h3 class="text-center text-uppercase"><strong>Recently Viewed</strong></h3>
    <div class="row">
     @foreach ($read_posts as $post)
      <div class="col-sm-12 col-6 col-md-4 pt-4">
        <a href="{{ url("post/".$post->getcategory->slug.'/'.$post->slug) }}">
        <div class="card">
        <a href="{{ url("post/".$post->getcategory->slug.'/'.$post->slug) }}">
            <img src="{{ asset($post->image) }}" style="height: 100%" class="responsive-image" alt="" srcset="">
        </a>
        <div class="container">
          <a href="{{ url("category/".$post->getcategory->slug) }}">
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