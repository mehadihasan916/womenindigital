@extends('layouts.frontend.frontend-layouts')
@section('title', 'Team | Wome-In-Digital')
@push('meta-tag')
<meta property="og:title" content="Team | Wome-In-Digital" />
<meta property="og:description" content="Empowering-women | Women-in-Digital | Female-technologists  | Bringing-more-women | Women-in-Technology | Digital-Bangladesh | Digital Women | Tech Women | Women-Hackathon | Innovation-challenge | Career-Counselling | Women engineer" />
<meta property="og:url" content="{{ route('team') }}" />
<meta property="og:image" content="{{ asset('assets/application-default/seo-image/wid-logo-t.jpg') }}" />
@endpush
@push('page-css')
<style>
  #page-banner{
    position: relative;
    color: white;
  }
  #page-banner::after{
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,.5);
  }
  .z-idex-custom{
    z-index: 10;
  }
  #team .card img{
    height: 300px;
    object-fit: cover;
  }
  #team .card{
    height: 100%;
    box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
  }
  #team .card-body{
    background: rgb(243, 243, 243);
  }
  #team .card p{
    font-weight: 400;
  }
  .load-col{
    display: none;
    padding-bottom: 25px;
  }
</style>
@endpush
@section('page-content')
  <!-- Page Banner  -->
  <div id="page-banner" style="background-image: url({{ asset('assets/frontend/img/team/team-banner.png') }});">
    <div class="container z-idex-custom">
      <h3>Women In Digital Teams</h3>
    </div>
  </div>
  <!-- Page Banner End -->
  <!-- Advisor -->
  <section id="team" class="section-bg">
    <div class="container">
      <!-- Advisor -->
      <h1 class="text-center pb-3">Advisors</h1>
      <div class="row justify-content-center">
        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 col-item">
          <div class="card">
            <img src="{{ asset('assets/frontend/img/team/Lori_Souza.png') }}" class="card-img-top" alt="lori-souza">
            <div class="card-body">
              <div class="py-2">
                <h6 class="card-title">Lori Souza</h6>
                <p class="card-text">Education and Advising Women in Crypto FINTECH/Crypto/Real Estate/Digital Assets</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 col-item">
          <div class="card">
            <img src="{{ asset('assets/frontend/img/team/Mohammed_K_Aref.png') }}" class="card-img-top" alt="k-aref">
            <div class="card-body">
              <div class="py-2">
                <h6 class="card-title">Mohammed K Aaref</h6>
                <p class="card-text">Innovative and results-focused Project Manager and Senior Administrator</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 col-item">
          <div class="card">
            <img src="{{ asset('assets/frontend/img/team/Andy_Annett.png') }}" class="card-img-top" alt="andy-annett">
            <div class="card-body">
              <div class="py-2">
                <h6 class="card-title">Andy Annett</h6>
                <p class="card-text">Unreasonable APAC Regional Manager</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 col-item">
          <div class="card">
            <img src="{{ asset('assets/frontend/img/team/alex.jpg') }}" class="card-img-top" alt="alex">
            <div class="card-body">
              <div class="py-2">
                <h6 class="card-title">Alex Timmermans</h6>
                <p class="card-text">marketeer/entrepreneur</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Working Team -->
      <h1 class="text-center pb-3 pt-lg- 5 pt-md-4 pt-sm-3 pt-3">Working Team</h1>
      @if($teams->isNotEmpty())
      <div class="row">
        @foreach ($teams as $team)
        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 col-item load-col">
          <div class="card">
            <img src="{{ $team->thumbnail != null ? asset('uploads/teams/'.$team->thumbnail) : asset('default-avater/gallery.jpg') }}" class="card-img-top" alt="{{ $team->name }}-pic">
            <div class="card-body">
              <div class="py-2">
                <h6 class="card-title text-capitalize">{{ $team->name }}</h6>
                <p class="card-text text-muted">{{ $team->designation }}</p>
              </div>
            </div>
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
            <strong>No Member Available</strong>
          </div>
        </div>
      </div>
      @endif
    </div>
  </section>
  <!-- Advisor End -->
@endsection
@push('page-js')
<!-- Load More Button -->
<script>
  $(".load-col").slice(0, 16).show()
  $(".btn").on("click", function(){
    $(".load-col:hidden").slice(0,4).slideDown()
    if($(".load-col:hidden").length == 0){
    $(".btn").fadeOut('slow')
    }
  });
</script>
@endpush
