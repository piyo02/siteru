/**
* Template Name: BizLand - v3.7.0
* Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/
var swiper = new Swiper('.blog-slider', {
  spaceBetween: 30,
  effect: 'fade',
  loop: true,
  mousewheel: {
    invert: false,
  },
  // autoHeight: true,
  pagination: {
    el: '.blog-slider__pagination',
    clickable: true,
  }
});

(function() {
  "use strict";

  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }

  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    let selectEl = select(el, all)
    if (selectEl) {
      if (all) {
        selectEl.forEach(e => e.addEventListener(type, listener))
      } else {
        selectEl.addEventListener(type, listener)
      }
    }
  }

  /**
   * Easy on scroll event listener 
   */
  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
  }

  /**
   * Navbar links active state on scroll
   */
  let navbarlinks = select('#navbar .scrollto', true)
  const navbarlinksActive = () => {
    let position = window.scrollY + 200
    navbarlinks.forEach(navbarlink => {
      if (!navbarlink.hash) return
      let section = select(navbarlink.hash)
      if (!section) return
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        navbarlink.classList.add('active')
      } else {
        navbarlink.classList.remove('active')
      }
    })
  }
  window.addEventListener('load', navbarlinksActive)
  onscroll(document, navbarlinksActive)

  /**
   * Scrolls to an element with header offset
   */
  const scrollto = (el) => {
    let header = select('#header')
    let offset = header.offsetHeight

    if (!header.classList.contains('header-scrolled')) {
      offset -= 16
    }

    let elementPos = select(el).offsetTop
    window.scrollTo({
      top: elementPos - offset,
      behavior: 'smooth'
    })
  }

  /**
   * Header fixed top on scroll
   */
  let selectHeader = select('#header')
  if (selectHeader) {
    let headerOffset = selectHeader.offsetTop
    let nextElement = selectHeader.nextElementSibling
    const headerFixed = () => {
      if ((headerOffset - window.scrollY) <= 0) {
        selectHeader.classList.add('fixed-top')
        nextElement.classList.add('scrolled-offset')
      } else {
        selectHeader.classList.remove('fixed-top')
        nextElement.classList.remove('scrolled-offset')
      }
    }
    window.addEventListener('load', headerFixed)
    onscroll(document, headerFixed)
  }

  /**
   * Back to top button
   */
  let backtotop = select('.back-to-top')
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        backtotop.classList.add('active')
      } else {
        backtotop.classList.remove('active')
      }
    }
    window.addEventListener('load', toggleBacktotop)
    onscroll(document, toggleBacktotop)
  }

  /**
   * Mobile nav toggle
   */
  on('click', '.mobile-nav-toggle', function(e) {
    select('#navbar').classList.toggle('navbar-mobile')
    this.classList.toggle('bi-list')
    this.classList.toggle('bi-x')
  })

  /**
   * Mobile nav dropdowns activate
   */
  on('click', '.navbar .dropdown > a', function(e) {
    if (select('#navbar').classList.contains('navbar-mobile')) {
      e.preventDefault()
      this.nextElementSibling.classList.toggle('dropdown-active')
    }
  }, true)

  /**
   * Scrool with ofset on links with a class name .scrollto
   */
  on('click', '.scrollto', function(e) {
    if (select(this.hash)) {
      e.preventDefault()

      let navbar = select('#navbar')
      if (navbar.classList.contains('navbar-mobile')) {
        navbar.classList.remove('navbar-mobile')
        let navbarToggle = select('.mobile-nav-toggle')
        navbarToggle.classList.toggle('bi-list')
        navbarToggle.classList.toggle('bi-x')
      }
      scrollto(this.hash)
    }
  }, true)

  /**
   * Scroll with ofset on page load with hash links in the url
   */
  window.addEventListener('load', () => {
    if (window.location.hash) {
      if (select(window.location.hash)) {
        scrollto(window.location.hash)
      }
    }
  });

  /**
   * Preloader
   */
  let preloader = select('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove()
    });
  }

  /**
   * Initiate glightbox
   */
  const glightbox = GLightbox({
    selector: '.glightbox'
  });

  /**
   * Skills animation
   */
  let skilsContent = select('.skills-content');
  if (skilsContent) {
    new Waypoint({
      element: skilsContent,
      offset: '80%',
      handler: function(direction) {
        let progress = select('.progress .progress-bar', true);
        progress.forEach((el) => {
          el.style.width = el.getAttribute('aria-valuenow') + '%'
        });
      }
    })
  }

  /**
   * Testimonials slider
   */
  new Swiper('.testimonials-slider', {
    speed: 600,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    }
  });

  /**
   * Porfolio isotope and filter
   */
  window.addEventListener('load', () => {
    let portfolioContainer = select('.portfolio-container');
    if (portfolioContainer) {
      let portfolioIsotope = new Isotope(portfolioContainer, {
        itemSelector: '.portfolio-item'
      });

      let portfolioFilters = select('#portfolio-flters li', true);

      on('click', '#portfolio-flters li', function(e) {
        e.preventDefault();
        portfolioFilters.forEach(function(el) {
          el.classList.remove('filter-active');
        });
        this.classList.add('filter-active');

        portfolioIsotope.arrange({
          filter: this.getAttribute('data-filter')
        });
        portfolioIsotope.on('arrangeComplete', function() {
          AOS.refresh()
        });
      }, true);
    }

  });

  /**
   * Initiate portfolio lightbox 
   */
  const portfolioLightbox = GLightbox({
    selector: '.portfolio-lightbox'
  });

  /**
   * Portfolio details slider
   */
  new Swiper('.portfolio-details-slider', {
    speed: 400,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    }
  });

  /**
   * Animation on scroll
   */
  window.addEventListener('load', () => {
    AOS.init({
      duration: 1000,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    })
  });

})()

// carousel

$(document).ready(function() {
  jQuery.fn.carousel.Constructor.TRANSITION_DURATION = 2000  // 2 seconds
});



// maps
var batas_administrasi = new L.LayerGroup(); 
var pelanggaran_ringan = new L.LayerGroup();
var pelanggaran_sedang = new L.LayerGroup();
var pelanggaran_berat = new L.LayerGroup();
var satgas_tim_1 = new L.LayerGroup();
var satgas_tim_dua = new L.LayerGroup();
var satgas_tim_3 = new L.LayerGroup();
var pola_ruang_2010_2030 = new L.LayerGroup();
var pola_ruang_2017_2037 = new L.LayerGroup();

    var map = L.map('map', {
        center: [-3.989384, 122.517814],
        zoom: 12.5,
        zoomControl: false,
        layers:[]
    }); 

    var GoogleRoads = new L.TileLayer('https://mt1.google.com/vt/lyrs=h&x={x}&y={y}&z={z}',{
        opacity: 1.0, 
        attribution: 'WebGIS Trainning by Roni Haryadi'
    });

    var GoogleMaps = new L.TileLayer('https://mt1.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', { 
        opacity: 1.0,
        attribution: 'WebGIS Trainning by Roni Haryadi'
    }); 

    var OpenStreetMap_Mapnik = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
	    maxZoom: 19,
	    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });

    var OpenTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
	    maxZoom: 17,
	    attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
    });

    var Esri_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
	    attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
    });

    var GoogleSatelliteHybrid= L.tileLayer('https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
        maxZoom: 22,
        attribution: 'WebGIS by Alam nuari ahmadi pakambanan'
    }).addTo(map);

    var baseLayers = {
        'Google Satellite Hybrid': GoogleSatelliteHybrid,
        'Open Street Map.Mapnik' : OpenStreetMap_Mapnik,
        'Open To Map' : OpenTopoMap,
        'Esri World Imagery' : Esri_WorldImagery,
        'Google Roads' : GoogleRoads,
        'Google Map' : GoogleMaps
        };

    var groupedOverlays = {
        'Peta Dasar' :{
            'Administrasi Kota Kendari' : batas_administrasi
        },
        'Pola Ruang' :{
            'Pola Ruang 2010-2030' : pola_ruang_2010_2030,
            'Pola Ruang 2017-2035' : pola_ruang_2017_2037,
        }, 
        'Wilayah Patroli Satgas Tim Tata Ruang' :{
            'Wilayah Patroli Satgas Tim 1' : satgas_tim_1,
            'Wilayah Patroli Satgas Tim 2' : satgas_tim_dua,
            'Wilayah Patroli Satgas Tim 3' : satgas_tim_3,
        },
        'Koordinat Pelanggaran' :{
            'Pelanggaran Ringan' : pelanggaran_ringan,
            'Pelanggaran Sedang' : pelanggaran_sedang,
            'Pelanggaran Berat' : pelanggaran_berat
            }
        };

    L.control.groupedLayers(baseLayers, groupedOverlays).addTo(map); 

    var osmUrl='https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}' ;
    var osmAttrib='Map data &copy; OpenStreetMap contributors';
    var osm2 = new L.TileLayer(osmUrl, {minZoom: 0, maxZoom: 13, attribution: osmAttrib });
    var rect1 = {color: "#ff1100", weight: 3};
    var rect2 = {color: "#0000AA", weight: 1, opacity:0, fillOpacity:0};
    var miniMap = new L.Control.MiniMap(osm2, {toggleDisplay: true, position : "bottomright", aimingRectOptions
    : rect1, shadowRectOptions: rect2}).addTo(map); 

    L.Control.geocoder({position :"topleft", collapsed:false}).addTo(map); 

    L.control.coordinates({
        position:"bottomleft",
        decimals:10,
        decimalSeperator:",",
        labelTemplateLat:"Latitude: {y}",
        labelTemplateLng:"Longitude: {x}"
        }).addTo(map); 

    var north = L.control({position: "bottomleft"});
        north.onAdd = function(map) {
    var div = L.DomUtil.create("div", "info legend");
        div.innerHTML = '<img src="assets/guest/img/mata_angin.png" style=width:100px> ';
        return div; } 
        north.addTo(map);

/* GPS enabled geolocation control set to follow the user's location */
    var locateControl = L.control.locate({
        position: "topleft",
        drawCircle: true,
        follow: true,
        setView: true,
        keepCurrentZoomLevel: true,
        markerStyle: {
            weight: 1,
            opacity: 0.8,
            fillOpacity: 0.8
        },
        circleStyle: {
            weight: 1,
            clickable: false
        },
        icon: "fa fa-location-arrow",
        metric: false,
        strings: {
            title: "My location",
            popup: "You are within {distance} {unit} from this point",
            outsideMapBoundsMsg: "You seem located outside the boundaries of the map"
        },
        locateOptions: {
            maxZoom: 18,
            watch: true,
            enableHighAccuracy: true,
            maximumAge: 10000,
            timeout: 10000
        }
        }).addTo(map); 

    var zoom_bar = new L.Control.ZoomBar({position: 'topleft'}).addTo(map); 

$.getJSON("/assets/guest/json/kota_kendari.geojson",function(color){
    L.geoJson( color, {
      style: function(feature){
        var fillColor= feature.properties.warna;  
        return { color: "#4cee87", weight: 1.5, fillColor: fillColor, fillOpacity: .5 };
      },
      onEachFeature: function( feature, layer ){
        layer.bindPopup('Provinsi : ' + feature.properties.provinsi + '<br>' +
        'Kabupaten : ' + feature.properties.kabkot + '<br>' +
        'Kecamatan : ' + feature.properties.kecamatan + '<br>' +
        'Kelurahan : ' + feature.properties.desa + '<br>' +
        'Tahun : ' + feature.properties.tahun + '<br>' +
        'Sumber : ' + feature.properties.sumber);
      }
    }).addTo(batas_administrasi);
  });

  $.getJSON("assets/guest/json/2010_2030.geojson",function(color){
    L.geoJson( color, {
      style: function(feature){
        var fillColor= feature.properties.warna;  
        return { color: "#4cee87", weight: 1.5, fillColor: fillColor, fillOpacity: .5 };
      },
      onEachFeature: function( feature, layer ){
        layer.bindPopup('Pola Ruang : ' + feature.properties.Name + '<br>' +
        'Sumber : ' + feature.properties.source);
      }
    }).addTo(pola_ruang_2010_2030);
  });

  $.getJSON("assets/guest/json/2017_2037.geojson",function(color){
    L.geoJson( color, {
      style: function(feature){
        var fillColor= feature.properties.warna;  
        return { color: "#4cee87", weight: 1.5, fillColor: fillColor, fillOpacity: .5 };
      },
      onEachFeature: function( feature, layer ){
        layer.bindPopup('Pola Ruang : ' + feature.properties.Name + '<br>' +
        'Sumber : ' + feature.properties.FolderPath);
      }
    }).addTo(pola_ruang_2017_2037);
  });

  $.getJSON("assets/guest/json/wilayah_tim_1.geojson",function(color){
    L.geoJson( color, {
      style: function(feature){
        var fillColor= feature.properties.warna;  
        return { color: "#4cee87", weight: 1.5, fillColor: fillColor, fillOpacity: .5 };
      },
      onEachFeature: function( feature, layer ){
        layer.bindPopup('Provinsi : ' + feature.properties.provinsi + '<br>' +
        'Kabupaten : ' + feature.properties.kabkot + '<br>' +
        'Kecamatan : ' + feature.properties.kecamatan + '<br>' +
        'Kelurahan : ' + feature.properties.desa + '<br>' +
        'Tahun : ' + feature.properties.tahun + '<br>' +
        'Sumber : ' + feature.properties.sumber);
      }
    }).addTo(satgas_tim_1);
  });

  $.getJSON("assets/guest/json/wilayah_tim_dua_degree.geojson",function(color){
    L.geoJson( color, {
      style: function(feature){
        var fillColor= feature.properties.warna;  
        return { color: "#4cee87", weight: 1.5, fillColor: fillColor, fillOpacity: .5 };
      },
      onEachFeature: function( feature, layer ){
        layer.bindPopup('Provinsi : ' + feature.properties.provinsi + '<br>' +
        'Kabupaten : ' + feature.properties.kabkot + '<br>' +
        'Kecamatan : ' + feature.properties.kecamatan + '<br>' +
        'Kelurahan : ' + feature.properties.desa + '<br>' +
        'Tahun : ' + feature.properties.tahun + '<br>' +
        'Sumber : ' + feature.properties.sumber);
      }
    }).addTo(satgas_tim_dua);
  });

  $.getJSON("assets/guest/json/wilayah_tim_3.geojson",function(color){
    L.geoJson( color, {
      style: function(feature){
        var fillColor= feature.properties.warna;  
        return { color: "#4cee87", weight: 1.5, fillColor: fillColor, fillOpacity: .5 };
      },
      onEachFeature: function( feature, layer ){
        layer.bindPopup('Provinsi : ' + feature.properties.provinsi + '<br>' +
        'Kabupaten : ' + feature.properties.kabkot + '<br>' +
        'Kecamatan : ' + feature.properties.kecamatan + '<br>' +
        'Kelurahan : ' + feature.properties.desa + '<br>' +
        'Tahun : ' + feature.properties.tahun + '<br>' +
        'Sumber : ' + feature.properties.sumber);
      }
    }).addTo(satgas_tim_3);
  });

  $.getJSON("assets/guest/json/koor_pelanggaran_ringan.geojson",function(data){
    var ratIcon = L.icon({
        iconUrl: 'assets/guest/img/penanda.png',
            iconSize: [14]
    });
    L.geoJson(data,{
      pointToLayer: function(feature,latlng){
        var marker = L.marker(latlng,{icon: ratIcon});
        marker.bindPopup('Nama : ' + feature.properties. NAMA + '<br>' +
        'Kelurahan : ' + feature.properties. KELURAHAN + '<br>' +
        'Kecamatan : ' + feature.properties. KECAMATAN + '<br>' +
        'Alamat : ' + feature.properties. ALAMAT + '<br>' +
        'Tim : ' + feature.properties. TIM + '<br>' +
        'Nomor : ' + feature.properties. NOMOR + '<br>' +
        'Pelanggaran : ' + feature.properties. PELANGGARA + '<br>' +
        'Kegiatan Pembangunan : ' + feature.properties. KEG_PEMBAN + '<br>' +
        'Teguran : ' + feature.properties. TEGURAN);
        return marker; 
      }
    }).addTo(pelanggaran_ringan);
  });

  $.getJSON("assets/guest/json/koor_pelanggaran_sedang.geojson",function(data){
    var ratIcon = L.icon({
        iconUrl: 'assets/guest/img/penanda2.png',
            iconSize: [14]
    });
    L.geoJson(data,{
      pointToLayer: function(feature,latlng){
        var marker = L.marker(latlng,{icon: ratIcon});
        marker.bindPopup('Nama : ' + feature.properties. NAMA + '<br>' +
        'Kelurahan : ' + feature.properties. KELURAHAN + '<br>' +
        'Kecamatan : ' + feature.properties. KECAMATAN + '<br>' +
        'Alamat : ' + feature.properties. ALAMAT + '<br>' +
        'Tim : ' + feature.properties. TIM + '<br>' +
        'Nomor : ' + feature.properties. NOMOR + '<br>' +
        'Pelanggaran : ' + feature.properties. PELANGGARA + '<br>' +
        'Kegiatan Pembangunan : ' + feature.properties. KEG_PEMBAN + '<br>' +
        'Teguran : ' + feature.properties. TEGURAN);
        return marker; 
      }
    }).addTo(pelanggaran_sedang);
  });

  $.getJSON("assets/guest/json/koor_pelanggaran_berat.geojson",function(data){
    var ratIcon = L.icon({
        iconUrl: 'assets/guest/img/penanda3.png',
            iconSize: [14]
    });
    L.geoJson(data,{
      pointToLayer: function(feature,latlng){
        console.log(latlng)
        console.log(feature)
        var marker = L.marker(latlng,{icon: ratIcon});
        marker.bindPopup('Nama : ' + feature.properties. NAMA + '<br>' +
        'Kelurahan : ' + feature.properties. KELURAHAN + '<br>' +
        'Kecamatan : ' + feature.properties. KECAMATAN + '<br>' +
        'Alamat : ' + feature.properties. ALAMAT + '<br>' +
        'Tim : ' + feature.properties. TIM + '<br>' +
        'Nomor : ' + feature.properties. NOMOR + '<br>' +
        'Pelanggaran : ' + feature.properties. PELANGGARA + '<br>' +
        'Kegiatan Pembangunan : ' + feature.properties. KEG_PEMBAN + '<br>' +
        'Teguran : ' + feature.properties. TEGURAN);
        return marker; 
      }
    }).addTo(pelanggaran_berat);
  });