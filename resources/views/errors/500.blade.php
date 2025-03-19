@extends('layouts.frontend.frontend-layouts')
@section('title', '500 Internal Server Error | wome-in-digital')
@push('page-css')
<style>
    body{
        background: #F6F6F8;
    }
    .not-found-page{
        text-align:center;
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
<div class="not-found-page">
    <img src="{{ asset('assets/application-default/img/500.gif') }}" alt="">
</div>
@endsection
@push('page-js')
@endpush