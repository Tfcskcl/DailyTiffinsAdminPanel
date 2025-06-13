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
                    <h1 class="m-0 text-dark">Add Meal</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Meal</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="section-body">
        <form method="POST" action="process_add_meal.php">
            <div class="form-group">
                <label for="meal_name">Meal Name</label>
                <input type="text" class="form-control" id="meal_name" name="meal_name" required>
            </div>
            <div class="form-group">
                <label for="meal_description">Meal Description</label>
                <textarea class="form-control" id="meal_description" name="meal_description" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="meal_price">Meal Price</label>
                <input type="number" class="form-control" id="meal_price" name="meal_price" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Meal</button>
        </form>
    </div>
</div>

<?php
include('includes/footer.php');
?>
