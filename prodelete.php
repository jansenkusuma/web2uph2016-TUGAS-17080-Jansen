<?php
require_once "prodb.php";

$conn = konek_db();

if(! isset($_GET["username"]))
	die("Tidak ada Username");

$username = $_GET["username"];
$query = $conn->prepare("select * from tbuser where username=?");
$query->bind_param("s",$username);
$result = $query->execute();

if (! $result)
	die("Gagal Query");

$rows = $query->get_result();
if ($rows->num_rows == 0)
	die("Username tidak ditemukan");


$query = $conn->prepare("delete from tbuser where username=?");
$query->bind_param("s",$username);
$result = $query->execute();

if($result){
	echo "<p>Data user berhasil dihapus</p>";
	echo "<a href=prologin.html><button>BACK</button></a>";
}
else
	echo "<p>Gagal menghapus data produk</p>";
?>