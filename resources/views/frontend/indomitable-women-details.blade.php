@extends('layouts.frontend.frontend-layouts')
@section('title', 'Indomitable-Women-Details | Wome-In-Digital')
@push('meta-tag')
<meta property="og:title" content="{{ $indomitableWomen->name }} | Women-In-Digital" />
<meta property="og:description" content="{{ Str::words($indomitableWomen->short_description, 10, '[..]') }}" />
<meta property="og:url" content="{{ route('indomitable-women.details', $indomitableWomen->id) }}" />
<meta property="og:image" content="{{ asset('uploads/indomitable-womens/'. $indomitableWomen->thumbnail) }}" />
@endpush
@push('page-css')
<style>
  .section-bg {
    margin-top: 30px;
  }
  .indomitable-women-banner img{
    width: 100%;
    height: 500px;
    object-fit: cover;
  }
  .indomitable-women-body ul li{
    list-style-type: initial;
  }
  .description img{
    padding: 15px;
  }
  /* Responsive */
  @media only screen and (min-width: 768px) and (max-width: 991.98px) {
    .indomitable-women-banner img {
      width: 100%;
      height: 350px !important;
      object-fit: cover;
    }
  }
  @media only screen and (min-width: 576px) and (max-width: 767.98px) {
    .description img{
      width: 100% !important;
      padding: 15px 0px !important;
    }
    .indomitable-women-banner img {
      width: 100%;
      height: 300px !important;
      object-fit: cover;
    }
  }
  @media only screen and (min-width: 450px) and (max-width: 575.98px) {
    .description img{
      width: 100% !important;
      height: auto;
      padding: 15px 0px !important;
    }
    .indomitable-women-banner img {
      width: 100%;
      height: 245px !important;
      object-fit: cover;
    }
  }
  @media only screen and (min-width: 310px) and (max-width: 449.98px) {
    .description img{
      width: 100% !important;
      height: auto;
      padding: 15px 0px !important;
    }
    .indomitable-women-banner img {
      width: 100%;
      height: 230px !important;
      object-fit: cover;
    }
  }
</style>
@endpush
@section('page-content')
  <!-- Indomitable Women Section -->
  <section class="section-bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-10">
          <div class="card p-3">
            <div class="title-box py-3">
              <div class="d-flex">
                <i class="bi bi-person pe-2"></i>
                <span> By Women In Digital</span>
              </div>
              <div class="d-flex">
                <i class="bi bi-alarm pe-2"></i>
                <span> Last Modified : {{ date('l, jS \of F Y', strtotime($indomitableWomen->updated_at)) }}</span>
              </div>
              <h4 class="py-3">{{ $indomitableWomen->name }}</h4>
            </div>
            <div class="indomitable-women-body">
              <div class="indomitable-women-banner">
                <p>{!! $indomitableWomen->page_banner !!}</p>
              </div>
              <h4 class="py-3 border-bottom">Overivew</h4>
              <div class="description">
                <p class="pt-4">{!! $indomitableWomen->body !!}</p>
              </div>
              <!-- Go to www.addthis.com/dashboard to customize your tools -->
              <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-61f3833efbf5966c"></script>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Indomitable Women Section End -->
@endsection
@push('page-js')
@endpush
