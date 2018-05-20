@extends('layouts.master')

@section('content')
	
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-primary">
				<h4 class="card-title ">Autocomplete With jQuery UI</h4>
			</div>
			<div class="card-body">
				<input type="text" name="search" class="form-control" id="search" placeholder="Search...">

				{!! Form::open(['route' => ['storeData'], 'method' => 'POST']) !!}
					@csrf
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="bmd-label-floating">First Name</label>
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
									@foreach($sexes as $sex)
										<option value="{{ $sex->id }}">{{ $sex->gender }}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
					<div class="text-center">
						{!! Form::button('   Create', [
							 'type'  => 'submit',
							 'class' => 'btn btn-primary fa fa-save'
							 ])
						!!}
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript">
/*		data = [
			'Cambodia',
			'Thai',
			'America',
			'China',
			'Japan',
			'Rusia',
			'Korea',
			'India'
		];*/
		//==============================================================
		$('#search').autocomplete({
			source: "{{ route('search') }}",
			//minLength: 2,
			select: function (key, value) {
				console.log(value);
				//alert(value.item.value);
				//alert(value.item.label);
				console.log(value.item.first_name);

				$('#first_name').val(value.item.first_name);
				$('#last_name').val(value.item.last_name);
				$('#sex_id').val(value.item.sex_id);
			}
		});
	</script>
@endsection