var $ = jQuery.noConflict();
$(document).ready(function(){
    $('.header__toggle').on('click',function(){
         $('.header__toggle i').toggleClass('fa-bars').toggleClass('fa-times');
         $('#main-navigation').slideToggle();
     });
     //sub menu drop down
     $('.header__nav .page_item_has_children > a, nav .menu-item-has-children > a').each(
         function() {
            $(this).after('<i class="fal fa-chevron-down"></i>');
            if ( $(window).width() < 991) {
            $(this).next('i').on('click',
                function() {
                    $(this).toggleClass('fal fa-chevron-down fal fa-chevron-up').next('ul').slideToggle();
                    $(this).parents('.menu-navigation-container:first').find('i.fal fa-chevron-up').not(jQuery(this)).each(function(){jQuery(this).toggleClass('fal fa-chevron-down fal fa-chevron-up').next('ul').slideUp();});
                }
            );
        }
        }
    );
     //Search mobile
     $("#header__dropdown-search").on('click', function(){
       $(".header__search").toggleClass("header__search--active");
       $("header").toggleClass("header--extra");
        $('.header__search').slideToggle();
     });
    // Home Slider
    $('.slider').slick({
       arrows: false,
       dots: false,
       autoplay: true,
       fade: true,
       cssEase: 'linear',
       autoplaySpeed: 6000,
        adaptiveHeight: true
    });
    // special offers
    $('.special__container').slick({
       arrows: false,
       dots: true,
       autoplay: true,
       fade: true,
       cssEase: 'linear',
       autoplaySpeed: 7000,
       adaptiveHeight: false
    });
    // Popular items home-page
    $('.popular ul.products').slick({
    arrows: true,
    prevArrow: $('.popular__arrow--prev'),
    nextArrow: $('.popular__arrow--next'),
    dots: false,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: false,
    responsive: [
    {
      breakpoint: 1600,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true
      }
    },
    {
      breakpoint: 1180,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    ]
    });
    // Carousel Landing Page Products
    $('.carousel ul.products').slick({
    arrows: true,
    prevArrow: $('.carousel__arrow--prev'),
    nextArrow: $('.carousel__arrow--next'),
    dots: false,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: false,
    responsive: [
    {
      breakpoint: 1600,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true
      }
    },
    {
      breakpoint: 1180,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    ]
    });
    // reviews Slider
    $('.reviews__slide').slick({
       arrows: false,
       dots: false,
       autoplay: true,
       fade: true,
       cssEase: 'linear',
       autoplaySpeed: 6000,
        adaptiveHeight: true
    });
    //Banner more information
    $("#banner__link").on('click', function(){
      $(".banner__extra").toggleClass("banner__extra--active");
       $('.banner__extra').slideToggle();
    });
    //scroll down smooth on landing pages
    $('.carousel__button').on('click', function() {
        $('html, body').animate({scrollTop: $(this.hash).offset().top - 50}, 1000);
        return false;
    })
    //Button to open and close 'Customise' section MOBILE
    $("#denward__mobile-refine").on('click', function(){
      $(".denward__refine").toggleClass("denward__refine--active");
      $("body").toggleClass("no-scroll");
    });
    // Removing classes when the close icon is clicked.
    $(".denward__close, .denward__filter-btn").on('click', function(){
      $(".denward__refine").removeClass("denward__refine--active");
      $("body").removeClass("no-scroll");
    });
    // Single product images
$('.item__product-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    prevArrow: '<span class="product-arrow prev"><i class="fa fa-chevron-left"></i></span>',
    nextArrow: '<span class="product-arrow next"><i class="fa fa-chevron-right"></i></span>',
    asNavFor: '.item__product-nav'
});
// Thumbnails
$('.item__product-nav').slick({
    slidesToShow: 4,
    infinite: false,
    arrows: false,
    slidesToScroll: 1,
    asNavFor: '.item__product-slider',
    dots: false,
    centerMode: false,
    focusOnSelect: true
});
// reviews Slider
$('.slider-landing__slider').slick({
   arrows: false,
   dots: false,
   autoplay: true,
   fade: true,
   cssEase: 'linear',
   autoplaySpeed: 6000,
    adaptiveHeight: true
});

// $( document.body ).on( 'updated_cart_totals', function(){
//
//     $('.quantity__minus').on('click',
//         function() {
//             $element = $(this).nextAll('.quantity').children('.qty');
//
//             if ($element.val() > 1)
//             {
//                 $($element).val(parseInt($element.val()) - 1).change();
//                 $('#update-basket-reminder').show();
//                 // $($element).change();
//             }
//
//         }
//     );
//
//     $('.quantity__plus').on('click',
//         function() {
//             $element = $(this).prevAll('.quantity').children('.qty');
//
//             $($element).val(parseInt($element.val()) + 1).change();
//             $('#update-basket-reminder').show();
//             // $($element).change();
//         }
//     );
//
// });
//// Update Quantity Initial
$('.quantity__minus').on('click',
    function() {
        $element = $(this).nextAll('.quantity').children('.qty');

        if ($element.val() > 1)
        {
            $($element).val(parseInt($element.val()) - 1).change();
            $('#update-basket-reminder').show();
            // $($element).change();
        }

    }
);
$('.quantity__plus').on('click',
    function() {
        $element = $(this).prevAll('.quantity').children('.qty');

        $($element).val(parseInt($element.val()) + 1).change();
        $('#update-basket-reminder').show();
        // $($element).change();
    }
);
//Star ratings
$('.stars a').on('click', function(){
  $('.stars span, .stars a').removeClass('active');

  $(this).addClass('active');
  $('.stars span').addClass('active');
});
//You may also like products
$('.related__slider').slick({
    arrows: true,
    prevArrow: $('.related__arrow.related__arrow--prev'),
    nextArrow: $('.related__arrow.related__arrow--next'),
    dots: false,
    infinite: false,
    draggable: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1255,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 730,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
 });
// Upsell products
$('.upsell__slider').slick({
    arrows: true,
    prevArrow: $('.upsell__arrow.upsell__arrow--prev'),
    nextArrow: $('.upsell__arrow.upsell__arrow--next'),
    dots: false,
    infinite: false,
    draggable: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1255,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 730,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
 });

//Adding class when cant add to basket directly as has dropdown field addons to decide on price.
$(".add_to_cart_button").not(function(){
    if (!$(this).hasClass('ajax_add_to_cart')) {
        !$(this).addClass('incactive__btn');
      }

    });

    //Adds class to eori number if already selected.
    if ($('#billing_country').val() == 'IE'){
        $('#eori_number_field').addClass('eori_number_field');
    }
    //If change country to IE then will add class.
    $('#billing_country').on('change',function() {
        if ($('#billing_country').val() == 'IE'){
            $('#eori_number_field').addClass('eori_number_field');
        } else {
            $('#eori_number_field').removeClass('eori_number_field');
        }
    })
    // Adding class if body has search
    if( $('body').hasClass('search-results') === true )
        {
         $('.denward__sidebar').addClass('denward__sidebar--hide');
         $('.denward__mobile').addClass('denward__mobile--hide');
        }
    // if required fields on product display message
    if ($('.wc-pao-required-addon').length > 0) {
        $('.addon-required-notice').css('display', 'block');
    }

});

//Fade in history
$(window).scroll( function(){
    $('.history__row').each( function(i){
        var bottom_of_object = $(this).offset().top + $(this).outerHeight();
        var bottom_of_window = $(window).scrollTop() + $(window).height();

        if( bottom_of_window > bottom_of_object ){
            $(this).animate({'opacity':'1'},500);
        }
    });
});

/*-------- Google maps--------*/

var map;
var bounds;

(function($) {

/*
*  new_map
*
*  This function will render a Google Map onto the selected jQuery element
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$el (jQuery element)
*  @return	n/a
*/

function new_map( $el ) {

	// var
	var $markers = $el.find('.marker');


	// vars
	var args = {
		zoom		: 16,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP
	};


	// create map
	var map = new google.maps.Map( $el[0], args);


	// add a markers reference
	map.markers = [];


	// add markers
	$markers.each(function(){

    	add_marker( $(this), map );

	});


	// center map
	center_map( map );


	// return
	return map;

}

/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$marker (jQuery element)
*  @param	map (Google Map object)
*  @return	n/a
*/

function add_marker( $marker, map ) {

	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
    var myIcon = new google.maps.MarkerImage("https://www.pharmacy-equipment.co.uk/wp-content/themes/denward/images/map-pin.png", null, null, null, new google.maps.Size(40,50));

	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map,
        title:    'Denward',
        icon: myIcon,
	});

	// add to array
	map.markers.push( marker );

}

/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	map (Google Map object)
*  @return	n/a
*/

function center_map( map ) {

	// vars
	var bounds = new google.maps.LatLngBounds();

	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){

		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

		bounds.extend( latlng );

	});

	// only 1 marker?
	if( map.markers.length == 1 )
	{
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 15 );
	}
	else
	{
		// fit to bounds
		map.fitBounds( bounds );
	}

}

/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*
*  @type	function
*  @date	8/11/2013
*  @since	5.0.0
*
*  @param	n/a
*  @return	n/a
*/
// global var
var map = null;

$(document).ready(function(){

	$('.acf-map').each(function(){

		// create map
		map = new_map( $(this) );

	});

});

})(jQuery);

// Wishlist functions

$('.denward__heart.fa-times').on('click',function(){

  var data = {
    action: 'wishlist_remove',
    security: $(this).data('nonce'),
    code: $(this).data('wishlist-code')
  };

  $.post(siteURL + 'wp-content/themes/denward/ajax/wishlist.php', data, function(response) {

      var response = JSON.parse(response);

      if (response.action == 'removed')
      {
        if (response.code != '')
        {
          $('i[data-wishlist-code="' + response.code + '"]').closest('.product').fadeOut(500);
        }
      }

  });

  return false;

});

$('.denward__heart.fa-heart, .item__wish-heart').not('.denward__wish--added .denward__heart.fa-heart, .item__wish--added .item__wish-heart').on('click',function(){

  var data = {
    action: 'wishlist_add',
    security: $(this).data('nonce'),
    product: $(this).data('product-id')
  };

  $.post(siteURL + 'wp-content/themes/denward/ajax/wishlist.php', data, function(response) {

      console.log(response);
      var response = JSON.parse(response);

      if (response.action == 'added')
      {
        $('i[data-product-id="' + response.product_id + '"]').parent().addClass('denward__wish--added');
      }

  });

  return false;

});
