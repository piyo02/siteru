@extends('guest.v3.layout.main')

@section('content')
<!-- ======= News Section ======= -->
<section id="about" class="about section-bg">
  <div data-aos="fade-up" class="mb-4">

    <div class="section-title">
      <h2>Berita</h2>
      <h5>{{ $news->title }}</h5>
      <p class="badge bg-warning">{{ $news->sector->name }}</p>
    </div>

    <div class="row">
      <div class="col-lg-10" data-aos="fade-right" data-aos-delay="100">
        <img src="{{ asset('storage' . '/' . $news->thumbnail) }}" class="img-fluid" alt="">
      </div>
    </div>

  </div>
  <div class="container" data-aos="fade-up">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-12">
        {!! $news_content !!}  
      </div>
    </div>
  </div>
</section>
@endsection