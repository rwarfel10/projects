jQuery(document).ready(function($) {
    $('ul#menu-primary-navigation').on('click', 'li button.mobile_navigation', function(){
        $('nav.nav-primary').toggleClass('active');
        $(this).find('i').toggle();
    });
});
