<!DOCTYPE html>
	<html>
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<title>AUBG  MUSICAL</title>

<style>
body{
    background-color: rgba(155, 89, 182,1.0);
}
#form_container{
    width:100%;
    max-width:330px;
    margin:auto;
    position:relative;
    top:130px;
    background-color: rgba(52, 73, 94,1.0);
    padding: 20px;;
    color:white;
    font: bold 23px/30px "Helvetica Neue", Helvetica, Arial, sans-serif;
}
*{
    margin:0px;
}
form{
    padding:0px;
    width: 100%;
    clear: both;;
}
label{
    padding: 0px;

}
input[type='text'], input[type='password']{
    margin-bottom:20px;
    margin-top:0px;
    width:100%;
    height:45px;
    background-color: rgba(189, 195, 199,1.0) !important;
    font: bold 23px/36px "Helvetica Neue", Helvetica, Arial, sans-serif;
}
input[type='checkbox']{
    margin:15px 0px;

}
input[type='submit']{
    margin-top:20px;
    width: 100%;
    color:white;
    height:45px;
    background-color: rgba(39, 174, 96,1.0);
    border:1px solid rgba(39, 174, 96,1.0);
    font: bold 23px/36px "Helvetica Neue", Helvetica, Arial, sans-serif;
    cursor: pointer;;
}
h3{
    font: bold 23px/36px "Helvetica Neue", Helvetica, Arial, sans-serif;
    margin-bottom: 20px;;
}
</style>
		</head>
	
<body>



    <div id="infoMessage"><span style="color:red;"><?php echo $message;?></span></div>

    <div id="form_container">
       
        <?php echo form_open("auth/login");?>

              <p>
                <label for="identity">User:</label>
                <?php echo form_input($identity);?>
              </p>

              <p>
                <label for="password">Password:</label>
                <?php echo form_input($password);?>
              </p>

              <p>
                <label for="remember">Remember Me:</label>
                <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
              </p>


              <p><?php echo form_submit('submit', 'Enter');?></p>

        <?php echo form_close();?>
    </div>


</body>
	</html>