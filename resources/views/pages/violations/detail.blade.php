@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1 class="m-0">
                        {{ $page }}
                        <a href="/admin/violations" class="btn btn-sm btn-default">Kembali</a>
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
                                <h5>
                                    {{ $violation->number }}
                                </h5>
                            </div>
                        </div>
                        <form action="/admin/violations/{{ $violation->id }}" method="post">
                            @method('put')
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="warn">Teguran</label>
                                            <select name="warn" id="warn" class="form-control">
                                                <option value="1" {{ ($violation->warn == 1) ? 'selected' : ''  }}>Pertama</option>
                                                <option value="2" {{ ($violation->warn == 2) ? 'selected' : ''  }}>Kedua</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="type">Jenis Pelanggaran</label>
                                            <select name="type" id="type" class="form-control">
                                                <option value="Ringan" {{ ($violation->type == "Ringan") ? 'selected' : ''  }}>Ringan</option>
                                                <option value="Sedang" {{ ($violation->type == "Sedang") ? 'selected' : ''  }}>Sedang</option>
                                                <option value="Berat" {{ ($violation->type == "Berat") ? 'selected' : ''  }}>Berat</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="violations">Pelanggaran (setiap pelanggaran dipisah dengan ;)</label>
                                            <input type="text" class="form-control @error('violations') is-invalid @enderror" id="violations" name="violations" value="{{ old('violations', isset($violation) ? $violation->violations : '') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="activity">Kegiatan Pembangunan</label>
                                            <input type="text" class="form-control @error('activity') is-invalid @enderror" id="activity" name="activity" value="{{ old('activity', isset($violation) ? $violation->activity : '') }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="offender">Nama Pelanggar</label>
                                            <input type="text" class="form-control @error('offender') is-invalid @enderror" id="offender" name="offender" value="{{ old('offender', isset($violation) ? $violation->offender : '') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="street">Alamat Pelanggaran</label>
                                            <input type="text" class="form-control @error('street') is-invalid @enderror" id="street" name="street" value="{{ old('street', isset($violation) ? $violation->street : '') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="village">Kelurahan</label>
                                            <input type="text" class="form-control @error('village') is-invalid @enderror" id="village" name="village" value="{{ old('village', isset($violation) ? $violation->village : '') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="districts">Kecamatan</label>
                                            <input type="text" class="form-control @error('districts') is-invalid @enderror" id="districts" name="districts" value="{{ old('districts', isset($violation) ? $violation->districts : '') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="team_id">Tim</label>
                                            <select name="team_id" id="team_id" class="form-control">
                                                @foreach ($teams as $team)
                                                    <option value="{{ $team->id }}" {{ (isset($violation) && $violation->team_id == $team->id) ? 'selected' : ''  }} >{{ $team->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="long">Kordinat Long</label>
                                            <input type="text" class="form-control @error('long') is-invalid @enderror" id="long" name="long" value="{{ old('long', isset($violation) ? $violation->long : '') }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="lat">Kordinat Lat</label>
                                            <input type="text" class="form-control @error('lat') is-invalid @enderror" id="lat" name="lat" value="{{old('lat', isset($violation) ?  $violation->lat : '') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>

                    <div class="card mt-5">
                        <form action="/admin/violations/add-signature/{{ $violation->id }}" method="post">
                            @csrf
                            <div class="card-header">
                                <div class="col-12">
                                    <h5>Tanda Tangan Pelanggar</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="description">Tanda Tangan</label>
                                            <br>
                                            <div id="sig"></div>
                                            <br>
                                            <textarea style="display: none" name="signed" id="signature64"></textarea>
                                        </div>
                                        <button type="button" id="clear" class="btn btn-danger">Bersihkan</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="{{ asset('storage') . '/' . $violation->signature}}" alt="" class="image-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>

                    <div class="card mt-5">
                        <div class="card-header">
                            <div class="col-12">
                                <h5>Lampiran</h5>
                            </div>
                            <div class="row">
                                <div class="col-6"></div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-2"></div>
                                        <div class="col-10">
                                            <div class="float-right">
                                                <button type="button" data-toggle="modal" data-target="#create-attachment" class="btn btn-sm btn-success">Tambah Lampiran</button>

                                                <div class="modal fade" id="create-attachment">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="/admin/violations/add-attachment/{{ $violation->id }}" method="post" enctype="multipart/form-data"> 
                                                                @csrf
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Buat Lampiran</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="attachment">Lampiran</label>
                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file" class="custom-file-input" id="attachment" name="attachment">
                                                                                <label class="custom-file-label" for="attachment">Pilih File</label>
                                                                            </div>
                                                                        </div>
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
                                        <th>Lampiran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attachments as $attachment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset('storage') . '/' . $attachment->attachment }}" class="img-fluid" width="150px">
                                        </td>
                                        <td>
                                            <button type="button" data-toggle="modal" data-target="#delete-attachment-{{ $attachment->id }}" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash mr-1"></i>
                                                Hapus
                                            </button>

                                            <div class="modal fade" id="delete-attachment-{{ $attachment->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="/admin/violations/{{ $violation->id }}/delete-attachment/{{ $attachment->id }}" method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Hapus Lampiran</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Yakin ingin menghapus lampiran ini ?</p>
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