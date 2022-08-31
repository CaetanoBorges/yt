<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("_partes/css.php") ?>
    <link rel="stylesheet" href="_css/compras.css">
    <title>Minhas compras</title>
</head>
<style>


</style>
<body>
    <?php
        include("_partes/header.php");
     ?>


    <div class="yetu-body">
        <div class="compras">
            <div class="compras-nome">
                <p class="nome-ver" id="items"></p>
            </div>

            <div class="compras-container">

            </div>


        </div>
        <br><br><br><br><br><br><br>
        


    </div>
     
           
    <?php
        include("_partes/pes.php");
    ?>

    <?php include("_partes/script.php") ?>
    <script>
        tbUser.getItem("token").then(function(res) {
        if (res) {
            
            return
        }
        location.href = "login.php";
    })
    </script>
    <script src="_js/paginas/compras.js"></script>
</body>
</html>