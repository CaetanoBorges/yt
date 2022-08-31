//FUNÇÃO QUE ADICIONA PRODUTO AO CARRINHO
async function addAoCarrinho(id, img, nome, preco, qtd = 1) {
    console.log(id, img, nome, preco, qtd);
    tbCarrinho.getItem(id).then(function(e) {
        if (e) {
            var qt = Number(e['qtd']) + Number(qtd);
            var total = Number(qt) * Number(preco);
            tbCarrinho.setItem(id, { id: id, nome: nome, preco: preco, qtd: qt, total: total, img: img }).then(function(g) {

                atuaProdCar(nome, qt, total);
                notificacao("Adicionou mais " + qtd + " unidade(s)");

                $("#total" + id).html("Total: " + formatNum(Number(total)));
                $("#qtd" + id).val(qt);

            });

        } else {
            var total = Number(preco * qtd);
            var obj = { id: id, nome: nome, preco: preco, qtd: qtd, total: total, img: img };
            tbCarrinho.setItem(id, obj).then(function(i) {
                carrinhoItem(obj, id);
                notificacao("Adicionou " + qtd + " unidade(s)")
                $("#total" + id).html("Total: " + formatNum(Number(total)));
                $("#qtd" + id).val(qtd);
            });

        }
    }).finally(function() {
        //console.error(f)
        setInterval(numeroDeItens, 200)
            //el("#prodqtd").value = 1;
    }).catch(function() {
        setInterval(numeroDeItens, 200)
    });
}

//FUNCÃO QUE CARREGA O NUMERO DE ITENS NO CARRINHO E O TOTAL
function numeroDeItens() {
    var array = new Array();
    tbCarrinho.length().then(function(i) {
        //el(".cart p").innerText = i;
        el(".header-qtd-cesto").innerText = i;
        el(".cesto-top .qtd-itens").innerText = i + " ITEM(S)";
        el(".cesto-pes .qtd-itens").innerText = i + " ITEM(S)";
        if ($(".cliente-preco").get(0)) {
            $(".cliente-preco .itens").html(i + " ITEM(S)")
        }
    });
    tbCarrinho.iterate(function(value, key, iterationNumber) {
        array.push(value['total']);
    }).finally(function() {
        var total = 0;
        $.each(array, function() {
            total += this;
        });
        // el("#carrinhomodal .total").innerText = "TOTAL: " + formatNum(total);
        el(".cesto-top .total").innerText = formatNum(Number(total));
        el(".cesto-pes .total").innerText = formatNum(Number(total));
        if ($(".cliente-preco").get(0)) {
            $(".cliente-preco .total").html("Total: " + formatNum(Number(total)))
        }
    });
}