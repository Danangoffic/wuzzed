@extends('admin.template.app')

@section('content-admin')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kursus</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Kursus</a></li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
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
            <div class="col-6">
                <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Tambah Kategori</a>
            </div>
        </div>
        <!-- Default box -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Categpry</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-hover table-bordered text-nowrap table-border" id="data-course">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Total Course</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->courses()->count() }}</td>
                                                <td nowrap="nowrap" class="text-nowrap">
                                                    <form action="{{ route('admin.category.destroy', $item) }}"
                                                        method="post" class="text-inline">
                                                        @method('DELETE')
                                                        @csrf
                                                        <a href="{{ route('admin.category.show', $item->id) }}"
                                                            class="btn btn-info btn-sm">Detail</a>
                                                        <a href="{{ route('admin.category.edit', $item) }}"
                                                            class="btn btn-success btn-sm">Edit</a>
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure?')">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-footer-->
                </div>
            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
