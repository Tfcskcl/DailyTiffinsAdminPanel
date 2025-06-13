<?php
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('dbcon.php'); // Database connection

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $section_name = trim($_POST['section_name']);

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO sections (name) VALUES (?)");
    $stmt->bind_param("s", $section_name);

    if ($stmt->execute()) {
        $message = '<div class="alert alert-success">Section added successfully.</div>';
    } else {
        $message = '<div class="alert alert-danger">Error adding section: ' . htmlspecialchars($stmt->error) . '</div>';
    }

    $stmt->close();
}
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0 text-dark">Add Section</h1>
            <?php echo $message; ?>
            <form method="POST" action="add_section.php" class="mt-4">
                <div class="form-group">
                    <label for="section_name">Section Name</label>
                    <input type="text" class="form-control" id="section_name" name="section_name" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Section</button>
                <a href="list_section.php" class="btn btn-secondary ml-2">View Sections</a>
            </form>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>
