$(document).ready(function() {
    tbUser.getItem("dados").then(function(res) {
        if (res) {
            $(".nome-user").html(res.nome);
            $("#nome-user").val(res.nome);

            $(".rua-user").html(res.rua);
            $("#rua-user").val(res.rua);

            $(".bairro-user").html(res.bairro);
            $("#bairro-user").val(res.bairro);

            $(".email-user").html(res.email);
            $("#email-user").val(res.email);

            $(".telefone-user").html(res.telefone);
            $("#telefone-user").val(res.telefone);

            return
        }
        irMinhaConta();

    })
});

function editarDados() {
    var nome = $("#nome-user").val();
    var rua = $("#rua-user").val();
    var bairro = $("#bairro-user").val();
    var email = $("#email-user").val();
    var telefone = $("#telefone-user").val();

    if (maior(nome, 6) && maior(rua, 4) && maior(bairro, 4) && maior(email, 6) && maior(telefone, 8)) {
        console.log("yha");
        return
    }
    notificacao("Precisa preencher os campos corretamente");
}