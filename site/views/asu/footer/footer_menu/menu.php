<?
    $menu_items = $this->data_model->get_footer_menu();
    $uri = get_instance()->uri->segment_array()[1];

?>





<ul id="footer_menu">

    <? foreach ($menu_items as $menu): ?>
        <li class="<?= (strpos($menu['resource'],$uri) !== false ) ? 'active_footer_menu' : ''?>">
            <a href="/<?= $menu['resource'] . '/' . $lang ?>"  >
                <?= $menu['text_'.$lang]?>
            </a>
        </li>
    <? endforeach?>
</ul>