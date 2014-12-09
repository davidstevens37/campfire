/**
 * Application JS
 */
$(function() {


	//form to object:
	var formToObject = function (form) {
        var formData = {};
        $.each(form.serializeArray(), function() {
        	if (this.value) {
           		formData[this.name] = this.value;
        	};
        });
        return formData;
    }

	//ajax defaults:
	$.ajaxSetup({
		type: 'POST',
		dataType: 'json',
		cache: false
	});

	
	// create user submission 
	$('.create-account form').on('submit', function(e){
		e.preventDefault();
		
		var data = formToObject($('form'));
		
		console.log(data);
		$.ajax({
			url: '/process_user',
			data: data,
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		
	})

});