$(document).ready(function () {

    $('.masthead').visibility({
        once: false,
        onBottomPassed: function () {
            $('.fixed.menu').transition('fade in');
        },
        onBottomPassedReverse: function () {
            $('.fixed.menu').transition('fade out');
        }
    });

    // create sidebar and attach to menu open
    $('.ui.sidebar').sidebar('attach events', '.toc.item');

});

// efeitos de rolagem
$(window).scroll(function() {
    var pos = window.scrollY;
    var container = document.getElementById('container-1');
    var $img = $('#image-1');
    var $text = $('#content-1');

    if((pos + 300) >= container.offsetTop && $img.transition('is visible') == false) {
        $img.transition('horizontal flip', 1000);
        $text.transition('fade left', 1000);
    }
});