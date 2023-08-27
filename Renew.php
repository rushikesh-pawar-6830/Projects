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
    $prn=$row['prn'];
    $stop=$row['end'];
    $date=$row['regdate'];
    
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;900&display=swap');

        * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box
        }

        body {
            font-family: "Poppins-Regular";
            font-size: 15px;
            color: #666;
            background-color: #6645eb;
            margin: 0
        }


        .wrapper {
            max-width: 600px;
            height: 100vh;
            margin: auto;
            display: flex;
            align-items: center
        }

        .wrapper .image-holder {
            width: 51%
        }

        .wrapper form {
            width: 100%
        }

        .wizard>.steps .current-info,
        .wizard>.steps .number {
            display: none
        }

        #wizard {
            min-height: 570px;
            background: #fff;
            margin-right: 60px;
            padding: 107px 75px 65px;
            margin-top: 20px;
            margin-bottom: 20px
        }

               @media (max-width: 1500px) {
            .wrapper {
                height: auto
            }
        }

        @media (max-width: 1199px) {
            .wrapper {
                height: 100vh
            }

            #wizard {
                margin-right: 40px;
                min-height: 829px;
                padding-left: 60px;
                padding-right: 60px
            }
        }

        @media (max-width: 991px) {
            .wrapper {
                justify-content: center
            }

            .wrapper .image-holder {
                display: none
            }

            .wrapper form {
                width: 60%
            }

            #wizard {
                margin-right: 0;
                padding-left: 40px;
                padding-right: 40px
            }
        }

        @media (max-width: 767px) {
            .wrapper {
                height: auto;
                display: block
            }

            .wrapper .image-holder {
                width: 100%;
                display: block
            }

            .wrapper form {
                width: 100%
            }

            #wizard {
                min-height: unset;
                padding: 70px 20px 40px
            }

            .form-row.form-group {
                display: block
            }

            .form-row.form-group .form-holder {
                width: 100%;
                margin-right: 0;
                margin-bottom: 24px
            }

            .item .purchase {
                margin-left: 11px
            }
        }
        .card {
            border: 0;
            border-radius: 0px;
            margin-bottom: 30px;
            -webkit-box-shadow: 0 2px 3px rgba(0, 0, 0, 0.03);
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.03);
            -webkit-transition: .5s;
            transition: .5s
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
                        <button type="button" class="btn btn-outline-primary mx-3"><a
                                class=" fw-bold nav-link active text-white" aria-current="page"
                                href="profile.php">Profile</a></button>
                    </li>
                    <li class="nav-item"> <button type="button" class="btn btn-outline-primary mx-3"><a
                                class=" fw-bold nav-link active text-white" aria-current="page"
                                href="create_pass.php">Create Pass</a></button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-outline-primary mx-3"><a
                                class=" fw-bold nav-link active text-white" aria-current="page" href="pass_detail.php">Pass
                                Details</a></button>
                    </li>
                    <li class="nav-item">
                        <!-- <button class="btn btn-outline-light btn-lg px-3">  <a class=" fw-bold nav-link active text-black" aria-current="page" href="Contact.html">Renew Pass</a></button> -->
                        <button type="button" class="btn btn-outline-primary mx-3"><a
                                class=" fw-bold nav-link active text-white" aria-current="page" href="Renew.php">Renew
                                Pass</a></button>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <!-- JQUERY STEP -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>
        <div class="wrapper">
            <form action="">
                <div id="wizard">
                    <!-- SECTION 1 -->
                    <h2 class="mx-5">Renew Pass</h2>
                    <section>
                       <h5> <div class="form-row my-4 mx-10"> Name:-<?php echo$name?></div></h5>
                       <h5> <div class="form-row my-4">PRN:- <?php echo$prn?></div></h5>
                       <h5> <div class="form-row my-4">Stop:- <?php echo$stop?></div></h5>
                       <h5> <div class="form-row my-4"> Due Date:- <?php
                        $time =strtotime("$date");
                        $datetime = date("Y-m-d", strtotime("+1 month",$time));
                        echo $datetime; 
                    // $time =strtotime("$date");
                    // $datetime = date("Y-m-d", strtotime("+1 month",$time));
                    // $todaydate = date("d-m-y");
                    // if($datetime<=$todaydate){
                    //     $rem = strtotime($datetime) - time();
                    //     $day = floor($rem / 86400);
                    //     $hr  = floor(($rem % 86400) / 3600);
                    //     $min = floor(($rem % 3600) / 60);
                    //     $sec = ($rem % 60);
                    //     if($day) echo "Pass Will Be Expire In $day Days ";
                    // }
                    // else{
                    //      echo "Pass Expire";
                    
                    //    echo'</div></h5>
                    ?>
                    </section> <!-- SECTION 2 -->
                    <button type="button" class="btn btn-outline-primary mx-3"><a
                                class=" fw-bold nav-link active " aria-current="page" href="renew2.php">Renew
                                Pass</a></button>
                </div>
            </form>  
        </div>
    </div>
</body>
</html>