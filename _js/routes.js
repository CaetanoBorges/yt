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
    tbUser.getItem("dados").then(function(res) {
        if (res) {
            location.href = "comprar.php";
            return
        }
        location.href = "n.php";
    })

}

function irApp() {
    location.href = "app.php";
}