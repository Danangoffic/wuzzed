@extends('admin.template.app')
@section('content-admin')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        @include('admin.template.static-alert')
        <div class="row mb-3">
            <div class="col-6">
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown"
                        aria-expanded="false">
                        Tambah Data
                    </button>
                    <div class="dropdown-menu" style="">
                        <a class="dropdown-item" href="{{ route('admin.user.create') }}">Tambah User Admin</a>
                        <a class="dropdown-item" href="#">Tambah User Student</a>
                        <a class="dropdown-item" href="#">Tambah User Mentor</a>
                    </div>
                </div>
                {{-- <a href="{{ route('admin.mentor.add') }}" class="btn btn-primary">
                    Tambah User
                </a> --}}
            </div>
        </div>
        <!-- Default box -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Profession</th>
                                    <th>Role</th>
                                    <th>Creation Date</th>
                                    <th>Updated Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td><?= $item->profession ?></td>
                                        <td>
                                            {{ $item->role }}
                                        </td>
                                        <td>
                                            {{ $item->created_at }}
                                        </td>
                                        <td>
                                            {{ $item->updated_at }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.user.edit', $item->id) }}"
                                                class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">Tidak ada Data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        {{ $users->links('vendor.pagination.bootstrap-4') }}
                    </div>
                    <!-- /.card-footer-->
                </div>
            </div>
        </div>
        <!-- /.card -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{ route('admin.user') }}" method="get" class="form-horizontal">
                        <div class="card-body">

                            <div class="input-group row mb-3">
                                <label class="col-sm-2 col-form-label">Nama:</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ $request->get('nama') }}" name="nama"
                                        class="form-control" placeholder="Nama">
                                </div>
                            </div>
                            <div class="input-group row mb-3">
                                <label class="col-sm-2 col-form-label">Email:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="email" class="form-control" placeholder="Email"
                                        value="{{ $request->get('email') }}">
                                </div>
                            </div>
                            <div class="input-group row mb-3">
                                <label class="col-sm-2 col-form-label">Role:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="role" class="form-control" placeholder="Role"
                                        value="{{ $request->get('role') }}">
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Cari</button>
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
