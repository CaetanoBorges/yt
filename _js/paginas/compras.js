 $(document).ready(function() {

     tbCompras.length().then(function(res) {
         $("#items").html(res + " Compra(s) efectuadas")
     })

     tbCompras.iterate(function(res, key, iterator) {
         var color = "#ff0000";
         var confirmado = "Não";
         var detalhes = "btn-detalhes-red.png";
         if (res.confirmado) {
             color = "#00ff00";
             confirmado = "Sim";
             detalhes = "btn-detalhes.png";
         }


         var total = formatNum(Number(res.total));

         var itens = '';
         var item = res.itens;
         var itensDaFatura = (item).length;
         var data = timeStampToDate(res.timestamp);

         item.forEach(function(el) {
             var preco = formatNum(Number(el.preco));
             var total = formatNum(Number(el.total));
             itens += `
                        <div class="item">
                            <img src="prod/${el.img}" class="img">
                            <div class="detalhes">
                                <p class="nome">${el.nome}</p>
                                <div class="preco-qtd">
                                    <div class="preco-total">
                                        <img src="_icones/coins.png"> <p>${preco}</p>
                                    </div>
                                    <div class="qtd-input"> <input type="text" value="${el.qtd}" disabled="disabled"> </div>
                                    <div class="preco-total">
                                        <img src="_icones/coins.png"> <p>${total}</p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>  
                    `;
         });
         $(".compras-container").append(`
                    <div class="clear"></div>
                    <div class="cabeca">
                        <p class="total">${total}</p>
                        <p class="quando">${data}</p>
                        <img src="_icones/${detalhes}" class="btn-acao" data-bs-toggle="collapse" data-bs-target="#collapseExample${iterator}" aria-expanded="false" aria-controls="collapseExample${iterator}">
                    </div>
                    <div class="corpo collapse" id="collapseExample${iterator}">
                        <p class="itens">${itensDaFatura} Item(s)</p>
                        <p class="confirmado" style="color: ${color}">Completo: <b>${confirmado}</b></p>

                        ${itens}
                        
                    </div>
                `)
     })
 });