$( document ).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var comuna_id = $('#selectComuna').data("seleccion");
    
    $( ".guardarRespuesta" ).change(function() {
        var modelo  = $(this).data("modelo");
        var campo   = $(this).data("campo");
        var valor   = $(this).val();
        
        $.ajax({
            url: './usuarios/edit',
            type: "post",
            dataType: "json",
            data:{
                modelo: modelo,
                campo: campo,
                valor: valor
            }
        })
        .done(function(res){
            console.log(res);
            $(this).addClass("border-success");
        });
    });
    

    $( "#selectRegion" ).change(function() {
        var id_region = $(this).val();

        $.ajax({
            url: './comunas/get',
            type: "post",
            dataType: "json",
            data:{
                id: id_region
            }
        })
        .done(function(res){
            $('#selectComuna').find('option').remove();
            $('#selectComuna').append('<option selected value="">Seleccionar</option>');

            $.each(res, function(key, value){
                if (comuna_id == value.id) {
                    var option = $("<option />").val(value.id).html(value.comuna).attr('selected', 'selected');
                }else{
                    var option = $("<option />").val(value.id).html(value.comuna);
                }
                $('#selectComuna').append(option);
            });
        });
    });

    $( "#selectRegion" ).change();
});