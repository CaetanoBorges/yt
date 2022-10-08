function pesquisarCesta(val) {
    var array = [];
    tbCesta.iterate(function(v, k, i) {
        let valor = val.toLowerCase();

        let nome = (v.nome).toLowerCase();
        let categoria = (v.categoria).toLowerCase();
        let subcategoria = (v.subcategoria).toLowerCase();
        let descricao = (v.descricao).toLowerCase();
        let stock = (v.stock).toLowerCase();

        if (nome.match(`${valor}`)) {
            array.push(v);
        } else
        if (categoria.match(`${valor}`)) {
            array.push(v);
        } else if (subcategoria.match(`${valor}`)) {
            array.push(v);
        } else if (descricao.match(`${valor}`)) {
            array.push(v);
        } else if (stock.match(`${valor}`)) {
            array.push(v);
        }
    }).then(function() {

    });
    return array;
}

function pesquisarProduto(val) {
    var array = [];
    tbProduto.iterate(function(v, k, i) {
        let valor = val.toLowerCase();

        let nome = (v.nome).toLowerCase();
        let categoria = (v.categoria).toLowerCase();
        let subcategoria = (v.subcategoria).toLowerCase();
        let descricao = (v.descricao).toLowerCase();
        let stock = (v.stock).toLowerCase();

        if (nome.match(`${valor}`)) {
            array.push(v);
        } else
        if (categoria.match(`${valor}`)) {
            array.push(v);
        } else if (subcategoria.match(`${valor}`)) {
            array.push(v);
        } else if (descricao.match(`${valor}`)) {
            array.push(v);
        } else if (stock.match(`${valor}`)) {
            array.push(v);
        }
    }).then(function() {

    });
    return array;
}

function pesquisarEmCategoria(cat, val) {



    var categoria = cat.toLowerCase();
    var valor = val.toLowerCase();

    if (categoria == "tudo") {
        location.href = "s.php?" + valor;
        return;
    }

    var array = [];
    var res = [];


    tbProduto.iterate(function(v, k, i) {
        let categoriaNova = (v.categoria).toLowerCase();
        let subCategoria = (v.subcategoria).toLowerCase();
        if (categoriaNova.match(`${categoria}`)) {
            array.push(v);
        }

        if (subCategoria.match(`${categoria}`)) {
            array.push(v);
        }
    }).then(function() {
        array.forEach(function(value) {

            let nomeNovo = (value.nome).toLowerCase();
            let descricao = (value.descricao).toLowerCase();
            let stock = (value.stock).toLowerCase();

            if (nomeNovo.match(`${valor}`)) {
                res.push(value);
            }
            if (descricao.match(`${valor}`)) {
                res.push(value);
            }
            if (stock.match(`${valor}`)) {
                res.push(value);
            }
        })
    });

    return res;
}

function pesquisarEmCestas(cat, val) {



    var categoria = cat.toLowerCase();
    var valor = val.toLowerCase();



    var array = [];
    var res = [];


    tbCesta.iterate(function(v, k, i) {
        let categoriaNova = (v.categoria).toLowerCase();
        let subCategoria = (v.subcategoria).toLowerCase();
        if (categoriaNova.match(`${categoria}`)) {
            array.push(v);
        }

        if (subCategoria.match(`${categoria}`)) {
            array.push(v);
        }
    }).then(function() {
        array.forEach(function(value) {

            let nomeNovo = (value.nome).toLowerCase();
            let descricao = (value.descricao).toLowerCase();
            let stock = (value.stock).toLowerCase();

            if (nomeNovo.match(`${valor}`)) {
                res.push(value);
            }
            if (descricao.match(`${valor}`)) {
                res.push(value);
            }
            if (stock.match(`${valor}`)) {
                res.push(value);
            }
        })
    });

    return res;
}