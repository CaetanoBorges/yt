<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("_partes/css.php") ?>
    <title>Login</title>
</head>
<style>
    .cliente-form{display: block;width: fit-content;margin: 100px auto;}
    .cliente-form div{display:block;margin:10px 0}
    .cliente-form div input {width: 297px;height: 52px;border-radius: 0; background-color: #D9D9D923;border: 1px solid #00000044;display: block;text-align: center;font-size: 24px;padding:0 5px;}
    .cliente-form div p{font-size: 24px;color:#00000075;margin: 0 0 -6px 0;}

    .btn-entrar{width: 309px;cursor: pointer;margin: 10px 0 30px 0;}
    .btn-cadastrar{width: 309px;cursor: pointer;margin: 30px 0;}
    .esqueci{font-weight: bold;cursor: pointer;font-size: 24px;text-align: center;}
    .user{display: block;margin:0 auto 10px auto;width: 68px;}

</style>
<body>
    <?php
        include("_partes/header.php");
     ?>


    <div class="yetu-body">
            <div class="cliente-form">
            <img src="_icones/user.png" class="user">
                <div>
                    <p>Email</p>
                    <input type="email">
                </div>
                <div>
                    <p>Palavra passe</p>
                    <input type="password">
                </div>
                <img src="_icones/btn-entrar.png" class="btn-entrar">
                <p class="esqueci">Esqueci<br>a palavra passe</p>
                <img src="_icones/btn-cadastrar.png" class="btn-cadastrar">
            </div>
        
    </div>
     
           
    <?php
        include("_partes/pes.php");
    ?>

    <?php include("_partes/script.php") ?>

    
     <script>
       
     </script>
</body>
</html>