<? $dates = get_instance()->data_model->get_asu_tour_map_dates();

?>


<div id="tour_dates_big">
    <?foreach ($dates as $tour_date):

            outputBox($tour_date['city_'.$lang],
                $tour_date['theater_'.$lang],
                $tour_date['show_dates_'.$lang],
                $tour_date['boxoffice_link']
            );

      endforeach;?>
</div>



<?
    function outputBox($city,$theater,$date,$link){
     ?>
        <div class="tour_date_container">
            <div class="tour_date_info">

                <div class="location">
                    <div class="city">
                       <h4> <?=$city?> </h4>
                    </div>
                    <div class="theater">
                        <?=$theater?>
                    </div>
                </div>

                <div class="time">
                    <div class="date">
                        <?=$date?>
                    </div>
                    <div class="hour">

                    </div>
                </div>

            </div>
            <a href="<?=$link?>" target="_blank">
                <div class="tour_dates_big_button">
                    <?= lang('tickets')?>
                </div>
            </a>
        </div>

  <?  }
?>