<?php
        require_once "../../../vendor/autoload.php";
        require "../../../core/controller.php";

        if (isset($_GET['id']))
        {
                $id = intval(base64_decode($_GET['id']));

                $data = Base::GetApplication(($id))[0];
                $campus = Base::getCampus(Base::getScholarship($data->scholarship_id)[0]->campus_id )[0];
                $user = Base::getUser($data->user_id)[0];

                if (isset($_POST['submit']))
                {
                        Base::DeleteScholarship($id);
                        header("Location:../");
                }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../../css/style.css">
        <title>admin</title>
</head>
<body>


    <div class="modal-z flex-column" id="modalz">
        <div class="modal-content flex-column" style="width: 40%; height: 50%;">
            <span id="closez" class="flex-column">&times;</span>
            <h3 class="text-primary">Are you sure? This action is irreversible </h3> <br>

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $_GET['id']?>" method="post">
                <button name="delete" type="submit" class="btn-red">Delete </button>
        </form>
        </div>
    </div>

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

                </div>

                <div class="admin-main" style=" height: 100vh; width: 75%;">

                        <div class="mini-bar">
                                <!-- <a class="btn-red" id="triggerz">Delete</a> -->
                        </div>

                        <div class="view">
                                <div>
                                        <img src="../../../img/<?php echo $campus->campus_logo ?>" alt="" width="70%" height="80%" style="margin: 0 10%;">
                                </div>

                                <div>
                                        <h1 class="txt-primary"> <?php echo Base::getUser($data->user_id)[0]->name ?> </h1>
                                        <h4 class="txt-primary txt-lower"> <?php echo Base::getUser($data->user_id)[0]->email ?> </h4>
                                        <small class="txt-primary"> <?php echo Base::getCampus(Base::getScholarship($data->scholarship_id)[0]->campus_id)[0]->campus_name ?> </small>
                                        <small class="txt-primary"> <?php echo Base::getScholarship($data->scholarship_id)[0]->course ?>  </small>
                                        <h2 class="txt-secondary">Documents</h2>
                                        <div class="grid-4">
                                                <a href="../../../uploads/<?php echo $data->results ?>" class="btn-primary" download="../../../uploads/<?php echo $data->results ?>">Grades</a>
                                                <a href="../../../uploads/<?php echo $data->proof ?>" class="btn-primary" download="../../../uploads/<?php echo $data->proof ?>">proof of need</a>
                                                <a href="../../../uploads/<?php echo $data->personal_statement ?>" class="btn-primary" download="../../../uploads/<?php echo $data->personal_statement ?>">personal statement</a>
                                                <a href="../../../uploads/<?php echo $data->abilities ?>" class="btn-primary" download="../../../uploads/<?php echo $data->abilities ?>">abilities</a>
                                        </div>
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