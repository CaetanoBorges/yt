function loader(imgPath) {

    if ($(".debliw-loader").length > 0) {
        $(".debliw-loader").remove();
    } else {
        var loader = $(`
            <div style = "position:fixed;top:0;left:0;width:100%;height:100vh;z-index:10000;background:#00000095" class="debliw-loader" > 
            
                <img src="${imgPath}" style="display:block;width:10%;margin: 45vh auto 0 auto;">
            </div>
        `);

        $("body").append(loader);

    }


}