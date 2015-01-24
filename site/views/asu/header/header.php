<div id='header'>

    <div id='language_bar_top_container'>
        <? get_instance()->load->view('asu/header/language/language_top', array('lang'=>$lang)) ?>
    </div>

    <div id="in_development_container">
        <? $this->load->view('asu/header/in_development/in_development')?>
    </div>

    <div id='logo_container'>
        <? get_instance()->load->view('asu/header/logo/logo', array('lang'=>$lang)) ?>
    </div>

    <div id='menu_wrapper'>
        <? get_instance()->load->view('asu/header/menu/menu', array('lang'=>$lang)) ?>
    </div>

</div>
