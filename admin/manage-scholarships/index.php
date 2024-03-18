<?php
        require "../../vendor/autoload.php";
        require "../../core/controller.php";

        $campuses = Base::AllCampuses();

        if (isset($_POST['submit']))
        {
                $type = $_POST['type'];
                $course = $_POST['course'];
                $campus = $_POST['campus'];
                $description = $_POST['description'];
                $slots = $_POST['slots'];

                Base::AddScholarship($type, $course, $campus, $description, $slots);
        }

        $scholarships = Base::AllScholarships();
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
            <h3> New Scholarship </h3>

            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="flex-column" method="POST" enctype="multipart/form-data" style="width: 90%; margin: 20px auto;">

                <input type="text" name="type" placeholder="Course Type" style="width: 90%; margin: 10px auto;" required>
                <input type="text" name="course" placeholder="Course Name" style="width: 90%; margin: 10px auto;" required>
                <select name="campus" id="" required style="width: 90%; margin: 10px auto;">
                        <option value="">Select Campus</option>
                        <?php foreach($campuses as $campus): ?>
                                <option value="<?php echo $campus->id; ?>"> <?php echo $campus->campus_name; ?> </option>
                        <?php endforeach; ?>
                </select>
                <textarea name="description" style="width: 90%; height: 80px; margin: 10px auto;" id="" cols="30" rows="10" placeholder="A description of the scholarship" required></textarea>
                <input type="number" min="1" name="slots" placeholder="Available slots" style="width: 90%; margin: 10px auto;" required>
                <button type="submit" name="submit" class="btn-primary" style="margin: 0 auto;">Add Scholarship </button>

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
                                <h2 class="txt-primary">Manage Scholarships</h2>

                                <a class="btn-primary triggerz" id="trigger">Add New</a>
                        </div>

                        <table>
                                <thead>
                                        <th>Logo</th>
                                        <th>University Name</th>
                                        <th>Course Name</th>
                                        <th>Course Type</th>
                                        <th>Slots</th>
                                        <th>Actions</th>
                                </thead>

                                <tbody>

                                        <?php foreach($scholarships as $scholarship): ?>
                                                <tr>
                                                        <td> <img src="../../img/<?php echo Base::getCampus($scholarship->campus_id)[0]->campus_logo; ?>" alt=""> </td>
                                                        <td> <?php echo Base::getCampus($scholarship->campus_id)[0]->campus_name; ?></td>
                                                        <td> <?php echo $scholarship->course; ?> </td>
                                                        <td> <?php echo $scholarship->course_type; ?> </td>
                                                        <td> <?php echo $scholarship->slots; ?> </td>
                                                        <td> <a href="./view/?id=<?php echo base64_encode($scholarship->id); ?>" class="btn-primary">View</a> </td>
                                                </tr>
                                        <?php endforeach; ?>


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