<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="main.css">
<head>
	<title>Manage Account</title>
</head>
<body>
<?php
session_start();
if (isset($_SESSION["username"])){
	$username = $_SESSION["username"];
}else{
	header("Location: prologin.html");
}
require_once "prodb.php";

$conn = konek_db();
$query = $conn->prepare("select * from tbuser where username=?");
$query->bind_param("s", $username);
$result = $query->execute();

if(! $result)
	die("Gagal Query");

$rows = $query->get_result();
?>


<div class="wrapper">
	<div class="wrappertengah">
		<div class="header">
			<div class="dropdown">
 				<button class="dropbtn"><p class="entypo-dot-3"></p></button>
  					<div class="dropdown-content">
    					<a href="proaccount.php">Manage Account</a>
    					<a href="prologout.php">Logout</a>
  					</div>
			</div>
		</div>
		<div class="isi">
			<?php
				while ($row = $rows->fetch_array()){
					$url_edit = "proupdate.php?username=" . $row['username'];
					$url_delete = "prodelete.php?username=" . $row['username'];

					echo "<table>";
					echo "<tr><th>Username</th><td>" . $row['username'] . "</td></tr>";
					echo "<tr><th>Fullname</th><td>" . $row['fullname'] . "</td></tr>";
					echo "<tr><th>Email</th><td>" . $row['email'] . "</td></tr>";
					echo "<tr><td>
					<a href='" . $url_edit . "'><button>Update Data</button></a> 
					<a href='" . $url_delete . "'><button>Hapus</button></a>
					</td></tr>";
					echo "</table>";
				}
			?>
		</div>
		<div class="footer">
			
		</div>
	</div>
</div>

</body>
</html>