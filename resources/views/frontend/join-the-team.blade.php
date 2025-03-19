@extends('layouts.frontend.frontend-layouts')
@section('title', 'Join-The-Team | Wome-In-Digital')
@push('meta-tag')
<meta property="og:title" content="Join-The-Team | Wome-In-Digital" />
<meta property="og:description" content="Empowering-women | Women-in-Digital | Female-technologists  | Bringing-more-women | Women-in-Technology | Digital-Bangladesh | Digital Women | Tech Women | Women-Hackathon | Innovation-challenge | Career-Counselling | Women engineer" />
<meta property="og:url" content="{{ route('join.the.team') }}" />
<meta property="og:image" content="{{ asset('assets/application-default/seo-image/wid-logo-t.jpg') }}" />
@endpush
@push('page-css')
<style>
  .join-team .card{
    padding: 20px 20px;
    box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
  }
  .inputfile-box label{
    display: block;
    color: #6C757D;
  }
  .inputfile-box {
    position: relative;
  }
  .inputfile {
    display: none;
  }
  .file-box {
    display: inline-block;
    width: 100%;
    border: 1px solid #CED4DA;
    padding: 5px 0px 5px 5px;
    box-sizing: border-box;
    height: calc(2rem - -8px);
    border-radius: 0.25rem;
    cursor: pointer;
  }
  .file-button {
    background: #ED1D24;
    color: white;
    padding: 6px 12px;
    position: absolute;
    border: 2px solid #ED1D24;
    border-radius: 3px;
    right: 0px;
    font-weight: 400;
    cursor: pointer;
  }
  .file-button i{
    font-weight: 400;
  }
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
          <h3>Join The Team</h3>
        </div>
      </div>
    </div>
  </div>
  <!-- Page Banner End -->

  <!-- Join The Team  -->
  <section class="join-team">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
          <div class="card">
            <h4 class="pb-3">Join The Team</h4>
            <form action="{{ route('join.the.team.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" placeholder="Your Name" required>
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="col-md-6 form-group mt-4 mt-md-0">
                  <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="email" placeholder="Your Email" required>
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-4">
                  <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" id="phone" placeholder="Your Phone Number" required>
                  @error('phone')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="col-md-6 form-group mt-4">
                  <input type="text" class="form-control @error('nid') is-invalid @enderror" name="nid" value="{{ old('nid') }}" id="nid" placeholder="Your NID Number">
                  @error('nid')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-group mt-4">
                <div class="inputfile-box">
                  <input type="file" id="file" name="cv" class="inputfile @error('cv') is-invalid @enderror" onchange='uploadFile(this)' required>
                  <label for="file">File Type Only: pdf/doc
                    <span id="file-name" class="file-box"></span>
                    <span class="file-button">
                      <i class="bi bi-upload"></i>
                      Upload - CV
                    </span>
                  </label>
                  @error('cv')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-group mt-4">
                <textarea class="form-control @error('bio') is-invalid @enderror" name="bio" rows="5" placeholder="Expertise Bio / Max-Length: 500 char" maxlength="500" required>{{ old('bio') }}</textarea>
                @error('bio')
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
  <!-- Join The Team End -->
@endsection
@push('page-js')
<script>
  function uploadFile(target) {
    document.getElementById("file-name").innerHTML = target.files[0].name;
  }
</script>
@endpush
