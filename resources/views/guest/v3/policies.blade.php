@extends('guest.v3.layout.main')

@section('content')
<section id="services" class="services">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Kebijakan</h2>
            <h5>Pengumuman dan Kebijakan <span>DINAS PU KOTA KENDARI</span></h5>
            <p>Yuk, ketahui kebijakan apa saja yang telah dikeluarkan oleh DINAS PU KOTA KENDARI</p>
          </div>
  
          @if (count($policies))
          <div class="row">
            @foreach ($policies as $policy)
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-file"></i></div>
                <a href="/publikasi/kebijakan/download/{{ $policy->id }}" class="mb-3 badge bg-warning">Download</a>
                <h4>{{ $policy->title }}</h4>
                <p>{{ $policy->description }}</p>
              </div>
            </div>
            @endforeach
          </div>
          @else
              @include('guest.v3.layout.no-content')
          @endif
  
        </div>
      </section>
  </main><!-- End #main -->
  @endsection
