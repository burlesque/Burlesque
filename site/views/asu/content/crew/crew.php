
<script type="text/javascript" src="/allshookup/js/pikachoose/lib/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="/allshookup/js/pikachoose/lib/jquery.pikachoose.js"></script>

<style>


    @media screen and (max-width: 960px){

        #content_wrapper{
          background-color: #172240;
        }
        #container_title{
            color:white;
        }
    }

    #content_wrapper{
        background: 0;
    }
</style>
<?
    $everybody = array('actors', 'dancers', 'vocals', 'creative_team', 'organizers');
?>
<div id="crew_container">
    <div id="crew_menu">
        <ul>
            <?foreach($everybody as $group_type):?>
                <a href="/crew/<?= $group_type?>/<?= $lang?>">
                <li class="<?if ( $current_group === $group_type) echo 'active'?> <?if (strlen($group_type)>9) echo 'long'?>">
                       <?=lang($group_type)?>
                </li></a>

            <? endforeach;?>
        </ul>
    </div>

    <div id="group_type">
        <?=lang($current_group)?>
    </div>

    <ul id="pikame" class="group_gallery">

        <? foreach($group as $member): ?>
            <li>
                <?= $member['name_'.$lang]?>
                <img src="<?=$member['picture']?>" >

                <div class="crew_details" style="display: none">
                    <div class='name'>
                        <?= $member['name_'.$lang]?>
                    </div>
                    <div class="position">
                        <?= $member['task_'.$lang]?>
                    </div>
                    <div class="quote">
                        <?= $member['text_'.$lang]?>
                    </div>
                </div>
            </li>
        <? endforeach; ?>
    </ul>


</div>
<script>

    $(document).bind("mobileinit", function () {
        $.mobile.ajaxEnabled = false;
    });
    $(function(){
        $('#pikame').pikachoose();
        $('#pikame').data('pikachoose').GoTo(0);
    });
</script>
<script type="text/javascript" src="/allshookup/js/jquery.mobile-1.4.0.min.js"></script>