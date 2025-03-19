@extends('layouts.frontend.frontend-layouts')
@section('title', 'Indomitable-Women | Wome-In-Digital')
@push('meta-tag')
<meta property="og:title" content="Indomitable Women List | Wome-In-Digital" />
<meta property="og:description" content="Empowering-women | Women-in-Digital | Female-technologists  | Bringing-more-women | Women-in-Technology | Digital-Bangladesh | Digital Women | Tech Women | Women-Hackathon | Innovation-challenge | Career-Counselling | Women engineer" />
<meta property="og:url" content="{{ route('indomitable-womens') }}" />
<meta property="og:image" content="{{ asset('assets/application-default/seo-image/wid-logo-t.jpg') }}" />
@endpush
@push('page-css')
<style>
    #indomitable-women .card{
        height: 100%;
        box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
    }
    /* Responsive */
    @media only screen and (min-width: 992px) and (max-width: 1199.98px) {
        #indomitable-women .indomitable-women-item:nth-child(even) {
            top: 0px;
        }
    }
    @media only screen and (min-width: 768px) and (max-width: 991.98px) {
    }
    @media only screen and (min-width: 576px) and (max-width: 767.98px) {
    }
    @media only screen and (min-width: 450px) and (max-width: 575.98px) {
        #indomitable-women .indomitable-women-item:nth-child(even) {
            top: 0px;
        }
        #indomitable-women .card img {
            height: auto;
        }
    }
    @media only screen and (min-width: 310px) and (max-width: 449.98px) {
        #indomitable-women .card img {
            height: auto;
        }
        #indomitable-women .indomitable-women-item:nth-child(even) {
            top: 0px;
        }
    }
</style>
@endpush
@section('page-content')
    <!-- Page Banner  -->
    <div id="page-banner" style="background-image: url({{ asset('assets/frontend/img/page-banner/team-banner.png') }});">
        <div class="container">
            <h5><span>Blog</span></h5>
            <h3>11 indomitable women: <br>
                Success stories in STEM</h3>
            <p>Empowering Women through Technology</p>
        </div>
    </div>
    <!-- Page Banner End -->

    <!-- Indomitable Women -->
    <section class="section-bg" id="indomitable-women">
        <div class="container">
            <div class="row">
                @forelse($indomitableWomens as $indomitableWomen)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 col-item indomitable-women-item">
                    <div class="card">
                        <a href="javascript:void(0)">
                            <img src="{{ asset('uploads/indomitable-womens/'.$indomitableWomen->thumbnail) }}" class="card-img-top" alt="{{ $indomitableWomen->name }}-pic">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $indomitableWomen->name }}</h5>
                            <h6 class="text-muted pb-2">{{ $indomitableWomen->designation }}</h6>
                            <p>{{ Str::words($indomitableWomen->short_description, 30, '...') }} <a href="{{ route('indomitable-women.details',$indomitableWomen->id ) }}" class="text-nowrap read-more">Read More <span><i class="ri-arrow-right-s-line"></i><i class="ri-arrow-right-s-line"></i></span></a></p>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center">
                    <div class="alert alert-danger text-center" role="alert">
                      <strong>Indomitable Womens Not Found</strong>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- Indomitable Women End -->
@endsection
@push('page-js')
@endpush
