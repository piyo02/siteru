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
                    <a href="/admin/master/teams/{{ $team_id }}" class="btn btn-sm btn-default">Kembali</a>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if (session()->has('success'))                        
                        <div class="alert alert-success" team="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <div class="col-12">
                                <h5>Daftar {{ $page }}</h5>
                            </div>
                            <div class="row">
                                <div class="col-6"></div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-2"></div>
                                        <div class="col-10">
                                            <div class="float-right">
                                                <button type="button" data-toggle="modal" data-target="#create-coordinate" class="btn btn-sm btn-success">Tambah {{ $page }}</button>

                                                <div class="modal fade" id="create-coordinate">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="/admin/master/coordinates" method="post">
                                                                @csrf
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Tambah {{ $page }}</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="long">Koordinat Long</label>
                                                                        <input type="text" class="form-control" id="long" name="long" placeholder="Koordinat Long" required>
                                                                        <input type="hidden" class="form-control" id="region_id" name="region_id" value="{{ $region_id }}" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="lat">Koordinat Lat</label>
                                                                        <input type="text" class="form-control" id="lat" name="lat" placeholder="Koordinat Lat" required>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
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
                                        <th>Long</th>
                                        <th>Lat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coordinates as $coordinate)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $coordinate->long }}</td>
                                        <td>{{ $coordinate->lat }}</td>
                                        <td>
                                            <button type="button" data-toggle="modal" data-target="#edit-team-{{ $coordinate->id }}" class="btn btn-sm btn-success">
                                                <i class="fas fa-pencil-alt mr-1"></i>
                                                Edit
                                            </button>
                                            <div class="modal fade" id="edit-team-{{ $coordinate->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="/admin/master/coordinates/{{ $coordinate->id }}" method="post">
                                                            @method('put')
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit {{ $page }}</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="long">Koordinat Long</label>
                                                                    <input type="text" class="form-control" id="long" name="long" value="{{ $coordinate->long }}" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="lat">Koordinat Lat</label>
                                                                    <input type="text" class="form-control" id="lat" name="lat" value="{{ $coordinate->lat }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="button" data-toggle="modal" data-target="#delete-coordinate-{{ $coordinate->id }}" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash mr-1"></i>
                                                Hapus
                                            </button>

                                            <div class="modal fade" id="delete-coordinate-{{ $coordinate->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="/admin/master/coordinates/{{ $coordinate->id }}" method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Hapus {{ $page }}</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Yakin ingin menghapus koordinat ?</p>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
</div> 
@endsection