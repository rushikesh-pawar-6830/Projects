<!doctype html>
<html lang="en">
<?php
session_start();
$user=$_SESSION['login_user'];
$db=mysqli_connect("localhost","root","","project");
$sql="select * from `info` where prn='$user'  ";
$result=mysqli_query($db,$sql);
while($row=mysqli_fetch_assoc($result))
{
    $res=$row['approve'];
}
?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
     integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <title>ADD STUDENT INFORMATION!</title>
    <style>
        body
        {
            background-color: bisque;
        }
        </style>
</head>
<body>
    <div class="container"><div class="card my-5" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Approval Status</h5>
    <?php
    if($res==1)
    echo'
    <h6 class="card-subtitle mb-2 text-muted my-5">Approved</h6>';
    else if($res==0)
    echo'
    <h6 class="card-subtitle mb-2 text-muted my-5">PENDING...</h6>';
    else
    echo'
    <h6 class="card-subtitle mb-2 text-muted my-5">Rejected.... You can fill Form Again And your money will be refunded back from student section</h6>';
    ?>
   
    
  </div>
</div>
</div>
</body>
</html>