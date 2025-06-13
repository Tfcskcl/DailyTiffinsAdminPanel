<?php
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('dbcon.php'); // Database connection

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $banner_title = trim($_POST['banner_title']);
    $target_dir = "uploads/"; // Directory to save uploaded banners
    $target_file = $target_dir . basename($_FILES["banner_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["banner_image"]["tmp_name"]);
    if ($check === false) {
        $message = '<div class="alert alert-danger">File is not an image.</div>';
        $uploadOk = 0;
    }

    // Check file size (limit to 2MB)
    if ($_FILES["banner_image"]["size"] > 2000000) {
        $message = '<div class="alert alert-danger">Sorry, your file is too large.</div>';
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
        $message = '<div class="alert alert-danger">Sorry, only JPG, JPEG, PNG & GIF files are allowed.</div>';
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $message .= '<div class="alert alert-danger">Your file was not uploaded.</div>';
    } else {
        // If everything is ok, try to upload file
        if (move_uploaded_file($_FILES["banner_image"]["tmp_name"], $target_file)) {
            // Insert into database
            $stmt = $conn->prepare("INSERT INTO banners (title, image_path) VALUES (?, ?)");
            $stmt->bind_param("ss", $banner_title, $target_file);

            if ($stmt->execute()) {
                $message = '<div class="alert alert-success">Banner uploaded successfully.</div>';
            } else {
                $message = '<div class="alert alert-danger">Error uploading banner: ' . htmlspecialchars($stmt->error) . '</div>';
            }

            $stmt->close();
        } else {
            $message = '<div class="alert alert-danger">Sorry, there was an error uploading your file.</div>';
        }
    }
}
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0 text-dark">Add Banner</h1>
            <?php echo $message; ?>
            <form method="POST" action="add_banner.php" enctype="multipart/form-data" class="mt-4">
                <div class="form-group">
                    <label for="banner_title">Banner Title</label>
                    <input type="text" class="form-control" id="banner_title" name="banner_title" required>
                </div>
                <div class="form-group">
                    <label for="banner_image">Select Banner Image</label>
                    <input type="file" class="form-control" id="banner_image" name="banner_image" accept="image/*" required>
                </div>
                <button type="submit" class="btn btn-primary">Upload Banner</button>
                <a href="list_banner.php" class="btn btn-secondary ml-2">View Banners</a>
            </form>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>
