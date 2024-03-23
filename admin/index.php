<?php

        require_once "../vendor/autoload.php";
        require "../core/controller.php";

        if ($_SESSION['admin'] != true)
        {
                header("Location: ./login/");
        }
        $users_count = count( json_decode( (string) Base::AllUsers()));
        $applications_count = count(Base::GetApplications());
        $scholarships_count = count(Base::AllScholarships());
        $campuses_count = count(Base::AllCampuses());
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css">
        <title>Administrator</title>
</head>
<body>
        <section>
                <style>

                        .sidebar
                        {
                                width: 20%;
                        }
                        .sidebar *
                        {
                                margin: 2px 0;
                        }


                        .sidebar .txt-white
                        {
                                margin: 10px 0;
                                font-size: 13px;
                                width: 70%;
                                padding-bottom: 10px;
                                border-bottom: 1px solid #3333;
                        }
                </style>
                <div class="sidebar" style="padding-top: 1%;">


                        <h3 class="txt-primary"> Administrator </h3> <br>

                        <a href="./" class="txt-white">Dashboard</a>

                        <a href="./manage-applications/" class="txt-white">Manage Applications</a>

                        <a href="./manage-users/" class="txt-white">Manage Users</a>

                        <a href="./manage-campuses/" class="txt-white">Manage Campuses</a>

                        <a href="./manage-scholarships/" class="txt-white">Manage Scholarships</a>


                        <a href="./logout/" class="btn-primary">Logout</a>
                </div>

                <div class="admin-main" style=" height: 100vh; width: 75%;">
                        <div class="grid-2">

                                <div class="card">
                                        <p> Total Users </p>
                                        <h1 class="txt-primary"> <?php echo $users_count  ?> </h1>
                                        <a href="./manage-users" class="btn-secondary">View</a>
                                </div>

                                <div class="card">
                                        <p> Total Applications</p>
                                        <h1 class="txt-primary"><?php echo $applications_count  ?></h1>
                                        <a href="./manage-applications/" class="btn-secondary">View</a>
                                </div>

                                <div class="card">
                                        <p> Total Scholarships</p>
                                        <h1 class="txt-primary"><?php echo $scholarships_count  ?></h1>
                                        <a href="./manage-scholarships/" class="btn-secondary">Add New</a>
                                </div>

                                <div class="card">
                                        <p> Registered Campuses </p>
                                        <h1 class="txt-primary"><?php echo $campuses_count  ?></h1>
                                        <a href="./manage-campuses/" class="btn-secondary">Add New</a>
                                </div>


                        </div>
                </div>
        </section>


        <script>

                var trigger,closer,modal,close;

                trigger = document.getElementById("trigger");
                closer = document.getElementById("closer");
                close_btn = document.getElementById("close");
                modal= document.getElementById("modal");


                trigger.onclick =()=>{
                        modal.style.display = "flex";
                }

                closer.onclick =()=>{
                        modal.style.display = "none";
                }

                var triggerz,closerz,modalz,closez;
                triggerz = document.getElementById("triggerz");
                closerz = document.getElementById("closez");
                close_btnz = document.getElementById("close");
                modalz = document.getElementById("modalz");

                triggerz.onclick =()=>{
                        modalz.style.display = "flex";
                }

                closerz.onclick =()=>{
                        modalz.style.display = "none";
                }

        </script>
</body>
</html>
