@extends('admin.template.app')
@section('content-admin')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Kursus : {{ $kursus->name }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.kursus') }}">Kursus</a></li>
                        <li class="breadcrumb-item active">{{ $kursus->name }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row mb-3">
            <div class="col-md-12">
                @if (Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Detail Kursus</h3>

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
                                    <label for="name" class="mb-0">Nama Kursus</label>
                                    <p>{{ $kursus->name }}</p>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="certificate" class="mb-0">Sertifikat</label>
                                    <p>{{ $kursus->certificate == 1 ? 'Ya' : 'Tidak' }}</p>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="poster" class="mb-0">Poster</label>
                                    <div>
                                        <img width="450" src="{{ env('APP_URL') . '/storage/' . $kursus->poster }}"
                                            alt="Poster" class="img-thumbnail">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="thumbnail" class="mb-0">Thumbnail</label>
                                    <div>
                                        <img width="200" src="{{ env('APP_URL') . '/storage/' . $kursus->thumbnail }}"
                                            alt="Thumbnail" class="img-thumbnail">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="type" class="mb-0">Jenis</label>
                                    <p class="text-uppercase">{{ $kursus->jenis }}</p>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="type" class="mb-0">Tipe</label>
                                    <p class="text-uppercase">{{ $kursus->type }}</p>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="link" class="mb-0">Link Kursus</label>
                                    <p>
                                        <a class="text-link" id="link_kursus">{{ $kursus->url_kursus }}</a>
                                    </p>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="price" class="mb-0">Harga</label>
                                    <p>Rp {{ number_format($kursus->price, 0, ',', '.') }}</p>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="level" class="mb-0">Tingkat</label>
                                    <p>{{ $kursus->level }}</p>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="duration" class="mb-0">Durasi</label>
                                    <p>{{ $kursus->duration }} Menit</p>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="status" class="mb-0">Status</label>
                                    <p>{{ strtoupper($kursus->status) }}</p>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="mentor_name" class="mb-0">Nama Mentor</label>
                                    @foreach ($kursus->mentors as $m)
                                        <p>{{ $m->name }}</p>
                                    @endforeach
                                </div>

                                <div class="form-group mb-3">
                                    <label for="start_course" class="mb-0">Tanggal Mulai Kursus</label>
                                    <p>{{ date('d-m-Y H:i', strtotime($kursus->start_course)) }}</p>
                                </div>
                            </div>

                        </div>

                        <a href="{{ route('admin.kursus') }}" class="btn btn-secondary">Kembali</a>

                        {{-- <button type="submit" class="btn btn-primary float-right">Tambahkan Gambar Kursus</button> --}}
                        <a href="{{ route('admin.kursus.edit', $kursus->id) }}"
                            class="btn btn-success float-right mr-2">Ubah</a>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Data Pendaftar</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- <a href="#modalFormAddGuest" data-toggle="modal" data-target="#modalFormAddGuest"
                            class="btn btn-primary mb-3">Tambahkan Tamu
                            Manual</a> --}}
                        <table class="table table-hover table-bordered" id="table-guest">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Status Pembayaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="data-guest">
                                <tr>
                                    <td colspan="6" class="text-center">Loading...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Total Tamu Sesuai Status Pembayaran</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th><span class="text-success">PAID</span></th>
                                    <th><span class="text-primary">PENDING</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td id="data-status-1">fetching..</td>
                                    <td id="data-status-0">fetching..</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <form action="{{ route('admin.tamu.create', $kursus->id) }}" method="post">
        @csrf
        <div class="modal fade" id="modalFormAddGuest" tabindex="-1" role="dialog"
            aria-labelledby="modalFormAddGuestLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambahkan Data Tamu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" required
                                maxlength="255" placeholder="Masukkan nama">
                        </div>

                        <div class="form-group">
                            <label for="phone">No. Handphone</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required
                                maxlength="16" placeholder="Masukkan no. handphone">

                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required
                                placeholder="Masukkan email">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="province_id">Provinsi</label>
                                    <select class="form-control" id="province_id" name="province_id" required
                                        onchange="getCities()" style="width: 100%;">
                                        <option value="">-- Pilih provinsi --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city_id">Kota/Kabupaten</label>
                                    <select class="form-control" id="city_id" name="city_id" required
                                        style="width: 100%;">
                                        <option value="">-- Pilih kota/kabupaten --</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="company_name">Nama Perusahaan</label>
                            <input type="text" class="form-control" id="company_name" name="company_name"
                                placeholder="Masukkan nama perusahaan (optional)">
                        </div>
                        <div class="form-group">
                            <label for="job_title">Jabatan</label>
                            <input type="text" class="form-control" id="job_title" name="job_title"
                                placeholder="Masukkan jabatan (optional)">
                        </div>
                        <div class="form-group">
                            <label for="knows_from">Tau dari mana?</label>
                            <select class="form-control" id="knows_from" name="knows_from" required
                                placeholder="Masukkan informasi mengenal program">
                                <option value="email">Email</option>
                                <option value="facebook">Facebook</option>
                                <option value="instagram">Instagram</option>
                                <option value="linkedin">Linkedin</option>
                                <option value="whatsapp">WhatsApp</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status_payment">Status Pembayaran</label>
                            <select class="form-control" id="status_payment" name="status_payment" required>
                                <option value="pending" selected>Pending</option>
                                <option value="paid">Paid</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan Tamu</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- /.content -->
@endsection
@push('before-style')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}">
@endpush
@push('after-script')
    <script src="{{ asset('assets/admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(async function() {
            // $("#table-guest").DataTable();
            const init = await Promise.all([getProvinces(), getGuestData(), getGuestPaymentStatus(0),
                getGuestPaymentStatus(1)
            ]);
        });

        async function getGuestData() {
            const url = `{{ route('api.guest-course', $kursus->id) }}`;
            fetch(url, {
                headers: {
                    authorization: `Bearer {{ session('token') }}`,
                    // 'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            }).then(res => res.text()).then(data => {
                // $("#table-guest").DataTable().destroy();
                $("#data-guest").html(data);
                $("#table-guest").DataTable();
            });
        }

        async function getGuestPaymentStatus(status) {
            const url = `{{ route('api.guest-course-status-payment', $kursus->id) }}`;
            fetch(url, {
                method: 'post',
                body: JSON.stringify({
                    type: status
                }),
                headers: {
                    authorization: `Bearer {{ session('token') }}`,
                    // 'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    'Content-Type': 'application/json'
                }
            }).then(res => res.text()).then(data => {
                $("#data-status-" + status).html(data + " orang");
            });
        }

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
