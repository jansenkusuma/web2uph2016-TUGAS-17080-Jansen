<?php
session_start();

if (isset($_SESSION["username"])){
	$username = $_SESSION["username"];
}else{
	header("Location: prologin.html");
}

require_once "prodb.php";
$conn = konek_db();

if (! isset($_GET['username']))
	die("Username Not Exists");

$username = $_GET['username'];
$query = $conn->prepare("select * from tbuser where username=?");
$query->bind_param("s",$username);
$result = $query->execute();

if (! $result) {
	die("Query Select from Database Failed!");
}

$rows = $query->get_result();
if($rows->num_rows == 0)
	die("Username Not Exists");

if (isset($_POST["name"]) && isset($_POST["email"])) {
	
	$fullname = $_POST["name"];
	$email = $_POST["email"];

	if ($fullname <> "" && $email <>"") {
		$query = $conn->prepare("Update tbuser set fullname=?, email=? where username=?");
		$query->bind_param("sss",$fullname,$email,$username);
		$result = $query->execute();

		if (! $result)
			die("Update Gagal");
		else{
			echo "<script>alert('User Data Updated!')</script>";
			echo "<script>window.location.href='proaccount.php'</script>";
		}
	}
} else {
	header("Location: proupdate.php");
}
?>