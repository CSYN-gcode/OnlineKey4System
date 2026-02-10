function SendMail() {
    $.ajax({
        url: 'send_mail',
        method: 'get',
        dataType: 'json',
        success: function (response) {
        },
    });
}

function SendMailCompletedData() {
    $.ajax({
        url: 'send_mail_completed_data',
        method: 'get',
        dataType: 'json',
        success: function (response) {

        },
    });
}