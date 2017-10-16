/*$("#test-form").on('submit',(function(e) {
	e.preventDefault();
	var urls = $("#test-form").attr("action");
	$.ajax({
		url: urls,
		//type: "POST",
		beforeSend: function() {
			//alert(urls);
		},
		success: function(temp){}
	});
}));*/
$(document).on("beforeSubmit", "#test-form", function(event) {
	var form = $(this);
	if (form.find(".has-error").length) {
		return false;
	}
	$.ajax({
		url: form.attr("action"),
		type: form.attr("method"),
		data: form.serialize(),
		beforeSend: function() {
			$(".btn-search").html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i> Di Proses...');
			$('.btn-search').attr('disabled', 'disabled');
		},
		success: function(temp){
			//temps = $.parseJSON(temp);

			$('.isi').html(temp);
			btnReset();
			//return false;
		},
		error: function (jqXHR, exception) {
			getErrorMessage(jqXHR, exception);
			btnReset();
		}
	});
	return false;
});

function btnReset() {
	$('.btn-search').removeAttr('disabled');
	$(".btn-search").html('Tampilkan');
}

//handling error
function getErrorMessage(jqXHR, exception) {
	var msg = '';
	var title = '';
	if (jqXHR.status === 0) {
		msg = jqXHR.responseText;
		title = 'Error '+jqXHR.status;
	} else if (jqXHR.status == 404) {
		msg = jqXHR.responseText;
		title = 'Error '+jqXHR.status;
	} else if (jqXHR.status == 500) {
		msg = jqXHR.responseText;
		title = 'Error '+jqXHR.status;
	} else if (exception === 'parsererror') {
		msg = jqXHR.responseText;
		title = 'Error '+jqXHR.status;
	} else if (exception === 'timeout') {
		msg = jqXHR.responseText;
		title = 'Error '+jqXHR.status;
	} else if (exception === 'abort') {
		msg = jqXHR.responseText;
		title = 'Error '+jqXHR.status;
	} else {
		msg = 'Uncaught Error.\n' + jqXHR.responseText;
		title = 'Error '+jqXHR.status;
	}
	//$('#post').html(msg);
	//pesan(0,msg,title);
	//toastr.error(msg);
	//alert(msg);
	krajeeDialog.alert(msg);
}