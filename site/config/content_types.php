<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$musical_links_array = array(
    ['westside-story', 'Westside Story'],
    ['chicago', 'Chicago'],
    ['hairspray', 'Hairspray'],
    ['moulin-rouge', 'Moulin Rouge!'],
    ['grease', 'Grease'],
    ['memphis', 'Memphis'],);

//---------------   Home page -> pictures           -----------------/

$config['content_types']['slide_picture']['lang1'] = 'Начална страница - снимки';
$config['content_types']['slide_picture']['lang1'] = 'Home page - pictures';
$config['content_types']['slide_picture']['lang1_plural'] = 'Начална страница - снимки';
$config['content_types']['slide_picture']['lang1_plural'] = 'Home page - pictures';
$config['content_types']['slide_picture']['show_date_field'] = false; // Shows the date field in admin panel
$config['content_types']['slide_picture']['admin_dd_sort'] = true; // false for allow column sorting (default sort by date), true for drag and drop reordering
$config['content_types']['slide_picture']['only_edit'] = false;

$config['content_types']['slide_picture']['admin_title_field'] = 'name_en'; //Select custom field for title in the admin contents list
$config['content_types']['slide_picture']['url_field'] = ''; //Select custom field for URL generation. If multilingual, you can put for example title_* to generate from several title fields.

$config['content_types']['slide_picture']['new_item_text'] = 'New picture'; // Text for new item of this type
$config['content_types']['slide_picture']['edit_item_text'] = 'Edit picture'; // Text for edit item of this type

$config['content_types']['slide_picture']['template_file'] = ''; // Template file in application/views/design/templates/
$config['content_types']['slide_picture']['custom_fields']['name_bg'] = array(
    'xtype' => 'textfield',
    'name' => 'name_bg',
    'itemId' => 'name_bg',
    'width' => 800,
    'labelWidth' => 200,
    'fieldLabel' => 'Info (Bulgarian)',
    'allowBlank' => false
);
$config['content_types']['slide_picture']['custom_fields']['name_en'] = array(
    'xtype' => 'textfield',
    'name' => 'name_en',
    'itemId' => 'name_en',
    'width' => 800,
    'labelWidth' => 200,
    'fieldLabel' => 'Info',
    'allowBlank' => false
);
$config['content_types']['slide_picture']['custom_fields']['picture'] = array(
    'xtype' => 'filebrowserfield',
    'name' => 'picture',
    'itemId' => 'picture',
    'width' => 800,
    'labelWidth' => 200,
    'fieldLabel' => 'Picture',
    'allowBlank' => false,
    'allowedExtensions' => 'jpg|JPG|jpeg|JPEG|gif|GIF|png|PNG',
    'allowedExtsError' => 'Файлът трябва да е картинка!'
);
$config['content_types']['slide_picture']['custom_fields']['link'] = array(
    'xtype' => 'textfield',
    'name' => 'link',
    'itemId' => 'link',
    'width' => 800,
    'labelWidth' => 200,
    'fieldLabel' => 'Link (clickable)',
    'allowBlank' => true
);
$config['content_types']['slide_picture']['custom_fields']['text_bg'] = array(
    'xtype' => 'tinymce_textarea',
    'name' => 'text_bg',
    'itemId' => 'text_bg',
    'width' => 900,
    'height' => 550,
    'labelWidth' => 200,
    'labelAlign' => 'top',
    'fieldLabel' => 'Text (Bulgarian)',
    'noWysiwyg' => false,
    'tinyConfig' => 'full_cfg'
);
$config['content_types']['slide_picture']['custom_fields']['text_en'] = array(
    'xtype' => 'tinymce_textarea',
    'name' => 'text_en',
    'itemId' => 'text_en',
    'width' => 900,
    'height' => 550,
    'labelWidth' => 200,
    'labelAlign' => 'top',
    'fieldLabel' => 'Text',
    'noWysiwyg' => false,
    'tinyConfig' => 'full_cfg'
);



//---------------        Old Musicals //

$config['content_types']['old_musicals']['lang1'] = 'Всички Мюзикъли';
$config['content_types']['old_musicals']['lang2'] = 'Previous musicals';
$config['content_types']['old_musicals']['lang1_plural'] = 'Всички Мюзикъли';
$config['content_types']['old_musicals']['lang1_plural'] = 'Previous musicals';
$config['content_types']['old_musicals']['show_date_field'] = false; // Shows the date field in admin panel
$config['content_types']['old_musicals']['admin_dd_sort'] = true; // false for allow column sorting (default sort by date), true for drag and drop reordering
$config['content_types']['old_musicals']['only_edit'] = false;

$config['content_types']['old_musicals']['admin_title_field'] = 'name_en'; //Select custom field for title in the admin contents list
$config['content_types']['old_musicals']['url_field'] = ''; //Select custom field for URL generation. If multilingual, you can put for example title_* to generate from several title fields.

$config['content_types']['old_musicals']['new_item_text'] = 'Добави мюзикъл'; // Text for new item of this type
$config['content_types']['old_musicals']['edit_item_text'] = 'Редактирай мюзикъл'; // Text for edit item of this type

$config['content_types']['old_musicals']['template_file'] = ''; // Template file in application/views/design/templates/

$config['content_types']['old_musicals']['custom_fields']['name_bg'] = array(
    'xtype' => 'textfield',
    'name' => 'name_bg',
    'itemId' => 'name_bg',
    'width' => 800,
    'labelWidth' => 200,
    'fieldLabel' =>  'Musical name (Bulgarian)',
    'allowBlank' => false
);

$config['content_types']['old_musicals']['custom_fields']['name_en'] = array(
    'xtype' => 'textfield',
    'name' => 'name_en',
    'itemId' => 'name_en',
    'width' => 800,
    'labelWidth' => 200,
    'fieldLabel' => 'Musical name (English)',
    'allowBlank' => false
);
$config['content_types']['old_musicals']['custom_fields']['year'] = array(
    'xtype' => 'textfield',
    'name' => 'year',
    'itemId' => 'year',
    'width' => 800,
    'labelWidth' => 200,
    'fieldLabel' => 'Year',
    'allowBlank' => true
);
$config['content_types']['old_musicals']['custom_fields']['poster'] = array(
    'xtype' => 'filebrowserfield',
    'name' => 'poster',
    'itemId' => 'poster',
    'width' => 800,
    'labelWidth' => 200,
    'fieldLabel' => 'Poster',
    'allowBlank' => false,
    'allowedExtensions' => 'jpg|JPG|jpeg|JPEG|gif|GIF|png|PNG',
    'allowedExtsError' => 'Файлът трябва да е картинка!'
);
$config['content_types']['old_musicals']['custom_fields']['link'] = array(
    'xtype' => 'textfield',
    'name' => 'link',
    'itemId' => 'link',
    'width' => 800,
    'labelWidth' => 200,
    'fieldLabel' => 'Link (do not change)',
    'allowBlank' => false
);
$config['content_types']['old_musicals']['custom_fields']['text_bg'] = array(
    'xtype' => 'tinymce_textarea',
    'name' => 'text_bg',
    'itemId' => 'text_bg',
    'width' => 900,
    'height' => 550,
    'labelWidth' => 200,
    'labelAlign' => 'top',
    'fieldLabel' => 'Description (Bulgarian)',
    'noWysiwyg' => false,
    'tinyConfig' => 'full_cfg'
);
$config['content_types']['old_musicals']['custom_fields']['text_en'] = array(
    'xtype' => 'tinymce_textarea',
    'name' => 'text_en',
    'itemId' => 'text_en',
    'width' => 900,
    'height' => 550,
    'labelWidth' => 200,
    'labelAlign' => 'top',
    'fieldLabel' => 'Description',
    'noWysiwyg' => false,
    'tinyConfig' => 'full_cfg'
);

$config['content_types']['old_musicals_pictures']['lang1'] = 'Всички Мюзикъли';
$config['content_types']['old_musicals_pictures']['lang2'] = 'Previous musicals pictures';
$config['content_types']['old_musicals_pictures']['lang1_plural'] = 'Всички Мюзикъли';
$config['content_types']['old_musicals_pictures']['lang1_plural'] = 'Previous musicals pictures';
$config['content_types']['old_musicals_pictures']['show_date_field'] = false; // Shows the date field in admin panel
$config['content_types']['old_musicals_pictures']['admin_dd_sort'] = true; // false for allow column sorting (default sort by date), true for drag and drop reordering
$config['content_types']['old_musicals_pictures']['only_edit'] = false;

$config['content_types']['old_musicals_pictures']['admin_title_field'] = 'link'; //Select custom field for title in the admin contents list
$config['content_types']['old_musicals_pictures']['url_field'] = ''; //Select custom field for URL generation. If multilingual, you can put for example title_* to generate from several title fields.

$config['content_types']['old_musicals_pictures']['new_item_text'] = 'Добави мюзикъл'; // Text for new item of this type
$config['content_types']['old_musicals_pictures']['edit_item_text'] = 'Редактирай мюзикъл'; // Text for edit item of this type

$config['content_types']['old_musicals_pictures']['template_file'] = ''; // Template file in application/views/design/templates/

$config['content_types']['old_musicals_pictures']['custom_fields']['text_bg'] = array(
    'xtype' => 'textfield',
    'name' => 'text_bg',
    'itemId' => 'text_bg',
    'width' => 800,
    'labelWidth' => 200,
    'fieldLabel' =>  "Caption (Bulgarian)",
    'allowBlank' => true
);
$config['content_types']['old_musicals_pictures']['custom_fields']['text_en'] = array(
    'xtype' => 'textfield',
    'name' => 'text_en',
    'itemId' => 'text_en',
    'width' => 800,
    'labelWidth' => 200,
    'fieldLabel' =>  "Caption (English)",
    'allowBlank' => true
);

$config['content_types']['old_musicals_pictures']['custom_fields']['picture'] = array(
    'xtype' => 'filebrowserfield',
    'name' => 'picture',
    'itemId' => 'picture',
    'width' => 800,
    'labelWidth' => 200,
    'fieldLabel' => 'Picture',
    'allowBlank' => false,
    'allowedExtensions' => 'jpg|JPG|jpeg|JPEG|gif|GIF|png|PNG',
    'allowedExtsError' => 'Файлът трябва да е картинка!'
);
$config['content_types']['old_musicals_pictures']['custom_fields']['link'] = array(
    'xtype'=> 'combo',
    'fieldLabel' => 'Musical',
    'name' => 'link',
    'itemId' => 'link',
    'hiddenName'=> 'my_dropdown',
    'autoSelect'=> false,
    'allowBlank'=> false,
    'editable'=> false,
    'triggerAction'=> 'all',
    'typeAhead'=> true,
    'width'=>800,
    'listWidth'=> 800,
    'labelWidth' => 200,
    'enableKeyEvents'=> true,
    'mode'=> 'local',
    'store'=>  $musical_links_array
);


/// Contents

$config['content_types']['pages']['lang1'] = 'Страници';
$config['content_types']['pages']['lang1'] = 'Contents';
$config['content_types']['pages']['lang1_plural'] = 'Страници';
$config['content_types']['pages']['lang1_plural'] = 'Contents';
$config['content_types']['pages']['show_date_field'] = false; // Shows the date field in admin panel
$config['content_types']['pages']['admin_dd_sort'] = true; // false for allow column sorting (default sort by date), true for drag and drop reordering
$config['content_types']['pages']['only_edit'] = false;

$config['content_types']['pages']['admin_title_field'] = 'admin_name'; //Select custom field for title in the admin contents list
$config['content_types']['pages']['url_field'] = ''; //Select custom field for URL generation. If multilingual, you can put for example title_* to generate from several title fields.

$config['content_types']['pages']['new_item_text'] = 'New Page'; // Text for new item of this type
$config['content_types']['pages']['edit_item_text'] = 'Edit Page'; // Text for edit item of this type

$config['content_types']['pages']['template_file'] = ''; // Template file in application/views/design/templates/
$config['content_types']['pages']['custom_fields']['admin_name'] = array(
    'xtype' => 'textfield',
    'name' => 'admin_name',
    'itemId' => 'admin_name',
    'width' => 800,
    'labelWidth' => 200,
    'fieldLabel' => 'What is this for? ',
    'allowBlank' => true
);
$config['content_types']['pages']['custom_fields']['name_bg'] = array(
    'xtype' => 'textfield',
    'name' => 'name_bg',
    'itemId' => 'name_bg',
    'width' => 800,
    'labelWidth' => 200,
    'fieldLabel' => 'Title (Bulgarian)',
    'allowBlank' => true
);
$config['content_types']['pages']['custom_fields']['name_en'] = array(
    'xtype' => 'textfield',
    'name' => 'name_en',
    'itemId' => 'name_en',
    'width' => 800,
    'labelWidth' => 200,
    'fieldLabel' => 'Title',
    'allowBlank' => true
);
$config['content_types']['pages']['custom_fields']['link'] = array(
    'xtype' => 'textfield',
    'name' => 'link',
    'itemId' => 'link',
    'width' => 800,
    'labelWidth' => 200,
    'fieldLabel' => 'Link (do not change)',
    'allowBlank' => true
)
;$config['content_types']['pages']['custom_fields']['picture'] = array(
    'xtype' => 'filebrowserfield',
    'name' => 'picture',
    'itemId' => 'picture',
    'width' => 800,
    'labelWidth' => 200,
    'fieldLabel' => 'Picture',
    'allowBlank' => true,
    'allowedExtensions' => 'jpg|JPG|jpeg|JPEG|gif|GIF|png|PNG',
    'allowedExtsError' => 'Файлът трябва да е картинка!'
);
$config['content_types']['pages']['custom_fields']['text_bg'] = array(
    'xtype' => 'tinymce_textarea',
    'name' => 'text_bg',
    'itemId' => 'text_bg',
    'width' => 900,
    'height' => 550,
    'labelWidth' => 200,
    'labelAlign' => 'top',
    'fieldLabel' => 'Content (Bulgarian)',
    'noWysiwyg' => false,
    'tinyConfig' => 'full_cfg'
);
$config['content_types']['pages']['custom_fields']['text_en'] = array(
    'xtype' => 'tinymce_textarea',
    'name' => 'text_en',
    'itemId' => 'text_en',
    'width' => 900,
    'height' => 550,
    'labelWidth' => 200,
    'labelAlign' => 'top',
    'fieldLabel' => 'Content',
    'noWysiwyg' => false,
    'tinyConfig' => 'full_cfg'
);



//SPONSORS

   $sponsors_array = array(
        ['general_sponsor', 'Генерален спонсор'],
        ['partners', 'Партньори'],
        ['haircuts', 'Прически'],
        ['costumes', 'Костюми'],
        ['logistics', 'Логистика'], ['ticket_centers', ' Билетни центрове']);

$config['content_types']['sponsors']['lang1'] = 'Sponsors';
$config['content_types']['sponsors']['lang1'] = 'Sponsors';
$config['content_types']['sponsors']['lang1_plural'] = 'Spnsors';
$config['content_types']['sponsors']['lang1_plural'] = 'Sponsors';
$config['content_types']['sponsors']['show_date_field'] = false; // Shows the date field in admin panel
$config['content_types']['sponsors']['admin_dd_sort'] = true; // false for allow column sorting (default sort by date), true for drag and drop reordering
$config['content_types']['sponsors']['only_edit'] = false;

$config['content_types']['sponsors']['admin_title_field'] = 'admin_name'; //Select custom field for title in the admin contents list
$config['content_types']['sponsors']['url_field'] = ''; //Select custom field for URL generation. If multilingual, you can put for example title_* to generate from several title fields.

$config['content_types']['sponsors']['new_item_text'] = 'New Page'; // Text for new item of this type
$config['content_types']['sponsors']['edit_item_text'] = 'Edit Page'; // Text for edit item of this type

$config['content_types']['sponsors']['template_file'] = ''; // Template file in application/views/design/templates/
$config['content_types']['sponsors']['custom_fields']['admin_name'] = array(
    'xtype' => 'textfield',
    'name' => 'admin_name',
    'itemId' => 'admin_name',
    'width' => 800,
    'labelWidth' => 200,
    'fieldLabel' => 'What is this for? (will not be shown)',
    'allowBlank' => true
);
$config['content_types']['sponsors']['custom_fields']['link'] = array(
    'xtype' => 'textfield',
    'name' => 'link',
    'itemId' => 'link',
    'width' => 800,
    'labelWidth' => 200,
    'fieldLabel' => 'Link',
    'allowBlank' => true
)
;$config['content_types']['sponsors']['custom_fields']['picture'] = array(
    'xtype' => 'filebrowserfield',
    'name' => 'picture',
    'itemId' => 'picture',
    'width' => 800,
    'labelWidth' => 200,
    'fieldLabel' => 'Picture',
    'allowBlank' => true,
    'allowedExtensions' => 'jpg|JPG|jpeg|JPEG|gif|GIF|png|PNG',
    'allowedExtsError' => 'Файлът трябва да е картинка!'
);
$config['content_types']['sponsors']['custom_fields']['category'] = array(
    'xtype'=> 'combo',
    'fieldLabel' => 'Category',
    'name' => 'category',
    'itemId' => 'category',
    'hiddenName'=> 'my_dropdown',
    'autoSelect'=> false,
    'allowBlank'=> false,
    'editable'=> false,
    'triggerAction'=> 'all',
    'typeAhead'=> true,
    'width'=>800,
    'listWidth'=> 800,
    'labelWidth' => 200,
    'enableKeyEvents'=> true,
    'mode'=> 'local',
    'store'=>  $sponsors_array
);



    // CREW START
    
    

    //ACTORS
    $config['content_types']['actors']['lang1'] = 'Танци';
    $config['content_types']['actors']['lang1'] = 'Actors';
    $config['content_types']['actors']['lang1_plural'] = 'Танци';
    $config['content_types']['actors']['lang1_plural'] = 'Actors';
    $config['content_types']['actors']['show_date_field'] = false; // Shows the date field in admin panel
    $config['content_types']['actors']['admin_dd_sort'] = true; // false for allow column sorting (default sort by date), true for drag and drop reordering
    $config['content_types']['actors']['only_edit'] = false;

    $config['content_types']['actors']['admin_title_field'] = 'name_en'; //Select custom field for title in the admin contents list
    $config['content_types']['actors']['url_field'] = ''; //Select custom field for URL generation. If multilingual, you can put for example title_* to generate from several title fields.

    $config['content_types']['actors']['new_item_text'] = 'New actor'; // Text for new item of this type
    $config['content_types']['actors']['edit_item_text'] = 'Edit actor'; // Text for edit item of this type

    $config['content_types']['actors']['template_file'] = ''; // Template file in application/views/design/templates/
    $config['content_types']['actors']['custom_fields']['name_bg'] = array(
        'xtype' => 'textfield',
        'name' => 'name_bg',
        'itemId' => 'name_bg',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Name (Bulgarian)',
        'allowBlank' => false
    );
    $config['content_types']['actors']['custom_fields']['name_en'] = array(
        'xtype' => 'textfield',
        'name' => 'name_en',
        'itemId' => 'name_en',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Name',
        'allowBlank' => false
    );
    $config['content_types']['actors']['custom_fields']['picture'] = array(
        'xtype' => 'filebrowserfield',
        'name' => 'picture',
        'itemId' => 'picture',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Picture',
        'allowBlank' => false,
        'allowedExtensions' => 'jpg|JPG|jpeg|JPEG|gif|GIF|png|PNG',
        'allowedExtsError' => 'Файлът трябва да е картинка!'
    );

    $config['content_types']['actors']['custom_fields']['text_bg'] = array(
        'noWysiwyg' => false,
        'tinyConfig' => 'full_cfg',
        'xtype' => 'tinymce_textarea',
        'name' => 'text_bg',
        'itemId' => 'text_bg',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Quote (Bulgarian)',
        'allowBlank' => true,
        'grow' => true
    );
    $config['content_types']['actors']['custom_fields']['text_en'] = array(
        'noWysiwyg' => false,
        'tinyConfig' => 'full_cfg',
        'xtype' => 'tinymce_textarea',
        'name' => 'text_en',
        'itemId' => 'text_en',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Quote',
        'allowBlank' => true,
        'grow' => true
    );
    $config['content_types']['actors']['custom_fields']['task_bg'] = array(
        'xtype' => 'textfield',
        'name' => 'task_bg',
        'itemId' => 'task_bg',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Role (Bulgarian)',
        'allowBlank' => true
    );
    $config['content_types']['actors']['custom_fields']['task_en'] = array(
        'xtype' => 'textfield',
        'name' => 'task_en',
        'itemId' => 'task_en',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Role',
        'allowBlank' => true
    );
    $config['content_types']['actors']['custom_fields']['since'] = array(
        'xtype' => 'textfield',
        'name' => 'since',
        'itemId' => 'since',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Since (optional, leave blank)',
        'allowBlank' => true
    );
    
    //DANCERS
    $config['content_types']['dancers']['lang1'] = 'Танци';
    $config['content_types']['dancers']['lang1'] = 'Dancers';
    $config['content_types']['dancers']['lang1_plural'] = 'Танци';
    $config['content_types']['dancers']['lang1_plural'] = 'Dancers';
    $config['content_types']['dancers']['show_date_field'] = false; // Shows the date field in admin panel
    $config['content_types']['dancers']['admin_dd_sort'] = true; // false for allow column sorting (default sort by date), true for drag and drop reordering
    $config['content_types']['dancers']['only_edit'] = false;

    $config['content_types']['dancers']['admin_title_field'] = 'name_en'; //Select custom field for title in the admin contents list
    $config['content_types']['dancers']['url_field'] = ''; //Select custom field for URL generation. If multilingual, you can put for example title_* to generate from several title fields.

    $config['content_types']['dancers']['new_item_text'] = 'New dancer'; // Text for new item of this type
    $config['content_types']['dancers']['edit_item_text'] = 'Edit dancer'; // Text for edit item of this type

    $config['content_types']['dancers']['template_file'] = ''; // Template file in application/views/design/templates/
    $config['content_types']['dancers']['custom_fields']['name_bg'] = array(
        'xtype' => 'textfield',
        'name' => 'name_bg',
        'itemId' => 'name_bg',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Name (Bulgarian)',
        'allowBlank' => false
    );
    $config['content_types']['dancers']['custom_fields']['name_en'] = array(
        'xtype' => 'textfield',
        'name' => 'name_en',
        'itemId' => 'name_en',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Name',
        'allowBlank' => false
    );
    $config['content_types']['dancers']['custom_fields']['picture'] = array(
        'xtype' => 'filebrowserfield',
        'name' => 'picture',
        'itemId' => 'picture',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Picture',
        'allowBlank' => false,
        'allowedExtensions' => 'jpg|JPG|jpeg|JPEG|gif|GIF|png|PNG',
        'allowedExtsError' => 'Файлът трябва да е картинка!'
    );

    $config['content_types']['dancers']['custom_fields']['text_bg'] = array(
        'noWysiwyg' => false,
        'tinyConfig' => 'full_cfg',
        'xtype' => 'tinymce_textarea',
        'name' => 'text_bg',
        'itemId' => 'text_bg',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Quote (Bulgarian)',
        'allowBlank' => true,
        'grow' => true
    );
    $config['content_types']['dancers']['custom_fields']['text_en'] = array(
        'noWysiwyg' => false,
        'tinyConfig' => 'full_cfg',
        'xtype' => 'tinymce_textarea',
        'name' => 'text_en',
        'itemId' => 'text_en',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Quote',
        'allowBlank' => true,
        'grow' => true
    );
    $config['content_types']['dancers']['custom_fields']['task_bg'] = array(
        'xtype' => 'textfield',
        'name' => 'task_bg',
        'itemId' => 'task_bg',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Position (Bulgarian)',
        'allowBlank' => true
    );
    $config['content_types']['dancers']['custom_fields']['task_en'] = array(
        'xtype' => 'textfield',
        'name' => 'task_en',
        'itemId' => 'task_en',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Position',
        'allowBlank' => true
    );
    $config['content_types']['dancers']['custom_fields']['since'] = array(
        'xtype' => 'textfield',
        'name' => 'since',
        'itemId' => 'since',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Since (optional, leave blank)',
        'allowBlank' => true
    );


    // Vocals
    $config['content_types']['vocals']['lang1'] = 'Вокали';
    $config['content_types']['vocals']['lang1'] = 'Vocals';
    $config['content_types']['vocals']['lang1_plural'] = 'Вокали';
    $config['content_types']['vocals']['lang1_plural'] = 'Vocals';
    $config['content_types']['vocals']['show_date_field'] = false; // Shows the date field in admin panel
    $config['content_types']['vocals']['admin_dd_sort'] = true; // false for allow column sorting (default sort by date), true for drag and drop reordering
    $config['content_types']['vocals']['only_edit'] = false;

    $config['content_types']['vocals']['admin_title_field'] = 'name_en'; //Select custom field for title in the admin contents list
    $config['content_types']['vocals']['url_field'] = ''; //Select custom field for URL generation. If multilingual, you can put for example title_* to generate from several title fields.

    $config['content_types']['vocals']['new_item_text'] = 'New vocal'; // Text for new item of this type
    $config['content_types']['vocals']['edit_item_text'] = 'Edit vocal'; // Text for edit item of this type

    $config['content_types']['vocals']['template_file'] = ''; // Template file in application/views/design/templates/
    $config['content_types']['vocals']['custom_fields']['name_bg'] = array(
        'xtype' => 'textfield',
        'name' => 'name_bg',
        'itemId' => 'name_bg',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Name (Bulgarian)',
        'allowBlank' => false
    );
    $config['content_types']['vocals']['custom_fields']['name_en'] = array(
        'xtype' => 'textfield',
        'name' => 'name_en',
        'itemId' => 'name_en',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Name',
        'allowBlank' => false
    );
    $config['content_types']['vocals']['custom_fields']['picture'] = array(
        'xtype' => 'filebrowserfield',
        'name' => 'picture',
        'itemId' => 'picture',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Picture',
        'allowBlank' => false,
        'allowedExtensions' => 'jpg|JPG|jpeg|JPEG|gif|GIF|png|PNG',
        'allowedExtsError' => 'Файлът трябва да е картинка!'
    );

    $config['content_types']['vocals']['custom_fields']['text_bg'] = array(
        'noWysiwyg' => false,
        'tinyConfig' => 'full_cfg',
        'xtype' => 'tinymce_textarea',
        'name' => 'text_bg',
        'itemId' => 'text_bg',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Quote (Bulgarian)',
        'allowBlank' => true,
        'grow' => true
    );
    $config['content_types']['vocals']['custom_fields']['text_en'] = array(
        'noWysiwyg' => false,
        'tinyConfig' => 'full_cfg',
        'xtype' => 'tinymce_textarea',
        'name' => 'text_en',
        'itemId' => 'text_en',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Quote',
        'allowBlank' => true,
        'grow' => true
    );
    $config['content_types']['vocals']['custom_fields']['task_bg'] = array(
        'xtype' => 'textfield',
        'name' => 'task_bg',
        'itemId' => 'task_bg',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Role (Bulgarian)',
        'allowBlank' => true
    );
    $config['content_types']['vocals']['custom_fields']['task_en'] = array(
        'xtype' => 'textfield',
        'name' => 'task_en',
        'itemId' => 'task_en',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Role',
        'allowBlank' => true
    );
    $config['content_types']['vocals']['custom_fields']['since'] = array(
        'xtype' => 'textfield',
        'name' => 'since',
        'itemId' => 'since',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Since (optional, leave blank)',
        'allowBlank' => true
    );
    
    
    //Organizers
    $config['content_types']['organizers']['lang1'] = 'Танци';
    $config['content_types']['organizers']['lang1'] = 'Organizers';
    $config['content_types']['organizers']['lang1_plural'] = 'Танци';
    $config['content_types']['organizers']['lang1_plural'] = 'Organizers';
    $config['content_types']['organizers']['show_date_field'] = false; // Shows the date field in admin panel
    $config['content_types']['organizers']['admin_dd_sort'] = true; // false for allow column sorting (default sort by date), true for drag and drop reordering
    $config['content_types']['organizers']['only_edit'] = false;

    $config['content_types']['organizers']['admin_title_field'] = 'name_en'; //Select custom field for title in the admin contents list
    $config['content_types']['organizers']['url_field'] = ''; //Select custom field for URL generation. If multilingual, you can put for example title_* to generate from several title fields.

    $config['content_types']['organizers']['new_item_text'] = 'New organizer'; // Text for new item of this type
    $config['content_types']['organizers']['edit_item_text'] = 'Edit organizer'; // Text for edit item of this type

    $config['content_types']['organizers']['template_file'] = ''; // Template file in application/views/design/templates/
    $config['content_types']['organizers']['custom_fields']['name_bg'] = array(
        'xtype' => 'textfield',
        'name' => 'name_bg',
        'itemId' => 'name_bg',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Name (Bulgarian)',
        'allowBlank' => false
    );
    $config['content_types']['organizers']['custom_fields']['name_en'] = array(
        'xtype' => 'textfield',
        'name' => 'name_en',
        'itemId' => 'name_en',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Name',
        'allowBlank' => false
    );
    $config['content_types']['organizers']['custom_fields']['picture'] = array(
        'xtype' => 'filebrowserfield',
        'name' => 'picture',
        'itemId' => 'picture',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Picture',
        'allowBlank' => false,
        'allowedExtensions' => 'jpg|JPG|jpeg|JPEG|gif|GIF|png|PNG',
        'allowedExtsError' => 'Файлът трябва да е картинка!'
    );

    $config['content_types']['organizers']['custom_fields']['text_bg'] = array(
        'noWysiwyg' => false,
        'tinyConfig' => 'full_cfg',
        'xtype' => 'tinymce_textarea',
        'name' => 'text_bg',
        'itemId' => 'text_bg',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Quote (Bulgarian)',
        'allowBlank' => true,
        'grow' => true
    );
    $config['content_types']['organizers']['custom_fields']['text_en'] = array(
        'noWysiwyg' => false,
        'tinyConfig' => 'full_cfg',
        'xtype' => 'tinymce_textarea',
        'name' => 'text_en',
        'itemId' => 'text_en',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Quote',
        'allowBlank' => true,
        'grow' => true
    );
    $config['content_types']['organizers']['custom_fields']['task_bg'] = array(
        'xtype' => 'textfield',
        'name' => 'task_bg',
        'itemId' => 'task_bg',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Position (Bulgarian)',
        'allowBlank' => true
    );
    $config['content_types']['organizers']['custom_fields']['task_en'] = array(
        'xtype' => 'textfield',
        'name' => 'task_en',
        'itemId' => 'task_en',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Position',
        'allowBlank' => true
    );
    $config['content_types']['organizers']['custom_fields']['since'] = array(
        'xtype' => 'textfield',
        'name' => 'since',
        'itemId' => 'since',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Since (optional, leave blank)',
        'allowBlank' => true
    );
    
    
    
    //Creative team
    $config['content_types']['creative']['lang1'] = 'Танци';
    $config['content_types']['creative']['lang1'] = 'Creative team';
    $config['content_types']['creative']['lang1_plural'] = 'Танци';
    $config['content_types']['creative']['lang1_plural'] = 'Creative team';
    $config['content_types']['creative']['show_date_field'] = false; // Shows the date field in admin panel
    $config['content_types']['creative']['admin_dd_sort'] = true; // false for allow column sorting (default sort by date), true for drag and drop reordering
    $config['content_types']['creative']['only_edit'] = false;

    $config['content_types']['creative']['admin_title_field'] = 'name_en'; //Select custom field for title in the admin contents list
    $config['content_types']['creative']['url_field'] = ''; //Select custom field for URL generation. If multilingual, you can put for example title_* to generate from several title fields.

    $config['content_types']['creative']['new_item_text'] = 'New creative team member'; // Text for new item of this type
    $config['content_types']['creative']['edit_item_text'] = 'Edit creative team members'; // Text for edit item of this type

    $config['content_types']['creative']['template_file'] = ''; // Template file in application/views/design/templates/
    $config['content_types']['creative']['custom_fields']['name_bg'] = array(
        'xtype' => 'textfield',
        'name' => 'name_bg',
        'itemId' => 'name_bg',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Name (Bulgarian)',
        'allowBlank' => false
    );
    $config['content_types']['creative']['custom_fields']['name_en'] = array(
        'xtype' => 'textfield',
        'name' => 'name_en',
        'itemId' => 'name_en',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Name',
        'allowBlank' => false
    );
    $config['content_types']['creative']['custom_fields']['picture'] = array(
        'xtype' => 'filebrowserfield',
        'name' => 'picture',
        'itemId' => 'picture',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Picture',
        'allowBlank' => false,
        'allowedExtensions' => 'jpg|JPG|jpeg|JPEG|gif|GIF|png|PNG',
        'allowedExtsError' => 'Файлът трябва да е картинка!'
    );

    $config['content_types']['creative']['custom_fields']['text_bg'] = array(
        'noWysiwyg' => false,
        'tinyConfig' => 'full_cfg',
        'xtype' => 'tinymce_textarea',
        'name' => 'text_bg',
        'itemId' => 'text_bg',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Quote (Bulgarian)',
        'allowBlank' => true,
        'grow' => true
    );
    $config['content_types']['creative']['custom_fields']['text_en'] = array(
        'noWysiwyg' => false,
        'tinyConfig' => 'full_cfg',
        'xtype' => 'tinymce_textarea',
        'name' => 'text_en',
        'itemId' => 'text_en',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Quote',
        'allowBlank' => true,
        'grow' => true
    );
    $config['content_types']['creative']['custom_fields']['task_bg'] = array(
        'xtype' => 'textfield',
        'name' => 'task_bg',
        'itemId' => 'task_bg',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Position (Bulgarian)',
        'allowBlank' => true
    );
    $config['content_types']['creative']['custom_fields']['task_en'] = array(
        'xtype' => 'textfield',
        'name' => 'task_en',
        'itemId' => 'task_en',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Position',
        'allowBlank' => true
    );
    $config['content_types']['creative']['custom_fields']['since'] = array(
        'xtype' => 'textfield',
        'name' => 'since',
        'itemId' => 'since',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Since (optional, leave blank)',
        'allowBlank' => true
    );

    ///////
    ////////   CREW    END


    $config['content_types']['map_dates']['lang1'] = 'Дати';
    $config['content_types']['map_dates']['lang1'] = 'Map dates';
    $config['content_types']['map_dates']['lang1_plural'] = 'Дати';
    $config['content_types']['map_dates']['lang1_plural'] = 'Map dates';
    $config['content_types']['map_dates']['show_date_field'] = false; // Shows the date field in admin panel
    $config['content_types']['map_dates']['admin_dd_sort'] = true; // false for allow column sorting (default sort by date), true for drag and drop reordering
    $config['content_types']['map_dates']['admin_title_field'] = 'city_bg'; //Select custom field for title in the admin contents list
    $config['content_types']['map_dates']['url_field'] = ''; //Select custom field for URL generation. If multilingual, you can put for example title_* to generate from several title fields.
    $config['content_types']['map_dates']['new_item_text'] = 'New Date'; // Text for new item of this type
    $config['content_types']['map_dates']['edit_item_text'] = 'Edit Date'; // Text for edit item of this type

    $config['content_types']['map_dates']['template_file'] = '';
    $config['content_types']['map_dates']['custom_fields']['city_bg'] = array(
        'xtype' => 'textfield',
        'name' => 'city_bg',
        'itemId' => 'city_bg',
        'width' => 700,
        'labelWidth' => 200,
        'fieldLabel' => 'City (Bulgarian)',
        'allowBlank' => false
    );
    $config['content_types']['map_dates']['custom_fields']['city_en'] = array(
        'xtype' => 'textfield',
        'name' => 'city_en',
        'itemId' => 'city_en',
        'width' => 700,
        'labelWidth' => 200,
        'fieldLabel' => 'City',
        'allowBlank' => false
    );
    $config['content_types']['map_dates']['custom_fields']['theater_bg'] = array(
        'xtype' => 'textfield',
        'name' => 'theater_bg',
        'itemId' => 'theater_bg',
        'width' => 700,
        'labelWidth' => 200,
        'fieldLabel' => 'Theater (Bulgarian)',
        'allowBlank' => false
    );
    $config['content_types']['map_dates']['custom_fields']['theater_en'] = array(
        'xtype' => 'textfield',
        'name' => 'theater_en',
        'itemId' => 'theater_en',
        'width' => 700,
        'labelWidth' => 200,
        'fieldLabel' => 'Theater',
        'allowBlank' => false
    );
    $config['content_types']['map_dates']['custom_fields']['show_dates_bg'] = array(
        'xtype' => 'textfield',
        'name' => 'show_dates_bg',
        'itemId' => 'show_dates_bg',
        'width' => 700,
        'labelWidth' => 200,
        'fieldLabel' => 'Date (BG)',
        'allowBlank' => false
    );
    $config['content_types']['map_dates']['custom_fields']['show_dates_en'] = array(
        'xtype' => 'textfield',
        'name' => 'show_date_en',
        'itemId' => 'show_date_en',
        'width' => 700,
        'labelWidth' => 200,
        'fieldLabel' => 'Date (EN)',
        'allowBlank' => false
    );
    $config['content_types']['map_dates']['custom_fields']['address_bg'] = array(
        'xtype' => 'textfield',
        'name' => 'address_bg',
        'itemId' => 'address_bg',
        'width' => 700,
        'labelWidth' => 200,
        'fieldLabel' => 'Address (BG)',
        'allowBlank' => false
    );
    $config['content_types']['map_dates']['custom_fields']['address_en'] = array(
        'xtype' => 'textfield',
        'name' => 'address_en',
        'itemId' => 'address_en',
        'width' => 700,
        'labelWidth' => 200,
        'fieldLabel' => 'Address (EN)',
        'allowBlank' => false
    );
    $config['content_types']['map_dates']['custom_fields']['boxoffice_link'] = array(
        'xtype' => 'textfield',
        'name' => 'boxoffice_link',
        'itemId' => 'boxoffice_link',
        'width' => 700,
        'labelWidth' => 200,
        'fieldLabel' => 'BoxOffice Ticket Link (URL)',
        'allowBlank' => true
    );
    $config['content_types']['map_dates']['custom_fields']['picture'] = array(
        'xtype' => 'filebrowserfield',
        'name' => 'picture',
        'itemId' => 'picture',
        'width' => 800,
        'labelWidth' => 200,
        'fieldLabel' => 'Picture',
        'allowBlank' => false,
        'allowedExtensions' => 'jpg|JPG|jpeg|JPEG|gif|GIF|png|PNG',
        'allowedExtsError' => 'Файлът трябва да е картинка!'
    );
    

    // Dates
$config['content_types']['asu_tour_dates']['lang1'] = 'Дати';
$config['content_types']['asu_tour_dates']['lang1'] = 'Tour dates';
$config['content_types']['asu_tour_dates']['lang1_plural'] = 'Дати';
$config['content_types']['asu_tour_dates']['lang1_plural'] = 'Tour dates';
$config['content_types']['asu_tour_dates']['show_date_field'] = false; // Shows the date field in admin panel
$config['content_types']['asu_tour_dates']['admin_dd_sort'] = true; // false for allow column sorting (default sort by date), true for drag and drop reordering
$config['content_types']['asu_tour_dates']['admin_title_field'] = 'city_bg'; //Select custom field for title in the admin contents list
$config['content_types']['asu_tour_dates']['url_field'] = ''; //Select custom field for URL generation. If multilingual, you can put for example title_* to generate from several title fields.
$config['content_types']['asu_tour_dates']['new_item_text'] = 'New Date'; // Text for new item of this type
$config['content_types']['asu_tour_dates']['edit_item_text'] = 'Edit Date'; // Text for edit item of this type

$config['content_types']['asu_tour_dates']['template_file'] = '';


$config['content_types']['asu_tour_dates']['custom_fields']['city_bg'] = array(
    'xtype' => 'textfield',
    'name' => 'city_bg',
    'itemId' => 'city_bg',
    'width' => 700,
    'labelWidth' => 200,
    'fieldLabel' => 'City (Bulgarian)',
    'allowBlank' => false
);
$config['content_types']['asu_tour_dates']['custom_fields']['city_en'] = array(
    'xtype' => 'textfield',
    'name' => 'city_en',
    'itemId' => 'city_en',
    'width' => 700,
    'labelWidth' => 200,
    'fieldLabel' => 'City',
    'allowBlank' => false
);
$config['content_types']['asu_tour_dates']['custom_fields']['theater_bg'] = array(
    'xtype' => 'textfield',
    'name' => 'theater_bg',
    'itemId' => 'theater_bg',
    'width' => 700,
    'labelWidth' => 200,
    'fieldLabel' => 'Theater (Bulgarian)',
    'allowBlank' => false
);
$config['content_types']['asu_tour_dates']['custom_fields']['theater_en'] = array(
    'xtype' => 'textfield',
    'name' => 'theater_en',
    'itemId' => 'theater_en',
    'width' => 700,
    'labelWidth' => 200,
    'fieldLabel' => 'Theater',
    'allowBlank' => false
);
$config['content_types']['asu_tour_dates']['custom_fields']['show_date'] = array(
    'xtype' => 'textfield',
    'name' => 'show_date',
    'itemId' => 'show_date',
    'width' => 700,
    'labelWidth' => 200,
    'fieldLabel' => 'Date (D.M.Y)',
    'allowBlank' => false
);
$config['content_types']['asu_tour_dates']['custom_fields']['show_time'] = array(
    'xtype' => 'textfield',
    'name' => 'show_time',
    'itemId' => 'show_time',
    'width' => 700,
    'labelWidth' => 200,
    'fieldLabel' => 'Time (H:M)',
    'allowBlank' => false
);
$config['content_types']['asu_tour_dates']['custom_fields']['boxoffice_link'] = array(
    'xtype' => 'textfield',
    'name' => 'boxoffice_link',
    'itemId' => 'boxoffice_link',
    'width' => 700,
    'labelWidth' => 200,
    'fieldLabel' => 'BoxOffice Ticket Link (URL)',
    'allowBlank' => true
);




///////////////////////////////////
//////////////////////////////////
/////////////////////////////////
///////////////////////////
// MEMPHIS


///////////////////////////
///////////////////////////
//////////////////////////
/*
* Custom Configurations:
*/

		$config['content_types']['news']['lang1'] = 'новина';
		$config['content_types']['news']['lang2'] = 'news';
		$config['content_types']['news']['lang1_plural'] = 'MEMPHIS новини';
		$config['content_types']['news']['lang2_plural'] = 'news';
		$config['content_types']['news']['show_date_field'] = true; // Shows the date field in admin panel
		$config['content_types']['news']['admin_dd_sort'] = false; // false for allow column sorting (default sort by date), true for drag and drop reordering

		$config['content_types']['news']['admin_title_field'] = 'title_bg'; //Select custom field for title in the admin contents list
		$config['content_types']['news']['url_field'] = 'title_*'; //Select custom field for URL generation. If multilingual, you can put for example title_* to generate from several title fields.
		$config['content_types']['news']['new_item_text'] = 'Нова новина'; // Text for new item of this type
		$config['content_types']['news']['edit_item_text'] = 'Редактирай новина'; // Text for edit item of this type

		$config['content_types']['news']['template_file'] = 'news_page'; // Template file in application/views/design/templates/

		$config['content_types']['news']['custom_fields']['title_bg'] = array(
			'xtype' => 'textfield',
			'name' => 'title_bg',
			'itemId' => 'title_bg',
			'width' => 800,
			'labelWidth' => 200,
			'fieldLabel' => 'Заглавие на български',
			'allowBlank' => false
		);
		$config['content_types']['news']['custom_fields']['title_en'] = array(
			'xtype' => 'textfield',
			'name' => 'title_en',
			'itemId' => 'title_en',
			'width' => 800,
			'labelWidth' => 200,
			'fieldLabel' => 'Заглавие на английски',
			'allowBlank' => false
		);
		$config['content_types']['news']['custom_fields']['text_bg'] = array(
			'xtype' => 'tinymce_textarea',
			'name' => 'text_bg',
			'itemId' => 'text_bg',
			'width' => 900,
			'height' => 550,
			'labelWidth' => 200,
			'labelAlign' => 'top',
			'fieldLabel' => 'Съдържание на български',
			'noWysiwyg' => false,
            'tinyConfig' => 'full_cfg'
		);

		$config['content_types']['news']['custom_fields']['text_en'] = array(
			'xtype' => 'tinymce_textarea',
			'name' => 'text_en',
			'itemId' => 'text_en',
			'width' => 900,
			'height' => 550,
			'labelWidth' => 200,
			'labelAlign' => 'top',
			'fieldLabel' => 'Съдържание на английски',
			'noWysiwyg' => false,
            'tinyConfig' => 'full_cfg'
		);




//------------------------------------------------------------------------------


		$config['content_types']['memphis_tour_dates']['lang1'] = 'представление';
		$config['content_types']['memphis_tour_dates']['lang2'] = 'date';
		$config['content_types']['memphis_tour_dates']['lang1_plural'] = 'MEMPHIS представления';
		$config['content_types']['memphis_tour_dates']['lang2_plural'] = 'dates';
		$config['content_types']['memphis_tour_dates']['show_date_field'] = false; // Shows the date field in admin panel
		$config['content_types']['memphis_tour_dates']['admin_dd_sort'] = false; // false for allow column sorting (default sort by date), true for drag and drop reordering
		$config['content_types']['memphis_tour_dates']['admin_title_field'] = 'title_bg'; //Select custom field for title in the admin contents list
		$config['content_types']['memphis_tour_dates']['url_field'] = ''; //Select custom field for URL generation. If multilingual, you can put for example title_* to generate from several title fields.
		$config['content_types']['memphis_tour_dates']['new_item_text'] = 'Ново представление'; // Text for new item of this type
		$config['content_types']['memphis_tour_dates']['edit_item_text'] = 'Редактирай представление'; // Text for edit item of this type
		$config['content_types']['memphis_tour_dates']['only_edit'] = true;
		$config['content_types']['memphis_tour_dates']['template_file'] = '';


		$config['content_types']['memphis_tour_dates']['custom_fields']['title_bg'] = array(
			'xtype' => 'textfield',
			'name' => 'title_bg',
			'itemId' => 'title_bg',
			'width' => 700,
			'labelWidth' => 200,
			'fieldLabel' => 'Град на български',
			'allowBlank' => false
		);
		$config['content_types']['memphis_tour_dates']['custom_fields']['title_en'] = array(
			'xtype' => 'textfield',
			'name' => 'title_en',
			'itemId' => 'title_en',
			'width' => 700,
			'labelWidth' => 200,
			'fieldLabel' => 'Град на английски',
			'allowBlank' => false
		);
		$config['content_types']['memphis_tour_dates']['custom_fields']['show_date'] = array(
			'xtype' => 'textfield',
			'name' => 'show_date',
			'itemId' => 'show_date',
			'width' => 700,
			'labelWidth' => 200,
			'fieldLabel' => 'Дата',
			'allowBlank' => false
		);








		$config['content_types']['news_pictures']['lang1'] = 'снимка от новина';
		$config['content_types']['news_pictures']['lang2'] = 'news picture';
		$config['content_types']['news_pictures']['lang1_plural'] = 'MEMPHIS снимки от новини';
		$config['content_types']['news_pictures']['lang2_plural'] = 'news pictures';
		$config['content_types']['news_pictures']['show_date_field'] = false; // Shows the date field in admin panel
		$config['content_types']['news_pictures']['admin_dd_sort'] = true; // false for allow column sorting (default sort by date), true for drag and drop reordering

		$config['content_types']['news_pictures']['admin_title_field'] = 'picture'; //Select custom field for title in the admin contents list
		$config['content_types']['news_pictures']['url_field'] = ''; //Select custom field for URL generation. If multilingual, you can put for example title_* to generate from several title fields.

		$config['content_types']['news_pictures']['new_item_text'] = 'Нова снимка'; // Text for new item of this type
		$config['content_types']['news_pictures']['edit_item_text'] = 'Редактирай снимка'; // Text for edit item of this type

		$config['content_types']['news_pictures']['template_file'] = ''; // Template file in application/views/design/templates/


		$config['content_types']['news_pictures']['custom_fields']['picture'] = array(
			'xtype' => 'filebrowserfield',
			'name' => 'picture',
			'itemId' => 'picture',
			'width' => 800,
			'labelWidth' => 200,
			'fieldLabel' => 'Снимка',
			'allowBlank' => false,
			'allowedExtensions' => 'jpg|JPG|jpeg|JPEG|gif|GIF|png|PNG',
    		'allowedExtsError' => 'Файлът трябва да е картинка!'
		);

		$config['content_types']['news_pictures']['custom_fields']['title_bg'] = array(
			'xtype' => 'textfield',
			'name' => 'title_bg',
			'itemId' => 'title_bg',
			'width' => 800,
			'labelWidth' => 200,
			'fieldLabel' => 'Описание (български)',
			'allowBlank' => true,
		);

		$config['content_types']['news_pictures']['custom_fields']['title_en'] = array(
			'xtype' => 'textfield',
			'name' => 'title_en',
			'itemId' => 'title_en',
			'width' => 800,
			'labelWidth' => 200,
			'fieldLabel' => 'Описание (английски)',
			'allowBlank' => true,
		);





//-----------------------------------------------


		$config['content_types']['about']['lang1'] = 'страница За нас';
		$config['content_types']['about']['lang2'] = 'About us page';
		$config['content_types']['about']['lang1_plural'] = 'MEMPHIS страници За нас';
		$config['content_types']['about']['lang2_plural'] = 'About us sponsors';
		$config['content_types']['about']['show_date_field'] = false; // Shows the date field in admin panel
		$config['content_types']['about']['admin_dd_sort'] = false; // false for allow column sorting (default sort by date), true for drag and drop reordering

		$config['content_types']['about']['admin_title_field'] = 'title_bg'; //Select custom field for title in the admin contents list
		$config['content_types']['about']['url_field'] = 'title_*'; //Select custom field for URL generation. If multilingual, you can put for example title_* to generate from several title fields.
		$config['content_types']['about']['new_item_text'] = 'Нова страница'; // Text for new item of this type
		$config['content_types']['about']['edit_item_text'] = 'Редактирай страница'; // Text for edit item of this type

		$config['content_types']['about']['template_file'] = ''; // Template file in application/views/design/templates/
		$config['content_types']['about']['only_edit'] = true;
		$config['content_types']['about']['custom_fields']['title_bg'] = array(
			'xtype' => 'textfield',
			'name' => 'title_bg',
			'itemId' => 'title_bg',
			'width' => 800,
			'labelWidth' => 200,
			'fieldLabel' => 'Заглавие на български',
			'allowBlank' => false
		);
		$config['content_types']['about']['custom_fields']['title_en'] = array(
			'xtype' => 'textfield',
			'name' => 'title_en',
			'itemId' => 'title_en',
			'width' => 800,
			'labelWidth' => 200,
			'fieldLabel' => 'Заглавие на английски',
			'allowBlank' => false
		);
		$config['content_types']['about']['custom_fields']['text_bg'] = array(
			'xtype' => 'tinymce_textarea',
			'name' => 'text_bg',
			'itemId' => 'text_bg',
			'width' => 900,
			'height' => 550,
			'labelWidth' => 200,
			'labelAlign' => 'top',
			'fieldLabel' => 'Съдържание на български',
			'noWysiwyg' => false,
            'tinyConfig' => 'full_cfg'
		);

		$config['content_types']['about']['custom_fields']['text_en'] = array(
			'xtype' => 'tinymce_textarea',
			'name' => 'text_en',
			'itemId' => 'text_en',
			'width' => 900,
			'height' => 550,
			'labelWidth' => 200,
			'labelAlign' => 'top',
			'fieldLabel' => 'Съдържание на английски',
			'noWysiwyg' => false,
            'tinyConfig' => 'full_cfg'
		);



//-----------------------------------------------


		$config['content_types']['home']['lang1'] = 'страница Начало';
		$config['content_types']['home']['lang2'] = 'Home page';
		$config['content_types']['home']['lang1_plural'] = 'MEMPHIS страницa Начало';
		$config['content_types']['home']['lang2_plural'] = 'Home page';
		$config['content_types']['home']['show_date_field'] = false; // Shows the date field in admin panel
		$config['content_types']['home']['admin_dd_sort'] = false; // false for allow column sorting (default sort by date), true for drag and drop reordering

		$config['content_types']['home']['admin_title_field'] = 'title_bg'; //Select custom field for title in the admin contents list
		$config['content_types']['home']['url_field'] = 'title_*'; //Select custom field for URL generation. If multilingual, you can put for example title_* to generate from several title fields.
		$config['content_types']['home']['new_item_text'] = 'Нова страница'; // Text for new item of this type
		$config['content_types']['home']['edit_item_text'] = 'Редактирай страница'; // Text for edit item of this type

		$config['content_types']['home']['template_file'] = ''; // Template file in application/views/design/templates/
		$config['content_types']['home']['only_edit'] = true;
		$config['content_types']['home']['custom_fields']['title_bg'] = array(
			'xtype' => 'textfield',
			'name' => 'title_bg',
			'itemId' => 'title_bg',
			'width' => 800,
			'labelWidth' => 200,
			'fieldLabel' => 'Заглавие на български',
			'allowBlank' => false
		);
		$config['content_types']['home']['custom_fields']['title_en'] = array(
			'xtype' => 'textfield',
			'name' => 'title_en',
			'itemId' => 'title_en',
			'width' => 800,
			'labelWidth' => 200,
			'fieldLabel' => 'Заглавие на английски',
			'allowBlank' => false
		);
		$config['content_types']['home']['custom_fields']['text_bg'] = array(
			'xtype' => 'tinymce_textarea',
			'name' => 'text_bg',
			'itemId' => 'text_bg',
			'width' => 900,
			'height' => 550,
			'labelWidth' => 200,
			'labelAlign' => 'top',
			'fieldLabel' => 'Съдържание на български',
			'noWysiwyg' => false,
            'tinyConfig' => 'full_cfg'
		);

		$config['content_types']['home']['custom_fields']['text_en'] = array(
			'xtype' => 'tinymce_textarea',
			'name' => 'text_en',
			'itemId' => 'text_en',
			'width' => 900,
			'height' => 550,
			'labelWidth' => 200,
			'labelAlign' => 'top',
			'fieldLabel' => 'Съдържание на английски',
			'noWysiwyg' => false,
            'tinyConfig' => 'full_cfg'
		);



//--------------------------------

		$config['content_types']['cast']['lang1'] = 'Актьор';
		$config['content_types']['cast']['lang2'] = 'Actor';
		$config['content_types']['cast']['lang1_plural'] = 'MEMPHIS Актьори';
		$config['content_types']['cast']['lang2_plural'] = 'Actors';
		$config['content_types']['cast']['show_date_field'] = false; // Shows the date field in admin panel
		$config['content_types']['cast']['admin_dd_sort'] = false; // false for allow column sorting (default sort by date), true for drag and drop reordering
		$config['content_types']['cast']['only_edit'] = true;

		$config['content_types']['cast']['admin_title_field'] = 'name_bg'; //Select custom field for title in the admin contents list
		$config['content_types']['cast']['url_field'] = ''; //Select custom field for URL generation. If multilingual, you can put for example title_* to generate from several title fields.

		$config['content_types']['cast']['new_item_text'] = 'Ново лого'; // Text for new item of this type
		$config['content_types']['cast']['edit_item_text'] = 'Редактирай лого'; // Text for edit item of this type

		$config['content_types']['cast']['template_file'] = ''; // Template file in application/views/design/templates/

		$config['content_types']['cast']['custom_fields']['name_bg'] = array(
			'xtype' => 'textfield',
			'name' => 'name_bg',
			'itemId' => 'name_bg',
			'width' => 800,
			'labelWidth' => 200,
			'fieldLabel' => 'Име на български',
			'allowBlank' => false
		);
		$config['content_types']['cast']['custom_fields']['name_en'] = array(
			'xtype' => 'textfield',
			'name' => 'name_en',
			'itemId' => 'name_en',
			'width' => 800,
			'labelWidth' => 200,
			'fieldLabel' => 'Име на английски',
			'allowBlank' => false
		);
		$config['content_types']['cast']['custom_fields']['picture'] = array(
			'xtype' => 'filebrowserfield',
			'name' => 'picture',
			'itemId' => 'picture',
			'width' => 800,
			'labelWidth' => 200,
			'fieldLabel' => 'Снимка',
			'allowBlank' => false,
			'allowedExtensions' => 'jpg|JPG|jpeg|JPEG|gif|GIF|png|PNG',
    		'allowedExtsError' => 'Файлът трябва да е картинка!'
		);
		$config['content_types']['cast']['custom_fields']['text_bg'] = array(
			'xtype' => 'textareafield',
			'name' => 'text_bg',
			'itemId' => 'text_bg',
			'width' => 800,
			'labelWidth' => 200,
			'fieldLabel' => 'Описание на български',
			'allowBlank' => false,
			'grow' => true
		);
		$config['content_types']['cast']['custom_fields']['text_en'] = array(
			'xtype' => 'textareafield',
			'name' => 'text_en',
			'itemId' => 'text_en',
			'width' => 800,
			'labelWidth' => 200,
			'fieldLabel' => 'Описание на английски',
			'allowBlank' => false,
			'grow' => true
		);
		$config['content_types']['cast']['custom_fields']['role_bg'] = array(
			'xtype' => 'textfield',
			'name' => 'role_bg',
			'itemId' => 'role_bg',
			'width' => 800,
			'labelWidth' => 200,
			'fieldLabel' => 'Роля на български',
			'allowBlank' => false
		);
		$config['content_types']['cast']['custom_fields']['role_en'] = array(
			'xtype' => 'textfield',
			'name' => 'role_en',
			'itemId' => 'role_en',
			'width' => 800,
			'labelWidth' => 200,
			'fieldLabel' => 'Роля на английски',
			'allowBlank' => false
		);




//--------------------------


		$config['content_types']['crew']['lang1'] = 'Екип';
		$config['content_types']['crew']['lang2'] = 'Crew';
		$config['content_types']['crew']['lang1_plural'] = 'MEMPHIS Екип';
		$config['content_types']['crew']['lang2_plural'] = 'Crew';
		$config['content_types']['crew']['show_date_field'] = false; // Shows the date field in admin panel
		$config['content_types']['crew']['admin_dd_sort'] = false; // false for allow column sorting (default sort by date), true for drag and drop reordering
		$config['content_types']['crew']['only_edit'] = true;

		$config['content_types']['crew']['admin_title_field'] = 'name_bg'; //Select custom field for title in the admin contents list
		$config['content_types']['crew']['url_field'] = ''; //Select custom field for URL generation. If multilingual, you can put for example title_* to generate from several title fields.

		$config['content_types']['crew']['new_item_text'] = 'Нов човек'; // Text for new item of this type
		$config['content_types']['crew']['edit_item_text'] = 'Редактирай човек'; // Text for edit item of this type

		$config['content_types']['crew']['template_file'] = ''; // Template file in application/views/design/templates/
		$config['content_types']['crew']['custom_fields']['name_bg'] = array(
			'xtype' => 'textfield',
			'name' => 'name_bg',
			'itemId' => 'name_bg',
			'width' => 800,
			'labelWidth' => 200,
			'fieldLabel' => 'Име на български',
			'allowBlank' => false
		);
		$config['content_types']['crew']['custom_fields']['name_en'] = array(
			'xtype' => 'textfield',
			'name' => 'name_en',
			'itemId' => 'name_en',
			'width' => 800,
			'labelWidth' => 200,
			'fieldLabel' => 'Име на английски',
			'allowBlank' => false
		);
		$config['content_types']['crew']['custom_fields']['picture'] = array(
			'xtype' => 'filebrowserfield',
			'name' => 'picture',
			'itemId' => 'picture',
			'width' => 800,
			'labelWidth' => 200,
			'fieldLabel' => 'Снимка',
			'allowBlank' => false,
			'allowedExtensions' => 'jpg|JPG|jpeg|JPEG|gif|GIF|png|PNG',
    		'allowedExtsError' => 'Файлът трябва да е картинка!'
		);
		$config['content_types']['crew']['custom_fields']['task_bg'] = array(
			'xtype' => 'textfield',
			'name' => 'task_bg',
			'itemId' => 'task_bg',
			'width' => 800,
			'labelWidth' => 200,
			'fieldLabel' => 'Задача на български',
			'allowBlank' => false
		);
		$config['content_types']['crew']['custom_fields']['task_en'] = array(
			'xtype' => 'textfield',
			'name' => 'task_en',
			'itemId' => 'task_en',
			'width' => 800,
			'labelWidth' => 200,
			'fieldLabel' => 'Задача на английски',
			'allowBlank' => false
		);
		$config['content_types']['crew']['custom_fields']['text_bg'] = array(
			'xtype' => 'textareafield',
			'name' => 'text_bg',
			'itemId' => 'text_bg',
			'width' => 800,
			'labelWidth' => 200,
			'fieldLabel' => 'Описание на български',
			'allowBlank' => true,
			'grow' => true
		);
		$config['content_types']['crew']['custom_fields']['text_en'] = array(
			'xtype' => 'textareafield',
			'name' => 'text_en',
			'itemId' => 'text_en',
			'width' => 800,
			'labelWidth' => 200,
			'fieldLabel' => 'Описание на английски',
			'allowBlank' => true,
			'grow' => true
		);


//--------------------------


		$config['content_types']['crew_creative']['lang1'] = 'Екип Криейтив';
		$config['content_types']['crew_creative']['lang2'] = 'Crew Creative';
		$config['content_types']['crew_creative']['lang1_plural'] = 'MEMPHIS Екип  Криейтив';
		$config['content_types']['crew_creative']['lang2_plural'] = 'Crew  Creative';
		$config['content_types']['crew_creative']['show_date_field'] = false; // Shows the date field in admin panel
		$config['content_types']['crew_creative']['admin_dd_sort'] = true; // false for allow column sorting (default sort by date), true for drag and drop reordering
		$config['content_types']['crew_creative']['only_edit'] = false;

		$config['content_types']['crew_creative']['admin_title_field'] = 'name_bg'; //Select custom field for title in the admin contents list
		$config['content_types']['crew_creative']['url_field'] = ''; //Select custom field for URL generation. If multilingual, you can put for example title_* to generate from several title fields.

		$config['content_types']['crew_creative']['new_item_text'] = 'Нов човек'; // Text for new item of this type
		$config['content_types']['crew_creative']['edit_item_text'] = 'Редактирай човек'; // Text for edit item of this type

		$config['content_types']['crew_creative']['template_file'] = ''; // Template file in application/views/design/templates/
		$config['content_types']['crew_creative']['custom_fields']['name_bg'] = array(
			'xtype' => 'textfield',
			'name' => 'name_bg',
			'itemId' => 'name_bg',
			'width' => 800,
			'labelWidth' => 200,
			'fieldLabel' => 'Име на български',
			'allowBlank' => false
		);
		$config['content_types']['crew_creative']['custom_fields']['name_en'] = array(
			'xtype' => 'textfield',
			'name' => 'name_en',
			'itemId' => 'name_en',
			'width' => 800,
			'labelWidth' => 200,
			'fieldLabel' => 'Име на английски',
			'allowBlank' => false
		);
		$config['content_types']['crew_creative']['custom_fields']['picture'] = array(
			'xtype' => 'filebrowserfield',
			'name' => 'picture',
			'itemId' => 'picture',
			'width' => 800,
			'labelWidth' => 200,
			'fieldLabel' => 'Снимка',
			'allowBlank' => false,
			'allowedExtensions' => 'jpg|JPG|jpeg|JPEG|gif|GIF|png|PNG',
    		'allowedExtsError' => 'Файлът трябва да е картинка!'
		);
		$config['content_types']['crew_creative']['custom_fields']['task_bg'] = array(
			'xtype' => 'textfield',
			'name' => 'task_bg',
			'itemId' => 'task_bg',
			'width' => 800,
			'labelWidth' => 200,
			'fieldLabel' => 'Задача на български',
			'allowBlank' => false
		);
		$config['content_types']['crew_creative']['custom_fields']['task_en'] = array(
			'xtype' => 'textfield',
			'name' => 'task_en',
			'itemId' => 'task_en',
			'width' => 800,
			'labelWidth' => 200,
			'fieldLabel' => 'Задача на английски',
			'allowBlank' => false
		);

