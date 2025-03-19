@extends('layouts.admin.admin-layouts')
@section('page-title','Gallery-Create | Women In Digital | Admin')
@push('page-css')
<!-- Form Uploads -->
<link href="{{ asset('assets/admin/plugins/fileuploads/css/dropify.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Select Css -->
<link href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Switchery css -->
<link href="{{ asset('assets/admin/plugins/switchery/switchery.min.css') }}" rel="stylesheet" />
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
              <h4 class="page-title float-left"><i class="ti-gallery"></i> Gallery {{ isset($gallery) ? 'Edit' : 'Create' }}</h4>
              <ol class="breadcrumb float-right">
                <li class="breadcrumb-item">
                  <a href="{{ route('admin.gallery.index') }}" class="btn btn-danger">
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
          <form id="roleFrom" role="form" method="POST" action="{{ isset($gallery) ? route('admin.gallery.update',$gallery->id) : route('admin.gallery.store') }}" enctype="multipart/form-data">
            @csrf
            @isset($gallery)
              @method('PUT')
            @endisset
            <div class="row">
              <div class="col-md-6">
                <div class="card-box">
                  <fieldset class="form-group">
                    <label class="control-label">Select Album</label>
                    <select class="form-control select2 @error('album_id') is-invalid @enderror" name="album_id">
                      @foreach ($albums as $album)
                        <option @isset($gallery)
                        {{ $album->id == $gallery->album_id ? 'selected' : '' }}@endisset value="{{ $album->id }}">{{ $album->title }}</option>
                      @endforeach
                    </select>
                  </fieldset>
                  <fieldset>
                    <label for="thumbnail"> Upload Gallery Image <span class="text-danger"><b>*</b></span> <span class="text-muted">Max-Size 1MB</span></label>
                    <input type="file" name="thumbnail" id="thumbnail" class="dropify" data-default-file="{{ isset($gallery) ? asset('uploads/galleries/'. $gallery->thumbnail) : '' }}" data-max-file-size="1M" />
                  </fieldset>
                  <fieldset class="form-group">
                    <div class="switchery-demo m-t-20">
                      <input type="checkbox" @isset($gallery) {{ $gallery->status == true ? 'checked' : '' }} @endisset data-plugin="switchery" id="status" name="status" data-color="#1bb99a" data-size="small"/>
                      <label class="control-label" for="status">Status</label>
                    </div>
                  </fieldset>
                  <button type="submit" class="btn btn-success">
                    @isset($gallery)
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
<!-- Select Js -->
<script src="{{ asset('assets/admin/plugins/multiselect/js/jquery.multi-select.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/admin/pages/jquery.formadvanced.init.js') }}"></script>
<!-- Switchery -->
<script src="{{ asset('assets/admin/plugins/switchery/switchery.min.js') }}"></script>
<!-- file uploads js -->
<script src="{{ asset('assets/admin/plugins/fileuploads/js/dropify.min.js') }}"></script>
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
