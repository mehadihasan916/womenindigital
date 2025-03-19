@extends('layouts.admin.admin-layouts')
@section('page-title','Album-Create | Women In Digital | Admin')
@push('page-css')
<!-- Switchery css -->
<link href="{{ asset('assets/admin/plugins/switchery/switchery.min.css') }}" rel="stylesheet" />
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
              <h4 class="page-title float-left"><i class="ion-ios7-albums-outline"></i> Album {{ isset($album) ? 'Edit' : 'Create' }}</h4>
              <ol class="breadcrumb float-right">
                <li class="breadcrumb-item">
                  <a href="{{ route('admin.album.index') }}" class="btn btn-danger">
                    <i class="fa fa-arrow-circle-o-left"></i>
                    <span>Back to list</span>
                  </a>
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
          <form id="roleFrom" role="form" method="POST" action="{{ isset($album) ? route('admin.album.update',$album->id) : route('admin.album.store') }}" enctype="multipart/form-data">
            @csrf
            @isset($album)
              @method('PUT')
            @endisset
            <div class="row">
              <div class="col-md-6">
                <div class="card-box">
                  <fieldset class="form-group">
                    <label for="title">Album Name <span class="text-danger"><b>*</b></span> <span class="text-muted">Max char: 100</span></label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ $album->title ?? old('title') }}" id="title" name="title" required>
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </fieldset>
                  <fieldset class="form-group">
                    <label for="position">Position <span class="text-muted">(Optional)</span></label>
                    <input type="number" class="form-control @error('position') is-invalid @enderror" value="{{ $album->position ?? old('position') }}" id="position" name="position" min="1">
                    @error('position')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </fieldset>
                  <fieldset class="form-group">
                    <div class="switchery-demo m-t-20">
                      <input type="checkbox" @isset($album) {{ $album->status == true ? 'checked' : '' }} @endisset data-plugin="switchery" id="status" name="status" data-color="#1bb99a" data-size="small"/>
                      <label class="control-label" for="status">Status</label>
                    </div>
                  </fieldset>
                  <button type="submit" class="btn btn-success">
                    @isset($album)
                      <i class="fa fa-arrow-circle-o-up"></i>
                      <span>Update</span>
                    @else
                      <i class="fa fa-plus-circle"></i>
                      <span>Create</span>
                    @endisset
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
<!-- Switchery -->
<script src="{{ asset('assets/admin/plugins/switchery/switchery.min.js') }}"></script>
@endpush
