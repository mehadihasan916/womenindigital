@extends('layouts.frontend.frontend-layouts')
@section('title', 'Album-Gallery | Wome-In-Digital')
@push('meta-tag')
<meta property="og:title" content="Album-Gallery | Women-In-Digital" />
<meta property="og:description" content="Empowering-women | Women-in-Digital | Female-technologists  | Bringing-more-women | Women-in-Technology | Digital-Bangladesh | Digital Women | Tech Women | Women-Hackathon | Innovation-challenge | Career-Counselling | Women engineer" />
<meta property="og:url" content="{{ route('album', $album->id) }}" />
<meta property="og:image" content="{{ asset('assets/application-default/seo-image/wid-logo-t.jpg') }}" />
@endpush
@push('page-css')
<style>
  /*--------------------------------------------------------------
  # Gallery
  --------------------------------------------------------------*/
  .gallery .gallery-wrap {
    transition: 0.3s;
    position: relative;
    overflow: hidden;
    z-index: 1;
    background: rgba(0, 0, 0, 0.5);
    height: 380px;
    border-radius: 5px;
  }
  .gallery .gallery-wrap::before {
    content: "";
    background: rgba(0, 0, 0, 0.3);
    position: absolute;
    left: 30px;
    right: 30px;
    top: 30px;
    bottom: 30px;
    transition: all ease-in-out 0.3s;
    z-index: 2;
    opacity: 0;
  }
  .gallery .gallery-wrap img {
    transition: 1s;
    width: 100%;
    height: 380px;
    object-fit: cover;
  }
  .gallery .gallery-wrap .gallery-info {
    opacity: 0;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    text-align: center;
    z-index: 3;
    transition: all ease-in-out 0.3s;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
  .gallery .gallery-wrap .gallery-info::before {
    display: block;
    content: "";
    width: 48px;
    height: 48px;
    position: absolute;
    top: 35px;
    left: 35px;
    border-top: 3px solid rgba(251, 252, 253, 0.2);
    border-left: 3px solid rgba(251, 252, 253, 0.2);
    transition: all 0.5s ease 0s;
    z-index: 9994;
  }
  .gallery .gallery-wrap .gallery-info::after {
    display: block;
    content: "";
    width: 48px;
    height: 48px;
    position: absolute;
    bottom: 35px;
    right: 35px;
    border-bottom: 3px solid rgba(251, 252, 253, 0.2);
    border-right: 3px solid rgba(251, 252, 253, 0.2);
    transition: all 0.5s ease 0s;
    z-index: 9994;
  }
  .gallery .gallery-wrap .gallery-links a {
    color: #fff;
    background: #ED1D24;
    margin: 10px 2px;
    width: 36px;
    height: 36px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    transition: 0.3s;
  }
  .gallery .gallery-wrap .gallery-links a i {
    font-size: 24px;
    line-height: 0;
  }
  .gallery .gallery-wrap .gallery-links a:hover {
    background: #ED1D24;
  }
  .gallery .gallery-wrap:hover img {
    transform: scale(1.1);
  }
  .gallery .gallery-wrap:hover::before {
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    opacity: 1;
  }
  .gallery .gallery-wrap:hover .gallery-info {
    opacity: 1;
  }
  .gallery .gallery-wrap:hover .gallery-info::before {
    top: 15px;
    left: 15px;
  }
  .gallery .gallery-wrap:hover .gallery-info::after {
    bottom: 15px;
    right: 15px;
  }
  /*--------------------------------------------------------------
  # Gallery Details
  --------------------------------------------------------------*/
  .gallery-details-slider img {
    width: 100%;
  }
  .gallery-details-slider .swiper-pagination {
    margin-top: 20px;
    position: relative;
  }
  .gallery-details-slider .swiper-pagination .swiper-pagination-bullet {
    width: 12px;
    height: 12px;
    background-color: #fff;
    opacity: 1;
    border: 1px solid #ED1D24;
  }
  .gallery-details-slider .swiper-pagination .swiper-pagination-bullet-active {
    background-color: #ED1D24;
  }
  .gallery-info {
    padding: 30px;
    box-shadow: 0px 0 30px rgba(1, 41, 112, 0.08);
  }
  /* Load More Button Css */
  .load-col{
    display: none;
    padding-bottom: 25px;
  }
  @media only screen and (min-width: 310px) and (max-width: 449.98px) {
    .gallery .gallery-wrap {
      height: 320px;
    } 
  }
</style>
<link href="{{ asset('assets/frontend/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/frontend/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
@endpush
@section('page-content')
  <!-- Page Banner  -->
  <div id="page-banner" style="background-image: url({{ asset('assets/frontend/img/page-banner/team-banner.png') }});">
    <div class="container">
      <h5><span>Awards</span></h5>
      <h3>Mobile Device
        Management</h3>
      <p>Your administrative window into centralized device management</p>
    </div>
  </div>
  <!-- Page Banner End -->

  <!-- ======= Gallery Section ======= -->
  <section class="gallery">
    <div class="container">
      @if ($album->galleries->isNotEmpty())
      <div class="row">
        @foreach ($album->galleries as $album_img)
        <div class="col-lg-4 col-md-6 col-item load-col">
          <div class="gallery-wrap">
            <img src="{{ asset('uploads/galleries/'.$album_img->thumbnail) }}" class="img-fluid" alt="gallery-img">
            <div class="gallery-info">
              <div class="gallery-links">
                <a href="{{ asset('uploads/galleries/'.$album_img->thumbnail) }}" data-gallery="portfolioGallery" class="gallery-lightbox" title=""><i class="bi bi-plus"></i></a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="text-center">
        <button type="button" class="btn primary-btn">Browse More</button>
      </div>
      @else
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="alert alert-danger text-center" role="alert">
            <strong>No Gallery Image Available</strong>
          </div>
        </div>
      </div>
      @endif
    </div>
  </section>
  <!-- End Gallery Section -->
@endsection
@push('page-js')
<script src="{{ asset('assets/frontend/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script>
  /**
   * Initiate Gallery lightbox
   */
  const portfolioLightbox = GLightbox({
    selector: '.gallery-lightbox'
  });
  /**
   * Gallery details slider
   */
  new Swiper('.gallery-details-slider', {
    speed: 400,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    }
  });
</script>
<!-- Load More Button Js -->
<script>
  $(".load-col").slice(0, 12).show()
  $(".btn").on("click", function(){
      $(".load-col:hidden").slice(0,3).slideDown()
      if($(".load-col:hidden").length == 0){
      $(".btn").fadeOut('slow')
      }
  });
</script>
@endpush


