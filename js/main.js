/**
 * Application JS
 */
$(function() {

	// state and pin locations
	var defaultPos = {
		lat: 33.72433966174758, 
		lng: -93.5595703125
	};
	var pinLocation = { 
		lat: null, lng: null
	};

	// hidden inputs for sending lat and long
	var latInput = $('.lat'); 
	var lngInput = $('.lng'); 

	var setCoords = function() {
		latInput.attr('value', pinLocation.lat);
		lngInput.attr('value', pinLocation.lng);
	}




//maps
	function initialize() {

		// MAP OPTIONS
		var mapOptions = {
			center: defaultPos,
			zoom: 4,
			mapTypeId: google.maps.MapTypeId.TERRAIN
		};

	// BINDS MAP TO DOM
	var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);


	var image = {
		url: 'images/fire_map_icon.png',
		size: new google.maps.Size(20, 32),
	};

		// MARKER INSTANSIATION AND SETTINGS.
		var marker = new google.maps.Marker({
		    title:"'X' Marks the Spot!",
		    draggable: true,
    		animation: google.maps.Animation.DROP,
    		icon: image,
		});

		// SETS PINLOCATION DATA TO CLICKED LOCATION AND DROPS PIN IN THAT SPOT. W/ANIMATION
		var addMarker = function(event) {

			pinLocation.lat = event.latLng.k;
			pinLocation.lng = event.latLng.D;
			marker.setMap(null);
			marker.setAnimation(google.maps.Animation.DROP);
			marker.setPosition(pinLocation);
			marker.setMap(map);
			setCoords();
		}

		// FUNCTION RESETS PINLOCATION DATA AND ALLOWS PIN TO BE REDROPPED W/ANIMATION
		var dragMarker = function() {
			
			pinLocation.lat = marker.getPosition().k;
			pinLocation.lng = marker.getPosition().D;
			marker.setMap(null);
			marker.setAnimation(google.maps.Animation.DROP);
			marker.setMap(map);
			setCoords();
		}

		//EVENT LISTENERS TO MANAGE ADDING MARKER AND MOVING MARKER
		google.maps.event.addListener(map, 'click', addMarker);
		google.maps.event.addListener(marker, 'dragend', dragMarker);

	}

	// GOOGLE MAP INIT
    google.maps.event.addDomListener(window, 'load', initialize);

























    // function to select all text in an element.
	jQuery.fn.selectText = function(){
	    var doc = document;
	    var element = this[0];
	    console.log(this, element);
	    if (doc.body.createTextRange) {
	        var range = document.body.createTextRange();
	        range.moveToElementText(element);
	        range.select();
	    } else if (window.getSelection) {
	        var selection = window.getSelection();        
	        var range = document.createRange();
	        range.selectNodeContents(element);
	        selection.removeAllRanges();
	        selection.addRange(range);
	    }
	};


    // edit bulletin board on focus
	$('.bulletin p').on('focus', function(event) {
		
		var bulletin = $(this)
    	var defaultText = 'Click here to edit the description.';

    	console.log(bulletin.text())
    	if ($.trim($(this).text()) == defaultText) {
    		bulletin.selectText();
    	};
    	
    });

    // on bulletin blur, ajax to update the bulletin board.
    $('.bulletin p').on('blur', function(event) {
    	console.log('blur');
    	var description = $(this).text();
    	var eventId = $(this).attr('data-event-id');

    	$.ajax({
    		url: '/process_event_description',
    		data: {
    			'description': description,
    			'event_id': eventId
    		},
    	})
    	.done(function() {
    		if (description == "") {
    			$('.bulletin p').text('Click here to edit the description.');
    		};
    	})
    	.fail(function() {
    		console.log("error");
    	})
    	

    });




    $('.notification-indicator').click(function(event) {
    	$('.notifications').toggleClass('active');
    	console.log('click');
    });





    $('.packing-list').click(function(event) {
    	location.href = '/items?event_id=' + app.settings.event_id;
    });












    var renderTemplate = function(templateId, object) {
    	var source = $(templateId).html();
    	var template = Handlebars.compile(source);
    	var output = template(object);
    	return output;

    }


	//form to object:
	var formToObject = function(form) {
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
			location.href = '/events';
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
				location.href = '/events';
			} else {
				console.log('user not found');
			}
		})
		.fail(function() {
			console.log("error");
		})
		
	})


	// New comment AJAX
	$('div.new-comment').on('click', 'button', function(){

		var comment = $(this).parent().find('textarea');

		var commentData = {
				'comment': comment.val(),
				'event_id': comment.attr('data-event-id')
			}

			console.log(commentData);

		$.ajax({
			url: '/add_comment',
			data: commentData,
		})
		.done(function(RD) {
			if (!RD.error) {
				location.reload();
			} else {
				console.log(RD);
			}
		})
		.fail(function() {
			console.log("error");
		})
		
	})


	// changes event picture when option is selected
	$('select').on('change', function(event) {

		var selectField = $(this);
		var optionNumber = parseInt(selectField.val()) + 1;
		var themePicture = selectField.find('option:nth-child(' + optionNumber + ')' ).attr('data-picture');;
		console.log(themePicture);


		$('.event-picture').attr('style', "background-image: url('" + themePicture + "');");
	});



	// ajax for create event
	$('.create-event').on('submit', 'form', function(event) {
		event.preventDefault();
		
		var form = $(this);

		$.ajax({
			url: '/process_event',
			data: formToObject(form)
		})
		.done(function(RD) {

			console.log("success");
			location.href = '/event?event_id=' + RD.event.event_id;
		})
		.fail(function() {
			console.log("error");
		})

	});

















	var	appendItem = function(elem, item) {
		if (elem.find('.no-items').length) {
			elem.html(item);
		} else {
			elem.append(item);
		}
	};

	var removeItem = function(elem, item) {

		item.remove();

		if (!elem[0].childElementCount) {
			elem.append('<h4 class="no-items">(none)</h4>');
		} 
	}

	// ajax for unclaiming item
	$('.my-items').on('click', 'button', function(event) {
		event.preventDefault();
		
		var button = $(this);

		$.ajax({
			url: '/unclaim',
			data: {
				event_item_id: button.attr('data-event-item-id')
			}
		})
		.done(function(RD) {
			console.log("success");

				
			var item = renderTemplate('#unclaimed-item', { 
				event_item_id: button.attr('data-event-item-id'),
				name: button.parent().find('h4').text()
			});
		
			appendItem($('.unclaimed-items .items'), item);			

			removeItem($('.my-items .items'), button.parent());

		})
		.fail(function() {
			console.log("error");
		})

	});



	// claim items and redraw self items on return.
	$('.unclaimed-items').on('click', '.claim', function(event) {
		event.preventDefault();
		
		var button = $(this);


		$.ajax({
			url: '/claim',
			data: {
				event_item_id: button.attr('data-event-item-id')
			}
		})
		.done(function(RD) {
			console.log("success");

			var item = renderTemplate('#my-item', { 
				event_item_id: button.attr('data-event-item-id'),
				name: button.parent().find('h4').text()
			});
			
			appendItem($('.my-items .items'), item);

			removeItem($('.unclaimed-items .items'), button.parent());
				
		})
		.fail(function() {
			console.log("error");
		})

	});

	// add new items to group list.
	$('.new-item').on('click', 'button', function(event) {
		event.preventDefault();
		
		var name = $('.add-item').val();
		if (name) {

			console.log(name);

			$.ajax({
				url: '/add_item',
				data: {
					'name': name,
					event_id: app.settings.event_id
				}
			})
			.done(function(RD) {
				console.log("success");

				var item = renderTemplate('#unclaimed-item', { 
					event_item_id: RD.event_item_id,
					name: name
				});

				$('.add-item').val('');

				appendItem($('.unclaimed-items .items'), item);


			})
			.fail(function() {
				console.log("error");
			})
		};


	});

		// remove item from group unclaimed list
	$('.unclaimed-items').on('click', '.group-remove', function(event) {
		event.preventDefault();

		var button = $(this);
		
		$.ajax({
			url: '/remove_item',
			data: {
				event_item_id: button.attr('data-event-item-id')
			}
		})
		.done(function(RD) {
			console.log("success");

			removeItem($('.unclaimed-items .items'), button.parent());

		})
		.fail(function() {
			console.log("error");
		})
		
	});



});