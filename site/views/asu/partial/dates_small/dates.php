
<? $dates = get_instance()->data_model->get_asu_tour_dates();
   $previous = $dates[0]['city_en'];
?>
<div id='dates_small_container'>

    <? foreach ($dates as $date):?>
        <? if ($date['city_en'] != $previous ):
            $previous = $date['city_en'];
            ?>
            <div class="date_separator"></div>
        <?endif;?>
        <?= get_instance()->load->view('asu/partial/dates_small/tile',array('date'=> $date)) ?>


    <? endforeach?>

</div>