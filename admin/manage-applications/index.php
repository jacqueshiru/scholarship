<?php

        require_once "../../vendor/autoload.php";
        require "../../core/controller.php";

        $applications = Base::GetApplications();


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
                                <h3 class="txt-primary">Manage Applications</h1>
                        </div>

                        <table>
                                <thead>
                                        <th>Student Name</th>
                                        <th>Email</th>
                                        <th>Course</th>
                                        <th>Campus</th>
                                        <th></th>
                                </thead>

                                <tbody>

                                        <?php

                                                foreach ($applications as $application)
                                                {
                                                        $user = Base::getUser($application->user_id)[0];
                                                        $scholarship = Base::getScholarship($application->scholarship_id)[0];
                                                        $campus = Base::getCampus($scholarship->campus_id)[0];
                                                        $encoded_id = base64_encode($application->id);
                                                        echo "<tr>";
                                                        echo "<td> $user->name </td>";
                                                        echo "<td> $user->email </td>";
                                                        echo "<td> $scholarship->course </td>";
                                                        echo "<td> $campus->campus_name </td>";

                                                        echo "<td> <a href='./view?id=$encoded_id' class='btn-primary'>View</a> </td>";
                                                        echo "</tr>";
                                                }

                                        ?>


                                </tbody>
                        </table>

                </div>
        </section>

</body>
</html>