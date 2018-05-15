@extends('layouts.master')

@section('content')
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-primary">
				<h4 class="card-title ">Listado de Estudiantes</h4>
				<button class="btn btn-primary pull-right btn-xs" id="read-data">Load Data by Ajax</button>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table">
						<thead class=" text-primary">
							<tr>
								<th>ID</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Full Name</th>
								<th>Email</th>
								<th>Birth</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody id="student-info">
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript">
		$('#read-data').on('click', function () {
			$.get("{{ route('readData') }}", function (data) {
				$('#student-info').empty().html(data);
/*				$('#student-info').empty();
				$.each(data, function (i, value) {
					var tr = $("<tr/>");
					
					tr.append($("<td/>", {
						text : value.id
					})).append($("<td/>", {
						text : value.first_name
					})).append($("<td/>", {
						text : value.last_name
					})).append($("<td/>", {
						text : value.full_name
					})).append($("<td/>", {
						html : "<a href='#'>View</a> <a href='#'>Edit</a> <a href='#'>Delete</a>"
					}));
					
					$('#student-info').append(tr);
				});*/
			});
		});
	</script>
@endsection