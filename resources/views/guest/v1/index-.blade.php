<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SITERU | Beranda</title>    
    <link rel="stylesheet" href="{{ asset('assets/css/siteru.all.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/siteru.scss') }}"> --}}

    <link rel="stylesheet" href={{ asset("assets/plugins/owl-carousel/dist/assets/owl.carousel.min.css") }}>
    <link rel="stylesheet" href={{ asset("assets/plugins/owl-carousel/dist/assets/owl.theme.default.min.css") }}>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

    {{-- navbar height 10vh --}}
    <section class="navigation">
        <div class="nav-container">
            <div class="brand">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('assets/images/icon.png') }}" width="30px">
                </a>
            </div>
            <nav>
                <div class="nav-mobile">
                    <a id="nav-toggle" href="#!">
                        <span></span>
                    </a>
                </div>
                <ul class="nav-list">
                    <li><a href="/"><b>Beranda</b></a></li>
                    <li><a href="/profile"><b>Profil</b></a></li>
                    <li><a href="/infrasctructure"><b>Jendela Infrastruktur</b></a></li>
                    <li>
                        <a href="#!">Services</a>
                        <ul class="nav-dropdown">
                            <li>
                                <a href="#!">Web Design</a>
                            </li>
                            <li>
                                <a href="#!">Web Development</a>
                            </li>
                            <li>
                                <a href="#!">Graphic Design</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#!">Pricing</a>
                    </li>
                    <li>
                        <a href="#!">Portfolio</a>
                        <ul class="nav-dropdown">
                            <li>
                                <a href="#!">Web Design</a>
                            </li>
                            <li>
                                <a href="#!">Web Development</a>
                            </li>
                            <li>
                                <a href="#!">Graphic Design</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#!">Contact</a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
    {{-- <nav>
        <a class="navbar-brand" href="/">
            <img src="{{ asset('assets/images/icon.png') }}" width="30px">
            <div>
                <span><b>SITERU</b></span>
                <span><b>KOTA KENDARI</b></span>
            </div>
        </a>
        <div class="collapse">
            <ul class="nav-item">
                <li><a href="/"><b>Beranda</b></a></li>
                <li><a href="/profile"><b>Profil</b></a></li>
                <li><a href="/infrasctructure"><b>Jendela Infrastruktur</b></a></li>
                <li>
                    <a href="#" class="menu-parent"><b>Organisasi</b> <i class="fas fa-chevron-down"></i></a>
                    <ul class="menu-child">
                        <li><a href="/sector/bidang-1"><b>Bidang 1</b></a></li>
                        <li><a href="/sector/bidang-2"><b>Bidang 2</b></a></li>
                        <li><a href="/sector/bidang-3"><b>Bidang 3</b></a></li>
                        <li><a href="/sector/bidang-4"><b>Bidang 4</b></a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="menu-parent"><b>Publikasi</b> <i class="fas fa-chevron-down"></i></a>
                    <ul class="menu-child">
                        <li><a href="/publication/news"><b>Berita</b></a></li>
                        <li><a href="/publication/galleries"><b>Galeri</b></a></li>
                        <li><a href="/publication/policies"><b>Kebijakan</b></a></li>
                    </ul>
                </li>
                <li><a href="/map"><b>Peta</b></a></li>
            </ul>
        </div>
    </nav> --}}

    {{-- hero --}}
    {{-- <div class="owl-carousel">
        @foreach ($slides as $slide)
        <div class="owl-carousel owl-theme">
            <div class="owl-slide d-flex align-items-center cover" style="background-image: url({{ asset('storage') . '/' . $slide->value }});">
                <div class="container">
                    <div class="row justify-content-center justify-content-md-start">
                        <div class="col-10 col-md-6 static">
                            <div class="owl-slide-text">
                                <h2 class="owl-slide-animated owl-slide-title">
                                    {{ $slide->field }}
                                </h2>
                                <div class="owl-slide-animated owl-slide-subtitle mb-3">
                                    {{ $slide->field }}
                                </div>
                                <a class="btn btn-primary owl-slide-animated owl-slide-cta" href="" role="button">
                                    {{ $slide->field }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div> --}}

    {{-- carousel --}}
    <div class="container-carousel">
        <div class="owl-carousel owl-theme" id="owl-carousel-news">
            @foreach ($newses as $news)
            <div class="carousel-item">
                <div class="carousel-item-image">
                    <img src="{{ asset('storage') . '/' . $news->thumbnail }}" class="item-image">
                </div>
                <div class="carousel-item-text">
                    <button class="btn-outline">{{ $news->sector->name }}</button>
                    <a href="/publikasi/berita/{{ $news->slug }}">
                        <h3 class="item-title">{{ $news->title }}</h3>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center">
            <button class="btn btn-primary"><a href="/publikasi/berita">Lihat Berita Lainnnya</a></button>
        </div>
    </div>

    {{-- galleries --}}
    <div class="container mb-5">
        <div class="row">
            <div class="left">
                <figure class="card dark" tabindex="0">
                    <img class="card-image" src="{{ asset('storage') . '/' . $galleries[0]->thumbnail }}" alt="">
                    <div class="box">
                        <div class="box-side-borders"></div>
                        <blockquote class="text">{{ $galleries[0]->title }}</blockquote>
                    </div>
                    <figcaption>
                        <cite class="cite">
                            {{ $galleries[0]->sector->name }}
                        </cite>
                    </figcaption>
                </figure>
                <div class="text-center">
                    <button class="btn btn-primary"><a href="/publikasi/galeri/{{ $galleries[0]->slug }}">Lihat Galeri</a></button>
                </div>
            </div>
            <div class="right">
                <div style="margin-top: 50px">
                    @for ($i = 1; $i < count($galleries); $i++)
                    <div class="gallery-item">
                        <div class="gallery-thumbnail">
                            <img src="{{ asset('storage') . '/' . $galleries[$i]->thumbnail }}" width="100px" alt="">
                        </div>
                        <div class="gallery-description">
                            <div class="gallery-title">
                                <h4><a href="/publikasi/galeri/{{ $galleries[$i]->slug }}">{{ $galleries[$i]->title }}</a></h4>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
    {{-- complains --}}
    <div class="container text-center" id="complains">
        <h3>YUK! CERITAKAN KEPADA KAMI KERISAUAN ANDA TERKAIT LINGKUNGAN SEKITAR ANDA</h3>
        <button class="btn-primary"><a href="#">Pengaduan</a></button>
    </div>

    {{-- footer --}}
    <footer>
        <div class="footer-dev">
            &copy; Copyright - Sekretariat Dinas PUPR KOTA KENDARI
        </div>
        <div class="footer-logo">
            <img src="{{ asset('assets/images/icon.png') }}" width="30px">
            <div>
                <span><b>SITERU</b></span>
                <span><b>KOTA KENDARI</b></span>
            </div>
        </div>
    </footer>

    <script src={{ asset("assets/plugins/jquery/jquery.min.js") }}></script>
    <script src={{ asset("assets/plugins/owl-carousel/dist/owl.carousel.min.js") }}></script>
    <script src={{ asset("assets/js/script.js") }}></script>

</body>
</html>