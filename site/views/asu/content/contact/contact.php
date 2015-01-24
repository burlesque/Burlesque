<div id='page_main_image'>
    <img src=<?= $page['picture']?> >
</div>

<div id='main_content'>
    <br>
    <div id='contact_us_text'>
        <p><?= $page['text_'.$lang] ?> </p>
    </div>
</div>

<div id='right_sidebar'>
    <?= get_instance()->load->view('asu/partial/facebook/facebook_box')?>

</div>