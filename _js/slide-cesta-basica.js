function slideCesta(value, parent) {
    console.log(value);
    $('#yetu-slide-cesta-basica').append(`
    <li>
                    <div class="slide-item-wrapper" style="position:relative;">
                        <h5 style="background:red;color:black;padding:5px;font-size:13px;width:fit-content;margin:0 0 1px 0;">CESTA BÁSICA</h5>
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
                            <div class="detalhes" style="padding:10px;text-align:justify;font-weight:550;">
                                ${value.descricao}
                            </div>
                        </div>
                    </div>
                </li>`)

}
setTimeout(function() {
    $('#yetu-slide-cesta-basica').html("");
    tbCesta.iterate(function(value, key, iterator) {
        slideCesta(value, "#yetu-slide-cesta-basica")
    }).then();
}, 1500)

setTimeout(function() {
    $(document).ready(function() {

        var ite = 3;
        if (window.screen.availWidth < 1000) {
            ite = 2;
        } else {}
        var slider = $('#yetu-slide-cesta-basica').lightSlider({
            gallery: false,
            item: ite,
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
                $('#yetu-slide-cesta-basica').removeClass('cS-hidden');
            }
        }).css("z-index", "3");
        $('#prev-slide-card').click(function() {
            slider.goToPrevSlide();
        });
        $('#next-slide-card').click(function() {
            slider.goToNextSlide();
        });
    });
}, 2700)