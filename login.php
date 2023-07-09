<?php  
     require_once "loginController.php";
      include_once "includes/header.php"
?>
<div class="card text-center" style="padding:20px;">
  <h3>login</h3>
</div><br>
<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
      <div class="col-md-6">
        <?php if (isset($errorMsg)) { ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $errorMsg; ?>
          </div>
        <?php } ?>
        <form action="" method="POST">
          <div class="form-group">  
            <label for="username">Username:</label> 
            <input type="text" class="form-control" name="username" placeholder="Enter Username" >
          </div>
          <div class="form-group">  
            <label for="password">Password:</label> 
            <input type="password" class="form-control" name="password" placeholder="Enter Password">
          </div>
          <div class="form-group">
            <p>Not registered yet ?<a href="register.php"> Register here</a></p>
            <input type="submit" name="submit" class="btn btn-success" value="Login"> 
          </div>
        </form>
      </div>
  </div>
</div>
<?php 
      include_once "./includes/footer.php"
?>