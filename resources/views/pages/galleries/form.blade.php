@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        {{ $page }}
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ $action }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if ($page == 'Edit Galeri')
                                @method('put')
                            @endif
                            <div class="card-header">
                                <div class="col-12">
                                    <h5>{{ $page }}</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @if (!isset($gallery))
                                    <div class="col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="">Bidang</label>
                                            <select name="sector_id" id="sector_id" class="form-control">
                                                @foreach ($sectors as $sector)
                                                    @if (old('sector_id') == $sector->id)
                                                        <option value="{{ $sector->id }}" selected>{{ $sector->name }}</option>
                                                    @else
                                                        <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @else
                                    <div class="col-sm-6 col-12">
                                        <label for="sector_id">Bidang</label>
                                        <input type="text" class="form-control" value="{{ isset($gallery) ? $gallery->sector->name : '' }}" disabled>
                                    </div>
                                    @endif
                                    <div class="col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="">Judul Galeri</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', isset($gallery) ? $gallery->title : '') }}" placeholder="Judul Berita">
                                        </div>
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Tanggal: {{ isset($gallery) ? $gallery->date : '' }}</label>
                                            <div class="input-group date" id="date" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" name="date" data-target="#date" value="{{ isset($news) ? $news->date : '' }}"/>
                                                <div class="input-group-append" data-target="#date" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="thumbnail">Thumbnail Galeri</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail">
                                                    <label class="custom-file-label" for="thumbnail">Pilih File</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        @if (isset($gallery))
                                        <div class="form-group">
                                            <img src="{{ asset('storage') . '/' . $gallery->thumbnail }}" class="col-lg-5 img-fluid">
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer clearfix">
                                <div class="row">
                                    <div class="col-2"></div>
                                    <div class="col-10">
                                        <div class="float-right">
                                            <a href="/admin/publication/galleries" class="btn btn-sm btn-danger">Batal</a>
                                            <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div> 
@endsection