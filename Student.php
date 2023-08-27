<!doctype html>
<html lang="en">
<?php
session_start();
$servername="localhost";
$username="root";
$password="";
$database="project";
$temp=0;
$conn=mysqli_connect($servername,$username,$password,$database);
if($_SERVER['REQUEST_METHOD']=="POST")
{
$username=$_POST['username'];
$password=$_POST['pass'];
$sql="select * from student where username='$username' AND password='$password'";
$_SESSION['login_user']=$username;
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num==1)
{
    header("location:createpass.php");
}
else{
    echo"Error";
}
echo$_SESSION['login_user'];

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
                        <a class=" fw-bold nav-link active text-black" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class=" fw-bold nav-link active text-black" aria-current="page" href="about.html">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class=" fw-bold nav-link active text-black" aria-current="page" href="viewroutes.php">Bus
                            Routes</a>
                    </li>
                    <li class="nav-item">
                        <a class=" fw-bold nav-link active text-black" aria-current="page" href="Contact.html">contact
                            Us</a>
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
          
           <form method="post" action=/PBL/Student.php>"
                                <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Student Login</h2>
                                <p class="text-white-50 mb-5">Please enter your username and password!</p>

                                <div class="form-outline form-white mb-4">
                                    <input type="text" name="username" id="username" class="form-control form-control-lg" />
                                    <label class="form-label" name="username" id="username" for="typeEmailX">Username</label>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input type="password" name="pass" id="pass" class="form-control form-control-lg" />
                                    <label class="form-label" name="pass" id="pass" for="typePasswordX">Password</label>
                                </div>

                                <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a>
                                </p>

                                <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
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