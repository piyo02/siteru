@extends('guest.v3.layout.main')

@section('content')
<!-- ======= News Section ======= -->
{{-- <section id="featured-services" class="featured-services">
  <div class="container" data-aos="fade-up">

    <div class="row">
      @foreach ($galleries as $gallery)
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card border-0">
          <div class="position-relative">
            <img src="{{ asset('storage' . '/' . $gallery->thumbnail) }}" alt="" class="img-fluid">
            <div class="card-img-overlay">
              <span class="badge bg-warning text-uppercase">{{ $gallery->sector->name }}</span>
            </div>
          </div>
          <div class="card-body">
            <h5 class="card-title">{{ $gallery->title }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $gallery->created_at }}</h6>
            <p class="card-text mt-4">{{ $gallery->description }}</p>
          </div>
        </div>
      </div>
      @endforeach
      <div class="col-12 text-center mt-5">
        {{ $galleries->links() }}
      </div>
    </div>

  </div>
</section> --}}

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
              <h4>{{ $gallery->title }}</h4>
              <p>{{ $gallery->sector->name }}</p>
              <br>
              {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> --}}
              <a href="{{ asset('storage' . '/' . $gallery->thumbnail) }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="{{ $gallery->title }}"><i class="bx bx-info-circle"></i></a>
            </div>
          </div>
          @endforeach
          <div class="col-12 text-center mt-5">
            {{ $galleries->links() }}
          </div>
      @else
        @include('guest.v3.layout.no-content')
      @endif

    </div>

  </div>
</section>

@endsection