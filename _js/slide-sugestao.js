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

        var slider = $('#yetu-slide-sugestao').lightSlider({
            gallery: false,
            item: 5,
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