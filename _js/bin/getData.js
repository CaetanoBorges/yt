function getSugestoes() {
    $.get("sugestoes.json").done(function(dados) {
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

    fetch('sugestoes.json')
        .then(function(response) {

            return response.json();
        })
        .then(function(json) {
            json.forEach(el => {
                tbSugestoes.setItem(el['id'], el);
            });
        });

}
//--------------
async function getUser() {
    $.get("user.json").done(function(dados) {
        tbUser.setItem("dados", dados);
    }).fail(function(e) {
        return false;
    });
    return true;;
}

function pegaUser() {
    fetch('user.json')
        .then(function(response) {
            return response.json();
        })
        .then(function(dados) {
            tbUser.setItem("dados", dados);
        });
}
//------------------
async function getCompras() {
    $.get("compras.json").done(function(dados) {

        dados.forEach((el, key) => {
            tbCompras.setItem(key, el);
        });
    }).fail(function(e) {
        return false;
    });
    return true;

}

function pegaCompras() {
    fetch('compras.json')
        .then(function(response) {
            return response.json();
        })
        .then(function(json) {
            json.forEach(el => {
                tbCompras.setItem(el['id'], el);
            });
        });
}
//-----------
async function getCategorias() {
    $.get("categorias.json").done(function(dados) {

        dados.forEach((el, key) => {
            tbCategorias.setItem(key, el);
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
    fetch('categorias.json')
        .then(function(response) {
            return response.json();
        })
        .then(function(json) {
            json.forEach(el => {
                tbCategorias.setItem(el['id'], el);
            });
        });
}
//------------------------
async function getSlide() {
    $.get("slide.json").done(function(dados) {

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
    fetch('slide.json')
        .then(function(response) {
            return response.json();
        })
        .then(function(json) {
            json.forEach(el => {
                tbSlide.setItem(el['id'], el);
            });
        });
}
//----------
async function getProdutos() {
    $.get("produtos.json").done(function(dados) {
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
    fetch('produtos.json')
        .then(function(response) {
            return response.json();
        })
        .then(function(json) {
            json.forEach(el => {
                tbProduto.setItem(el['id'], el);
            });
        });
}