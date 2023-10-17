$(document).ready(function () {
    $(window).scroll(function () {
        let scrollPosition = $(this).scrollTop();

        if (scrollPosition >= 70) {
            $('.hmal-header-bottom').addClass('hmal-bg-white');
        } else {
            $('.hmal-header-bottom').removeClass('hmal-bg-white');
        }
    });
});
