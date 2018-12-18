@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Registration</div>

                <div class="card-body">
                    @if ($errors->any())
                        <p>There were error(s) with your form submission:</p>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form action="{{ route('session.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" type="text" name="name" placeholder="Name" value="{{ old('name') }}" />
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input class="form-control" type="text" name="email" placeholder="Email Address" value="{{ old('email') }}" />
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" type="password" name="password" placeholder="Password" />
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password" />
                        </div>

                        <input class="btn btn-success" type="submit" value="Register" />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
