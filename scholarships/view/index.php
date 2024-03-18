<?php
        require "../../vendor/autoload.php";
        require "../../core/controller.php";

        if (isset($_GET['id']))
        {
                $id = intval(base64_decode($_GET['id']));
                $scholarship = Base::getScholarship($id)[0];
        }
        else
        {
                header("Location: ../");
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../assets/css/main.css">

        <link rel="stylesheet" href="../../css/style.css">

        <title>EduGrant</title>
</head>
<body>
    <header>
        <div class="title">
            <p class="text-gradient">EduGrant</p>
        </div>

        <nav>
            <ul>
                <li><a href="../">Home</a></li>
                <li><a href="../#about">About</a></li>
                <li><a href="../signup">Signup</a></li>
                <li><a href="../login">Login</a></li>
            </ul>
        </nav>
    </header>

        <main style="background: white !important;">
                <div class="view-container">

                        <div class="grid-2">

                                <div>
                                        <img src="../../img/<?php echo Base::getCampus($scholarship->campus_id)[0]->campus_logo ?>" alt="" >

                                        <a href="../../applications/?id=<?php echo base64_encode($scholarship->id) ?>" class="btn-secondary">Apply For this scholarship </a>
                                </div>


                                <div>
                                        <h3> <?php echo Base::getCampus($scholarship->campus_id)[0]->campus_name ?></h3>
                                        <h1 class="txt-primary"> <?php echo $scholarship->course ?> </h1>
                                        <h5 class="txt-primary"> <?php echo $scholarship->course_type ?> </h5>
                                        <small class="txt-primary"> <?php echo $scholarship->description ?> </small>


                                        <p> Available Slots <?php echo $scholarship->slots ?> </p>
                                        <p> Added on <?php echo $scholarship->date ?> </p>


                                </div>

                        </div>
                </div>
        </main>
</body>
</html>