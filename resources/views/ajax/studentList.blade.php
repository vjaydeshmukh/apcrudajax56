@foreach($students as $value)
	<tr>
		<td>{{ $value->id }}</td>
		<td>{{ $value->first_name }}</td>
		<td>{{ $value->last_name }}</td>
		<td>{{ $value->full_name }}</td>
		<td>{{ $value->email }}</td>
		<td>{{ $value->dob }}</td>
		<td class="td-actions text-center">
				<a href="#" rel="tooltip" title="View" class="btn btn-info btn-simple btn-xs" id="view" data="{{ $value->id }}" target="_blank">
					<i class="fa fa-info"></i>
				</a>
				<a href="#" rel="tooltip" title="Edit" class="btn btn-success btn-simple btn-xs" id="edit" data="{{ $value->id }}">
					<i class="fa fa-edit"></i>
				</a>
				<button type="submit" rel="tooltip" title="Del" class="btn btn-danger btn-simple btn-xs" id="delete" data="{{ $value->id }}">
					<i class="fa fa-times"></i>
				</button>
		</td>
	</tr>
@endforeach