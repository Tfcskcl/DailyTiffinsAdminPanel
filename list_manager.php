<?php
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('dbcon.php'); // Database connection

// Fetch existing sections from the database
$sections = [];
$result = $conn->query("SELECT * FROM sections ORDER BY id DESC");
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $sections[] = $row;
    }
}
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0 text-dark">List Sections</h1>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Existing Sections</h3>
                    <a href="add_section.php" class="btn btn-primary">Add Section</a>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th style="width: 150px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($sections)): ?>
                                <?php foreach ($sections as $section): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($section['id']); ?></td>
                                        <td><?php echo htmlspecialchars($section['name']); ?></td>
                                        <td>
                                            <a href="edit_section.php?id=<?php echo urlencode($section['id']); ?>" class="btn btn-warning btn-sm" role="button" aria-label="Edit Section">Edit</a>
                                            <a href="delete_section.php?id=<?php echo urlencode($section['id']); ?>" class="btn btn-danger btn-sm" role="button" onclick="return confirm('Are you sure you want to delete this section?');" aria-label="Delete Section">Delete</a>
                                            <a href="section_offer_service.php?id=<?php echo urlencode($section['id']); ?>" class="btn btn-info btn-sm" role="button" aria-label="Manage Services">Manage Services</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3" class="text-center">No sections found.</td>
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
