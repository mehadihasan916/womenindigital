@extends('layouts.frontend.frontend-layouts')
@section('title', 'Awards | Wome-In-Digital')
@push('meta-tag')
<meta property="og:title" content="Awards | Women-In-Digital" />
<meta property="og:description" content="Empowering-women | Women-in-Digital | Female-technologists  | Bringing-more-women | Women-in-Technology | Digital-Bangladesh | Digital Women | Tech Women | Women-Hackathon | Innovation-challenge | Career-Counselling | Women engineer" />
<meta property="og:url" content="{{ route('awards') }}" />
<meta property="og:image" content="{{ asset('assets/application-default/seo-image/wid-logo-t.jpg') }}" />
@endpush
@push('page-css')
<!-- Load More Button Css -->
<style>
  .load-col{
    display: none;
    padding-bottom: 25px;
  }
</style>
@endpush
@section('page-content')
  <!-- Page Banner  -->
  <div id="page-banner" style="background-image: url({{ asset('assets/frontend/img/page-banner/team-banner.png') }});">
    <div class="container">
      <h5><span>Awards</span></h5>
      <h3>Mobile Device
        Management</h3>
      <p>Women in digital has been acknowledge by international and Bangladeshi organizations for its accomplishments./p>
    </div>
  </div>
  <!-- Page Banner End -->

  <!-- Awards -->
  <section id="awards" class="section-bg">
    <div class="container">
      @if($awards->isNotEmpty())
      <div class="row">
        @foreach ( $awards as $award )
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 col-item load-col">
          <div class="card p-lg-4 p-md-3 p-2">
            <h5>{{ $award->name }}</h5>
            <p class="text-muted">
              {{ $award->location }}
            </p>
            <img src="{{ asset('uploads/awards/'.$award->thumbnail) }}" alt="{{ $award->name }}-image">
          </div>
        </div>
        @endforeach
      </div>
      <div class="text-center">
        <button type="button" class="btn primary-btn text-uppercase">Browse More</button>
      </div>
      @else
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="alert alert-danger text-center" role="alert">
            <strong>No Award Available</strong>
          </div>
        </div>
      </div>
      @endif
    </div>
  </section>
  <!-- Awards End -->
@endsection
@push('page-js')
<!-- Load More Button Js-->
<script>
  $(".load-col").slice(0, 12).show()
  $(".btn").on("click", function(){
      $(".load-col:hidden").slice(0,4).slideDown()
      if($(".load-col:hidden").length == 0){
      $(".btn").fadeOut('slow')
      }
  });
</script>
@endpush
