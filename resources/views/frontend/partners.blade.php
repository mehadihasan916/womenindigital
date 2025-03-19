@extends('layouts.frontend.frontend-layouts')
@section('title', 'Partners | Wome-In-Digital')
@push('meta-tag')
<meta property="og:title" content="Partners | Wome-In-Digital" />
<meta property="og:description" content="Empowering-women | Women-in-Digital | Female-technologists  | Bringing-more-women | Women-in-Technology | Digital-Bangladesh | Digital Women | Tech Women | Women-Hackathon | Innovation-challenge | Career-Counselling | Women engineer" />
<meta property="og:url" content="{{ route('partners') }}" />
<meta property="og:image" content="{{ asset('assets/application-default/seo-image/wid-logo-t.jpg') }}" />
@endpush
@push('page-css')
<style>
  .load-col{
    display: none;
    padding-bottom: 25px;
  }
  .load-col-2{
    display: none;
    padding-bottom: 25px;
  }
</style>
@endpush
@section('page-content')
  <!-- Page Banner  -->
  <div id="page-banner" style="background-image: url({{ asset('assets/frontend/img/page-banner/team-banner.png') }});">
    <div class="container">
      <h5><span>Partners</span></h5>
      <h3>Teamwork begins <br>
        by building trust </h3>
      <p>Alone we can do so little; together we can do so much</p>
    </div>
  </div>
  <!-- Page Banner End -->

  <!-- Partners -->
  <section id="partners" class="section-bg">
    <div class="container">
      <h1 class="text-center pb-3 pb-sm-3 pb-md-4">Partners</h1>
      <div class="d-none d-lg-block">
        <div class="row justify-content-center">
          <div class="col-xl-8 col-lg-12 text-center">
            @if($partners->isNotEmpty())
              <div class="row justify-content-center">
                @foreach ( $partners as $partner )
                <div class="col-lg-2 col-md-3 col-sm-3 col-item load-col">
                  <div class="partner-item">
                    <img src="{{ asset('uploads/partners/' . $partner->thumbnail) }}" alt="{{ $partner->thumbnail }}" class="img-fluid">
                  </div>
                </div>
                @endforeach
              </div>
              <div class="text-center">
                <button class="btn primary-btn">Browse More</button>
              </div>
            @else
              <div class="row justify-content-center">
                <div class="col-md-6">
                  <div class="alert alert-danger text-center" role="alert">
                    <strong>No Partner Available</strong>
                  </div>
                </div>
              </div>
            @endif
          </div>
        </div>
      </div>
      <div class="d-lg-none">
        <div class="row justify-content-center">
          <div class="col-md-10 text-center">
            @if($partners->isNotEmpty())
            <div class="row justify-content-center">
              @foreach ($partners as $partner)
                <div class="col-md-3 col-sm-3 col-4 col-item load-col-2">
                  <div class="partner-item">
                    <img src="{{ asset('uploads/partners/' . $partner->thumbnail) }}" alt="{{ $partner->thumbnail }}" class="img-fluid">
                  </div>
                </div>
              @endforeach
            </div>
            <div class="text-center">
              <button class="btn btn-2 primary-btn">Browse More</button>
            </div>
            @else
              <div class="row justify-content-center">
                <div class="col-md-6">
                  <div class="alert alert-danger text-center" role="alert">
                    <strong>No Partner Available</strong>
                  </div>
                </div>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Partners End -->
@endsection
@push('page-js')
<script>
  $(".load-col").slice(0, 18).show()
  $(".btn").on("click", function(){
      $(".load-col:hidden").slice(0,4).slideDown()
      if($(".load-col:hidden").length == 0){
      $(".btn").fadeOut('slow')
      }
  });

  $(".load-col-2").slice(0, 18).show()
  $(".btn-2").on("click", function(){
      $(".load-col-2:hidden").slice(0,4).slideDown()
      if($(".load-col-2:hidden").length == 0){
      $(".btn-2").fadeOut('slow')
      }
  });
</script>
@endpush
