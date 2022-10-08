<div class="header header-top">
    <div class="header-body">
        <div class="header-content">
            <ul>
                <li> <img src="_icones/phone.png" class="header-top-img"><p class="header-top-frase">+244 924 021 937</p></li>
                <li><img src="_icones/envelope.png" class="header-top-img"><p class="header-top-frase">lojayetu@gmail.com</p></li>
                <li><img src="_icones/location.png" class="header-top-img"><p class="header-top-frase">Bairro Mapunda, Lado ao Condominio Mapunda</p></li>
            </ul>
            
        </div>
        <a href="conta.php"><img src="_icones/user.png" class="header-top-img"><p class="header-top-frase minha-conta">Minha conta</p></a>
    </div>
    
</div>

<div class="header header-middle" style="position: sticky;top:0;z-index:9997;">
    <div class="header-body">
        <a href="#" data-bs-toggle="modal" data-bs-target="#carrinhomodal">
            <img src="_icones/cart.png">
            <p class="cesto-label">Cesto</p>
            <div class="header-qtd-cesto"></div>
        </a>
        <img src="_icones/logo.png" class="header-middle-logo" onclick="vaiIndex()">

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
                <a href="s.php?informaticos" class="aciona-informatico"><li>Informaticos</li></a>
                <a href="s.php?alimentar" class="aciona-alimentar"><li>Alimentar</li></a>
                <a href="s.php?bebidas" class="aciona-bebidas"><li>Bebidas</li></a>
                <a href="s.php?cosmeticos" class="aciona-cosmeticos"><li>Cosmeticos</li></a>
                <a href="s.php?frescos" class="aciona-frescos"><li>Frescos</li></a>
                <a href="s.php?vestuario" class="aciona-vestuarios"><li>Vestuário</li></a>
                <a href="s.php?mobiliario" class="aciona-mobiliario"><li>Mobiliario</li></a>
                <a href="s.php?eletrodomesticos" class="aciona-electro"><li>Electrodomésticos</li></a>
            </ul>
        </div>

    
    </div>
</div>

<div class="yetu-body aciona-informatico">
        <div class="menu-submenu-container  aciona-informatico" id="informatico">
            <div class="menu-submenu aciona-informatico">
                <ul>
                    <a href="s.php?computadores"><li>Computadores</li></a>
                    <a href="s.php?tinteiros"><li>Tinteiros</li></a>
                    <a href="s.php?Monitores"><li>Monitores</li></a>
                    <a href="s.php?SmartPhones"><li>SmartPhones</li></a>
                    <a href="s.php?SmartWatches"><li>SmartWatches</li></a>
                </ul>
            </div>
        </div>
</div>
<div class="yetu-body aciona-alimentar">
        <div class="menu-submenu-container  aciona-alimentar" id="alimentar">
            <div class="menu-submenu aciona-alimentar">
                <ul>
                    <a href="s.php?cestas"><li>Cesta Básica</li></a>
                    <a href="s.php?sereais"><li>Sereais</li></a>
                    <a href="s.php?farinha de trigo"><li>FARINHA DE TRIGO</li></a>
                    <a href="s.php?arroz"><li>Arroz</li></a>
                    <a href="s.php?leite"><li>Leite</li></a>
                    <a href="s.php?farinha de milho"><li>FARINHA DE MILHO</li></a>
                    <a href="s.php?açucar"><li>Açucar</li></a>
                    <a href="s.php?óleo de palma"><li>ÓLEO DE PALMA</li></a>
                </ul>
            </div>
        </div>
</div>
    
<div class="yetu-body aciona-bebidas">
        <div class="menu-submenu-container  aciona-bebidas" id="bebidas">
            <div class="menu-submenu aciona-bebidas">
                <ul>
                    <a href="s.php?Café"><li>Café</li></a>
                    <a href="s.php?Chá"><li>Chá</li></a>
                    <a href="s.php?Energéticas"><li>Energéticas</li></a>
                    <a href="s.php?alcolicas"><li>Alcolicas</li></a>
                    <a href="s.php?espirituosas"><li>Espirituosas</li></a>
                    <a href="s.php?Refrigerantes"><li>Refrigerantes</li></a>
                    <a href="s.php?Água"><li>Água</li></a>
                </ul>
            </div>
        </div>
</div>
    
<div class="yetu-body aciona-cosmeticos">
        <div class="menu-submenu-container  aciona-cosmeticos" id="cosmeticos">
            <div class="menu-submenu aciona-cosmeticos">
                <ul>
                    <a href="s.php?Perfumes"><li>Perfumes</li></a>
                    <a href="s.php?Desodorantes"><li>Desodorantes</li></a>
                    <a href="s.php?Cremes"><li>Cremes</li></a>
                    <a href="s.php?Shampoo"><li>Shampoo</li></a>
                    <a href="s.php?Condicionador"><li>Condicionador</li></a>
                    <a href="s.php?Maquilhagem"><li>Maquilhagem</li></a>
                </ul>
            </div>
        </div>
</div>
    
<div class="yetu-body aciona-frescos">
        <div class="menu-submenu-container  aciona-frescos" id="frescos">
            <div class="menu-submenu aciona-frescos">
                <ul>
                    <a href="s.php?frango"><li>Frango</li></a>
                    <a href="s.php?peru"><li>Peru</li></a>
                    <a href="s.php?galinha"><li>Galinha gentia</li></a>
                    <a href="s.php?coelho"><li>Coelho</li></a>
                </ul>
            </div>
        </div>
</div>
    
<div class="yetu-body aciona-vestuarios">
        <div class="menu-submenu-container  aciona-vestuarios" id="vestuarios">
            <div class="menu-submenu aciona-vestuarios">
                <ul>
                    <a href="s.php?Homem"><li>Homem</li></a>
                    <a href="s.php?Mulher"><li>Mulher</li></a>
                    <a href="s.php?Roupa Interior"><li>Roupa Interior</li></a>
                    <a href="s.php?Calçado"><li>Calçado</li></a>
                    <a href="s.php?Acessórios"><li>Acessórios</li></a>
                    <a href="s.php?Têxtil Lar"><li>Têxtil Lar</li></a>
                </ul>
            </div>
        </div>
</div>
    
<div class="yetu-body aciona-electro">
        <div class="menu-submenu-container  aciona-electro" id="electro">
            <div class="menu-submenu aciona-electro">
                <ul>
                    <a href="s.php?Ar Condicionado"><li>Ar Condicionado</li></a>
                    <a href="s.php?Lâmpadas"><li>Lâmpadas</li></a>
                    <a href="s.php?Secadores"><li>Secadores</li></a>
                </ul>
            </div>
        </div>
</div>
    
<div class="yetu-body aciona-mobiliario">
        <div class="menu-submenu-container  aciona-mobiliario" id="mobiliario">
            <div class="menu-submenu aciona-mobiliario">
                <ul>
                    <a href="s.php?Mesa"><li>Mesa</li></a>
                    <a href="s.php?Cadeira"><li>Cadeira</li></a>
                    <a href="s.php?Sofá"><li>Sofá</li></a>
                    <a href="s.php?Colchão"><li>Colchão</li></a>
                    <a href="s.php?Cama"><li>Cama</li></a>
                    <a href="s.php?Guarda Fato"><li>Guarda Fato</li></a>
                    <a href="s.php?Escritório"><li>Escritório</li></a>
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
<div class="dropdown">
    <img src="_arq/menu-in.png" class="dropdown-toggle" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" style="width:30px;cursor: pointer;">
  
    <style>
        .dropdown-menu a{text-decoration: none;text-transform: uppercase;}
        .dropdown-item{font-size: 9px;}
    </style>
  <ul class="dropdown-menu form-control" aria-labelledby="dropdownMenuLink" style="width: fit-content;font-size:9px;">
        <a href="s.php?informaticos" ><li class="dropdown-item form-control">Informaticos</li></a>
        <a href="s.php?alimentar" ><li class="dropdown-item form-control">Alimentar</li></a>
        <a href="s.php?cestas" ><li class="dropdown-item form-control">Cestas Básicas</li></a>
        <a href="s.php?bebidas"><li class="dropdown-item form-control">Bebidas</li></a>
        <a href="s.php?cosmeticos" ><li class="dropdown-item form-control">Cosmeticos</li></a>
        <a href="s.php?frescos"><li class="dropdown-item form-control">Frescos</li></a>
        <a href="s.php?vestuario" ><li class="dropdown-item form-control">Vestuário</li></a>
        <a href="s.php?mobiliario" ><li class="dropdown-item form-control">Mobiliario</li></a>
        <a href="s.php?eletrodomesticos"><li class="dropdown-item form-control">Electrodomésticos</li></a>
        <li class="dropdown-item form-control">
            
            <style>
                .mobile{max-width:fit-content;padding:2%;background: none;border-top: 1px solid red;}
                .mobile li {margin: 5px 0;color:black !important;font-size: 9px;}
            </style>
            <ul class="menu-baixo mobile">
            <a href="index.php">
                <li>INICIO</li>
            </a>
            <a href="conta.php">
                <li>CONTA</li>
            </a>
            <a href="app.php">
                <li>INSTALAR APLICATIVO</li>
            </a>
            <a href="app.php">
                <li>ATIVAR NOTIFICAÇÕES</li>
            </a>
            <a href="sobre.php">
                <li>SOBRE</li>
            </a>
        </ul>
        </li>
  </ul>
</div>
        
</div>
<style>
    .menu-mobile{display: none;
            position:fixed;
            top: 24px;
            left: 11px;
            z-index:10000;
            }
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
            let resultCesta = pesquisarEmCestas(categoria, pesquisa);
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
                });

                resultCesta.forEach(function(el){
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
                });
            },2000);

            return
        }
        notificacao("A pesquisa precisa ter pelo menos 4 letras")
    }



    //-------------------------
    function vaiIndex(){
        location.href="index.php"
    }
    
</script>
