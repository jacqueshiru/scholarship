<?php
        require ("../../../core/core.php");

        if (isset($_GET['id']))
        {
                $id = intval(base64_decode($_GET['id']));
                $payment = new Payment;
                $data = $payment->get_data($id);

                if (isset($_POST['submit']))
                {
                        $payment->verify($id);
                        header("Location: ../");
                }

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

                <a href="../../staff/" class="txt-white">Manage Staff</a>

                <a href="../../users/" class="txt-white">Manage Users</a>
                <a href="../" class="txt-white">Payments</a>

                <a href="../../flight-packages/" class="txt-white">Bookings</a>

                <a href="../../hotels/" class="txt-white">Manage Hotels</a>

                <a href="../../flights/" class="txt-white">Manage Flights</a>

                <a href="../../hotel-packages/" class="txt-white">Hotel packages</a>
                <a href="../../flight-packages/" class="txt-white">Flight Packages</a>


                        <a href="#" class="btn-primary">Logout</a>
                </div>

                <div class="admin-main" style=" height: 100vh; width: 75%;">

                        <div class="mini-bar">
                                <form action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $_GET['id'] ?>" method="POST">

                                        <button type="submit" name="submit" class="btn-green">Approve</button>

                                </form> <br>
                        </div>

                        <div class="view">
                                <div>
                                        <img src="../../../img/city.jpg" alt="" width="70%" height="80%" style="margin: 0 10%;">
                                </div>

                                <div>
                                        <h1 class="txt-primary"> <?php echo $data->name ?> </h1>
                                        <h4 class="txt-secondary txt-lower"> <?php echo $data->email ?> </h4>
                                        <h4 class="txt-secondary"> <?php echo $data->card_no ?> </h4>
                                        <small class="txt-secondary">  <?php echo $data->date ?> </small>


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