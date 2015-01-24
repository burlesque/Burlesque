<div id="stage">
	<div class="wrapper">
		<div id="stage_holder" class="mini">			
			<div id="top" class="mini">
				<h1>Проекти</h1>
				<h2>бла бла</h2>	
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


<div class="wrapper">
	<h1 class="page-title fl">{page_title}</h1>
	<div class="combobox-container fr">
		<ul class="custom_select">
			<li><a href="#">Категории</a></li>
			<div class="list">
				<div class="top"><!----></div>
				<ul>
					<li>
						<a href="<?=add_url_parameter($_SERVER['REQUEST_URI'],'type','replication') ?>" title="Виж повече за &quot;Replication&quot;">
							Replication
						</a>
					</li>
					<li>
						<a href="<?=add_url_parameter($_SERVER['REQUEST_URI'],'type','multimedia') ?>" title="Виж повече за &quot;Multimedia&quot;">
							Multimedia						
						</a>
					</li>
					<li>
						<a href="<?=add_url_parameter($_SERVER['REQUEST_URI'],'type','web') ?>" title="Виж повече за &quot;Web&quot;">
							Web
						</a>
					</li>
					<li>
						<a href="<?=add_url_parameter($_SERVER['REQUEST_URI'],'type','other') ?>" title="Виж повече за &quot;Other&quot;">
							Other
						</a>
					</li>
				</ul>
				<div class="bottom"><!----></div>
		</div>
		</ul>
	</div>
	<div class="cb"><!----></div>
<? 
$type = $this -> input -> get('type', TRUE);
$where = array();
if($type){
	$where = array(array('project_type', '=', $type));
}

$page = $this -> input -> get('page', TRUE);
if(!$page){
	$page = 1;
}
$items_per_page = 12;
$limit = get_limit_from_pagination($page, $items_per_page);

$pagination_html = '<ul class="pagination">'.render_pagination('projects', '<li class="page {class}"><a href="'.add_url_parameter($_SERVER['REQUEST_URI'],'page','').'{page}">{view}</a></li>', '', $where, $items_per_page, $page, true).'</ul>';

echo($pagination_html);
?>
<div>
<?
echo(render_content_list('projects', '<div class="fl project">
					<h2 class="title2"><a href="{content_url}">{title_'.$lang.'}</a></h2>
					<div class="frame">
						<a href="{content_url}"><img width="244" height="145" src="{base_url}image?file={picture}&profile=big_thumb" alt="{title_'.$lang.'}" /></a>
					</div>
					<ul class="list">
						<li>{project_type}</li>
					</ul>
					<p class="plain-text s14">{text_'.$lang.':strip_tags:wlimit@16}</p>
				</div>', '', $where, 'c.date DESC', $limit)); ?>	
	<div class="cb"></div>
	</div>
	<? echo($pagination_html); ?>
	
</div>
