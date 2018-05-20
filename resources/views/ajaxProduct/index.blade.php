@extends('layouts.master')

@section('content')
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-primary">
				<h4 class="card-title ">List of Products</h4>
				<a href="{{ route('product.create') }}" class="btn btn-primary pull-right">
					<i class="fa fa-plus-circle left"></i> Add New
				</a>
				<! - Displaying messages ->
				<div class="successMessages"></div>
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
										<button class="btn btn-warning btn-link btn-sm"><i class="fa fa-edit"></i></button>
										<button class="btn btn-danger btn-link btn-sm"><i class="material-icons">delete</i></button>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection