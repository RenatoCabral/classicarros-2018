$('#single-form').submit(function (e) {
    $('#notification').html('<p class="sending-form">Enviando</p>');

    var name = $('.input-name').val();
    var email = $('.input-email').val();
    var phone = $('.input-phone').val();
    var cpf = $('.input-cpf').val();
    var details = $('.input-details').val();
    var salesman = $('.input-salesman').val();
    var url = $('.input-url').val();
    var title = $('.input-title').val();

    $.ajax({
        url : ajaxurl,
        type : 'post',
        data : {
            action : 'send_form_veiculo',
            name : name,
            email: email,
            phone: phone,
            cpf: cpf,
            details: details,
            to: salesman,
            url: url,
            title: title
        },
        success : function( response ) {
            $('.input-name').val('');
            $('.input-email').val('');
            $('.input-phone').val('');
            $('.input-cpf').val('');
            $('.input-details').val('');

            $('#notification').html( response );

        }
    });
    e.preventDefault();


});