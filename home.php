<?php
session_start(); // Start the session

require_once "index.php"; 
include_once "./includes/header.php"
      
?>


<body>
    
    <section class="container-fluid  row">
        <!-- Cotés gauche  -->
        <div class="  col-lg-6 col-sm-12 left ">
            <h2 class="text-center mt-3">CODE SAVER</h2>
            
            <?php if (isset($_SESSION['ROLE'])) : ?>
            <h4 class="text-center mt-3"> Hello, <?= ($_SESSION['NAME']); ?> <a class="btn btn-light btn-sm" href="logout.php">Déconnexion</a></h4> 
            <div class="form_content m-3 p-3">
                <a href="index.php" class="mb-4 btn btn-light fw-bold">Ajouter un nouveau code</a>
           
                <form action="" method="post">
    
        <div class="mb-3" >
        <h4>Titre </h4> 
        <input class="form-control"   value="<?= $title ?>" type="text" name="title" autocomplete="off" placeholder="Titre" required >
        </div>
    
        <div class="mb-3" >
        <h4>Technologies </h4> 
        <select class="form-select rounded" name="language" >
            <option class="fw-bold " >Selectionnez un langage de programmation </option>
            <option value="PHP" <?php if($language=="PHP"){ echo 'selected="selected"';} ?> >PHP</option>
            <option value="Javascript"  <?php if($language=="Javascript"){ echo 'selected="selected"';} ?> >Javascript</option>
            <option value="CSS"  <?php if($language=="PHP"){ echo 'selected="selected"';} ?> >CSS</option>
            <!-- <option value="SQL" <?php if($language=="SQL"){ echo 'selected="selected"';} ?>>SQL</option>
            <option value="Symfony"  <?php if($language=="Symfony"){ echo 'selected="selected"';} ?> >Symfony</option>
            <option value="MongoDB"  <?php if($language=="MongoDB"){ echo 'selected="selected"';} ?> >MongoDB</option>
            <option value="Docker"  <?php if($language=="Docker"){ echo 'selected="selected"';} ?> >Docker</option> -->
        </select>
        </div>
    
        
        <div class="mb-3" >
        <h3>Source </h3> 
        <input class="form-control" value="<?= $url ?>" type="text" name="url" autocomplete="off"  placeholder="https://">
        </div>
    
        
        <div class="mb-2" >
        <h3>Code </h3> 
        <textarea class="form-control" name="content" cols="50" rows="7" placeholder="coller votre code"><?= $content ?></textarea> <br>
        <?php if( $_SESSION['ROLE'] === 'super_admin'): ?>
        <?php if($id): ?>
        <hr>
        <h4>Souhaitez-vous supprimer ce code ? </h4> 
        <button type="submit" name="delete" class="btn btn-light mt-2" onclick="return confirm('Are you sure you want to delete this code?')">Supprimer</button>
        <hr>
        <?php endif; ?>
        <?php endif; ?>
        <div  class="text-center" >
            <button type="submit" name="save_code"  class="btn btn-light fw-bold" >Enregitrer</button>
        </div>
       </div>
    
        </form>
    </div>
    <?php else : ?>
            <a href="login.php" class="mb-2 btn btn-light">Ajouter un nouveau code</a>
        <?php endif; ?>
    <br>

    <div class="code_listing mt-2 m-3 p-3">
    <h3 class="text-center mb-4">Liste des codes sauvegardés</h3>

    <div class="code_listing_content">
    <label class="mb-3 fw-bold fs-5" for="filterLanguage">Filtrer par technos :</label>
    <select class="rounded btn btn-light btn-sm" name="filterLanguage" id="filterLanguage">
        <option value="">Tous les languages</option>
        <option value="PHP">PHP</option>
        <option value="Javascript">Javascript</option>
        <option value="CSS">CSS</option>
        <!-- <option value="SQL">SQL</option>
        <option value="Symfony">Symfony</option>
        <option value="MongoDB">MongoDB</option>
        <option value="Docker">Docker</option> -->
    </select>

    <ul id="codeSnippets">
        <?php foreach ($codeSnippet as $row): ?>
            <li class="d-flex justify-content-between border rounded bg-light mb-3 p-2 filter" data-language="<?= $row['language'] ?>">
                <a href="index.php?id=<?= $row['id'] ?>">
                    <?= $row['title'] ?>
                </a>

                <span class="btn btn-secondary btn-sm fw-bold">
                    <?= $row['language'] ?>
                </span>
            </li>
        <?php endforeach ?>
    </ul>
</div>


</div>
</div>
        <!-- FIN Cotés gauche  -->

        <!-- Cotés droit  -->

        <div class="col-lg-6 col-sm-12 right ">
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

<div class="footer p-3">
    <a class="mt-3" href="https://github.com/matthCorvo/CodeSaver">
    <i class="fa-brands fa-square-github fa-2xl"></i>
    </a>
    <br>
   <h5> 
    by <a href="https://matthcorvo.github.io/portfolio/">MatthCcode</a>
   </h5> 
  </div>
  <?php 
      include_once "./includes/footer.php"
?>
<script>
    document.getElementById('filterLanguage').addEventListener('change', function() {
        var selectedValue = this.value;
        var listItems = document.querySelectorAll('#codeSnippets li');

        listItems.forEach(function(item) {
            var language = item.getAttribute('data-language');
            if (selectedValue === '' || language === selectedValue) {
                item.classList.remove('d-none');
            } else {
                item.classList.add('d-none');
            }
        });
    });
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
<script>hljs.highlightAll();</script>
