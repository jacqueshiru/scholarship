
<?php
        require "../core/core.php";

        $scholarships = Base::AllScholarships();
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../assets/css/main.css">
        <link rel="stylesheet" href="../css/style.css">
        <title>Edugrant</title>
</head>
<body>
    <header>
        <div class="title">
            <p class="text-gradient">EduGrant</p>
        </div>

        <nav>
            <ul>
                <li><a href="../">Home</a></li>
                <li><a href="../#about">About</a></li>
                <li><a href="../signup">Signup</a></li>
                <li><a href="../login">Login</a></li>
            </ul>
        </nav>
    </header>



        <main style="background: white !important;">

                <div class="hotels-container">

                        <div class="micro-banner">
                                <h2>Available Scholarships </h2>

                        </div>

                        <div class="grid-container" id="flights">

                                <?php foreach($scholarships as $scholarship): ?>
                                        <div class="flight">
                                        <img src="../img/<?php echo Base::getCampus($scholarship->campus_id)[0]->campus_logo ?>" alt="">
                                        <h3> <?php echo Base::getCampus($scholarship->campus_id)[0]->campus_name ?> </h3>

                                        <p> <?php echo ($scholarship->course) ?> </p>

                                        <small> <?php echo substr($scholarship->date, 0, 10) ?> </small>

                                        <a href="./view/?id=<?php echo base64_encode($scholarship->id) ?> " class="btn-primary">View</a>
                                </div>

                                <?php endforeach?>


                </div>

        </main>

        <script>
                function search(q)
                {
                        let tbody = document.getElementById("flights")
                        let url = "../core/search.php?search_flight&q="+q
                        let xmlhttp = new XMLHttpRequest()
                        xmlhttp.open('GET',url,true)

                        xmlhttp.onload = ()=>
                        {
                            if (this.status = 200)
                            {
                                tbody.innerHTML = xmlhttp.responseText
                            }
                        }

                        xmlhttp.send() // Sends Request to file
                    }
        </script>
</body>
</html>