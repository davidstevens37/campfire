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
		// Shapes define the clickable region of the icon.
		// The type defines an HTML &lt;area&gt; element 'poly' which
		// traces out a polygon as a series of X,Y points. The final
		// coordinate closes the poly by connecting to the first
		// coordinate.
		var shape = {
		  coords: [1, 1, 1, 20, 18, 20, 18 , 1],
		  type: 'poly'
	};

		// MARKER INSTANSIATION AND SETTINGS.
		var marker = new google.maps.Marker({
		    title:"'X' Marks the Spot!",
		    draggable: true,
    		animation: google.maps.Animation.DROP,
    		icon: image,
    		// shape: shape
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





});