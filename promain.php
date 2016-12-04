<?php
session_start();
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="main.css">
<head>

	<title>Jeka's Project</title>
</head>
<body>

<?php
$sessionusername = $_SESSION['username'];
require_once "prodb.php";
$conn = konek_db();

$query = $conn->prepare("select * from tbdiary where username='" . $sessionusername . "' order by idDiary desc");
$result = $query->execute();


if (! $result)
	die("gagal query");
$rows = $query->get_result();

?>

<div class="wrapper">
	<div class="wrappertengah">
		<div class="header">
			<div class="imagecontainer">
				<a href="promain.php"><img src="diary.png"></a>
			</div>
			<div class="dropdown">
 				<button class="dropbtn"><p class="entypo-dot-3"></p></button>
  					<div class="dropdown-content">
    					<a href="proaccount.php">Manage Account</a>
    					<a href="prologout.php">Logout</a>
  					</div>
			</div>
		</div>

		<div class="body">
  	<?php
	while ($row = $rows->fetch_array()){
		$url_edit = "proeditdiary.php?idDiary=" . $row['idDiary'];
		$url_delete = "prodeletediary.php?idDiary=" . $row['idDiary'];
		echo "<div class='diarycontainer'>";
		echo "<div class='diarytitle'>" . $row['diarytitle'] . "</div>";
		echo "<div class='diarycontent'>" . $row['diarycontent'] . "</div>";
		echo "
			<div class='action'>
				<a href='" . $url_edit . "'><button>Edit</button></a> 
				<a href='" . $url_delete . "'><button>Hapus</button></a>
			</div>";
		echo "</div>";
	}

	?>
		</div>
		<div class="footer">
			<a href="proadddiary.html" class="tipe1">ADD NEW DIARY</a>
		</div>
	</div>
</div>

</body>
</html>