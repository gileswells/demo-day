@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lead Form</div>

                <div class="card-body">
                    @if ($errors->any())
                        <p>There were error(s) with your form submission:</p>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form action="{{ route('lead.store') }}" method="post">
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
                            <label>Phone Number</label>
                            <input class="form-control" type="text" name="phone" placeholder="Phone Number" value="{{ old('phone') }}" />
                        </div>
                        <div class="form-group">
                            <label>Postal Code</label>
                            <input class="form-control" type="text" name="postal_code" placeholder="Postal Code" value="{{ old('postal_code') }}" />
                        </div>

                        <input class="btn btn-success" type="submit" value="Submit" />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
