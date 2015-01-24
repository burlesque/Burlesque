<?
    $sponsors_array = array(['general_sponsor', 'Генерален спонсор'],['partners', 'Партньори'],['haircuts', 'Прически'],['costumes', 'Костюми'],['logistics', 'Логистика'], ['ticket_centers', ' Билетни центрове']);?>
<? $sponsors = get_instance()->data_model->get_content_of_type('sponsors');?>
<div id="sponsors_wrapper">
    <div id="sponsors_container">

        <? foreach ($sponsors_array as $category_key=>$category_value):?>
            <div class="sponsor_category_container">
                <div class="sponsor_category">
                    <?= lang($category_key)?>
                </div>
                <?foreach ($sponsors as $sponsor):?>
                    <?if ($sponsor['category'] == $category) : ?>
                        <div class="sponsor">
                            <a href="<?= $sponsor['link']?>">
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