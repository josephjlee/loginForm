<html>
<head>
<title>
Sign Up </title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
</head>
<body>
<div id="login">
<h3>Sign Up</h3>
<?php
echo form_open('loginController/signup'); 
?>
<div id="error">
<?php
//print any login errors 
if(isset($msg))
{
    echo $msg;
}
//print validation errors
echo validation_errors(); 
?>
</div>
<?php

echo form_label('UserName :');
echo form_input('username');
echo '<br/>';

echo form_label('Email :');

$data=array(
'type'=>'email','name'=>'email');

echo form_input($data);

echo '<br/>';

echo form_label('Password :');
echo form_password('password');
echo '<br/>';
echo form_submit('submit','Sign Up');
echo '<br/>';
echo form_close();
echo '<a href="'.base_url().'index.php/loginController" id="hrefBtn"> Log In</a>';

?>

</div>
</body>
</html>