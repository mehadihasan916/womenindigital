@extends('layouts.frontend.frontend-layouts')
@section('title', 'Become-A-Ambassador | Wome-In-Digital')
@push('meta-tag')
<meta property="og:title" content="Become A Ambassador | Women-In-Digital" />
<meta property="og:description" content="Empowering-women | Women-in-Digital | Female-technologists  | Bringing-more-women | Women-in-Technology | Digital-Bangladesh | Digital Women | Tech Women | Women-Hackathon | Innovation-challenge | Career-Counselling | Women engineer" />
<meta property="og:url" content="{{ route('become.a.ambassador') }}" />
<meta property="og:image" content="{{ asset('assets/application-default/seo-image/wid-logo-t.jpg') }}" />
@endpush
@push('page-css')
<style>
  .ambassador .card{
    padding: 20px 20px;
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
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
          <h5><span>Become A Ambassador</span></h5>
          <h3>Women In Digital</h3>
          <p></p>
        </div>
      </div>
    </div>
  </div>
  <!-- Page Banner End -->

  <!-- Become A Ambassador -->
  <section class="ambassador">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
          <div class="card">
            <h4 class="pb-3">Application For Become A Ambassador</h4>
            <form action="{{ route('ambassador.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group user-avater mt-4">
                <span>Upload Your Image</span><span class="text-muted"> (PNG or JPEG, Max 1MB, and 350px * 350px)</span>
                <div class="avatar-upload">
                  <div class="avatar-edit">
                    <input type='file' id="imageUpload" name="thumbnail" accept=".png, .jpg, .jpeg" />
                    <label for="imageUpload"><i class="bi bi-camera"></i></label>
                  </div>
                  <div class="avatar-preview">
                    <div id="imagePreview" style="background-image: url(../assets/application-default/img/user-avater.jpg););">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" placeholder="Ambassador Name" required>
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="col-md-6 form-group mt-4 mt-md-0">
                  <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="email" placeholder="Ambassador Email" required>
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-4">
                  <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" id="phone" placeholder="Ambassador Phone Number" required>
                  @error('phone')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="col-md-6 form-group mt-4">
                  <input type="text" class="form-control @error('nid') is-invalid @enderror" name="nid" value="{{ old('nid') }}" id="nid" placeholder="Ambassador NID Number">
                  @error('nid')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-4">
                  <textarea class="form-control @error('profession') is-invalid @enderror" name="profession" rows="5" placeholder="Ambassador Profession & Expertise / Max-Length: 500 char" required>{{ old('profession') }}</textarea>
                  @error('profession')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="col-md-6 form-group mt-4">
                  <textarea class="form-control @error('bio') is-invalid @enderror" name="bio" rows="5" placeholder="Ambassador Bio / Max-Length: 500 char" required>{{ old('bio') }}</textarea>
                  @error('bio')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                
                <div class="col-md-6 form-group mt-4">
                  <input class="form-control @error('bio') is-invalid @enderror" name="institution" rows="5" placeholder="Institution Name/ City Name" required>{{ old('institution') }}</input>
                  @error('institution')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                
                <div class="col-md-6 form-group mt-4">
                  <input class="form-control @error('bio') is-invalid @enderror" type="url" name="facebook" rows="5" placeholder="Facebook profile link" required>{{ old('facebook') }}</input>
                  @error('facebook')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                
                <div class="col-md-6 form-group mt-4">
                  <input class="form-control @error('bio') is-invalid @enderror" type="url" name="linkedin" rows="5" placeholder="Linkedin profile link" required>{{ old('linkedin') }}</input>
                  @error('linkedin')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                
                
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
  <!-- Become A Ambassador End -->
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