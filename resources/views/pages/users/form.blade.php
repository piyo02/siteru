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
                        <form action="{{ $action }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if ($page == 'Edit User')
                            @method('put')
                        @endif
                            <div class="card-header">
                                <div class="col-12">
                                    <h5>{{ $page }}</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Nama Lengkap</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', isset($user) ? $user->name : '') }}" placeholder="Nama Lengkap">
                                        </div>
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="email">Email User</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', isset($user) ? $user->email : '') }}" placeholder="Email User" {{ isset($user) ? 'disabled' : '' }}>
                                        </div>
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="phone">Nomor Telepon</label>
                                            <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', isset($user) ? $user->phone : '') }}" placeholder="Nomor Telepon" {{ isset($user) ? 'disabled' : '' }}>
                                        </div>
                                        @error('phone')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="address">Alamat</label>
                                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address', isset($user) ? $user->address : '') }}" placeholder="Alamat">
                                        </div>
                                        @error('address')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="role_id">Role User</label>
                                            <select name="role_id" id="role_id" class="form-control">
                                                @foreach ($roles as $role)
                                                    @if (isset( $user ))
                                                        @if ($user->role_id == $role->id)
                                                            <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
                                                        @else
                                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                        @endif
                                                    @else
                                                        @if (old('role_id') == $role->id)
                                                            <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
                                                        @else
                                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="sector_id">Bidang</label>
                                            <select name="sector_id" id="sector_id" class="form-control">
                                                @foreach ($sectors as $sector)
                                                    @if (isset( $user ))
                                                        @if ($user->sector_id == $sector->id)
                                                            <option value="{{ $sector->id }}" selected>{{ $sector->name }}</option>
                                                        @else
                                                            <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                                                        @endif
                                                    @else
                                                        @if (old('sector_id') == $sector->id)
                                                            <option value="{{ $sector->id }}" selected>{{ $sector->name }}</option>
                                                        @else
                                                            <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer clearfix">
                                <div class="row">
                                    <div class="col-2"></div>
                                    <div class="col-10">
                                        <div class="float-right">
                                            <a href="/admin/master/users" class="btn btn-sm btn-danger">Batal</a>
                                            <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div> 
@endsection