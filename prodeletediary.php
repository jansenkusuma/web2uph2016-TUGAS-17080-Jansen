<?php
require_once "prodb.php";

$conn = konek_db();

if(! isset($_GET["idDiary"]))
	die("Tidak ada ID");

$idDiary = $_GET["idDiary"];
$query = $conn->prepare("select * from tbdiary where idDiary=?");
$query->bind_param("i",$idDiary);
$result = $query->execute();

if (! $result)
	die("Gagal Query");

$rows = $query->get_result();
if ($rows->num_rows == 0)
	die("Diary tidak ditemukan");

$query = $conn->prepare("delete from tbdiary where idDiary=?");
$query->bind_param("i",$idDiary);
$result = $query->execute();

if($result){
	echo "<script>alert('Diary Deleted!')</script>";
	echo "<script>window.location.href='promain.php'</script>";
}
else
	echo "<p>Gagal menghapus data produk</p>";
?>

