jQuery(document).ready(function ($) {

	//some needed variables
	var window_height = $(window).height();
	//popup scripts
	if(jQuery.browser.version == '8.0' || jQuery.browser.version == '7.0') {	
		var data_from_ajax,
			btn = $('.button'),
			navigation_elements = $('.navigation li');
		$.ajax({
			url:		"pop-up.html",
			context:	document.body,
			success:	function (dataCheck) {
							data_from_ajax = dataCheck;
						}
			}).done(function() { 
						$(this).append(data_from_ajax);		  	
						var pop_up_height,
							pop_up_object = $('.pop-up'),
							pop_up_close = pop_up_object.find('.close-pop-up'),
							pop_up_mask = $('.overlay-mask');
							
							pop_up_height = pop_up_object.height();
							pop_up_object.css('top', window_height/2 - pop_up_height/2);
							pop_up_close.add(pop_up_mask).click(function(ev){
								ev.preventDefault();
								pop_up_object.fadeOut('fast');
								pop_up_mask.fadeOut('fast');
							});
					});	
			/* on btn click on the bottom */
			btn.click(function(e){
				e.preventDefault();
				var _this = $(this),
					data_slide = _this.attr('data-slide');
				$('html,body').animate({scrollTop: $("#slide" + data_slide).offset().top},'slow');
				$.each(navigation_elements, function(index, value){
					$(value).removeClass('active');
				});
				$(navigation_elements[data_slide - 1]).addClass('active');
			});
			/* on navigation click */
			/* always first child is active */
			$(navigation_elements[0]).addClass('active');
			navigation_elements.click(function(e){
				var _this = $(this),
					data_slide = _this.attr('data-slide');
				$('html,body').animate({scrollTop: $("#slide" + data_slide).offset().top},'slow');
				$.each(navigation_elements, function(index, value){
					$(value).removeClass('active');
				});
				_this.addClass('active');
			});
	} else {
	    //initialise Stellar.js
	    $(window).stellar();
	    
	
	    //Cache some variables
	    var links = $('.navigation').find('li');
	    slide = $('.slide');
	    button = $('.button');
	    mywindow = $(window);
	    htmlbody = $('html,body');
	
		$(links[0]).addClass('active');
	    //Setup waypoints plugin
	    slide.waypoint(function (event, direction) {
	
	        //cache the variable of the data-slide attribute associated with each slide
	        dataslide = $(this).attr('data-slide');
	
	        //If the user scrolls up change the navigation link that has the same data-slide attribute as the slide to active and 
	        //remove the active class from the previous navigation link 
	        if (direction === 'down') {
	            $('.navigation li[data-slide="' + dataslide + '"]').addClass('active').prev().removeClass('active');
	        }
	        // else If the user scrolls down change the navigation link that has the same data-slide attribute as the slide to active and 
	        //remove the active class from the next navigation link 
	        else {
	            $('.navigation li[data-slide="' + dataslide + '"]').addClass('active').next().removeClass('active');
	        }
	
	    });
	
	    //waypoints doesnt detect the first slide when user scrolls back up to the top so we add this little bit of code, that removes the class 
	    //from navigation link slide 2 and adds it to navigation link slide 1. 
	    mywindow.scroll(function () {
	        if (mywindow.scrollTop() == 0) {
	            $('.navigation li[data-slide="1"]').addClass('active');
	            $('.navigation li[data-slide="2"]').removeClass('active');
	        }
	    });
	
	    //Create a function that will be passed a slide number and then will scroll to that slide using jquerys animate. The Jquery
	    //easing plugin is also used, so we passed in the easing method of 'easeInOutQuint' which is available throught the plugin.
	    function goToByScroll(dataslide) {
	        htmlbody.animate({
	            scrollTop: $('.slide[data-slide="' + dataslide + '"]').offset().top
	        }, 2000, 'easeInOutQuint');
	    }
	
	
	
	    //When the user clicks on the navigation links, get the data-slide attribute value of the link and pass that variable to the goToByScroll function
	    links.click(function (e) {
	        e.preventDefault();
	        dataslide = $(this).attr('data-slide');
	        goToByScroll(dataslide);
	    });
	
	    //When the user clicks on the button, get the get the data-slide attribute value of the button and pass that variable to the goToByScroll function
	    button.click(function (e) {
	        e.preventDefault();
	        dataslide = $(this).attr('data-slide');
	        goToByScroll(dataslide);
	
	    }); 
    }
    /* maps code */
	var sofia_lang = 42.685779,
		sofia_lat = 23.319076,
		sofia_map_id = "map_canvas_sofia",
		sofia_inner_html = "<p class='big'>София,</p><p class='small'> НДК</p>",
		sofia_theater ="http://ndk.bg/",
		plovdiv_lang = 42.145396,
		plovdiv_lat = 24.749126,
		plovdiv_map_id = "map_canvas_plovdiv",
		plovdiv_inner_html = "<p class='big'>Пловдив,</p><p class='small'> Драматичен театър</p>",
		plovdiv_theater ="http://www.dtp.bg/",
		varna_lang = 43.204988,
		varna_lat = 27.912556,
		varna_map_id = "map_canvas_varna",
		varna_inner_html = "<p class='big'>Варна,</p><p class='small'> Драматичен театър</p>",
		varna_theater ="http://www.dramavarna.com/",
		blago_lang = 42.022327,
		blago_lat = 23.097142,
		blago_map_id = "map_canvas_comming_up",
		blago_inner_html = "<p class='big'>Благоевград,</p> <p class='small'>Драматичен театър \x22Никола Вапцаров\x22</p>",
		blago_theater ="http://www.blagoevgradtheater.eu/";
	
	function initializeMaps(lang, lat, map_id, location_string, theater){
		var secheltLoc = new google.maps.LatLng(lang, lat);

		var myMapOptions = {
			 zoom: 17
			,center: secheltLoc
			,mapTypeId: google.maps.MapTypeId.ROADMAP
			,scrollwheel: false
		};
		var theMap = new google.maps.Map(document.getElementById(map_id), myMapOptions);


		var marker = new google.maps.Marker({
			map: theMap,
			draggable: false,
			position: new google.maps.LatLng(lang, lat),
			visible: true
		});
		
		marker.setIcon('images/slide3/marker.png');
		google.maps.event.addListener(marker, "click", function() {
		    window.open(theater);
		});

		var boxText = document.createElement("div");
		boxText.style.cssText = "background: url(images/slide3/pop-up-bgr.png) center 0 no-repeat; margin-top: 7px; padding: 15px 5px; font-family:'HelveticaBold', Tahoma; text-align: center; color: #222;";
		boxText.innerHTML = location_string;

		var myOptions = {
			 content: boxText
			,disableAutoPan: false
			,maxWidth: 0
			,pixelOffset: new google.maps.Size(-140, 0)
			,zIndex: null
			,boxStyle: { 
			  opacity: 1
			  ,width: "280px"
			 }						
			,closeBoxURL: "images/slide3/close.png"
			,infoBoxClearance: new google.maps.Size(1, 1)
			,isHidden: false
			,pane: "floatPane"
			,enableEventPropagation: false
		};

		google.maps.event.addListener(marker, "click", function (e) {
			ib.open(theMap, this);
		});

		var ib = new InfoBox(myOptions);
		ib.open(theMap, marker);
	}

  google.maps.event.addDomListener(window, 'load', initializeMaps(blago_lang, blago_lat, blago_map_id, blago_inner_html, blago_theater));
  google.maps.event.addDomListener(window, 'load', initializeMaps(sofia_lang, sofia_lat, sofia_map_id, sofia_inner_html, sofia_theater));
  google.maps.event.addDomListener(window, 'load', initializeMaps(plovdiv_lang, plovdiv_lat, plovdiv_map_id, plovdiv_inner_html, plovdiv_theater));
  google.maps.event.addDomListener(window, 'load', initializeMaps(varna_lang, varna_lat, varna_map_id, varna_inner_html, varna_theater));
  
  
  /* json for the actor's popup */
  $.getJSON("js/json/actors.json", function(data) {
		//console.log(data.actors);
	});
	
  
  /* news json on click! */
  
 var request_json, news_container = $('#single-news-exchange'), news_heading = news_container.find('h1'), news_img = news_container.find('img'), news_txt = news_container.find('.news-txt');
 
 /* fill the first news item */
	request_json = $($('#news_feed_list li a')[0]).attr('href');
	news_json(request_json);

	$('#news_feed_list li a').click(function(e){
		request_json = $(this).attr('href');
		//do the request
		news_json(request_json);
			
		e.preventDefault();
	});
  
	function news_json(request_json) {
		$.getJSON('js/json/' + request_json + '.json', function(data) {
			news_heading.html(data[request_json].heading);
			news_img.attr('src', data[request_json].thumb);
			news_txt.html(data[request_json].text);
		});
	}
  
	  /* move mouse on image of a single actor */
	var home_height = $('#slide1').height(),
	 	tickets_height = $('#slide2').height(),
	 	tour_height = $('#slide3').height(),
	 	all_minus = home_height + tickets_height + tour_height,
	 	pop_up_width = $('#cast-pop-up').width();
	 $('.single-cell a').bind('mouseenter', function(e){
	 	$('#cast-pop-up').show();
	 	var top_num = e.pageY - all_minus + 20,
	 		pop_up_x_pos = e.pageX - pop_up_width/2 - 20;
		$('#cast-pop-up').css({
			left: pop_up_x_pos,
			top: top_num
		}); 
	 }).mouseleave(function(e){
	 	$('#cast-pop-up').hide();
	 });
 
 
	 /* photo's slider on slide "news" */
	var arrow_left = $('.photos .left-arrow'),
		arrow_right = $('.photos .right-arrow'),
		carousel = $('.photos ul'),
		carousel_items = carousel.find('li'),
		carousel_links = carousel_items.find('a'),
		carousel_link_array = carousel_items.find('a img'),
		pagination = $('.photos .pagination'),
		pagination_count = carousel_items.length,
		list_item_lenght = carousel.width(),
		current_index,
		next_index;	
		
	/* the first list item is active in the beginning */
	$(carousel_items[0]).addClass('active');
	for(var i = 0; i < carousel_items.length; i++) {
		if($(carousel_items[i]).index() > 0) {
			$(carousel_items[i]).css('left', list_item_lenght).addClass('hidden');
		}
	}	
	/* put pagination down */
	$.each(carousel_items, function(index, value) { 
	  pagination.append('<div></div>'); 
	});
	/*  the first element is always active */
	var pagination_items = pagination.find('div');
	$(pagination_items[0]).addClass('active');
	/* listen to prev or next click */
	
	
	var is_gallery_anim = false;
	
	arrow_left.click(function(e){
		if(is_gallery_anim){
			e.preventDefault();
			return;
		}
		current_index = carousel.find('.active').index();
		next_index = current_index - 1;
		if(next_index < 0) {
			//stop animation
		} else {
			is_gallery_anim = true;
			$(carousel_items[next_index]).removeClass('hidden')		
			$(function(){
				$(carousel_items[next_index]).animate({
					 left: '+='+list_item_lenght+'px'
				}, function(){
					$(carousel_items[current_index]).removeClass('active').addClass('hidden');
				});
				$(carousel_items[current_index]).animate({
					 left: '+='+list_item_lenght+'px'
				}, function(){
					$(carousel_items[next_index]).addClass('active');
					$(pagination_items[next_index]).addClass('active');
					$(pagination_items[current_index]).removeClass('active');
					is_gallery_anim = false;
				});
			});
		}
	});
	arrow_right.click(function(e){
		if(is_gallery_anim){
			e.preventDefault();
			return;
		}
		current_index = carousel.find('.active').index();
		next_index = current_index + 1;
		if(next_index >= carousel.find('li').length) {
			//stop animation
		} else {
			is_gallery_anim = true;	
			$(carousel_items[next_index]).removeClass('hidden')		
			$(function(){
				$(carousel_items[next_index]).animate({
					 left: '-='+list_item_lenght+'px'
				}, function(){
					$(carousel_items[current_index]).removeClass('active').addClass('hidden');
				});
				$(carousel_items[current_index]).animate({
					 left: '-='+list_item_lenght+'px'
				}, function(){
					$(carousel_items[next_index]).addClass('active');
					$(pagination_items[next_index]).addClass('active');
					$(pagination_items[current_index]).removeClass('active');
					is_gallery_anim = false;
				});
			});
		}
	});
	

	
	
	$('.pagination div').click(function(e){
		if(is_gallery_anim){
			e.preventDefault();
			return;
		}
		$(this).siblings('.active').removeClass('active');
		$(this).addClass('active');
		//for(var i = 0; i < $(this).index(); i++) {
		//	$(carousel_items[i]).removeClass('hidden');
		//}
		
		var sign = '';
		current_index = carousel.find('.active').index();
		next_index = $(this).index();
		if(current_index > next_index){
			sign = '+';
		} else if(current_index < next_index){
			sign = '-';
		} else {
			e.preventDefault();
			return;
		}
		
		
		
		
		is_gallery_anim = true;
		$(carousel_items[next_index]).removeClass('hidden');
		$(carousel_items[next_index]).animate({
					 left: sign+'='+list_item_lenght+'px'
				}, function(){
					$(carousel_items[current_index]).removeClass('active').addClass('hidden');
				});
				
				$(carousel_items[current_index]).animate({
					 left: sign+'='+list_item_lenght+'px'
				}, function(){
					$(carousel_items[next_index]).addClass('active');
					$(pagination_items[next_index]).addClass('active');
					$(pagination_items[current_index]).removeClass('active');
					is_gallery_anim = false;
				});
		
		
	});

	/* on a photo item click */
	
	var gallery = $('#gal-pop-up'),
		gallery_prev = $('#gal-prev'),
		gallery_next = $('#gal-next'),
		preloader = $('#preloader'),
		current_index,
		next_index,
		next_image,
		prev_image,
		image_width,
		image_height;
		
	function get_the_image(link){
		preloader.show();
		$.ajax({
		  url: link,
		  context: document.body
		}).done(function() { 
			preloader.hide();
			gallery.append('<img id="active-image" src=' + link  + ' />');
			$('#active-image').load(function(){
				image_width = $(this).width();
				image_height = $(this).height();

				gallery.css({
					top: '50%',
					left: '50%',
					'margin-top': -image_height/2,
					'margin-left': -image_width/2
				});
			});
		});
	}
	
		
	carousel_link_array.click(function(e){
		if(gallery.find('img').length > 0) {
			gallery.find('img').remove();
		}
		$('#gal-pop-up').show();
		$('body').append('<div class="overlay-mask"></div>');
		var that = $(this);
		get_the_image(that.parent().attr('href'));
		current_index = jQuery.inArray(that.parents('#the-list-of-thumbs div')[0], $('#the-list-of-thumbs div'));
		e.preventDefault();
	});
	gallery_prev.click(function(e){	
		gal_prev();	
		e.preventDefault();
	});
	gallery_next.click(function(e){		
		gal_next();
		e.preventDefault();
	});
	$('#gal-close').click(function(e){		
		hide_pop_up();		
		e.preventDefault();
	});
	$(document).keyup(function(e) {    // enter
		if (e.keyCode == 27) { 
			hide_pop_up(); 
		} else
		if (e.keyCode == 37) { 
			gal_prev(); 
		} else
		if (e.keyCode == 39) { 
			gal_next(); 
		} 
		
	});	
	function hide_pop_up(){
		$('.overlay-mask').remove();
		$('#gal-pop-up').hide();
	}
	function gal_next() {
		if(current_index >= carousel_links.length - 1) {
		} else {
			gallery.find('img').remove();
			current_index++;
			get_the_image($(carousel_links[current_index]).attr('href'))
		}
	}
	function gal_prev() {
		if(current_index <= 0) {
		} else {
			gallery.find('img').remove();
			current_index--;
			get_the_image($(carousel_links[current_index]).attr('href'))
		}
	}
});













