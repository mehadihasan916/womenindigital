<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6 footer-contact">
            <img src="{{ asset('assets/frontend/img/logo/logo_top.png') }}" alt="wid-logo" class="mb-3" height="50px">
            <p>
              Dhaka, Bangladesh
              <br>
              <strong>Phone: </strong>+8801635-497868<br>
              <strong>Email: </strong>info@womenindigital.net<br>
              <strong>Email: </strong>womenindigital.net@gmail.com<br>
            </p>
            <!--19/C/6, N Islam Tower, Ring Rd-->
          </div>
          <div class="col-lg-2 col-md-6 col-sm-6 col-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i><a href="{{ route('index') }}">Home</a></li>
              <li><i class="bx bx-chevron-right"></i><a href="{{ route('about.us') }}">About us</a></li>
              <li><i class="bx bx-chevron-right"></i><a href="http://luminadev.com/">Services</a></li>
              <li><i class="bx bx-chevron-right"></i><a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i><a href="{{ route('policy') }}">Privacy policy</a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="http://luminadev.com/" target="_blank">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="http://luminadev.com/" target="_blank">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="http://luminadev.com/" target="_blank">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="http://luminadev.com/" target="_blank">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="http://luminadev.com/" target="_blank">Graphic Design</a></li>
            </ul>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6 col-12 col-item footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <!-- <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p> -->
            <form action="{{ route('subscribe') }}" method="POST" class="mt-3">
              @csrf
              <div class="input-group">
                <input type="email" name="email" class="form-control" placeholder="example@gmail.com" required>
                <button type="submit" class="btn primary-btn px-3"><i class="bi bi-send"></i></button>
              </div>
            </form>
            <div class="social-links text-center text-md-right pt-3">
              <a href="https://twitter.com/wid_network" class="twitter" target="_blank"><i class="bx bxl-twitter"></i></a>
              <a href="https://www.facebook.com/WomeninDigital.net/" class="facebook" target="_blank"><i class="bx bxl-facebook"></i></a>
              <a href="https://www.instagram.com/womenindigital_net/" class="instagram" target="_blank"><i class="bx bxl-instagram"></i></a>
              <a href="https://bd.linkedin.com/company/womenindigitalnet" class="linkedin" target="_blank"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container py-4">
      <div class="d-flex flex-column flex-md-row text-center justify-content-md-between">
        <div class="copyright pb-3 pb-md-0">
          <strong><span>© 2013-{{ date('Y') }} Women In Digital</span></strong>. All Rights Reserved
        </div>
        <div>
          Design And Developed By <a class="w-text-primary" href="https://womenindigital.net"><strong>Women In Digital</strong></a> | <a href="http://luminadev.com/" class="text-warning"><strong>Lumina Dev</strong></a>
        </div>
      </div>
    </div>
</footer>