<?php

$insert = false;
$update = false;
$delete = false;


$servername = "localhost";
$username = "root";
$password = '';
$database = "project";

$connect = mysqli_connect($servername, $username, $password, $database);

if (!$connect) {
    die("Did not connexted successfully <br>" . mysqli_connect_errno());
}

if(isset($_GET['delete'])){
    $srno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `student` WHERE `srno` = $srno";
    $result = mysqli_query($connect, $sql);
  }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if (isset( $_POST['srnoEdit'])){
    // update the record
    $srno = $_POST["srnoEdit"];
    $ucsno = $_POST["ucsnoEdit"];
    $name = $_POST["nameEdit"];
    $stop = $_POST["stopEdit"];
    
    $sql = "UPDATE `student` SET `ucsno` = '$ucsno', `name` = '$name', `stop` = '$stop' 
    WHERE `student`.`srno` = '$srno'";
    $result = mysqli_query($connect, $sql);
    if($result){
       $update = true;
   }
   else{
       echo "We could not update the record successfully". mysqli_error($connect);
       }
}
else {
    // insert the student
    $ucsno = $_POST["ucsno"];
    $name = $_POST["name"]; 
    $stop = $_POST["stop"];

    $sql = "INSERT INTO `student` (`ucsno`, `name`,`stop`) VALUES ('$ucsno','$name','$stop')";
    $result = mysqli_query($connect, $sql);
    if ($result) {
        $insert = true;
    } else {
        echo "Not inserted <br>" . mysqli_error($connect);
    }
}
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
     integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <title>ADMIN PAGE STUDENT INFORMATION!</title>
</head>

<body>



        </form> 
            </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>  

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarCenteredExample" aria-controls="navbarCenteredExample" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarCenteredExample">
                <!-- Left links -->
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class=" fw-bold nav-link active text-black" aria-current="page" href="admin.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class=" fw-bold nav-link active text-black" aria-current="page" href="about.html">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class=" fw-bold nav-link active text-black" aria-current="page" href="Contact.html">contact Us</a>
                    </li>

                </ul>
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->

            <!-- Container wrapper -->
    </nav>

    

    <div class="container my-5">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">Sr No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">PRN</th>
                    <th scope="col">Stop</th>
                    <th scope="col">Departmaent</th>
                    <th scope="col">Degree</th>
                    <th scope="col">Register Date</th>
                </tr>
            </thead>
            </tbody>
            <?php

            $sql = "SELECT * FROM `info`";
            $result = mysqli_query($connect, $sql);
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo " <tr>
            <th scope='row'>" . $no . "</th>
            <td>" . $row['name'] . "</td>
            <td>" . $row['email'] . "</td>
            <td>" . $row['prn'] . "</td>
            <td>" . $row['end'] . "</td>
            <td>" . $row['dep'] . "</td>
            <td>" . $row['degree'] . "</td>
            <td>" . $row['regdate'] . "</td>           
            </tr>";
                $no = $no + 1;
            }

            ?>
        </table>
    </div>
    <hr>

    <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
  integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
  crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
  integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
  crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function () {
    $('#myTable').DataTable();

  });
</script>
</body>

</html>
