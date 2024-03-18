<?php
        require ("../../../core/core.php");

        if (isset($_GET['id']))
        {
                $id = intval(base64_decode($_GET['id']));
                
                $flight = new Flight;
                $data = $flight->get_data("id", $id);

                if (isset($_POST['delete']))
                {
                        $flight->delete($id);
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

                        <a href="../../staff/" class="txt-white">Manage Staff</a>

                        <a href="../../users/" class="txt-white">Manage Users</a>
                        <a href="../../flight-packages/" class="txt-white">Payments</a>

                        <a href="../../flight-packages/" class="txt-white">Bookings</a>

                        <a href="../../hotels/" class="txt-white">Manage Hotels</a>

                        <a href="../../flights/" class="txt-white">Manage Flights</a>

                        <a href="../../hotel-packages/" class="txt-white">Hotel packages</a>
                        <a href="../../flight-packages/" class="txt-white">Flight Packages</a>


                        <a href="#" class="btn-primary">Logout</a>
                </div>

                <div class="admin-main" style=" height: 100vh; width: 75%;">

                        <div class="mini-bar">
                                <a class="btn-red" id="triggerz">Delete</a>
                        </div>

                        <div class="view">
                                <div>
                                        <img src="../../../img/city.jpg" alt="" width="70%" height="80%" style="margin: 0 10%;">
                                </div>

                                <div>
                                        <h4 class="txt-primary"> <?php echo $data->from_p ?> -  <?php echo $data->to_p ?> </h4>
                                        <h1 class="txt-primary txt-lower">$ <?php echo $data->std_price ?> </h1>
                                        <small class="txt-secondary"> Travelling on <?php echo $data->flight_date ?> </small>


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