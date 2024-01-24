@extends('admin.template.app')
@section('content-admin')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Setting</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Setting</a></li>
                        <li class="breadcrumb-item active">Tambah Data</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        @include('admin.template.static-alert')
        <!-- Default box -->
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.settings.store') }}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="group" class="form-label">Group</label>
                                <input type="text" class="form-control" name="group" id="group" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="parameter" class="form-label">Parameter</label>
                                <input type="text" class="form-control" name="parameter" id="parameter" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="value" class="form-label">Value</label>
                                <input type="text" class="form-control" name="value" id="value" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="custom-select">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="{{ route('admin.settings') }}" class="btn btn-default mr-3">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        <!-- /.card-footer-->
                    </div>
                </form>
            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection
