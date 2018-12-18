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
	<input type="text" name="name" placeholder="Name" />
	<input type="text" name="email" placeholder="Email Address" />
	<input type="text" name="phone" placeholder="Phone Number" />
	<input type="text" name="postal_code" placeholder="Postal Code" />

	<input type="submit" value="Submit" />
</form>
