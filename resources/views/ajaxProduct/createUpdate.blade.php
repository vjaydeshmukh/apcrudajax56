@extends('layouts.master')

<?php
	if ($product->exists):
		$form_data = ['route' => ['product.update', $product], 'method' => 'PATCH', 'id' => 'form-id'];
		$action = ' Update';
	else:
		$form_data = ['route' => ['product.store'], 'method' => 'POST', 'id' => 'form-id'];
		$action = ' Create';
	endif;
?>

@section('title')
	{{ $action }} Products
@endsection

@section('content')
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-primary">
          <h4 class="card-title ">{{ $action }} Product</h4>
        </div>
			<div class="card-body">
				<div class="col-md-12">
					{!! Form::model($product, $form_data) !!}
						@csrf
						<div class="form-row">
							<div class="form-group col-md-6 error">
								<label for="inputName">Brand Name</label>
								<input type="text" class="form-control has-error" id="brand_name" name="brand_name" value="">
								<div class="text-danger" id="brand_name_error"></div>
							</div>
							<div class="form-group col-md-6 error">
								<label for="inputName">Model Name</label>
								<input type="text" class="form-control has-error" id="model_name" name="model_name" value="">
								<div class="text-danger" id="model_name_error"></div>
							</div>
						</div>
						<div class="form-group col-sm-5 error">
							<label for="inputName">Price</label>
							<input type="text" class="form-control has-error" id="price" name="price" value="">
							<div class="text-danger" id="price_error"></div>
						</div>
						<div class="form-group col-sm-12 error">
							<label for="inputName">Description</label>
							<textarea name="description" id="description" class="form-control"></textarea>
							<div class="text-danger" id="description_error"></div>
						</div>
					{!! Form::close() !!}

					<div class="text-center">
						 {!! Form::button('   Create', [
						    'type'  => 'submit',
						    'class' => 'btn btn-primary fa fa-save',
						    'id'    => 'btn-save'
						    ])
						 !!}
						<button type="reset" class="btn btn-warning"><i class="material-icons">refresh</i>Reset</button>
						<a href="{!! route('product.index') !!}" class="btn btn-danger fa fa-backward">  Cancel</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
  {!! Html::script('js/scripts/ajax/ajax-records.js') !!}
@endsection