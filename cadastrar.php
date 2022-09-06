<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("_partes/css.php") ?>
    <title>Cadastrar</title>
</head>
<style>
    .cliente-form{display: block;width: fit-content;margin: 0 auto 100px auto;}
    .cliente-form div{display:block;margin:10px 0}
    .cliente-form div input {width: 297px;height: 52px;border-radius: 0; background-color: #D9D9D923;border: 1px solid #00000044;display: block;text-align: center;font-size: 24px;padding:0 5px;}
    .cliente-form div p{font-size: 24px;color:#00000075;margin: 0 0 -6px 0;}

    .btn-cadastrar{width: 309px;cursor: pointer;margin: 10px 0 5px 0;}
    
    .esqueci{font-weight: bold;cursor: pointer;font-size: 24px;text-align: center;}
    .user{display: block;margin:100px auto 30px auto;width: 498px;}

    .consentimento{font-size: 14px;margin:0}
    .consentimento span{color:#ff0000;cursor: pointer;}
</style>
<body>
    <?php
        include("_partes/header.php");
     ?>


    <div class="yetu-body">
            <img src="_icones/cadastro-simples.png" class="user">
            <div class="cliente-form">
                <div>
                            <p>Nome completo</p>
                            <input type="text" id="nome-user">
                        </div>
                        <div>
                            <p>Rua</p>
                            <input type="text" id="rua-user">
                        </div>
                        <div>
                            <p>Bairro</p>
                            <input type="text" id="bairro-user">
                        </div>
                        <div>
                            <p>Email</p>
                            <input type="email" id="email-user"> 
                        </div>
                        <div>
                            <p>Telefone</p>
                            <input type="text" id="telefone-user">
                        </div>
                <div>
                    <p>Palavra passe</p>
                    <input type="password" id="pass-user">
                </div>
                <img src="_icones/btn-cadastrar.png" class="btn-cadastrar" style="cursor:pointer">
                <p class="consentimento">Ao clicar em cadastrar estará a concordar<br>
                com os <span>termos de uso</span> e de <span>privacidade</span> da<br>
                plataforma YETU.</p>
            </div>
            <br><br><br><br>
    </div>
     
           
    <?php
        include("_partes/pes.php");
    ?>

    <?php include("_partes/script.php") ?>

    
     <script>
        $(".btn-cadastrar").click(function(){
            var nome = $("#nome-user").val();
            var rua = $("#rua-user").val();
            var bairro = $("#bairro-user").val();
            var email = $("#email-user").val();
            var telefone = $("#telefone-user").val();
            var pass = $("#pass-user").val();
            if(maior(nome, 6) && maior(rua, 4) && maior(bairro, 4) && maior(email, 6) && maior(telefone, 8) && maior(pass,6)){
                $.post("_API/Conta/cadastrar.php",{json: JSON.stringify({nome: nome, rua: rua, bairro: bairro, email: email, telefone: telefone, palavra_passe: pass})}).done(function(dados){
                    console.log(dados);
                    var obj = JSON.parse(dados);
                    if(obj.ok){ 
                        tbUser.setItem("token", obj.payload).then(function(e){
                            tbUser.setItem("dados",{nome: nome, rua: rua, bairro: bairro, email: email, telefone: telefone}).then(function(e){
                                location.href = "conta.php";
                            })
                        })
                    }else{
                        notificacao(obj.payload);
                    }
                })
            }else{
                notificacao("Precisa preencher os campos corretamente!");
            }
        })

        $(document).ready(function() {
            tbUser.getItem("dados").then(function(res) {
                if (res) {
                    $("#nome-user").val(res.nome);

                    $("#rua-user").val(res.rua);

                    $("#bairro-user").val(res.bairro);

                    $("#email-user").val(res.email);

                    $("#telefone-user").val(res.telefone);

                    return
                }

            })
        });

     </script>
</body>
</html>