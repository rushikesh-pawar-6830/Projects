<!doctype html>
<html lang="en">
<?php
$servername = "localhost";
$username = "root";
$password = '';
$database = "project";

$connect = mysqli_connect($servername, $username, $password, $database);

if (!$connect) {
    die("Did not connexted successfully <br>" . mysqli_connect_errno());
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
    #navbarCenteredExample {
        background-color: crimson;
    }

    .card {
        margin-top: auto;
    }

    .mt-6 {
        margin-top: 15rem; // or the value you want
    }
    body
    {
        background-color: antiquewhite;
    }
    .log{
        margin-left: 200px; 
    }
    </style>
</head>

<body>

    <div class="home">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                    data-mdb-target="#navbarCenteredExample" aria-controls="navbarCenteredExample" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse justify-content-center" id="navbarCenteredExample">
                    <!-- Left links -->
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class=" fw-bold nav-link active text-black" aria-current="page" href="index.php">Home</a>
                        </li>
                       
                        </li>
                       
                        <li class="log">
                            <a class=" fw-bold nav-link active text-black" aria-current="page"
                                href="logout.php">logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container mt-5">
        <table class="table table-success table-striped">
            <thead>
                <tr>
                <th scope="col">SR.NO</th>
                <th scope="col">PRN NO</th>
                <th scope="col">STOP</th>
                <th scope="col">VIEW IMAGE</th>
                <th scope="col">Approval</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
               <?php
                $sql = "SELECT * FROM `payment`";
                $result = mysqli_query($connect, $sql);
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    // $prn= $row['prnno']; 
                    echo'<tr>
                <th scope="row">' . $no . '</th>
                <td>'. $row['prnno'] . '</td>
                <td>' . $row['stop'] . '</td>
                <td ><a href="viewimg.php?prn='.$row['prnno'].' "> 
                    View
                    </a>
               </td>   
               <td><a href="Approve.php?prn='.$row['prnno'].' " > Approve Here </a></button></td>    
               <td><a href="reject.php?prn='.$row['prnno'].' " >Reject</a></td>  
                </tr>';
                    $no = $no + 1;
                }
               ?>
            </tbody>
            </table>

        </div>
</body>
</html>