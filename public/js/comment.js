$(document).ready(function () {
    $('#contactform').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '/articles/{post}',
            data: $('#contactform').serialize(),
            success: function (data) {
                if (data.result) {
                    $('#senderror').hide();
                    $('#sendmessage').show();
                } else {
                    $('#senderror').show();
                    $('#sendmessage').hide();
                }
            },
            error: function () {
                $('#senderror').show();
                $('#sendmessage').hide();
            }
        });
    });
});
