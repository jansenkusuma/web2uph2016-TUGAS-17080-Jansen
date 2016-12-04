<?php
session_start();
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="main.css">
<head>
	<title>Update User Data</title>
</head>
<body>

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
	die("User tidak ditemukan");

$data = $rows->fetch_object();


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
			<form method="post" action="proupdatesql.php?username=<?php echo $data->username ?>" enctype="multipart/form-data">
				<table> 
					<tr>
						<th>Username : </th>
						<td><label><?php echo $username ?></label></td>
					</tr>
					<tr>
						<th>Fullname :</th>
						<td><input type="text" name="name" value="<?php echo $data->fullname ?>"></td>
					</tr>
					<tr>
						<th>Email :</th>
						<td><input type="text" name="email" value="<?php echo $data->email ?>"></td>
					</tr>
					<tr>
						<td>
							<input type="submit" name="update" value="Update">
						</td>
					</tr>
				</table>
			</form>
		</div>
		<div class="footer">
			
		</div>
	</div>
</div>
</body>
</html>