@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <div class="content-header mb-4">
        <div class="container-fluid">
            <div class="col-12">
                <div class="row justify-content-between">
                    <h1 class="m-0">
                        {{ $page }}
                    </h1>
                    <a href="/admin/sectors" class="btn btn-sm btn-default">Kembali</a>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card p-3">
                        {!! $program !!}
                    </div>
                </div>
                <div class="col-12">
                    <div class="card p-3">
                        {!! $job !!}
                    </div>
                </div>
                <div class="col-12">
                    <div class="card p-3">
                        {!! $purpose !!}
                    </div>
                </div>
                <div class="mt-3 p-3">
                    <div class="card">
                        <img src="{{ asset('storage') . '/' . $sector->structure }}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div> 
@endsection