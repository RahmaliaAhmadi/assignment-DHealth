@extends('layout.auth')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h4>Register</h4>
    </div>

    <div class="card-body">
        <form action="{{ route('register.store') }}" method="Post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Nama</label>
                <input id="name" type="text" class="form-control" name="name">
                <div class="invalid-feedback">
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control" name="email">
                <div class="invalid-feedback">
                </div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" class="form-control" name="password">
                <div class="invalid-feedback">
                </div>
            </div>
            <div class="form-group">
                <label for="phone">No Hp</label>
                <input id="phone" type="number" class="form-control" name="phone">
                <div class="invalid-feedback">
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">
                    Register
                </button>
            </div>
        </form>
    </div>
</div>
@endsection