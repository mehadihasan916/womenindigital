@extends('layouts.frontend.frontend-layouts')
@section('title', 'Project-Details | Wome-In-Digital')
@push('meta-tag')
<meta property="og:title" content="{{ $project_item->title }} | Wome-In-Digital" />
<meta property="og:description" content="{{ $project_item->short_description }}" />
<meta property="og:url" content="{{ route('project.details', $project_item->id) }}" />
<meta property="og:image" content="{{ asset('uploads/projects/'.$project_item->thumbnail) }}" />
@endpush
@push('page-css')
<link rel="stylesheet" href="{{ asset('assets/frontend/vendor/owl-carousel/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/vendor/owl-carousel/css/owl.theme.default.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/vendor/owl-carousel/css/custom-owl.css') }}">
<style>
  /* Responsive */
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
      <h5><span>Project Details</span></h5>
    </div>
  </div>
  <!-- Page Banner End -->

  <!-- Project Section -->
  <section class="section-bg" id="item-details">
    <div class="container">
      <div class="row">
        <div class="col-xl-8 col-lg-12">
          <div class="card p-3">
            <div class="title-box pt-3">
              <div class="d-flex">
                <i class="bi bi-person"></i>
                <span>By Women In Digital</span>
              </div>
              <div class="d-flex">
                <i class="bi bi-alarm"></i>
                <span>Last Modified : {{ date('F j, Y - g:i a', strtotime($project_item->updated_at)) }}</span>
              </div>
            </div>
            <div class="details-body">
              <h4 class="py-3">{{ $project_item->title }}</h4>
              <img src="{{ asset('uploads/projects/'.$project_item->thumbnail) }}" class="item-thumbnail" alt="{{ Str::words($project_item->title, 3, '[..]') }}-image">
              <h4 class="py-3 border-bottom">Overivew</h4>
              <div class="description">
                <p class="pt-3">{!! $project_item->body !!}</p>
              </div>
              <!-- Go to www.addthis.com/dashboard to customize your tools -->
              <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-61f3833efbf5966c"></script>  
            </div>
          </div>
        </div>
        <div class="col-xl-4 d-none d-xl-block" id="latest-items">
          <h4 class="recent-title">Recent Projects</h4>
          <ul class="m-0 p-0 {{ count($projects) > 5 ? 'latest' : '' }} ">
              @foreach($projects as $project)
              <li class="p-2 card">
                <a href="{{ route('project.details', $project->id) }}" class="d-flex align-items-center">
                  <img src="{{ asset('uploads/projects/'.$project->thumbnail) }}" class="rounded-circle me-2" alt="item-thumbnail">
                  <p class="p-2">{{ Str::words($project->title, 10, '[..]') }}</p>
                </a>
              </li>
              @endforeach
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- Project Section End -->

  <!-- Recent Project -->
  <div id="owl_theam" class="section-bg d-xl-none">
    <div class="container">
      <h4 class="text-center pb-3">Recent Projects</h4>
      <div class="row justify-content-center">
        <div class="col-lg-11">
          <div class="owl_wrap">
            <div class="owl-carousel owl_theam">
              @foreach($projects as $project)
              <a href="{{ route('project.details', $project->id) }}">
                <div class="card d-flex align-items-center">
                  <img src="{{ asset('uploads/projects/'.$project->thumbnail) }}" alt="item-thumbnail" height="150px">
                  <p>{{ Str::words($project->title, 10, '[..]') }}</p>
                </div>
              </a>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Recent-Project End-->
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
