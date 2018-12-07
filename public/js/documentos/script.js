$(function(){
    $("#formuSubirArchivo").on("submit", function(e){
        e.preventDefault();
        var f = $(this);
        var formData = new FormData(document.getElementById("formuSubirArchivo"));

        formData.append('archivo', $('#archivo')[0].files[0]);
        formData.append("titulo", $("#titulo").val());
        formData.append("descripcion", $("#descripcion").val());

        $.ajax({
            url: f.attr('action'),
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        })
        .done(function(respuesta){
          var res = JSON.parse(respuesta);
          var msje = res.mensaje;
          var head = (res.status) ? "¡Bien!" : "Error";
          var icon = (res.status) ? "success" : "warning";
          var newRow = "";
          $('#modalCargarArchivo').modal('toggle');
          f[0].reset();

        //   var btnDescargar  = '<a href="../archivos_usuario/nombreArchivo" download="" class="btn btn-icons btn-rounded btn-outline-primary btn-sm"><i class="mdi mdi-cloud-download"></i></a> '.replace("nombreArchivo", res.archivo);
        //   var btnDescargar  = '<a href="../archivos_usuario/nombreArchivo" download="" class="btn btn-icons btn-rounded btn-outline-primary btn-sm"><i class="mdi mdi-cloud-download"></i></a> '.replace("nombreArchivo", res.archivo);
          
        //   var url = "{{ url('documentos/'"+res.id+"'/download') }}";
          
        //   var btnDescargar  = '<form method="post" action="'+url+'">';
        //         btnDescargar  += '{{ csrf_field() }}';
        //         btnDescargar  += '<button type="submit" class="btn btn-icons btn-rounded btn-outline-primary"><i class="mdi mdi-cloud-download"></i></button>';
        //     btnDescargar  += '</form>';
          
          var btnEditar     = '<button id="btnEditarArchivo" class="btnEditarArchivo btn btn-icons btn-rounded btn-outline-warning" data-toggle="modal" data-id="{idArchivo}" data-nombre="{nombreArchivo}" data-desc="{descArchivo}" data-target="#modalEditarArchivo"><i class="mdi mdi-pencil"></i></button> '.replace("{idArchivo}", res.id).replace("{nombreArchivo}", res.nombre).replace("{descArchivo}", res.descripcion);
          var btnEliminar   = '<button class="btnEliminarArchivo btn btn-icons btn-rounded btn-outline-danger" data-toggle="modal" data-id="{idArchivo}" data-target="#modalEliminarArchivo"><i class="mdi mdi-close-circle"></i></button>'.replace("{idArchivo}", res.id); 

          if (res.status) {
            newRow = '<tr id="tr'+res.id+'">';
              newRow += '<td>'+res.nombre+'</td>';
              newRow += '<td>'+res.descripcion+'</td>';
              newRow += '<td>';
                newRow += '<div class="row">';
                    newRow += '<div class="col-md-4">';
                        newRow += btnDescargar;
                    newRow += '</div>';
                    newRow += '<div class="col-md-4">';
                        newRow += btnEditar;
                    newRow += '</div>';
                    newRow += '<div class="col-md-4">';
                        newRow += btnEliminar;
                    newRow += '</div>';
                newRow += '</div>';
              newRow += '</td>';
            newRow += '</tr>';
            
            $("table tbody").prepend(newRow);
          }

          $.toast({
            heading: head,
            text: msje,
            showHideTransition: 'slide',
            icon: icon,
            loaderBg: '#f96868',
            position: 'top-right',
            hideAfter: 6000 
          })
        });
    });
    

    $(document).on("click", ".btnEditarArchivo", function () {
      var id      = $(this).data('id');
      var titulo  = $(this).data('nombre');
      var desc    = $(this).data('desc');
      
      $('.idArchivo').val( id );
      $('.titulo').val( titulo );
      $('.descripcion').val( desc );
    });

    $("#formuEditarArchivo").on("submit", function(e){
        e.preventDefault();
        var idArchivo       = $('.idArchivo').val();
        var f               = $(this); 
        var formData        = new FormData(document.getElementById("formuEditarArchivo"));
        var url             = f.attr('action').replace("{id}", idArchivo);
        var tr              = $('#tr'+idArchivo);
        var tdNombre        = tr.children('td:nth-child(1)');
        var tdDesc          = tr.children('td:nth-child(2)');
        var tdBtnDescargar  = tr.children('td:nth-child(3)').children('a:nth-child(1)');
        var tdBtnEditar     = tr.children('td:nth-child(3)').children('button:nth-child(2)');
        var tdBtnEliminar   = tr.children('td:nth-child(3)').children('a:nth-child(3)');

        formData.append("archivo", $('#archivoEditar')[0].files[0]);
        formData.append("titulo", $("#tituloEditar").val());
        formData.append("descripcion", $("#descripcionEditar").val());

        $.ajax({
          url: url,
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false
        })
        .done(function(respuesta){
          var res = JSON.parse(respuesta);
          var msje = res.mensaje;
          var head = (res.status) ? "¡Bien!" : "Error";
          var icon = (res.status) ? "success" : "warning";
          $('#modalEditarArchivo').modal('toggle');

          if (res.status) {
            tdNombre.text(res.nombre);
            tdDesc.text(res.descripcion);
            // tdBtnDescargar.attr("href", res.url+"/"+res.archivo);
            // tdBtnDescargar.attr("download", res.archivo);
          }

          $.toast({
            heading: head,
            text: msje,
            showHideTransition: 'slide',
            icon: icon,
            loaderBg: '#f96868',
            position: 'top-right',
            hideAfter: 6000 
          })
        });
    });

    $(document).on("click", ".btnEliminarArchivo", function () {
      var id = $(this).data('id');
      $('.idArchivo').val( id );
    });

    $("#formuEliminarArchivo").on("submit", function(e){
      e.preventDefault();
      var idArchivo       = $('.idArchivo').val();
      var formulario      = $(this); 
      var tr              = $('#tr'+idArchivo);
      var url             = formulario.attr('action').replace("{id}", idArchivo);

      $.ajax({
        url: url,
        type: "post",
        dataType: "html",
        data: formulario.serialize()
      })
      .done(function(respuesta){

        console.log(respuesta);

        var res = JSON.parse(respuesta); console.log(res);
        var msje = res.mensaje;
        var head = (res.status) ? "¡Bien!" : "Error";
        var icon = (res.status) ? "success" : "warning";
        $('#modalEliminarArchivo').modal('toggle');
        tr.remove();

        $.toast({
          heading: head,
          text: msje,
          showHideTransition: 'slide',
          icon: icon,
          loaderBg: '#f96868',
          position: 'top-right',
          hideAfter: 6000 
        })
      });
    });    
});