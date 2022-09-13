function irMinhaConta() {
    tbUser.getItem("token").then(function(res) {
        if (res) {
            location.href = "conta.php";
            return
        }
        location.href = "login.php";
    })

}

function irMinhasCompras() {
    location.href = "compras.php";
}

function irComprar() {
    tbCarrinho.length().then(function(numberOfKeys) {

        if (numberOfKeys <= 0) {
            notificacao("Não tem produto no cesto de compras");
            return;
        } else {
            tbUser.getItem("dados").then(function(res) {
                if (res) {

                    $.post("_API/pedido/numero.php", { numero: res.telefone, email: res.email }).done(function(dados) {

                    })
                    location.href = "comprar.php";
                    return
                }
                location.href = "n.php";
            })
        }
    });



}

function irApp() {
    location.href = "app.php";
}