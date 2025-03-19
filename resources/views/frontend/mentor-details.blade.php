@extends('layouts.frontend.frontend-layouts')
@section('title', 'Mentors-Details | Wome-In-Digital')
@push('meta-tag')
<meta property="og:title" content="Mentor Details {{ $mentor->name }} | Wome-In-Digital" />
<meta property="og:description" content="Empowering-women | Women-in-Digital | Female-technologists  | Bringing-more-women | Women-in-Technology | Digital-Bangladesh | Digital Women | Tech Women | Women-Hackathon | Innovation-challenge | Career-Counselling | Women engineer" />
<meta property="og:url" content="{{ route('mentor.details', $mentor->id) }}" />
<meta property="og:image" content="{{ asset('uploads/mentor-application/' . $mentor->thumbnail) }}" />
@endpush
@push('page-css')
<style>
  .card{
    padding: 30px;
    box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
  }
  .img-section{
    /*display: flex;*/
    /*justify-content: center;*/
    /*align-items: center;*/
  }
  .img-section img{
    width: 100%;
    /*height: 100%;*/
    object-fit: cover;
  }
  .mentor-grid{
    display: grid;
    grid-template-columns: 50% 50%;
  }
  .content-section{
    padding: 20px;
  }
  /* Responsive */
  @media only screen and (min-width: 768px) and (max-width: 991.98px) {  
    .mentor-grid{
      grid-template-columns: 100%;
    }
  }
  @media only screen and (min-width: 576px) and (max-width: 767.98px) { 
    .mentor-grid{
      grid-template-columns: 100%;
    }
  }
  @media only screen and (min-width: 450px) and (max-width: 575.98px) {  
    .img-section img{
      width: 100%;
      max-height: 300px;
    }
    .mentor-grid{
      grid-template-columns: 100%;
    } 
  }
  @media only screen and (min-width: 310px) and (max-width: 449.98px) {  
    .img-section img{
      width: 100%;
      max-height: 300px;
      object-fit: cover;
    }
    .mentor-grid{
      grid-template-columns: 100%;
    }
    .card {
      padding: 20px;
    }
    .content-section {
      padding: 20px 0px;
    }
  }
</style>
@endpush
@section('page-content')
  <!-- Page Banner  -->
  <div id="page-banner" style="background-image: url({{ asset('assets/frontend/img/page-banner/team-banner.png') }});">
    <div class="container">
      <h3>Mentor Details</h3>
    </div>
  </div>
  <!-- Page Banner End -->

  <!-- Mentor Program Details -->
  <section>
    <div class="container">
      <div class="card">
        <div class="mentor-grid">
          <div class="img-section">
            <img src="{{ asset('uploads/mentor-application/' . $mentor->thumbnail) }}" class="card-img-top" alt="{{ $mentor->name }}">
          </div>
          <div class="content-section">
            <h5 class="card-title">{{ $mentor->name }}</h5>
            <p class="card-text py-2"><strong>Profession :</strong> {{ $mentor->profession }}</p>
            <span><strong style="display: inline;">Bio :</strong> <p class="card-text py-2"  id="main" style="display: inline;">{{ $mentor->bio }}</p></span>
            <button type="button" class="btn primary-btn px-3" style="margin-top:20px;" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Hire</button>
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-61f3833efbf5966c"></script>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Mentor Program Details End -->

<!-- Vertically centered modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">For Hire The Mentor Fill up this Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{ route('hire.mentor') }}">
      <div class="modal-body">
          @csrf
          <div class="mb-3">
            <label for="name" class="col-form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required>
            @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="email" class="col-form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required>
            @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="phone" class="col-form-label">Phone</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" required>
            @error('phone')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <input type="hidden" name="mentor_name" value="{{ $mentor->name }}">
          <input type="hidden" name="mentor_email" value="{{ $mentor->email }}">
          <input type="hidden" name="mentor_phone" value="{{ $mentor->phone }}">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn primary-btn btn-sm px-3">Submit</button>
      </div>
    </form>
    </div>
  </div>
</div>
<script>
        const text = document.getElementById('main').innerText;
        const textAfterNewLine = text.split("<br>");

        let txt = "";
        textAfterNewLine.forEach(myFunction);
document.getElementById("main").innerHTML = txt;

function myFunction(value, index, array) {
  txt += value + "<br>"; 
}
    </script>
@endsection
@push('page-js')
@endpush