function slideCard(value, parent) {
    console.log(value);
    $('#yetu-slide-card').append(`
    <li>
                    <div style="padding: 0 10%;">
                        <div class="prod-item">
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
                        </div>
                    </div>
                </li>`)

}
var produto = (location.search).replace("?", "");
tbProduto.getItem(produto).then((item) => {
    var resPesquisa = pesquisarProduto(item.categoria);


    setTimeout(function() {
        for (var key in resPesquisa) {
            slideCard(resPesquisa[key], "#yetu-slide-card");
        }
    }, 1500)


})

setTimeout(function() {
    $(document).ready(function() {
        var slider = $('#yetu-slide-card').lightSlider({
            gallery: false,
            item: 3,
            speed: 800,
            loop: true,
            keyPress: true,
            auto: true,
            controls: true,
            pager: false,
            pauseOnHover: true,
            pause: 2000,
            adaptiveHeight: true,
            onSliderLoad: function() {
                $('#yetu-slide-card').removeClass('cS-hidden');
            }
        }).css("z-index", "3");
        $('#prev-slide-card').click(function() {
            slider.goToPrevSlide();
        });
        $('#next-slide-card').click(function() {
            slider.goToNextSlide();
        });
    });
}, 3000)