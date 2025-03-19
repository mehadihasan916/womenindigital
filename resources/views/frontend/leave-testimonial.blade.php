@extends('layouts.frontend.frontend-layouts')
@section('title', 'Leave-A-Testimonial | Wome-In-Digital')
@push('meta-tag')
<meta property="og:title" content="Leave-A-Testimonial | Wome-In-Digital" />
<meta property="og:description" content="Empowering-women | Women-in-Digital | Female-technologists  | Bringing-more-women | Women-in-Technology | Digital-Bangladesh | Digital Women | Tech Women | Women-Hackathon | Innovation-challenge | Career-Counselling | Women engineer" />
<meta property="og:url" content="{{ route('leave.testimonial') }}" />
<meta property="og:image" content="{{ asset('assets/application-default/seo-image/wid-logo-t.jpg') }}" />
@endpush
@push('page-css')
<style>
  .leave-testimonial .card{
    padding: 30px 20px;
    box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
  }
  /* avater css start */
  .avatar-upload {
    position: relative;
    max-width: 205px;
    margin-bottom: 20px;
  }
  .avatar-upload .avatar-edit {
    position: absolute;
    right: 60px;
    z-index: 1;
    top: 12px;
  }
  .avatar-upload .avatar-edit input {
    display: none;
  }
  .avatar-upload .avatar-edit input+label {
    display: inline-block;
    width: 34px;
    height: 34px;
    margin-bottom: 0;
    border-radius: 100%;
    background: #FFFFFF;
    border: 1px solid transparent;
    box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
    cursor: pointer;
    font-weight: normal;
    transition: all .2s ease-in-out;
  }
  .avatar-upload .avatar-edit input+label:hover {
    background: #f1f1f1;
    border-color: #d6d6d6;
  }
  .avatar-upload .avatar-edit input+label > i {
    color: #757575;
    position: absolute;
    top: 4px;
    left: 0;
    right: 0;
    text-align: center;
    margin: auto;
    font-size: 18px;
  }
  .avatar-upload .avatar-preview {
    width: 150px;
    height: 150px;
    position: relative;
    border-radius: 100%;
    border: 6px solid #F8F8F8;
    box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
  }
  .avatar-upload .avatar-preview>div {
    width: 100%;
    height: 100%;
    border-radius: 100%;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
  }
  .control-indicator{
    background: #000;
  }
  .redio_button_label > div{
    display: flex;
    justify-content: space-around;
  }
  .redio_button_label > div input{
    width: inherit !important;
    margin-bottom: 20px !important;
  }
  .user-avater span{
    font-size: 14px;
    font-weight: 600;
  }
  /* avater css end */
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
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-10">
          <h3>Leave A Testimonial</h3>
        </div>
      </div>
    </div>
  </div>
  <!-- Page Banner End -->

  <!-- Leave A Testimonial -->
  <section class="leave-testimonial">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-10">
          <div class="card">
            <h4 class="pb-3">Leave A Testimonial</h4>
            <form action="{{ route('testimonial.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group user-avater">
                <span>Upload Your Image</span>
                <div class="avatar-upload">
                  <div class="avatar-edit">
                    <input type='file' id="imageUpload" name="thumbnail" accept=".png, .jpg, .jpeg" />
                    <label for="imageUpload"><i class="bi bi-camera"></i></label>
                  </div>
                  <div class="avatar-preview">
                    <div id="imagePreview" style="background-image: url(../assets/application-default/img/user-avater.jpg);">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Your Name" value="{{ old('name') }}" required>
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="col-md-6 form-group mt-4 mt-md-0">
                  <input type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" id="designation" placeholder="Your Designation" value="{{ old('designation') }}" required>
                  @error('designation')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-group mt-4 mt">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Your Email" value="{{ old('email') }}" required>
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group mt-4">
                <textarea class="form-control @error('email') is-invalid @enderror" name="comment" rows="5" placeholder="Message" maxlength="500" required>{{ old('comment') }}</textarea>
                @error('comment')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="text-center mt-4">
                <button class="btn primary-btn" type="submit">Send</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Leave A Testimonial End -->
@endsection
@push('page-js')
<script>
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
        $('#imagePreview').hide();
        $('#imagePreview').fadeIn(650);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#imageUpload").change(function () {
      readURL(this);
  });
</script>
@endpush