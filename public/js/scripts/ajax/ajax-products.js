var url = "http://apcrudajax56.lrv/ajaxCRUD";

// Display modal form for creating new product
$('#btn_add').on('click', function () {
	$('#btn-save').val('add');
	$('#frmProducts').trigger('reset');
	$('#myModal').modal('show');
});


//delete product and remove it from list
$(document).on('click','.delete-product',function(){
	var product_id = $(this).val();
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
		}
	});
	$.ajax({
		type: "DELETE",
		url: url + '/' + product_id,
		success: function (data) {
			console.log(data);
			$("#product" + product_id).remove();
		},
		error: function (data) {
			console.log('Error:', data);
		}
	});
});

// Display modal form for product editing
$(document).on('click', '.open_modal', function() {
	var product_id = $(this).val();
	
	$.get(url + '/' + product_id, function (data) {
		//success data
		console.log(data);
		$('#product_id').val(data.id);
		$('#brand_name').val(data.brand_name);
		$('#model_name').val(data.model_name);
		$('#price').val(data.price);
		$('#description').val(data.description);
		$('#btn-save').val("update");
		$('#myModal').modal('show');
	})
});

// Create new product / Update existing product
$('#btn-save').on('click', function (e) {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	e.preventDefault();
	var formData = $('#frmProducts').serialize();
	// Used to determine the http verb to use [add=POST], [update=PUT]
	var state = $('#btn-save').val();
	var type  = "POST";   // For creating new resource
	var product_id = $('#product_id').val();
	var my_url = url;
	if (state === "update")
	{
		type   =  "PUT";    // For updating existing resource
		my_url += '/' + product_id;
	}
	$.ajax({
		type:   type,
		url:    my_url,
		data:   formData,
		dataTy: 'JSON',
		success:  function (data) {
			var product = '<tr id="product' + data.id + '"><td>' + data.id + '</td><td>' + data.brand_name + '</td><td>' + data.model_name + '</td><td>' + data.price + '</td><td>' + data.description + '</td>';
			product += '<td><button class="btn btn-warning btn-detail open_modal" value="' + data.id + '"><i class="fa fa-edit"></i></button>';
			product += '<button class="btn btn-danger btn-delete delete-product" value="' + data.id + '"><i class="fa fa-trash"></i></button></td></tr>';
			if (state === "add")      // If user added a new record
			{
				$('#products-list').append(product);
			} else {    // If user updated an existing record
				$('#product' + product_id).replaceWith(product);
			}
			$('#frmProducts').trigger('reset');
			$('#myModal').modal('hide');
		},
		error:  function (data) {
			console.log('Error: ', data);
		}
	});
});