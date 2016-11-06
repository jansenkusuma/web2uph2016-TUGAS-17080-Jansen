<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
</head>
<body>
<?php
require "prodb.php";

if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["cpassword"])) {
	$name = $_POST["name"];
	$email = $_POST["email"];
	$username = $_POST["username"];
	$password = sha1($_POST["password"]);
	$cpassword = sha1($_POST["cpassword"]);

	if ($password == $cpassword) {
		$conn = konek_db();

		$query = $conn->prepare("Insert into tbuser(fullname,email,username,password) values(?,?,?,?)");
		$query->bind_param("ssss", $name,$email,$username,$password);

		$hasil = $query->execute();

		if ($hasil){
			echo "<h1>You're Succesfully Registered.</h1>";
			header("Location: prologin.html");
		}
		} else {
			echo "<script>alert('Password doesn't match!')</script>";
			echo "<script>window.location.href='proregister.html'</script>";
		}
	} 	else {
			echo "<script>alert('Cannot Register New Member!')</script>";
			echo "<script>window.location.href='proregister.html'</script>";
		}
?>

</body>
</html>