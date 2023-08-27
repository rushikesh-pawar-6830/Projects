<!doctype html>
<html lang="en">

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
    </div>
</body>