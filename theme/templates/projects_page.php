<div id="stage">
	<div class="wrapper">
		<div id="stage_holder" class="mini">			
			<div id="top" class="mini">
				<h1>Проект</h1>
				<h2>бла бла 2</h2>	
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
	<h1 class="page-title">{page_title}</h1>
	<script type="text/javascript">
    $(function() {
        $('.project-gallery a').lightBox({
        	imageLoading: '{base_url}libraries/lightbox/images/lightbox-ico-loading.gif',
			imageBtnClose: '{base_url}libraries/lightbox/images/lightbox-btn-close-{lang}.gif',
			imageBtnPrev: '{base_url}libraries/lightbox/images/lightbox-btn-prev-{lang}.gif',
			imageBtnNext: '{base_url}libraries/lightbox/images/lightbox-btn-next-{lang}.gif',
			txtImage: '<? echo(lang('image')); ?>',
			txtOf: '<? echo(lang('of')); ?>'
        });
    });
    </script>
	
	
	<div class="project-gallery fl" style="width:560px;">
	
	<div class="frame fl" style="margin:0px 12px 12px 0px">
		<a title="{title_<?=$lang ?>}" href="{base_url}image?file={picture}&profile=large"><img title="{title_<?=$lang ?>}" width="244" height="145" src="{base_url}image?file={picture}&profile=big_thumb" alt="{title_<?=$lang ?>}" /></a>
	</div>	
		
	{if image1}	
	<div class="frame fl" style="margin:0px 12px 12px 0px">
		<a title="{title_<?=$lang ?>}" href="{base_url}image?file={image1}&profile=large"><img width="244" height="145" src="{base_url}image?file={image1}&profile=big_thumb" alt="{title_<?=$lang ?>}" /></a>
	</div>
	{else}
	<div class="frame fl" style="margin:0px 12px 12px 0px">
		<div style="width:244px;height:145px;background-color: #f1f1f1"></div>
	</div>
	{/if}
	{if image2}	
	<div class="frame fl" style="margin:0px 12px 12px 0px">
		<a title="{title_<?=$lang ?>}" href="{base_url}image?file={image2}&profile=large"><img width="244" height="145" src="{base_url}image?file={image2}&profile=big_thumb" alt="{title_<?=$lang ?>}" /></a>
	</div>
	{else}
	<div class="frame fl" style="margin:0px 12px 12px 0px">
		<div style="width:244px;height:145px;background-color: #f1f1f1"></div>
	</div>
	{/if}
	{if image3}	
	<div class="frame fl" style="margin:0px 12px 12px 0px">
		<a title="{title_<?=$lang ?>}" href="{base_url}image?file={image3}&profile=large"><img width="244" height="145" src="{base_url}image?file={image3}&profile=big_thumb" alt="{title_<?=$lang ?>}" /></a>
	</div>
	{else}
	<div class="frame fl" style="margin:0px 12px 12px 0px">
		<div style="width:244px;height:145px;background-color: #f1f1f1"></div>
	</div>
	{/if}
	<div class="cb"></div>
	</div>
	<div>
	{text_<?=$lang ?>}
	<ul style="margin-top:22px;" class="list">
		<li>{project_type}</li>
	</ul>
	</div>
	<div style="margin-bottom:20px;" class="cb"></div>
</div>