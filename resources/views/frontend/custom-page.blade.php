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
    <div class="container">
          <div class="card px-5 py-5">
              <h3 class="text-center text-uppercase text-decoration-underline"><strong>{{ $pageInfo->name }}</strong></h3>
              {!! $pageInfo->description !!}
          </div>
    </div><!--Container -->
  
  </main>
@endsection
        