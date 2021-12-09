@extends('guest.v3.layout.main')

@section('content')
@if (count($newses))
<!-- ======= News Section ======= -->
<section id="featured-services" class="featured-services">
  <div class="container" data-aos="fade-up">

    <div class="row">
      @foreach ($newses as $news)
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card border-0">
          <div class="position-relative">
            <img src="{{ asset('storage' . '/' . $news->thumbnail) }}" alt="" class="img-fluid">
            <div class="card-img-overlay">
              <span class="badge bg-warning text-uppercase">{{ $news->sector->name }}</span>
            </div>
          </div>
          <div class="card-body">
            <h5 class="card-title">{{ $news->title }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ strftime('%A %d %b %Y', strtotime($news->date)) }}</h6>
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
      <div class="col-12 text-center mt-5">
        {{ $newses->links() }}
        {{-- <button class="btn btn-outline-primary">Tampilkan lebih banyak lagi</button> --}}
      </div>
    </div>

  </div>
</section>    
@else
  @include('guest.v3.layout.no-content')
@endif
@endsection