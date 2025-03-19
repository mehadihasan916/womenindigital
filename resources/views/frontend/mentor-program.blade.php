@extends('layouts.frontend.frontend-layouts')
@section('title', 'Mentors | Wome-In-Digital')
@push('meta-tag')
<meta property="og:title" content="Mentor-Programs | Wome-In-Digital" />
<meta property="og:description" content="Empowering-women | Women-in-Digital | Female-technologists  | Bringing-more-women | Women-in-Technology | Digital-Bangladesh | Digital Women | Tech Women | Women-Hackathon | Innovation-challenge | Career-Counselling | Women engineer" />
<meta property="og:url" content="{{ route('mentor.program') }}" />
<meta property="og:image" content="{{ asset('assets/application-default/seo-image/wid-logo-t.jpg') }}" />
@endpush
@push('page-css')
<style>
  .mentor-program .card{
    height: 100%;
    box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
  }
  .mentor-program .card img{
    height: 250px;
    object-fit: cover;
  }
  /* Load More Button Css */
  .load-col{
    display: none;
    padding-bottom: 25px;
  }
  /* Responsive */
  @media only screen and (min-width: 768px) and (max-width: 991.98px) {
  }
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
      <h3>Mentor Program</h3>
    </div>
  </div>
  <!-- Page Banner End -->

  <!-- Mentor Program -->
  <section class="mentor-program section-bg">
    <div class="container">
      @if($mentors->isNotEmpty())
      <div class="row">
        @foreach ($mentors as $mentor)
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 col-item load-col">
          <div class="card">
            <img src="{{ asset('uploads/mentor-application/' . $mentor->thumbnail) }}" class="card-img-top" alt="{{ $mentor->name }}">
            <div class="card-body">
              <div class="py-2">
                <h5 class="card-title">{{ $mentor->name }}</h5>
                <p class="card-text py-2">{{ Str::words($mentor->profession, 20, '...' ) }}</p>
              </div>
            </div>
            <div class="text-center mb-3">
              <a href="{{ route('mentor.details', $mentor->id) }}" class="btn primary-btn">View Details</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="text-center">
        <button type="button" class="btn primary-btn load-btn text-uppercase">Browse More</button>
      </div>
      @else
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="alert alert-danger text-center" role="alert">
            <strong>No Mentors Available</strong>
          </div>
        </div>
      </div>
      @endif
    </div>
  </section>
  <!-- Mentor Program End -->
@endsection
@push('page-js')
<!-- Load More Button Js -->
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
