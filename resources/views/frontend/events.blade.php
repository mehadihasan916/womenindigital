@extends('layouts.frontend.frontend-layouts')
@section('title', 'Events | Wome-In-Digital')
@push('meta-tag')
<meta property="og:title" content="Event | Wome-In-Digital" />
<meta property="og:description" content="Empowering-women | Women-in-Digital | Female-technologists  | Bringing-more-women | Women-in-Technology | Digital-Bangladesh | Digital Women | Tech Women | Women-Hackathon | Innovation-challenge | Career-Counselling | Women engineer" />
<meta property="og:url" content="{{ route('events') }}" />
<meta property="og:image" content="{{ asset('assets/application-default/seo-image/wid-logo-t.jpg') }}" />
@endpush
@push('page-css')
<style>
  /* Load More Button Css */
  .load-col{
    display: none;
    padding-bottom: 25px;
  }
  .event-card img{
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 5px;
  }
  .event-body {
    background: white;
    margin-left: 20px;
    margin-right: 20px;
    margin-bottom: 20px;
    margin-top: -60px;
    position: relative;
    /* height: 415px; */
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
  }
</style>
@endpush
@section('page-content')

  <!-- Page Banner  -->
  <div id="page-banner" style="background-image: url({{ asset('assets/frontend/img/page-banner/team-banner.png') }});">
    <div class="container">
      <h5><span>Event</span></h5>
      <h3>Learn <br>
        Share</h3>
      <p>To achieve great things, two things are needed: a plan and not quite enough time</p>
    </div>
  </div>
  <!-- Page Banner End -->

  <!-- All Events -->
  <section class="section-bg">
    <div class="container">
      @if($events->isNotEmpty())
      <div class="row justify-content-center justify-content-md-start">
        @foreach($events as $event)
        <div class="col-12 col-sm-10 col-md-6 col-lg-6 col-xl-4 load-col">
          <div class="event-card">
            <img src="{{ asset('uploads/events/'.$event->thumbnail) }}" alt="{{ Str::words($event->title, 5, '[..]') }}-image" class="img-fluid">
            <div class="event-body">
              <h6>{{ date('l, jS \of F Y', strtotime($event->date)) }}</h6>
              <h5 class="pt-3 pb-2">{{ Str::words($event->title, 10, '...') }}</h5>
              <p>{{ Str::words($event->short_description, 30, '...') }} <a href="{{ route('event.details', $event->id) }}" class="text-nowrap read-more">Read More <span><i class="ri-arrow-right-s-line"></i><i class="ri-arrow-right-s-line"></i></span></a></p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="text-center">
        <button type="button" class="btn load-btn primary-btn text-uppercase">Browse More</button>
      </div>
      @else
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="alert alert-danger text-center" role="alert">
            <strong>No Event Available</strong>
          </div>
        </div>
      </div>
      @endif
    </div>
  </section>
  <!-- All Events End -->
@endsection
@push('page-js')
<!-- Load More Button Js-->
<script>
  $(".load-col").slice(0, 12).show()
  $(".load-btn").on("click", function(){
    $(".load-col:hidden").slice(0,4).slideDown()
    if($(".load-col:hidden").length == 0){
    $(".load-btn").fadeOut('slow')
    }
  });
</script>
@endpush
