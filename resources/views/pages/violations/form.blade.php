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
                                            <label for="warn">Teguran</label>
                                            <select name="warn" id="warn" class="form-control">
                                                <option value="1">Pertama</option>
                                                <option value="2">Kedua</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="type">Jenis Pelanggaran</label>
                                            <select name="type" id="type" class="form-control">
                                                <option value="Ringan">Ringan</option>
                                                <option value="Sedang">Sedang</option>
                                                <option value="Berat">Berat</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="violations">Pelanggaran (setiap pelanggaran dipisah dengan ;)</label>
                                            <input type="text" class="form-control @error('violations') is-invalid @enderror" id="violations" name="violations" value="{{ old('violations', isset($violation) ? $violation->violations : '') }}" placeholder="*Pelanggaran 1; Pelanggaran 2;">
                                        </div>
                                        <div class="form-group">
                                            <label for="activity">Kegiatan Pembangunan</label>
                                            <input type="text" class="form-control @error('activity') is-invalid @enderror" id="activity" name="activity" value="{{ old('activity', isset($violation) ? $violation->activity : '') }}" placeholder="Kegiatan Pembangunan">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="offender">Nama Pelanggar</label>
                                            <input type="text" class="form-control @error('offender') is-invalid @enderror" id="offender" name="offender" value="{{ old('offender', isset($violation) ? $violation->offender : '') }}" placeholder="Nama Pelanggar">
                                        </div>
                                        <div class="form-group">
                                            <label for="street">Alamat Pelanggaran</label>
                                            <input type="text" class="form-control @error('street') is-invalid @enderror" id="street" name="street" value="{{ old('street', isset($violation) ? $violation->street : '') }}" placeholder="Alamat Pelanggaran">
                                        </div>
                                        <div class="form-group">
                                            <label for="village">Kelurahan</label>
                                            <input type="text" class="form-control @error('village') is-invalid @enderror" id="village" name="village" value="{{ old('village', isset($violation) ? $violation->village : '') }}" placeholder="Kelurahan">
                                        </div>
                                        <div class="form-group">
                                            <label for="districts">Kecamatan</label>
                                            <input type="text" class="form-control @error('districts') is-invalid @enderror" id="districts" name="districts" value="{{ old('districts', isset($violation) ? $violation->districts : '') }}" placeholder="Kecamatan">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="team_id">Tim</label>
                                            <select name="team_id" id="team_id" class="form-control">
                                                @foreach ($teams as $team)
                                                    <option value="{{ $team->id }}" {{ (isset($violation) && $violation->team_id == $team->id) ? 'selected' : ''  }} >{{ $team->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="long">Kordinat Long</label>
                                            <input type="text" class="form-control @error('long') is-invalid @enderror" id="long" name="long" value="{{ old('long', isset($violation) ? $violation->long : '') }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="lat">Kordinat Lat</label>
                                            <input type="text" class="form-control @error('lat') is-invalid @enderror" id="lat" name="lat" value="{{old('lat', isset($lat) ?  $violation->lat : '') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Nama Kabid. Penataan Ruang</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', isset($name) ? $name->value : '') }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="employee_number">NIP Kabid. Penataan Ruang</label>
                                            <input type="text" class="form-control @error('employee_number') is-invalid @enderror" id="employee_number" name="employee_number" value="{{old('employee_number', isset($employee_number) ?  $employee_number->value : '') }}" disabled>
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