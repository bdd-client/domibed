jQuery(document).ready(function () {
    setTimeout(function(){
        var el_editor =  jQuery('.elementor-editor-active').length;
        var el_editor =  jQuery('.elementor-editor-active').length;
        if (el_editor < 1) {
            var time = 100;
        }else{
            var time = 4000;
        }
        console.log(time)
        setTimeout(function(){
            var post_car = [];
            jQuery(".elementor-widget-Collection_carousel").each(function () {  
                post_car.push(jQuery(this).data('id'));
            });
            console.log(post_car)
            for (var i = 0; i < post_car.length; i++) {
                console.log(post_car[i]);
                jQuery('[data-id="'+post_car[i]+'"] .collection-carousel-wrapper > .slick-carousel').slick({  
                    dots: false,
                    arrows: false,
                    infinite: true,
                    autoplay: true,
                    autoplaySpeed: 3000,
                    pauseOnFocus: true,
                    pauseOnHover: true,
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    centerPadding: '40px',
                    responsive: [
                        {
                          breakpoint: 680,
                          settings: {
                            slidesToShow: 2
                          }
                        },
                        {
                          breakpoint: 480,
                          settings: {
                            slidesToShow: 2
                          }
                        }
                    ]
                });
            }
        },time);
    },100);
    setTimeout(function () {
        var el_editor = jQuery(".elementor-editor-active").length;
        if (el_editor < 1) {
            var time = 100;
        } else {
            var time = 4000;
        }

        setTimeout(function () {
            jQuery(".carouselna").slick({
                autoplay: false,
                dots: true,
                nextArrow: jQuery(".carouselna-next"),
                prevArrow: jQuery(".carouselna-prev"),
            });
        }, time);
        jQuery(".carouselna2").slick({
            autoplay: true,
            dots: false,
            loop: true,
            slidesToShow: 5,
            nextArrow: jQuery(".next"),
            prevArrow: jQuery(".prev"),
        });
        setTimeout(function () {
            jQuery(
                ".slider-product-sale .elementor-widget-container .product_list_widget"
            ).slick({
                autoplay: false,
                dots: false,
                slidesToShow: 3,
                nextArrow: jQuery(".next"),
                prevArrow: jQuery(".prev"),
            });
        });
    }, 100);
});
