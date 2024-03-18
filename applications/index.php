<?php
    require "../core/core.php";

    if (!isset($_SESSION['user']))
    {
        header("Location: ../login");
    }

    $message = "";

    if (isset($_GET['id']))
    {
        $id = intval(base64_decode($_GET['id']));

        if (isset($_POST['submit']))
        {
            $grades = $_FILES['grades']['name'];
            $grades_tmp = $_FILES['grades']['tmp_name'];
            $need = $_FILES['need']['name'];
            $need_tmp = $_FILES['need']['tmp_name'];
            $statement = $_FILES['statement']['name'];
            $statement_tmp = $_FILES['statement']['tmp_name'];
            $abilities = $_FILES['abilities']['name'];
            $abilities_tmp = $_FILES['abilities']['tmp_name'];

            // Use the FileHandler class to upload the files

            if (
                FileHandler::Upload($grades, "../uploads/", $grades_tmp, ["pdf","docx","doc"]) &&
                FileHandler::Upload($need, "../uploads/", $need_tmp, ["pdf","docx","doc"]) &&
                FileHandler::Upload($statement, "../uploads/", $statement_tmp, ["pdf","docx","doc"]) &&
                FileHandler::Upload($abilities, "../uploads/", $abilities_tmp, ["pdf","docx","doc"])
            )
            {
                if (Base::ApplyScholarship (
                    4,
                    $grades,
                    $id,
                    $need,
                    $statement,
                    $abilities
                ))
                {
                    $message = "Application Submitted please wait for approval";
                }
                else
                {
                    $message = "Application Failed";
                }
            }
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
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $_GET['id'] ?>" method="POST" class="no-shadow" enctype="multipart/form-data">
            <h1 class="txt-gradient">Apply For this Scholarship</h1>

            <p><?php echo $message ?></p>

            <label class="txt-primary">Your Past Grades</label>
            <input type="file" name="grades" required id="">

            <label class="txt-primary">Proof of need</label>
            <input type="file" name="need" id="" required>

            <label class="txt-primary">Personal Statement</label>
            <input type="file" name="statement" id="" required>

            <label class="txt-primary"> Proof of special abiliies </label>
            <input type="file" name="abilities" id="" required>
            <input type="submit" value="Submit" name="submit">
        </form>
    </div>

</body>
</html>
