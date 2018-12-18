@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login</div>

                <div class="card-body">
                    @if (request()->session()->has('unauthorized'))
                        <p>You must login to view that page.</p>
                    @endif
                    @if (request()->session()->has('registration-complete'))
                        <p>Registration Complete! Login below.</p>
                    @endif
                    @if (request()->session()->has('login-failure'))
                        <p>The email/password you provided does not match.</p>
                    @endif
                    @if (request()->session()->has('logout-success'))
                        <p>You have been logged out.</p>
                    @endif
                    @if ($errors->any())
                        <p>There were error(s) with your form submission:</p>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form action="{{ route('session.authenticate') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Email Address</label>
                            <input class="form-control" type="text" name="email" placeholder="Email Address" />
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" type="password" name="password" placeholder="Password" />
                        </div>

                        <input class="btn btn-success" type="submit" value="Login" />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
