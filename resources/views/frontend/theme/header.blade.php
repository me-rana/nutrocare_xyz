@php
    $company = App\Models\Company::first();
@endphp
<!doctype html>
<html lang="en">
    <head>
        <title>{{ Route::currentRouteName()."-".config('app.name') }}</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
         <!-- Link Swiper's CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>

:root {
    --swiper-theme-color: #000;
}
     .swiper {
      width: 100%;
      height: 100%;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
    }



    .autoplay-progress {
      position: absolute;
      right: 16px;
      bottom: 16px;
      z-index: 10;
      width: 48px;
      height: 48px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      color: var(--swiper-theme-color);
    }

    .autoplay-progress svg {
      --progress: 0;
      position: absolute;
      left: 0;
      top: 0px;
      z-index: 10;
      width: 100%;
      height: 100%;
      stroke-width: 4px;
      stroke: var(--swiper-theme-color);
      fill: none;
      stroke-dashoffset: calc(125.6px * (1 - var(--progress)));
      stroke-dasharray: 125.6;
      transform: rotate(-90deg);
    }

    .li, .li a{
        padding: 20px 10px 20px 10px;
        text-decoration: none;
        color: #ffffff;
    }
    .li:hover{
        background: rgb(255,255,255,0.1);
    }

    
    .link{
        text-decoration: none;
        color: #000000;
    }
    .link:hover{
        background: rgba(82, 3, 102, 0.1);
    }


    @media only screen and (max-width: 599px) {
      .responsive-image{
        height: 220px;
        width: 100%;
      }  
      .banner-responsive{
        height: 240px;
        width: 100%
      }
      .post-image-responsive{
        height: 220px;
        width: 100%;
      }
    }

    @media only screen and (min-width: 600px) {
      .responsive-image{
        height: 360px;
        width: 100%
      }  
      .banner-responsive{
        height: 480px;
        width: 100%;
      }
      .post-image-responsive{
        height: 480px;
        width: 100%;
      }
    }


  </style>
    </head>

    <body>
        <header class="container">
            <!-- place navbar here -->
            @include('frontend.theme.menu')
            
        </header>