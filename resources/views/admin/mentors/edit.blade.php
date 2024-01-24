@extends('admin.template.app')
@section('content-admin')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ubah Data Mentor</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Mentor</a></li>
                        <li class="breadcrumb-item active">Ubah Mentor</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        @include('admin.template.static-alert')
        <div class="row">
            <div class="col-md-12">
                @if ($mentor->user)
                    <a href="{{ route('admin.mentor.add_user', ['id' => $mentor->id]) }}"
                        class="btn btn-primary btn-sm mb-3">Ubah User</a>
                @else
                    <a href="{{ route('admin.mentor.add_user', ['id' => $mentor->id]) }}"
                        class="btn btn-primary btn-sm mb-3">Tambahkan User</a>
                @endif
            </div>
            <div class="col-md-6">
                <form action="{{ route('admin.kursus.update', $mentor->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="id" value="{{ $mentor->id }}">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Update Mentor</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Title -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required
                                    value="{{ $mentor->name }}">
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $mentor->email }}">
                            </div>

                            <div class="mb-3">
                                <label for="biography" class="form-label">Biography:</label>
                                <textarea name="biography" id="biography" cols="30" rows="10" class="form-control">{{ $mentor->biography }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="profession" class="form-label">Profession:</label>
                                <input type="text" class="form-control" id="profession" name="profession"
                                    value="{{ $mentor->profession }}">
                            </div>

                        </div>
                        <div class="card-footer">
                            <a href="{{ route('admin.mentor') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" value="Create new Project"
                                class="btn btn-success float-right">Update</button>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </form>
            </div>
            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Kursus Mentor</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nama Kursus</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tersertifikat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($mentor->courses as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->start_course }}</td>
                                        <td>{{ $item->certificate }}</td>
                                        <td>
                                            <a href="{{ route('admin.mentor.kursus', $item->id) }}"
                                                class="btn btn-info btn-sm">Detail</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Belum ada kursus</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

        </div>
    </section>
    <!-- /.content -->
@endsection
@push('after-style')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/summernote/summernote.min.css') }}">
@endpush
@push('after-script')
    <script src="{{ asset('assets/admin/plugins/summernote/summernote.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#biography').summernote({
                placeholder: 'Tambahkan biografi mentor',
                tabsize: 2,
                height: 300,
                minHeight: null,
                maxHeight: null
            });
        });
    </script>
@endpush
