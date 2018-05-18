$(function() {
    $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
 });

	addAndEditUsingAjax();
});

function redirectPage(data) {
	var parsed = data;
	$(location).attr('href', parsed.url);
	$('#myAlert').delay(3000).fadeOut();
}

function printSuccessMessage(data) {
	$('.successMessages').append('<div class="alert alert-success">' + data.messages + '</div>');
	window.setTimeout('location.reload()', 2000);
}

function addAndEditUsingAjax() {
	$('#btn-save').on('click', function (e) {
		e.preventDefault();
		var formId = '#form-id';    // Form Create
		
		$.ajax({
			url:    $(formId).attr('action'),
			type:   $(formId).attr('method'),
			data:   $(formId).serialize(),
			dataType: 'json',
			success:  function (data) {
				console.log(data);
				if ($(formId).find("input:first-child").attr('value') === 'PATCH') {
					if (data.success) {
						redirectPage(data);
					} else {
						console.log(data);
						
						$.each(data.messages, function (index, value) {
							// It works adding in the form => <div class="text-danger" id="FieldName_error"></div>
							var errorDiv = '#' + index + '_error';
							
							$(errorDiv).addClass('has-error');
							$(errorDiv).empty().append(value);
							console.error(index + ': ' + value);
						});
					}
				} else {
					if (data.success) {
						$('form')[0].reset();
						redirectPage(data);
						printSuccessMessage(data);
					} else {
						console.log(data);
						
						$.each(data.messages, function (index, value) {
							// It works adding in the form => <div class="text-danger" id="FieldName_error"></div>
							var errorDiv = '#' + index + '_error';
							
							$(errorDiv).addClass('has-error');
							$(errorDiv).empty().append(value);
							console.error(index + ': ' + value);
						})
					}
				}
			}
		});
	});
}