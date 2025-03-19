@extends('layouts.admin.admin-layouts')
@section('page-title','Question Reply | Women In Digital | Admin')
@push('page-css')
<style>
  .switchery-demo .switchery {
    margin-bottom: 5px;
  }
  .page-title-box{
    padding: 14px 20px !important;
  }
  .reply-box{
    max-height: 440px;
    overflow-y: scroll;
  }
  .reply-box ul li{
    list-style-type: none;
    padding: 10px 10px;
    margin-bottom: 20px;
    box-shadow: 0 25px 50px -12px rgb(0 0 0 / 0.25);
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
    border-bottom-left-radius: 10px;
  }
  .reply-box ul li:nth-child(odd) {
    background: #F5F5F5;
  }
  .reply-box ul li:nth-child(even) {
    background: #ffeaea;
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
              <h4 class="page-title float-left"><i class="zmdi zmdi-translate"></i> Path Finder Question & Answer</h4>
              <ol class="breadcrumb float-right">
                <li class="breadcrumb-item">
                  <a href="{{ route('admin.path-finder.index') }}" class="btn btn-danger">
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
          <form id="roleFrom" role="form" method="POST" action="{{ route('admin.path-finder-reply.store') }}">
            @csrf
            <div class="row">
              <div class="col-md-7">
                <div class="card-box">
                  <h6 class="text-muted">Published Time : {{ date('F j, Y - g:i a', strtotime($path_finder_question->updated_at)) }}</h6>
                  <h6 class="text-muted">Published By : {{ $path_finder_question->email }}</h6>
                  <h5 class="pb-3"><strong>Question : </strong> <span class="text-muted">{{ $path_finder_question->question }}</span></h5>
                  <input type="hidden" value="{{ $path_finder_question->id }}" name="path_finder_id">
                  <fieldset class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ Auth::user()->email }}" required>
                  </fieldset>
                  <fieldset class="form-group">
                    <label for="reply">Reply to this question <span class="text-danger"><b>*</b></span> <span class="text-muted">Max char : 500</span></label>
                    <textarea name="reply" id="reply" cols="30" rows="10" class="form-control" required></textarea>
                  </fieldset>
                  <input type="hidden" value="1" name="is_publish">
                  <button type="submit" class="btn btn-success">
                    <i class="zmdi zmdi-comment-outline"></i>
                    <span>Reply</span>
                  </button>
                </div>
              </div>
              <div class="col-md-5">
                <div class="card-box reply-box">
                  <h5>Previous Answer</h5>
                  @if(count($path_finder_reply) > 0)
                    <ul class="p-0">
                      @foreach ($path_finder_reply as $reply)
                      <li>
                        <span><strong>Time :</strong> {{ date('F j, Y - g:i a', strtotime($reply->updated_at)) }}</span><br>
                        {{ $reply->reply }}
                      </li>
                      @endforeach
                    </ul>
                  @else
                  <ul  class="p-0">
                    <li>No Answer Available</li>
                  </ul>
                  @endif
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

