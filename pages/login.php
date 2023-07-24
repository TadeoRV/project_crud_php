<?php ob_start(); ?>
<?php session_start();
if ($_POST) {
    if (($_POST['username'] == "admin") && ($_POST['password'] == 'admin')) {
        $_SESSION['user'] = "Admin";
        $_SESSION['logged'] = 'Y';
        header("location:index_admin.php");
        die();
    } else {
        header("location:../index.php");
        die();
    }
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login.css">
    <title>Portfolio - Log-in</title>

</head>

<body>
    <div class="container h-100 d-flex justify-content-center align-items-center">
        <div class="login-box d-flex flex-column justify-content-center align-items-center shadow-lg py-4 px-3">
                <h1 class="login-title">LOGIN</h1>
                <form class="login-form" action="login.php" method="post">
                    <div class="d-flex flex-column">
                        <div class="input-container mt-4 d-flex flex-column">
                            <label class="input-label" for="username">Username:</label>
                            <input class="form-input px-2 py-1" type="text" name="username" id="username" placeholder="Username" value="admin" required>
                        </div>
                        <div class="input-container d-flex flex-column">
                            <label class="input-label" for="password">Password:</label>
                            <input class="form-input px-2 p-1" type="password" name="password" id="password" placeholder="Password" value="admin" required>
                        </div>
                        <div class="text-center">
                            <input type="submit" value="Send" class="btn mt-3 login-submit">
                        </div>

                    </div>
                </form>
        </div>

</body>

</html>