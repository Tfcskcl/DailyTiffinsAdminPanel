<?php
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('db.php'); // Database connection

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $time_slot = trim($_POST['time_slot']);
    $date = $_POST['date'];

    if (!empty($time_slot) && !empty($date)) {
        $stmt = $conn->prepare("INSERT INTO time_slots (time_slot, date) VALUES (?, ?)");
        $stmt->bind_param("ss", $time_slot, $date);

        if ($stmt->execute()) {
            $message = '<div class="alert alert-success">Time Slot and Date added successfully.</div>';
        } else {
            $message = '<div class="alert alert-danger">Error adding time slot: ' . htmlspecialchars($stmt->error) . '</div>';
        }

        $stmt->close();
    } else {
        $message = '<div class="alert alert-warning">Please fill in all fields.</div>';
    }
}

?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0 text-dark">Add Time Slot & Date</h1>
            <?php echo $message; ?>
            <form method="POST" action="add_timedate.php" class="mt-4">
                <div class="form-group">
                    <label for="time_slot">Time Slot</label>
                    <input type="text" class="form-control" id="time_slot" name="time_slot" placeholder="e.g. 10:00 AM - 11:00 AM" required>
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Time Slot</button>
                <a href="list_timedate.php" class="btn btn-secondary ml-2">View Time Slots</a>
            </form>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>

