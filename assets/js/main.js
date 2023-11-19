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


let scrollToTopButton = document.getElementById("hmal-scrollToTop");

window.onscroll = function() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        scrollToTopButton.style.display = "block";
    } else {
        scrollToTopButton.style.display = "none";
    }
};

scrollToTopButton.onclick = function() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
};

function scrollToId(id) {
    let navbarHeight = 80;
    let target = document.getElementById(id);
    if (target) {
        window.scrollTo({
            top: target.offsetTop - navbarHeight,
            behavior: 'smooth'
        });
    }
}

window.addEventListener('hashchange', function() {
    let hash = window.location.hash.substring(1);
    scrollToId(hash);
});

window.addEventListener('load', function() {
    if (window.location.hash) {
        let hash = window.location.hash.substring(1);
        scrollToId(hash);
    }
});