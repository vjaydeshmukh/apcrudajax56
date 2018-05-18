<div class="modal fade" id="student-update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">New Student</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ URL::to('students/update') }}" method="POST" id="frm-update">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="bmd-label-floating">First Name</label>
								<input type="hidden" class="form-control" name="id" id="id">
								<input type="text" class="form-control" name="first_name" id="first_name">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="bmd-label-floating">Last Name</label>
								<input type="text" class="form-control" name="last_name" id="last_name">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="bmd-label-floating">Gender</label>
								<select class="form-control" name="sex_id" id="sex_id">
									<option selected>Choose...</option>
									@foreach($sexes as $key => $sex)
										<option value="{{ $key }}">{{ $sex }}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-success pull-left" value="Update">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
			</form>
				</div>
		</div>
	</div>
</div>