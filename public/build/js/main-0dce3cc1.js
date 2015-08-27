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

var staff_animation = false;

// efeitos de rolagem
$(window).scroll(function () {
    var pos = window.scrollY;
    var container_about = document.getElementById('container-about');
    var container_staff = document.getElementById('container-staff');
    var container_contact = document.getElementById('container-contact');
    var $staff_first = $('#staff-first-row-container');
    var $staff_second = $('#staff-second-row-container');
    var $img = $('#image-about');
    var $text = $('#content-about');
    var $form = $('.contact-form');

    if ($(container_about).length && (pos + 400) >= container_about.offsetTop && $img.transition('is visible') == false) {
        $img.transition('horizontal flip', 1000);
        $text.transition('fade left', 1000);
    }

    //if ($(container_staff).length && (pos + 100) >= container_staff.offsetTop && staff_animation == false) {
    //    staff_animation = true;
    //    $('#staff-first-row-container .column')
    //        .transition({
    //            animation : 'pulse',
    //            reverse   : true,
    //            interval  : 200
    //        });
    //
    //    setTimeout(function(){
    //        $('#staff-second-row-container .column')
    //            .transition({
    //                animation : 'pulse',
    //                reverse   : true,
    //                interval  : 200
    //            });
    //    }, 1000);
    //}

    //if ($(container_contact).length && (pos + 100) >= container_contact.offsetTop && $form.transition('is visible') == false) {
    //    $form.transition('scale');
    //}
});

$('#newsletter').submit(function(e) {
    e.preventDefault ? e.preventDefault() : e.returnValue = false;

    var $form = $(this);
    var $button = $(this).find('button[type="submit"]');
    var $email = $form.find('input[name="email"]');
    var $token = $form.find('input[name="_token"]');

    $email.parent().removeClass('error');

    if($email.val() == '') {
        $email.parent().addClass('error');

        return false;
    }

    $button.prop('disabled', true);

    $.post('/email/news', {
        'email': $email.val(),
        '_token': $token.val()
    },
    function(data) {
        $email.val('');
        $button.prop('disabled', false);

        if(!!data.success) {
            $form.addClass('success');
        } else {
            $form.addClass('error');
        }
    })
});
//# sourceMappingURL=main.js.map