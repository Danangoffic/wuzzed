@extends('admin.template.app')
@section('content-admin')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Mentor</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Mentor</a></li>
                        <li class="breadcrumb-item active">Tambah Mentor</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{ route('admin.mentor.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Tambah mentor</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Nomor Telepon:</label>
                                <input type="text" class="form-control" id="phone" name="phone">
                            </div>

                            <div class="mb-3">
                                <label for="biography" class="form-label">Biografi:</label>
                                <textarea class="form-control" id="biography" name="biography"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="profile_picture" class="form-label">Foto Profil:</label>
                                <input type="file" class="form-control" id="profile_picture" name="profile_picture">
                            </div>
                            <a href="{{ route('admin.mentor') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-success float-right">Simpan Mentor</button>

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
            $('#biography').summernote({
                placeholder: 'Tambahkan biografi mentor',
                tabsize: 2,
                height: 300,
                minHeight: null,
                maxHeight: null
            });
            @if (Session::has('success'))
                toastr.success('Have fun storming the castle!', {{ session('success') }})
            @endif
        });
    </script>
@endpush
