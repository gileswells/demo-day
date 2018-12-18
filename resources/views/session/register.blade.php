@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
                        <input type="text" name="name" placeholder="Name" /><br />
                        <input type="text" name="email" placeholder="Email Address" /><br />
                        <input type="password" name="password" placeholder="Password" /><br />
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" /><br />

                        <input type="submit" value="Register" />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
