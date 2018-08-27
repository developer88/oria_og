

jQuery(function($){
	//Header search
	$('.js-header-search-button').click(function() {
		$('.js-header-search-form').submit();
	});

	//Menu dropdown animation
	$('.sub-menu').hide();
	$('.main-navigation .children').hide();
	$('.menu-item').hover(
		function() {
			$(this).children('.sub-menu').slideDown();
		},
		function() {
			$(this).children('.sub-menu').hide();
		}
	);
	$('.main-navigation li').hover(
		function() {
			$(this).children('.main-navigation .children').slideDown();
		},
		function() {
			$(this).children('.main-navigation .children').hide();
		}
	);
});

//Open social links in a new tab
jQuery(function($) {
     $( '.social-navigation li a' ).attr( 'target','_blank' );
});

//Social menu
jQuery(function($) {
	var items = $('.social-navigation .menu-item').length;
	itemWidth = 100/items + '%';
	$('.social-navigation .menu-item').css('width', itemWidth);
});

//Toggle sidebar
function closeSideBar($) {
	$('.widget-area').toggleClass('widget-area-visible');
	$('.sidebar-toggle').toggleClass('sidebar-toggled');
	$('.sidebar-toggle').find('i').toggleClass('fa-times');
	$('.sidebar-toggle').find('i').toggleClass('fa-bars');
	$('.sidebar-close-area').toggleClass('sidebar-close-area-opened');
}

jQuery(function($) {
	$('.sidebar-close-area').click(function() {
		closeSideBar($);
	});
	$('.sidebar-toggle').click(function() {
		$('.widget-area').toggleClass('widget-area-visible');
		$('.sidebar-toggle').toggleClass('sidebar-toggled');
		$('.sidebar-toggle').find('i').toggleClass('fa-bars');
		$('.sidebar-toggle').find('i').toggleClass('fa-times');
		$('.sidebar-close-area').toggleClass('sidebar-close-area-opened');
	});
	$('.sidebar-close').click(function() {
		closeSideBar($);
	});
});

//Parallax
jQuery(function($) {
	$(".site-header").parallax("50%", 0.3);
});

//Fit Vids
jQuery(function($) {
    $("body").fitVids();
});

//Mobile menu
jQuery(function($) {
	$('.main-navigation .menu').slicknav({
		label: '<i class="fa fa-bars"></i>',
		prependTo: '.mobile-nav',
		closedSymbol: '&#43;',
		openedSymbol: '&#45;',
		allowParentLinks: true
	});
	$('.info-close').click(function(){
		$(this).parent().fadeOut();
		return false;
	});
});

//Preloader
jQuery(function($) {
	$(window).bind('load', function() {
		$('.preloader').css('opacity', 0);
		setTimeout(function(){$('.preloader').hide();}, 600);
	});
});