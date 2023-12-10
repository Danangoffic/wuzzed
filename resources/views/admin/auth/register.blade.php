@extends('admin.auth.template')
@section('content-form')
    <p>Daftarkan User Admin</p>
    @if (Session::has('error'))
        <div class="alert alert-danger">
            <strong>Failed!</strong> {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (Session::has('success'))
        <div class="alert alert-success">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <form action="{{ route('admin.user.store') }}" method="post">
        @csrf
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="name" placeholder="Full name" value="{{ old('name') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <label for="avatar" class="form-label">Avatar:</label>
            <input type="file" class="form-control btn" id="avatar" name="avatar" accept="image/*">
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control" name="password_confirmation" placeholder="Retype password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- /.col -->
            <div class="col-6">
                <a href="{{ route('admin.login') }}" class="btn btn-info btn-block">Login</a>
            </div>
            <div class="col-6">
                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
        </div>
    </form>
@endsection
