<?php
session_start();

// Hardcoded credentials
define('ADMIN_USERNAME', 'admin');
define('ADMIN_PASSWORD', 'admin@2403');

// Redirect to dashboard if already logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: dashboard.php");
    exit();
}

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch and sanitize input
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if ($username === ADMIN_USERNAME && $password === ADMIN_PASSWORD) {
        // Set session variables
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        // Redirect to dashboard (admin panel entry)
        header("Location: dashboard.php");
        exit();
    } else {
        $message = '<div class="alert alert-danger" role="alert">Invalid username or password.</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Panel Login</title>
    <link rel="stylesheet" href="assests/dist/css/adminlte.min.css" />
    <style>
        body.hold-transition.login-page {
            background: #f4f6f9;
        }
    </style>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="assests/dist/img/Daily Tifins Logo.png"><b>Daily</b>Tiffins</a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your admin session</p>

                <?php echo $message; ?>

                <form method="post" action="login.php" novalidate>
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username" autofocus required />
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-user"></span></div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required />
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-lock"></span></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
