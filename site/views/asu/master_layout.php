<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<head>
    <title><? if (isset($title)) echo $title?></title>
    <? get_instance()->load->view('asu/include/include') ?>
</head>

<body><div id='wrapper_gradient'>

    <div id='page_960'>

        <div id='bg_light' <?= isset($fade_in_lights) ? 'style="display:none"':''?>>
            <img src="/allshookup/images/bg_light.png">
        </div>


        <!--    HEADER-->
        <div id='header_wrapper'>
            <? get_instance()->load->view('asu/header/header', array('lang'=>$lang))?>
        </div>


        <!--    CONTENT-->
        <div id='content_wrapper'>
            <? include 'include/container_title.php' ?>

            <div id='content_container'>
                <?= $content; ?>
            </div>

        </div>


        <!--    FOOTER-->
        <div id='footer_wrapper'>
            <? get_instance()->load->view('asu/footer/footer',array('lang'=>$lang))?>
        </div>

    </div>

</div></body>
</html>