<?php
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('dbcon.php'); // Database connection

$section_id = $_GET['id'];

// Fetch services for the section
$services = [];
$result = $conn->query("SELECT * FROM services WHERE section_id = $section_id ORDER BY id DESC");
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $services[] = $row;
    }
}
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0 text-dark">List Services for Section</h1>
            <a href="add_service.php?section_id=<?php echo urlencode($section_id); ?>" class="btn btn-primary mt-3">Add Service</a>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Service Name</th>
                                <th style="width: 150px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($services)): ?>
                                <?php foreach ($services as $service): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($service['id']); ?></td>
                                        <td><?php echo htmlspecialchars($service['name']); ?></td>
                                        <td>
                                            <a href="edit_service.php?id=<?php echo urlencode($service['id']); ?>" class="btn btn-warning btn-sm" role="button" aria-label="Edit Service">Edit</a>
                                            <a href="delete_service.php?id=<?php echo urlencode($service['id']); ?>" class="btn btn-danger btn-sm" role="button" onclick="return confirm('Are you sure you want to delete this service?');" aria-label="Delete Service">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3" class="text-center">No services found for this section.</td>
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
