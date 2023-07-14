<?php  
     require_once "registerController.php";
      include_once "includes/header.php"
?>
<div class="card text-center" style="padding:20px;">
  <h3>Inscription </h3>
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
          <label for="name" class="form-label">Nom :</label>
          <input type="text" class="form-control" name="name" placeholder="Entrez votre nom" required>
        </div>
        <div class="mb-3">  
          <label for="username" class="form-label">Nom d'utilisateur : </label>
          <input type="text" class="form-control" name="username" placeholder="Entrez votre nom d'utilisateur" required>
        </div>
        <div class="mb-3">  
          <label for="password" class="form-label">mot de passe :</label>
          <input type="password" class="form-control" name="password" placeholder="Entrez votre mot de passe" required>
        </div>
        <div class="mb-3">  
          <label for="password" class="form-label">Vérifiez le mot de passe :</label>
          <input type="password" class="form-control" name="verify_password" placeholder="Entrez votre mot de passe" required>
        </div>
        <div class="mb-3">  
          <label for="role" class="form-label">Role:</label>
          <select class="form-select" name="role" required>
      
            <option value="admin">LaPasserelle</option>
          </select>
        </div>
        <div class="mb-3">
          <p>Vous avez déjà un compte ? <a href="login.php">Connexion</a></p>         
          <input type="submit" name="submit" class="btn btn-primary" value="S'inscrire">
        </div>
      </form>
    </div>
  </div>
</div>
<?php 
      include_once "./includes/footer.php"
?>