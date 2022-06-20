jQuery(document).ready(function() {
    console.log('js-2')
    setTimeout(function(){
        jQuery('.box-variant').prepend(jQuery('.woocommerce-variation.single_variation'));
        if(!jQuery('#variants').val()){
            jQuery('.price-no-variant').show(400);
        }
        else{
            jQuery('.price-no-variant').hide(400);
        }
    }, 200)
    jQuery('#variants').on('change', function() {
        if(!jQuery(this).val()){
            jQuery('.price-no-variant').show(400);
        }
        else{
            jQuery('.price-no-variant').hide(400);
        }
    });
    jQuery('.img-min-plus').click(function(){
        console.log('tes')
        var type = jQuery(this).attr('data-type');
        var changeVal = currentVal;

        if(jQuery(".cart-item-custom").length > 0){
            var key_c = jQuery(this).attr('data-key');
            var currentVal = parseInt(jQuery('.box-qty-custom.qty-' + key_c + ' .quantity input.qty').val());
        }
        else{
            var currentVal = parseInt(jQuery('.box-qty-custom .quantity input.qty').val());
        }
        var changeVal = currentVal;
        
        if(type == 'min'){
            if(jQuery(".cart-item-custom").length > 0){
                if(currentVal >= 1){
                    jQuery('.box-qty-custom.qty-' + key_c + ' .quantity input.qty').val(currentVal - 1);
                }
            }
            else{
                if(currentVal > 1){
                    jQuery('.box-qty-custom .quantity input.qty').val(currentVal - 1);
                }
            }
        }
        else{
            if(jQuery(".cart-item-custom").length > 0){
                jQuery('.box-qty-custom.qty-' + key_c + ' .quantity input.qty').val(currentVal + 1);
            }
            else{
                jQuery('.box-qty-custom .quantity input.qty').val(currentVal + 1);
            }
        }

        if(jQuery(".cart-item-custom").length > 0){
            jQuery("[name=update_cart]").attr("disabled", false);
            jQuery("[name=update_cart]").attr("aria-disabled", "false");
        }
    });
    jQuery('.tab-review-c ul.tabs li').click(function(){
        var tab_id = jQuery(this).attr('data-tab');

        jQuery('.tab-review-c ul.tabs li').removeClass('current');
        jQuery('.tab-review-c .tab-content').removeClass('current');

        jQuery(this).addClass('current');
        jQuery("#"+tab_id).addClass('current');
    })

    if(jQuery("#commentform").length > 0){
        jQuery(".tabbing-review-custom #commentform").append(jQuery(".comment-form-email"));
        jQuery(".tabbing-review-custom #commentform .comment-form-email + .comment-form-email").remove();

        jQuery(".tabbing-review-custom #commentform").append(jQuery(".comment-form-author"));
        jQuery(".tabbing-review-custom #commentform .comment-form-author + .comment-form-author").remove();

        jQuery(".tabbing-review-custom #commentform").append(jQuery(".comment-form-comment"));
        jQuery(".tabbing-review-custom #commentform .comment-form-comment + .comment-form-comment").remove();

        jQuery(".tabbing-review-custom #commentform").append(jQuery("#commentform .form-submit"));
        jQuery(".tabbing-review-custom #commentform .form-submit + .form-submit").remove();
    }

    if(jQuery(".listrev-product-custom").length > 0){
        function show(row,page){
            jQuery(".listrev-product-custom").html("");
            let limit = parseInt(row);
            let cur_page = parseInt(page);
            let total_page = Math.ceil(comments.length/limit);
            let length = limit*(cur_page+1);

            if(length>=comments.length){
                length=comments.length;
            }
            
            let offset = cur_page*limit;
            jQuery("#cur_page").text(cur_page+1);
            jQuery("#total_page").text(total_page);
            for(var i=offset; i<length; i++){
                jQuery(".listrev-product-custom").append(`
                    <li class="review">
                        <div class="profil-avatar">
                            <div class="avatar">
                                <div class="inisial-avatar">${comments[i].inisial}</div>
                            </div>
                            <div class="rating-name">
                                <div class="custom-rating">
                                    <div class="rating-outer" style="--rating: ${comments[i].star};"></div>
                                    <div class="rating-bottom"></div>
                                </div>
                                <div class="name-customer-rev">${comments[i].nama}</div>
                            </div>
                        </div>
                        <div class="description-review">${comments[i].content}</div>
                    </li>
                `);
            }
        }
        show("3","0");

        jQuery(document).on('click',".page-item", function(e){
            e.preventDefault();
            var key = jQuery(this).attr("data");
            var total = jQuery("#total_page").text();
            var cur_page = jQuery("#cur_page").text();
            var page = parseInt(cur_page)-1;
            var length = parseInt(total)-1;
            if(key=="prev"){
                if(page<=0){
                    page=0;
                }else {
                    page--;
                    jQuery('html, body').animate({
                        scrollTop: jQuery("#listrev-custom").offset().top
                    });
                }
            }else if(key=="next"){
                if(page>=length){
                    page=length;
                }else{
                    page++;
                    jQuery('html, body').animate({
                        scrollTop: jQuery("#listrev-custom").offset().top
                    });
                }
            }
            
            show("3",page);
        })
    }
    
    if(window.matchMedia('(max-width: 750px)').matches){
        jQuery('.product-detail-box').slick({  
            dots: true,
            arrows: false,
            infinite: false,
            pauseOnFocus: true,
            pauseOnHover: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            centerPadding: '40px'
        });
    }
})