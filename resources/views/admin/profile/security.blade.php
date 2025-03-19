@extends('layouts.admin.admin-layouts')
@section('page-title','Admin-Security | Women In Digital')
@push('page-css')
<!-- form Uploads -->
<link href="{{ asset('assets/admin/plugins/fileuploads/css/dropify.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<style>
  .switchery-demo .switchery {
    margin-bottom: 5px;
  }
  .page-title-box{
    padding: 14px 20px !important;
  }
</style>
@endpush
@section('page-content')
  <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                <div class="page-title-box">
                    <div class="d-flex justify-content-between align-items-center text-muted">
                    <h4 class="page-title float-left"><i class="icon-shield"></i> Profile Security</h4>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                        </li>
                    </ol>
                    </div>
                    <div class="clearfix"></div>
                </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-12">
                    <form  method="POST" action="{{ route('admin.password.update') }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                        <div class="col-md-7">
                            <div class="card-box">
                                <h5 class="header-title text-upper">Update Password</h5>
                                <fieldset class="form-group">
                                    <label for="current_password">Current Password</label>
                                    <input type="password" class="form-control" id="current_password" name="current_password">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="password">New Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password_confirmation" name="password_confirmation" required>
                                </fieldset>
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-arrow-circle-o-up"></i>
                                    <span>Update</span>
                                </button>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end row -->
        </div> <!-- container -->
    </div>
  <!-- content -->
@endsection
@push('page-js')
@endpush

