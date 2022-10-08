function getSugestoes() {
    $.get("_API/dados/sugestoes.php").done(function(dado) {

        let dad = JSON.parse(dado);
        let dados = JSON.parse(dad.payload);
        dados.forEach(el => {
            tbSugestoes.setItem(el['id'], el);
        });
    }).fail(function(e) {

    }).always(function(a) {
        if (a.status) {
            $(".preload-sugestoes").attr("src", "_icones/nao-preparado.png");
        } else {
            $(".preload-sugestoes").attr("src", "_icones/preparado.png");
        }
    });
}

function pegaSugestoes() {

    fetch('_API/dados/sugestoes.php')
        .then(function(response) {

            return response.json();
        })
        .then(function(jso) {
            let json = JSON.parse(jso.payload);
            json.forEach(el => {
                tbSugestoes.setItem(el['id'], el);
            });
        });

}
//--------------

function pegaUser(token) {

    fetch('_API/Conta/Dados/dados.php?' + new URLSearchParams({
            token: token
        }))
        .then(function(response) {
            return response.json();
        })
        .then(function(dados) {
            let d = JSON.parse(dados.payload);
            tbUser.setItem("dados", { nome: d.nome, rua: d.rua, bairro: d.bairro, email: d.email, telefone: d.telefone });
        });
}

function pegaCompras(token) {
    fetch('_API/dados/compras.php?' + new URLSearchParams({
            token: token
        }))
        .then(function(response) {
            return response.json();
        })
        .then(function(jso) {
            let json = JSON.parse(jso.payload);
            tbCompras.clear();
            json.forEach(el => {
                tbCompras.setItem(el['id'], el);
            });
        });
}
//-----------
async function getCategorias() {
    $.get("_API/dados/categorias.php").done(function(dado) {
        let dad = JSON.parse(dado);
        let dados = JSON.parse(dad.payload);
        tbCategorias.clear();
        dados.forEach((el) => {
            tbCategorias.setItem(el['id'], el);
        });
    }).fail(function(e) {

    }).always(function(a) {
        if (a.status) {
            $(".preload-categorias").attr("src", "_icones/nao-preparado.png");
        } else {
            $(".preload-categorias").attr("src", "_icones/preparado.png");
        }
    });
}

function pegaCategorias() {
    fetch('_API/dados/categorias.php')
        .then(function(response) {
            return response.json();
        })
        .then(function(jso) {
            let json = JSON.parse(jso.payload);
            tbCategorias.clear();
            json.forEach(el => {
                tbCategorias.setItem(el['id'], el);
            });
        });
}
//------------------------
async function getSlide() {
    $.get("_API/dados/slides.php").done(function(dado) {
        let dad = JSON.parse(dado);
        let dados = JSON.parse(dad.payload);
        tbSlide.clear();
        dados.forEach((el, key) => {
            tbSlide.setItem(key, el);
        });
    }).fail(function(e) {

    }).always(function(a) {
        if (a.status) {
            $(".preload-slides").attr("src", "_icones/nao-preparado.png");
        } else {
            $(".preload-slides").attr("src", "_icones/preparado.png");
        }
    });
}

function pegaSlide() {
    fetch('_API/dados/slides.php')
        .then(function(response) {
            return response.json();
        })
        .then(function(jso) {
            let json = JSON.parse(jso.payload);
            tbSlide.clear();
            json.forEach(el => {
                tbSlide.setItem(el['id'], el);
            });
        });
}
//----------
async function getProdutos() {
    $.get("_API/dados/produtos.php").done(function(dado) {
        let dad = JSON.parse(dado);
        let dados = JSON.parse(dad.payload);
        tbProduto.clear();
        dados.forEach(el => {
            tbProduto.setItem(el['id'], el);

        });
    }).fail(function(e) {

    }).always(function(a) {
        if (a.status) {
            $(".preload-produtos").attr("src", "_icones/nao-preparado.png");
        } else {
            $(".preload-produtos").attr("src", "_icones/preparado.png");
        }
    });
}

function pegaProdutos() {
    fetch('_API/dados/produtos.php')
        .then(function(response) {
            return response.json();
        })
        .then(function(jso) {
            let json = JSON.parse(jso.payload);
            tbProduto.clear();
            json.forEach(el => {
                tbProduto.setItem(el['id'], el);
            });
        });
}

//----------
async function getCestaBasica() {
    $.get("_API/dados/cestas.php").done(function(dado) {
        let dad = JSON.parse(dado);
        let dados = JSON.parse(dad.payload);
        tbCesta.clear();
        dados.forEach(el => {
            tbCesta.setItem(el['id'], el);

        });
    }).fail(function(e) {

    }).always(function(a) {
        if (a.status) {} else {}
    });
}

function pegaCestaBasica() {
    fetch('_API/dados/cestas.php')
        .then(function(response) {
            return response.json();
        })
        .then(function(jso) {
            let json = JSON.parse(jso.payload);
            tbCesta.clear();
            json.forEach(el => {
                tbCesta.setItem(el['id'], el);
            });
        });
}