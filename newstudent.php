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
    $sql = "DELETE FROM `` WHERE `srno` = $srno";
    $result = mysqli_query($connect, $sql);
  }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if (isset( $_POST['srnoEdit'])){
    // update the record
    $srno = $_POST["srnoEdit"];
    $username = $_POST["usernameEdit"];
    $name = $_POST["nameEdit"];
    $password = $_POST["passwordEdit"];
    
    $sql = "UPDATE `student` SET `username` = '$username', `name` = '$name', `password` = '$password' 
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
    $username = $_POST["username"];
    $name = $_POST["name"];
    $password = $_POST["password"];

    $sql = "INSERT INTO `student` (`username`, `name`,`password`) VALUES ('$username','$name','$password')";
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
    <title>ADD STUDENT INFORMATION!</title>
</head>

<body>

<!-- Edit modal -->
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
    Edit Modal
    </button> -->

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Edit Student</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="/PBL/newstudent.php" method="POST">
                <input type="hidden" name="srnoEdit" id="srnoEdit">
            <div class="mb-3">
                <label for="username" class="form-label">User Name</label>
                <input type="title" name="usernameEdit" class="form-control" id="usernameEdit" aria-describedby="emailHelp">
                <div id="Text" class="form-text"></div>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="title" name="nameEdit" class="form-control" id="nameEdit" aria-describedby="emailHelp">
                <div id="Text" class="form-text"></div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="title" name="passwordEdit" class="form-control" id="passwordEdit" aria-describedby="emailHelp">
                <div id="Text" class="form-text"></div>
            </div>
            <!-- <div class="mb-3">
                <label for="year" class="form-label">Year</label>
                <input type="title" name="yearEdit" class="form-control" id="yearEdit" aria-describedby="emailHelp">
                <div id="Text" class="form-text"></div>
            </div> -->
        
            <button type="submit" class="btn btn-primary">Update Note</button>
        </form> 
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div> 
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
                        <a class=" fw-bold nav-link active text-black" aria-current="page" href="index.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class=" fw-bold nav-link active text-black" aria-current="page" href="about.html">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class=" fw-bold nav-link active text-black" aria-current="page" href="viewroutes.php">Bus Routes</a>
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

    <?php
        if($insert){
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Success!</strong> Student has been added successfully
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>×</span>
            </button>
        </div>";
        }
    ?>
    <?php
        if($update){
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Success!</strong> Student has been updated successfully
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>×</span>
            </button>
        </div>";
        }
    ?>
    <?php
        if($delete){
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Success!</strong> Student has been deleted successfully
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>×</span>
            </button>
        </div>";
        }
    ?>
    <div class="container my-5">
        <form action="/PBL/newstudent.php" method="POST">
            <div class="form-group">
                <label for="username">User Name</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="password">Password </label>
                <input type="text" class="form-control" id="password" name="password" aria-describedby="emailHelp">
            </div>


            <button type="submit" class="btn btn-primary">Add Student</button>
        </form>
    </div>

    <div class="container mt-5 my-5">

    <table class="table " id="myTable">
        <thead>
            <tr>
                <th scope="col">SR.NO</th>
                <th scope="col">USER NAME</th>
                <th scope="col">Name</th>
                <th scope="col">Password</th>
                <th scope="col">Registration Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php

        $sql = "SELECT * FROM `student`";
        $result = mysqli_query($connect, $sql);
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo " <tr>
            <th scope='row'>" . $no . "</th>
            <td>" . $row['username'] . "</td>
            <td>" . $row['name'] . "</td>
            <td>" . $row['password'] . "</td>
            <td>" . $row['regdate'] . "</td>
            <td> <button class='edit btn btn-sm btn-primary' id=".$row['srno'].">Edit</button>
            <button class='delete btn btn-sm btn-primary' id=d".$row['srno'].">Delete</button>  </td>               
            </tr>";
            $no = $no + 1;
        }
        ?>
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
<script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        tr = e.target.parentNode.parentNode;
        username = tr.getElementsByTagName("td")[0].innerText;
        name = tr.getElementsByTagName("td")[1].innerText;
        password = tr.getElementsByTagName("td")[2].innerText;

        console.log(username, name, password);
        usernameEdit.value = username;
        nameEdit.value = name;
        passwordEdit.value = password;
        srnoEdit.value = e.target.id;
        console.log(e.target.id)
        $('#editModal').modal('toggle');
      })
    })
    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        srno = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this note!")) {
          console.log("yes");
          window.location = `/curd/newstudent.php?delete=${srno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
</script>
</body>

</html>
