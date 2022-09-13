<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("_partes/css.php") ?>
    <title>Comprar</title>
</head>
<style> 
    .btn-cancelar{margin: 40px 0;cursor: pointer;}
    .cliente-form-preco{display: block;}
    .cliente-form{display: block;}
    .cliente-form div{display:block;margin:10px 0}
    .cliente-form div input {width: 297px;height: 52px;border-radius: 0; background-color: #D9D9D923;border: 1px solid #00000044;display: block;text-align: center;font-size: 24px;padding:0 5px;}
    .cliente-form div p{font-size: 24px;color:#00000075;margin: 0 0 -6px 0;}

    .cliente-preco{font-size: 24px;}

    .btn-prosseguir{display: block;margin: 150px auto;width: 380px;cursor: pointer;}
    .por-favor{font-size: 24px; text-transform: uppercase;margin:100px 0 50px 0}

    .nao-recebeu{font-size: 24px;color: #ff0000;margin: 40px 0 5px 0;}
    .para-receber{font-size: 24px;margin: 0;}
    .para-receber span{font-size: 30px;font-weight: bold;cursor: pointer;}
    @media screen and (max-width:1000px) {
        .btn-prosseguir{margin: 50px auto;width: 100%;}
        .por-favor{font-size: 18px; margin:30px 0 50px 0}
        .nao-recebeu{font-size: 18px;margin-top:10px}
        .para-receber{font-size: 18px;}
        #numero-confirmar{height: 30px;width: 50%;}
    }
</style>
<body>
    <?php
        include("_partes/header.php");
     ?>


    <div class="yetu-body">
        <img src="_icones/cancelar.png" class="btn-cancelar" onclick="history.back()">
        <div class="cliente-form-preco">
            <div class="cliente-preco">
                <p class="itens"></p>
                <p class="total"></p>
            </div>

            <p class="por-favor">POR FAVOR, CONFIRME O NÚMERO DE VALIDAÇÃO QUE RECEBEU POR MENSAGEM<br>
            PARA EFECTIVAR A COMPRA:</p>

            <div class="cliente-form">      
                <div>
                    <p>Número de efectivação</p>
                    <input type="number" id="numero-confirmar">
                </div>
            </div>
            <p class="nao-recebeu">Não recebeu nenhuma mensagem?</p>
            <p class="para-receber">Click <span onclick="fazerPedido()">aqui</span> para reenviarmos o número de validação</p>
        </div>
        
        <img src="_icones/compr.png" class="btn-prosseguir" onclick="confirmarPedido()">
    </div>
     
           
    <?php
        include("_partes/pes.php");
    ?>

    <?php include("_partes/script.php") ?>
 
    
     <script>
        function fazerPedido(){
            loader("_icones/preloader.gif");
            var carrinho = [];

                tbCarrinho.iterate(function(res,key,iterator){
                    carrinho.push(res);
                }).then(function(){
                    tbUser.getItem("dados").then(function(user){
                        console.log(carrinho, user);
                        $.post("_API/pedido/numero.php",{numero: user.telefone, email: user.email}).done(function(response){
                            console.log(response);
                            var obj = '';
                            try {
                                obj = JSON.parse(response);
                            }
                            catch(err) {
                                loader("_icones/preloader.gif");
                                notificacao("Ocorreu algum erro, repita por favor");
                            }
                            if(obj.ok){
                                //location.href = "comprar.php";
                                loader("_icones/preloader.gif");
                                notificacao("Número de confirmação enviado");
                            }
                            //location.href = "comprar.php";
                        })
                        
                    })

                })
        }

        function confirmarPedido(){
            var numero = $("#numero-confirmar").val();
            if(!maior(numero,5)){
                notificacao("Numero curto, verifique a mensagem ou email")
                return
            }
            var carrinho = [];
            loader("_icones/preloader.gif");
            tbCarrinho.iterate(function(res,key,iterator){
                carrinho.push(res);
            }).then(function(){
                tbUser.getItem("dados").then(function(user){
                    var use = user;
                    console.log(carrinho, user);
                    tbUser.getItem("token").then(function(token){
                        var user = '';
                        if(token){
                            user = token;
                        }
                        $.post("_API/pedido/confirmar.php",{token:user,numero: numero, user: use, carrinho: carrinho}).done(function(response){
                            console.log(response);
                            var obj = '';
                            try {
                                obj = JSON.parse(response);
                            }
                            catch(err) {
                                loader("_icones/preloader.gif");
                                notificacao("Ocorreu algum erro, repita por favor");
                            }
                            if(obj.ok){
                                tbCarrinho.clear();
                                location.href = "acaminho.php";
                            }
                        })
                    })
                    
                        
                })

            })
        }
     </script>
</body>
</html>