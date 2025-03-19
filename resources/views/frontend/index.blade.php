@extends('layouts.frontend.frontend-layouts')
@section('title', 'Women In Digital | Empowerment through Technology')
@push('meta-tag')
<meta property="og:title" content="Women-in-Digital | Home" />
<meta property="og:description" content="Empowering-women | Women-in-Digital | Female-technologists  | Bringing-more-women | Women-in-Technology | Digital-Bangladesh | Digital Women | Tech Women | Women-Hackathon | Innovation-challenge | Career-Counselling | Women engineer" />
<meta property="og:url" content="{{ route('index') }}" />
<meta property="og:image" content="{{ asset('assets/application-default/seo-image/women-empowerment.jpg') }}" />
@endpush
@push('page-css')
<style>
  .testimonial-avater img{
    border: 3px solid white;
    height: 85px;
    width: 85px;
    border-radius: 50%;
    object-fit: cover
  }
  .section-bg2 img{
    width: 100%;
  }
  .chat message img{
    width: 50px;
    height: 50px;
  }
  .innovation-popup {
    /*background-color: #ffffff;*/
    width: 600px;
    padding: 10px 20px;
/*    padding-bottom: 10px;*/
    position: fixed;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 55%;
    border-radius: 8px;
    font-family: "Poppins",sans-serif;
    display: none;
    text-align: center;
    z-index:999;
}
.innovation-popup button{
    display: block;
    margin:  0 0 0px auto;
    background-color: transparent;
    font-size: 30px;
    color: #ff0000;
    border: none;
    outline: none;
    cursor: pointer;
   
}
.innovation-popup-link:hover{
    background-color: #ff0000;
    color: #e2dfdf;
   
}
.innovation-popup img{
    width: 100%;
    border-radius:5px;
}
.innovation-popup-link {
    display: block;
    width: 150px;
    position: relative;
    margin: 10px auto;
    text-align: center;
    background-color: #ff0000;
    color: #ffffff;
    text-decoration: none;
    padding: 5px 0;
    border-radius: 5px;
    position: absolute;
    margin-top: -90px;
    right: 26px;
}
@media all and (max-width: 575px) {
    .innovation-popup {
         width: 400px;
   
    }

}



@media all and (max-width: 413px) {
     .innovation-popup {
        width: 390px;
     }
}
</style>
<link href="{{ asset('assets/frontend/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
@endpush
@section('page-content')

<!-- ======= Innovation Popup ======= -->
    <!--<div class="innovation-popup">-->
    <!--    <button id="close">&times;</button>-->
    <!--    <img src="https://womenindigital.net/innovation2023/digital-banner.jpg" alt="">-->
    <!--    <a class="innovation-popup-link" target=_blank href="https://lnkd.in/gWRXdTKh">Apply Now</a>-->
    <!--</div>-->
<!-- ======= Innovation Popup ======= -->
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative">
      <h1>Technology <br> Doesn't Have <br> Any Gender.</h1>
      <p class="author mt-4 mt-lg-5">Achia Nila</p>
      <a href="https://forms.gle/3MZVfkZ8E8yASbJh7" target="blank" class="btn-get-started text-capitalize mt-4 mt-lg-5">Join Us</a>
    </div>
  </section><!-- End Hero -->

  <!-- Services Section -->
  <section class="section-bg services" id="services">
    <div class="container">
      <div class="row justify-content-center">
        @forelse ($services as $service)
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 col-item service-item">
          <a href="{{ $service->link }}" target="blank">
            <div class="card">
              <img src="{{ asset('uploads/services/'.$service->thumbnail) }}" class="card-img-top" alt="{{ Str::words($service->title, 3, '-') }}image">
              <div class="card-body">
                <h6 class="card-title text-center text-capitalize">{{ $service->title }}</h6>
              </div>
            </div>
          </a>
        </div>
        @empty
        <div class="col-md-6">
          <div class="alert alert-danger text-center" role="alert">
            <strong>No Service Available</strong>
          </div>
        </div>
        @endforelse
      </div>
    </div>
  </section>
  <!-- Services Section End -->

  <!-- Digital Economy -->
  <section class="digital-economy">
    <div class="container-fluid">
      <div class="text-center">
        <h1 class="px-3 px-md-4 px-lg-5">
          Women in Digital is an all-star team of female technologists dedicated to bringing more women into the digital economy.
        </h1>
        <a href="{{ route('about.us') }}" class="btn-get-started text-center text-capitalize">Learn More</a>
      </div>
    </div>
  </section>
  <!-- Digital Economy End -->

  <!-- Story-Blog-Event -->
  <section id="story-blog-event" class="section-bg">
    <div class="container">
      @if($stories->isNotEmpty() || $blogs->isNotEmpty() || $events->isNotEmpty())
      <div class="row">
        @foreach($stories as $story)
        <div class="col-lg-4 col-md-6 col-sm-12 col-12 col-item">
          <div class="card">
            <img src="{{ asset('uploads/stories/'.$story->thumbnail) }}" class="card-img-top" alt="{{ Str::words($story->title, 3, '-') }}image">
            <div class="card-body">
              <div class="py-2">
                <h5 class="card-title">{{ Str::words($story->title, 10, '...') }}</h5>
                <p class="card-text">{{ Str::words($story->short_description, 30, '...') }} <a href="{{ route('story.details', $story->id) }}" class="text-nowrap">Read More <span><i class="ri-arrow-right-s-line"></i><i class="ri-arrow-right-s-line"></i></span></a></p>
              </div>
            </div>
            <div class="text-center">
              <a href="{{ route('stories') }}" class="btn primary-btn mb-3">Latest Story</a>
            </div>
          </div>
        </div>
        @endforeach
        @foreach($blogs as $blog)
        <div class="col-lg-4 col-md-6 col-sm-12 col-12 col-item">
          <div class="card">
            <img src="{{ asset('uploads/blogs/'.$blog->thumbnail) }}" class="card-img-top" alt="{{ Str::words($blog->title, 3, '-') }}image">
            <div class="card-body">
              <div class="py-2">
                <h5 class="card-title">{{ Str::words($blog->title, 10, '...') }}</h5>
                <p class="card-text">{{ Str::words($blog->short_description, 30, '...') }} <a href="{{ route('blog.details', $blog->id) }}" class="text-nowrap">Read More <span><i class="ri-arrow-right-s-line"></i><i class="ri-arrow-right-s-line"></i></span></a></p>
              </div>
            </div>
            <div class="text-center">
              <a href="{{ route('blogs') }}" class="btn primary-btn mb-3">Latest Blog</a>
            </div>
          </div>
        </div>
        @endforeach
        @foreach($events as $event)
        <div class="col-lg-4 col-md-6 col-sm-12 col-12 col-item">
          <div class="card">
            <img src="{{ asset('uploads/events/'.$event->thumbnail) }}" class="card-img-top" alt="{{ Str::words($event->title, 3, '-') }}image">
            <div class="card-body">
              <div class="py-2">
                <h5 class="card-title">{{ Str::words($event->title, 10, '...') }}</h5>
                <p class="card-text">{{ Str::words($event->short_description, 30, '...') }} <a href="{{ route('event.details', $event->id) }}" class="text-nowrap">Read More <span><i class="ri-arrow-right-s-line"></i><i class="ri-arrow-right-s-line"></i></span></a></p>
              </div>
            </div>
            <div class="text-center">
              <a href="{{ route('events') }}" class="btn primary-btn mb-3 text-center">Latest Event</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      @else
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="alert alert-danger text-center" role="alert">
            <strong>No Story, Blog, Event Available</strong>
          </div>
        </div>
      </div>
      @endif
    </div>
  </section>
  <!-- Story-Blog-Event End -->

  <!-- Upcoming Event -->
  <section id="up-event" style="background: #C5EBF4">
    <div class="container">
      <div class="row">
        <div class="col-md-7 col-sm-12">
          <img src="{{ asset('assets/frontend/img/home-page/up-event.jpg') }}" alt="" class="img-fluid rounded">
        </div>
        <div class="col-md-5 col-sm-12 d-flex align-items-center">
          <div class="up-box">
            <h1>Upcoming Event</h1>
            <p class="py-0 py-lg-4">Join hundreds of roaring women from around the world when you become a Women In Digital Member. This community is about healing, creativity, and connection. With weekly writing prompts a private community page, virtual meet-ups, and member features.</p>
            <a href="{{ route('events') }}" class="btn primary-btn my-2">Read More</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Upcoming Event End -->

  <!-- Partners -->
  <section id="partners" class="section-bg">
    <div class="container">
      <h1 class="text-center pb-3 pb-sm-3 pb-md-4">Partners</h1>
      <div class="d-none d-lg-block">
        <div class="row justify-content-center">
          <div class="col-xl-8 col-lg-12 text-center">
            @if( $partners->isNotEmpty() )
            <div class="row justify-content-center">
              @foreach ( $partners as $partner )
              <div class="col-lg-2 col-md-3 col-sm-3 col-item">
                <div class="partner-item">
                  <img src="{{ asset('uploads/partners/'.$partner->thumbnail) }}" alt="{{ $partner->thumbnail }}" class="img-fluid">
                </div>
              </div>
              @endforeach
            </div>
            <a href="{{ route('partners') }}" class="btn primary-btn text-center text-capitalize">Browse More</a>
            @else
            <div class="row justify-content-center">
              <div class="col-md-6">
                <div class="alert alert-danger text-center" role="alert">
                  <strong>No Partner Available</strong>
                </div>
              </div>
            </div>
            @endif
          </div>
        </div>
      </div>
      <div class="d-lg-none">
        <div class="row justify-content-center">
          <div class="col-md-10 text-center">
            @if( $partners->isNotEmpty() )
            <div class="row justify-content-center">
              @foreach ($partners as $partner)
                <div class="col-md-3 col-sm-3 col-4 col-item">
                  <div class="partner-item">
                    <img src="{{ asset('uploads/partners/'.$partner->thumbnail) }}" alt="{{ $partner->thumbnail }}" class="img-fluid">
                  </div>
                </div>
              @endforeach
            </div>
            <a href="{{ route('partners') }}" class="btn primary-btn text-center">Browse More</a>
            @else
              <div class="row justify-content-center">
                <div class="col-md-6">
                  <div class="alert alert-danger text-center" role="alert">
                    <strong>No Partner Available</strong>
                  </div>
                </div>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Partners End -->

  <!-- Event -->
  <section id="event">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12 col-12 col-item">
          <div class="card">
            <img src="{{ asset('assets/frontend/img/event/women_2017.jpg') }}" class="card-img-top" alt="impact-story">
            <div class="card-body">
              <div class="event-trigger">
                <a href="{{ asset('assets/pdf/Annual-Report.pdf') }}" class="btn primary-btn mb-2" target="_blank">Read More</a>
              </div>
              <div class="py-2">
                <h5 class="card-title">Impact Stories</h5>
                <p class="card-text">Explore highlights of how Women in Digital works with the Sustainable Development Goals to turn wide-ranging, idealistic ambitions into achievable, actionable policies. We aim to take the 2030 Agenda from an agenda for action into an agenda of action. We already changed almost 10000 women's lives through technology and most of them are contributing to our Digital Economy.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 col-12 col-item">
          <div class="card">
            <img src="{{ asset('assets/frontend/img/event/nationalheakathonforwomen.jpg') }}" class="card-img-top" alt="national-hackathon">
            <div class="card-body">
              <div class="event-trigger">
                <a href="https://icetoday.net/2017/02/a-review-of-the-first-womens-national-hackathon-2017/" class="btn primary-btn mb-2" target="_blank">Read More</a>
              </div>
              <div class="py-2">
                <h5 class="card-title">National Hackathon For Women</h5>
                <p class="card-text">National Hackathon for Women is an event for women or girls in which passionate ICT students or professionals will participate in collaborative programming session. In these Days; the 36-hour marathon will test the talent and creativity of the contestants in developing, testing and validating their ideas/projects.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 col-12 col-item">
          <div class="card">
            <img src="{{ asset('assets/frontend/img/event/innovation.jpg') }}" class="card-img-top" alt="inovation-challenge">
            <div class="card-body">
              <div class="event-trigger">
                <a href="http://womenindigital.net/dicfw/" class="btn primary-btn mb-2" target="_blank">Apply Now</a>
              </div>
              <div class="py-2">
                <h5 class="card-title">Digital Innovation Challenge For Women</h5>
                <p class="card-text">Digital Innovation Challenge for women supports vision of a connected world by recognizing those who are working to make the Digital world more relevant to the women in Bangladesh. Our goal with this challenge is to encourage women to generate ideas, development of apps and online services that provide real value for the members of these important communities.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Event End -->

  <!-- Explore -->
  <section id="explore">
    <div class="container">
      <h1>Explore WID <br> Work And <br> IMPACT</h1>
      <a href="https://www.youtube.com/c/WomenInDigital" class="btn-get-started text-uppercase" target="_blank">Subscribe Now</a>
      <a href="https://youtu.be/4HulloFTkzU" class="play-btn">
        <i class="bi bi-play-circle-fill"></i>
      </a>
    </div>
  </section>
  <!-- Explore End -->

  <!-- Projects -->
  <section id="projects" class="section-bg">
    <div class="container">
      <h1 class="text-center pb-3 pb-sm-3 pb-md-4">
        Projects
      </h1>
      @if ( $projects->isNotEmpty() )
      <div class="row">
        @foreach($projects as $project)
        <div class="col-lg-4 col-md-6 col-sm-12 col-12 col-item">
          <div class="card">
            <img src="{{ asset('uploads/projects/'.$project->thumbnail) }}" class="card-img-top" alt="{{ Str::words($project->title, 3, '-') }}image">
            <div class="card-body">
              <div class="py-2">
                <h5 class="card-title">{{ Str::words($project->title, 10, '...') }}</h5>
                <p class="card-text">{{ Str::words($project->short_description, 30, ' ...') }} <a href="{{ route('project.details', $project->id) }}" class="text-nowrap">Read More <span><i class="ri-arrow-right-s-line"></i><i class="ri-arrow-right-s-line"></i></span></a></p>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="text-center">
        <a href="{{ route('projects') }}" class="btn primary-btn text-uppercase">Browse More</a>
      </div>
      @else
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="alert alert-danger text-center" role="alert">
            <strong>No Project Available</strong>
          </div>
        </div>
      </div>
      @endif
    </div>
  </section>
  <!-- Projects End -->

  <!-- Shop -->
  <section class="section-bg2">
    <div class="container">
      <div class="row">
        <div class="col-md-7 col-sm-12">
          <img src="{{ asset('assets/frontend/img/home-page/shopping.jpg') }}" alt="shopping-image" class="img-fluid rounded">
        </div>
        <div class="col-md-5 col-sm-12 d-flex align-items-center">
          <div class="up-box">
            <h1>Shop In Women in E-commerce Store</h1>
            <p>Women in E-commerce- with this we are completely focusing on rural women. Here we create an international market for handicraft products through our social media and website. The entire team from craftswomen, photographers to digital coders are women.</p>
            <a href="https://web.facebook.com/groups/womeninecommerce.com.bd" class="btn primary-btn mt-4 mb-2" target="_blank">Shop Now</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Shop End -->

  <!-- Features Products -->
  <section id="products">
    <div class="container">
      <h1 class="text-center pb-3 pb-sm-3 pb-md-4">Featured Products</h1>
      @if($products->isNotEmpty())
      <div class="row">
        @foreach ($products as $product)
        <div class="col-lg-4 col-md-6 col-sm-12 col-12 col-item">
          <div class="card">
            <img src="{{ asset('uploads/products/'.$product->thumbnail) }}" class="card-img-top" alt="{{ $product->name }}-image">
            <div class="card-body">
              <div class="py-2">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ Str::words($product->short_description, 30, '...') }}</p>
              </div>
              <a href="{{ route('product.details', $product->id) }}" class="btn primary-btn mb-2">Shop Now</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="text-center">
        <a href="{{ route('products') }}" class="btn primary-btn text-capitalize">More Products</a>
      </div>
      @else
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="alert alert-danger text-center" role="alert">
            <strong>No Products Available</strong>
          </div>
        </div>
      </div>
      @endif
    </div>
  </section>
  <!-- Features Products End -->

  <!-- Path Finder -->
  <section id="pathfinder">
    <div class="container">
      <div class="section-title text-light">
        <h1>Pathfinder</h1>
        <p>Pathfinder is a first-of-its-kind application that gives women the chance to ask questions about their careers and rights directly to experts that can help. Women can openly ask any type of their career business-related question here.</p>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6">
          <form action="{{ route('path.finder.question.store') }}" class="chat" method="POST">
            @csrf
            <div class="mb-3">
              <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}" required>
            </div>
            <div>
              <textarea name="question" placeholder="Enter Your Question" class="form-control" rows="3" required>{{ old('question') }}</textarea>
            </div>
            <button type="submit" class="btn btn-get-started btn w-100 border-dark text-dark">Question</button>
          </form>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="chat message">
            @foreach ($path_finder_questions as $path_finder_question)
            <a href="{{ route('path.finder.question', $path_finder_question->id) }}">
              <div class="d-flex py-2">
                <img src="{{ asset('assets/frontend/img/home-page/user1.png') }}" alt="finder-img">
                <p class="ps-2">{{ Str::words($path_finder_question->question, 20, '...') }}</p>
              </div>
            </a>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Path Finder End -->

  <!-- Awards -->
  <section id="awards" class="section-bg">
    <div class="container">
      <div class="section-title pb-sm-3 pb-md-4">
        <h1>Awards</h1>
        <p class="pb-3 pt-2">Women in digital has been acknowledge by international and Bangladeshi organizations for its accomplishments.
        </p>
      </div>
      @if($awards->isNotEmpty())
      <div class="row">
        @foreach ( $awards as $award )
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 col-item">
          <div class="card p-lg-4 p-md-3 p-2">
            <h5>{{ $award->name }}</h5>
            <p class="text-muted">
              {{ $award->location }}
            </p>
            <img src="{{ asset('uploads/awards/'.$award->thumbnail) }}" alt="{{ Str::words($award->name, 3, '-') }}image">
          </div>
        </div>
        @endforeach
      </div>
      <div class="text-center">
        <a href="{{ route('awards') }}" class="btn primary-btn text-capitalize">Browse More</a>
      </div>
      @else
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="alert alert-danger text-center" role="alert">
            <strong>No Award Available</strong>
          </div>
        </div>
      </div>
      @endif
    </div>
  </section>
  <!-- Awards End -->

  <!-- ======= Testimonials Section ======= -->
  <section id="testimonials" class="testimonials">
    <div class="container">
      <h1 class="text-center">Testimonial</h1>
      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
        @if($testimonials->isNotEmpty())
        <div class="swiper-wrapper">
          @foreach ($testimonials as $testimonial)
          <div class="swiper-slide">
            <div class="row justify-content-center pt-3 pt-md-4">
              <div class="col-md-8 text-center testimonial-avater">
                <img src="{{ asset('uploads/testimonials/'.$testimonial->thumbnail) }}" alt="{{ Str::words($testimonial->name, 3, '...') }}">
                <h4>{{ $testimonial->name }}</h4>
                <h6 class="py-2">{{ $testimonial->designation }}</h6>
                <p>
                  <i><i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  {{ Str::words($testimonial->comment, 500, '...')   }}
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i></i>
                </p>
              </div>
            </div>
          </div>
          <!-- End testimonial item -->
          @endforeach
        </div>
        <div class="swiper-pagination"></div>
        @else
        <div class="row justify-content-center mt-3">
          <div class="col-md-6">
            <div class="alert alert-danger text-center" role="alert">
              <strong>No Testimonials Available</strong>
            </div>
          </div>
        </div>
        @endif
      </div>
    </div>
  </section><!-- End Testimonials Section -->
@endsection
@push('page-js')
<script src="{{ asset('assets/frontend/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script>
        window.addEventListener("load", function(){
            setTimeout(
                function open(event){
                    document.querySelector(".innovation-popup").style.display = "block";
                },
                500
            )
        });


        document.querySelector("#close").addEventListener("click", function(){
            document.querySelector(".innovation-popup").style.display = "none";
        });
    </script>
@endpush
