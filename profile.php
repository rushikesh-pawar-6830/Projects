<!doctype html>
<html lang="en">
<?php
session_start();
$nam=$_SESSION['login_user'];
$servername="localhost";
$username="root";
$password="";
$database="project";
$conn=mysqli_connect($servername,$username,$password,$database);
$sql="select * from info where prn='$nam'";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result))
{
    $name=$row['name'];
    $email=$row['email'];
    $route=$row['end'];
    $phone=$row['phon'];
    $dep=$row['dep'];
    $degree=$row['degree'];
    $Approve=$row['approve'];
    $created=$row['created'];

}
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
    body {
            background-color: palegoldenrod;
        }
    .mainpage
    {
        background-color: palegoldenrod;  
    }

.padding {
    padding: 3rem !important
}

.user-card-full {
    overflow: hidden;
}

.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 20px 0 rgba(69,90,100,0.08);
    box-shadow: 0 1px 20px 0 rgba(69,90,100,0.08);
    border: none;
    margin-bottom: 30px;
}

.m-r-0 {
    margin-right: 0px;
}

.m-l-0 {
    margin-left: 0px;
}

.user-card-full .user-profile {
    border-radius: 5px 0 0 5px;
}

.bg-c-lite-green {
        background: -webkit-gradient(linear, left top, right top, from(#f29263), to(#ee5a6f));
    background: linear-gradient(to right, #ee5a6f, #f29263);
}

.user-profile {
    padding: 20px 0;
}

.card-block {
    padding: 1.25rem;
}

.m-b-25 {
    margin-bottom: 25px;
}

.img-radius {
    border-radius: 5px;
}


 
h6 {
    font-size: 14px;
}

.card .card-block p {
    line-height: 25px;
}

@media only screen and (min-width: 1400px){
p {
    font-size: 14px;
}
}

.card-block {
    padding: 1.25rem;
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0;
}

.m-b-20 {
    margin-bottom: 20px;
}

.p-b-5 {
    padding-bottom: 5px !important;
}

.card .card-block p {
    line-height: 25px;
}

.m-b-10 {
    margin-bottom: 10px;
}

.text-muted {
    color: #919aa3 !important;
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0;
}

.f-w-600 {
    font-weight: 600;
}

.m-b-20 {
    margin-bottom: 20px;
}

.m-t-40 {
    margin-top: 20px;
}

.p-b-5 {
    padding-bottom: 5px !important;
}

.m-b-10 {
    margin-bottom: 10px;
}

.m-t-40 {
    margin-top: 20px;
}

.user-card-full .social-link li {
    display: inline-block;
}

.user-card-full .social-link li a {
    font-size: 20px;
    margin: 0 10px 0 0;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}



    </style>
</head>

<body>
   
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarCenteredExample" aria-controls="navbarCenteredExample" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarCenteredExample">
                <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                        <button type="button" class="btn btn-outline-primary mx-3"><a class=" fw-bold nav-link active text-white" aria-current="page" href="index.php">Home</a></button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-outline-primary mx-3"><a class=" fw-bold nav-link active text-white" aria-current="page" href="Profile.php">Profile</a></button>
                    </li>
                    <li class="nav-item"> <button type="button" class="btn btn-outline-primary mx-3"><a class=" fw-bold nav-link active text-white" aria-current="page" href="createpass.php">Create Pass</a></button> 
                    </li>
                    <?php
                    if($Approve==1)
    {                  echo'  <li class="nav-item">
                        <button type="button" class="btn btn-outline-primary mx-3"><a class=" fw-bold nav-link active text-white" aria-current="page" href="pass_detail.php">Pass Details</a></button>
                    </li>
                    <li class="nav-item">
                      <!-- <button class="btn btn-outline-light btn-lg px-3">  <a class=" fw-bold nav-link active text-black" aria-current="page" href="Contact.html">Renew Pass</a></button> -->
                      <button type="button" class="btn btn-outline-primary mx-3"><a class=" fw-bold nav-link active text-white" aria-current="page" href="renew.php">Renew Pass</a></button>
                    </li>';
    }
    ?>
   
        <li class="nav-item">
        <button type="button" class="btn btn-outline-primary mx-3"><a class=" fw-bold nav-link active text-white" aria-current="page" href="Approval_status.php">Approval Status</a></button>
   
                    

                </ul>
            </div>
        </div>
    </nav>
    <div class="mainpage">
    <div class="container my-5">

        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div class="row container d-flex justify-content-center">
        <div class="col-xl-6 col-md-12">
                                                        <div class="card user-card-full">
                                                            <div class="row m-l-0 m-r-0">
                                                                <div class="col-sm-4 bg-c-lite-green user-profile">
                                                                    <div class="card-block text-center text-white">
                                                                        <div class="m-b-25">
                                                                            <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image">
                                                                        </div>
                                                                        <h6 class="f-w-600"><?php echo$name ?></h6>
                                                                       
                                                                        <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <div class="card-block mx-3">
                                                                        <h4 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h4>
                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                <p class="m-b-10 f-w-600">Email</p>
                                                                                <h6 class="text-muted f-w-400"><?php echo$email ?></h6>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <p class="m-b-10 f-w-600">Phone</p>
                                                                                <h6 class="text-muted f-w-400"><?php echo$phone ?></h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row my-3">
                                                                            <div class="col-sm-6">
                                                                                <p class="m-b-10 f-w-600">Department</p>
                                                                                <h6 class="text-muted f-w-400"><?php echo$dep ?></h6>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <p class="m-b-10 f-w-600">Stop</p>
                                                                                <h6 class="text-muted f-w-400"><?php echo$route ?></h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                <p class="m-b-10 f-w-600">Degree</p>
                                                                                <h6 class="text-muted f-w-400"><?php echo$degree ?></h6>
                                                                            </div>
                                                                        
                                                                        </div>
                                                                        <ul class="social-link list-unstyled m-t-40 m-b-10">
                                                                            <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                                                                            <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                                                                            <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                     </div>
                                                        </div>
                                                    </div>
      </div>
    </div>
</body>

</html>