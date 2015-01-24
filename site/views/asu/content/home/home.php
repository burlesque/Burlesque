

<div id='slider_wrapper'>
    <?= get_instance()->load->view('asu/content/home/slider/slider') ?>
</div>

<?= get_instance()->load->view('asu/partial/sponsors/sponsors') ?>
<hr>
<div id='icon_menu_wrapper'>
    <?= get_instance()->load->view('asu/content/home/icons_menu/menu')?>
</div>


<script>
    window.onload=function(){

        $.when($('#bg_light').fadeIn(1500));
    };
</script>
