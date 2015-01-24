<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Adminche</title>
    <script language="JavaScript" type="text/javascript">
    	var base_url = '<?php echo($base_url); ?>';
    	var settings_cfg = <?php echo(json_encode($settings)); ?>;
		var image_profiles = <?php echo(json_encode($image_profiles)); ?>;
    
    </script>
    <script src="<?php echo($base_url); ?>libraries/extjs/ext-all-debug.js"></script>
    <script src="<?php echo($base_url); ?>libraries/extjs/ux/Ext.ux.FileField.js"></script>
    <link rel="stylesheet" href="<?php echo($base_url); ?>libraries/extjs/resources/css/ext-all.css">
    <link rel="stylesheet" href="<?php echo($base_url); ?>libraries/admin.css">
    <script type="text/javascript" src="<?php echo($base_url); ?>libraries/extjs/ux/tinymce/tiny_mce_src.js"></script>
    <script type="text/javascript" src="<?php echo($base_url); ?>libraries/extjs/ux/TinyMCETextArea.js"></script>

    <script type="text/javascript" src="<?php echo($base_url); ?>libraries/admin_ui.js"></script>

</head>
<body></body>
</html>