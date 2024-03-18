<?php
        // ini_set('display_errors', 'On');
        // error_reporting(E_ALL);

        include "../../vendor/autoload.php";
        require "../../core/controller.php";

        if (isset($_POST['signup']))
        {
                $name = $_POST['name'];
                $mail = $_POST['mail'];
                $phone = $_POST['phone'];
                $gender = $_POST['gender'];
                $password = $_POST['password'];

                Base::Signup($name, $mail, $phone, $gender, $password);

        }

        $users = json_decode( (string) Base::AllUsers());
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
            <h3> New User </h3>

            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="flex-column" method="POST" enctype="multipart/form-data" style="width: 90%; margin: 20px auto;">

                <input type="text" placeholder="Full Name" name="name" required>
                <input type="email" placeholder="Email Address" name="mail" required>
                <input type="text" placeholder="Phone Number" name="phone" required>
                <select name="gender" id="" required>
                    <option value="">Gender</option>
                    <option value="m">Male</option>
                    <option value="f">Female</option>
                    <option value="o">Other</option>
                </select>
                <input type="password" placeholder="Password" name="password"  required>
                <button type="submit" name="signup" class="btn-primary" >Create User </button>

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
                                <h2 class="txt-primary">Manage Users</h2>

                                <a class="btn-primary triggerz" id="trigger">Add New</a>
                        </div>

                        <table>
                                <thead>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Gender</th>
                                        <th>Actions</th>
                                </thead>

                                <tbody>
                                        <?php foreach ($users as $user): ?>
                                                <tr>
                                                        <td><?php echo $user->name ?></td>
                                                        <td><?php echo $user->email ?></td>
                                                        <td><?php echo $user->phone ?></td>
                                                        <td> <?php
                                                                switch ($user->gender)
                                                                {
                                                                        case 'm':
                                                                                echo "Male";
                                                                                break;
                                                                        case 'f':
                                                                                echo "Female";
                                                                                break;
                                                                        case 'o':
                                                                                echo "Other";
                                                                                break;
                                                                }
                                                        ?> </td>
                                                        <td>
                                                                <a href="./view/?id=<?php echo base64_encode($user->id) ?>" class="btn-primary">View</a>
                                                        </td>

                                        <?php endforeach ?>

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