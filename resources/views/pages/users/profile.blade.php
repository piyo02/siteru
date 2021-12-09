@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        Profil
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
                </div>
                <div class="col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="email">Email User</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ isset($user) ? $user->email : '' }}" placeholder="Email User" disabled>
                            </div>
                            <div class="form-group">
                                <label for="name">Nama User</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ isset($user) ? $user->name : '' }}" placeholder="Nama User" disabled>
                            </div>
                            <div class="form-group">
                                <label for="phone">Nomor Telepon</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ isset($user) ? $user->phone : '' }}" placeholder="Nomor Telepon" disabled>
                            </div>
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <textarea class="form-control" id="address" name="address" placeholder="Alamat" disabled>{{ isset($user) ? $user->address : '' }}</textarea>
                            </div>
                        </div>
                        <div class="card-footer float-right">
                            <div class="row">
                                <div class="col-12">
                                    <div class="float-right">
                                        <button type="button" data-toggle="modal" data-target="#edit-profile" class="btn btn-sm btn-success">Edit</button>
            
                                        <div class="modal fade" id="edit-profile">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="/admin/user-profile/{{ $user->id }}" method="post">
                                                        @method('put')
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Profil</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="name">Nama User</label>
                                                                <input type="text" class="form-control" id="name" name="name" value="{{ isset($user) ? $user->name : '' }}" placeholder="Nama User" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="phone">Nomor Telepon</label>
                                                                <input type="text" class="form-control" id="phone" name="phone" value="{{ isset($user) ? $user->phone : '' }}" placeholder="Nomor Telepon" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="address">Alamat</label>
                                                                <textarea class="form-control" id="address" name="address" placeholder="Alamat" required>{{ isset($user) ? $user->address : '' }}</textarea>
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

                                        <button type="button" data-toggle="modal" data-target="#change-password" class="btn btn-sm btn-default">Ubah Password</button>

                                        <div class="modal fade" id="change-password">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="/admin/user-profile/change-password/{{ $user->id }}" method="post">
                                                        @method('put')
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Profil</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="password">Password Baru</label>
                                                                <input type="text" class="form-control" id="password" name="password" placeholder="Password Baru" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="confirm">Konfirmasi Password</label>
                                                                <input type="text" class="form-control" id="confirm" name="confirm" placeholder="Konfirmasi Password" required>
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
                <div class="col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('storage') . '/' . $user->image}}" class="img-fluid">
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-12">
                                    <div class="float-right">
                                        <button type="button" data-toggle="modal" data-target="#change-profile" class="btn btn-sm btn-success">Edit</button>
            
                                        <div class="modal fade" id="change-profile">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="/admin/user-profile/change-profile-image/{{ $user->id }}" method="post" enctype="multipart/form-data">
                                                        @method('put')
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Profil</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="image">Foto Profil</label>
                                                                <div class="input-group">
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input" id="image" name="image">
                                                                        <label class="custom-file-label" for="image">Pilih File</label>
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
            </div>
        </div>
        </section>
    </div> 
@endsection
