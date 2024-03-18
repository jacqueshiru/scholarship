<?php
        require "../../vendor/autoload.php";
        require "../../core/controller.php";

        if (isset($_POST['submit']))
        {
                $name = $_POST['name'];
                $file = $_FILES['file']['name'];

                $tmp = $_FILES['file']['tmp_name'];
                $folder = "../../img/";

                if (FileHandler::Upload($file, $folder, $tmp, ["png","jpg","jpeg"]))
                {
                        Base::AddCampus($name, $file);
                }
                else
                {
                        echo "Error uploading file";
                }
        }

        $campuses = Base::AllCampuses();
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../css/style.css">
        <title>Administrator</title>
</head>
<body>
    <div class="modal flex-column" id="modal">
        <div class="modal-content flex-column">
            <span id="closer" >&times;</span>
            <h3> New Campus </h3>

            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="flex-column" method="POST" enctype="multipart/form-data" style="width: 90%; margin: 20px auto;">

                <input type="text" name="name" placeholder="University Name" style="width: 90%; margin: 10px auto;" required>
                <input type="file" name="file" placeholder="Email" style="width: 90%; margin: 10px auto;" required>
                <button type="submit" name="submit" class="btn-primary" style="margin: 0 auto;">Add Campus </button>

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

                <a href="../" class="txt-white">Dashboard</a>

                <a href="../manage-applications/" class="txt-white">Manage Applications</a>

                <a href="../manage-users/" class="txt-white">Manage Users</a>

                <a href="../manage-campuses/" class="txt-white">Manage Campuses</a>

                <a href="../manage-scholarships/" class="txt-white">Manage Scholarships</a>



                        <a href="#" class="btn-primary">Logout</a>
                </div>

                <div class="admin-main" style=" height: 100vh; width: 75%;">
                        <div class="mini-bar">
                                <h2 class="txt-primary">Manage Campuses</h2>

                                <a class="btn-primary triggerz" id="trigger">Add New</a>
                        </div>

                        <table>
                                <thead>
                                        <th>Logo</th>
                                        <th>Name</th>
                                        <th>Date Added</th>
                                        <th>Actions</th>
                                </thead>

                                <tbody>

                                        <?php
                                                foreach ($campuses as $campus)
                                                {
                                                        echo "<tr>";
                                                        echo "<td><img src='../../img/".$campus->campus_logo."' alt='' width='50px' height='50px'></td>";
                                                        echo "<td>".$campus->campus_name."</td>";
                                                        echo "<td>".substr($campus->date,0 ,10 )."</td>";
                                                        echo "<td><a href='view/?id=".base64_encode($campus->id)."' class=\"btn-primary \" >View</a></td>";
                                                        echo "</tr>";
                                                }
                                        ?>

                                </tbody>
                        </table>

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