@extends('admin.auth.template')
@section('content-form')
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="{{ route('admin.dologin') }}" method="post">
        @csrf
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- /.col -->
            <div class="col-6">
                <a href="{{ route('admin.register') }}" class="btn btn-info btn-block">Register</a>
            </div>
            <div class="col-6">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>

            <!-- /.col -->
        </div>
    </form>
@endsection
