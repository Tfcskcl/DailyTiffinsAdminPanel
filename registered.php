<?php
session_start();
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');

// Handle external HTML form registration
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['external_user'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = ''; // Can be generated if needed

    $check_query = "SELECT * FROM users WHERE email = '$email' OR phone = '$phone'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        $_SESSION['status'] = "User already registered.";
    } else {
        $insert_query = "INSERT INTO users (name, phone, email, password) VALUES ('$name', '$phone', '$email', '$password')";
        if (mysqli_query($con, $insert_query)) {
            $_SESSION['status'] = "User registered successfully from external form.";
        } else {
            $_SESSION['status'] = "Something went wrong during registration.";
        }
    }
    header("Location: registered.php");
    exit();
}
?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">

<!-- User Modal -->
<div class="modal fade" id="AdduserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add User</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>
<form action="code.php" method="POST">
      <div class="modal-body">
        <div class="form-group">
          <label for="">Name</label>
          <input type="text" name="name" class="form-control" placeholder="Name">
      </div>
    
      <div class="form-group">
          <label for="">Phone Number</label>
          <input type="text" name="phone" class="form-control" placeholder="Phone Number">
      </div>
      <div class="form-group">
          <label for="">Email Id</label>
          <input type="email" name="email" class="form-control" placeholder="Email Id">
      </div>
      <div class="form-group">
          <label for="">Password</label>
          <input type="password" name="password" class="form-control" placeholder="Password">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="addUser" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>

   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Registered Users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
 <!-- /.card -->

 <section class="content">
 <div class="container">
<div class="row">
    <div class="col-md-12">
<?php
if(isset($_SESSION['status']))
{
  echo "<h4>" .$_SESSION['status']."</h4>";
  unset($_SESSION['status']);
}

?>
             <div class="card">
              <div class="card-header">
                <h3 class="card-title">Registered Users</h3>
                <a href="#" data-toggle="modal" data-target="#AdduserModal" class="btn btn-primary float-sm-right">Add user</a>

              </div>
              
              <!-- /.card-header -->

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>Id</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
$query = "SELECT * FROM users";
$query_run = mysqli_query($con, $query);

if(mysqli_num_rows($query_run) > 0)
{
foreach($query_run as $row)
{
?>
 <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                   <td>
                    <a href="registered-edit.php?user_id=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
                    <a href="" class="btn btn-danger">Delete</a>
                   </td>
                  
                  </tr>
<?php
 }
}
else
{
  ?>
  <tr>
    <td>No Record Found</td>
  </tr>
  <?php
}
?>
                  </tr>
                  </tbody>
                  </table>
</div>
</div>
</div>
</div>
</div>
</section>
 </div>


<?php
include('includes/footer.php');
?>
