<?
    $second_tab = get_instance()->data_model->get_page('middletab');
    $see_more = ($lang === 'bg')? '<a href="/about_allshookup/bg">Виж още..</a>' : '<a href="/about_allshookup/en">See more..</a>' ;

    $tiles = array();

    $tiles[] = array('title'=>lang('dates'),
   'text' => get_instance()->load->view('asu/partial/dates_small/dates',null,TRUE),
        'class' => '', 'icon'=>'calendar' );

    $tiles[] = array('title'=>$second_tab["name_$lang"],
        'text' => $second_tab["text_$lang"] . $see_more ,
        'class' => '', 'icon'=>'star' );

    $tiles[] = array('title'=>'',
    'text' =>  get_instance()->load->view('asu/partial/facebook/facebook_box',null,TRUE),
        'class'=> 'facebook_activity_background');
?>

    <div id='icon_menu_container'>

        <div id='icon_menu_centered'>
            <? foreach($tiles as $tile): ?>

                <div class='icon_menu_tile <?= $tile['class']?>'>

                    <div class='icon_menu_info'>
                        <? if ($tile['title'] !==''): ?>
                            <div class='icon_menu_tile_title'>
                                <?= $tile['title'] ?>
                            </div>
                        <? endif; ?>

                        <div class='icon_menu_tile_text'>
                            <? echo $tile['text'] ?>
                        </div>
                    </div>
                </div>
            <? endforeach; ?>
        </div>

    </div>

