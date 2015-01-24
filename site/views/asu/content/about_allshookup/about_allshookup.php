<?$page = get_instance()->data_model->get_page('about_allshookup');?>


<? if (isset($page['picture'])):?>
<div id='page_main_image'>
    <img src=<?= $page['picture']?> >
</div>
<? endif;?>

<div id='about_allshookup'>
    <?= $page["text_$lang"] ?>
</div>