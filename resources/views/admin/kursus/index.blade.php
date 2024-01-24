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
                        <li class="breadcrumb-item active">Kursus</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content mx-1">
        @include('admin.template.static-alert')
        <div class="row mb-3">
            <div class="col-6">
                <a href="{{ route('admin.kursus.add') }}" class="btn btn-primary">Tambah Kursus</a>
            </div>
        </div>
        <!-- Default box -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Kursus</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-hover table-bordered text-nowrap table-border" id="data-course">
                                    <thead>
                                        <tr>
                                            <th>Kursus</th>
                                            <th>Kategori</th>
                                            <th>Mentor</th>
                                            <th>Harga</th>
                                            <th>Start At</th>
                                            <th>Duration</th>
                                            <th>Status</th>
                                            <th>Terdaftar</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kursus as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    @if ($item->category_id)
                                                        {{ $item->category->name }}
                                                    @else
                                                        Tak Terkategori
                                                    @endif
                                                </td>
                                                <td>
                                                    @foreach ($item->mentors as $mentor)
                                                        <p>{{ $mentor->name }}</p>
                                                    @endforeach
                                                </td>
                                                <td>{{ 'Rp ' . number_format($item->price, 0, ',', '.') }}</td>
                                                <td>{{ date('d F Y', strtotime($item->start_course)) }}</td>
                                                <td>
                                                    @if ($item->duration < 60)
                                                        {{ $item->duration . ' Menit' }}
                                                    @else
                                                        {{ floor($item->duration / 60) . ' Jam ' . $item->duration % 60 . ' Menit' }}
                                                    @endif
                                                </td>
                                                <td>{{ strtoupper($item->status) }}</td>
                                                <td> {{ $item->guestcourses->count() . ' orang' }}</td>
                                                <td nowrap="nowrap" class="text-nowrap">
                                                    <form action="{{ route('admin.kursus.destroy', $item) }}"
                                                        method="post" class="text-inline">
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
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        {{ $kursus->links() }}
                    </div>
                    <!-- /.card-footer-->
                </div>
            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
@push('after-script')
    <script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            const dataTableCourse = new DataTable('#data-course');
        })
    </script>
@endpush
