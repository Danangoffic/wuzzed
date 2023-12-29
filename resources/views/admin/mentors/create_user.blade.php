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
        @if (Session::has('success'))
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                </div>
            </div>
        @endif
        @if (Session::has('error'))
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                </div>
            </div>
        @endif
        <form action="{{ route('admin.mentor.store_user', $mentor->id) }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $mentor->id }}">
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
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    @if ($mentor->email) value="{{ $mentor->email }}" disabled @else value="{{ old('email') }}" required @endif>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password:</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation">
                            </div>

                            <div class="mb-3">
                                <label for="profession" class="form-label">Profession:</label>
                                <input type="text" class="form-control" id="profession" name="profession"
                                    @if ($mentor->profession) value="{{ $mentor->profession }}" disabled @else value="{{ old('profession') }}" required @endif />
                            </div>

                            <div class="mb-3">
                                <label for="avatar" class="form-label">Foto Profil:</label>
                                <input type="file" class="form-control" id="avatar" name="avatar">
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
