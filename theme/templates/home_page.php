<? $about = get_content(9); ?>
<? $home = get_content(84); ?>
<!DOCTYPE html>
	<html>
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<title>AUBG MEMPHIS MUSICAL</title>
		
			<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.3.0/build/cssreset/reset-min.css" />
			<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' />
			<link rel="stylesheet" type="text/css" href="{base_url}/theme/css/style.css" />
			<link rel="stylesheet" type="text/css" href="{base_url}/theme/css/jquery.lightbox-0.5.css" media="screen" />
		
			
			<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
			<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
			<script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/tags/infobox/1.1.5/src/infobox.js"></script>
			
			<script type="text/javascript" src="{base_url}/theme/js/js.js"></script>
			<script type="text/javascript" src="{base_url}/theme/js/jquery.lightbox-0.5.min.js"></script>    
  
			
		</head>
	
		<body>				
			<ul class="navigation">
				<li data-slide="1"><?=lang("home") ?></li>
				<li data-slide="2"><?=lang("about") ?></li>
				<li data-slide="3"><?=lang("tour dates") ?></li>
				<li data-slide="4"><?=lang("cast") ?></li>
				<li data-slide="5"><?=lang("news") ?></li>
				<li data-slide="6"><?=lang("crew") ?></li>
			</ul>
			<div class="language-bar">
				<? echo(render_language_switcher('<a href="{language_link}"><img class="{language_signature}" src="{base_url}/theme/images/common/{language_signature}.png" /></a> ')); ?>
			</div>
			<div class="social">
				<a href="https://www.facebook.com/aubgmusicals?ref=ts&fref=ts" target="_blank"><img class="facebook" src="{base_url}/theme/images/common/facebook.png" /></a>
				<a href="https://twitter.com/AUBGmusical" target="_blank"><img class="twitter" src="{base_url}/theme/images/common/twitter.png" /></a>
			</div>
			<div class="tickets">
				<a href="http://boxoffice.bg/" target="_blank"><img class="facebook" src="{base_url}/theme/images/common/tickets.png" /></a>
			</div>
		
		          
			
			
			<!--Slide 1-->
			<div class="slide" id="slide1" data-slide="1" data-stellar-background-ratio="0.5">
				<div class="wrapper" style="height:100%">
					<div class="main-content">
						<img class="fake-bg-main" src="{base_url}/theme/images/slide1/main-image.jpg"/>
						<div class="intro">
						<h1><?= $home['title_' . $lang] ?></h1>
						<div>
							<p>
							<?= $home['text_' . $lang] ?>
							</p>
						</div>
					</div>
					</div>
					<img class="logo" src="{base_url}/theme/images/logo.png">	
					
				</div>
				<div class="our_sponsors">	
					<div class="visible_area">
						<ul id="logos_clients">
							<li>
								<a href="http://www.aubg.bg" title="AUBG" target="_blank">
									<img width="326" alt="AUBG" title="AUBG" src="{base_url}/theme/images/slide1/sponsors/aubg.png">
								</a>
							</li>
							<li>
								<a href="http://www.matstar.bg/" title="Mat Star" target="_blank">
									<img width="150" alt="Mat Star" title="Mat Star" src="{base_url}/theme/images/slide1/sponsors/mat-star.png">
								</a>
							</li>
							<li>
								<a href="http://fpi.bg" title="FPI" target="_blank">
									<img width="92" alt="FPI" title="FPI" src="{base_url}/theme/images/slide1/sponsors/fpi.png">
								</a>
							</li>							
							<li>
								<a href="http://www.kraftfoodsgroup.com/welcome.aspx" title="Kraft" target="_blank">
									<img width="116" alt="Kraft" title="Kraft" src="{base_url}/theme/images/slide1/sponsors/kraft.png">
								</a>
							</li>
							<li>
								<a href="http://www.mondelezinternational.com/home/index.aspx" title="Mondelez" target="_blank">
									<img width="150" alt="Mondelez" title="Mondelez" src="{base_url}/theme/images/slide1/sponsors/mondelez.png">
								</a>
							</li>
							<li>
								<a href="http://www.schwarzkopf.com/sk/en/home.html" title="Schwarzkopf" target="_blank">
									<img width="83" alt="Schwarzkopf" title="Schwarzkopf" src="{base_url}/theme/images/slide1/sponsors/schwarzkopf.png">
								</a>
							</li>
							<li>
								<a href="#" title="Lingua Mundi" target="_blank">
									<img width="110" alt="Lingua Mundi" title="Lingua Mundi" src="{base_url}/theme/images/slide1/sponsors/lingua.png">
								</a>
							</li>
							<li>
								<a href="http://www.deloitte.com/view/bg_BG/bg/index.htm" title="Deloitte" target="_blank">
									<img width="156" alt="Deloitte" title="Deloitte" src="{base_url}/theme/images/slide1/sponsors/deloitte.png">
								</a>
							</li>
							<li>
								<a href="http://www.shmania.net/" title="Mania" target="_blank">
									<img width="106" alt="Mania" title="Mania" src="{base_url}/theme/images/slide1/sponsors/mania.png">
								</a>
							</li>
							<li>
								<a href="http://www.aes.com/" title="AES we are the energy" target="_blank">
									<img width="150" alt="AES we are the energy" title="AES we are the energy" src="{base_url}/theme/images/slide1/sponsors/aes.png">
								</a>
							</li>
							<li>
								<a href="http://www.helikon.bg/" title="Helikon" target="_blank">
									<img width="223" alt="Helikon" title="Helikon" src="{base_url}/theme/images/slide1/sponsors/helokon.png">
								</a>
							</li>
							<li>
								<a href="http://sg.aubg.bg/" title="Studen Government" target="_blank">
									<img width="32" alt="Studen Government" title="Studen Government" src="{base_url}/theme/images/slide1/sponsors/sg.png">
								</a>
							</li>
							
						</ul>					
					<div class="blur_left">	&nbsp;</div>
					<div class="blur_right">&nbsp;</div>
				</div>
			</div>
			</div><!--End Slide 1-->

			<div class="slide" id="slide2" data-slide="2" data-stellar-background-ratio="0.5">
				<div class="wrapper">
					<div class="images clearfix">
						<h1 class="clearfix"><span class="left"><!----></span><?= $about['title_' . $lang] ?><span class="right"><!----></span></h1>
						<div class="top-left fl">
							<img src="{base_url}/theme/images/slide2/images/temp1.png"/>
						</div>
						<div class="top-right fl">
							<img src="{base_url}/theme/images/slide2/images/temp2.png"/>
						</div>
						<div class="bottom-left fl">
							<img src="{base_url}/theme/images/slide2/images/temp3.png"/>
						</div>
						<div class="bottom-right fl">
							<img src="{base_url}/theme/images/slide2/images/temp4.png"/>
						</div>
					</div><!--/images-->
					<div class="desc">
						<div class=""><?= $about['text_' . $lang] ?></div>
					</div><!--/desc-->
				</div>		
				<span class="slideno">MEMPHIS</span>
				<a class="button" data-slide="3" title=""></a>
		
			</div><!--End Slide 2-->

			<!-- slide 3 -->
			<div class="slide" id="slide3" data-slide="3" data-stellar-background-ratio="0.5">
				<div class="wrapper">
					<div class="ask-us">
						<form id="ask_us">
							<div id="x"><img src="{base_url}/theme/images/slide3/x.png"></div>
							<h2><?=lang("ask us") ?></h2>
							<input name="mail" type="text"  placeholder="<?=lang("email") ?>" id="email-input"/>
							<textarea name="body" placeholder="<?=lang("your message here") ?>" id="text-input"></textarea>
							<input name="send" type="submit" id="send_mail_btn" value="Go"/>
						</form>
					</div>
					<div class="explain">
						<p><?=lang("marker") ?></p>
					</div>
					<div class="locations">
						<div class="the_other_three_locations">
							<div class="next_location">
								<?= render_content(5, '<h1>{title_' . $lang . '},<br> {show_date}<span class="shadow"></span></h1>'); ?>
							<div id="map_canvas_blago"></div>
							</div>
							<div class="next_location">
								<?= render_content(6, '<h1>{title_' . $lang . '},<br> {show_date}<span class="shadow"><!------></span></h1>'); ?>
								<div id="map_canvas_sofia"><!----></div>
							</div>	
							<div class="next_location">
								<h1>Стара Загора<br> 08/04/2013<span class="shadow"><!------></span></h1>
								<div id="map_canvas_stara_zagora"><!----></div>
							</div>						
							
						</div>
						
						<div class="the_other_three_locations">
							<div class="next_location">
								<?= render_content(8, '<h1>{title_' . $lang . '},<br> {show_date}<span class="shadow"><!------></span></h1>'); ?>
								<div id="map_canvas_varna"><!----></div>
							</div>
							<div class="next_location">
								<h1>Бургас<br> 12/04/2013<span class="shadow"><!------></span></h1>
								<div id="map_canvas_burgas"><!----></div>
							</div>
							<div class="next_location">
								<?= render_content(7, '<h1>{title_' . $lang . '},<br> {show_date}<span class="shadow"><!------></span></h1>'); ?>
								<div id="map_canvas_plovdiv"><!----></div>
							</div>
						</div>
					</div><!-- locations -->
				</div>
		
				<span class="slideno">MEMPHIS</span>
				<a class="button" data-slide="4" title=""></a>
		
			</div><!--End Slide 3-->

			<div class="slide big" id="slide4" data-slide="4" data-stellar-background-ratio="0">
				<div class="wrapper">
					<div class="actors clearfix">
						<div class="one-seventh">
							<div class="single-type-one single-cell">
								<?php $actor = get_content(21); ?>
								<a href="#"><img src="{base_url}image?file=<?= $actor['picture'] ?>&profile=actor_picture" alt="<?=  htmlspecialchars($actor['name_' . $lang]) ?>" rel="<?=  htmlspecialchars($actor['text_' . $lang]) ?>"/></a>
								<div class="cast-description">
									<h1><?= $actor['name_' . $lang] ?></h1>
									<h2><?= $actor['role_' . $lang] ?></h2>
								</div>
							</div>
							<div class="double-type-one single-cell">
								<? $actor = get_content(22); ?>
								<? $actor2 = get_content(42); ?>
								<a href="#"><img src="{base_url}image?file=<?= $actor['picture'] ?>&profile=actor_picture" alt="<?=  htmlspecialchars($actor['name_' . $lang]) ?>" rel="<?=  htmlspecialchars($actor['text_' . $lang]) ?>"/></a>
								<a href="#"><img src="{base_url}image?file=<?= $actor2['picture'] ?>&profile=actor_picture" alt="<?=  htmlspecialchars($actor2['name_' . $lang]) ?>" rel="<?=  htmlspecialchars($actor2['text_' . $lang]) ?>"/></a>
								<div class="cast-description">
									<h1><?= $actor['name_' . $lang] ?></h1>
									<h1><?= $actor2['name_' . $lang] ?></h1>
									<h2><?= $actor['role_' . $lang] ?></h2>
									<h2><?= $actor2['role_' . $lang] ?></h2>
								</div>
							</div>
							<div class="single-type-two single-cell">
								<? $actor = get_content(49); ?>
								<a href="#"><img src="{base_url}image?file=<?= $actor['picture'] ?>&profile=actor_picture" alt="<?=  htmlspecialchars($actor['name_' . $lang]) ?>" rel="<?=  htmlspecialchars($actor['text_' . $lang]) ?>"/></a>
								<div class="cast-description">
									<h1><?= $actor['name_' . $lang] ?></h1>
									<h2><?= $actor['role_' . $lang] ?></h2>
								</div>
							</div>
						</div><!--/one-seventh-->
						<div class="one-seventh">
							<div class="double-type-one single-cell">
								<? $actor = get_content(24); ?>
								<? $actor2 = get_content(44); ?>
								<a href="#"><img src="{base_url}image?file=<?= $actor['picture'] ?>&profile=actor_picture" alt="<?=  htmlspecialchars($actor['name_' . $lang]) ?>" rel="<?=  htmlspecialchars($actor['text_' . $lang]) ?>"/></a>
								<a href="#"><img src="{base_url}image?file=<?= $actor2['picture'] ?>&profile=actor_picture" alt="<?=  htmlspecialchars($actor2['name_' . $lang]) ?>" rel="<?=  htmlspecialchars($actor2['text_' . $lang]) ?>"/></a>
								<div class="cast-description">
									<h1><?= $actor['name_' . $lang] ?></h1>
									<h1><?= $actor2['name_' . $lang] ?></h1>
									<h2><?= $actor['role_' . $lang] ?></h2>
									<h2><?= $actor2['role_' . $lang] ?></h2>
								</div>
							</div>
							<div class="single-type-two single-cell">
								<? $actor = get_content(39); ?>
								<a href="#"><img src="{base_url}image?file=<?= $actor['picture'] ?>&profile=actor_picture" alt="<?=  htmlspecialchars($actor['name_' . $lang]) ?>" rel="<?=  htmlspecialchars($actor['text_' . $lang]) ?>"/></a>
								<div class="cast-description">
									<h1><?= $actor['name_' . $lang] ?></h1>
									<h2><?= $actor['role_' . $lang] ?></h2>
								</div>
							</div>
							<div class="double-type-one single-cell">
								<? $actor = get_content(40); ?>
								<? $actor2 = get_content(41); ?>
								<a href="#"><img src="{base_url}image?file=<?= $actor['picture'] ?>&profile=actor_picture" alt="<?=  htmlspecialchars($actor['name_' . $lang]) ?>" rel="<?=  htmlspecialchars($actor['text_' . $lang]) ?>"/></a>
								<a href="#"><img src="{base_url}image?file=<?= $actor2['picture'] ?>&profile=actor_picture" alt="<?=  htmlspecialchars($actor2['name_' . $lang]) ?>" rel="<?=  htmlspecialchars($actor2['text_' . $lang]) ?>"/></a>
								<div class="cast-description">
									<h1><?= $actor['name_' . $lang] ?></h1>
									<h1><?= $actor2['name_' . $lang] ?></h1>
									<h2><?= $actor['role_' . $lang] ?></h2>
									<h2><?= $actor2['role_' . $lang] ?></h2>
								</div>
							</div>
						</div><!--/one-seventh-->
						<div class="one-seventh">
							<div class="single-type-two single-cell">
								<? $actor = get_content(45); ?>
								<a href="#"><img src="{base_url}image?file=<?= $actor['picture'] ?>&profile=actor_picture" alt="<?=  htmlspecialchars($actor['name_' . $lang]) ?>" rel="<?=  htmlspecialchars($actor['text_' . $lang]) ?>"/></a>
								<div class="cast-description">
									<h1><?= $actor['name_' . $lang] ?></h1>
									<h2><?= $actor['role_' . $lang] ?></h2>
								</div>
							</div>
							<div class="single-type-three single-cell">
								<? $actor = get_content(78); ?>
								<a href="#"><img src="{base_url}image?file=<?= $actor['picture'] ?>&profile=actor_picture" alt="<?=  htmlspecialchars($actor['name_' . $lang]) ?>" rel="<?=  htmlspecialchars($actor['text_' . $lang]) ?>"/></a>
								<div class="cast-description">
									<h1><?= $actor['name_' . $lang] ?></h1>
									<h2><?= $actor['role_' . $lang] ?></h2>
								</div>
							</div>
							<div class="single-type-one single-cell">
								<? $actor = get_content(52); ?>
								<a href="#"><img src="{base_url}image?file=<?= $actor['picture'] ?>&profile=actor_picture" alt="<?=  htmlspecialchars($actor['name_' . $lang]) ?>" rel="<?=  htmlspecialchars($actor['text_' . $lang]) ?>"/></a>
								<div class="cast-description">
									<h1><?= $actor['name_' . $lang] ?></h1>
									<h2><?= $actor['role_' . $lang] ?></h2>
								</div>
							</div>
							<div class="single-type-three single-cell">
								<? $actor = get_content(43); ?>
								<a href="#"><img src="{base_url}image?file=<?= $actor['picture'] ?>&profile=actor_picture" alt="<?=  htmlspecialchars($actor['name_' . $lang]) ?>" rel="<?=  htmlspecialchars($actor['text_' . $lang]) ?>"/></a>
								<div class="cast-description">
									<h1><?= $actor['name_' . $lang] ?></h1>
									<h2><?= $actor['role_' . $lang] ?></h2>
								</div>
							</div>
							<div class="double-type-one single-cell">
								<? $actor = get_content(77); ?>
								<? $actor2 = get_content(79); ?>
								<a href="#"><img src="{base_url}image?file=<?= $actor['picture'] ?>&profile=actor_picture" alt="<?=  htmlspecialchars($actor['name_' . $lang]) ?>" rel="<?=  htmlspecialchars($actor['text_' . $lang]) ?>"/></a>
								<a href="#"><img src="{base_url}image?file=<?= $actor2['picture'] ?>&profile=actor_picture" alt="<?=  htmlspecialchars($actor2['name_' . $lang]) ?>" rel="<?=  htmlspecialchars($actor2['text_' . $lang]) ?>"/></a>
								<div class="cast-description">
									<h1><?= $actor['name_' . $lang] ?></h1>
									<h1><?= $actor2['name_' . $lang] ?></h1>
									<h2><?= $actor['role_' . $lang] ?></h2>
									<h2><?= $actor2['role_' . $lang] ?></h2>
								</div>
							</div>
						</div><!--/one-seventh-->
						<div class="one-seventh">
							<div class="single-type-three single-cell">
								<? $actor = get_content(23); ?>
								<a href="#"><img src="{base_url}image?file=<?= $actor['picture'] ?>&profile=actor_picture" alt="<?=  htmlspecialchars($actor['name_' . $lang]) ?>" rel="<?=  htmlspecialchars($actor['text_' . $lang]) ?>"/></a>
								<div class="cast-description">
									<h1><?= $actor['name_' . $lang] ?></h1>
									<h2><?= $actor['role_' . $lang] ?></h2>
								</div>
							</div>
							<div class="single-type-one single-cell">
								<? $actor = get_content(57); ?>
								<a href="#"><img src="{base_url}image?file=<?= $actor['picture'] ?>&profile=actor_picture" alt="<?=  htmlspecialchars($actor['name_' . $lang]) ?>" rel="<?=  htmlspecialchars($actor['text_' . $lang]) ?>"/></a>
								<div class="cast-description">
									<h1><?= $actor['name_' . $lang] ?></h1>
									<h2><?= $actor['role_' . $lang] ?></h2>
								</div>
							</div>
							<div class="double-type-one single-cell">
								<? $actor = get_content(38); ?>
								<? $actor2 = get_content(48); ?>
								<a href="#"><img src="{base_url}image?file=<?= $actor['picture'] ?>&profile=actor_picture" alt="<?=  htmlspecialchars($actor['name_' . $lang]) ?>" rel="<?=  htmlspecialchars($actor['text_' . $lang]) ?>"/></a>
								<a href="#"><img src="{base_url}image?file=<?= $actor2['picture'] ?>&profile=actor_picture" alt="<?=  htmlspecialchars($actor2['name_' . $lang]) ?>" rel="<?=  htmlspecialchars($actor2['text_' . $lang]) ?>"/></a>
								<div class="cast-description">
									<h1><?= $actor['name_' . $lang] ?></h1>
									<h1><?= $actor2['name_' . $lang] ?></h1>
									<h2><?= $actor['role_' . $lang] ?></h2>
									<h2><?= $actor2['role_' . $lang] ?></h2>
								</div>
							</div>
						</div><!--/one-seventh-->
						<div class="one-seventh">
							<div class="single-type-one single-cell">
								<? $actor = get_content(35); ?>
								<a href="#"><img src="{base_url}image?file=<?= $actor['picture'] ?>&profile=actor_picture" alt="<?=  htmlspecialchars($actor['name_' . $lang]) ?>" rel="<?=  htmlspecialchars($actor['text_' . $lang]) ?>"/></a>
								<div class="cast-description">
									<h1><?= $actor['name_' . $lang] ?></h1>
									<h2><?= $actor['role_' . $lang] ?></h2>
								</div>
							</div>
							<div class="single-type-two single-cell">
								<? $actor = get_content(50); ?>
								<a href="#"><img src="{base_url}image?file=<?= $actor['picture'] ?>&profile=actor_picture" alt="<?=  htmlspecialchars($actor['name_' . $lang]) ?>" rel="<?=  htmlspecialchars($actor['text_' . $lang]) ?>"/></a>
								<div class="cast-description">
									<h1><?= $actor['name_' . $lang] ?></h1>
									<h2><?= $actor['role_' . $lang] ?></h2>
								</div>
							</div>
							<div class="single-type-three single-cell">
								<? $actor = get_content(51); ?>
								<a href="#"><img src="{base_url}image?file=<?= $actor['picture'] ?>&profile=actor_picture" alt="<?=  htmlspecialchars($actor['name_' . $lang]) ?>" rel="<?=  htmlspecialchars($actor['text_' . $lang]) ?>"/></a>
								<div class="cast-description">
									<h1><?= $actor['name_' . $lang] ?></h1>
									<h2><?= $actor['role_' . $lang] ?></h2>
								</div>
							</div>
							<div class="single-type-three single-cell">
								<? $actor = get_content(80); ?>
								<a href="#"><img src="{base_url}image?file=<?= $actor['picture'] ?>&profile=actor_picture" alt="<?=  htmlspecialchars($actor['name_' . $lang]) ?>" rel="<?=  htmlspecialchars($actor['text_' . $lang]) ?>"/></a>
								<div class="cast-description">
									<h1><?= $actor['name_' . $lang] ?></h1>
									<h2><?= $actor['role_' . $lang] ?></h2>
								</div>
							</div>
						</div><!--/one-seventh-->
						<div class="one-seventh">
							<div class="double-type-one single-cell">
								<? $actor = get_content(47); ?>
								<? $actor2 = get_content(53); ?>
								<a href="#"><img src="{base_url}image?file=<?= $actor['picture'] ?>&profile=actor_picture" alt="<?=  htmlspecialchars($actor['name_' . $lang]) ?>" rel="<?=  htmlspecialchars($actor['text_' . $lang]) ?>"/></a>
								<a href="#"><img src="{base_url}image?file=<?= $actor2['picture'] ?>&profile=actor_picture" alt="<?=  htmlspecialchars($actor2['name_' . $lang]) ?>" rel="<?=  htmlspecialchars($actor2['text_' . $lang]) ?>"/></a>
								<div class="cast-description">
									<h1><?= $actor['name_' . $lang] ?></h1>
									<h1><?= $actor2['name_' . $lang] ?></h1>
									<h2><?= $actor['role_' . $lang] ?></h2>
									<h2><?= $actor2['role_' . $lang] ?></h2>
								</div>
							</div>
							<div class="single-type-two single-cell">
								<? $actor = get_content(54); ?>
								<a href="#"><img src="{base_url}image?file=<?= $actor['picture'] ?>&profile=actor_picture" alt="<?=  htmlspecialchars($actor['name_' . $lang]) ?>" rel="<?=  htmlspecialchars($actor['text_' . $lang]) ?>"/></a>
								<div class="cast-description">
									<h1><?= $actor['name_' . $lang] ?></h1>
									<h2><?= $actor['role_' . $lang] ?></h2>
								</div>
							</div>
							<div class="double-type-one single-cell">
								<? $actor = get_content(55); ?>
								<? $actor2 = get_content(56); ?>
								<a href="#"><img src="{base_url}image?file=<?= $actor['picture'] ?>&profile=actor_picture" alt="<?=  htmlspecialchars($actor['name_' . $lang]) ?>" rel="<?=  htmlspecialchars($actor['text_' . $lang]) ?>"/></a>
								<a href="#"><img src="{base_url}image?file=<?= $actor2['picture'] ?>&profile=actor_picture" alt="<?=  htmlspecialchars($actor2['name_' . $lang]) ?>" rel="<?=  htmlspecialchars($actor2['text_' . $lang]) ?>"/></a>
								<div class="cast-description">
									<h1><?= $actor['name_' . $lang] ?></h1>
									<h1><?= $actor2['name_' . $lang] ?></h1>
									<h2><?= $actor['role_' . $lang] ?></h2>
									<h2><?= $actor2['role_' . $lang] ?></h2>
								</div>
							</div>
						</div><!--/one-seventh-->
						<div class="one-seventh">
							<div class="single-type-one single-cell">
								<? $actor = get_content(46); ?>
								<a href="#"><img src="{base_url}image?file=<?= $actor['picture'] ?>&profile=actor_picture" alt="<?=  htmlspecialchars($actor['name_' . $lang]) ?>" rel="<?=  htmlspecialchars($actor['text_' . $lang]) ?>"/></a>
								<div class="cast-description">
									<h1><?= $actor['name_' . $lang] ?></h1>
									<h2><?= $actor['role_' . $lang] ?></h2>
								</div>
							</div>
							<div class="single-type-two single-cell">
								<? $actor = get_content(63); ?>
								<a href="#"><img src="{base_url}image?file=<?= $actor['picture'] ?>&profile=actor_picture" alt="<?=  htmlspecialchars($actor['name_' . $lang]) ?>" rel="<?=  htmlspecialchars($actor['text_' . $lang]) ?>"/></a>
								<div class="cast-description">
									<h1><?= $actor['name_' . $lang] ?></h1>
									<h2><?= $actor['role_' . $lang] ?></h2>
								</div>
							</div>
							<div class="single-type-three single-cell">
								<? $actor = get_content(64); ?>
								<a href="#"><img src="{base_url}image?file=<?= $actor['picture'] ?>&profile=actor_picture" alt="<?=  htmlspecialchars($actor['name_' . $lang]) ?>" rel="<?=  htmlspecialchars($actor['text_' . $lang]) ?>"/></a>
								<div class="cast-description">
									<h1><?= $actor['name_' . $lang] ?></h1>
									<h2><?= $actor['role_' . $lang] ?></h2>
								</div>
							</div>
							<div class="double-type-one single-cell">
								<? $actor = get_content(81); ?>
								<? $actor2 = get_content(82); ?>
								<a href="#"><img src="{base_url}image?file=<?= $actor['picture'] ?>&profile=actor_picture" alt="<?=  htmlspecialchars($actor['name_' . $lang]) ?>" rel="<?=  htmlspecialchars($actor['text_' . $lang]) ?>"/></a>
								<a href="#"><img src="{base_url}image?file=<?= $actor2['picture'] ?>&profile=actor_picture" alt="<?=  htmlspecialchars($actor2['name_' . $lang]) ?>" rel="<?=  htmlspecialchars($actor2['text_' . $lang]) ?>"/></a>
								<div class="cast-description">
									<h1><?= $actor['name_' . $lang] ?></h1>
									<h1><?= $actor2['name_' . $lang] ?></h1>
									<h2><?= $actor['role_' . $lang] ?></h2>
									<h2><?= $actor2['role_' . $lang] ?></h2>
								</div>
							</div>
						</div><!--/one-seventh-->
					</div><!--actors-->
					
				</div>
				
		
				<span class="slideno">MEMPHIS</span>
				<a class="button" data-slide="5" title=""></a>
		
			</div><!--End Slide 4-->
			
			<div class="slide" id="slide5" data-slide="5" data-stellar-background-ratio="0">				
				<div class="wrapper">	
					<div class="photos">
						<ul class="clearfix" id="the-list-of-thumbs">	
							<?= render_content_list('news_pictures', '<li><a title="{title_' . $lang . '}" href="{base_url}image?file={picture}&profile=large"><img src="{base_url}image?file={picture}&profile=news_picture"/></a></li>', '', array(), 'c.order_num ASC'); ?>
						</ul>
						<div class="pagination clearfix">
							
						</div>
						<div class="left-arrow"><!----></div>
						<div class="right-arrow"><!----></div>
					</div><!--/photos-->
					<div class="news_feed clearfix">
						<div class="news_right">
							<h1><?=lang("news feed") ?></h1>
							<ul id="news_feed_list">								
								<?= render_content_list('news', '<li><strong>{date:date@d.m}</strong><a href="{content_url}">{title_' . $lang . '}</a></li>', '', array(), 'c.date DESC', '0, 6'); ?>
							</ul>	
						</div><!--/right-->
						<div class="news_left" id="single-news-exchange">
							<h1><!----></h1>
							<div class="image-container">
								<span class="mask"><!----></span>
								<img src="" alt=""/>
							</div>
							<div class="news-txt"><!-----></div>
						</div>
					</div><!--/news feed-->			
				</div>		
				<span class="slideno">MEMPHIS</span>
				<a class="button" data-slide="6" title=""></a>
		
			</div><!--End Slide 5-->
			
			
			<div class="slide" id="slide6" data-slide="6" data-stellar-background-ratio="0">				
				<div class="wrapper clearfix">		
					<h1><?=lang("who created this") ?></h1>
					<div class="organizors_team">
						<div class="heading">
							<h2><?=lang("organ") ?></h2>
						</div>
						<div id="one" class="snippets">
							<? $crew = get_content(60); ?>
							<img src="{base_url}image?file=<?= $crew['picture'] ?>&profile=crew_picture" alt="<?= $crew['name_' . $lang] ?>" />
							<h3><?= $crew['name_' . $lang] ?></h3>
							<h4><?= $crew['task_' . $lang] ?></h4>
							<p><?= $crew['text_' . $lang] ?></p>
						</div>
						<div id="two" class="snippets">
							<? $crew = get_content(61); ?>
							<img src="{base_url}image?file=<?= $crew['picture'] ?>&profile=crew_picture" alt="<?= $crew['name_' . $lang] ?>" />
							<h3><?= $crew['name_' . $lang] ?></h3>
							<h4><?= $crew['task_' . $lang] ?></h4>
							<p><?= $crew['text_' . $lang] ?></p>
						</div>
						<div id="three" class="snippets">
							<? $crew = get_content(62); ?>
							<img src="{base_url}image?file=<?= $crew['picture'] ?>&profile=crew_picture" alt="<?= $crew['name_' . $lang] ?>" />
							<h3><?= $crew['name_' . $lang] ?></h3>
							<h4><?= $crew['task_' . $lang] ?></h4>
							<p><?= $crew['text_' . $lang] ?></p>
						</div>
						<div id="four" class="snippets">
							<div class="one">
								<? $crew = get_content(65); ?>
							<img src="{base_url}image?file=<?= $crew['picture'] ?>&profile=crew_picture" alt="<?= $crew['name_' . $lang] ?>" />
							<h3><?= $crew['name_' . $lang] ?></h3>
							<h4><?= $crew['task_' . $lang] ?></h4>		
							</div>
							<div class="two">
								<? $crew = get_content(66); ?>
							<img src="{base_url}image?file=<?= $crew['picture'] ?>&profile=crew_picture" alt="<?= $crew['name_' . $lang] ?>" />
							<h3><?= $crew['name_' . $lang] ?></h3>
							<h4><?= $crew['task_' . $lang] ?></h4>		
							</div>
							<div class="three">
								<? $crew = get_content(67); ?>
							<img src="{base_url}image?file=<?= $crew['picture'] ?>&profile=crew_picture" alt="<?= $crew['name_' . $lang] ?>" />
							<h3><?= $crew['name_' . $lang] ?></h3>
							<h4><?= $crew['task_' . $lang] ?></h4>	
							</div>							
						</div>
					</div>	
					<div class="creative_crew">
						<div class="heading">
							<h2><?=lang("creative") ?></h2>
						</div>
						<ul class="creative-members">
							<div id="tetris"><!----></div>
							
							<?= render_content_list('crew_creative', '<li>
								<span>
									<img src="{base_url}image?file={picture}&profile=crew_picture" alt="{name_' . $lang . '}"/>
								</span>
								<h3>{name_' . $lang . '}</h3>
								<h4>{task_' . $lang . '}</h4>
								<div class="cb"><!-----></div>
							</li>', '', array(), 'c.order_num ASC');
 ?>
						</ul>
					</div>	
				</div>		
			</div><!--End Slide 6-->
		</body>
	</html>