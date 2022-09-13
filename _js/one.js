//FUNCAO DE SELEÇAO DE ELEMENTO
function el(el) {
    // el = classe OU id
    return document.querySelector(el);

}

//FUNCAO DE SELEÇAO DE ELEMENTOS
function elAll(el) {
    // el = classe OU id
    return document.querySelectorAll(el);

}

//FUNCÇÃO QUE RETORNA DATA E HORA LOCAL
function dataehora() {

    var hoje = new Date();
    var data = hoje.getDate() + "-" + (hoje.getMonth() + 1) + "-" + hoje.getFullYear();
    var hora = hoje.getHours() + ":" + hoje.getMinutes() + ":" + hoje.getSeconds();
    var dataehora = data + " " + hora;
    return dataehora;
}

//FUNÇÃO QUE NOTIFICA AÇÕES NOS ITENS DO CARRINHO
function notificacao(sms, tipo = 3) {

    //tipo = 1 -> Adicionou um
    //tipo = 2 -> Removeu um
    //tipo = 3 -> Excluiu um

    var id = Date.now();

    var div = document.createElement("div");
    var p = document.createElement("p");
    p.style.textAlign = "center";
    p.style.fontWeight = "bold";
    p.style.fontSize = "30px";
    p.innerText = sms;
    div.append(p);
    div.setAttribute("id", id);
    var divStyle = div.style;
    divStyle.zIndex = 99999;
    divStyle.position = "fixed";

    divStyle.width = "50%";
    divStyle.padding = "10px";
    div.style.background = "white";
    divStyle.border = "1px solid";

    if (tipo == 1) {
        divStyle.borderColor = "green";
        p.style.color = "green";
    } else if (tipo == 2) {
        divStyle.borderColor = "blue";
        p.style.color = "blue";
    } else if (tipo == 3) {
        divStyle.borderColor = "red";
        p.style.color = "red";
    }


    document.querySelector("body").prepend(div);
    $("#" + id).animate({ "top": "40vh", "left": "25%" }, function() {
        setTimeout(function() {
            $("#" + id).animate({ "top": "-40vh", "left": "120%" })
        }, 2000)
    })

}

//FUNCÃO QUE TRNSFORMA IMAGEM EM BASE64
const toDataURL = url => fetch(url)
    .then(response => response.blob())
    .then(blob => new Promise((resolve, reject) => {
        const reader = new FileReader()
        reader.onloadend = () => resolve(reader.result)
        reader.onerror = reject
        reader.readAsDataURL(blob)
    }))

//FUNCÃO QUE FORMATA NUMEROS (EM NOTAÇÃO COMERCIAL)
function formatNum(num) {
    return (
            num
            .toFixed() // always two decimal digits
            .replace('.', ',') // replace decimal point character with ,
            .replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + ' kz'
        ) // use . as a separator
}

function timeStampToDate(time) {
    let unix_timestamp = time;
    var date = new Date(unix_timestamp * 1000);

    return date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear() + " " + date.getHours() + "h:" + date.getMinutes() + "s";
}


//FUNÇÃO QUE SINCRONIZA PRODUTOS
function syncProd(prod) {
    tbCarrinho.getItem(prod).then(function(e) {

        if (e != null) {
            syncProdCar(prod, e["qtd"], e["total"]);
        } else {
            var oprod = el("#prodnome").innerText;

            if (oprod == prod) {
                el("#prodqtdcarrinho").value = Number(0);
                el("#telaProdutoTotal").value = Number(0);
            }


        }
    })
}

function maior(res, l) {
    if (res) {
        var len = String(res).length;
        if (len > l) {
            return true
        }
        return false;
    }

}