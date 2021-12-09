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
                        <div class="card-header">
                            <div class="col-12">
                                <h5>Daftar Kebijakan</h5>
                            </div>
                            <div class="row">
                                <div class="col-6"></div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-2"></div>
                                        <div class="col-10">
                                            <div class="float-right">
                                                <button type="button" data-toggle="modal" data-target="#create-policy" class="btn btn-sm btn-success">Tambah Kebijakan</button>

                                                <div class="modal fade" id="create-policy">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="/admin/publication/policies" method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Buat Kebijakan</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
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
                                                                        <label for="title">Judul</label>
                                                                        <input type="text" class="form-control" id="title" name="title" placeholder="Judul">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="">Deskripsi</label>
                                                                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Deskripsi"></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="file">File Kebijakan</label>
                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file" class="custom-file-input" id="file" name="file">
                                                                                <label class="custom-file-label" for="file">Pilih File</label>
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
                                        <th>Judul</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($policies as $policy)                                        
                                    <tr>
                                        <td>{{ request()->query('page') ? $loop->iteration + ((request()->query('page')-1)*10) : $loop->iteration }}</td>
                                        <td>{{ $policy->title }}</td>
                                        <td>{{ $policy->description }}</td>
                                        <td>
                                            <button type="button" data-toggle="modal" data-target="#edit-policy-{{ $policy->id }}" class="btn btn-sm btn-success">
                                                <i class="fas fa-pencil-alt mr-1"></i>
                                                Edit
                                            </button>
                                            <div class="modal fade" id="edit-policy-{{ $policy->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="/admin/publication/policies/{{ $policy->id }}" method="post" enctype="multipart/form-data">
                                                            @method('put')
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit Kebijakan</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="title">Judul Kebijakan</label>
                                                                    <input type="text" name="title" id="title" class="form-control" value="{{ isset($policy) ? $policy->title : '' }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="sector_id">Bidang</label>
                                                                    <input type="text" class="form-control" value="{{ isset($policy) ? $policy->sector->name : '' }}" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Deskripsi</label>
                                                                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Deskripsi">{{ $policy->description }}</textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="file">File Kebijakan</label>
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input" id="file" name="file">
                                                                            <label class="custom-file-label" for="file">Pilih File</label>
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

                                            <button type="button" data-toggle="modal" data-target="#delete-policy" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash mr-1"></i>
                                                Hapus
                                            </button>

                                            <div class="modal fade" id="delete-policy">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="/admin/publication/policies/{{ $policy->id }}" method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Hapus Kebijakan</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Yakin ingin menghapus file kebijakan ini?</p>
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
                                {{ $policies->links() }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div> 
@endsection