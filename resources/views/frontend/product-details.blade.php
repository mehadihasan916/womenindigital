@extends('layouts.frontend.frontend-layouts')
@section('title', 'Product-Details | Wome-In-Digital')
@push('meta-tag')
<meta property="og:title" content="{{ $product->name }}" />
<meta property="og:description" content="{{ $product->short_description }}" />
<meta property="og:url" content="{{ route('product.details', $product->id) }}" />
<meta property="og:image" content="{{ asset('uploads/products/'.$product->thumbnail) }}" />
@endpush
@push('page-css')
<link rel="stylesheet" href="{{ asset('assets/frontend/vendor/owl-carousel/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/vendor/owl-carousel/css/owl.theme.default.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/vendor/owl-carousel/css/custom-owl.css') }}">
<style>
  #item-details{
    padding-top: 120px;
  }
  /* Responsive */
  @media only screen and (min-width: 450px) and (max-width: 575.98px) {
  }
  @media only screen and (min-width: 310px) and (max-width: 449.98px) {
  }
</style>
@endpush
@section('page-content')

  <!-- Page Banner  -->
  {{-- <div id="page-banner" style="background-image: url({{ asset('assets/frontend/img/page-banner/team-banner.png') }});">
    <div class="container">
      <h5>Shop</h5>
      <h3>Product Details</h3>
    </div>
  </div> --}}
  <!-- Page Banner End -->

  <!-- Product Details-->
  <section class="section-bg" id="item-details">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-12">
          <div class="card p-3">
            {{-- <div class="title-box pt-3">
              <div class="d-flex">
                <i class="bi bi-person"></i>
                <span>By Women In Digital</span>
              </div>
              <div class="d-flex">
                <i class="bi bi-alarm"></i>
                <span>Last Modified : {{ date('F j, Y - g:i a', strtotime($product->updated_at)) }}</span>
              </div>
            </div> --}}
            <div class="details-body">
              {{-- <h4 class="py-3">{{ $product->name }}</h4> --}}
              <img src="{{ asset('uploads/products/'.$product->thumbnail) }}" class="item-thumbnail" alt="{{ Str::words($product->name, 3, '[..]') }}-image">
              <div class="d-flex justify-content-between py-4 border-bottom">
                <h4>{{ $product->name }}</h4>
                <h5 class="{{ $product->price == null ? 'd-none' : '' }}">Price : ${{ $product->price }}</h5>
              </div>
              <p class="pt-3">{!! $product->body !!}</p>
              @if($product->link != null)
                <div class="text-center mt-3 mt-lg-4">
                  <a href="{{ $product->link }}" class="btn primary-btn">Click To Download</a>
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Product Details End -->

  <!-- All Product -->
  <div id="owl_theam" class="section-bg d-xl-none">
    <div class="container">
      <h4 class="text-center pb-3">Products</h4>
      <div class="row justify-content-center">
        <div class="col-lg-11">
          <div class="owl_wrap">
            <div class="owl-carousel owl_theam">
              @foreach($products as $products_item)
              <a href="{{ route('product.details', $products_item->id) }}">
                <div class="card d-flex align-items-center">
                  <img src="{{ asset('uploads/products/'.$products_item->thumbnail) }}" alt="item-thumbnail" height="150px">
                  <p>{{ Str::words($products_item->short_description, 10, '[..]') }}</p>
                </div>
              </a>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- All Products End-->

@endsection
@push('page-js')
<script src="{{ asset('assets/frontend/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>
<script>
  /**
   * owl carouse for blog, story, event
   */
  $('.owl_theam').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
      0:{
          items:1,
          nav:false
      },
      400:{
          items:2,
          nav:false
      },
      800:{
          items:3,
          nav:false
      },
      1000:{
          items:3,
          nav:true,
          loop:false
      }
      }
    });
</script>
@endpush
