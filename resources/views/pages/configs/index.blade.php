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
                        <div class="alert alert-success" config="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session()->has('error'))                        
                        <div class="alert alert-danger" config="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    {{-- Profil Dinas PU --}}
                    <div class="card">
                        <form action="/admin/master/configs/{{ $vs_ms->id }}" method="post">
                            @method('put')
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Visi dan Misi Dinas PU Kota Kendari</label>
                                    <textarea id="value" name="value" class="value">
                                        {{ old('value', isset($vs_ms) ? $vs_ms_content : '') }}
                                    </textarea>
                                </div>
                                <input type="hidden" name="type" id="type" value="editor">
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card">
                        <form action="/admin/master/configs/{{ $tgs_fgs->id }}" method="post">
                            @method('put')
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Tugas dan Fungsi Dinas PU Kota Kendari</label>
                                    <textarea id="value" name="value" class="value">
                                        {{ old('value', isset($tgs_fgs) ? $tgs_fgs_content : '') }}
                                    </textarea>
                                </div>
                                <input type="hidden" name="type" id="type" value="editor">
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card">
                        <form action="/admin/master/configs/{{ $mt_lbg->id }}" method="post">
                            @method('put')
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Motto dan Lambang Dinas PU Kota Kendari</label>
                                    <textarea id="value" name="value" class="value">
                                        {{ old('value', isset($mt_lbg) ? $mt_lbg_content : '') }}
                                    </textarea>
                                </div>
                                <input type="hidden" name="type" id="type" value="editor">
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-12">
                            <div class="card">
                                <form action="/admin/master/configs/{{ $str_org->id }}" method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="card-body">
                                        <img src="{{ asset('storage') . '/' . $str_org->value }}" class="col-lg-5 img-fluid">
                                        <div class="form-group">
                                            <label for="value">Struktur Organisasi Dinas PU Kota Kendari</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="value" name="value">
                                                    <label class="custom-file-label" for="value">Pilih File</label>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="type" id="type" value="image">
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="float-right">
                                                    <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        {{-- End Profil Dinas PU --}}
                        {{-- Profil Kabid Penataan Ruang --}}
                        <div class="col-sm-6 col-12">
                            <div class="card">
                                <form action="/admin/master/configs/{{ $signature->id }}" method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="card-body">
                                        <img src="{{ asset('storage') . '/' . $signature->value }}" height="75px">
                                        <div class="form-group">
                                            <label for="value">{{ $signature->field }}</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="value" name="value">
                                                    <label class="custom-file-label" for="value">Pilih File</label>
                                                </div>
                                            </div>
                                            <input type="hidden" name="type" id="type" value="image">
                                        </div>                                            
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="float-right">
                                                    <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="card">
                                <form action="/admin/master/configs/{{ $name->id }}" method="post">
                                @method('put')
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="value">{{ $name->field }}</label>
                                        <input type="text" class="form-control @error('value') is-invalid @enderror" id="value" name="value" value="{{ old('value', isset($name) ? $name->value : '') }}" placeholder="{{ $name->field }}">
                                    </div>
                                    <input type="hidden" name="type" id="type" value="default">
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="float-right">
                                                <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="card">
                                <form action="/admin/master/configs/{{ $employee_number->id }}" method="post">
                                @method('put')
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="value">{{ $employee_number->field }}</label>
                                        <input type="text" class="form-control @error('value') is-invalid @enderror" id="value" name="value" value="{{ old('value', isset($employee_number) ? $employee_number->value : '') }}" placeholder="{{ $employee_number->field }}">
                                    </div>
                                    <input type="hidden" name="type" id="type" value="default">
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="float-right">
                                                <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        {{-- End Profil Kabid Penataan Ruang --}}
                    </div>
                    <h4 class="mt-4">Daftar Gambar Slide Beranda</h4>
                    <div class="row">
                        @foreach ($slides as $slide)
                        <div class="col-sm-4 col-12">
                            <div class="card">
                                <form action="/admin/master/configs/{{ $slide->id }}" method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="card-body">
                                        <img src="{{ asset('storage') . '/' . $slide->value }}" height="75px">
                                        <div class="form-group">
                                            <label for="value">{{ $slide->field }}</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="value" name="value">
                                                    <label class="custom-file-label" for="value">Pilih File</label>
                                                </div>
                                            </div>
                                            <input type="hidden" name="type" id="type" value="image">
                                        </div>                                            
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="float-right">
                                                    <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="col-12">
                                <h5>Daftar Video Beranda</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No.</th>
                                        <th>Path Video</th>
                                        <th>Deskripsi Video</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($videos as $config)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $config->value }}</td>
                                            <td>{{ $config->field }}</td>
                                            <td>
                                                <button type="button" data-toggle="modal" data-target="#edit-video-{{ $config->id }}" class="btn btn-sm btn-success">
                                                    <i class="fas fa-pencil-alt mr-1"></i>
                                                    Edit
                                                </button>
                                                <div class="modal fade" id="edit-video-{{ $config->id }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="/admin/master/configs/{{ $config->id }}" method="post">
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
                                                                        <label for="value">Path Video</label>
                                                                        <input type="text" class="form-control" id="value" name="value" placeholder="Path Video" value="{{ $config->value }}">
                                                                        <input type="hidden" class="form-control" id="type" name="type" placeholder="Path Video" value="video">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="field">Deskripsi Video</label>
                                                                        <input type="text" class="form-control" id="field" name="field" placeholder="Deskripsi Video" value="{{ $config->field }}">
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
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="col-12">
                                <h5>Daftar FAQ</h5>
                            </div>
                            <div class="row">
                                <div class="col-6"></div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-2"></div>
                                        <div class="col-10">
                                            <div class="float-right">
                                                <button type="button" data-toggle="modal" data-target="#create-faq" class="btn btn-sm btn-success">Tambah FAQ</button>

                                                <div class="modal fade" id="create-faq">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="/admin/master/configs" method="post">
                                                                @csrf
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Tambah FAQ</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="value">Pertanyaan</label>
                                                                        <input type="text" class="form-control" id="value" name="value" placeholder="Pertanyaan">
                                                                        <input type="hidden" class="form-control" id="type" name="type" value="faq">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="field">Jawaban</label>
                                                                        <input type="text" class="form-control" id="field" name="field" placeholder="Jawaban">
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
                                        <th>Pertanyaan</th>
                                        <th>Jawaban</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($faqs as $config)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $config->value }}</td>
                                            <td>{{ $config->field }}</td>
                                            <td>
                                                <button type="button" data-toggle="modal" data-target="#edit-video-{{ $config->id }}" class="btn btn-sm btn-success">
                                                    <i class="fas fa-pencil-alt mr-1"></i>
                                                    Edit
                                                </button>
                                                <div class="modal fade" id="edit-video-{{ $config->id }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="/admin/master/configs/{{ $config->id }}" method="post">
                                                                @method('put')
                                                                @csrf
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Edit FAQ</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="value">Pertanyaan</label>
                                                                        <input type="text" class="form-control" id="value" name="value" placeholder="Pertanyaan" value="{{ $config->value }}">
                                                                        <input type="hidden" class="form-control" id="type" name="type" value="faq">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="field">Jawaban</label>
                                                                        <input type="text" class="form-control" id="field" name="field" placeholder="Jawaban" value="{{ $config->field }}">
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

                                                <button type="button" data-toggle="modal" data-target="#delete-faq-{{ $config->id }}" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash mr-1"></i>
                                                    Hapus
                                                </button>
    
                                                <div class="modal fade" id="delete-faq-{{ $config->id }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="/admin/master/configs/{{ $config->id }}" method="post">
                                                                @method('delete')
                                                                @csrf
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Hapus {{ $page }}</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Yakin ingin menghapus FAQ ?</p>
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