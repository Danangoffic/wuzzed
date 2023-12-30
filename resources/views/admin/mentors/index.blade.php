@extends('admin.template.app')
@section('content-admin')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Mentor</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Mentor</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row mb-3">
            <div class="col-6">
                <a href="{{ route('admin.mentor.add') }}" class="btn btn-primary">
                    Tambah Mentor
                </a>
            </div>
        </div>
        <!-- Default box -->
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Mentor</h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Profession</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mentors as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td><?= $item->profession ?></td>
                                        <td>
                                            @if (!$item->user_id)
                                                <a href="{{ route('admin.mentor.add_user', $item->id) }}"
                                                    class="btn btn-info btn-sm"><i class="fa fa-user"></i> Create
                                                    User</a>
                                            @endif
                                            <a href="{{ route('admin.mentor.edit', $item->id) }}"
                                                class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        {{ $mentors->links() }}
                    </div>
                    <!-- /.card-footer-->
                </div>
            </div>
        </div>
        <!-- /.card -->

    </section>

    <form action="{{ route('admin.mentor.store') }}" method="post">
        @csrf
        <div class="modal fade" id="modal-add-mentor">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h3 class="modal-title">Form Tambah mentor</h3>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama:</label>
                                    <input type="text" class="form-control" id="name" name="name" required
                                        value="{{ old('name') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" required
                                        value="{{ old('email') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Nomor Telepon:</label>
                                    <input type="text" class="form-control" id="phone" name="phone" required
                                        value="{{ old('phone') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="profession" class="form-label">Profession:</label>
                                    <input class="form-control" type="text" id="profession" name="profession" required
                                        value="{{ old('profession') }}" />
                                </div>

                                <div class="mb-3">
                                    <label for="profile_picture" class="form-label">Foto Profil:</label>
                                    <input type="file" class="form-control" id="profile_picture" name="profile_picture">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
