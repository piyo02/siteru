<!-- ======= Top Bar ======= -->
<section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:KOTAKENDARIDINASPUPR@gmail.com">KOTAKENDARIDINASPUPR@gmail.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>082259628878</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="youtube"><i class="bi bi-youtube"></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="/">SITERU<span>.</span></a></h1>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto {{ Request::is("/") ? 'active' : '' }}" href="/">Beranda</a></li>
          <li><a class="nav-link scrollto {{ Request::is("profil") ? 'active' : '' }}" href="/profil">Profil</a></li>
          <li class="dropdown"><a href="#"><span>Jendela Infrastruktur</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              @foreach ($configs as $config)
              <li> <a href="/jendela-infrastruktur/{{ $config->field }}">{{ $config->value }}</a></li>
              @endforeach
            </ul>
          </li>
          {{-- <li><a class="nav-link scrollto {{ Request::is("jendela-infrastruktur") ? 'active' : '' }}" href="/jendela-infrastruktur">Jendela Infrastruktur</a></li> --}}
          <li class="dropdown"><a href="#"><span>Organisasi</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
                @foreach ($sectors as $sector)
                <li><a href="/organisasi/{{ $sector->slug }}">{{ $sector->name }}</a></li>
                @endforeach
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Publikasi</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="/publikasi/berita">Berita</a></li>
              <li><a href="/publikasi/galeri">Galeri</a></li>
              <li><a href="/publikasi/kebijakan">Kebijakan</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto {{ Request::is("peta") ? 'active' : '' }} " href="/peta">Peta</a></li>
          <li><a class="nav-link scrollto" href="/#complaint">Pengaduan</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header>
  <!-- End Header -->