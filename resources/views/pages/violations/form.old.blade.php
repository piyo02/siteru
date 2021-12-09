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
                        @if ($page == 'Edit Surat Pelanggaran')
                            @method('put')
                        @endif
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="regarding">Perihal</label>
                                            <select name="regarding" id="regarding" class="form-control">
                                                <option value="Teguran/Panggilan Pertama">Teguran/Panggilan Pertama</option>
                                                <option value="Teguran/Panggilan">Teguran/Panggilan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="offender">Nama Pelanggar</label>
                                            <input type="text" class="form-control @error('offender') is-invalid @enderror" id="offender" name="offender" value="{{ old('offender', isset($violation_letter) ? $violation_letter->offender : '') }}" placeholder="Nama Pelanggar">
                                        </div>
                                        <div class="form-group">
                                            <label for="activity">Kegiatan Pembangunan</label>
                                            <input type="text" class="form-control @error('activity') is-invalid @enderror" id="activity" name="activity" value="{{ old('activity', isset($violation_letter) ? $violation_letter->activity : '') }}" placeholder="Kegiatan Pembangunan">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="street">Alamat Pelanggaran</label>
                                            <input type="text" class="form-control @error('street') is-invalid @enderror" id="street" name="street" value="{{ old('street', isset($violation_letter) ? $violation_letter->street : '') }}" placeholder="Alamat Pelanggaran">
                                        </div>
                                        <div class="form-group">
                                            <label for="village">Kelurahan</label>
                                            <input type="text" class="form-control @error('village') is-invalid @enderror" id="village" name="village" value="{{ old('village', isset($violation_letter) ? $violation_letter->village : '') }}" placeholder="Kelurahan">
                                        </div>
                                        <div class="form-group">
                                            <label for="districts">Kecamatan</label>
                                            <input type="text" class="form-control @error('districts') is-invalid @enderror" id="districts" name="districts" value="{{ old('districts', isset($violation_letter) ? $violation_letter->districts : '') }}" placeholder="Kecamatan">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Nama Kepala Dinas</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('districts', isset($name) ? $name->value : '') }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="employee_number">NIP Kepala Dinas</label>
                                            <input type="text" class="form-control @error('employee_number') is-invalid @enderror" id="employee_number" name="employee_number" value="{{old('districts', isset($employee_number) ?  $employee_number->value : '') }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer clearfix">
                                <div class="row">
                                    <div class="col-2"></div>
                                    <div class="col-10">
                                        <div class="float-right">
                                            <a href="/admin/violations" class="btn btn-sm btn-danger">Batal</a>
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