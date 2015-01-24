<?
    if ($lang === 'bg') {
        $new_lang = 'en';
        $text = 'English';
    }
    else if ($lang === 'en'){
        $new_lang = 'bg';
        $text = 'Български';
    }
    $array = get_instance()->uri->segment_array();
    $length = get_instance()->uri->total_segments();
    $array[$length] = $new_lang;
    $new_link ='';
    for($i=1; $i <= $length; $i++){
        $new_link .= '/' . $array[$i];
}
?>

<div id='language_bar_bottom'>
    <a href=<?=$new_link?> >
        <div class='language_bottom_img'>
            <img src="/allshookup/images/logos/<?=$new_lang?>.jpg" >
        </div>
        <div class='language_bottom_text'>
        <?=$text?>
        </div>
    </a>
</div>