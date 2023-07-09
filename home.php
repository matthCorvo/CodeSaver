<?php
session_start(); // Start the session

require_once "index.php"; 
      include_once "./includes/header.php"



      
?>


<body>
    
    <section class="intro row">
        <!-- Cotés gauche  -->
        <div class="col-lg-6 col-sm-12 left ">
            
            <div class="form_content">

                <h3>Code sheet</h3>
                <?php if (isset($_SESSION['ROLE'])) : ?>
                Hi, <?php echo ucwords($_SESSION['NAME']); ?> <a class="nav-link" href="logout.php"> <button>Log out</button></a>
                <a href="index.php" class="mb-2">Ajouter un nouveau code</a>
           
            
                <form action="" method="post">
    
        <div class="mb-2" >
        <h3>Titre </h3> 
        <input value="<?= $title ?>" type="text" name="title" autocomplete="off" placeholder="Titre" required >
        </div>
    
        <div class="mb-2" >
        <h3>Technologies </h3> 
        <select name="language" >
            <option>--Selectionnez un langage de programmation </option>
            <option value="PHP" <?php if($language=="PHP"){ echo 'selected="selected"';} ?> >PHP</option>
            <option value="Javascript"  <?php if($language=="Javascript"){ echo 'selected="selected"';} ?> >Javascript</option>
            <option value="CSS"  <?php if($language=="PHP"){ echo 'selected="selected"';} ?> >CSS</option>
            <option value="SQL" <?php if($language=="SQL"){ echo 'selected="selected"';} ?>>SQL</option>
            <option value="Symfony"  <?php if($language=="Symfony"){ echo 'selected="selected"';} ?> >Symfony</option>
            <option value="MongoDB"  <?php if($language=="MongoDB"){ echo 'selected="selected"';} ?> >MongoDB</option>
            <option value="Docker"  <?php if($language=="Docker"){ echo 'selected="selected"';} ?> >Docker</option>
        </select>
        </div>
    
        
        <div class="mb-2" >
        <h3>Lien </h3> 
        <input value="<?= $url ?>" type="text" name="url" autocomplete="off"  placeholder="htpps://">
        </div>
    
        
        <div class="mb-2" >
        <h3>Code </h3> 
        <textarea  name="content" cols="50" rows="7"><?= $content ?></textarea> <br>
        <?php if( $_SESSION['ROLE'] === 'super_admin'): ?>
        <?php if($id): ?>
        <hr>
        <h3>Supprimer ce code ? </h3> 
        <button type="submit" name="delete"  onclick="return confirm('Are you sure you want to delete this code?')">Supprimer</button>
        <hr>
        <?php endif; ?>
        <?php endif; ?>

        <button type="submit" name="save_code" >Enregitrer</button>
       </div>
    
        </form>
        <?php else : ?>
                <a href="login.php" class="mb-2">Ajouter un nouveau code</a>
            <?php endif; ?>
            </div>
    <br>

    <div class="code_listing mt-3">
        <h3> Code liste</h3>
        <div class="code_listing_content" >
            <ul>
                <?php foreach ( $codeSnippet as $row ): ?>
                <li>  <?= $row['language'] ?> <a href="index.php?id=<?= $row['id'] ?>"><?= $row['title'] ?> </a></li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
</div>
        <!-- FIN Cotés gauche  -->

        <!-- Cotés droit  -->

        <div class="col-lg-6 col-sm-12 right">
      <h1>Code sauvegarder  </h1>
      <h3><?= $title ?></h3>
        <div class="code_block">
            <pre>
                <code class="language <?= $language;?> ">
                <?= $content ?>
        
                </code>
            </pre>
        </div>
        <h4>source : <a href="<?= $url ?>"><?= $url ?></a></h4>
    </div>
            <!-- FIN Cotés droit  -->

</section>

<div class="footer">
    <a href="">
    <i class="fa-brands fa-square-github fa-2xl"></i>
    </a>
  </div>
  <?php 
      include_once "./includes/footer.php"
?>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
<script>hljs.highlightAll();</script>