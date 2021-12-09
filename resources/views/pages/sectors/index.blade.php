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
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session()->has('error'))                        
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <div class="col-12">
                                <h5>Daftar Bidang</h5>
                            </div>
                            <div class="row">
                                <div class="col-6"></div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-2"></div>
                                        <div class="col-10">
                                            <div class="float-right">
                                                @uadmin
                                                <a href="/admin/sectors/create" class="btn btn-sm btn-success">
                                                    <i class="fas fa-plus mr-1"></i>
                                                    Tambah Bidang
                                                </a>
                                                @enduadmin
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
                                        <th>Nama Bidang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sectors as $sector)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $sector->name }}</td>
                                            <td>
                                                <a href="/admin/sector-contract/{{ $sector->id }}" class="btn btn-sm btn-info mr-2">
                                                    <i class="fas fa-id-badge mr-1"></i>
                                                    Kontak
                                                </a>
                                                <a href="/admin/sectors/{{ $sector->id }}" class="btn btn-sm btn-info">
                                                    <i class="fas fa-eye mr-1"></i>
                                                    Detail
                                                </a>
                                                <a href="/admin/sectors/{{ $sector->id }}/edit" class="btn btn-sm btn-success">
                                                    <i class="fas fa-pencil-alt mr-1"></i>
                                                    Edit
                                                </a>
                                                @uadmin
                                                <button type="button" data-toggle="modal" data-target="#delete-sector-{{ $sector->id }}" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash mr-1"></i>
                                                    Hapus
                                                </button>

                                                <div class="modal fade" id="delete-sector-{{ $sector->id }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="/admin/sectors/{{ $sector->id }}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Hapus Bidang</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Yakin ingin menghapus {{ $sector->name }}?</p>
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                @enduadmin
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                {{ $sectors->links() }}
                            </ul>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div> 
@endsection