@extends('layouts.frontend.frontend-layouts')
@section('title', 'Mission | Wome-In-Digital')
@push('meta-tag')
<meta property="og:title" content="Mission | Women-In-Digital" />
<meta property="og:description" content="Empowering-women | Women-in-Digital | Female-technologists  | Bringing-more-women | Women-in-Technology | Digital-Bangladesh | Digital Women | Tech Women | Women-Hackathon | Innovation-challenge | Career-Counselling | Women engineer" />
<meta property="og:url" content="{{ route('mission') }}" />
<meta property="og:image" content="{{ asset('assets/application-default/seo-image/wid-logo-t.jpg') }}" />
@endpush
@push('page-css')
<style>
  .mission img{
    width: 100%;
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
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <h5><span>Mission</span></h5>
          <h3>Run, Managed, Own by 100% Women</h3>
            <p>Empowering Women through Technology</p>
        </div>
      </div>
    </div>
  </div>
  <!-- Page Banner End -->

  <!-- Mission -->
  <section >
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <h2 class="pb-2">Women In Digital is an initiative of a Social Enterprise that has created programmers to help women advance by providing access to Digital Platform.</h2>
          <p>
              Women in Digital aims to support, develop, recognize and promote the achievements of women in ICT. WID ‘s mission is to empower women in Digital Platform to achieve unimagined possibilities and transformations through technology, leadership and monetary prosperity. Successfully cultivate mutually beneficial networks between industry, academia and government with a focus on women working in the technology industries across the country and the world.</p>
          {{-- <img src="{{ asset('assets/frontend/img/mission/mission.jpg') }}" alt="" class="img-fluid"> --}}
        </div>
      </div>
    </div>
  </section>
  <div class="mission">
    <img src="{{ asset('assets/frontend/img/mission/mission.png') }}">
  </div>
  <!-- Mission End -->
@endsection
@push('page-js')
@endpush
