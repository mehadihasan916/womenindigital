@extends('layouts.frontend.frontend-layouts')
@section('title', 'Demo | wome-in-digital')
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
      <h5><span>Awards</span></h5>
      <h3>Mobile Device
        Management</h3>
      <p>Your administrative window into centralized device management</p>
    </div>
  </div>
  <!-- Page Banner End -->
@endsection
@push('page-js')
@endpush