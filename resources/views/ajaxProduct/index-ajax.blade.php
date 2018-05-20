@extends('layouts.master')

@section('content')
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-primary">
				<h4 class="card-title ">List of Products</h4>
				<button id="btn_add" name="btn_add" class="btn btn-info pull-right">
					<i class="fa fa-plus"></i>Add New</button>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table">
						<thead class=" text-primary">
						<tr>
							<th>ID</th>
							<th>Brand Name</th>
							<th>Model Name</th>
							<th>Price</th>
							<th>Description</th>
							<th>Actions</th>
						</tr>
						</thead>
						<tbody id="products-list" name="products-list">
							@foreach($products as $product)
								<tr id="product{{ $product->id }}">
									<td>{{ $product->id }}</td>
									<td>{{ $product->brand_name }}</td>
									<td>{{ $product->model_name }}</td>
									<td>{{ $product->price }}</td>
									<td>{{ str_limit($product->description, $limit = 65, $end = '...') }}</td>
									<td>
										<button class="btn btn-warning btn-link btn-sm open_modal" value="{{ $product->id }}">
											<i class="fa fa-edit"></i>
										</button>
										<button class="btn btn-danger btn-link btn-delete btn-sm delete-product" value="{{ $product->id }}">
											<i class="material-icons">delete</i>
										</button>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myModalLabel">Product</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmProducts" name="frmProducts" class="form-horizontal" novalidate="">
						<div class="form-group error">
							<label for="inputName" class="col-sm-3 control-label">Brand Name</label>
							<div class="col-sm-9">
								<input type="text" class="form-control has-error" id="brand_name" name="brand_name" value="">
							</div>
						</div>
						<div class="form-group error">
							<label for="inputName" class="col-sm-3 control-label">Model Name</label>
							<div class="col-sm-9">
								<input type="text" class="form-control has-error" id="model_name" name="model_name" value="">
							</div>
						</div>
						<div class="form-group error">
							<label for="inputName" class="col-sm-3 control-label">Price</label>
							<div class="col-sm-9">
								<input type="text" class="form-control has-error" id="price" name="price" value="">
							</div>
						</div>
						<div class="form-group error">
							<label for="inputName" class="col-sm-3 control-label">Description</label>
							<div class="col-sm-9">
								<textarea name="description" id="description" class="form-control"></textarea>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary btn-link" id="btn-save" value="add">Save changes</button>
					<input type="hidden" id="product_id" name="product_id" value="0">
					<button type="button" class="btn btn-secondary btn-link" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script src="{{ asset('js/scripts/ajax/ajax-products.js') }}"></script>
@endsection