use App\Models\User;
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
        @include('admin.template.static-alert')
        <!-- Default box -->
        <div class="row">
            <form action="{{ route('admin.mentor.store') }}" method="post">
                @csrf
                <div class="modal fade" id="modal-add-mentor">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h3 class="modal-title">Form Tambah Student</h3>
                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nama:</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                required value="{{ old('name') }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email:</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                required value="{{ old('email') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password:</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="profession" class="form-label">Profession:</label>
                                            <input class="form-control" type="text" id="profession" name="profession"
                                                required value="{{ old('profession') }}" />
                                        </div>

                                        <div class="mb-3">
                                            <label for="profile_picture" class="form-label">Foto Profil:</label>
                                            <input type="file" class="form-control" id="profile_picture"
                                                name="profile_picture">
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
        </div>
        <!-- /.card -->

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
        async function getProvinces() {
            const url = 'https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json';
            fetch(url).then(res => res.json()).then(data => {
                $("#province_id").html(`<option value="">-- Pilih provinsi --</option>`);
                data.forEach(element => {
                    $('#province_id').append(`
                        <option value="${element.id}">${element.name}</option>
                    `);
                });
                $('#province_id').select2({
                    dropdownParent: $('#modalFormAddGuest')
                });
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
