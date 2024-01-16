@extends('admin.template.app')
@section('content-admin')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Section</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        <li class="breadcrumb-item active">Section</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row mb-3">
            <div class="col-6">
                <a class="btn btn-primary" href="{{ route('admin.student.create') }}">Tambah Section</a>
                {{-- <a href="{{ route('admin.mentor.add') }}" class="btn btn-primary">
                    Tambah User
                </a> --}}
            </div>
        </div>
        <!-- Default box -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-0">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Type</th>
                                    <th>Isi Content</th>
                                    <th>Creation Date</th>
                                    <th>Updated Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sections as $item)
                                    <?php
                                    $item->load('contents');
                                    $item->loadCount('contents');
                                    ?>
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
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
                                            <a href="{{ route('admin.student.edit', $item->id) }}"
                                                class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Tidak ada Data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        {{ $students->links('vendor.pagination.bootstrap-4') }}
                    </div>
                    <!-- /.card-footer-->
                </div>
            </div>
        </div>
        <!-- /.card -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{ route('admin.student') }}" method="get" class="form-horizontal">
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
                                <label class="col-sm-2 col-form-label">Phone:</label>
                                <div class="col-sm-10">
                                    <input type="tel" name="phone" class="form-control" placeholder="08xxx"
                                        value="{{ $request->get('phone') }}">
                                </div>
                            </div>
                            <div class="input-group row mb-3">
                                <label class="col-sm-2 col-form-label">Address:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="address" class="form-control" placeholder="Enter address"
                                        value="{{ $request->get('address') }}">
                                </div>
                            </div>
                            <div class="input-group row mb-3">
                                <label class="col-sm-2 col-form-label">Province:</label>
                                <div class="col-sm-10">
                                    <select name="province_id" id="province_id" class="form-control">
                                        <option value="">--Pilih Provinsi--</option>
                                    </select>
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
@push('before-style')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}">
@endpush
@push('after-style')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/summernote/summernote.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/toastr/toastr.min.css') }}">
@endpush
@push('after-script')
    <script src="{{ asset('assets/admin/plugins/select2/js/select2.full.min.js') }}"></script>
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
            getProvinces();
        });
        async function getProvinces() {
            const url = 'https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json';
            fetch(url).then(res => res.json()).then(data => {
                $("#province_id").html(`<option value="">-- Pilih provinsi --</option>`);
                data.forEach(element => {
                    $('#province_id').append(`
                        <option value="${element.id}">${element.name}</option>
                    `);
                });
                $('#province_id').select2();
            })
        }

        async function getCities() {
            const p_id = $("#province_id").val();
            const url = `https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${p_id}.json`;
            fetch(url).then(res => res.json()).then(data => {
                $("#city_id").html(`<option value="">-- Pilih kota/kabupaten --</option>`);
                data.forEach(element => {
                    $('#city_id').append(`
                        <option value="${element.id}">${element.name}</option>
                    `);
                });
                $('#city_id').select2({
                    dropdownParent: $('#modalFormAddGuest')
                });
            })
        }
    </script>
@endpush
