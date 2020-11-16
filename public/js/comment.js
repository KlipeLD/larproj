function changeColor(){
    //document.body.style.background = colorArray[i];
    document.body.style.backgroundImage = "url('t.png')"; //Если файл в корне, если путь другой, укажите путь перед t.png
    i++;
    if( i >= colorArray.length) {
        i = 0;
    }
}
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
