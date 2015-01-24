<?$page = get_instance()->data_model->get_page('about_us');?>
<? switch ($lang){
    case 'en': $link = 'https://docs.google.com/spreadsheet/pub?key=0AhcVBdN_Y90gdDJJUFRVWEZKeWt5V2l6TW01Z0JvTGc&output=html';break;
    case 'bg': $link = 'https://docs.google.com/spreadsheet/pub?key=0AhcVBdN_Y90gdHlKd1hvQ1hBOUZleGw3M1J5bXJCZVE&output=html';
}?>




<div id="about_us_page" style="">
    <div id="timeline-embed"></div>

</div>



<script type="text/javascript">
    var timeline_config = {
        width:              '100%',
        height:             '600',
        source:             '<?= $link?>',
        embed_id:           'timeline-embed',               //OPTIONAL USE A DIFFERENT DIV ID FOR EMBED
        start_at_end:       false,                          //OPTIONAL START AT LATEST DATE
        //start_at_slide:     '1',                            //OPTIONAL START AT SPECIFIC SLIDE
        start_zoom_adjust:  '-1',                            //OPTIONAL TWEAK THE DEFAULT ZOOM LEVEL
        hash_bookmark:      true,                           //OPTIONAL LOCATION BAR HASHES
        font:               'Bevan-PotanoSans',             //OPTIONAL FONT
        debug:              true,                          //OPTIONAL DEBUG TO CONSOLE
        lang:               "<?= $lang?>",                           //OPTIONAL LANGUAGE
        zoomable: false,
        showNavigation: false,
        maptype:            'watercolor'                   //OPTIONAL MAP STYLE

     //   css:                'path_to_css/timeline.css',     //OPTIONAL PATH TO CSS
   //     js:                 'path_to_js/timeline-min.js'    //OPTIONAL PATH TO JS
    }
</script>
<script type="text/javascript" src="/libraries/timelineJS/build/js/storyjs-embed.js"></script>