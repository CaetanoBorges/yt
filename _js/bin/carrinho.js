//FUNÇÃO QUE RENDERIZA ITENS DOS CARRINHO
function carrinhoItem(value) {
    var total = (value.qtd * value.preco);
    var nome = (value.nome).replace("\n", "");
    $(".cesto-itens").append(`
            <div class="cesto-item" id="item${value.id}">
                <div class="img">
                    <img src="prod/${value.img}">
                </div>
                <div class="detalhes">
                    <div class="nome">
                        ${value.nome}
                    </div>
                    <div class="preco-unitario preco">
                        <img src="_icones/coins.png"> <p>${value.preco} kz</p>
                    </div>
                    <div class="preco-total preco">
                        <img src="_icones/coins.png"> <p id="total${value.id}">Total: ${total} kz</p>
                    </div>
                    <div class="qtd-action">
                        <div class="menus" onclick='menosProdCar("${nome}","${value.id}")'> <img src="_icones/minus-circle.png"> </div>
                        <div class="qtd"> <input type="number" disabled value="${value.qtd}" id="qtd${value.id}"> </div>
                        <div class="mais" onclick='maisProdCar("${nome}","${value.id}")'> <img src="_icones/plus-circle.png"> </div>
                    </div>
                </div>

                <img src="_icones/trash.png" class="apaga" onclick='apagaItemCar("${nome}","${value.id}")'>
            </div>
    `);
}

//ITERAÇÃO INICIAL DE PRODUTOS DO CARRINHO
tbCarrinho.iterate(function(value, key, iterationNumber) {
    carrinhoItem(value);
})
numeroDeItens();

//FUNÇÃO MAIS UM ITEM DO PRODUTO NO CARRINHO
async function maisProdCar(nome, id) {

    await tbCarrinho.getItem(id).then(function(e) {
        var qt = Number(e['qtd']) + Number(1);
        var total = qt * Number(e['preco']);
        var preco = e['preco'];
        var img = e['img'];


        tbCarrinho.setItem(id, { id: id, nome: nome, preco: preco, qtd: qt, total: total, img: img }).then(function(g) {

            $("#total" + id).html("Total: " + formatNum(Number(total)));
            $("#qtd" + id).val(qt);

        });
    }).finally(function() {
        //console.error(f)
        setTimeout(numeroDeItens, 200)
    }).catch(function() { setTimeout(numeroDeItens, 200) });
}

//FUNÇÃO MENOS UM ITEM DO PRODUTO NO CARRINHO
async function menosProdCar(nome, id) {
    await tbCarrinho.getItem(id).then(function(e) {
        var qt = Number(e['qtd']) - Number(1);
        var total = qt * Number(e['preco']);
        var preco = e['preco'];
        var img = e['img'];


        if (qt == 0) {
            apagaItemCar(id)
        } else {
            tbCarrinho.setItem(id, { id: id, nome: nome, preco: preco, qtd: qt, total: total, img: img }).then(function(g) {

                $("#total" + id).html("Total: " + formatNum(Number(total)));
                $("#qtd" + id).val(qt);
            });
        }
    }).finally(function() {
        //console.error(f)
        setTimeout(numeroDeItens, 200);
    }).catch(function() { setTimeout(numeroDeItens, 200) });
}

//FUNÇÃO APAGA PRODUTO DO CARRINHO
function apagaItemCar(nome, id) {

    tbCarrinho.removeItem(id).then(function(f) {

        $("#item" + id).remove();
        notificacao("Removeu " + nome + " do carrinho", 3);
        numeroDeItens();
    });
}

//FUNÇÃO QUE ATUALIZA O PRODUTO NO CARRINHO
function atuaProdCar(nome, qtd, total) {
    var prods = elAll(".cesto-item");

    for (var i = 0; i < prods.length; i++) {
        //console.log();
        if (prods[i].innerText == nome) {
            var id = prods[i].parentNode.parentNode.getAttribute('id');
            //$("#" + id + " .qtd-carProd").value = qtd;
            $(".cesto-top .total").html(formatNum(Number(total)));
            $(".cesto-pes .total").html(formatNum(Number(total)));
            break;
        }
    }
}

$(".addCartTelaProduto").click(function() {
    var url = $('.telaProdutoSlide img')[0].src;
    var nome = $("#prodnome").html();
    var preco = $("#telaProdutoPreco").val();
    var qtd = $("#prodqtd").val();
    if (qtd > 0) {
        addAoCarrinho(url, nome, preco, qtd);
    }

})