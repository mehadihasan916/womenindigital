@extends('layouts.frontend.frontend-layouts')
@section('title', 'Story | Wome-In-Digital')
@push('meta-tag')
<meta property="og:title" content="Stories | Wome-In-Digital" />
<meta property="og:description" content="Empowering-women | Women-in-Digital | Female-technologists  | Bringing-more-women | Women-in-Technology | Digital-Bangladesh | Digital Women | Tech Women | Women-Hackathon | Innovation-challenge | Career-Counselling | Women engineer" />
<meta property="og:url" content="{{ route('stories') }}" />
<meta property="og:image" content="{{ asset('assets/application-default/seo-image/wid-logo-t.jpg') }}" />
@endpush
@push('page-css')
<style>
  /* Load More Button Css */
  .load-col{
    display: none;
    padding-bottom: 25px;
  }
  .story ul li img{
    width: 150px;
    height: 150px;
    border: 5px solid #EEEEEE ;
    border-radius: 50%;
    object-fit: cover;
  }
  .story ul li{
    padding: 25px;
    border-left: 5px solid #ED1D24;
    border-top-left-radius: 15px;
    border-bottom-left-radius: 15px;
    background: white;
    margin-bottom: 25px;
    box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
  }
  .story ul li span{
    display: block;
    font-weight: 500;
  }
  .story a{
    color: #444444;
  }
  .story a:hover{
    color: #ED1D24;
  }
  /* Responsive */
  @media only screen and (min-width: 768px) and (max-width: 991.98px) {
  }
  @media only screen and (min-width: 576px) and (max-width: 767.98px) {
    .story ul li {
      padding: 15px;
    }
    .story ul li img {
      width: 120px;
      height: 120px;
    }
  }
  @media only screen and (min-width: 450px) and (max-width: 575.98px) {
    .story ul li {
      padding: 15px;
    }
    .story ul li img {
      width: 110px;
      height: 110px;
    }
  }
  @media only screen and (min-width: 310px) and (max-width: 449.98px) {
    .story ul li {
      padding: 10px;
    }
    .story ul li img {
      width: 100px;
      height: 100px;
    }
  }
</style>
@endpush
@section('page-content')
  <!-- Page Banner  -->
  <div id="page-banner" style="background-image: url({{ asset('assets/frontend/img/page-banner/team-banner.png') }});">
    <div class="container">
      <h5><span>Story</span></h5>
      <h3>Tell,
        Don't sell</h3>
      <p>Great stories happen to those who can tell them.</p>
    </div>
  </div>
  <!-- Page Banner End -->

  <!-- Stories Section -->
  <section class="section-bg story" >
    <div class="container">
      @if($stories->isNotEmpty())
      <ul class="p-0">
        @foreach($stories as $story)
        <li class="load-col">
          <a href="{{ route('story.details', $story->id) }}" class="d-md-flex align-items-center">
            <img src="{{ asset('uploads/stories/'.$story->thumbnail) }}" alt="{{ Str::words($story->title, 3, '-') }}-image">
            <div class="ms-3">
              <span class="text-muted">{{ date('F j, Y - g:i a', strtotime($story->created_at)) }}</span>
              <h6 class="mt-2 mb-1">{{ Str::words($story->title, 10, '...') }}</h6>
              <p>{{ Str::words($story->short_description, 30, '...') }}</p>
            </div>
          </a>
        </li>
        @endforeach
      </ul>
      <div class="text-center pt-4">
        <button type="button" class="btn primary-btn text-uppercase">Browse More</button>
      </div>
      @else
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="alert alert-danger text-center" role="alert">
            <strong>No Story Available</strong>
          </div>
        </div>
      </div>
      @endif
    </div>
  </section>
  <!-- Stories Section End -->

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
