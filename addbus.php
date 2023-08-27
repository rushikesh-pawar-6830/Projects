<?php

$insert = false;
$update = false;
$delete = false;

$servername = "localhost";
$username = "root";
$password = '';
$database = 'project';

$connect = mysqli_connect($servername, $username, $password, $database);

if (!$connect) {
    die("Sorry failed to connect <br>" . mysqli_connect_error());
}

if(isset($_GET['delete'])){
    $srno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `bus` WHERE `srno` = $srno";
    $result = mysqli_query($connect, $sql);
  }


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['srnoEdit'])) {
        // update the record
        $srno = $_POST["srnoEdit"];
        $busno = $_POST["busnoEdit"];
        $stop = $_POST["stopEdit"];
        $dname = $_POST["dnameEdit"];
        $dcontact = $_POST["dcontactEdit"];
        $time = $_POST["timeEdit"];
        $fees = $_POST["feesEdit"];
        $sql = "UPDATE `bus` SET `busno` = '$busno', `stop` = '$stop', `dname` = '$dname',
        `dcontact` = '$dcontact',`time` = '$time', `fees` = '$fees' WHERE `bus`.`srno` = '$srno'";
        $result = mysqli_query($connect, $sql);
        if ($result) {
            $update = true;
        } else {
            echo "We could not update the record successfully" . mysqli_error($connect);
        }
    } else {
        $busno = $_POST["busno"];
        $stop = $_POST["stop"];
        $dname = $_POST["dname"];
        $dcontact = $_POST["dcontact"];
        $time = $_POST["time"];
        $fees = $_POST["fees"];
        $sql = "INSERT INTO `bus` (`busno`, `stop`, `dname`, `dcontact`, `time`, `fees`) 
VALUES ('$busno', '$stop', '$dname', '$dcontact', '$time', '$fees')";

        $return = mysqli_query($connect, $sql);
        if ($return) {
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
    <!-- Edit  modal -->
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
  Launch demo modal
</button> -->

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Edit Bus Information</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/PBL/addbus.php" method="POST">
                        <input type="hidden" name="srnoEdit" id="srnoEdit">
                        <div class="form-group">
                            <label for="busnoEdit">Bus Number</label>
                            <input type="text" class="form-control" id="busnoEdit" name="busnoEdit" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="stopEdit">Stop</label>
                            <input type="text" class="form-control" id="stopEdit" name="stopEdit" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="dnameEdit">Driver Name</label>
                            <input type="text" class="form-control" id="dnameEdit" name="dnameEdit" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="dcontactEdit">Driver Contact Number</label>
                            <input type="text" class="form-control" id="dcontactEdit" name="dcontactEdit" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="timeEdit">Time</label>
                            <input type="text" class="form-control" id="timeEdit" name="timeEdit" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="feesEdit">Fees</label>
                            <input type="text" class="form-control" id="feesEdit" name="feesEdit" aria-describedby="emailHelp">
                        </div>


                        <button type="submit" class="btn btn-primary">Update Bus</button>
                    </form>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
        </div>
    </div>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    <title>Add Bus Information!!</title>
</head>

<body>
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
                        <a class=" fw-bold nav-link active text-black" aria-current="page" href="newstudent.php">Add Student</a>
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
            <strong>Success!</strong> Bus has been added successfully
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>×</span>
            </button>
        </div>";
        }
    ?>
    <?php
        if($update){
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Success!</strong> Bus has been updated successfully
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>×</span>
            </button>
        </div>";
        }
    ?>
    <?php
        if($delete){
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Success!</strong> Bus has been deleted successfully
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>×</span>
            </button>
        </div>";
        }
    ?>

    <div class="container my-5 ">
        <form action="/PBL/addbus.php" method="POST">
            <div class="form-group">
                <label for="busno">Bus Number</label>
                <input type="text" class="form-control" id="busno" name="busno" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="stop">Stop</label>
                <input type="text" class="form-control" id="stop" name="stop" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="dname">Driver Name</label>
                <input type="text" class="form-control" id="dname" name="dname" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="dcontact">Driver Contact Number</label>
                <input type="text" class="form-control" id="dcontact" name="dcontact" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="time">Time</label>
                <input type="text" class="form-control" id="time" name="time" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="fees">Fees</label>
                <input type="text" class="form-control" id="fees" name="fees" aria-describedby="emailHelp">
            </div>


            <button type="submit" class="btn btn-primary">Add Bus</button>
        </form>
    </div>

    <div class="container my-5">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">Sr No</th>
                    <th scope="col">Bus Number</th>
                    <th scope="col">Stop</th>
                    <th scope="col">Driver Name</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Time</th>
                    <th scope="col">Fees</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            </tbody>
            <?php

            $sql = "SELECT * FROM `bus`";
            $result = mysqli_query($connect, $sql);
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo " <tr>
            <th scope='row'>" . $no . "</th>
            <td>" . $row['busno'] . "</td>
            <td>" . $row['stop'] . "</td>
            <td>" . $row['dname'] . "</td>
            <td>" . $row['dcontact'] . "</td>
            <td>" . $row['time'] . "</td>
            <td>" . $row['fees'] . "</td>
            <td> <button class='edit btn btn-sm btn-primary' id=" . $row['srno'] . ">Edit</button>
            <button class='delete btn btn-sm btn-primary' id=d" . $row['srno'] . ">Delete</button>  </td>               
            </tr>";
                $no = $no + 1;
            }

            ?>
        </table>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();

        });
    </script>
    <script>
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit ");
                tr = e.target.parentNode.parentNode;
                busno = tr.getElementsByTagName("td")[0].innerText;
                stop = tr.getElementsByTagName("td")[1].innerText;
                dname = tr.getElementsByTagName("td")[2].innerText;
                dcontact = tr.getElementsByTagName("td")[3].innerText;
                time = tr.getElementsByTagName("td")[4].innerText;
                fees = tr.getElementsByTagName("td")[5].innerText;

                console.log(busno, stop, dname, dcontact ,time, fees);
                busnoEdit.value = busno;
                stopEdit.value = stop;
                dnameEdit.value = dname;
                dcontactEdit.value = dcontact;
                timeEdit.value = time;
                feesEdit.value = fees;
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

                if (confirm("Are you sure you want to delete this Bus!")) {
                    console.log("yes");
                    window.location = `/PBL/addbus.php?delete=${srno}`;
                    // TODO: Create a form and use post request to submit a form
                } else {
                    console.log("no");
                }
            })
        })
    </script>
</body>

</html>