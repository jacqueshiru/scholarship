<?php


    require "../core/core.php";

    if (isset($_POST['signup']))
    {
        $name = $_POST['name'];
        $mail = $_POST['mail'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $password = $_POST['password'];

        if (Base::Signup($name, $mail, $phone, $gender, $password))
        {
            header("Location: ../scholarships/");
        }

    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/main.css">
    <title>EduGrant</title>
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

    <div class="form-container">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <h1 class="txt-gradient">Sign Up</h1>

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
            <input type="submit" value="Submit" name="signup">
        </form>
    </div>

</body>
</html>
