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
                                    {{ $violation_letter->number }}
                                </h5>
                            </div>
                        </div>
                        <form action="/admin/violations/{{ $violation_letter->id }}" method="post">
                            @method('put')
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="regarding">Perihal</label>
                                                <select name="regarding" id="regarding" class="form-control">
                                                    <option value="Teguran/Panggilan Pertama" {{ $violation_letter->regarding == 'Teguran/Panggilan Pertama' ? 'selected' : '' }}>Teguran/Panggilan Pertama</option>
                                                    <option value="Teguran/Panggilan" {{ $violation_letter->regarding == 'Teguran/Panggilan' ? 'selected' : '' }}>Teguran/Panggilan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="offender">Nama Pelanggar</label>
                                            <input type="text" class="form-control @error('offender') is-invalid @enderror" id="offender" name="offender" value="{{ $violation_letter->offender }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="activity">Kegiatan Pembangunan</label>
                                            <input type="text" class="form-control @error('activity') is-invalid @enderror" id="activity" name="activity" value="{{ $violation_letter->activity }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="street">Alamat Pelanggaran</label>
                                            <input type="text" class="form-control @error('street') is-invalid @enderror" id="street" name="street" value="{{ $violation_letter->street }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="village">Kelurahan</label>
                                            <input type="text" class="form-control @error('village') is-invalid @enderror" id="village" name="village" value="{{ $violation_letter->village }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="districts">Kecamatan</label>
                                            <input type="text" class="form-control @error('districts') is-invalid @enderror" id="districts" name="districts" value="{{ $violation_letter->districts }}">
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
                        <form action="/admin/violations/add-signature/{{ $violation_letter->id }}" method="post">
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
                                        <img src="{{ asset('storage') . '/' . $violation_letter->signature}}" alt="" class="image-fluid">
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
                                <h5>Daftar Pelanggaran</h5>
                            </div>
                            <div class="row">
                                <div class="col-6"></div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-2"></div>
                                        <div class="col-10">
                                            <div class="float-right">
                                                <button type="button" data-toggle="modal" data-target="#create-violation" class="btn btn-sm btn-success">Tambah Daftar Pelanggaran</button>

                                                <div class="modal fade" id="create-violation">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="/admin/violations/add-violation/{{ $violation_letter->id }}" method="post">
                                                                @csrf
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Buat Pelanggaran</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="description">Deskripsi</label>
                                                                        <input type="text" class="form-control" id="description" name="description" placeholder="Deskripsi" required/>
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
                                        <th>Pelanggaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($violations as $violation)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $violation->description }}</td>
                                        <td>
                                            <button type="button" data-toggle="modal" data-target="#delete-violation-{{ $violation->id }}" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash mr-1"></i>
                                                Hapus
                                            </button>

                                            <div class="modal fade" id="delete-violation-{{ $violation->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="/admin/violations/{{ $violation_letter->id }}/delete-violation/{{ $violation->id }}" method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Hapus Pelanggaran</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Yakin ingin menghapus {{ $violation->description }} ?</p>
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
                                                            <form action="/admin/violations/add-attachment/{{ $violation_letter->id }}" method="post" enctype="multipart/form-data"> 
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
                                    @foreach ($attachment_letters as $attachment_letter)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset('storage') . '/' . $attachment_letter->attachment }}" class="img-fluid" width="150px">
                                        </td>
                                        <td>
                                            <button type="button" data-toggle="modal" data-target="#delete-attachment-{{ $attachment_letter->id }}" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash mr-1"></i>
                                                Hapus
                                            </button>

                                            <div class="modal fade" id="delete-attachment-{{ $attachment_letter->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="/admin/violations/{{ $violation_letter->id }}/delete-attachment/{{ $attachment_letter->id }}" method="post">
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