@extends('layouts.frontend.frontend-layouts')
@section('title', 'Products | wome-in-digital')
@push('meta-tag')
<meta property="og:title" content="Products | Wome-In-Digital" />
<meta property="og:description" content="Empowering-women | Women-in-Digital | Female-technologists  | Bringing-more-women | Women-in-Technology | Digital-Bangladesh | Digital Women | Tech Women | Women-Hackathon | Innovation-challenge | Career-Counselling | Women engineer" />
<meta property="og:url" content="{{ route('products') }}" />
<meta property="og:image" content="{{ asset('assets/application-default/seo-image/wid-logo-t.jpg') }}" />
@endpush
@push('page-css')
<style>
  /* Load More Button Css */
  .load-col{
    display: none;
    padding-bottom: 25px;
  }
  /* Responsive */
  @media only screen and (min-width: 992px) and (max-width: 1199.98px) {
  }
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
      <h5><span>Shop</span></h5>
      <h3>Mobile Device <br>
        Management</h3>
      <p>Your administrative window into centralized device management</p>
    </div>
  </div>
  <!-- Page Banner End -->
  
  <!-- Products Section -->
  <section class="section-bg benps" id="benps">
    <div class="container">
      @if($products->isNotEmpty())
      <div class="row">
        @foreach($products as $product)
          <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 col-item benps-item load-col">
            <div class="card">
              <a href="{{ route('product.details', $product->id) }}">
                <img src="{{ asset('uploads/products/'.$product->thumbnail) }}" class="card-img-top" alt="{{ Str::words($product->name, 3, '-') }}image">
              </a>
              <div class="card-body">
                <h6 class="card-title">{{ Str::words($product->name, 10, '...') }}</h6>
                <p>{{ Str::words($product->short_description, 30, '...') }}</p>
              </div>
              <div class="text-center mb-3">
                <a href="{{ route('product.details', $product->id) }}" class="btn primary-btn mt-2">Read More</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      <div class="text-center pt-4">
        <button type="button" class="btn load-btn primary-btn text-uppercase">Browse More</button>
      </div>
      @else
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="alert alert-danger text-center" role="alert">
            <strong>No Products Available</strong>
          </div>
        </div>
      </div>
      @endif
    </div>
  </section>
  <!-- products Section End -->
@endsection
@push('page-js')
<!-- Load More Button Js-->
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
