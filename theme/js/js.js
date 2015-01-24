

$(document).ready(function() {
	//some needed variables
	var window_height = $(window).height();

	var data_from_ajax, btn = $('.button'), navigation_elements = $('.navigation li');
	/*
	$.ajax({
		url : "pop-up.html",
		context : document.body,
		success : function(dataCheck) {
			data_from_ajax = dataCheck;
		}
	}).done(function() {
		$(this).append(data_from_ajax);
		var pop_up_height, pop_up_object = $('.pop-up'), pop_up_close = pop_up_object.find('.close-pop-up'), pop_up_mask = $('.overlay-mask');

		pop_up_height = pop_up_object.height();
		pop_up_object.css('top', window_height / 2 - pop_up_height / 2);
		pop_up_close.add(pop_up_mask).click(function(ev) {
			ev.preventDefault();
			pop_up_object.fadeOut('fast');
			pop_up_mask.fadeOut('fast');
		});
	});
	
	/*
	/* on btn click on the bottom */
	btn.click(function(e) {
		e.preventDefault();
		var _this = $(this), data_slide = _this.attr('data-slide');
		$('html,body').animate({
			scrollTop : $("#slide" + data_slide).offset().top
		}, 'slow');
		$.each(navigation_elements, function(index, value) {
			$(value).removeClass('active');
		});
		$(navigation_elements[data_slide - 1]).addClass('active');
	});
	/* on navigation click */
	/* always first child is active */
	$(navigation_elements[0]).addClass('active');
	navigation_elements.click(function(e) {
		var _this = $(this), data_slide = _this.attr('data-slide');
		$('html,body').animate({
			scrollTop : $("#slide" + data_slide).offset().top
		}, 'slow');
		$.each(navigation_elements, function(index, value) {
			$(value).removeClass('active');
		});
		_this.addClass('active');
	});

	/* maps code */
	var sofia_lang = 42.69737, 
		sofia_lat = 23.33519, 
		sofia_map_id = "map_canvas_sofia", 
		sofia_inner_html = "<p class='big'>София,</p><p class='small'> Музикален театър в 17:00ч. и 20:00ч.</p>", 
		sofia_theater = "http://www.musictheatre.bg/nmt/index.php?page=page_1", 
		plovdiv_lang = 42.145396, 
		plovdiv_lat = 24.749126, 
		plovdiv_map_id = "map_canvas_plovdiv", 
		plovdiv_inner_html = "<p class='big'>Пловдив,</p><p class='small'> Драматичен театър в 19:30ч.</p>", 
		plovdiv_theater = "http://www.dtp.bg/", 
		varna_lang = 43.204988, 
		varna_lat = 27.912556, 
		varna_map_id = "map_canvas_varna", 
		varna_inner_html = "<p class='big'>Варна,</p><p class='small'> Драматичен театър в 19:30ч.</p>", 
		varna_theater = "http://www.dramavarna.com/", 
		blago_lang = 42.01241, 
		blago_lat = 23.09549, 
		blago_map_id = "map_canvas_blago", 
		blago_inner_html = "<p class='big'>Благоевград,</p> <p class='small'>Студентски център \x22Америка за България\x22 в 19:30ч.</p>", 
		blago_theater = "http://www.aubg.bg/",
		zagora_lang = 42.42774, 
		zagora_lat = 25.62604, 
		zagora_map_id = "map_canvas_stara_zagora", 
		zagora_inner_html = "<p class='big'>Стара Загора,</p> <p class='small'>Държавна Опера в 19:30ч.</p>", 
		zagora_theater = "http://www.opera-starazagora.bg/",
		burgas_lang = 42.49700, 
		burgas_lat = 27.46871, 
		burgas_map_id = "map_canvas_burgas", 
		burgas_inner_html = "<p class='big'>Бургас,</p> <p class='small'>Зала ДНА в 19:30ч.</p>", 
		burgas_theater = "http://wikimapia.org/4185504/bg/%D0%92%D0%BE%D0%B5%D0%BD%D0%B5%D0%BD-%D0%BA%D0%BB%D1%83%D0%B1-%D0%94%D0%9D%D0%90";

	function initializeMaps(lang, lat, map_id, location_string, theater) {
		var secheltLoc = new google.maps.LatLng(lang, lat);

		var myMapOptions = {
			zoom : 17,
			center : secheltLoc,
			mapTypeId : google.maps.MapTypeId.ROADMAP,
			scrollwheel : false
		};
		var theMap = new google.maps.Map(document.getElementById(map_id), myMapOptions);

		var marker = new google.maps.Marker({
			map : theMap,
			draggable : false,
			position : new google.maps.LatLng(lang, lat),
			visible : true
		});

		marker.setIcon('/theme/images/slide3/marker.png');
		google.maps.event.addListener(marker, "click", function() {
			window.open(theater);
		});

		var boxText = document.createElement("div");
		boxText.style.cssText = "background: url(/theme/images/slide3/pop-up-bgr.png) center 0 no-repeat; margin-top: 7px; padding: 15px 5px; font-family:'HelveticaBold', Tahoma; text-align: center; color: #222;";
		boxText.innerHTML = location_string;

		var myOptions = {
			content : boxText,
			disableAutoPan : false,
			maxWidth : 0,
			pixelOffset : new google.maps.Size(-140, 0),
			zIndex : null,
			boxStyle : {
				opacity : 1,
				width : "280px"
			},
			closeBoxURL : "/theme/images/slide3/close.png",
			infoBoxClearance : new google.maps.Size(1, 1),
			isHidden : false,
			pane : "floatPane",
			enableEventPropagation : false
		};

		google.maps.event.addListener(marker, "click", function(e) {
			ib.open(theMap, this);
		});

		var ib = new InfoBox(myOptions);
		ib.open(theMap, marker);
	}


	google.maps.event.addDomListener(window, 'load', initializeMaps(blago_lang, blago_lat, blago_map_id, blago_inner_html, blago_theater));
	google.maps.event.addDomListener(window, 'load', initializeMaps(sofia_lang, sofia_lat, sofia_map_id, sofia_inner_html, sofia_theater));
	google.maps.event.addDomListener(window, 'load', initializeMaps(plovdiv_lang, plovdiv_lat, plovdiv_map_id, plovdiv_inner_html, plovdiv_theater));
	google.maps.event.addDomListener(window, 'load', initializeMaps(varna_lang, varna_lat, varna_map_id, varna_inner_html, varna_theater));
	google.maps.event.addDomListener(window, 'load', initializeMaps(zagora_lang, zagora_lat, zagora_map_id,zagora_inner_html, zagora_theater));
	google.maps.event.addDomListener(window, 'load', initializeMaps(burgas_lang, burgas_lat, burgas_map_id, burgas_inner_html, burgas_theater));

	var request_json, news_container = $('#single-news-exchange'), news_heading = news_container.find('h1'), news_img = news_container.find('img'), news_txt = news_container.find('.news-txt');

	/* fill the first news item */
	request_json = $($('#news_feed_list li a')[0]).attr('href');
	news_json(request_json);

	$('#news_feed_list li a').click(function(e) {
		e.preventDefault();
		request_json = $(this).attr('href');
		//do the request
		news_json(request_json);

	});

	function news_json(request_json) {
		$.getJSON(request_json, function(data) {
			news_heading.html(data.title);
			news_txt.html(data.text);
		});
	}

	/* move mouse on image of a single actor */
	var home_height = $('#slide1').height(), tickets_height = $('#slide2').height(), tour_height = $('#slide3').height(), all_minus = home_height + tickets_height + tour_height, pop_up_width = $('#cast-pop-up').width(), offset;
	$('.single-cell a').bind('mouseenter', function(e) {
		var img = $(this).children('img');
		offset = img.width();
		var cast_pop_up = $('<div id="cast-pop-up"><span class="arrow"><!----></span><h3>' + img.attr('alt') + '</h3><p>' + img.attr('rel') + '</p></div>');
		$(this).append(cast_pop_up);
		cast_pop_up.css({
			left : offset / 2,
			top : -30
		});
		var offset_var = cast_pop_up.offset().left;
		if(offset_var < 5){
			if(offset_var < 0){
				offset_var = offset_var*-1;
			}
			offset_var+=5;
			cast_pop_up.css({
			left : '+='+offset_var
		});
		}
		
		
		
	}).mouseleave(function(e) {
		$('#cast-pop-up').remove();
	}).click(function(e) {
		e.preventDefault();
	});

	/* photo's slider on slide "news" */
	var arrow_left = $('.photos .left-arrow'), arrow_right = $('.photos .right-arrow'), carousel = $('.photos ul'), carousel_items = carousel.find('li'), carousel_links = carousel_items.find('a'), carousel_link_array = carousel_items.find('a img'), pagination = $('.photos .pagination'), pagination_count = Math.ceil(carousel_items.length / 6), current_index = 0, next_index;
	carousel.width(pagination_count * 960);

	/* the first list item is active in the beginning */
	for (var i = 0; i < pagination_count; i++) {
		pagination.append('<div></div>');
	}
	var pagination_children = pagination.children();
	$(pagination_children[current_index]).addClass('active');

	var is_gallery_anim = false;

	arrow_left.click(function(e) {
		e.preventDefault();
		carousel_move(current_index - 1);
	});

	arrow_right.click(function(e) {
		e.preventDefault();
		carousel_move(current_index + 1);
	});

	$('.pagination div').click(function(e) {
		e.preventDefault();
		carousel_move($(this).index());
	});

	function carousel_move(index) {
		if (is_gallery_anim) {
			return;
		}
		if (index < 0 || index >= pagination_count) {
			return;
		}
		is_gallery_anim = true;
		var left_offset = index * 960;
		carousel.animate({
			left : '-' + left_offset + 'px'
		}, function() {
			is_gallery_anim = false;
			$(pagination_children[current_index]).removeClass('active');
			$(pagination_children[index]).addClass('active');
			current_index = index;
		});
	}


	$('.photos a').lightBox({
		imageLoading : 'http://aubgmusicals.com/theme/images/loading.gif',
		imageBtnClose : 'http://aubgmusicals.com/theme/images/close.gif',
		imageBtnPrev : 'http://aubgmusicals.com/theme/images/prev.gif',
		imageBtnNext : 'http://aubgmusicals.com/theme/images/next.gif'
	});
	
	function isValidEmailAddress(emailAddress) {
	    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
	    return pattern.test(emailAddress);
	};


	var valid_email;
	$("#send_mail_btn").click(function(e) {
		valid_email = isValidEmailAddress($("#email-input").val());
		if(valid_email == false) {
			$("#email-input").addClass("error");
			return false;
		} else {
			$("#email-input").removeClass("error");
			var url = "/mail";
		// the script where you handle the form input.
		$.ajax({
			type : "POST",
			url : url,
			data : $("#ask_us").serialize(), // serializes the form's elements.
			success : function(data) {
				if (data == 'false') {
					alert('Error sending mail!');
				}
			}
			});
	
			alert("Thanks for sending us email! \n Мерси за имейла");
			$("#email-input").val("");
			$("#text-input").val("");
			return false;
		}
		
		
		/*
		 */
		// avoid to execute the actual submit of the form.
	});
	
	new function() {
		var $list = $('#logos_clients'),
			$items = $list.find('li'),
			visible_area_width = 938,
			items_length = $items.length,
			list_width = 0,
			$navigation = $('.our_sponsors .navigation'),
			$current_page,
			speed,
			destination = 1,
			progress = false,
			pagination_interval,
			autoplay_interval;

		$items.find('img').map(function(ind, el){
			list_width += (parseInt($(el).attr('width'))) + parseInt($(el).parents('li').css('margin-left'), 10);
		});

		function int_navigation() {
			var pages = Math.ceil(list_width / visible_area_width),
				fragment_pages = document.createDocumentFragment();

			for(var i = 0; i < pages; i++) {
				var page = document.createElement('a');

				page.setAttribute('href', 'javascript:;');
				page.appendChild(document.createTextNode(i));
				fragment_pages.appendChild(page);
			};

			$navigation.append(fragment_pages);
			$current_page = $navigation.find('a:first');
			$current_page.addClass('active')

			$navigation.find('a').click(function() {
				clearTimeout(autoplay_interval);
				var $next_page = $(this),
					idx = $next_page.text(),
					offset = visible_area_width * idx;

				if ($current_page == $next_page || progress) {
					return;
				};

				progress = true;

				clearTimeout(pagination_interval);
				$current_page = $next_page;

				if ((offset + visible_area_width)  >= list_width) {
					offset = list_width - visible_area_width;
					destination = 0;
				} else if (offset == 0) {
					destination = 1;
				};

				$navigation.find('a').removeClass('active');
				$next_page.addClass('active');

				$list.stop().animate({
					left : -offset
				}, 1000, function() {
					autoplay_interval = setTimeout(function(){ progress = false; autoplay() }, 100);
				});
			});

		};

		function autoplay() {
			if (progress) {
				return;
			}

			if(destination == 1) {
				var position = list_width - visible_area_width
			} else {
				var position = 0
			};

			speed = set_speed();
			update_page();

			$list.animate({
				'left' : -position
			}, speed, 'linear', function() {
				destination  = destination ? 0 : 1;
				autoplay_interval = setTimeout(function() { progress = false; autoplay()}, 800);
			});

		};

		function update_page() {
			clearTimeout(pagination_interval);

			var left_position = Math.abs(parseInt($list.css('left'), 10)),
				page = Math.floor((left_position + visible_area_width / 2) / visible_area_width),
				$next_page = $navigation.find('a').eq(page);

			if($current_page != $next_page) {
				$navigation.find('a').removeClass('active');
				$next_page.addClass('active');

				$current_page = $next_page;
			};

			pagination_interval = setTimeout(function() {update_page()}, 100);
		};

		function set_speed() {
			var left_position = Math.abs(parseInt($list.css('left'), 10));
			if (destination == 0) {
				return (left_position + visible_area_width ) * 8;
			} else {
				return (list_width - left_position) * 8;
			};
		};

		$list.hover(function() {
			clearTimeout(autoplay_interval);
			$list.stop();
			progress = false;
		}, function() {
			autoplay_interval = setTimeout(function() { progress = false; autoplay()}, 400);
		});

		$list.css('width', list_width);
		int_navigation();
		autoplay();
		//update_page();
	};
	
	$("#x").click(function(){
		$(".ask-us").hide();
	});
	

}); 