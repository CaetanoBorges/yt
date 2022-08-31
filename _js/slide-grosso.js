  function slideCategorias(value, parent) {
      $('#yetu-slide-grosso').append(`
                <li>
                    <div class="slide-element">
                        <div class="preco">${value.preco} kz</div>
                        <div class="action-assert">
                            <div class="action">
                                <a href="p.php?${value.id}"><p>
                                    ${value.nome}
                                    <img src="_icones/arrow-right.png">
                                </p></a>
                            </div>
                        </div>
                        
                        <img src="prod/${value.img}" class="img-prod">
                    </div>
                </li>`)

  }
  var resPesquisa = pesquisarProduto("grosso");


  setTimeout(function() {
      for (var key in resPesquisa) {
          slideCategorias(resPesquisa[key], "#yetu-slide-grosso");
      }
  }, 1500)


  setTimeout(function() {
      $(document).ready(function() {
          var slider = $('#yetu-slide-grosso').lightSlider({
              gallery: false,
              item: 2,
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
                  $('#yetu-slide-grosso').removeClass('cS-hidden');
              }
          }).css("z-index", "3");
          $('#prev-slide-grosso').click(function() {
              slider.goToPrevSlide();
          });
          $('#next-slide-grosso').click(function() {
              slider.goToNextSlide();
          });

      });
  }, 3000)