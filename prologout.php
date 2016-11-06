<?php 
session_start();
session_destroy();
echo "<script>alert('Successfully Logout! See You Again Next Time !')</script>";
echo "<script>window.location.href='prologin.html'</script>";
?>