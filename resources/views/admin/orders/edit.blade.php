@extends('admin.template.app')
@section('content-admin')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Orders</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Orders</a></li>
                        <li class="breadcrumb-item active">Order {{ $order->order_unique }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        @include('admin.template.static-alert')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{ route('admin.orders.update', $order->id) }}" method="post" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $order->id }}">
                        <input type="hidden" name="order_unique" value="{{ $order->order_unique }}">
                        <input type="hidden" name="course_id" value="{{ $order->course_id }}">
                        <div class="card-body">

                            <div class="input-group row mb-3">
                                <label class="col-sm-2 col-form-label" for="group">Order Unique:</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ $order->order_unique }}" class="form-control" disabled
                                        readonly placeholder="Group">
                                </div>
                            </div>
                            <div class="input-group row mb-3">
                                <label class="col-sm-2 col-form-label">User:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" disabled readonly
                                        value="{{ $order->user->name }}">
                                </div>
                            </div>
                            <div class="input-group row mb-3">
                                <label class="col-sm-2 col-form-label">Kursus:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" disabled readonly
                                        value="{{ $order->course->name }}">
                                </div>
                            </div>
                            <div class="input-group row mb-3">
                                <label class="col-sm-2 col-form-label">Key:</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" disabled readonly
                                        value="{{ $order->total_amount }}">
                                </div>
                            </div>
                            <div class="input-group row mb-3">
                                <label class="col-sm-2 col-form-label" for="status">Status:</label>
                                <div class="col-sm-10">
                                    <select name="status" id="status" class="custom-select" required>
                                        <option value="pending" @if ($order->status == 'pending') selected @endif>PENDING
                                        </option>
                                        <option value="paid" @if ($order->status == 'paid') selected @endif>PAID
                                        </option>
                                        <option value="failed" @if ($order->status == 'failed') selected @endif>FAILED
                                        </option>
                                        <option value="canceled" @if ($order->status == 'canceled') selected @endif>CANCELED
                                        </option>
                                        <option value="refunded" @if ($order->status == 'refunded') selected @endif>REFUNDED
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="input-group row mb-3">
                                <label class="col-sm-2 col-form-label">Promo Code:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{ $order->promoCode->code }}">
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
