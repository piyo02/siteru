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
                        <div class="alert alert-success" infrastructure="alert">
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
                                                <button type="button" data-toggle="modal" data-target="#create-infrastructure" class="btn btn-sm btn-success">Tambah {{ $page }}</button>

                                                <div class="modal fade" id="create-infrastructure">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="/admin/master/infrastructure" method="post"  enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Tambah {{ $page }}</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="name">Nama</label>
                                                                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama" required autofocus>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Alamat</label>
                                                                        <input type="text" class="form-control" id="address" name="address" placeholder="Alamat" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="year">Tahun Pengerjaan</label>
                                                                        <input type="text" class="form-control" id="year" name="year" placeholder="Tahun Pengerjaan" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="duration">Lama Pengerjaan</label>
                                                                        <input type="text" class="form-control" id="duration" name="duration" placeholder="Lama Pengerjaan" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="long">Kordinat Long</label>
                                                                        <input type="text" class="form-control" id="long" name="long" placeholder="Kordinat Long" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="lat">Kordinat Lat</label>
                                                                        <input type="text" class="form-control" id="lat" name="lat" placeholder="Kordinat Lat" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="image">Gambar Infrastruktur</label>
                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file" class="custom-file-input" id="image" name="image">
                                                                                <label class="custom-file-label" for="image">Pilih File</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
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
                                                                    <div class="form-group">
                                                                        <label for="">Deskripsi</label>
                                                                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Deskripsi" required></textarea>
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
                                        <th>Infrastruktur</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>name
                                </thead>
                                <tbody>
                                    @foreach ($infrastructures as $infrastructure)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $infrastructure->name }}</td>
                                        <td>
                                            <img src="{{ asset('storage') . '/' . $infrastructure->image  }}" class="img-fluid" width="150px">
                                        </td>
                                        <td>        
                                            <button type="button" data-toggle="modal" data-target="#edit-infrastructure-{{ $infrastructure->id }}" class="btn btn-sm btn-success">
                                                <i class="fas fa-pencil-alt mr-1"></i>
                                                Edit
                                            </button>
                                            <div class="modal fade" id="edit-infrastructure-{{ $infrastructure->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="/admin/master/infrastructure/{{ $infrastructure->id }}" method="post"  enctype="multipart/form-data">
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
                                                                    <label for="name">Nama</label>
                                                                    <input type="text" class="form-control" id="name" name="name" value="{{ $infrastructure->name }}" required autofocus>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="address">Alamat</label>
                                                                    <input type="text" class="form-control" id="address" name="address" value="{{ $infrastructure->address }}" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="year">Tahun Pengerjaan</label>
                                                                    <input type="text" class="form-control" id="year" name="year" value="{{ $infrastructure->year }}" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="duration">Lama Pengerjaan</label>
                                                                    <input type="text" class="form-control" id="duration" name="duration" value="{{ $infrastructure->duration }}" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="long">Kordinat Long</label>
                                                                    <input type="text" class="form-control" id="long" name="long" value="{{ $infrastructure->long }}" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="lat">Kordinat Lat</label>
                                                                    <input type="text" class="form-control" id="lat" name="lat" value="{{ $infrastructure->lat }}" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="image">Gambar Infrastruktur</label>
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input" id="image" name="image">
                                                                            <label class="custom-file-label" for="image">Pilih File</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Bidang</label>
                                                                    <select name="sector_id" id="sector_id" class="form-control">
                                                                        @foreach ($sectors as $sector)
                                                                            <option value="{{ $sector->id }}" {{ ($sector->id == $infrastructure->sector_id) ? 'selected' : '' }}>{{ $sector->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Deskripsi</label>
                                                                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ $infrastructure->description }}</textarea>
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

                                            <button type="button" data-toggle="modal" data-target="#delete-infrastructure-{{ $infrastructure->id }}" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash mr-1"></i>
                                                Hapus
                                            </button>

                                            <div class="modal fade" id="delete-infrastructure-{{ $infrastructure->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="/admin/master/infrastructure/{{ $infrastructure->id }}" method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Hapus {{ $page }}</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Yakin ingin menghapus {{ $infrastructure->name }} ?</p>
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
                                {{ $infrastructures->links() }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div> 
@endsection