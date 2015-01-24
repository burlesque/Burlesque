<div id='main_menu'>
    <ul id='main_menu_list'>
<?
        $menu_items = $this->data_model->get_main_menu();
        $uri = get_instance()->uri->segment_array()[1];

?>



      <? foreach ($menu_items as $menu): ?>
            <li class="<?= (strpos($menu['resource'],$uri) !== false ) ? 'active_menu' : ''?>">
                <a href="/<?= $menu['resource'] . '/' . $lang ?>"  >
                    <?= $menu['text_'.$lang]?>
                </a>
            </li>
      <? endforeach?>

    </ul>
</div>