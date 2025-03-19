@extends('layouts.frontend.frontend-layouts')
@section('title', 'Contact | Wome-In-Digital')
@push('meta-tag')
<meta property="og:title" content="Contact | Women-In-Digital" />
<meta property="og:description" content="Empowering-women | Women-in-Digital | Female-technologists  | Bringing-more-women | Women-in-Technology | Digital-Bangladesh | Digital Women | Tech Women | Women-Hackathon | Innovation-challenge | Career-Counselling | Women engineer" />
<meta property="og:url" content="{{ route('contact') }}" />
<meta property="og:image" content="{{ asset('assets/application-default/seo-image/wid-logo-t.jpg') }}" />
@endpush
@push('page-css')
<style>
  #contact .card{
    padding: 20px 15px;
    box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
  }
  #contact iframe{
    width: 100%;
    height: 393px;
    border-radius: 5px;
    border: 0px;
    box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
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
      <h5><span>Contact Us</span></h5>
        <h3>Empowering <br>
        Inspiring <br>
        Accessible</h3>
        <p>The magician. We believe in people and endless possibilities. Inspiration is our superpower.</p>
    </div>
  </div>
  <!-- Page Banner End -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact section-bg">
    <div class="container">
      <div class="row py-lg-5 py-4">
        <div class="col-md-6 col-item">
          <div class="card">
            <h4 class="pb-3 border-bottom">Dhaka Office</h4>
            <div class="info mt-3">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h5>Location: </h5>
                <p>Dhaka, Bangladesh</p>
              </div>
              <div class="email">
                <i class="bi bi-envelope"></i>
                <h5>Email: </h5>
                <p>info@womenindigital.net</p>
                <p>womenindigital.net@gmail.com</p>
              </div>
              <div class="phone">
                <i class="bi bi-phone"></i>
                <h5>Mobile: </h5>
                <p>+8801635-497868</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-item">
          <div class="card">
            <h4 class="pb-3 border-bottom">Ramgonj Office</h4>
            <div class="info mt-3">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h5>Location: </h5>
                <p>Ramgonj, Lakshmipur.</p>
              </div>
              <div class="email">
                <i class="bi bi-envelope"></i>
                <h5>Email: </h5>
                <p>info@womenindigital.net</p>
                <p>womenindigital.net@gmail.com</p>
              </div>
              <div class="phone">
                <i class="bi bi-phone"></i>
                <h5>Mobile: </h5>
                <p>+8801635-497868</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-item">
          <div class="card">
            <h4 class="pb-3 border-bottom">Kurigram Office</h4>
            <div class="info mt-3">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h5>Location: </h5>
                <p>Khalil Bayer, Kurigram.</p>
              </div>
              <div class="email">
                <i class="bi bi-envelope"></i>
                <h5>Email: </h5>
                <p>info@womenindigital.net</p>
                <p>womenindigital.net@gmail.com</p>
              </div>
              <div class="phone">
                <i class="bi bi-phone"></i>
                <h5>Mobile: </h5>
                <p>+8801635-497868</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-item">
          <div class="card">
            <h4 class="pb-3 border-bottom">Nepal Office</h4>
            <div class="info mt-3">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h5>Location:</h5>
                <p>Thamel, 94 Darber je Bug Kathmandu, Nepal.</p>
              </div>
              <div class="email">
                <i class="bi bi-envelope"></i>
                <h5>Email: </h5>
                <p>info@womenindigital.net</p>
                <p>womenindigital.net@gmail.com</p>
              </div>
              <div class="phone">
                <i class="bi bi-phone"></i>
                <h5>Mobile: </h5>
                <p>+8801635-497868</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
            <!--<iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d3651.3600381671345!2d90.35505202695316!3d23.770190200000016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e2!4m0!4m5!1s0x3755c125e623d84d%3A0xd18bab920f307da9!2sQ9C5%2B3MF%20N%20Islam%20Tower%2C%20Dhaka!3m2!1d23.7701902!2d90.35917189999999!5e0!3m2!1sen!2sbd!4v1667887235249!5m2!1sen!2sbd" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>-->
          <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d335.78425900100996!2d90.36082296391216!3d23.762670117219987!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755bf58dd8cbce9%3A0x700079053de7fbc0!2sNurjahan%20Rd%2C%20Dhaka!5e1!3m2!1sen!2sbd!4v1643360003015!5m2!1sen!2sbd" loading="lazy"></iframe>-->
          <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d767.6038952477501!2d90.35844670894406!3d23.770189602785067!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c19486093f0b%3A0xbb8e2ec59d5eaacb!2sdigiSocial%20Limited!5e0!3m2!1sen!2sbd!4v1672658375947!5m2!1sen!2sbd" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>-->
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d912.843679216626!2d90.35757020833019!3d23.769667223749405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x178b4814c381ed95!2zMjPCsDQ2JzEwLjgiTiA5MMKwMjEnMzEuMSJF!5e0!3m2!1sen!2sbd!4v1672661266826!5m2!1sen!2sbd"loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        {{-- <div class="col-lg-6 col-md-12 mt-4 mt-lg-0">
          <div class="card">
            <h4 class="pb-3">Contact Us</h4>
            <form action="{{ route('contact.send') }}" method="post">
              @csrf
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-4">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-4">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="text-center mt-4">
                <button class="btn primary-btn" type="submit">Send Message</button>
              </div>
            </form>
          </div>
        </div> --}}
      </div>
    </div>
  </section><!-- End Contact Section -->
@endsection
@push('page-js')
@endpush