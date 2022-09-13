tbSugestoes.iterate(function(value, key, iterationNumber) {
    $("#yetu-slide-sugestao").append(`
        <li> 
            <a href="s.php?${value.nome}">
            <div class="slide-element-sugestao">
                <img src="prod/${value.img}">
            </div>
            ${value.nome}
            </a>
        </li>
    `);
}).then(function(e) {
    $(document).ready(function() {
        var ite = 5;
        if (window.screen.availWidth < 1000) {
            ite = 3;
        } else {}
        var slider = $('#yetu-slide-sugestao').lightSlider({
            gallery: false,
            item: ite,
            speed: 600,
            loop: true,
            keyPress: true,
            auto: true,
            controls: true,
            pager: false,
            pauseOnHover: true,
            pause: 3000,
            adaptiveHeight: true,
            onSliderLoad: function() {
                $('#yetu-slide-sugestao').removeClass('cS-hidden');
            }
        }).css("z-index", "3");
    });

});