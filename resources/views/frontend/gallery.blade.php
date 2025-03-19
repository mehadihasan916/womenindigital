@extends('layouts.frontend.frontend-layouts')
@section('title', 'Gallery | Wome-In-Digital')
@push('meta-tag')
<meta property="og:title" content="Gallery | Wome-In-Digital" />
<meta property="og:description" content="Empowering-women | Women-in-Digital | Female-technologists  | Bringing-more-women | Women-in-Technology | Digital-Bangladesh | Digital Women | Tech Women | Women-Hackathon | Innovation-challenge | Career-Counselling | Women engineer" />
<meta property="og:url" content="{{ route('gallery') }}" />
<meta property="og:image" content="{{ asset('assets/application-default/seo-image/wid-logo-t.jpg') }}" />
@endpush
@push('page-css')
<style>
  /* Load More Button Css */
  .load-col{
    display: none;
    padding-bottom: 25px;
  }
  /* Gallery Album Css */
  .stack img {
    width: 100%;
    height: 200px;
    vertical-align: bottom;
    border: 10px solid #fff;
    object-fit: cover;
    object-position: center;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -o-border-radius: 3px;
    -ms-border-radius: 3px;
    -moz-border-radius: 3px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    -o-box-sizing: border-box;
    -ms-box-sizing: border-box;
    -webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
    -moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
    -o-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
    -ms-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
  }
  .stack:last-of-type {
    margin-right: 0;
  }
  .stack.twisted:before {
    -webkit-transform: rotate(4deg);
    -moz-transform: rotate(4deg);
    transform: rotate(4deg);
    -moz-transform: rotate(4deg);
    -o-transform: rotate(4deg);
  }
  .stack.twisted:after {
    -webkit-transform: rotate(-4deg);
    -moz-transform: rotate(-4deg);
    transform: rotate(-4deg);
    -ms-transform: rotate(-4deg);
    -o-transform: rotate(-4deg);
  }
  .stack:hover:before,
  .stack:hover:after,
  .team-grid:hover .stack:before,
  .team-grid:hover .stack:after {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    transform: rotate(0deg);
    -o-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
  }
  .stack:before,
  .stack:after {
    content: "";
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -o-border-radius: 3px;
    -ms-border-radius: 3px;
    -moz-border-radius: 3px;
    width: 100%;
    height: 100%;
    position: absolute;
    border: 10px solid #fff;
    left: 0;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    -ms-box-sizing: border-box;
    -o-box-sizing: border-box;
    -webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
    -moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
    -ms-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
    -o-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
    -webkit-transition: 0.3s all ease-out;
    -moz-transition: 0.3s all ease-out;
    transition: 0.3s all ease-out;
    -o-transition: 0.3s all ease-out;
    -ms-transition: 0.3s all ease-out;
  }
  .stack:before {
    top: 4px;
    z-index: -10;
  }
  .stack:after {
    top: 8px;
    z-index: -20;
  }
  .stack {
    float: none;
    width: 92%;
    margin: 3% 0% 8% 4%;
    position: relative;
    z-index: 1;
  }
  /* Gallery Album Css End */
  </style>
@endpush
@section('page-content')
  <!-- Page Banner  -->
  <div id="page-banner" style="background-image: url({{ asset('assets/frontend/img/page-banner/team-banner.png') }});">
    <div class="container">
      <h5><span>Gallery Album</span></h5>
      <h3>History
        Memories</h3>
      <p>Culture is the arts elevated to a set of beliefs.</p>
    </div>
  </div>
  <!-- Page Banner End -->

  <!-- Gallery Section -->
  <section class="gallery section-bg">
		<div class="container">
      @if($albums->isNotEmpty())
      <div class="row">
        @foreach ($albums as $album)
        <div class="col-xl-3 col-md-6 col-sm-6 col-12 col-item load-col {{ $album->galleries->count() > 0 ? '' : 'd-none' }}">
          <a href="{{ route('album', $album->id) }}">
            @foreach ($album->galleries->take(1) as $gallery)
            <div class="stack twisted">
              <img src="{{ asset('uploads/galleries/'.$gallery->thumbnail) }}" alt="{{ Str::words($album->title, 3, '[..]') }}-image" class="img-fluid">
            </div>
            @endforeach
            <h6 class="text-center">{{ $album->title }}</h6>
          </a>
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
            <strong>No Album Available</strong>
          </div>
        </div>
      </div>
      @endif
		</div>
	</section>
  <!-- Gallery Section End -->
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


