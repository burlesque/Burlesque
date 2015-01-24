
<ul id='timeline'>

    <? foreach($musicals as $year_and_musical): ?>
        <? $url = "/musical/". $year_and_musical['link'] . '/' . $lang;
        $current_page = !(strpos($url,$_SERVER["REQUEST_URI"]) === false );?>
        <li class= <?= $current_page ?  'current_page_li' : ''; ?> >

            <a href=<?= $url?> class=<?=  $current_page ?  'current_page_a disabled' : ''; ?>>
                <?= $year_and_musical['year']?> <?= $year_and_musical['name_'.$lang]?>
            </a>
        </li>
    <? endforeach; ?>
</ul>
