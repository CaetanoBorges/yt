<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("_partes/css.php") ?>
    <title>Loja Yetu</title>
</head>
<body>
    <?php
        include("_partes/header.php");
     ?>


    <div class="yetu-body">
         <div class="produto-item">
                <div class="img">
                    <img src="prod/standard.png">
                </div>
                <div class="detalhes">
                    <div class="categoria">
                        _________
                    </div>
                    <div class="nome"> 
                        _______________
                    </div>
                    <input type="hidden" class="qtd-existente">
                    <div class="quantidade-existente"> 
                        __________________________
                    </div>
                    <div class="descricao">
                       _______________________________________________________
                       _______________________________________________________
                       _____________________________________________________________
                    </div>
                    <div class="preco-unitario-prod preco">
                        <img src="_icones/coins.png"> <p>______</p>
                        <input type="hidden" value="" class="produto-preco-unitario">
                    </div>
                    <div class="preco-total-prod preco">
                        <img src="_icones/coins.png"> <p>_______________</p>
                    </div>
                    <div class="qtd-action">
                        <div class="menus" onclick="menosTelaProd()"> <img src="_icones/minus-circle.png"> </div>
                        <div class="qtd qtd-tela-produto"> <input type="number" value="1" disabled="disabled"> </div>
                        <div class="mais" onclick="maisTelaProd()"> <img src="_icones/plus-circle.png"> </div>
                    </div>
                    <img src="_icones/por-cesto.png" class="por-action" >
                </div>
            </div>

        <br><br><br>
        <?php
            include("_partes/slide-card.php");
        ?>
        <?php 
            include("_partes/slide-sugestao.php");
        ?>


    </div>
     
           
    <?php
        include("_partes/pes.php");
    ?>

    <?php include("_partes/script.php") ?>

    
     <script>
        var produto = (location.search).replace("?","");
        tbProduto.getItem(produto).then((item)=>{
            console.log(item);
            
            $("head title").html(item.nome);
            $(".produto-preco-unitario").val(item.preco);

            $(".preco-unitario-prod p").html(formatNum(Number(item.preco)));
            $(".preco-total-prod p").html("Total: "+formatNum(Number(item.preco)));
            $(".detalhes .nome").html(item.nome);
            $(".detalhes .quantidade-existente").html("Restam "+item.qtd +" "+item.unidades);
            $(".detalhes .qtd-existente").val(item.qtd);
            $(".detalhes .categoria").html(item.categoria);
            $(".detalhes .descricao").html(item.descricao);
            $(".produto-item .img img").attr("src","prod/" + item.img);
        });
        $(".por-action").click(function(){
                var url = ($('.produto-item .img img')[0].src).split("/")[5];
                var nome = ($(".detalhes .nome").html()).replace("\n","");
                var qtd = $(".qtd-tela-produto input").val();
                var preco = $(".produto-preco-unitario").val();
                console.log(qtd);
                if (qtd > 0) { 
                    let produto = (location.search).replace("?","");
                    addAoCarrinho(produto, url, nome, preco, qtd);
                }
                
                
            });


        function maisTelaProd() {
            var qtd = Number($(".qtd-tela-produto input").val()) + 1;
            if(qtd > $(".qtd-existente").val()){
                return;
            }

            $(".qtd-tela-produto input").val(qtd);
            var preco = $(".produto-preco-unitario").val();
            var res = (qtd * preco);
            console.log(res);
            $(".preco-total-prod p").html("Total: " + formatNum(Number(res)));
        }
        function menosTelaProd() {
            var qtd = Number($(".qtd-tela-produto input").val()) - 1;
            if(qtd == 0){
                return;
            }
            
            $(".qtd-tela-produto input").val(qtd);
            var preco = $(".produto-preco-unitario").val();
            var res = (qtd * preco);
            console.log(res);
            $(".preco-total-prod p").html("Total: " + formatNum(Number(res)));
        }
     </script>
</body>
</html>