@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lead Details</div>

                <div class="card-body">
                    @if (request()->session()->has('lead-updated'))
                        <p>Lead updated!</p>
                    @endif
                    @if ($errors->any())
                        <p>There were error(s) with your form submission:</p>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form action="{{ route('leads.update', ['lead' => $lead]) }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control {{ ($errors->has('name')) ? 'is-invalid' : '' }}" type="text" name="name" placeholder="Name" value="{{ old('name', $lead->name) }}" />
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input class="form-control {{ ($errors->has('email')) ? 'is-invalid' : '' }}" type="text" name="email" placeholder="Email Address" value="{{ old('email', $lead->email) }}" />
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input class="form-control {{ ($errors->has('phone')) ? 'is-invalid' : '' }}" type="text" name="phone" placeholder="Phone Number" value="{{ old('phone', $lead->phone->phone) }}" />
                        </div>
                        <div class="form-group">
                            <label>Postal Code</label>
                            <input class="form-control {{ ($errors->has('postal_code')) ? 'is-invalid' : '' }}" type="text" name="postal_code" placeholder="Postal Code" value="{{ old('postal_code', $lead->postal_code) }}" />
                        </div>

                        <input class="btn btn-success" type="submit" value="Update Lead" /> <a href="{{ route('leads.index') }}" class="btn">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
