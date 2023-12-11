@extends('admin.template.app')
@section('content-admin')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Tamu Kursus {{ $detail->course->name }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Kursus</a></li>
                        <li class="breadcrumb-item"><a href="#">{{ $detail->course->name }}</a></li>
                        <li class="breadcrumb-item active">Detail Tamu Kursus</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content mx-2">
        <div class="row mb-3">
            <div class="col-md-6">
                @if (Session::has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Detail Tamu Kursus</h3>
                    </div>
                    <div class="card-body">
                        <!-- Title -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Nama Tamu</label>
                                    <div>
                                        <span class="px-3 py-1 bg-info"
                                            style="border-radius: 8px">{{ $detail->guest->name }}</span>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="certificate">Phone</label>
                                    <p>{{ $detail->guest->phone }}</p>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="thumbnail">Email</label>
                                    <p>
                                        {{ $detail->guest->email }}
                                    </p>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="type">Company</label>
                                    <p>{{ $detail->guest->company_name ?? '-' }}</p>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="description">Job Title</label>
                                    <p>
                                        {{ $detail->guest->job_title ?? '-' }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="price">Knows From</label>
                                    <p>
                                        {{ strtoupper($detail->guest->knows_from) }}
                                    </p>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="level">Status Pembayaran</label>
                                    <div>
                                        @if ($detail->status_payment == 'pending')
                                            <a class="btn btn-warning" href="#modalFormChangePaymentStatus"
                                                data-toggle="modal"
                                                data-target="#modalFormChangePaymentStatus">{{ strtoupper($detail->status_payment) }}</a>
                                        @else
                                            <span
                                                class="bg-success px-3 py-1">{{ strtoupper($detail->status_payment) }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('admin.kursus.show', $detail->course->id) }}"
                            class="btn btn-secondary">Kembali</a>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
    <form action="{{ route('admin.tamu.update', $detail->id) }}" method="post">
        @method('PUT')
        @csrf
        <input type="hidden" name="id" value="{{ $detail->id }}">
        <input type="hidden" name="guest_id" value="{{ $detail->guest_id }}">
        <input type="hidden" name="course_id" value="{{ $detail->course_id }}">
        <div class="modal fade" id="modalFormChangePaymentStatus" tabindex="-1" role="dialog"
            aria-labelledby="modalFormChangePaymentStatusLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ubah Status Pembayaran Tamu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="status_payment">Status Pembayaran:</label>
                            <select name="status_payment" id="status_payment" class="form-control" required>
                                <option value="pending" @if ($detail->status_payment == 'pending') selected @endif>Pending</option>
                                <option value="paid" @if ($detail->status_payment == 'paid') selected @endif>Paid</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- /.content -->
@endsection
