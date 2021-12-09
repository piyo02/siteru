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
                        @if ($page == 'Edit Organisasi')
                            @method('put')
                        @endif
                            <div class="card-header">
                                <div class="col-12">
                                    <h5>{{ $page }}</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Nama Bidang</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', isset($sector) ? $sector->name : '') }}" placeholder="Nama Bidang">
                                </div>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="form-group">
                                    <label for="program">Program Bidang</label>
                                    <textarea id="program" name="program">
                                        {{ old('program', isset($sector) ? $program_content : '') }}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="job">Tugas Bidang</label>
                                    <textarea id="job" name="job">
                                        {{ old('job', isset($sector) ? $job_content : '') }}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="purpose">Fungsi Bidang</label>
                                    <textarea id="purpose" name="purpose">
                                        {{ old('purpose', isset($sector) ? $purpose_content : '') }}
                                    </textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        @if (isset($sector))
                                        <div class="form-group">
                                            <img src="{{ asset('storage') . '/' . $sector->structure }}" class="col-lg-5 img-fluid">
                                        </div>
                                        @endif
                                        <div class="form-group">
                                            <label for="structure">Struktur Organisasi (Gambar)</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="structure" name="structure">
                                                    <label class="custom-file-label" for="structure">Pilih File</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        @if (isset($sector))
                                        <div class="form-group">
                                            <img src="{{ asset('storage') . '/' . $sector->icon }}" width="130px" class="img-fluid">
                                        </div>
                                        @endif
                                        <div class="form-group">
                                            <label for="icon">Ikon Organisasi</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="icon" name="icon">
                                                    <label class="custom-file-label" for="icon">Pilih File</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer clearfix">
                                <div class="row">
                                    <div class="col-2"></div>
                                    <div class="col-10">
                                        <div class="float-right">
                                            <a href="/admin/sectors" class="btn btn-sm btn-danger">Batal</a>
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