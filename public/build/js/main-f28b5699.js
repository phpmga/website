//# sourceMappingURL=main.js.map
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

    $('#contact_form')
        .form({
            on: 'blur',
            inline : true,
            fields: {
                name: {
                    identifier  : 'name',
                    rules: [
                        {
                            type   : 'empty',
                            prompt : 'Please enter a value'
                        }
                    ]
                },
                email: {
                    identifier  : 'email',
                    rules: [
                        {
                            type   : 'empty',
                            prompt : 'Please select a dropdown value'
                        }
                    ]
                },
                subject: {
                    identifier  : 'subject',
                    rules: [
                        {
                            type   : 'checked',
                            prompt : 'Please check the checkbox'
                        }
                    ]
                }
            }
        });
});