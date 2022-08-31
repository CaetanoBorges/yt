<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("_partes/css.php") ?>
    <title>Aplicativo</title>
</head>
<style>
    .titulo-definicoes{text-align: center;text-transform: uppercase;font-size: 30px;}
    .bloco{
        width:500px;
        display: block;
        margin: 0 auto;
    }
    .tabela-definicoes {
        display: grid;
        grid-template-columns: 50% 50%;
        row-gap: 7%;
        column-gap: 12%;
    }

    .tabela-item {
        width: 100%;
        background: #ff0000;
        margin: auto;
        cursor: pointer;
    }
    .tabela-item img{
        height:130px;
        display: block;
        margin: 20px auto;
    }

    .tabela-item span{
        display: block;
        background: #000;
        text-align: center;
        font-weight: bold;
        color: #fff;
        text-transform: uppercase;
        font-size: 19px;
        padding: 5px;
        }
</style>
<body>
    <?php
        include("_partes/header.php");
     ?>


    <div class="yetu-body">
        <br><br><br>
           <h3 class="titulo-definicoes">definições</h3>
            <br>
            <div class="bloco">
                <div class="tabela-definicoes">
                    <div class="tabela-item" onclick="instalar()">
                        <img src="_icones/install.png">
                        <span class="aplicacao-status">
                        </span>
                    </div>
                    <div class="tabela-item" onclick="permissaoNotificacao()">
                        <img src="_icones/notificacao.png">
                        <span class="notificacao-status">
                        </span>
                    </div>
                </div>
            </div>
            <br><br><br>
    </div>
           
    <?php
        include("_partes/pes.php");
    ?>

    <?php include("_partes/script.php") ?>

    
     <script>
        $(document).ready(function(){
            var notificacao = Notification.permission;
            if(notificacao == "granted"){
                $(".notificacao-status").html("notificações ativadas").css({color:"#ff0000"});
            }else{
                $(".notificacao-status").html("ativar notificações").css({color:"#fff"});
            }
            
            setTimeout(function(){
               if(deferredPrompt){
                    if (!deferredPrompt.isTrusted) {
                        $(".aplicacao-status").html("aplicação instalada").css({color:"#ff0000"});
                    }else{
                        $(".aplicacao-status").html("instalar aplicação").css({color:"#fff"});
                    }
               }else{
                    $(".aplicacao-status").html("aplicação instalada").css({color:"#ff0000"});
               }
            },1000)
        })
     </script>
</body>
</html>