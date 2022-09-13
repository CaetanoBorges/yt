<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("_partes/css.php") ?>
    <title>Loja Yetu</title>
</head>
<script>
       

</script>
<style>
    body{overflow: hidden;}
    .splash-container{position:fixed;top:0;left:0;width: 100%;height:100vh;background: #fff; z-index: 9999;}
    .splash-body{display: block;width: 500px;margin: 0 auto;}
    .splash-body .benvindo{width: 100%;margin: 20px 0}
    .splash-body .splash-item{display: flex;align-items: center;justify-content: space-between;margin-bottom: 15px;}
    .splash-body p{display: inline-block;font-size: 32px;text-transform: uppercase;margin:0}
    .splash-body span{display: inline-block}
    .splash-body span img{width: 47px;}
    @media screen and (max-width:1000px) {
            
            .splash-body{width: 80%;padding: 10%;}

        }
</style>
<div class="splash-container">
    <div class="splash-body">
        <img src="_icones/benvindo.png" class="benvindo">
        <div class="splash-item">
            <p>produtos</p><span><img src="_icones/preloader.gif" class="preload-produtos"></span>
        </div>
        <div class="splash-item">
            <p>slides</p><span><img src="_icones/preloader.gif" class="preload-slides"></span>
        </div>
        <div class="splash-item">
            <p>categorias</p><span><img src="_icones/preloader.gif" class="preload-categorias"></span>
        </div>
        <div class="splash-item">
            <p>sugestões</p><span><img src="_icones/preloader.gif" class="preload-sugestoes"></span>
        </div>
    </div>
    
</div>

<body>
    <?php
        include("_partes/header.php");
     ?>

    <div class="yetu-body">
         <?php
            include("_partes/slide-um.php");
         ?>

         <?php
            include("_partes/card-itens.php");
         ?>

        <br><br><br>
        <?php 
            include("_partes/slide-sugestao.php");
        ?>

        <?php
            include("_partes/slide-grosso.php");
        ?>

    </div>
     
           
    <?php
        include("_partes/pes.php");
    ?>

    <?php include("_partes/script.php") ?>
    <script src="_js/bin/card-itens.js"></script>
</body>
</html>