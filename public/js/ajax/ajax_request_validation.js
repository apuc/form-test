$(document).ready(function() {
    $('#submit').on('click', function (e) {
        var redirect = true;

        e.preventDefault();
        $.ajax({
            url:      '/form-request/submit',
            type:     'POST',
            data: $("#request-form").serialize(),
            success: function(response) {
                console.log(response);
                result = $.parseJSON(response);
                if (result.hasOwnProperty('name'))  {
                    $('#nameMessage').html(result.name);
                    redirect = false;
                    changeStatus('#nameMessage', result.name, false);
                } else {
                    changeStatus('#nameMessage', 'Ok', true);
                }
                if (result.hasOwnProperty('email')) {
                    $('#emailMessage').html(result.email);
                    redirect = false;
                    changeStatus('#emailMessage', result.email, false);
                } else {
                    changeStatus('#emailMessage', 'Ok', true);
                }
                if (result.hasOwnProperty('request')) {
                    $('#requestMessage').html(result.request);
                    redirect = false;
                    changeStatus('#requestMessage', result.request, false);
                } else {
                    changeStatus('#requestMessage', 'Ok', true);
                }
                console.log(redirect);
                if (redirect) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Заявка успешно отправлена',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    //sleep(1000);
                    window.location.replace('/');
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


