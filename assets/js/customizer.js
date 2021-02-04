(function($) {
    /**=======================================================SLIDE №1=================================================================== */
    wp.customize( 'section_slider_1_img_setting', function(value){
        value.bind(function(newVal){
            $( '#slide_1_img img' ).attr('src', newVal);	
        });
    });
    wp.customize( 'section_slider_1_title_setting', function(value){
        value.bind(function(newVal){
            $( '#slide_1_text h1' ).html(newVal);	
        });
    });
    wp.customize( 'section_slider_1_subtitle_setting', function(value){
        value.bind(function(newVal){
            $( '#slide_1_text h2' ).html(newVal);
        });
    });
/**=======================================================SLIDE №2=================================================================== */
    wp.customize( 'section_slider_2_img_setting', function(value){
        value.bind(function(newVal){
            $( '#slide_2_img img' ).attr('src', newVal);
        });
    });
    wp.customize( 'section_slider_2_title_setting', function(value){
        value.bind(function(newVal){
            $( '#slide_2_text h1' ).html(newVal);
        });
    });
    wp.customize( 'section_slider_2_subtitle_setting', function(value){
        value.bind(function(newVal){
            $( '#slide_2_text h2' ).html(newVal);	
        });
    });
/**=======================================================SLIDE №3=================================================================== */
    wp.customize( 'section_slider_3_img_setting', function(value){
        value.bind(function(newVal){
            $( '#slide_3_img img' ).attr('src', newVal);	
        });
    });
    wp.customize( 'section_slider_3_title_setting', function(value){
        value.bind(function(newVal){
            $( '#slide_3_text h1' ).html(newVal);	
        });
    });
    wp.customize( 'section_slider_3_subtitle_setting', function(value){
        value.bind(function(newVal){
            $( '#slide_3_text h2' ).html(newVal);	
        });
    });
/**=======================================================SLIDE №4=================================================================== */
    wp.customize( 'section_slider_4_img_setting', function(value){
        value.bind(function(newVal){
            $( '#slide_4_img img' ).attr('src', newVal);	
        });
    });
    wp.customize( 'section_slider_4_title_setting', function(value){
        value.bind(function(newVal){
            $( '#slide_4_text h1' ).html(newVal);	
        });
    });
    wp.customize( 'section_slider_4_subtitle_setting', function(value){
        value.bind(function(newVal){
            $( '#slide_4_text h2' ).html(newVal);	
        });
    });
    /**=======================================================SLIDE №5=================================================================== */
    wp.customize( 'section_slider_5_img_setting', function(value){
        value.bind(function(newVal){
            $( '#slide_5_img img' ).attr('src', newVal);	
        });
    });
    wp.customize( 'section_slider_5_title_setting', function(value){
        value.bind(function(newVal){
            $( '#slide_5_text h1' ).html(newVal);	
        });
    });
    wp.customize( 'section_slider_5_subtitle_setting', function(value){
        value.bind(function(newVal){
            $( '#slide_5_text h2' ).html(newVal);	
        });
    });
    /**=======================================================SLIDE №6=================================================================== */
    wp.customize( 'section_slider_6_img_setting', function(value){
        value.bind(function(newVal){
            $( '#slide_6_img img' ).attr('src', newVal);	
        });
    });
    wp.customize( 'section_slider_6_title_setting', function(value){
        value.bind(function(newVal){
            $( '#slide_6_text h1' ).html(newVal);	
        });
    });
    wp.customize( 'section_slider_6_subtitle_setting', function(value){
        value.bind(function(newVal){
            $( '#slide_6_text h2' ).html(newVal);	
        });
    });
    /**=======================================================SLIDE №7=================================================================== */
    wp.customize( 'section_slider_7_img_setting', function(value){
        value.bind(function(newVal){
            $( '#slide_7_img img' ).attr('src', newVal);	
        });
    });
    wp.customize( 'section_slider_7_title_setting', function(value){
        value.bind(function(newVal){
            $( '#slide_7_text h1' ).html(newVal);	
        });
    });
    wp.customize( 'section_slider_7_subtitle_setting', function(value){
        value.bind(function(newVal){
            $( '#slide_7_text h2' ).html(newVal);	
        });
    });
    /**=======================================================SLIDE №8=================================================================== */
    wp.customize( 'section_slider_8_img_setting', function(value){
        value.bind(function(newVal){
            $( '#slide_8_img img' ).attr('src', newVal);	
        });
    });
    wp.customize( 'section_slider_8_title_setting', function(value){
        value.bind(function(newVal){
            $( '#slide_8_text h1' ).html(newVal);	
        });
    });
    wp.customize( 'section_slider_8_subtitle_setting', function(value){
        value.bind(function(newVal){
            $( '#slide_8_text h2' ).html(newVal);	
        });
    });
    /**=======================================================SALAD CARD=================================================================== */
    /**=======================================================SALAD CARD TITLE=================================================================== */
    wp.customize( 'about_recipe_setting', function(value){
        value.bind(function(newVal){
            $( '.about__title' ).html( newVal);	
        });
    });
    wp.customize( 'about_recipe_color_setting', function(value){
        value.bind(function(newVal){
            $( '.about__title' ).css( 'color', newVal);	
        });
    });
})(jQuery);
