@extends('admin.template.app')
@section('content-admin')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Kursus</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Kursus</a></li>
                        <li class="breadcrumb-item active">{{ $kursus->name }}</li>
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
        <input type="hidden" name="id" value="{{ $kursus->id }}">
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
                                    <p>{{ $kursus->name }}</p>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="certificate">Sertifikat</label>
                                    <p>{{ $kursus->certificate == 1 ? 'Ya' : 'Tidak' }}</p>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="thumbnail">Thumbnail</label>
                                    <div>
                                        <img src="{{ asset('storage/' . $kursus->thumbnail) }}" alt="Thumbnail"
                                            class="img-thumbnail">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="type">Tipe</label>
                                    <p>{{ $kursus->type }}</p>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="description">Deskripsi</label>
                                    <div class="card border-1">
                                        <div class="card-body">
                                            <?= $kursus->description ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="price">Harga</label>
                                    <p>Rp {{ number_format($kursus->price, 0, ',', '.') }}</p>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="level">Tingkat</label>
                                    <p>{{ $kursus->level }}</p>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="duration">Durasi</label>
                                    <p>{{ $kursus->duration }} Menit</p>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="status">Status</label>
                                    <p>{{ strtoupper($kursus->status) }}</p>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="mentor_name">Nama Mentor</label>
                                    <p>{{ $kursus->mentor_name }}</p>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="start_course">Tanggal Mulai Kursus</label>
                                    <p>{{ date('Y-m-d', strtotime($kursus->start_course)) }}</p>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('admin.kursus') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-success float-right">Tambahkan Gambar Kursus</button>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
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
