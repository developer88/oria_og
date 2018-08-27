function CookieWarning() {

    jQuery(".cookie-warning .fa.fa-times").on('click', function(){
        jQuery.cookie("hamCookAccpt", "1", { expires: 365 });
        jQuery(".cookie-warning").css('display', 'none');
    });


    if(!jQuery.cookie("hamCookAccpt")) {
        jQuery(".cookie-warning").css('display', 'block');
    }
}

function bindNavLinks() {
    jQuery("div.nav-next, div.nav-previous").click(function(el){
        window.location = jQuery(this).find("a").attr("href");
    });
}

jQuery( document ).ready(function() {
    CookieWarning();
    bindNavLinks();
});