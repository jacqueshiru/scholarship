<?php
        require ("../../core/core.php");

        if (!isset($_SESSION['admin']))
        {
                header("location: ../login");
        }

        $user = new User;
        $data = $user->fetchAll("users");


        if (isset($_POST['submit']))
        {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $password = $_POST['password'];

                $feedback = $user->create_user($name, $email, $phone, $password);

                if ($feedback == "Signup successful. Please Login later to check for approval \n")
                {
                        header("Location: ./");
                }
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../css/style.css">
        <title>BnB admin</title>
</head>
<body>


    <div class="modal flex-column" id="modal">
        <div class="modal-content flex-column">
            <span id="closer" >&times;</span>
            <h3>Create New User</h3>
            
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="flex-column" method="POST" enctype="multipart/form-data" style="width: 90%; margin: 20px auto;">

                <input type="text" name="name" placeholder="name" style="width: 90%; margin: 10px auto;" required>
                <input type="text" name="email" placeholder="Email" style="width: 90%; margin: 10px auto;" required>
                <input type="text" name="phone" placeholder="Phone" style="width: 90%; margin: 10px auto;" required>
                <input type="text" name="password" placeholder="Password" style="width: 90%; margin: 10px auto;" required>
                <button type="submit" name="submit" class="btn-primary" style="margin: 0 auto;">Create User</button>

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

                <a href="../staff/" class="txt-white">Manage Staff</a>

                <a href="../users/" class="txt-white">Manage Users</a>
                <a href="../flight-packages/" class="txt-white">Payments</a>

                <a href="../flight-packages/" class="txt-white">Bookings</a>

                <a href="../hotels/" class="txt-white">Manage Hotels</a>

                <a href="../flights/" class="txt-white">Manage Flights</a>

                <a href="../hotel-packages/" class="txt-white">Hotel packages</a>
                <a href="../flight-packages/" class="txt-white">Flight Packages</a>


                        <a href="#" class="btn-primary">Logout</a>
                </div>

                <div class="admin-main" style=" height: 100vh; width: 75%;">

                        <div class="mini-bar">
                                <a class="btn-primary triggerz" id="trigger">Add New</a>
                        </div>

                        <table>
                                <thead>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                </thead>

                                <tbody>

                                        <?php foreach ($data as $user_data ): ?>
                                        <tr>
                                                <td><?php echo $user_data['name'] ?></td>
                                                <td style="text-transform: lowercase;"><?php echo $user_data['email'] ?></td>
                                                <td><?php echo $user_data['phone'] ?></td>
                                                <td><?php echo $user_data['approved'] == '1' ? "Approved" : "Not approved" ?></td>
                                                <td> <small><a href="./view/?id=<?php echo base64_encode($user_data['id']) ?>" class="btn-primary">View</a></small> </td>     
                                        </tr>
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