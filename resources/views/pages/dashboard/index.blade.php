@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                    Dashboard 
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if (session()->has('error'))                        
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        @usector
                        <div class="col-sm-6">
                            <div class="info-box">
                                <span class="info-box-icon bg-info"><i class="fas fa-building"></i></span>
                                <div class="info-box-content">
                                    <a href="/admin/sectors" class="info-box-text">Bidang</a>
                                    <span class="info-box-number">{{ $info['bidang'] }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="info-box">
                                <span class="info-box-icon bg-info"><i class="far fa-circle"></i></span>
                                <div class="info-box-content">
                                    <a href="/admin/publication/news" class="info-box-text">Berita</a>
                                    <span class="info-box-number">{{ $info['berita'] }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="info-box">
                                <span class="info-box-icon bg-info"><i class="far fa-circle"></i></span>
                                <div class="info-box-content">
                                    <a href="/admin/publication/galleries" class="info-box-text">Galeri</a>
                                    <span class="info-box-number">{{ $info['galeri'] }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="info-box">
                                <span class="info-box-icon bg-info"><i class="far fa-circle"></i></span>
                                <div class="info-box-content">
                                    <a href="/admin/publication/policies" class="info-box-text">Kebijakan</a>
                                    <span class="info-box-number">{{ $info['kebijakan'] }}</span>
                                </div>
                            </div>
                        </div>
                        @endusector
                        @uadmin
                        <div class="col-sm-6">
                            <div class="info-box">
                                <span class="info-box-icon bg-info"><i class="far fa-circle"></i></span>
                                <div class="info-box-content">
                                    <a href="/admin/master/users" class="info-box-text">User</a>
                                    <span class="info-box-number">{{ $info['user'] }}</span>
                                </div>
                            </div>
                        </div>
                        @enduadmin
                        @task_force
                        <div class="col-sm-6">
                            <div class="info-box">
                                <span class="info-box-icon bg-info"><i class="far fa-circle"></i></span>
                                <div class="info-box-content">
                                    <a href="/admin/violations" class="info-box-text">Pelanggaran</a>
                                    <span class="info-box-number">{{ $info['pelanggaran'] }}</span>
                                </div>
                            </div>
                        </div>
                        @endtask_force
                    </div>
                </div>
                @usector
                @if ($news)
                <div class="col-sm-6">
                    <div class="card card-widget">
                        <div class="card-header">
                            <div class="user-block">
                                <span class="username"><a href="#">{{ $news->sector->name }}</a></span>
                                <span class="description">Diposting - {{ date('d M Y', strtotime($news->date)) }}</span>
                            </div>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <img class="img-fluid pad" src="{{ asset('storage/') . '/' . $news->thumbnail }}" alt="Photo">
          
                            <p>{{ $news->description }}</p>
                            <a href="/admin/publication/news/{{ $news->id }}" class="btn btn-default btn-sm"><i class="fas fa-eye mr-2"></i> Selengkapnya</a>
                        </div>
                    </div>
                </div>
                @endif
                @endusector
            </div>
            @usector
            <div class="row">
                <div class="col-12 mt-3">
                    <h4>Galeri Terbaru</h4>
                    <div class="row">
                        @foreach ($galleries as $gallery)
                        <div class="col-sm-4">
                            <div class="card card-success">
                                <div class="card-body">
                                    <img src="{{ asset('storage') . '/' . $gallery->thumbnail }}" class="img-fluid">
                                    <p>{{ $gallery->title }}</p>
                                    <div class="row">
                                        <div class="col-6">
                                            <h5 class="btn-sm btn btn-default">{{ $gallery->sector->name }}</h5>
                                        </div>
                                        <div class="col-6">
                                            <button class="btn btn-default btn-sm">{{ strftime('%A %d %b %Y', strtotime($gallery->date)) }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endusector
        </div>
    </section>
</div> 
@endsection