@extends('layout.auth')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h4>Login</h4>
    </div>

    <div class="card-body">
        <form action="{{ url('/login') }}" method="Post" id="loginform">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                <div class="invalid-feedback">
                    Please fill in your email
                </div>
            </div>

            <div class="form-group">
                <div class="d-block">
                    <label for="password" class="control-label">Password</label>
                    <div class="float-right">
                        <a href="{{ url('/forgot-password') }}" class="text-small">
                            Forgot Password?
                        </a>
                    </div>
                </div>
                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                <div class="invalid-feedback">
                    please fill in your password
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Login
                </button>
            </div>
        </form>
        <div class="text-center mt-4 mb-3">
            Don't have an account? <a href="{{ url('/register')}}">Create One</a>
        </div>
    </div>
</div>
@endsection