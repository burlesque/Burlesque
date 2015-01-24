
    <ul class='bxslider'>
        <?php foreach($slide_pictures as $slide): ?>
            <li>
                <? $url = ($slide['link'] !== '') ? '/' . $slide['link'] . '/' . $lang : ''?>
                <a <?if ($slide['link'] === 'trailer')
                        echo "class='trailer' href='http://www.youtube.com/watch?v=KMeqU7VLwOQ'";
                    else
                        echo 'href='.$url?> >


                <div class='slide_picture'>

                    <div class='slide_picture_text'>
                        <p>
                            <?=($slide['name_'.$lang] )?>
                        </p>
                    </div>

                    <img src=<?= $slide['picture'] ?>  >
                </div>

                </a>
            </li>
        <?php endforeach; ?>

<!--        <li>-->
<!--            <div class="slide_picture" style="background-color: black; float:none">-->
<!--                <div class='slide_picture_text'>-->
<!--                    <p>-->
<!--                        --><?//= ($lang === 'bg' ) ? 'Трейлър' : 'Trailer'?>
<!--                    </p>-->
<!--                </div>-->
<!---->
<!--                <iframe style="margin:auto" width="569" height="320" src="//www.youtube.com/embed/KMeqU7VLwOQ" frameborder="0" allowfullscreen></iframe>-->
<!---->
<!--            </div>-->
<!--        </li>-->

    </ul>


<script>
    $(document).ready(function(){
        $('.bxslider').bxSlider({
            pager: true,
            adaptiveHeight: false,
            autoStart: true,
            auto: true,
            controls: false,
            autoHover: true
        });
        $('.trailer').click(function(e){
            e.preventDefault();
        })


        $('.trailer').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,

            fixedContentPos: false
        });

    });
</script>