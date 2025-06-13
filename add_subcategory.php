<?php 
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add Subcategory</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Subcategory</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="section-body">
        <form method="POST" action="process_add_subcategory.php">
            <div class="form-group">
                <label for="subcategory_name">Subcategory Name</label>
                <input type="text" class="form-control" id="subcategory_name" name="subcategory_name" required>
            </div>
            <div class="form-group">
                <label for="main_category">Select Main Category</label>
                <select class="form-control" id="main_category" name="main_category" required>
                    <!-- Populate with main categories -->
                    <?php foreach ($mainCategories as $category): ?>
                        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Subcategory</button>
        </form>
    </div>
</div>

<?php
include('includes/footer.php');
?>
