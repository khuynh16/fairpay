<?php 
$username = $_POST['user'];
$password = $_POST['pass'];

$username = stripcslashes($username);
$password = stripcslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

mysql_connect("localhost", "root", "admin");
mysql_select_db("demo");

$result = mysql_query("select * from users where username = '$username' and password = '$password'")
	or die("Failed to query database ".mysql_error());
$row = mysql_fetch_array($result);
if ($row['username'] == $username && $row['password'] == $password){
	//echo "Login success!!! Welcome ".$row['username'];
	if($username == 'Manager') {
		header("location: ManagerAccessPage.html");
	} else {
		header("location: blankOrderPage.html");
	}
} else {
	echo "Failed to login!";
}
?> 