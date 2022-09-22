<script src="_arq/jquery.js"></script>
<script src="_arq/localforage.js"></script>
<script src="_arq/db.config.js"></script>

<script src="_arq/bootstrap.min.js"></script>
<script src="_arq/lightslider.js"></script>
<script src="_js/bin/getData.js"></script>
<script src="_js/loader.js"></script>
<script src="_js/bin/func.pesquisar.js"></script>
<script src="_js/bin/categorias.js"></script>
<script src="_js/slide-um.js"></script>
<script src="_js/slide-sugestao.js"></script>
<script src="_js/slide-grosso.js"></script>
<script src="_js/slide-card.js"></script>
<script src="_js/one.js"></script>
<script src="_js/bin/carrinho-adiciona.js"></script>
<script src="_js/bin/carrinho.js"></script>
<script src="_js/routes.js"></script>
<script src="_js/swFunctions.js"></script>
<script src="_arq/debliwui-menu.js"></script>
<script src="sw.js"></script>

<script>
    $(document).ready(function(){
        $(".aciona-informatico").hover(function(){
            $("#informatico").show();
        },function(){
            $("#informatico").hide();
        });
        $(".aciona-alimentar").hover(function(){
            $("#alimentar").show();
        },function(){
            $("#alimentar").hide();
        });
        $(".aciona-bebidas").hover(function(){
            $("#bebidas").show();
        },function(){
            $("#bebidas").hide();
        });
        $(".aciona-cosmeticos").hover(function(){
            $("#cosmeticos").show();
        },function(){
            $("#cosmeticos").hide();
        });
        $(".aciona-frescos").hover(function(){
            $("#frescos").show();
        },function(){
            $("#frescos").hide();
        });
        $(".aciona-vestuarios").hover(function(){
            $("#vestuarios").show();
        },function(){
            $("#vestuarios").hide();
        });
        $(".aciona-electro").hover(function(){
            $("#electro").show();
        },function(){
            $("#electro").hide();
        });
        $(".aciona-mobiliario").hover(function(){
            $("#mobiliario").show();
        },function(){
            $("#mobiliario").hide();
        });
    })
</script>