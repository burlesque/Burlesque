<div id="stage">
	<div class="wrapper">
		<div id="stage_holder" class="mini">			
			<div id="top" class="mini">
				<h1>Контакти</h1>
				<h2>как да ни откриете</h2>	
			</div>			
			<div id="bottom">
				<div class="mini-txt"><img src="{base_url}theme/images/headers/contacts.png" alt="" /></div>
			</div>
		</div>
	</div>
</div>
<div id="breadcrumbs">
	<div class="wrapper">
		<? echo(render_breadcrumbs()); ?>
	</div>	
</div>
<div id="contacts_container">
	<div id="map">
	</div>
	<div class="shadow-map"><!--o--></div>
	<div class="wrapper">
		<div class="col-670">
			<form action="#" method="post" id="contact_form">
				<h1>форма за запитване</h1>
				<fieldset class="one-half-col">
					<p>Вашето име <span>*</span></p>
					<input type="text" name="sender_name" value="" id="sender_name"/>
				</fieldset>
				<fieldset class="one-half-col">
					<p>Вашият имейл <span>*</span></p>
					<input type="text" name="sender_email" value="" id="sender_email"/>
				</fieldset>
				<fieldset>
					<p>Запитване <span>*</span></p>
					<textarea name="comment" rows="8" cols="40"></textarea>
				</fieldset>
				<fieldset class="one-half-col">
					<p>Captcha <span>*</span></p>
					<input type="text" name="captcha" value="" id="captcha"/>
				</fieldset>
				<fieldset class="one-half-col captcha">
					<img src="{base_url}theme/images/temp/captcha.png" alt="" />
					<a href="#"><span class="captcha-reload"></span></a>
				</fieldset>
				<fieldset class="one-half-col">
					<input type="submit" name="submit_form" value="Изпрати" id="submit_form"/>
				</fieldset>
			</form>
		</div>
		<div class="col-310">
			<div class="contact-info">
				<h1>къде да ни намерите</h1>
				<p><strong>Адрес:</strong> </p>

				<p>Sofia, Mladost 4
				Dr. Atanas Moskov Blvd, Bl 458, ground floor, next to Ent.6</p>
				 
				<p><strong>Mobile:</strong></p>
				
				<p>+359 888 735630</p>
				
				<p><strong>Тel.: </strong></p>
				
				<p>+359 2 4443 437 | +359 2 4912 430</p>
				
				<p><strong>E-Mail:</strong></p> 
				
				<p>office@m-design.bg</p>   
				 
				<p><strong>Bank account in lv:</strong></p>
				
				<ul>
					<li><span>Bank:</span>		<span>BULBANK</span></li>
					<li><span>IBAN:</span>		<span>BG94UNCR76301078031037</span></li>
					<li><span>BIC:</span>		<span>UNCRBGSF</span></li>
					<li><span>Company:</span>	<span>M-DESIGN Ltd.</span></li>
					<li><span>ID:</span>		<span>BG113530131</span></li>
				</ul> 
			</div>			
		</div>
	</div>
</div>
<script>
	      function initialize() {
	        var mapOptions = {
	          zoom: 14,
	          center: new google.maps.LatLng(42.63503, 23.37443),
	          scrollwheel: false,
	          mapTypeId: google.maps.MapTypeId.ROADMAP
	        };
	
	        var map = new google.maps.Map(document.getElementById('map'),
	            mapOptions);
	
	        var marker = new google.maps.Marker({
	          position: map.getCenter(),
	          map: map,
	          title: 'Click to zoom'
	        });
	        	
	        google.maps.event.addListener(marker, 'click', function() {
	          map.setZoom(20);
	          map.setCenter(marker.getPosition());
	        });
	      }
	
	      google.maps.event.addDomListener(window, 'load', initialize);
	    </script>