@extends('layouts.frontend.frontend-layouts')
@section('title', 'Ambassadors | Wome-In-Digital')
@push('meta-tag')
<meta property="og:title" content="Ambassadors | Women-In-Digital" />
<meta property="og:description" content="Empowering-women | Women-in-Digital | Female-technologists  | Bringing-more-women | Women-in-Technology | Digital-Bangladesh | Digital Women | Tech Women | Women-Hackathon | Innovation-challenge | Career-Counselling | Women engineer" />
<meta property="og:url" content="{{ route('ambassadors') }}" />
<meta property="og:image" content="{{ asset('assets/application-default/seo-image/wid-logo-t.jpg') }}" />
@endpush
@push('page-css')
<style>
  .ambassadors .card{
    height: 100%;
    box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
  }
  .ambassadors .card img{
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
      <h5><span></span></h5>
      <h3>Ambassadors</h3>
      <p></p>
    </div>
  </div>
  <!-- Page Banner End -->

  <!-- Ambassadors -->
  <section class="ambassadors section-bg">
    <div class="container">
      @if($ambassadors->isNotEmpty())
      <div class="row">
        @foreach ($ambassadors as $ambassador)
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 col-item load-col">
          <div class="card">
            <img src="{{ asset('uploads/ambassadors/' . $ambassador->thumbnail) }}" class="card-img-top" alt="{{ $ambassador->name }}-image">
            <div class="card-body">
              <div class="py-2">
                <h5 class="card-title">{{ $ambassador->name }}</h5>
                <p class="card-text py-2">{{ Str::words($ambassador->profession, 20, '[..]' ) }}</p>
                <a href="{{ route('ambassador.details', $ambassador->id) }}" class="btn primary-btn">View Details</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="text-center">
        <button type="button" class="btn primary-btn load-btn">Browse More</button>
      </div>
      @else
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="alert alert-danger text-center" role="alert">
            <strong>No Ambassador Available</strong>
          </div>
        </div>
      </div>
      @endif
    </div>
  </section>
  <!-- Ambassadors End -->
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
