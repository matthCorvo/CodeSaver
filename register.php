<?php  
     require_once "registerController.php";
      include_once "includes/header.php"
?>
<div class="card text-center" style="padding:20px;">
  <h3>Code snippet Inscription authoristion</h3>
</div><br>
<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">      
      <?php if (isset($errorMsg)) { ?>
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          <?php echo $errorMsg; ?>
        </div>
      <?php } ?>
      <form action="" method="POST">
        <div class="mb-3">
          <label for="name" class="form-label">Name:</label>
          <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
        </div>
        <div class="mb-3">  
          <label for="username" class="form-label">Username:</label>
          <input type="text" class="form-control" name="username" placeholder="Enter Username" required>
        </div>
        <div class="mb-3">  
          <label for="password" class="form-label">Password:</label>
          <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
        </div>
        <div class="mb-3">  
          <label for="password" class="form-label">verify Password:</label>
          <input type="password" class="form-control" name="verify_password" placeholder="Enter Password Again" required>
        </div>
        <div class="mb-3">  
          <label for="role" class="form-label">Role:</label>
          <select class="form-select" name="role" required>
      
            <option value="admin">LaPasserelle</option>
          </select>
        </div>
        <div class="mb-3">
          <p>Already have an account? <a href="login.php">Login</a></p>         
          <input type="submit" name="submit" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>
</div>
<?php 
      include_once "./includes/footer.php"
?>