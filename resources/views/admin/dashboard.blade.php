@extends('layouts.admin.admin-layouts')
@section('title', 'Dashboard')
@push('css')
@endpush
@section('page-content')
<!-- Start content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title-box text-muted">
                    <h4 class="page-title float-left"><span><i class="icon-grid"></i></span> Dashboard</h4>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Uplon</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="icon-people float-right text-muted"></i>
                    <h6 class="text-muted text-uppercase m-b-20">Users</h6>
                    <h2 class="m-b-20" data-plugin="counterup">{{ $users }}</h2>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="ion-settings float-right text-muted"></i>
                    <h6 class="text-muted text-uppercase m-b-20">Services</h6>
                    <h2 class="m-b-20" data-plugin="counterup">{{ $services }}</h2>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="fa fa-handshake-o float-right text-muted"></i>
                    <h6 class="text-muted text-uppercase m-b-20">Partners</h6>
                    <h2 class="m-b-20" data-plugin="counterup">{{ $partners }}</h2>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="icon-trophy float-right text-muted"></i>
                    <h6 class="text-muted text-uppercase m-b-20">Awards</h6>
                    <h2 class="m-b-20" data-plugin="counterup">{{ $awards }}</h2>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="zmdi zmdi-comment-text float-right text-muted"></i>
                    <h6 class="text-muted text-uppercase m-b-20">Testimonial</h6>
                    <h2 class="m-b-20" data-plugin="counterup">{{ $testimonials }}</h2>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="fa fa-send-o float-right text-muted"></i>
                    <h6 class="text-muted text-uppercase m-b-20">Subscribers</h6>
                    <h2 class="m-b-20" data-plugin="counterup">{{ $subscribers }}</h2>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="zmdi zmdi-view-quilt float-right text-muted"></i>
                    <h6 class="text-muted text-uppercase m-b-20">Projects</h6>
                    <h2 class="m-b-20" data-plugin="counterup">{{ $projects }}</h2>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="zmdi zmdi-blogger float-right text-muted"></i>
                    <h6 class="text-muted text-uppercase m-b-20">Blogs</h6>
                    <h2 class="m-b-20" data-plugin="counterup">{{ $blogs }}</h2>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="icon-bell float-right text-muted"></i>
                    <h6 class="text-muted text-uppercase m-b-20">Events</h6>
                    <h2 class="m-b-20" data-plugin="counterup">{{ $events }}</h2>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="typcn typcn-news float-right text-muted"></i>
                    <h6 class="text-muted text-uppercase m-b-20">News</h6>
                    <h2 class="m-b-20" data-plugin="counterup">{{ $news }}</h2>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="zmdi zmdi-camera-roll float-right text-muted"></i>
                    <h6 class="text-muted text-uppercase m-b-20">Story</h6>
                    <h2 class="m-b-20" data-plugin="counterup">{{ $stories }}</h2>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="fa fa-group float-right text-muted"></i>
                    <h6 class="text-muted text-uppercase m-b-20">Team</h6>
                    <h2 class="m-b-20" data-plugin="counterup">{{ $teams }}</h2>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="icon-user-female float-right text-muted"></i>
                    <h6 class="text-muted text-uppercase m-b-20">Indomitable Women</h6>
                    <h2 class="m-b-20" data-plugin="counterup">{{ $indomitable_women }}</h2>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="ion-ios7-albums-outline float-right text-muted"></i>
                    <h6 class="text-muted text-uppercase m-b-20">Album</h6>
                    <h2 class="m-b-20" data-plugin="counterup">{{ $albums }}</h2>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="ti-gallery float-right text-muted"></i>
                    <h6 class="text-muted text-uppercase m-b-20">Gallery</h6>
                    <h2 class="m-b-20" data-plugin="counterup">{{ $galleries }}</h2>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="fa fa-product-hunt float-right text-muted"></i>
                    <h6 class="text-muted text-uppercase m-b-20">Products</h6>
                    <h2 class="m-b-20" data-plugin="counterup">{{ $products }}</h2>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="zmdi zmdi-google-pages float-right text-muted"></i>
                    <h6 class="text-muted text-uppercase m-b-20">Page</h6>
                    <h2 class="m-b-20" data-plugin="counterup">{{ $page }}</h2>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="zmdi zmdi-translate float-right text-muted"></i>
                    <h6 class="text-muted text-uppercase m-b-20">Path Finder</h6>
                    <h2 class="m-b-20" data-plugin="counterup">{{ $path_finder }}</h2>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="zmdi zmdi-translate float-right text-muted"></i>
                    <h6 class="text-muted text-uppercase m-b-20">Path Finder Reply</h6>
                    <h2 class="m-b-20" data-plugin="counterup">{{ $path_finder_reply }}</h2>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- container -->
</div> <!-- content --> 
@endsection
@push('js')
@endpush