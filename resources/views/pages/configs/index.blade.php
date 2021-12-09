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
                    <div class="card">
                        <form action="/admin/master/configs/{{ $vs_ms->id }}" method="post">
                            @method('put')
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Visi dan Misi</label>
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
                                    <label for="">Tugas dan Fungsi</label>
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
                                    <label for="">Motto dan Lambang</label>
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
                        <div class="col-sm-6 col-12">
                            <div class="card">
                                <form action="/admin/master/configs/{{ $str_org->id }}" method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="card-body">
                                        <img src="{{ asset('storage') . '/' . $str_org->value }}" class="col-lg-5 img-fluid">
                                        <div class="form-group">
                                            <label for="value">Struktur Organisasi</label>
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
                    </div>
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
                </div>
            </div>
        </div>
    </section>
</div> 
@endsection