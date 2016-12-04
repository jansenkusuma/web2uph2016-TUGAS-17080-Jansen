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
require_once "prodb.php";

$conn = konek_db();

if(! isset($_GET["idDiary"]))
	die("Tidak ada ID");

$idDiary = $_GET["idDiary"];
$query = $conn->prepare("select * from tbdiary where idDiary=?");
$query->bind_param("s",$idDiary);
$result = $query->execute();

if (! $result)
	die("Gagal Query");

$rows = $query->get_result();
if ($rows->num_rows == 0)
	die("Diary tidak ditemukan");

$data = $rows->fetch_object();
$vartitle=$data->diarytitle;
$varcontent=$data->diarycontent;
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

		<form method="post" action="proupdatediary.php?idDiary=<?php echo $idDiary ?>" enctype="multipart/form-data">
        <h2>Edit Your Diary Now!</h2>
        <table>
        	<tr>
	            <td><input type="text" name="diarytitle" placeholder="Enter Your Diary Title!" class="tf" value="<?php echo $vartitle ?>"></td>
	        </tr>
            <tr>
                <td><textarea rows="4" cols="70" name="diarycontent" class="tf"><?php echo $varcontent ?></textarea></td>
            </tr>
            <td><input type="submit" name="updatediary" value="UPDATE DIARY"></td>
        </table>
    </form>


		<div class="footer">
		</div>
	</div>
</div>

</body>
</html>