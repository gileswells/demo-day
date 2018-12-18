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
                        <input type="text" name="name" placeholder="Name" /><br />
                        <input type="text" name="email" placeholder="Email Address" /><br />
                        <input type="text" name="phone" placeholder="Phone Number" /><br />
                        <input type="text" name="postal_code" placeholder="Postal Code" /><br />

                        <input type="submit" value="Submit" />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
