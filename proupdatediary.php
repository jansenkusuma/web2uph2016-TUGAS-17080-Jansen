<?php
session_start();

if (isset($_SESSION["username"])){
	$username = $_SESSION["username"];
}else{
	header("Location: prologin.html");
}

require_once "prodb.php";
$conn = konek_db();

if (! isset($_GET["idDiary"]))
	die("ID not found");

$idDiary = $_GET["idDiary"];
$query = $conn->prepare("select * from tbdiary where idDiary=?");
$query->bind_param("i", $idDiary);
$result = $query->execute();
$rows = $query->get_result();
if ($rows->num_rows == 0)
	die("Produk tidak ditemukan");

	if (isset($_POST["diarytitle"]) && isset($_POST["diarycontent"])) {
		$diarytitle = $_POST["diarytitle"];
		$diarycontent = $_POST["diarycontent"];
		$query = $conn->prepare("update tbdiary set diarytitle=?, diarycontent=? where idDiary=?");
		$query->bind_param("ssi", $diarytitle, $diarycontent, $idDiary);
		$result = $query->execute();

		if (! $result)
			die("Update Gagal");
		else{
			echo "<script>alert('Diary Updated!')</script>";
			echo "<script>window.location.href='promain.php'</script>";
		}
	}

?>