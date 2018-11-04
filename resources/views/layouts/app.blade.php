<!DOCTYPE html>
<html lang="es">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="../../vendors/iconfonts/simple-line-icon/css/simple-line-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">

    <!-- partial:../../partials/_navbar.html menu superior-->
    	@include('layouts.navbar')
    <!-- partial menu superior-->

    

    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html configuracion color-->
      <!-- <div class="theme-setting-wrapper">
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <div class="d-flex align-items-center justify-content-between border-bottom">
            <p class="settings-heading font-weight-bold border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Template Skins</p>
          </div>
          <div class="sidebar-bg-options" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options selected" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading font-weight-bold mt-2">Header Skins</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles primary"></div>
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles pink"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div> -->
      <!-- partial configuracion color-->

      <!-- partial:../../partials/_sidebar.html menu lateral-->
			@include('layouts.sidebar')
			<!-- partial menu lateral-->

      <div class="main-panel">
        <div class="content-wrapper">
					@yield('content')
        </div>
        <!-- content-wrapper ends -->
        
        <!-- partial:../../partials/_footer.html -->
        @include('layouts.footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/misc.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <script src="../../js/toastDemo.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
  <script>
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

                var btnDescargar  = '<a href="{{ asset("archivos_usuario/nombreArchivo") }}" download="" class="btn btn-icons btn-rounded btn-outline-primary btn-sm"><i class="mdi mdi-cloud-download"></i></a> '.replace("nombreArchivo", res.archivo);
                var btnEditar     = '<button id="btnEditarArchivo" class="btnEditarArchivo btn btn-icons btn-rounded btn-outline-warning" data-toggle="modal" data-id="{idArchivo}" data-nombre="{nombreArchivo}" data-desc="{descArchivo}" data-target="#modalEditarArchivo"><i class="mdi mdi-pencil"></i></button> '.replace("{idArchivo}", res.id).replace("{nombreArchivo}", res.nombre).replace("{descArchivo}", res.descripcion);
                var btnEliminar   = '<button class="btnEliminarArchivo btn btn-icons btn-rounded btn-outline-danger" data-toggle="modal" data-id="{idArchivo}" data-target="#modalEliminarArchivo"><i class="mdi mdi-close-circle"></i></button>'.replace("{idArchivo}", res.id); 

                if (res.status) {
                  newRow = '<tr id="tr'+res.id+'">';
                    newRow += '<td>'+res.nombre+'</td>';
                    newRow += '<td>'+res.descripcion+'</td>';
                    newRow += '<td>'+btnDescargar+btnEditar+btnEliminar+'</td>';
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
                  tdBtnDescargar.attr("href", res.url+"/"+res.archivo);
                  tdBtnDescargar.attr("download", res.archivo);
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

            // alert(url);
            // var tdNombre        = tr.children('td:nth-child(1)');
            // var tdDesc          = tr.children('td:nth-child(2)');
            // var tdBtnDescargar  = tr.children('td:nth-child(3)').children('a:nth-child(1)');
            // var tdBtnEditar     = tr.children('td:nth-child(3)').children('button:nth-child(2)');
            // var tdBtnEliminar   = tr.children('td:nth-child(3)').children('a:nth-child(3)');

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

              // if (res.status) {
              //   tdNombre.text(res.nombre);
              //   tdDesc.text(res.descripcion);
              //   tdBtnDescargar.attr("href", res.url+"/"+res.archivo);
              //   tdBtnDescargar.attr("download", res.archivo);
              // }

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

      /*function jsEval_guardarRespuesta(urlModulo, idRelacion, idPregunta, input){
        //console.log($('#'+input).find('.noUi-tooltip').html());
        var idAlternativaPregunta = $('#'+input).find('.noUi-tooltip').html().trim();
        $.ajax({
              dataType: 'json',
              type:'POST',
              url: "." + urlModulo + '/guardarRespuesta',
              data: {
                idRelacion: idRelacion,
                idPregunta: idPregunta,
                idAlternativaPregunta: idAlternativaPregunta
              },
              success:function(respuesta){
                  if(respuesta == 1){
                      var respuestas = $("#respuestas").val();
                      if($('#'+input).closest(".rowPregunta").find(".iconoGuardar").html().trim() == ""){
                          respuestas = parseInt(respuestas) + 1;
                          $("#respuestas").val(respuestas);
                      }
                      
                      $('#'+input).closest(".rowPregunta").find(".iconoGuardar").html('<i title="Guardado correcto" class="material-icons text-success gCorrecto">done_all</i>');
                  }else if(respuesta == 2){
                      var respuestas = $("#respuestas").val();
                      respuestas = parseInt(respuestas) - 1;
                      $("#respuestas").val(respuestas);
                      $('#'+input).closest(".rowPregunta").find(".iconoGuardar").html('');
                  }else{
                      $('#'+input).closest(".rowPregunta").find(".iconoGuardar").html('<i title="Eroor al guardar" class="material-icons text-danger">clear</i>');
                  }

                
              },
              statusCode: {
                  401: function() { 
                      window.location.href = 'login'; 
                  },
                  419: function() { 
                      window.location.href = 'login'; 
                  },
                  500: function() { 
                      $('#'+input).closest(".rowPregunta").find(".iconoGuardar").html('<i title="Eroor al guardar" class="material-icons text-danger">clear</i>');
                  }
              },
              error: {
              },
              complete: function(){
                  var respondidas = $('#'+input).closest(".rowCompetencia").find(".gCorrecto");
                  $('#'+input).closest(".rowCompetencia").find(".respondidas").html(respondidas.length);
                  jsEval_cambiarNotaTimepoReal(urlModulo, idRelacion);
              }
        });
      }*/
  </script>
</body>


</html>
