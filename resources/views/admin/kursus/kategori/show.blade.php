@extends('admin.template.app')

@section('content-admin')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Kategori</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Kursus</a></li>
                        <li class="breadcrumb-item"><a href="#">Categories</a></li>
                        <li class="breadcrumb-item active">Detail</li>
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
        <!-- Default box -->
        <div class="row">
            <div class="col-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h2 class="card-title">Tambah Kategori Baru</h2>
                    </div>
                    <input type="hidden" name="id" value="{{ $category->id }}">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Kategori</label>
                            <div>{{ $category->name }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">Thumbnail </label>
                            @if ($category->thumbnail)
                                <div>
                                    <img src="{{ url($category->thumbnail) }}" alt="thumbnail" class="img-thumbnail">
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ route('admin.category.edit', $category->id) }}"
                            class="btn btn-success float-right">Ubah</a>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">List Courses</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Start At</th>
                                    <th>Duration</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($category->courses() as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ date('d F Y', strtotime($item->start_course)) }}</td>
                                        <td>
                                            @if ($item->duration < 60)
                                                {{ $item->duration . ' Menit' }}
                                            @else
                                                {{ floor($item->duration / 60) . ' Jam ' . $item->duration % 60 . ' Menit' }}
                                            @endif
                                        </td>
                                        <td>{{ $item->status }}}</td>
                                        <td nowrap="nowrap" class="text-nowrap">
                                            <form action="{{ route('admin.kursus.destroy', $item) }}" method="post"
                                                class="text-inline">
                                                @method('DELETE')
                                                @csrf
                                                <a href="{{ route('admin.kursus.show', $item->id) }}"
                                                    class="btn btn-info btn-sm">Detail</a>
                                                <a href="{{ route('admin.kursus.edit', $item) }}"
                                                    class="btn btn-success btn-sm">Edit</a>
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            Kursus Masih Kosong
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
