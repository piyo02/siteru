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
                                                <button type="button" data-toggle="modal" data-target="#create-team" class="btn btn-sm btn-success">Tambah {{ $page }}</button>

                                                <div class="modal fade" id="create-team">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="/admin/master/teams" method="post">
                                                                @csrf
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Buat {{ $page }}</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="name">Nama Tim</label>
                                                                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Tim" required autofocus>
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
                                        <th>Nama Tim</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teams as $team)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $team->name }}</td>
                                        <td>
                                            <a href="/admin/master/teams/{{ $team->id }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-map mr-1"></i>
                                                Wilayah
                                            </a>
                                            <button type="button" data-toggle="modal" data-target="#edit-team-{{ $team->id }}" class="btn btn-sm btn-success">
                                                <i class="fas fa-pencil-alt mr-1"></i>
                                                Edit
                                            </button>
                                            <div class="modal fade" id="edit-team-{{ $team->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="/admin/master/teams/{{ $team->id }}" method="post">
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
                                                                    <label for="name">Nama Tim</label>
                                                                    <input type="text" class="form-control" id="name" name="name" value="{{ $team->name }}" required autofocus>
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
                </div>
            </div>
        </div>
    </section>
</div> 
@endsection