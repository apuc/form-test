$(document).ready(function() {
    $('#submit').on('click', function (e) {
        var redirect = true;
        e.preventDefault();
        $.ajax({
            url:      '/form-request/submit',
            type:     'POST',
            data: $("#request-form").serialize(),
            beforeSend: function() {
                $('#submit').prop('disabled', true);
            },
            success: function(response) {
                result = $.parseJSON(response);
                var fields = ['name', 'email', 'request'];
                var result_property = [result.name, result.email, result.request];

                len = fields.length;
                for(i = 0; i < len; ++i) {
                    selector = '#' + fields[i] + 'Message';
                    if (result.hasOwnProperty(fields[i])) {
                        redirect = false;
                        changeStatus(selector, result_property[i], false);
                    } else {
                        changeStatus(selector, 'Ok', true);
                    }
                }
                $('#submit').prop('disabled', false);
                if (redirect) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Заявка успешно отправлена',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    window.location.replace('/show-request');
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
        return false;
    });


    function changeStatus(selector, message, status) {
        if (status) {
            $(selector).removeClass('text-danger');
            $(selector).addClass('text-success');
        } else {
            $(selector).removeClass('text-success');
            $(selector).addClass('text-danger');
        }
        $(selector).html(message);
    }
});