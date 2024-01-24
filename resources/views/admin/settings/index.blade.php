@extends('admin.template.app')
@section('content-admin')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Settings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Settings</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        @include('admin.template.static-alert')
        <div class="row mb-3">
            <div class="col-12">
                <a href="{{ route('admin.settings.create') }}" class="btn btn-primary">Tambahkan Data</a>
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
                                    <th>Group</th>
                                    <th>Key</th>
                                    <th>Value</th>
                                    <th>Status</th>
                                    <th>Creation Date</th>
                                    <th>Updated Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($settings as $item)
                                    <tr>
                                        <td>{{ $item->group }}</td>
                                        <td>{{ $item->parameter }}</td>
                                        <td><?= $item->value ?></td>
                                        <td>
                                            {{ $item->status }}
                                        </td>
                                        <td>
                                            {{ $item->created_at }}
                                        </td>
                                        <td>
                                            {{ $item->updated_at }}
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.settings.destroy', $item->id) }}" method="post">
                                                <a href="{{ route('admin.settings.edit', $item->id) }}"
                                                    class="btn btn-success btn-sm">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin Menghapus setting ini?')">Hapus</button>
                                            </form>
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
                        {{ $settings->links('vendor.pagination.bootstrap-4') }}
                    </div>
                    <!-- /.card-footer-->
                </div>
            </div>
        </div>
        <!-- /.card -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{ route('admin.settings') }}" method="get" class="form-horizontal">
                        <div class="card-body">

                            <div class="input-group row mb-3">
                                <label class="col-sm-2 col-form-label" for="group">Group:</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ $request->get('group') }}" name="group"
                                        id="group" class="form-control" placeholder="Group">
                                </div>
                            </div>
                            <div class="input-group row mb-3">
                                <label class="col-sm-2 col-form-label">Key:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="key" class="form-control" placeholder="Key"
                                        value="{{ $request->get('key') }}">
                                </div>
                            </div>
                            <div class="input-group row mb-3">
                                <label class="col-sm-2 col-form-label">Value:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="value" class="form-control" placeholder="Value"
                                        value="{{ $request->get('value') }}">
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
