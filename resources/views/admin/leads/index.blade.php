@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Leads</div>

                <div class="card-body">
                    @if (request()->session()->has('login-success'))
                        <p>Login Success!</p>
                    @endif
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Postal Code</th>
                            <th>Timestamp</th>
                            <th>Actions</th>
                        </tr>
                        @foreach ($leads as $lead)
                            <tr>
                                <td>{{ $lead->id }}</td>
                                <td><a href="{{ route('leads.show', ['id' => $lead->id]) }}">{{ $lead->name }}</a></td>
                                <td><a href="mailto:{{ $lead->email }}">{{ $lead->email }}</a></td>
                                <td><a href="tel:{{ $lead->phone->phone }}">{{ $lead->phone->phone }}</a></td>
                                <td>{{ $lead->postal_code }}</td>
                                <td>{{ $lead->created_at }}</td>
                                <td>
                                    <a href="{{ route('leads.show', ['id' => $lead->id]) }}" class="btn btn-sm btn-success">View</a> <a href="{{ route('leads.destroy', ['id' => $lead->id]) }}" class="btn btn-sm btn-danger" onclick="confirm('Are you sure you want to delete this lead?');">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                 </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
