<?php 
session_start();
session_destroy();
echo "<script>alert('You're Logout Already!)</script>";
echo "<script>window.location.href='prologin.html'</script>";
?>