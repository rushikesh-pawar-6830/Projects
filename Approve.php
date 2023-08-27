<?php
$db=mysqli_connect("localhost","root","","project");
$prn=$_GET['prn'];
$sql="DELETE FROM `payment` where prnno='$prn'";
$sql2="UPDATE `info` SET `Approve` = 1 where prn='$prn'";
$result=mysqli_query($db,$sql2);
mysqli_query($db,$sql);
?>