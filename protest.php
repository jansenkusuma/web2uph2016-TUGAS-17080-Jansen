<!DOCTYPE html>
<html>
<head>
	<title>Contoh membaca data dari </title>
</head>
<body>

<?php
require_once "prodb.php";

$conn = konek_db();
$query = $conn->prepare("select * from tbuser");
$result = $query->execute();

if(! $result)
	die("Gagal Query");

$rows = $query->get_result();
?>

<?php
while ($row = $rows->fetch_array()){
	$url_edit = "edit.php?id=" . $row['username'];
	$url_delete = "delete.php?id=" . $row['username'];

	echo "<table>";
	echo "<tr><th>Username</th><td>" . $row['username'] . "</td></tr>";
	echo "<tr><th>Fullname</th><td>" . $row['fullname'] . "</td></tr>";
	echo "<tr><th>Email</th><td>" . $row['email'] . "</td></tr>";
	//echo "<td><img src=\"$url_image\" style=\"width:240px;\"></td>";
	echo "<tr><td><a href='" . $url_edit . "'><button>Edit</button></a> <a href='" . $url_delete . "'><button>Hapus</button></a></td></tr>";
	echo "</table>";
}
?>

</body>
</html>