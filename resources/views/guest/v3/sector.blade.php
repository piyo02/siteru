@extends('guest.v3.layout.main')

@section('content')
<!-- ======= News Section ======= -->
<section class="featured-services">
      <div class="container" data-aos="fade-up">
        <div class="row text-center" style="color: #12306c;">
          <h4>{{ $sector->name }}</h4>
        </div>
        <div class="row">
          <div class="col-md-8" data-aos="fade-right" data-aos-delay="100">
            <div class="card border-0 mb-4" id="program">
              <div class="card-body">
                {!! $program !!}
              </div>
            </div>
            <div class="card border-0 mb-4" id="job">
              <div class="card-body">
                {!! $job !!}
              </div>
            </div>
            <div class="card border-0 mb-4" id="purpose">
              <div class="card-body">
                {!! $purpose !!}
              </div>
            </div>
            <div class="card border-0 mb-4" id="s-o">
              <div class="card-body">
              <img src="{{ asset('storage' . '/' . $sector->structure) }}" class="img-fluid" />
              </div>
            </div>
          </div>
          <div class="col-md-4" data-aos="fade-left" data-aos-delay="100">
            <div class="card border-0">
              <div class="card-body">
                <ul style="list-style: none; font-size: 14px;">
                  <li><i class="bx bx-chevron-right"></i> <a href="#program">Program Kerja</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#job">Tugas</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#purpose">Fungsi</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#s-o">Struktur Organisasi</a></li>
                </ul>
              </div>
            </div>
            <div class="mt-4 card border-0">
              <div class="card-body">
                <ul style="list-style: none; font-size: 14px; color: #12306c;">
                  @foreach ($contacts as $contact)
                    <li class="mb-2">
                      <img class="mr-3" src="{{ asset('storage') . '/' . $contact->contact_type->icon }}" alt="" width="18px" height="18px">
                      {{ $contact->contact }}
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
    @endsection