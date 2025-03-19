@extends('layouts.frontend.frontend-layouts')
@section('title', 'Path-Finder-Reply | Wome-In-Digital')
@push('meta-tag')
<meta property="og:title" content="Path-Finder-Reply | Wome-In-Digital" />
<meta property="og:description" content="Empowering-women | Women-in-Digital | Female-technologists  | Bringing-more-women | Women-in-Technology | Digital-Bangladesh | Digital Women | Tech Women | Women-Hackathon | Innovation-challenge | Career-Counselling | Women engineer" />
<meta property="og:url" content="{{ route('path.finder.question', $path_finder_question->id) }}" />
<meta property="og:image" content="{{ asset('assets/application-default/seo-image/wid-logo-t.jpg') }}" />
@endpush
@push('page-css')
<style>
  .reply-box{

    max-height: 440px;
    overflow-y: scroll;
    padding: 10px 20px;
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
  .card{
    padding: 20px;
  }
  label{
    font-weight: 500;
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
        {{-- <h5><span>Pathfinder</span></h5> --}}
        <h3>Pathfinder</h3>
        <p>Pathfinder is a first-of-its kind application that gives women the chance to ask questions about their career and rights directly to experts that can help. <br> Women can openly ask any type of their career business related question here.</p>
    </div>
  </div>
  <!-- Page Banner End -->

  <!-- Path Finder Reply -->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <p class="text-muted">Published Time : {{ date('F j, Y - g:i a', strtotime($path_finder_question->updated_at)) }}</p>
              <h5 class="pb-3"><strong>Question : </strong> <span class="text-muted">{{ $path_finder_question->question }}</span></h5>
            <input type="hidden" value="{{ $path_finder_question->id }}" name="path_finder_id">
            <h5 class="pb-2">Previous Answer</h5>
            <div class="reply-box">
              @if($path_finder_reply->isNotEmpty())
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
        <div class="col-md-6">
          <form id="roleFrom" role="form" method="POST" action="{{ route('path.finder.reply.store') }}">
            @csrf
            <div class="card">
              <div class="mb-3">
                <label for="email" class="form-label">Enter Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter Email" required>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="reply" class="form-label">Answer to this question</label>
                <textarea name="reply" id="reply" cols="20" rows="7" class="form-control @error('reply') is-invalid @enderror" required></textarea>
                @error('reply')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <input type="hidden" name="path_finder_id" value="{{ $path_finder_question->id }}">
              <button type="submit" class="btn primary-btn">
                <i class="bi bi-reply"></i>
                <span>Reply</span>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-61f3833efbf5966c"></script>
  </section>
  <!-- Path Finder Reply End -->

@endsection
@push('page-js')
@endpush
