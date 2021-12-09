@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1 class="m-0">
                        {{ $page }}
                        <a href="/admin/publication/galleries" class="btn btn-sm btn-default">Kembali</a>
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <img src="{{ asset('storage') . '/' . $gallery->thumbnail}}" class="img-fluid">
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="card p-3">
                        {!! $gallery_content !!}
                    </div>
                </div>
                <div class="col-12 my-2">
                    <button class="btn btn-sm btn-default">{{ $gallery->sector->name }}</button>
                </div>
            </div>
        </div>
    </section>
</div> 
@endsection