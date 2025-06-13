<?php
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('db.php'); // Database connection

// Fetch existing time slots from the database
$timeSlots = [];
$result = $conn->query("SELECT * FROM time_slots ORDER BY date DESC, time_slot ASC");
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $timeSlots[] = $row;
    }
}
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0 text-dark">List Time Slot & Date</h1>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Existing Time Slots</h3>
                    <a href="add_timedate.php" class="btn btn-primary">Add Time Slot & Date</a>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Time Slot</th>
                                <th>Date</th>
                                <th style="width: 150px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($timeSlots)): ?>
                                <?php foreach ($timeSlots as $slot): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($slot['id']); ?></td>
                                        <td><?php echo htmlspecialchars($slot['time_slot']); ?></td>
                                        <td><?php echo htmlspecialchars($slot['date']); ?></td>
                                        <td>
                                            <a href="edit_timedate.php?id=<?php echo urlencode($slot['id']); ?>" class="btn btn-warning btn-sm" role="button" aria-label="Edit Time Slot">Edit</a>
                                            <a href="delete_timedate.php?id=<?php echo urlencode($slot['id']); ?>" class="btn btn-danger btn-sm" role="button" onclick="return confirm('Are you sure you want to delete this time slot?');" aria-label="Delete Time Slot">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center">No time slots found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
include('includes/footer.php');
?>
