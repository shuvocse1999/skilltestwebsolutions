<table class="table table-bordered">
	<tr>
		<td>Name</td>
		<td>Email</td>
		<td>Image</td>
	</tr>

@foreach($data as $d)
	<tr>
		<td>{{ $d->name }}</td>
		<td>{{ $d->email }}</td>
		<td><img src="{{  asset('image') }}/{{ $d->image }}" style="height: 100px;"></td>
	</tr>

	@endforeach
</table>