

jQuery(document).ready(function () {



    jQuery('#Select-Marca').change(function () {
        jQuery('#Select-Modelo').empty().append('<option>Carregando...</option>');
        jQuery('#Select-Ano').empty().append('<option value="">Ano</option>');

        populate_model($(this).val());
    });


    jQuery('#Select-Modelo').change(function () {
        populate_year($('#Select-Marca').val(), $(this).val());
    });


});

function populate_model(manufacturer){

    jQuery.ajax({
        url: ajaxurl,
        type: 'post',
        data: {
            action: 'get_models_by_manufacturer',
            manufacturer: manufacturer
        },
        success: function (response) {
            jQuery('#Select-Modelo').empty().append(response);

        }
    });
}

function populate_year(manufacturer,model){
    jQuery.ajax({
        url: ajaxurl,
        type: 'post',
        data:{
            action: 'get_years_list',
            manufacturer: manufacturer,
            model: model
        },
        success: function(response){
            jQuery('#Select-Ano').empty().append(response);
        }
    });
}