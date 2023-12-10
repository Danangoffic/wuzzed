@extends('admin.template.app')
@section('content-admin')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Kursus</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Kursus</a></li>
                        <li class="breadcrumb-item active">Tambah Kursus</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row mb-3">
            <div class="col-md-6">
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
        <form action="{{ route('admin.kursus.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Tambah Kursus</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Title -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="name">Nama Kursus</label>
                                        <input type="text" class="form-control" id="name" name="name" required
                                            value="{{ old('name') }}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="certificate">Sertifikat</label>
                                        <select class="form-control" id="certificate" name="certificate" required>
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="thumbnail">Thumbnail</label>
                                        <input type="file" class="form-control-file" id="thumbnail" name="thumbnail"
                                            accept="image/*">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="type">Tipe</label>
                                        <select class="form-control" id="type" name="type" required>
                                            <option value="free">Gratis</option>
                                            <option value="premium">Premium</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="description">Deskripsi</label>
                                        <textarea class="form-control" id="description" name="description" required>{{ old('description') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="price">Harga</label>
                                        <input type="number" class="form-control" id="price" name="price" required
                                            value="{{ old('price') }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="level">Tingkat</label>
                                        <select class="form-control" id="level" name="level">
                                            <option value="all-level">Semua Level</option>
                                            <option value="beginner">Pemula</option>
                                            <option value="intermediate">Menengah</option>
                                            <option value="advance">Lanjutan</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="duration">Durasi</label>
                                        <input type="number" class="form-control" id="duration" name="duration" required
                                            value="{{ old('duration') }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="status">Status</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="draft">Draft</option>
                                            <option value="published">Published</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="mentor_name">Nama Mentor</label>
                                        <input type="text" class="form-control" id="mentor_name" name="mentor_name"
                                            required maxlength="255" value="{{ old('mentor_name') }}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="start_course">Tanggal Mulai Kursus</label>
                                        <input type="date" class="form-control" id="start_course" name="start_course"
                                            required value="{{ old('start_course') }}">
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('admin.kursus') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-success float-right">Simpan Kursus</button>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
@endsection
@push('after-style')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/summernote/summernote.min.css') }}">
    @if (Session::has('success'))
        <link rel="stylesheet" href="{{ asset('assets/admin/plugins/toastr/toastr.min.css') }}">
    @endif
@endpush
@push('after-script')
    <script src="{{ asset('assets/admin/plugins/summernote/summernote.min.js') }}"></script>
    @if (Session::has('success'))
        <script src="{{ asset('assets/admin/plugins/toastr/toastr.min.js') }}"></script>
    @endif
    <script>
        $(document).ready(function() {
            $('#description').summernote({
                placeholder: 'Tambahkan deskripsi kursus',
                tabsize: 2,
                height: 300,
                minHeight: null,
                maxHeight: null
            });
        });
        @if (Session::has('success'))
            toastr.success('Have fun storming the castle!', {{ session('success') }})
        @endif
    </script>
@endpush
