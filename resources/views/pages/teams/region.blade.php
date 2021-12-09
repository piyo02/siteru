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
                                                <button type="button" data-toggle="modal" data-target="#create-region" class="btn btn-sm btn-success">Tambah {{ $page }}</button>

                                                <div class="modal fade" id="create-region">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="/admin/master/regions" method="post">
                                                                @csrf
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Tambah {{ $page }}</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="province">Provinsi</label>
                                                                        <input type="text" class="form-control" id="province" name="province" placeholder="Provinsi" value="Sulawesi Tenggara" required>
                                                                        <input type="hidden" class="form-control" id="team_id" name="team_id" value="{{ $team_id }}" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="city">Kota</label>
                                                                        <input type="text" class="form-control" id="city" name="city" placeholder="Kota" value="Kendari" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="district">Kecamatan</label>
                                                                        <input type="text" class="form-control" id="district" name="district" placeholder="Kecamatan" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="village">Kelurahan</label>
                                                                        <input type="text" class="form-control" id="village" name="village" placeholder="Kelurahan" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="year">Tahun</label>
                                                                        <input type="text" class="form-control" id="year" name="year" placeholder="Tahun" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="Shape_Leng">Shape Leng</label>
                                                                        <input type="text" class="form-control" id="Shape_Leng" name="Shape_Leng" placeholder="Shape Leng" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="Shape_Area">Shape Area</label>
                                                                        <input type="text" class="form-control" id="Shape_Area" name="Shape_Area" placeholder="Shape Area" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="color">Warna *Hexadecimal</label>
                                                                        <input type="text" class="form-control" id="color" name="color" placeholder="Warna *Hexadecimal" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="source">Sumber</label>
                                                                        <input type="text" class="form-control" id="source" name="source" placeholder="Sumber" required>
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
                                        <th>Nama</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($regions as $region)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $region->village }}</td>
                                        <td>
                                            <a href="/admin/master/regions/{{ $region->id }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-map mr-1"></i>
                                                Koordinat
                                            </a>
                                            <button type="button" data-toggle="modal" data-target="#edit-team-{{ $region->id }}" class="btn btn-sm btn-success">
                                                <i class="fas fa-pencil-alt mr-1"></i>
                                                Edit
                                            </button>
                                            <div class="modal fade" id="edit-team-{{ $region->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="/admin/master/regions/{{ $region->id }}" method="post">
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
                                                                    <label for="province">Provinsi</label>
                                                                    <input type="text" class="form-control" id="province" name="province" value="{{ $region->province }}" value="Sulawesi Tenggara" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="city">Kota</label>
                                                                    <input type="text" class="form-control" id="city" name="city" value="{{ $region->city }}" value="Kendari" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="district">Kecamatan</label>
                                                                    <input type="text" class="form-control" id="district" name="district" value="{{ $region->district }}" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="village">Kelurahan</label>
                                                                    <input type="text" class="form-control" id="village" name="village" value="{{ $region->village }}" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="year">Tahun</label>
                                                                    <input type="text" class="form-control" id="year" name="year" value="{{ $region->year }}" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Shape_Leng">Shape Leng</label>
                                                                    <input type="text" class="form-control" id="Shape_Leng" name="Shape_Leng" value="{{ $region->Shape_Leng }}" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Shape_Area">Shape Area</label>
                                                                    <input type="text" class="form-control" id="Shape_Area" name="Shape_Area" value="{{ $region->Shape_Area }}" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="color">Warna *Hexadecimal</label>
                                                                    <input type="text" class="form-control" id="color" name="color"  value="{{ $region->color }}" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="source">Sumber</label>
                                                                    <input type="text" class="form-control" id="source" name="source"  value="{{ $region->source }}" required>
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

                                            <button type="button" data-toggle="modal" data-target="#delete-region-{{ $region->id }}" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash mr-1"></i>
                                                Hapus
                                            </button>

                                            <div class="modal fade" id="delete-region-{{ $region->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="/admin/master/regions/{{ $region->id }}" method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Hapus {{ $page }}</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Yakin ingin menghapus koordinat {{ $region->village }} ?</p>
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