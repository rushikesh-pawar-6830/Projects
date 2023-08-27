<?php
session_start();
$db=mysqli_connect("localhost","root","","project");
$user=$_GET['prn'];
        $query = " select * from payment where prnno='$user'";
        $result = mysqli_query($db, $query);
 
        while ($data = mysqli_fetch_assoc($result)) {
     ?>
         <img src="./image/<?php echo $data['filename']; ?>">
 
 <?php
         }
     ?>