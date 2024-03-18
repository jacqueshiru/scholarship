<?php

    require "../core/core.php";

    $message = "";
    if (isset($_POST['login']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (Base::Login($email, $password))
        {
            $_SESSION['user'] = true;
            $_SESSION['email'] = $email;
            $message = "Login successful";
            header("Location: ../scholarships/");
        }
        else
        {
            $message = "Login failed";
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
            <h1 class="txt-gradient">Log into your account</h1>
            <p><?php echo $message ?></p>
            <input type="email" placeholder="Email Address" name="email" required>
            <input type="password" placeholder="Password" name="password" required>
            <input type="submit" value="Submit" name="login">
        </form>
    </div>

</body>
</html>