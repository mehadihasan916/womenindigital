@extends('layouts.admin.admin-layouts')
@section('page-title','Page-Builder-Create | Women In Digital | Admin')
@push('page-css')
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
              <h4 class="page-title float-left"><i class="zmdi zmdi-google-pages"></i> Page Builder {{ isset($page_builder) ? 'Edit' : 'Create' }}</h4>
              <ol class="breadcrumb float-right">
                <li class="breadcrumb-item">
                  <a href="{{ route('admin.page-builder.index') }}" class="btn btn-danger">
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
          <form id="roleFrom" role="form" method="POST" action="{{ isset($page_builder) ? route('admin.page-builder.update',$page_builder->id) : route('admin.page-builder.store') }}" enctype="multipart/form-data">
            @csrf
            @isset($page_builder)
              @method('PUT')
            @endisset
            <div class="row justify-content-center">
              <div class="col-md-10">
                <div class="card-box">
                    <fieldset class="form-group">
                        <label for="title">Title <span class="text-danger"><b>*</b></span> <span class="text-muted">Max char: 255</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ $page_builder->title ?? old('title') }}" id="title" name="title">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </fieldset>
                    

                  <fieldset class="form-group">
                    <label>Page Banner</label>
                    <textarea class="form-control" id="summernote_2" name="page_banner">
                      @isset($page_builder)
                        {!! $page_builder->page_banner !!}
                      @endisset
                    </textarea>
                  </fieldset>

                  <fieldset class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" id="summernote" name="body">
                      @isset($page_builder)
                        {!! $page_builder->body !!}
                      @endisset
                    </textarea>
                  </fieldset>

                  <fieldset class="form-group">
                    <div class="switchery-demo m-t-20">
                      <input type="checkbox" @isset($page_builder) {{ $page_builder->status == true ? 'checked' : '' }} @endisset data-plugin="switchery" id="status" name="status" data-color="#1bb99a" data-size="small"/>
                      <label class="control-label" for="status">Status</label>
                    </div>
                  </fieldset>
                  <button type="submit" class="btn btn-success">
                    @isset($page_builder)
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
<script type="text/javascript">
  $(document).ready(function () {
      $('#summernote_2').summernote({
          height: 450,
      });
  });
</script>
@endpush
