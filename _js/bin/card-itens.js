var arrayPag = [];
tbProduto.iterate(function(value, key, iterator) {
    if (iterator > 6) {
        return
    }
    arrayPag.push(value);
    $(".card-itens-produto").append(`<div class="prod-item">
            <div class="img">
                <img src="prod/${value.img}">
                <div class="assert-nome-prod">
                    <div class="nome-prod">
                        ${value.nome}
                    </div>
                </div>
            </div>
            <div class="view-price-cart">
                <div class="view"><a href="p.php?${value.id}"><img src="_icones/eye-.png"></a></div>
                <div class="price">${value.preco} kz</div>
                <div class="cart" onclick='addAoCarrinho("${value.id}","${value.img}", "${value.nome}", "${value.preco}")'><img src="_icones/checkout-cart.png"></div>
            </div>
         </div>`)
}).then(function() {

});