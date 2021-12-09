@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
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
                    @if (session()->has('success'))                        
                        <div class="alert alert-success" role="alert">
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
                                                <button type="button" data-toggle="modal" data-target="#create-contact" class="btn btn-sm btn-success">Tambah Kontak</button>

                                                <div class="modal fade" id="create-contact">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="/admin/sector-contract/" method="post">
                                                                @csrf
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Buat {{ $page }}</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="">Bidang</label>
                                                                        <select name="contact_type_id" id="contact_type_id" class="form-control">
                                                                            @foreach ($contact_types as $contact_type)
                                                                                @if (old('contact_type_id') == $contact_type->id)
                                                                                    <option value="{{ $contact_type->id }}" selected>{{ $contact_type->type }}</option>
                                                                                @else
                                                                                    <option value="{{ $contact_type->id }}">{{ $contact_type->type }}</option>
                                                                                @endif
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="name">Kontak</label>
                                                                        <input type="text" class="form-control" id="contact" name="contact" placeholder="Kontak" required>
                                                                    </div>
                                                                    <input type="hidden" name="sector_id" id="sector_id" value="{{ $sector_id }}">
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
                                        <th>Kontak</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sector_contacts as $sectorContact)
                                    <tr>                                            
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $sectorContact->contact }}</td>
                                        <td>
                                            <button type="button" data-toggle="modal" data-target="#edit-contact-{{ $sectorContact->id }}" class="btn btn-sm btn-success">
                                                <i class="fas fa-pencil-alt mr-1"></i>
                                                Edit
                                            </button>
                                            <div class="modal fade" id="edit-contact-{{ $sectorContact->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="/admin/sector-contract/{{ $sectorContact->id }}" method="post">
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
                                                                    <label for="">Bidang</label>
                                                                    <select name="contact_type_id" id="contact_type_id" class="form-control">
                                                                        @foreach ($contact_types as $contact_type)
                                                                            @if (old('contact_type_id') == $contact_type->id || $contact_type->id ==  $sectorContact->contact_type->id)
                                                                                <option value="{{ $contact_type->id }}" selected>{{ $contact_type->type }}</option>
                                                                            @else
                                                                                <option value="{{ $contact_type->id }}">{{ $contact_type->type }}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="name">Kontak</label>
                                                                    <input type="text" class="form-control" id="contact" name="contact" placeholder="Kontak" required value="{{ $sectorContact->contact }}">
                                                                </div>
                                                                <input type="hidden" name="sector_id" id="sector_id" value="{{ $sector_id }}">
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="button" data-toggle="modal" data-target="#delete-contact-{{ $sectorContact->id }}" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash mr-1"></i>
                                                Hapus
                                            </button>

                                            <div class="modal fade" id="delete-contact-{{ $sectorContact->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="/admin/sector-contract/{{ $sectorContact->id }}" method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Hapus Kontak</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Yakin ingin menghapus kontak ini?</p>
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
                                {{ $sector_contacts->links() }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div> 
@endsection