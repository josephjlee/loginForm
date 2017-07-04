<?php
if(isset($this->session->userdata['signedIn']))
{
    $name=$this->session->userdata['signedIn']['name'];
    $email=$this->session->userdata['signedIn']['email'];
} 
else
{
    redirect(base_url().'index.php/login');
}
?>
<html>
<head>
<title>
Admin Page</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
</head>
<body>
<div id="profile">


<?php

echo 'Wellcome <strong>'.$name.'</strong>';
echo '<br/><br/>';

echo 'your username is '.$name;
echo '<br/><br/>';
echo 'your email is '.$email;
echo '<br/><br/>';
?>

<a href="<?php echo base_url();?>index.php/loginController/logout" id="hrefBtn">logout</a>

</div>
</body>
</html>