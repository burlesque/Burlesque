
<?  if ($lang === 'bg') $new_lang = 'en';
    else if ($lang === 'en') $new_lang = 'bg';
    $array = get_instance()->uri->segment_array();
    $length = get_instance()->uri->total_segments();
    $array[$length] = $new_lang;
    $new_link ='';
    for($i=1; $i <= $length; $i++){
       $new_link .= '/' . $array[$i];
    }
     ?>


<div id='language_bar_top'>
    <a href=<?=$new_link?> >
        <div>
            <img src="/allshookup/images/logos/<?=$new_lang?>.jpg" >
        </div>
    </a>

</div>