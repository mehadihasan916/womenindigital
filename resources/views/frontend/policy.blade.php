@extends('layouts.frontend.frontend-layouts')
@section('title', 'Policy | Wome-In-Digital')
@push('meta-tag')
<meta property="og:title" content="Policy | Wome-In-Digital" />
<meta property="og:description" content="Empowering-women | Women-in-Digital | Female-technologists  | Bringing-more-women | Women-in-Technology | Digital-Bangladesh | Digital Women | Tech Women | Women-Hackathon | Innovation-challenge | Career-Counselling | Women engineer" />
<meta property="og:url" content="{{ route('policy') }}" />
<meta property="og:image" content="{{ asset('assets/application-default/seo-image/wid-logo-t.jpg') }}" />
@endpush
@push('page-css')
<style>
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
          <h5><span>Policy</span></h5>
          <h3>Contact Us</h3>
          <p>info@womenindigital.net</p>
        </div>
      </div>
    </div>
  </div>
  <!-- Page Banner End -->

  <!-- Poicy -->
  <section class="section-bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <p><strong>Content Policy :</strong> Women in Digital is a tech-based social enterprise. Last 7 years we are working in Bangladesh and Nepal. We have developed an ecosystem for women. On our website, we have used our own content and photographs. It's not public property and it's restricted for others. If anyone used our content without informing us, women in digital will take legal action against them. If anyone needs any information please feel free to contact us.
            email: info@womenindigital.net
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- Poicy End -->
@endsection
@push('page-js')
@endpush