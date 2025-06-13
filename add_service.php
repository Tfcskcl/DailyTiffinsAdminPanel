<?php
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('dbcon.php'); // Database connection

$message = '';
$section_id = $_GET['section_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $service_name = trim($_POST['service_name']);

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO services (name, section_id) VALUES (?, ?)");
    $stmt->bind_param("si", $service_name, $section_id);

    if ($stmt->execute()) {
        $message = '<div class="alert alert-success">Service added successfully.</div>';
    } else {
        $message = '<div class="alert alert-danger">Error adding service: ' . htmlspecialchars($stmt->error) . '</div>';
    }

    $stmt->close();
}
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0 text-dark">Add Service to Section</h1>
            <?php echo $message; ?>
            <form method="POST" action="add_service.php?section_id=<?php echo urlencode($section_id); ?>" class="mt-4">
                <div class="form-group">
                    <label for="service_name">Service Name</label>
                    <input type="text" class="form-control" id="service_name" name="service_name" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Service</button>
                <a href="section_offer_service.php?id=<?php echo urlencode($section_id); ?>" class="btn btn-secondary ml-2">Back to Services</a>
            </form>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>
