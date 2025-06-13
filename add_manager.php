<?php
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('dbcon.php'); // Database connection

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $manager_name = trim($_POST['manager_name']);
    $manager_email = trim($_POST['manager_email']);
    $manager_password = trim($_POST['manager_password']);

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO managers (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $manager_name, $manager_email, password_hash($manager_password, PASSWORD_DEFAULT));

    if ($stmt->execute()) {
        $message = '<div class="alert alert-success">Manager added successfully.</div>';
    } else {
        $message = '<div class="alert alert-danger">Error adding manager: ' . htmlspecialchars($stmt->error) . '</div>';
    }

    $stmt->close();
}
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0 text-dark">Add Manager</h1>
            <?php echo $message; ?>
            <form method="POST" action="add_manager.php" class="mt-4">
                <div class="form-group">
                    <label for="manager_name">Manager Name</label>
                    <input type="text" class="form-control" id="manager_name" name="manager_name" required>
                </div>
                <div class="form-group">
                    <label for="manager_email">Manager Email</label>
                    <input type="email" class="form-control" id="manager_email" name="manager_email" required>
                </div>
                <div class="form-group">
                    <label for="manager_password">Manager Password</label>
                    <input type="password" class="form-control" id="manager_password" name="manager_password" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Manager</button>
                <a href="list_manager.php" class="btn btn-secondary ml-2">View Managers</a>
            </form>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>
