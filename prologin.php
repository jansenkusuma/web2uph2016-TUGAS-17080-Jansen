<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
</head>
<body>
<?php
require "prodb.php";

if (isset($_POST["username"]) && isset($_POST["password"])) {
	$username = $_POST["username"];
	$password = sha1($_POST["password"]);

	$conn = konek_db();

	$query = $conn->prepare("select * from tbuser where username=? and password=?");
	$query->bind_param("ss",$username,$password);

	$hasil = $query->execute();

	if ($hasil){
		$result = $query->get_result();

		if ($result->num_rows==1){
			$_SESSION["username"] = $username;
			header("Location: promain.html");
		}
	} else {
		header("Location:www.google.com");
	}
} 	else {
		echo '<script language="javascript">';
		echo 'alert("Username or Password Wrong! Try Again!")';
		echo '</script>';
	}
?>

</body>
</html>