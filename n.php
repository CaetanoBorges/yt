<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("_partes/css.php") ?>
    <title>Informações de compra</title>
</head>
<style>
    .btn-cancelar{margin: 40px 0;cursor: pointer;}
    .nocliente-form-preco{display: block;}
    .nocliente-form{display: block;}
    .nocliente-form div{display:block;margin:10px 0}
    .nocliente-form div input {width: 297px;height: 52px;border-radius: 0; background-color: #D9D9D923;border: 1px solid #00000044;display: block;text-align: center;font-size: 24px;padding:0 5px;}
    .nocliente-form div p{font-size: 24px;color:#00000075;margin: 0 0 -6px 0;}

    .cliente-preco{float: right;font-size: 24px;}

    .btn-prosseguir{display: block;margin: 150px auto;width: 380px;cursor: pointer;}
    @media screen and (max-width:1000px) {
        .btn-prosseguir{width: 90%;display: block;margin: 20px auto;}
        p.itens{font-size: 20px;clear: both;}
        p.total{font-size: 20px;clear: both;}
        .cliente-preco{float: none;line-height: 21px;margin-bottom: 20px;}
    }
</style>
<body>
    <?php
        include("_partes/header.php");
     ?>


    <div class="yetu-body">
        <img src="_icones/cancelar.png" class="btn-cancelar" onclick="cancelar()">
        <div class="nocliente-form-preco">
            <div class="cliente-preco">
                <p class="itens"></p>
                <p class="total"></p>
            </div>

            <div class="nocliente-form">      
                <div>
                    <p>Nome</p>
                    <input type="text" id="nome-user">
                </div>
                <div>
                    <p>Bairro</p>
                    <input type="text" id="bairro-user">
                </div>
                <div>
                    <p>Rua</p>
                    <input type="text" id="rua-user">
                </div>
                <div>
                    <p>Email (Opcional)</p>
                    <input type="email" id="email-user">
                </div>
                <div>
                    <p>Telefone</p>
                    <input type="number" id="telefone-user">
                </div>
            </div>
        </div>
        
        <img src="_icones/prosseguir.png" class="btn-prosseguir" onclick="prosseguir()">
    </div>
     
           
    <?php
        include("_partes/pes.php");
    ?>

    <?php include("_partes/script.php") ?>

    
     <script>
       function prosseguir(){

            var nome = $("#nome-user").val();
            var rua = $("#rua-user").val();
            var bairro = $("#bairro-user").val();
            var email = $("#email-user").val();
            var telefone = $("#telefone-user").val();

            if (maior(nome, 6) && maior(rua, 4) && maior(bairro, 4) && maior(telefone, 8)) {
                var user = {
                    "nome": nome,
                    "telefone": telefone,
                    "email": email,
                    "bairro": bairro,
                    "rua": rua
                }
                tbUser.setItem("dados",user).then(function(res){
                    fazerPedido();
                });

        

                return
            }
            
            notificacao("Precisa preencher os campos corretamente");
       }

        function fazerPedido(){
            var carrinho = [];

                tbCarrinho.iterate(function(res,key,iterator){
                    carrinho.push(res);
                }).then(function(){
                    tbUser.getItem("dados").then(function(user){
                        console.log(carrinho, user);
                        $.post("_API/pedido/numero.php",{numero: user.telefone, email: user.email}).done(function(response){
                            console.log(response);
                            location.href = "comprar.php";
                        })
                        
                    })

                })
        }

       function cancelar(){
            history.back();
       }

       function ficarOuIr(){
            tbUser.getItem("dados").then(function(user){
                if(user){
                    fazerPedido();
                }
                        
            })
       }

       ficarOuIr();
     </script>
</body>
</html>