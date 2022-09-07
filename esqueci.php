<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("_partes/css.php") ?>
    <title>Esqueci a passe</title>
</head>
<style>
    .cliente-form{display: block;width: fit-content;margin: 100px auto;}

    .btn-obter{display:block;width: 309px;cursor: pointer;margin: 10px 0 40px 0;}
    .btn-tenho{display:block;width: 309px;cursor: pointer;margin: 40px 0 100px 0;}
    .user{display: block;margin:0 auto 60px auto;}

</style>
<body>
    <?php
        include("_partes/header.php");
     ?>


    <div class="yetu-body">
            <div class="cliente-form">
                <img src="_icones/codigo-renovacao.png" class="user">
                <a href="recebercodigo.php"><img src="_icones/btn-obter-codigo.png" class="btn-obter"></a>
                <a href="validarcodigo.php"><img src="_icones/btn-tenho-codigo.png" class="btn-tenho"></a>
            </div>
        <br><br><br><br> <br><br><br>
    </div>
     
           
    <?php
        include("_partes/pes.php");
    ?>

    <?php include("_partes/script.php") ?>

    
     <script>
       
     </script>
</body>
</html>