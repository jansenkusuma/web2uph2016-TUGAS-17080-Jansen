<?php
session_start();
$sessionusername = $_SESSION['username'];
require "prodb.php";

if (isset($_POST["diarytitle"]) && isset($_POST["diarycontent"])) {
	$diarytitle = $_POST["diarytitle"];
	$diarycontent = $_POST["diarycontent"];


		$conn = konek_db();

		$query = $conn->prepare("Insert into tbdiary(diarytitle,diarycontent,username) values(?,?,?)");
		$query->bind_param("sss", $diarytitle,$diarycontent,$sessionusername);

		$hasil = $query->execute();

		if ($hasil){
			echo "<script>alert('Congratulation! Your Diary Successfully Added!')</script>";
			echo "<script>window.location.href='promain.php'</script>";
		}
}
?>