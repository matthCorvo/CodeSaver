<?php require_once "index.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Code Docs</title>
</head>
<body>
    <h3>Code sheet</h3>

    <!-- Cotés gauche  -->
    <form action="" method="post">

    <div class="mb-2" >
    <h3>Titre </h3> 
    <input type="text" name="title" autocomplete="off" placeholder="Titre" >
    </div>

    <div class="mb-2" >
    <h3>Technologies </h3> 
    <select name="language" >
        <option>--Selectionnez un language de programation</option>
        <option>PHP</option>
        <option>Javascript</option>
        <option>CSS</option>
        <option>SQL</option>
        <option>Symfony</option>
    </select>
    </div>

    
    <div class="mb-2" >
    <h3>Lien </h3> 
    <input type="text" name="url" autocomplete="off"  placeholder="htpps://">
    </div>

    
    <div class="mb-2" >
    <h3>Code </h3> 
    <textarea  name="content" cols="50" rows="7"></textarea> <br>
    <button type="submit" name="save_code" >Enregitrer</button>
   </div>

    </form>
        <!-- FIN Cotés gauche  -->





        
</body>
</html>