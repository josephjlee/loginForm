<html>
<head>
<title>
Login form</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
</head>
<body>
<div id="login">
<h3>Login Form</h3>
<?php
echo form_open('loginController/login'); 
?>
<div id="error">
<?php

//print any login errors 
if(isset($loginError))
{
    echo $loginError;
}
//print validation errors
echo validation_errors(); 
?>
</div>
<label>User Name :</label>
<input type="text" name="userName" id="name" placeholder="type your name here" /><br />

<label>Password :</label>
<input type="password" name="userPassword" id="password" placeholder="type your password here" /><br />

<input type="submit" name="submit" value="login"/> <br />

<a href="<?php echo base_url();?>index.php/loginController/showSignup" id="hrefBtn"> Sign up</a>

<?php
echo form_close(); 
?>
</div>
</body>
</html>