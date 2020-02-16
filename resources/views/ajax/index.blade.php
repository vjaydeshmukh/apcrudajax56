@extends('layouts.master')

@section('content')
	@include('ajax.addStudent')
	@include('ajax.updateStudent')
	
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-primary">
				<h4 class="card-title ">List of Students</h4>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
					Create
				</button>
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
								<th>Sex</th>
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
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		//==============================================================
		$('#read-data').on('click', function () {
			$.get("{{ route('readData') }}", function (data) {
				$('#student-info').empty().html(data);
			});
		});
		//=============== Add Student ===============
		$('#frm-insert').on('submit', function (e) {
			e.preventDefault();
			var data = $(this).serialize();
			var url  = $(this).attr('action');
			var post = $(this).attr('method');
			$.ajax({
				type:   post,
				url:    url,
				data:   data,
				dataTy: 'json',
				success: function (data)
				{
					var tr = $('<tr/>',{
						id : data.id
					});
					tr.append($("<td/>", {
						text : data.id
					})).append($("<td/>", {
						text : data.first_name
					})).append($("<td/>", {
						text : data.last_name
					})).append($("<td/>", {
						text : data.full_name
					})).append($("<td/>", {
						text : data.gender
					})).append($("<td/>", {
						html : '<a href="#" rel="tooltip" title="View" class="btn btn-info btn-link btn-xs" id="view" data-id="'+ data.id +'" target="_blank"><i class="fa fa-info"></i></a>' 
							+ '<a href="#" rel="tooltip" title="Edit" class="btn btn-success btn-link btn-xs" id="edit" data-id="' + data.id + '"><i class="fa fa-edit"></i></a>' 
							+ '<button type="submit" rel="tooltip" title="Del" class="btn btn-danger btn-link btn-xs" id="del" data-id="\' + data.id + \'"><i class="fa fa-times"></i></button>'
					}));
					$('#student-info').append(tr);
				}
			});
		});
		//=============== Delete Student ===============
		$('body').delegate('#student-info tr #del', 'click', function (e) {
			var id =  $(this).data('id');
			
			$.post('{{ route('destroy') }}', {id:id}, function (data) {
				//$('tr#' + id).remove();
				$('#student-info #'+id).remove();
			})
		});
		//=============== Edit Student ===============
		$('body').delegate('#student-info #edit', 'click', function (e) {
			e.preventDefault();
			var id = $(this).data('id');
			
			$.get("{{ route('edit') }}", {id:id}, function (data) {
				$('#frm-update').find('#first_name').val(data.first_name);
				$('#frm-update').find('#last_name').val(data.last_name);
				$('#frm-update').find('#sex_id').val(data.sex_id);
				$('#frm-update').find('#id').val(data.id);
				$('#student-update').modal('show');
			})
		});
		//=============== Update Student ===============
		$('#frm-update').on('submit', function (e) {
			e.preventDefault();
			var data = $(this).serialize();
			var url  = $(this).attr('action');
			
			$.post(url, data, function (data)
			{
				$('#frm-update').trigger('reset');
				console.log(data);

				var tr = $('<tr/>',{
					id : data.id
				});
				tr.append($("<td/>", {
					text : data.id
				})).append($("<td/>", {
					text : data.first_name
				})).append($("<td/>", {
					text : data.last_name
				})).append($("<td/>", {
					text : data.full_name
				})).append($("<td/>", {
					text : data.gender
				})).append($("<td/>", {
					html : '<a href="#" rel="tooltip" title="View" class="btn btn-info  btn-link btn-xs" id="view" data-id="'+ data.id +'" target="_blank"><i class="fa fa-info"></i></a>' + '<a href="#" rel="tooltip" title="Edit" class="btn btn-success  btn-link btn-xs" id="edit" data-id="' + data.id + '"><i class="fa fa-edit"></i></a>' + '<button type="submit" rel="tooltip" title="Del" class="btn btn-danger  btn-link btn-xs" id="del" data-id="\' + data.id + \'"><i class="fa fa-times"></i></button>'
				}));
				
				$('#student-info tr#' + data.id).replaceWith(tr);
			});
		});
	</script>
@endsection