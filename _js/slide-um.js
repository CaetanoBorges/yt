  function slideUm(value, parent) {
      var ite = '';
      if (window.screen.availWidth > 500) {
          ite = value.slide;
      } else {
          ite = value.img;
      }
      $('#yetu-slide-um').append(`
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
                        
                        <img src="prod/${ite}" class="img-prod">
                    </div>
                </li>`)

  }

  setTimeout(function() {
      $('#yetu-slide-um').html("");
      tbSlide.iterate(function(value, key, iterator) {
          slideUm(value, "#yetu-slide-um")
      }).then();
  }, 1500)


  setTimeout(function() {
      var ite = 0;
      if (window.screen.availWidth > 500) {
          ite = 1;
      } else {
          ite = 3;
      }
      $(document).ready(function() {
          var slider = $('#yetu-slide-um').lightSlider({
              gallery: false,
              item: 1,
              speed: 800,
              loop: true,
              keyPress: true,
              auto: true,
              controls: true,
              pager: false,
              pauseOnHover: true,
              pause: 3000,
              adaptiveHeight: true,
              onSliderLoad: function() {
                  $('#yetu-slide-um').removeClass('cS-hidden');
              }
          }).css("z-index", "3");
          $('#prev-slide-um').click(function() {
              slider.goToPrevSlide();
          });
          $('#next-slide-um').click(function() {
              slider.goToNextSlide();
          });
      });
  }, 3000);