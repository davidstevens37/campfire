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
	$('.create-account form.new-user').on('submit', function(e){
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

	// login
	$('.create-account form.login').on('submit', function(e){
		e.preventDefault();
		
		var data = formToObject($('form'));
		
		console.log(data);
		$.ajax({
			url: '/auth_login',
			data: data,
		})
		.done(function(RD) {
			console.log("success");
			if (!RD.error) {
				location.href = '/';
			} else {
				console.log('user not found');
			}
		})
		.fail(function() {
			console.log("error");
		})
		
	})

});