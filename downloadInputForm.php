<?php

require($_SERVER['DOCUMENT_ROOT']."/template_top.inc"); 


if ($_GET['error'] == "1") {
   $error_code = 1;  //this means that there's been an error and we need to notify the customer
}


?>

<h3>Register Now</h3>
<?
if ($error_code) {
echo "<div style='color:red'>Please help us with the following:</div>";
}
//this is a form for users to input their name and email for registration
?>

Please enter your name and email address in order to download the file.  Thank you!<br/><br/>
<form method="GET" action="Lesson13process.php">
<table>
<tr>
<td align="right">
Name:
</td>
<td align="left">
<?
if ($_COOKIE['name']) {
   echo $_COOKIE['name'];
}
else {
?>
<input type="text" size="25" name="name" required value="<? echo $_GET['name']; ?>" />
<input type="checkbox" name="remember" /> Remember me on this computer
<?
}
if ($error_code && !($_GET['name'] || $_COOKIE['name'])) {
   echo "<b>Please include your name.</b>";
}
?>
</td>
</tr>
<tr>
<td align="right">
Email:
</td><td align="left">
<?
if ($_COOKIE['email']) {
   echo $_COOKIE['email'];
}
else {
?>
<input type="email" size="25" name="email" required placeholder="Enter a valid email address" value="<? echo $_GET['email']; ?>" />
<?
}
if ($error_code && !($_GET['email'] || $_COOKIE['email'])) {
   echo "<b>Please include your email address.</b>";
}
?>
</td>
</tr>
<tr>
<td colspan="2" align="center">
<input type="hidden" name="redirect" value="<?php echo $redirect ?>" />
<input type="submit" value="SUBMIT" />
</td></tr>
</table>
</form>

<?
   require($_SERVER['DOCUMENT_ROOT']."/template_bottom.inc"); 
?>




