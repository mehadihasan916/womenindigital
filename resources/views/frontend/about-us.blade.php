@extends('layouts.frontend.frontend-layouts')
@section('title', 'About-Us| Wome-In-Digital')
@push('meta-tag')
<meta property="og:title" content="About-Us | Women-In-Digital" />
<meta property="og:description" content="Empowering-women | Women-in-Digital | Female-technologists  | Bringing-more-women | Women-in-Technology | Digital Women | Tech Women | Women-Hackathon | Innovation-challenge | Career-Counselling | Women engineer" />
<meta property="og:url" content="{{ route('about.us') }}" />
<meta property="og:image" content="{{ asset('assets/frontend/img/about-us/founder.jpg') }}" />
@endpush
@push('page-css')
<style>
  iframe{
    height: 600px;
    border-radius: 10px;
  }
  .text-justify{
    text-align: justify;
  }
  .founder-avater{
    float: left;
    padding: 0px 20px 20px 0px;
  }
  /* Responsive */
  @media only screen and (min-width: 768px) and (max-width: 991.98px) { 
    .founder-avater{
      width: 450px;
    } 
  }
  @media only screen and (min-width: 576px) and (max-width: 767.98px) { 
    .founder-avater{
      width: 100%;
      padding-left: 0px;
      padding-right: 0px;
    } 
    iframe{
      height: 450px;
    } 
  }
  @media only screen and (min-width: 450px) and (max-width: 575.98px) {   
    iframe{
      height: 400px;
    } 
    .founder-avater{
      height: 400px;
    } 
    .founder-avater{
      width: 100%;
      height: auto;
      padding-right: 0px;
    } 
  }
  @media only screen and (min-width: 310px) and (max-width: 449.98px) { 
    iframe{
      width: 100%;
      height: 400px;
    } 
    .founder-avater{
      width: 100%;
      height: 350px;
      padding-right: 0px;
    } 
  }
</style>
@endpush
@section('page-content')
  <!-- Page Banner  -->
  <div id="page-banner" style="background-image: url({{ asset('assets/frontend/img/page-banner/team-banner.png') }});">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <h5><span>About Us</span></h5>
          <h3>Empowering <br>
            Inspiring <br>
            Accessible</h3>
            <p>The magician. We believe in people and endless possibilities. Inspiration is our superpower.</p>
        </div>
      </div>
    </div>
  </div>
  <!-- Page Banner End -->
  <!-- About Us -->
  <section>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <p class="text-justify pb-3">
            Women in Digital (WID) is dedicated to promote women and girls’ education and empowerment through technology. Established in 2013, WID aims to create digital platforms to support, promote and empower women and girls in areas of information and technology. Women in Digital is concerned about the existing digital and gender divide within IT sector and thus is focused to unpack these challenges and offer practical solutions along with advocating for inclusive and empowering policy provisions. Since its establishment it has trained and empowered more than 7000 adolescent girls and women all over Bangladesh. Women in Digital is not only working towards the digital literacy of women and girls but also offering market relevant IT skills including online business development, offering digital marketing space to profile products, development of app, reaching to targeted online customers and raising individual profile with especial focus to women and girls. In addition, we are working towards digital-economic inclusion and empowerment of women and girls. We are proud to share that ‘Women in Digital’ is the only women led, women and girls’ focused organization within IT sector in Bangladesh. Thousands of women and girls that we have trained have not only started jobs, do online business but also significantly changed deep rooted social and gender norms in Bangladesh. Combination of IT, financial inclusion, gender and empowerment aspects make us unique as we aspire to see women and girls’ leadership and economic independence in a more sustained way which will have an inter-generational impact. We also express our global solidarity on the same.
          </p>
          <iframe width="100%" src="https://www.youtube.com/embed/4HulloFTkzU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </section>
  <section class="section-bg">
    <div class="container">
      <h2 class="text-center pb-sm-3 pb-md-4 mobile-pb-10">About The Founder</h2>
      <div class="row justify-content-center">
        <div class="col-md-12 col-lg-10">
          <img src="{{ asset('assets/frontend/img/about-us/founder.jpg') }}" alt="" class="founder-avater">
          <p class="text-justify">
          I was born and raised in a village but received a good education in a school with both boys and girls. Gender issues were never a problem until my first day at University. I went to University to pursue computer engineering, and to my surprise, I was the only woman in the classroom. There were only two other women, both of whom were trying to quit. In the entire country, there were very few women in the digital space. People did not take women seriously at all and they did not think we could be good at something like coding. This is where my struggle began. <br> <br>
         
          During my second year, I applied for my first job. There, I saw that women were only accepted for graphics, and hardcore coding was a complete ‘no-go’ for girls. I had to fight for my first job, but I got it. I was again the only girl in the coding department. There were so many challenges, and the more time I spent, the more aware I became of the challenges that women face. It was heartbreaking to me that women were not allowed in this space and were judged for doing this work. The entire society was constantly judging our existence, capabilities, wants, needs, and dreams, all based on our gender. I knew very clearly that I am not going to keep fighting just for my own personal acceptance. Coding is something I love, I enjoy. There is nothing about being a man or woman that affects coding. As I started to think more about this, it became a bigger vision for me. I wanted to bring more Bangladeshi women in technology. To empower women through technology. This is how Women in Digital was born. <br> <br>

          Women in Digital focuses on three different sectors: development, training, and e-commerce. Women in Digital Agency is where women engineers develop IT products for international clients mostly in Australia, Japan, and the US. Recently we developed a water billing software for our local government. Then, we have Women in Digital Tech School, where we actually provide computer training for girls to be ready for the job market. Lastly, Women in E-commerce is where we are completely focusing on rural women. Here we create an international market for their handicraft products through our social media and website. The organization also takes different initiatives for victims of child marriages and domestic violence, well as divorcees and widows, to improve their skills such as coding and e-commerce to generate income. If girls and women are financially empowered, then their families will not feel their burden anymore.
          
          Bangladesh is probably one of the best countries in South Asia to encourage women in the digital space. The government has initiatives such as Digital Bangladesh, which gives us the opportunity to reach even the most remote regions, train the girls, and also find them international jobs. There is a huge opportunity. I am proud of training 6700 women, but we have the potential for millions. Of course, there are challenges, and it starts with the family, society, education system, exposure, the attitude of job providers, and much more. But we have already come a long way. From being the only girl in the class to being able to see thousands of girls. Women in Digital is not only a dream, but it is also a reality and a platform for a better future for women and girls in this country.”
        </p>
        </div>
      </div>
    </div>
  </section>
  <!-- About Us End-->
@endsection
@push('page-js')
@endpush