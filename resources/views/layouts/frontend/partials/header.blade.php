<style>
    a.nav-link.active {
        letter-spacing: .5px;
    }
    .hire_us,.join_school{
      padding-top: 0 !important;
    }
    .hire_us a{
      color: #ffb317 !important;
    }
    .hire_us{
      text-align: left;
      line-height: 11px;
    }
    .join_school a{
      color: #c2000c !important;
    }
    .join_school a span{
      font-size: 10px;
    }
    .hire_us a span{
      font-size: 10px;
    }
    .join_school{
      text-align: left;
      line-height: 11px;
    }
    .navbar-nav {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="{{ route('index') }}">
      <img src="{{ asset('assets/frontend/img/logo/logo_top.png') }}" alt="brand-logo" class="img-fluid">
    </a>
    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content">
      <div class="hamburger-toggle">
        <div class="hamburger">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </button>
    <div class="collapse navbar-collapse" id="navbar-content">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item menu-first">
          <a class="nav-link active" aria-current="page" href="{{ route('index') }}">Home</a>
        </li>
        <li class="nav-item dropdown dropdown-mega position-static">
          <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-auto-close="outside">about us</a>
          <div class="dropdown-menu shadow py-0">
            <div class="mega-content">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12 col-md-6">
                    <div class="pt-3 ps-3 ps-md-4 mobile-menu">
                      <h6><strong>ABOUT US</strong></h6>
                      <ul class="pt-2 pt-md-3">
                        <li class="nav-item"><a href="{{ route('about.us') }}" class="dropdown-item text-wrap">about us</a></li>
                        <li class="nav-item"><a href="{{ route('mission') }}" class="dropdown-item text-wrap">mission</a></li>
                        <!--<li class="nav-item"><a href="javascript:void(0)" class="dropdown-item text-wrap">our history</a></li>-->
                        <li class="nav-item"><a href="{{ route('team') }}" class="dropdown-item text-wrap">meet the team</a></li>
                        <li class="nav-item"><a href="{{ route('gallery') }}" class="dropdown-item text-wrap">gallery</a></li>
                        <li class="nav-item"><a href="{{ route('policy') }}" class="dropdown-item text-wrap">policy</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-12 col-md-6 text-right pe-0">
                    <img src="{{ asset('assets/frontend/img/menu-img/menu-img.jpg') }}" alt="menu-img" class="img-fluid d-none d-md-block my-0 ms-auto">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item dropdown dropdown-mega position-static">
          <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-auto-close="outside">our solution</a>
          <div class="dropdown-menu shadow py-0">
            <div class="mega-content">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12 col-md-6">
                    <div class="pt-3 ps-3 ps-md-4 mobile-menu">
                      <h6><strong>OUR SOLUTION</strong></h6>
                      <ul class="pt-2 pt-md-3">
                        <li class="nav-item"><a href="https://mashtor.com/" class="dropdown-item text-wrap" target="_blank">tech school</a></li>
                        <li class="nav-item"><a href="http://luminadev.com/" class="dropdown-item text-wrap" target="_blank">digital agency</a></li>
                        <li class="nav-item"><a href="https://www.womenindigital.net/project-details/8" class="dropdown-item text-wrap" target="_blank">digital health</a></li>
                        <li class="nav-item"><a href="https://www.womenindigital.net/blog-details/5" class="dropdown-item text-wrap" target="_blank">women in cybersecurity</a></li>
                        <li class="nav-item"><a href="https://www.facebook.com/groups/womeninecommerce.com.bd" class="dropdown-item text-wrap" target="_blank">women in e-commerce</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-12 col-md-6 text-right pe-0">
                    <img src="{{ asset('assets/frontend/img/menu-img/menu-img.jpg') }}" alt="menu-img" class="img-fluid  d-none d-md-block my-0 ms-auto">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item dropdown dropdown-mega position-static">
          <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-auto-close="outside">event</a>
          <div class="dropdown-menu shadow py-0">
            <div class="mega-content">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12 col-md-6">
                    <div class="pt-3 ps-3 ps-md-4 mobile-menu">
                      <h6><strong>EVENT</strong></h6>
                      <ul class="pt-2 pt-md-3">
                        <li class="nav-item"><a href="{{ route('events') }}" class="dropdown-item text-wrap">upcoming event</a></li>
                        <li class="nav-item"><a href="{{ route('events') }}" class="dropdown-item text-wrap">all events</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-12 col-md-6 text-right pe-0">
                    <img src="{{ asset('assets/frontend/img/menu-img/menu-img.jpg') }}" alt="menu-img" class="img-fluid  d-none d-md-block my-0 ms-auto">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item dropdown dropdown-mega position-static">
          <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-auto-close="outside">Article</a>
          <div class="dropdown-menu shadow py-0">
            <div class="mega-content">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12 col-md-6">
                    <div class="pt-3 ps-3 ps-md-4 mobile-menu">
                      <h6><strong>CONTENT</strong></h6>
                      <ul class="pt-2 pt-md-3">
                        <li class="nav-item"><a href="{{ route('blogs') }}" class="dropdown-item text-wrap">blog</a></li>
                        <li class="nav-item"><a href="{{ route('stories') }}" class="dropdown-item text-wrap">stories</a></li>
                        <!--<li class="nav-item"><a href="javascript:void(0)" class="dropdown-item text-wrap">art</a></li>-->
                        <!--<li class="nav-item"><a href="javascript:void(0)" class="dropdown-item text-wrap">podcast</a></li>-->
                        <li class="nav-item"><a href="{{ route('videos') }}" class="dropdown-item text-wrap">video</a></li>
                        <li class="nav-item"><a href="{{ route('news') }}" class="dropdown-item text-wrap">news</a></li>
                        <li class="nav-item"><a href="{{ route('indomitable-womens') }}" class="dropdown-item text-wrap">indomitable women</a></li>
                         <li class="nav-item"><a href="{{ route('vision') }}" class="dropdown-item text-wrap">vision 2027</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-12 col-md-6 text-right pe-0">
                    <img src="{{ asset('assets/frontend/img/menu-img/menu-img.jpg') }}" alt="menu-img" class="img-fluid  d-none d-md-block my-0 ms-auto">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item dropdown dropdown-mega position-static">
          <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-auto-close="outside">community</a>
          <div class="dropdown-menu shadow py-0">
            <div class="mega-content">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12 col-md-6 col-lg-3">
                    <div class="pt-3 ps-3 ps-md-4 mobile-menu">
                      <h6><strong>COMMUNITY</strong></h6>
                      <ul class="pt-2 pt-md-3" id="mg-menu">
                        <li class="nav-item"><a href="{{ route('mentor.program') }}" class="dropdown-item text-wrap">mentor program</a></li>
                        <li class="nav-item"><a href="{{ route('path.finder') }}" class="dropdown-item text-wrap">pathfinder</a></li>
                        <li class="nav-item"><a href="{{ route('ambassadors') }}" class="dropdown-item text-wrap">ambassador</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-12 col-md-6 col-lg-3">
                    <div class="pt-3 ps-3 ps-md-4 mobile-menu">
                      <h6><strong>LIBRARY</strong></h6>
                      <ul>
                        <li class="nav-item"><a href="javascript:void(0)" class="dropdown-item text-wrap">motivational</a></li>
                      </ul>
                      <ul>
                        <li class="nav-item"><a href="https://drive.google.com/drive/folders/1EBKXM1zLQKK49Xe3vdt3hWiPAWpHHQfp" class="dropdown-item text-wrap" target="_blank">Comics Collection</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-12 col-md-6 col-lg-3">
                    <!--<div class="pt-3 ps-3 ps-md-4 mobile-menu">-->
                    <!--  <h6><strong>SHOP</strong></h6>-->
                    <!--  <ul>-->
                    <!--    <li class="nav-item"><a href="javascript:void(0)" class="dropdown-item text-wrap">apparel</a></li>-->
                    <!--    <li class="nav-item"><a href="javascript:void(0)" class="dropdown-item text-wrap">accessories</a></li>-->
                    <!--    <li class="nav-item"><a href="javascript:void(0)" class="dropdown-item text-wrap">artwork</a></li>-->
                    <!--    <li class="nav-item"><a href="javascript:void(0)" class="dropdown-item text-wrap">mobile app</a></li>-->
                    <!--    <li class="nav-item"><a href="javascript:void(0)" class="dropdown-item text-wrap">scholarship</a></li>-->
                    <!--    <li class="nav-item"><a href="javascript:void(0)" class="dropdown-item text-wrap">program</a></li>-->
                    <!--  </ul>-->
                    <!--</div>-->
                  </div>
                  <div class="col-12 col-md-6 col-lg-3 text-right pe-0">
                    <img src="{{ asset('assets/frontend/img/menu-img/menu-img.jpg') }}" alt="menu-img" class="img-fluid  d-none d-md-block my-0 ms-auto">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item dropdown dropdown-mega position-static">
          <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-auto-close="outside">contact us</a>
          <div class="dropdown-menu shadow py-0">
            <div class="mega-content">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-6">
                    <div class="pt-3 ps-3 ps-md-4 mobile-menu">
                      <h6><strong>CONTACT US</strong></h6>
                      <ul class="pt-2 pt-md-3">
                        <li class="nav-item"><a href="{{ route('contact') }}" class="dropdown-item text-wrap">contact</a></li>
                        <li class="nav-item"><a href="https://docs.google.com/forms/d/e/1FAIpQLSfN8bQmodMO0tRTZtGEgZCg4y2hGlyTbwY7UflSU5kAhp8Cjw/viewform" class="dropdown-item text-wrap" target="blank">submission</a></li>
                        <li class="nav-item"><a href="{{ route('join.the.team') }}" class="dropdown-item text-wrap">join the team</a></li>
                        <li class="nav-item"><a href="{{ route('become.a.ambassador') }}" class="dropdown-item text-wrap">BECOME A AMBASSADOR</a></li>
                        <li class="nav-item"><a href="{{ route('mentorship.application') }}" class="dropdown-item text-wrap">mentorship application</a></li>
                        <li class="nav-item"><a href="{{ route('leave.testimonial') }}" class="dropdown-item text-wrap text-wrap">leave a testimonial</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-md-6 text-right pe-0">
                    <img src="{{ asset('assets/frontend/img/menu-img/menu-img.jpg') }}" alt="menu-img" class="img-fluid  d-none d-md-block my-0 ms-auto">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item menu-first hire_us text-align-center">
          <a class="nav-link active" aria-current="page" href="http://luminadev.com/" target="_blank">Hire us <br> <span>for the Digital Work</span></a>
        </li>
        <li class="nav-item menu-first join_school">
          <a class="nav-link active" aria-current="page" href="https://mashtor.com/" target="_blank">Join <br> <span> Our School</span></a>
        </li>
      </ul>
    </div>
  </div>
</nav>