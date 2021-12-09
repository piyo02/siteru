@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        Galeri
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
                        <div class="card-header">
                            <div class="col-12">
                                <h5>Daftar Galeri</h5>
                            </div>
                            <div class="row">
                                <div class="col-6"></div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-2"></div>
                                        <div class="col-10">
                                            <div class="float-right">
                                                <a href="/admin/publication/galleries/create" class="btn btn-sm btn-success">
                                                    <i class="fas fa-plus mr-1"></i>
                                                    Tambah Galeri
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No.</th>
                                        <th>Judul</th>
                                        <th>Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($galleries as $gallery)
                                    <tr>
                                        <td>{{ request()->query('page') ? $loop->iteration + ((request()->query('page')-1)*10) : $loop->iteration }}</td>
                                        <td>
                                            {{ $gallery->title }}<br>
                                            <button class="btn btn-sm btn-default">{{ $gallery->sector->name }}</button><br>
                                            <button class="btn btn-sm">{{ strftime('%A %d %b %Y', strtotime($gallery->date)) }}</button>
                                        </td>
                                        <td>
                                            <img src="{{ asset('storage') . '/' . $gallery->thumbnail  }}" class="img-fluid" width="150px">
                                        </td>
                                        <td>
                                            {{-- <a href="/admin/publication/galleries/{{ $gallery->id }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-eye mr-1"></i>
                                                Detail
                                            </a> --}}
                                            <a href="/admin/publication/galleries/{{ $gallery->id }}/edit" class="btn btn-sm btn-success">
                                                <i class="fas fa-pencil-alt mr-1"></i>
                                                Edit
                                            </a>
                                            <button type="button" data-toggle="modal" data-target="#delete-gallery-{{$gallery->id}}" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash mr-1"></i>
                                                Hapus
                                            </button>

                                            <div class="modal fade" id="delete-gallery-{{$gallery->id}}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="/admin/publication/galleries/{{$gallery->id}}" method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Hapus Galeri</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Yakin ingin menghapus gambar ini?</p>
                                                                <input type="hidden" name="id" value="">
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                {{ $galleries->links() }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div> 
@endsection