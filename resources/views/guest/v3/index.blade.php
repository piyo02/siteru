@extends('guest.v3.layout.main')

@section('content')

<!-- ======= News Section ======= -->
<section id="about" class="about section-bg">
  <div class="container" data-aos="fade-up">
    
    <div class="section-title">
      <h2>Berita</h2>
      <h5>Temukan Berita Terbaru Mengenai Kegiatan <span>DINAS PUPR KOTA KENDARI</span></h5>
      <p>Transparansi adalah salah satu bentuk keterbukaan kami akan masyarakat</p>
    </div>
    
    @if ($fav_news)
      <div class="row">
        <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
          <img src="{{ asset('storage' . '/' . $fav_news->thumbnail) }}" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-up" data-aos-delay="100">
          <p class="badge bg-warning">{{ $fav_news->sector->name }}</p>
          <h3>
            {{ $fav_news->title }}
          </h3>
          <p>
            {{ $fav_news->description }}
          </p>
          
          <a href="/publikasi/berita/{{ $fav_news->slug }}" class="btn btn-sm btn-outline-primary">Baca Selengkapnya</a>
        </div>
      </div>
      @else
        @include('guest.v3.layout.no-content')
      @endif
    </div>
</section> 

<section>
  <div class="container">
    <div class="row justify-content-center">
      @foreach ($videos as $video)
      <div class="col-md-6 col-lg-4 mb-4">
        <div class="card">
          <video src="{{ asset('storage') . '/' . $video->value }}" style="max-width: 100%" controls></video>
          <div class="card-body">
            <p class="card-text">{{ $video->field }}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

</section>

@if (count($newses))
<section id="featured-services" class="featured-services">
  <div class="container" data-aos="fade-up">

    <div class="row">
      @foreach ($newses as $news)
      <div class="col-4">
        <div class="card border-0">
          <div class="position-relative">
            <img src="{{ asset('storage' . '/' . $news->thumbnail) }}" alt="" class="img-fluid">
            <div class="card-img-overlay">
              <span class="badge bg-warning text-uppercase">{{ $news->sector->name }}</span>
            </div>
          </div>
          <div class="card-body">
            <h5 class="card-title">{{ $news->title }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $news->date }}</h6>
            <p class="card-text mt-4">{{ $news->description }}</p>
          </div>
          <div class="card-footer">
            <div class="media align-items-center">
              <div class="media-body">
                <a class="card-link text-primary" href="/publikasi/berita/{{ $news->slug }}">Baca Selengkapnya</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach

    </div>

  </div>
</section>
@endif
<!-- End News -->

<!-- ======= Testimonial Section ======= -->
<section id="testimonials" class="testimonials">
  <div class="container" data-aos="zoom-in">

    <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
      <div class="swiper-wrapper">

        <div class="swiper-slide">
          <div class="testimonial-item">
            <img src="{{ asset('assets/guest/img/testimonials/testimonials-1.jpg') }}" class="testimonial-img" alt="">
            <h3>Saul Goodman</h3>
            <h4>Ceo &amp; Founder</h4>
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-item">
            <img src="{{ asset('assets/guest/img/testimonials/testimonials-2.jpg') }}" class="testimonial-img" alt="">
            <h3>Sara Wilsson</h3>
            <h4>Designer</h4>
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-item">
            <img src="{{ asset('assets/guest/img/testimonials/testimonials-3.jpg') }}" class="testimonial-img" alt="">
            <h3>Jena Karlis</h3>
            <h4>Store Owner</h4>
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-item">
            <img src="{{ asset('assets/guest/img/testimonials/testimonials-4.jpg') }}" class="testimonial-img" alt="">
            <h3>Matt Brandon</h3>
            <h4>Freelancer</h4>
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-item">
            <img src="{{ asset('assets/guest/img/testimonials/testimonials-5.jpg') }}" class="testimonial-img" alt="">
            <h3>John Larson</h3>
            <h4>Entrepreneur</h4>
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
          </div>
        </div><!-- End testimonial item -->

      </div>
      <div class="swiper-pagination"></div>
    </div>

  </div>
</section>
<!-- End Testimonial -->

<!-- ======= Gallery Section ======= -->
<section id="portfolio" class="portfolio">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Galeri</h2>
      <h5>Lihatlah aksi <span>DINAS PUPR</span> saat berada di lapangan</h5>
    </div>

    <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
      @if (count($galleries))
        @foreach ($galleries as $gallery)
          <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item filter-app">
            <img src="{{ asset('storage' . '/' . $gallery->thumbnail) }}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>{{ strftime('%A %d %b %Y', strtotime($gallery->date)) }}</h4>
              {{-- <h4>{{ $gallery->title }}</h4> --}}
              <p>{{ $gallery->sector->name }}</p>
              <br>
              {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> --}}
              <a href="{{ asset('storage' . '/' . $gallery->thumbnail) }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="{{ $gallery->title }}"><i class="bx bx-info-circle"></i></a>
            </div>
          </div>
          @endforeach
      @else
        @include('guest.v3.layout.no-content')
      @endif

    </div>

  </div>
</section>
<!-- End Gallery Section -->

<!-- ======= Organization Section ======= -->
<section id="team" class="team section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Bidang</h2>
      <h5><span>Bidang </span>apa saja yang ada di DINAS PUPR?</h5>
      <p>Yuk, lihat profil masing-masing bidang</p>
    </div>

    <div class="row justify-content-between">
      <?php $images = ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven'];?>
      @foreach ($sectors as $sector)
      <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="member">
          <div class="member-img p-3 text-center pt-5">
            <img src="{{ asset('storage' . '/' . $sector->icon) }}" class="img-fluid" alt="" width="80px">
            <div class="social">
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
            </div>
          </div>
          <div class="member-info">
            <h4>{{ $sector->name }}</h4>
            <a href="organisasi/{{ $sector->slug }}" class="btn btn-sm btn-outline-primary">Lihat Profil</a>
          </div>
        </div>
      </div>
          
      @endforeach

    </div>

  </div>
</section>
<!-- End Organization Section -->


<!-- ======= Frequently Asked Questions Section ======= -->
<section id="faq" class="faq section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>F.A.Q</h2>
      <h5>Apa saja sih yang sering di tanyakan masyarakat mengenai <span>DINAS PUPR KOTA KENDARI</span></h5>
      <p>Apakah pertanyaan Anda ada dalam daftar pertanyaan dibawah ini?</p>
    </div>

    <div class="row justify-content-center">
      <div class="col-xl-10">
        <ul class="faq-list">

          <li>
            <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Apa yang terjadi jika kita mengabaikan surat panggilan mengenai pelanggaran aturan pembangunan? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq1" class="collapse" data-bs-parent=".faq-list">
              <p>
                Pelanggar akan menerima surat panggilan sebanyak 2 kali sebelum dilakukan pemberhentian paksa untuk pembangunan yang sedang dilakukan.
              </p>
            </div>
          </li>

        </ul>
      </div>
    </div>

  </div>
</section>
<!-- End Frequently Asked Questions Section -->
@endsection