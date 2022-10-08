<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("_partes/css.php") ?>
    <title>Pesquisar</title>
</head>
<script>
       

</script>
<body>
    <?php
        include("_partes/header.php");
     ?>

    <div class="yetu-body">
        <br><br>
            <h3 class="res"></h3>
        <br><br>
         
            <?php
                include("_partes/card-itens.php");
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
            var res = pesquisarProduto(produto);
            var resCestas = pesquisarCesta(produto);
            setTimeout(function(){
                for (const key in res) {
                    let value = res[key];
                    $(".card-itens-produto").append(`<div class="prod-item">
                        <div class="img">
                            <img src="prod/${value.img}">
                            <div class="assert-nome-prod">
                                <div class="nome-prod">
                                    ${value.nome}
                                </div>
                            </div>
                        </div>
                        <div class="view-price-cart">
                            <div class="view"><a href="p.php?${value.id}"><img src="_icones/eye-.png"></a></div>
                            <div class="price">${value.preco} kz</div>
                            <div class="cart" onclick='addAoCarrinho("${value.id}","${value.img}", "${value.nome}", "${value.preco}")'><img src="_icones/checkout-cart.png"></div>
                        </div>
                    </div>`)
                }
                for (const ke in resCestas) {
                    let val = resCestas[ke];
                    $(".card-itens-produto").append(`<div class="prod-item" style="position:relative;">
                        <h5 style="background:red;color:black;padding:5px;font-size:11px;width:fit-content;margin:0 0 1px 0;position:absolute;top:0;left:0;z-index:999;">CESTA BÁSICA</h5>
                        <div class="img">
                            <img src="prod/${val.img}">
                            <div class="assert-nome-prod">
                                <div class="nome-prod">
                                    ${val.nome}
                                </div>
                            </div>
                        </div>
                        <div class="view-price-cart">
                            <div class="view"><a href="p.php?${val.id}"><img src="_icones/eye-.png"></a></div>
                            <div class="price">${val.preco} kz</div>
                            <div class="cart" onclick='addAoCarrinho("${val.id}","${val.img}", "${val.nome}", "${val.preco}")'><img src="_icones/checkout-cart.png"></div>
                        </div>
                    </div>`)
                }

                let resultadosN=(res.length)+(resCestas.length);
                $(".res").html((resultadosN)+" produto(s)");
                console.log(resultadosN);
            },2000);
            setTimeout(function(){
                var itensTodos = $(".prod-item");
                var result = ((itensTodos.length)/2 ) * 282;
                console.log(result);
                $(".bloco").css({height: result+"px"})
            },2000)
        
    </script>
</body>
</html>