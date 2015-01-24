<div class='date_tile'>

    <div class='text'>
        <div class='city'>
          <p>  <?= $date["city_$lang"]?></p>
        </div>


        <div class='date'>
           <p>  <?= $date['show_date']?></p>
        </div>
    </div>
    <a target="_new" href="<?=$date['boxoffice_link']?>">
        <div class="buy_ticket_button <?if (isset($date['boxoffice_link'])) echo 'active'?>">
            <?= lang('tickets')?>
        </div>
    </a>
</div>