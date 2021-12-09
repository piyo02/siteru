@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1 class="m-0">
                        {{ $page }}
                        <a href="/admin/publication/news" class="btn btn-sm btn-default">Kembali</a>
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <img src="{{ asset('storage') . '/' . $news->thumbnail}}" class="img-fluid">
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="callout callout-info">
                        {{$news->description}}
                    </div>
                </div>
                <div class="col-12 my-3">
                    <div class="card p-3">
                        {!! $news_content !!}
                    </div>
                </div>
                <div class="col-12 my-2">
                    <button class="btn btn-sm btn-default">{{ $news->sector->name }}</button>
                    <button class="btn btn-sm btn-default">{{ $news->date }}</button>
                    <button class="btn btn-sm btn-default">
                        <i class="fas fa-eye mr-1"></i>
                        {{ $news->seen . ' kali' }}
                    </button>
                </div>
            </div>
        </div>
    </section>
</div> 
@endsection