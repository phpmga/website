$(document).ready(function () {

    $('.start-menu').visibility({
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
$(window).scroll(function () {
    var pos = window.scrollY;
    var container_about = document.getElementById('container-about');
    var container_staff = document.getElementById('container-staff');
    var $staff_first = $('#staff-first-row-container');
    var $staff_second = $('#staff-second-row-container');
    var $img = $('#image-about');
    var $text = $('#content-about');

    if ($(container_about).length && (pos + 400) >= container_about.offsetTop && $img.transition('is visible') == false) {
        $img.transition('horizontal flip', 1000);
        $text.transition('fade left', 1000);
    }

    if ($(container_staff).length && (pos + 100) >= container_staff.offsetTop && $staff_first.transition('is visible') == false) {
        $staff_first.transition('horizontal flip', 1);
        $('#staff-first-row-container .column')
            .transition({
                animation : 'scale',
                reverse   : 'auto',
                interval  : 200
            });

        setTimeout(function(){
            $staff_second.transition('horizontal flip', 1);
            $('#staff-second-row-container .column')
                .transition({
                    animation : 'scale',
                    reverse   : 'auto',
                    interval  : 200
                });
        }, 1000);
    }
});