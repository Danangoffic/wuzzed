@extends('admin.template.app')

@section('content-admin')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kategori Kursus</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Kategori Kursus</a></li>
                        <li class="breadcrumb-item active">Tambah Kategori Kursus</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content mx-1">
        <div class="row mb-3">
            <div class="col-md-12">
                @if (Session::has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h2 class="card-title">Tambah Kategori Baru</h2>
                    </div>
                    <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Kategori</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="thumbnail" class="form-label">Thumbnail (opsional)</label>
                                <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary float-right">Tambah Kategori</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
