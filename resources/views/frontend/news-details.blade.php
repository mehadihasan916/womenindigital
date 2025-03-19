@extends('layouts.frontend.frontend-layouts')
@section('title', 'News-Details | Wome-In-Digital')
@push('meta-tag')
<meta property="og:title" content="{{ $news_item->title }} | Wome-In-Digital" />
<meta property="og:description" content="{{ Str::words($news_item->short_description, 10, '[..]') }}" />
<meta property="og:url" content="{{ route('news.details', $news_item->id) }}" />
<meta property="og:image" content="{{ asset('uploads/news/'.$news_item->thumbnail) }}" />
@endpush
@push('page-css')
<link rel="stylesheet" href="{{ asset('assets/frontend/vendor/owl-carousel/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/vendor/owl-carousel/css/owl.theme.default.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/vendor/owl-carousel/css/custom-owl.css') }}">
<style>
  /* Owl Carousel */
  @media only screen and (min-width: 576px) and (max-width: 767.98px) {  
  }
  @media only screen and (min-width: 450px) and (max-width: 575.98px) { 
  }
  @media only screen and (min-width: 310px) and (max-width: 449.98px) { 
  }
</style>
@endpush
@section('page-content')

  <!-- Page Banner  -->
  <div id="page-banner" style="background-image: url({{ asset('assets/frontend/img/page-banner/team-banner.png') }});">
    <div class="container">
      <h5><span>News</span></h5>
      <h3>{{ $news_item->title }}</h3>
    </div>
  </div>
  <!-- Page Banner End -->

  <!-- News Section -->
  <section class="section-bg" id="item-details">
    <div class="container">
      <div class="row">
        <div class="col-xl-9 col-lg-12">
          <div class="card p-3">
            <div class="title-box pt-3">
              <div class="d-flex">
                <i class="bi bi-person"></i>
                <span>By Women In Digital</span>
              </div>
              <div class="d-flex">
                <i class="bi bi-alarm"></i>
                <span>Last Modified : {{ date('F j, Y - g:i a', strtotime($news_item->updated_at)) }}</span>
              </div>
            </div>
            <div class="details-body">
              <h4 class="py-3">{{ $news_item->title }}</h4>
              <img src="{{ asset('uploads/news/'.$news_item->thumbnail) }}" class="item-thumbnail" alt="{{ Str::words($news_item->title, 3, '[..]') }}-img">
              <h4 class="py-3 border-bottom">Overivew</h4>
              <div class="description">
                <p class="pt-3">{!! $news_item->body !!}</p>
              </div>
              <!-- Go to www.addthis.com/dashboard to customize your tools -->
              <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-61f3833efbf5966c"></script>  
            </div>
          </div>
        </div>
        <div class="col-xl-3 d-none d-xl-block" id="latest-items">
          <h4 class="recent-title">Recent News</h4>
          <ul class="m-0 p-0 {{ count($newses) > 5 ? 'latest' : '' }} ">
              @foreach($newses as $news)
              <li class="p-2 card">
                <a href="{{ route('news.details', $news->id) }}" class="d-flex align-items-center">
                  <img src="{{ asset('uploads/news/'.$news->thumbnail) }}" class="rounded-circle me-2" alt="{{ Str::words($news->title, 3, '[..]') }}-image">
                  <p>{{ Str::words($news->title, 10, '[..]') }}</p>
                </a>
              </li>
              @endforeach
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- News Section End -->

  <!-- Recent News -->
  <div id="owl_theam" class="section-bg d-xl-none">
    <div class="container">
      <h4 class="text-center pb-3">Recent News</h4>
      <div class="row justify-content-center">
        <div class="col-lg-11">
          <div class="owl_wrap">
            <div class="owl-carousel owl_theam">
              @foreach($newses as $news)
              <a href="{{ route('news.details', $news->id) }}">
                <div class="card d-flex align-items-center">
                  <img src="{{ asset('uploads/news/'.$news->thumbnail) }}" alt="{{ Str::words($news->title, 3, '[..]') }}-image">
                  <p class="p-2">{{ Str::words($news->title, 10, '[..]') }}</p>
                </div>
              </a>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Recent-News End-->

@endsection
@push('page-js')
<script src="{{ asset('assets/frontend/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>
<script>
  /**
   * owl carouse for blog, story, event
   */
  $('.owl_theam').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
      0:{
          items:1,
          nav:false
      },
      400:{
          items:2,
          nav:false
      },
      800:{
          items:3,
          nav:false
      },
      1000:{
          items:3,
          nav:true,
          loop:false
      }
      }
    });
</script>
@endpush
