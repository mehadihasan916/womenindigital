@extends('layouts.frontend.frontend-layouts')
@section('title')
    Demo Page {{ !empty($page_builder) ? $page_builder->title : '' }}  Women In Digital
@endsection
@push('page-css')
<style>
    .not-found-page{
        text-align:center;
        background: #F6F6F8;
    }
    .page-banner img{
        width: 100%;
        height: 100vh;
        object-fit: cover
    }
    .page-not-found{
        height: 100vh;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #ff000070;
        color: white;
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
    @if($page_builder->isNotEmpty())
        <!-- Page Banner  -->
        <div class="page-banner">
            <p>{!! $page_builder->page_banner !!}</p>
        </div>
        <!-- Page Banner End -->

        <!-- Page builder body  -->
        <section>
            <div class="container">
                <p>{!! $page_builder->body !!}</p>
            </div>
        </section>
        <!-- Page builder body End -->
    @else
    <div class="not-found-page">
        <img src="{{ asset('assets/application-default/img/404.gif') }}" alt="404-not-found">
    </div>
    @endif
@endsection
@push('page-js')
@endpush
