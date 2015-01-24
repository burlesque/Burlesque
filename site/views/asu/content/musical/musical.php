<script src="/allshookup/js/fancybox/source/jquery.fancybox.pack.js"></script>
<link type="text/css" rel="stylesheet" href="/allshookup/js/fancybox/source/jquery.fancybox.css">
<link rel="stylesheet" href="/allshookup/js/fancybox/source/helpers/jquery.fancybox-thumbs.css" type="text/css" media="screen" />
<script type="text/javascript" src="/allshookup/js/fancybox/source/helpers/jquery.fancybox-thumbs.js"></script>

<?
    $images=get_instance()->data_model->get_musical_pictures($musical['link']);
?>

<div id='musical_content_container'>

    <div id="left_content">
        <div id='musical_poster'>
            <img src=<?=$musical['poster']?>>
        </div>


    </div>
    <!--    TEXT  -->
    <div id='musical_about'>

        <div id='musical_about_text'>
            <?= $musical['text_' . $lang]?>
        </div>

    </div>
</div>
<? if (count($images)): ?>
    <div class="fancybox_container">
        <?foreach($images as $image):?>
            <div class="picture_container">
                <a class="images" rel="group1" href="<?= $image['picture']?>"><img src="<?= $image['picture']?>" alt=""/></a>
            </div>
        <?endforeach;?>
    </div>
<? endif;?>

<div id='musical_timeline'>
    <? include ('timeline/timeline.php')?>
</div>

<script>

    $(document).ready(function() {
        $(".images").fancybox();
    });
</script>