<?php
        include "../../../vendor/autoload.php";
        require "../../../core/controller.php";

        if (isset($_GET['id']))
        {
                $id = intval(base64_decode($_GET['id']));

                $data = Base::getCampus(base64_decode($_GET['id']))[0];

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
        <link rel="stylesheet" href="../../../css/style.css">
        <title>BnB admin</title>
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
                                margin: 15px 0;
                                font-size: 13px;
                                width: 70%;
                                padding-bottom: 10px;
                                border-bottom: 1px solid #3333;
                        }
                </style>

                <div class="sidebar" style="padding-top: 1%;">


                <h3 class="txt-primary"> Administrator </h3> <br>

                <a href="../../" class="txt-white">Dashboard</a>

                <a href="../../manage-applications/" class="txt-white">Manage Applications</a>

                <a href="../../manage-users/" class="txt-white">Manage Users</a>

                <a href="../../manage-campuses/" class="txt-white">Manage Campuses</a>

                <a href="../../manage-scholarships/" class="txt-white">Manage Scholarships</a>


                        <a href="#" class="btn-primary">Logout</a>
                </div>

                <div class="admin-main" style=" height: 100vh; width: 75%;">

                        <div class="mini-bar">
                                <h3>View Campus</h3>
                        </div>

                        <div class="view">
                                <div>
                                        <img src="../../../img/<?php echo $data->campus_logo ?>" alt="" width="70%" height="80%" style="margin: 0 10%;">
                                </div>

                                <div>
                                        <h4 class="txt-primary"> <?php echo $data->campus_name ?> </h4>
                                        <small class="txt-secondary"> Added <?php echo $data->date ?> </small>


                                </div>
                        </div>
                </div>
        </section>


        <script>

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