@extends('guest.v3.layout.main')

@section('content')

  @if (count($infrastructures))
    <section class="featured-services">
      <div class="container" data-aos="fade-up">

        <div class="blog-slider">
          <div class="blog-slider__wrp swiper-wrapper">
            
            @foreach ($infrastructures as $infrastructure)
            <div class="blog-slider__item swiper-slide">
              <div class="blog-slider__img">
                <img src="{{ asset('storage') . '/' . $infrastructure->image }}" alt="">
              </div>
              <div class="blog-slider__content">
                <span class="badge bg-warning">{{ $infrastructure->sector->name }}</span>
                <span class="blog-slider__code">{{ $infrastructure->year }}</span>
                <span class="blog-slider__code">( {{ $infrastructure->duration }} )</span>
                <div class="blog-slider__title">{{ $infrastructure->address }}</div>
                <div class="blog-slider__text">{!! $infrastructure->description !!}</div>
                <a href="#" class="blog-slider__button">{{ $infrastructure->name }}</a>
              </div>
            </div>
            @endforeach
            
            
          </div>
          <div class="blog-slider__pagination"></div>
        </div>

      </div>
    </section>
  @else
    @include('guest.v3.layout.no-content')      
  @endif

@endsection