<div class="header header-top">
    <div class="header-body">
        <div class="header-content">
            <ul>
                <li> <img src="_icones/phone.png" class="header-top-img"><p class="header-top-frase">+244 999 999 999</p></li>
                <li><img src="_icones/envelope.png" class="header-top-img"><p class="header-top-frase">email@email.com</p></li>
                <li><img src="_icones/location.png" class="header-top-img"><p class="header-top-frase">Localização loja</p></li>
            </ul>
            
        </div>
        <a href="conta.php"><img src="_icones/user.png" class="header-top-img"><p class="header-top-frase">Minha conta</p></a>
    </div>
    
</div>

<div class="header header-middle" style="position: sticky;top:0;z-index:9997;">
    <div class="header-body">
        <a href="#" data-bs-toggle="modal" data-bs-target="#carrinhomodal">
            <img src="_icones/cart.png">
            <p class="cesto-label">Cesto</p>
            <div class="header-qtd-cesto"></div>
        </a>
        <img src="_icones/logo.png" class="header-middle-logo">

        <div class="header-search">
            <div class="header-content">
                <select name="" id="pesq-categoria" class="header-search-select">
                    <option value="TUDO">TUDO</option>
                </select>
                <input type="text" name="" id="input-pesquisar" class="header-search-input" placeholder="Pesquisa aqui" autocomplete="off">
                <div class="header-search-buttom" onclick="pesquisar()">
                    <img src="_icones/search.png" alt="">
                </div>
            </div>
        </div>

    </div>
</div>

<div class="header header-bottom">
    <div class="header-body">
        <div class="header-content">
            <ul>
                <a href="index.php"><li>início</li></a>
                <a href="s.php?retalho"><li>retalho</li></a>
                <a href="s.php?grosso"><li>grosso</li></a>
                <a href="s.php?caixas"><li>caixas</li></a>
                <a href="s.php?sacos"><li>sacos</li></a>
                <a href="s.php"><li>tudo</li></a>
                <a href="contactos.php"><li>contactos</li></a>
                <a href="sobre.php"><li>sobre a yetu</li></a>
            </ul>
        </div>
    </div>
</div>


<!-- Modal -->
<style>
    .modal-content{border-radius: 0;}

</style>

<!-- CARRINHO -->
<div class="modal fade" id="carrinhomodal" tabindex="-1" aria-labelledby="carrinhomodalLabel" aria-hidden="true" style="z-index:10001 !important">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h2 class="cesto-label-dentro">CESTO</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="cesto-top">
                <h3 class="qtd-itens"></h3>
                <h3 class="total"></h3>
            </div>

            <div class="cesto-itens">

            </div>
      </div>
      <div class="modal-footer">
        <div class="cesto-pes">
            <h3 class="qtd-itens"></h3>
            <img src="_icones/comprar.png" onclick="irComprar()">
            <h3 class="total"></h3>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- PESQUISA -->
<div class="modal fade" id="pesquisamodal" tabindex="-1" aria-labelledby="pesquisamodalLabel" aria-hidden="true" style="z-index:10001 !important">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <br>
        <h3 id="pesquisa-qtd"></h3><br>
            <div class="pesquisa-res">

            </div>
            <br><br><br>
      </div>
    </div>
  </div>
</div>
<div class="menu-mobile">

        <debliwui-menu tip_background="#980000" tip_color="#fff">
            <div slot="sms">

            </div>
        </debliwui-menu>
    </div>
<style>
    .menu-mobile{display: none;}
    .pesquisa-res {
        display: grid;
        grid-template-columns: 47% 47%;
        row-gap: 1%;
        column-gap: 5%;
    }

    .item {
        width: 98%;
        padding: 1%;
        border: 1px solid #00000015;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 10px 0;
        background: #D9D9D920;
    }
    
    .item .img {
        width: 30%;
        border: 1px solid #00000005;
    }
    
    .item .detalhes {
        width: 90%;
        margin: 0;
        padding: 0 10px;
    }
    
    .item .detalhes .nome {
        display: block;
        font-size: 20px;
        margin: 0;
        text-transform: uppercase;
    }
    
    .item .detalhes .preco-qtd {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 32px;
    }
    
    .item .detalhes .preco-qtd .preco-total {
        display: block;
        font-size: 32px;
    }
    
    .item .detalhes .preco-qtd .preco-total img {
        width: 25.75px;
        display: inline;
    }
    
    .item .detalhes .preco-qtd .preco-total p {
        display: inline;
    }
    
    .item .detalhes .preco-qtd .qtd-input {
        width: 119px;
        padding: 1px 4px;
        background-color: #D9D9D9;
    }
    
    .item .detalhes .preco-qtd input {
        width: 100%;
        text-align: center;
        font-size: 24px;
        background: #FDF1F1;
        height: fit-content;
        border: none;
    }

    .link-pesquisa{color:black;text-decoration: none;}
    @media screen and (max-width:1000px) {
        .pesquisa-res {
            display: inline-table;
        }
        .item .detalhes .preco-qtd .preco-total p{font-size: 29px;}
        .menu-mobile{display: block;}
    }
</style>

<script>
    function pesquisar(){
        var pesquisa = $("#input-pesquisar").val();
        var categoria = $("#pesq-categoria").val();
        if(maior(pesquisa,3)){
            let result = pesquisarEmCategoria(categoria, pesquisa);
            console.log(result);
            setTimeout(function(){
                $('#pesquisamodal').modal('show');
                $(".pesquisa-res").html("");

                $("#pesquisa-qtd").html(result.length+" produto(s) encontrados");
                
                result.forEach(function(el){
                    var preco = formatNum(Number(el.preco));
                    $(".pesquisa-res").append(`
                       <a href="p.php?${el.id}" class="link-pesquisa"> <div class="item">
                                <img src="prod/${el.img}" class="img">
                                <div class="detalhes">
                                    <p class="nome">${el.nome}</p>
                                    <div class="preco-qtd">
                                        <div class="preco-total">
                                            <img src="_icones/coins.png"> <p>${preco}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                </a>`);
                })
            },2000);

            return
        }
        notificacao("A pesquisa precisa ter pelo menos 4 letras")
    }
</script>
