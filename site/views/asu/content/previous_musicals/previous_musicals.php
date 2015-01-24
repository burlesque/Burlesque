


<div id='previous_musicals_container'>
    <? foreach($musicals as $musical):  ?>
        <?= get_instance()->load->view('asu/content/previous_musicals/tile', array('musical'=>$musical, 'lang'=>$lang))?>
    <? endforeach;?>
</div>