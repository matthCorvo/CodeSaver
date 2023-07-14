<?php  
     require_once "loginController.php";
      include_once "includes/header.php"
?>
<div class="card text-center" style="padding:20px;">
  <h3>Connexion</h3>
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
            <label for="username">Nom d'utilisateur :</label> 
            <input type="text" class="form-control" name="username" placeholder="Entrez votre nom d'utilisateur" >
          </div>
          <div class="form-group">  
            <label for="password">mot de passe:</label> 
            <input type="password" class="form-control" name="password" placeholder="Entrez votre mot de passe">
          </div>
          <div class="form-group">
            <p>Si vous n'êtes pas encore inscrit ?<a href="register.php"> Inscrivez-vous ici</a></p>
            <input type="submit" name="submit" class="btn btn-success" value="Connexion"> 
          </div>
        </form>
        <p class="text-center mt-5">Pour essayer,  Nom : <span class="fw-bold">demo </span> - mot de passe : <span class="fw-bold">demo </span> </p>
      </div>
  </div>
</div>
<?php 
      include_once "./includes/footer.php"
?>