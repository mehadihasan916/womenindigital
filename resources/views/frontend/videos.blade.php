@extends('layouts.frontend.frontend-layouts')
@section('title', 'Videos | Wome-In-Digital')
@push('meta-tag')
<meta property="og:title" content="Videos | Wome-In-Digital" />
<meta property="og:description" content="Empowering-women | Women-in-Digital | Female-technologists  | Bringing-more-women | Women-in-Technology | Digital-Bangladesh | Digital Women | Tech Women | Women-Hackathon | Innovation-challenge | Career-Counselling | Women engineer" />
<meta property="og:url" content="{{ route('videos') }}" />
<meta property="og:image" content="{{ asset('assets/application-default/seo-image/wid-logo-t.jpg') }}" />
@endpush
@push('page-css')
<style>
  .videos iframe{
    width: 100%;
    height: 500px;
    border-radius: 5px;
  }
  /* Responsive */
  @media only screen and (min-width: 768px) and (max-width: 991.98px) {  
  }
  @media only screen and (min-width: 576px) and (max-width: 767.98px) { 
    .videos iframe {
      height: 350px;
    }
  }
  @media only screen and (min-width: 450px) and (max-width: 575.98px) {   
    .videos iframe {
      height: 320px;
    }
  }
  @media only screen and (min-width: 310px) and (max-width: 449.98px) {  
    .videos iframe {
      height: 300px;
    }
  }
</style>
@endpush
@section('page-content')
  <!-- Page Banner  -->
  <div id="page-banner" style="background-image: url({{ asset('assets/frontend/img/page-banner/team-banner.png') }});">
    <div class="container">
      <h5><span>Videos</span></h5>
      <h3>Accesses <br>
        Information</h3>
      <p>Video is universal and allows people around the world to communicate and exchange ideas.</p>
    </div>
  </div>
  <!-- Page Banner End -->

  <section class="videos">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-12 col-item">
          <iframe  src="https://www.youtube.com/embed/4HulloFTkzU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="col-lg-6 col-md-12 col-item">
          <iframe src="https://www.youtube.com/embed/zLhfm8r-xGY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="col-lg-6 col-md-12 col-item">
          <iframe src="https://www.youtube.com/embed/dWf4SWz6Iok" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="col-lg-6 col-md-12 col-item">
          <iframe src="https://www.youtube.com/embed/ILsBNlTy-5A" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </section>
@endsection
@push('page-js')
@endpush