<!doctype html>
<html lang="en">
<?php
session_start();
$servername="localhost";
$username="root";
$password="";
$database="project";
$conn=mysqli_connect($servername,$username,$password,$database);
if($_SERVER['REQUEST_METHOD']=="POST")
{
$name=$_POST['name'];
$email=$_POST['email'];
$stop=$_POST['end'];
$prn=$_POST['prn'];
$phon=$_POST['phon'];
$dep=$_POST['dep'];
$type=$_POST['type'];
$degree=$_POST['degree'];
$one=1;
$approve=0;
echo$name;
echo$email;
$sql="insert into `info` (`name`,`email`,`prn`,`phon`,`end`,`dep`,`degree`,`created`,`approve`) values ('$name','$email','$prn','$phon','$stop','$dep','$degree','$one','$approve')";
// $sql="insert into `info` (`name`,`email`,) values ('$name','$email')";
// $sql2="insert into `info` (`stop`,`route`,`phon`,`dep`,`degree`) values ('$stop','$route','$phon','$dep','$degree')";
// $sql="INSERT INTO `info` (`name`, `email`, `prn`, `type`, `end`, `phon`, `route`, `dep`, `degree`, `regdate`, `approve`, `created`) VALUES ('xyz', 'xyz', 'xyz', 'xyz', 'xyz', 'xyz', 'xyz', 'z', 'z', current_timestamp(), '0', '1')";
// $result=mysqli_query($conn,$sql);
// $sql="insert into `info`(`name`,`email`,`prn`,`phon`,`end`,`dep`,`created`) values('$name','$email','$prn','$phon','$stop','$dep','$one')";
$result=mysqli_query($conn,$sql);
if(!$result)
{
echo"Your Accout Alresdy Exist";
echo'<a href="payment.php"> Now Continue to payment</a>';
}
else{
    echo'<a href="payment.php"> Now Continue</a>';

}



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
                        <a class=" fw-bold nav-link active text-black" aria-current="page" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class=" fw-bold nav-link active text-black" aria-current="page" href="viewroutes.php">Bus
                            Routes</a>
                    </li>
                    <li class="nav-item">
                        <a class=" fw-bold nav-link active text-black" aria-current="page" href="Contact.html">contact
                            Us</a>
                    </li>
                    <li class="nav-item">
                        <a class=" fw-bold nav-link active text-black" aria-current="page" href="about.html">About us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
          
           <form method="post" action=/PBL/Createpass.php>
                                <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Create Your New Pass Here</h2>
                              

                                <div class="form-outline form-white mb-4">
                                    <input type="text" name="name" id="name" class="form-control form-control-lg" />
                                    <label class="form-label" name="name" id="name" for="typeEmailX">Full Name</label>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input  name="email" id="email" class="form-control form-control-lg" />
                                    <label class="form-label" name="email" id="email" >Email</label>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input  name="prn" id="prn" class="form-control form-control-lg" />
                                    <label class="form-label" name="prn" id="prn" >PRN</label>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input  name="type" id="type" class="form-control form-control-lg" />
                                    <label class="form-label" name="type" id="type" >Pass Type(Monthly/Semester Wise)</label>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input  name="end" id="end" class="form-control form-control-lg" />
                                    <label class="form-label" name="end" id="end" >Stop</label>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input  name="phon" id="end" class="form-control form-control-lg" />
                                    <label class="form-label" name="phon" id="end" >Mobile Number</label>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input  name="dep" id="end" class="form-control form-control-lg" />
                                    <label class="form-label" name="dep" id="end" >Department</label>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input  name="degree" id="end" class="form-control form-control-lg" />
                                    <label class="form-label" name="degree" id="end" >Degree</label>
                                </div>

                                <button class="btn btn-outline-light btn-lg px-5" type="submit">Create Pass</button>
                            </div>
                        </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>