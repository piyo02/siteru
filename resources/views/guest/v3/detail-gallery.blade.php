@extends('guest.v3.layout.main')

@section('content')
<!-- ======= News Section ======= -->
<section id="about" class="about section-bg">
        <div data-aos="fade-up" class="mb-4">
  
          <div class="section-title">
            <h2>Galeri</h2>
            <h5>{{ $gallery->title }}</h5>
            <p class="badge bg-warning">{{ $gallery->sector->name }}</p>
          </div>
  
          <div class="row">
            <div class="col-lg-10" data-aos="fade-right" data-aos-delay="100">
              <img src="{{ asset('storage' . '/' . $gallery->thumbnail) }}" class="img-fluid" alt="">
            </div>
          </div>
  
        </div>
        <div class="container" data-aos="fade-up">
        {!! $gallery_content !!}  
        </div>
      </section>
      @endsection