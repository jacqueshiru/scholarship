<?php
        if (isset($_POST['submit']))
        {
                if ($_POST['password'] == "admin")
                {
                        session_start();
                        $_SESSION['admin'] = true;

                        header("Location: ../");
                }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../css/style.css">
        <title>Login</title>
</head>
<body>

<main>
                <small> <?php echo $feedback ?> </small>
                <div class="form-cntnr">
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                                <h2> Admin Login</h2>
                                <input type="password" placeholder="Password" name="password" required>
                                <button type="submit" class="btn-primary" name="submit">Login</button>
                        </form>
                </div>
        </main>
</body>
</html>