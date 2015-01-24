<? $homepage = get_content(115); ?>

<div id="stage">
	<div class="wrapper">
		<div id="stage_holder">
			
			<div id="top">
				<div class="navigation">
					<div id="prev"><!--o--></div>
					<div id="next"><!--o--></div>
					<div id="info_holder">
					</div>
				</div>			
			</div>
			
			<div id="bottom">
				<ul id="carousel">
					<? echo(render_content_list('frontpage_slider', '<li>
						<img src="{base_url}image?file={image}&profile=slider_image" alt="{line1_'.$lang.'}" />
						<div class="info">
							<h1>{line1_'.$lang.'}</h1><br>
							<h2>{line2_'.$lang.'}</h2><br>
							<p>{line3_'.$lang.'}</p>
						</div>
					</li>', '', array(), 'c.order_num ASC')); ?>
				</ul>
			</div>
		</div>
	</div>
</div>

<div id="three_steps">
	<div class="wrapper">
		<ul>
			<li>
				<span class="icon_holder presentation"><!--o--></span>
				<div class="txt">
					<h3><? echo($homepage['up_left_title_'.$lang]); ?></h3>
					<p><? echo($homepage['up_left_text_'.$lang]); ?></p>
				</div>
			</li>
			<li>
				<span class="icon_holder disc"><!--o--></span>
				<div class="txt">
					<h3><? echo($homepage['up_middle_title_'.$lang]); ?></h3>
					<p><? echo($homepage['up_middle_text_'.$lang]); ?></p>
				</div>
			</li>
			<li class="last_item">
				<span class="icon_holder pack"><!--o--></span>
				<div class="txt">
					<h3><? echo($homepage['up_right_title_'.$lang]); ?></h3>
					<p><? echo($homepage['up_right_text_'.$lang]); ?></p>
				</div>
			</li>
		</ul>
	</div>
</div>

<div id="main_articles">
	<div class="wrapper">
		<div class="three_articles">
			<div class="one-third-col">
				<h1><? echo(lang('news')); ?></h1>
				<? echo(render_content_list('news', '<div class="single_article">
					<h2>{title_'.$lang.'}</h2>
					<div class="date">{date}</div>
					<div class="plain-text">{text_'.$lang.':strip_tags:wlimit@32}</div>
					<p class="more"><a href="{content_url}">'.lang('more').'</a></p>
				</div>', '<div class="separator"><!--o--></div>', array(), 'c.date DESC', '0, 2')); ?>

			</div>
			<div class="one-third-col">
				<h1><? echo(lang('about us')); ?></h1>
				<div class="single_article">
					<h2><? echo($homepage['title_'.$lang]); ?></h2><div class="plain-text"><? echo($homepage['text_'.$lang]); ?></div>
					<blockquote><div class="plain-text"><? echo($homepage['quote_'.$lang]); ?></div></blockquote>
				</div>
			</div>
			<div class="one-third-col">
				<h1><? echo(lang('our clients')); ?></h1>
				<div class="single_article">
					<? echo(render_content_list('frontpage_clients', '<div class="frontpage_our_client">
					<img border="0" src="{base_url}image?file={image}&profile=client_logo" />
				</div>', '', array(), 'c.order_num ASC', '0, 6')); ?>
				
					<p class="more cb"><a href="#"><? echo(lang('full portfolio')); ?></a></p>
				</div>
				<br>
				<h1><? echo(lang('calculator')); ?></h1>
				<div class="single_article">
					<div id="calculator">
						<span class="calc_icon"><!--o--></span>
						<a href="#"><span class="arrow_icon"><!--o--></span></a>
						<div><? echo(lang('get your price')); ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	

<div id="main_projects">
	<div class="wrapper">
		<div class="three_projects">
			<div class="one-third-col">
				<div class="single_project">
					<? echo(render_content(substr($homepage['product_left'],2), '<h2 class="title2">{title_'.$lang.'}</h2>
					<div class="frame">
						<a href="{content_url}"><img width="244" height="145" src="{base_url}image?file={picture}&profile=big_thumb" alt="{title_'.$lang.'}" /></a>
					</div>
					<ul class="list">
						<li>{project_type}</li>
					</ul>
					<p>{text_'.$lang.':strip_tags:wlimit@16}</p>
					<p class="btn"><a href="{content_url}">
						<span class="left"><!--o--></span>
						<span class="mid">'.lang('more').'</span>
						<span class="right"><!--o--></span>
					</a></p>')); ?>
				</div>
			</div>
			<div class="one-third-col">
				<div class="rounding-shadow"><!--o--></div>
				<div class="featured_project">
					<h1>Избран проект</h1>
					<? echo(render_content(substr($homepage['product_middle'],2), '<h2 class="title2">{title_'.$lang.'}</h2>
					<div class="frame">
						<a href="{content_url}"><img width="244" height="145" src="{base_url}image?file={picture}&profile=big_thumb" alt="{title_'.$lang.'}" /></a>
					</div>
					<ul class="list">
						<li>{project_type}</li>
					</ul>
					<p>{text_'.$lang.':strip_tags:wlimit@16}</p>
					<p class="btn"><a href="{content_url}">
						<span class="left"><!--o--></span>
						<span class="mid">'.lang('more').'</span>
						<span class="right"><!--o--></span>
					</a></p>')); ?>
					<div class="bottom-shadow"><!--o--></div>
				</div>
			</div>
			<div class="one-third-col">
				<div class="single_project">
					<? echo(render_content(substr($homepage['product_right'],2), '<h2 class="title2">{title_'.$lang.'}</h2>
					<div class="frame">
						<a href="{content_url}"><img width="244" height="145" src="{base_url}image?file={picture}&profile=big_thumb" alt="{title_'.$lang.'}" /></a>
					</div>
					<ul class="list">
						<li>{project_type}</li>
					</ul>
					<p>{text_'.$lang.':strip_tags:wlimit@16}</p>
					<p class="btn"><a href="{content_url}">
						<span class="left"><!--o--></span>
						<span class="mid">'.lang('more').'</span>
						<span class="right"><!--o--></span>
					</a></p>')); ?>
				</div>
			</div>
		</div>
	</div>
</div>