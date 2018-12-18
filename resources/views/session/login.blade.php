@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Login</div>

                <div class="card-body">
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
                        <input type="text" name="email" placeholder="Email Address" /><br />
                        <input type="password" name="password" placeholder="Password" /><br />

                        <input type="submit" value="Login" />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
