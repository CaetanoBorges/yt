setTimeout(function() {
    tbCategorias.iterate(function(value, key, iterator) {
        $("#pesq-categoria").append(`
            <option value="${value.nome}">${value.nome}</option>
        `)
    }).then();
}, 1000)