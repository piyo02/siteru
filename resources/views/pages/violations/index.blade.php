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
                                <h5>Daftar {{ $page }}</h5>
                            </div>
                            <div class="row">
                                <div class="col-6"></div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-2"></div>
                                        <div class="col-10">
                                            <div class="float-right">
                                                <a href="/admin/violations/create" class="btn btn-sm btn-success">
                                                    <i class="fas fa-plus mr-1"></i>
                                                    Buat {{ $page }}
                                                </a>
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
                                        <th>Nomor Surat</th>
                                        <th>Perihal</th>
                                        <th>Nama Pelanggar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($violations as $violation)
                                    <tr>
                                        <td>{{ request()->query('page') ? $loop->iteration + ((request()->query('page')-1)*10) : $loop->iteration }}</td>
                                        <td>{{ $violation->number }}</td>
                                        <td>{{ $violation->regarding }}</td>
                                        <td>{{ $violation->offender }}</td>
                                        <td>
                                            <a href="/admin/violations/{{ $violation->id }}/edit" class="btn btn-sm btn-default">
                                                <i class="fas fa-eye mr-1"></i>
                                                Detail
                                            </a>

                                            <a href="/admin/violations/export/{{ $violation->id }}" class="btn btn-sm btn-success">
                                                <i class="fas fa-file-pdf mr-1"></i>
                                                Export PDF
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                {{ $violations->links() }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div> 
@endsection