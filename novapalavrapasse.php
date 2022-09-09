<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("_partes/css.php") ?>
    <title>Nova palavra passe</title>
</head>
<style>
    .cliente-form{display: block;width: fit-content;margin: 0 auto 100px auto;}
    .cliente-form div{display:block;margin:10px 0}
    .cliente-form div input {width: 297px;height: 52px;border-radius: 0; background-color: #D9D9D923;border: 1px solid #00000044;display: block;text-align: center;font-size: 24px;padding:0 5px;}
    .cliente-form div p{font-size: 24px;color:#00000075;margin: 0 0 -6px 0;}

    .btn-recuperar{width: 309px;cursor: pointer;margin: 10px 0 30px 0;}
    .btn-cadastrar{width: 309px;cursor: pointer;margin: 30px 0;}
    .esqueci{font-weight: bold;cursor: pointer;font-size: 24px;text-align: center;}
    .user{display: block;margin:100px auto 30px auto;width: 498px;}

</style>
<body>
    <?php
        include("_partes/header.php");
     ?>


    <div class="yetu-body">
            <img src="_icones/recuperacao-conta.png" class="user">
            <div class="cliente-form">
                <div>
                    <p>Palavra passe</p>
                    <input type="password" id="palavra">
                </div>
                <img src="_icones/btn-recuperar.png" class="btn-recuperar">
            </div>
            <br><br><br><br>
    </div>
     
           
    <?php
        include("_partes/pes.php");
    ?>

    <?php include("_partes/script.php") ?>
     <script>
        $(".btn-recuperar").click(function(){
            loader("_icones/preloader.gif");
            var email = localStorage.getItem("email");
            var numero = localStorage.getItem("numero");
            var pass = $("#palavra").val();
            $.post("_API/Conta/novapasse.php",{email: email, numero: numero,palavra_passe: pass}).done(function(dados){
                    console.log(dados);
                    var obj = JSON.parse(dados);
                    if(obj.ok){ 
                         pegaUser(obj.payload);
                        tbUser.setItem("token", obj.payload).then(function(e){
                            location.href = "conta.php";
                        })
                    }else{
                        notificacao(obj.payload);
                    }
            }).always(function(a){
                loader("_icones/preloader.gif");
            })
        })
     </script>
</body>
</html>