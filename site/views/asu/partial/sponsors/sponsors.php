<?
    $sponsors_array = array('general_sponsor'=> 'Генерален спонсор','partners'=> 'Партньори','haircuts'=> 'Прически','costumes'=> 'Костюми','logistics' => 'Логистика', 'ticket_centers'=>' Билетни центрове');?>
<? $sponsors = get_instance()->data_model->get_content_of_type('sponsors');?>
<div id="sponsors_wrapper">
    <div id="sponsors_container">

        <? foreach (array_keys($sponsors_array) as $category_key):?>
            <div class="sponsor_category_container">
                <div class="sponsor_category <?=$category_key?>">
                    <?= lang($category_key)?>
                </div>
                <?foreach ($sponsors as $sponsor):?>
                    <?if ($sponsor['category'] == $category_key) : ?>
                        <div class="sponsor">
                            <a href="<?= $sponsor['link']?>" target="_blank">
                                <div class="img">
                                    <img src="<?=$sponsor['picture']?>">
                                </div>
                            </a>
                        </div>
                    <?endif;?>
                <?endforeach;?>
            </div>
        <?endforeach;?>
    </div>
</div>