

jQuery(document).ready(function () {



    jQuery('#Select-Marca').change(function () {
        jQuery('#Select-Modelo').empty().append('<option>Carregando...</option>');
        jQuery('#Select-Ano').empty().append('<option value="">Ano</option>');
        jQuery.ajax({
            url: ajaxurl,
            type: 'post',
            data: {
                action: 'get_models_by_manufacturer',
                manufacturer: jQuery('#Select-Marca').val()
            },
            success: function (response) {
                jQuery('#Select-Modelo').empty().append(response);

            }
        });



        jQuery('#Select-Modelo').change(function () {
            console.log($(this).val());
            populate_year($(this).val());
        });

    });
});

function populate_year(model){
    jQuery.ajax({
        url: ajaxurl,
        type: 'post',
        data:{
            action: 'get_years_list',
            model: model
        },
        success: function(response){
            jQuery('#Select-Ano').empty().append(response);
        }
    });
}