<? $page = get_instance()->data_model->get_page('tour');?>


<div id='page_main_image'>
    <?= get_instance()->load->view('asu/partial/google_map/map', array('lang'=>$lang)) ?>
</div>

<div id='tour_container'>
   <? include 'dates_big.php'?>

</div>