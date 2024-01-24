@extends('admin.template.app')
@section('content-admin')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Orders</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Orders</li>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-0">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Student Name</th>
                                    <th>Student Email</th>
                                    <th>Student Phone</th>
                                    <th>Course Name</th>
                                    <th>Use Promo Code</th>
                                    <th>Total Payment</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $item)
                                    <?php
                                    $item->load('course', 'user', 'promoCode');
                                    ?>
                                    <tr>
                                        <td>{{ $item->order_unique }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->user->email }}</td>
                                        <td>{{ $item->user->phone }}</td>
                                        <td>{{ $item->course->name }}</td>
                                        <td>{{ $item->promoCode->name }}</td>
                                        <td>{{ $item->total_amount }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.orders.edit', $item->id) }}"
                                                class="btn btn-success sm">Ubah</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10">Tidak ada Data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        {{ $orders->links('vendor.pagination.bootstrap-4') }}
                    </div>
                    <!-- /.card-footer-->
                </div>
            </div>
        </div>
        <!-- /.card -->
        @include('admin.orders.form-search')

    </section>
    <!-- /.content -->
@endsection
