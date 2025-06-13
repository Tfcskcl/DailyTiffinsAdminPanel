<?php
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('dbcon.php'); // Database connection

// Fetch existing banners from the database
$banners = [];
$result = $conn->query("SELECT * FROM banners ORDER BY id DESC");
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $banners[] = $row;
    }
}
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0 text-dark">List Banners</h1>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Existing Banners</h3>
                    <a href="add_banner.php" class="btn btn-primary">Add Banner</a>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th style="width: 150px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($banners)): ?>
                                <?php foreach ($banners as $banner): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($banner['id']); ?></td>
                                        <td><?php echo htmlspecialchars($banner['title']); ?></td>
                                        <td><img src="<?php echo htmlspecialchars($banner['image_path']); ?>" alt="<?php echo htmlspecialchars($banner['title']); ?>" style="width: 100px;"></td>
                                        <td>
                                            <a href="edit_banner.php?id=<?php echo urlencode($banner['id']); ?>" class="btn btn-warning btn-sm" role="button" aria-label="Edit Banner">Edit</a>
                                            <a href="delete_banner.php?id=<?php echo urlencode($banner['id']); ?>" class="btn btn-danger btn-sm" role="button" onclick="return confirm('Are you sure you want to delete this banner?');" aria-label="Delete Banner">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center">No banners found.</td>
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
