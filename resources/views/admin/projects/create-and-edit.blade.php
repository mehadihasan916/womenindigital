@extends('layouts.admin.admin-layouts')
@section('page-title','Project-Create | Women In Digital | Admin')
@push('page-css')
<!-- Form Uploads -->
<link href="{{ asset('assets/admin/plugins/fileuploads/css/dropify.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Switchery css -->
<link href="{{ asset('assets/admin/plugins/switchery/switchery.min.css') }}" rel="stylesheet" />
<!-- Summernote Css CDN -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<style>
  .switchery-demo .switchery {
    margin-bottom: 5px;
  }
  .page-title-box{
    padding: 14px 20px !important;
  }
  textarea{
    height: 300px;
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
              <h4 class="page-title float-left"><i class="zmdi zmdi-view-quilt"></i> Project {{ isset($project) ? 'Edit' : 'Create' }}</h4>
              <ol class="breadcrumb float-right">
                <li class="breadcrumb-item">
                  <a href="{{ route('admin.project.index') }}" class="btn btn-danger">
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
          <form id="roleFrom" role="form" method="POST" action="{{ isset($project) ? route('admin.project.update',$project->id) : route('admin.project.store') }}" enctype="multipart/form-data">
            @csrf
            @isset($project)
              @method('PUT')
            @endisset
            <div class="row justify-content-center">
              <div class="col-md-10">
                <div class="card-box">
                  <div class="row">
                    <div class="col-md-6">
                      <fieldset class="form-group">
                        <label for="title">Title <span class="text-danger"><b>*</b></span> <span class="text-muted">Max char: 255</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ $project->title ?? old('title') }}" id="title" name="title" required>
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </fieldset>
                      <fieldset class="form-group">
                        <label for="s-description">Short Description <span class="text-danger"><b>*</b></span> <span class="text-muted">Max char: 300</span></label>
                        <textarea class="form-control @error('short_description') is-invalid @enderror" name="short_description" id="s-description" rows="4" required maxlength="300">{{ $project->short_description ?? old('short_description') }}</textarea>
                        @error('short_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </fieldset>
                    </div>
                    <div class="col-md-6">
                      <fieldset>
                        <label for="thumbnail"> Upload Project Thumbnail <span class="text-danger"><b>*</b> </span><span class="text-muted">Max-Size 1MB</span></label>
                        <input type="file" name="thumbnail" id="thumbnail" class="dropify" data-default-file="{{ isset($project) ? asset('uploads/projects/'. $project->thumbnail) : '' }}" data-max-file-size="1M" />
                      </fieldset>
                    </div>
                  </div>
                  <fieldset class="form-group">
                    <label for="supported-by">Supported By <span class="text-muted">(Optional) Max char: 191</span></label>
                    <input type="text" class="form-control @error('supported_by') is-invalid @enderror" value="{{ $project->supported_by ?? old('supported_by') }}" id="supported-by" name="supported_by">
                    @error('supported_by')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </fieldset>
                  <fieldset class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" id="summernote" name="body">
                      @isset($project)
                        {!! $project->body !!}
                      @endisset
                    </textarea>
                  </fieldset>
                  <fieldset class="form-group">
                    <div class="switchery-demo m-t-20">
                      <input type="checkbox" @isset($project) {{ $project->status == true ? 'checked' : '' }} @endisset data-plugin="switchery" id="status" name="status" data-color="#1bb99a" data-size="small"/>
                      <label class="control-label" for="status">Status</label>
                    </div>
                  </fieldset>
                  <button type="submit" class="btn btn-success">
                    @isset($project)
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
<!-- file uploads js -->
<script src="{{ asset('assets/admin/plugins/fileuploads/js/dropify.min.js') }}"></script>
<!-- Summernote Js CDN -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
  $('.dropify').dropify({
      messages: {
          'default': 'Drag and drop a file here or click',
          'replace': 'Drag and drop or click to replace',
          'remove': 'Remove',
          'error': 'Ooops, something wrong appended.'
      },
      error: {
          'fileSize': 'The file size is too big (1M max).'
      }
  });
</script>
<script type="text/javascript">
  $(document).ready(function () {
      $('#summernote').summernote({
          height: 450,
      });
  });
</script>
@endpush
