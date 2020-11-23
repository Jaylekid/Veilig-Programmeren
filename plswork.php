<?php
	$email = $POST['mail'];
	$password = $['password'];

	//geen sql injection
	$email = stripcslashes($email);
	$password = stripcslashes($password);
	$email = mysql_real_escape_string($email);
	$password = mysql_real_escape_string($password);

	//connect met die klote DB
	mysql_connect("localhost", "root", "");
	mysql_select_db("user");

	$result = mysql_query("select * from user where email = '$email' and password = '$password'")
			or die("Failed to querry database ".mysql_error());
	$row = mysql_fetch_array($result);
	if ($row['email'] == $email && $row['password'] == $password) {
	 	echo "Succesfull login!";
	 } else {
	 	echo "Unsuccesfull login!";
	 }
?>