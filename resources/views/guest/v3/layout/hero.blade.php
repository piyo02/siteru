<!-- ======= Hero Section ======= -->
<section style="padding: 0px !important;" id="hero" class="d-flex align-items-center">
  <div class="carousel slide" id="custom-carousel" data-ride="carousel">
    <ol class="carousel-indicators">
      <li class="active" data-target="#custom-carousel" data-slide-to="0"></li>
      <li data-target="#custom-carousel" data-slide-to="1"></li>
      <li data-target="#custom-carousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        @foreach ($slides as $slide)
        <div class="carousel-item  {{ ($loop->iteration == 1) ? 'active' : '' }}">
          <img src="{{ asset('storage') . '/' . $slide->value }}" alt="" width="100%">
          {{-- <div class="item" style="background-image: url({{ asset('storage') . '/' . $slide->value }}); background-size: cover; background-position: center; background-repeat: no-repeat;"></div> --}}
        </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#custom-carousel" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="bx carousel-control-next" href="#custom-carousel" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>
</section>
</section>
  <!-- End Hero -->