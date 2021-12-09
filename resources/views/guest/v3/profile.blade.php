@extends('guest.v3.layout.main')

@section('content')
    <!-- ======= News Section ======= -->
    <section class="featured-services">
      <div class="container" data-aos="fade-up">
        
        <div class="row text-center" style="color: #12306c;">
          <h4>KEPALA DINAS PU KOTA KENDARI</h4>
        </div>
        <div class="row">
          <div class="col-md-8" data-aos="fade-right" data-aos-delay="100">
            <div class="card border-0 mb-4" id="v-s">
              <div class="card-body">
                {!! $vs_ms_content !!}
              </div>
            </div>
            <div class="card border-0 mb-4" id="t-f">
              <div class="card-body">
                {!! $tgs_fgs_content !!}
              </div>
            </div>
            {{-- <div class="card border-0 mb-4" id="m-l">
              <div class="card-body">
                {!! $mt_lbg_content !!}
              </div>
            </div> --}}
            <div class="card border-0 mb-4" id="s-o">
              <img src="{{ asset('storage' . '/' . $str_org->value) }}" class="img-fluid" />
            </div>
          </div>
          <div class="col-md-4" data-aos="fade-left" data-aos-delay="100">
            <div class="card border-0">
              <div class="card-body">
                <ul style="list-style: none; font-size: 14px;">
                  <li><i class="bx bx-chevron-right"></i> <a href="#v-s">Visi dan  Misi</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#t-f">Tugas dan Fungsi</a></li>
                  {{-- <li><i class="bx bx-chevron-right"></i> <a href="#m-l">Motto dan Lambang</a></li> --}}
                  <li><i class="bx bx-chevron-right"></i> <a href="#s-o">Struktur Organisasi</a></li>
                </ul>
              </div>
            </div>
            <div class="mt-4 card border-0">
              <div class="card-body">
                <ul style="list-style: none; font-size: 14px; color: #12306c;">
                  <li class="mb-2"><i class="bi bi-facebook"></i> <a href="#">Facebook</a></li>
                  <li class="mb-2"><i class="bi bi-instagram"></i> <a href="#">Instagram</a></li>
                  <li class="mb-2"><i class="bi bi-youtube"></i> <a href="#">YouTube</a></li>
                  <li class="mb-2"><i class="bi bi-phone"></i> <a href="#">082259628878</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
@endsection