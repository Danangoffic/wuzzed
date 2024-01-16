@extends('admin.template.app')
@section('content-admin')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.mentor') }}">Users</a></li>
                        <li class="breadcrumb-item active">Update</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- /.card -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{ route('admin.user.update', $user->id) }}" method="post" class="form-horizontal">
                        @csrf
                        @method('put')
                        <div class="card-body">

                            <div class="input-group row mb-3">
                                <label class="col-sm-2 col-form-label">Nama:</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ $user->name }}" name="nama" class="form-control"
                                        placeholder="Nama">
                                </div>
                            </div>
                            <div class="input-group row mb-3">
                                <label class="col-sm-2 col-form-label">Email:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="email" class="form-control" placeholder="Email"
                                        value="{{ $user->email }}">
                                </div>
                            </div>
                            <div class="input-group row mb-3">
                                <label class="col-sm-2 col-form-label">Role:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="role" class="form-control" placeholder="Role"
                                        value="{{ $user->role }}">
                                </div>
                            </div>
                            <div class="input-group row mb-3">
                                <label class="col-sm-2 col-form-label">Password:</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control" placeholder="Enter Pasword">
                                </div>
                            </div>
                            <div class="input-group row mb-3">
                                <label class="col-sm-2 col-form-label">Password Confirmation:</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password_confirmation" class="form-control"
                                        placeholder="Enter Password Confirmation">
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <a href="{{ route('admin.user') }}" class="btn btn-secondary btn-sm mr-3">Kembali</a>
                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection
@push('after-style')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/summernote/summernote.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/toastr/toastr.min.css') }}">
@endpush
@push('after-script')
    <script src="{{ asset('assets/admin/plugins/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/toastr/toastr.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            @if (Session::has('success'))
                toastr.success("{{ session('success') }}", 'Success');
            @endif
            @if (Session::has('error'))
                toastr.error("{{ session('error') }}", 'Error');
            @endif
        });
    </script>
@endpush
