$(document).ready(function () {
  var table = $('#datatable').DataTable();
  var table2 = $('#datatable4').DataTable();
  $('#datatable tbody').on('click', 'tr', function () {    	
    if ($(this).hasClass('selected')) {
        $(this).removeClass('selected');
        $("#nuevosLotes").html("");
        $("#qrcode").html("");
    }else {
      table2.clear().draw();
      table.$('tr.selected').removeClass('selected');
      $(this).addClass('selected');
      var data = table.row(this).data();
      $("#dataCodigo").val(data[0]);
      $("#dataDescripcion").val(data[1]);
      $("#dataCategoria").val(data[2]);
      $("#dataBrand").val(data[3]);
      $("#dataUmbral").val(data[4]);
      $("#dataTipo").val(data[5]);
      $("#dataCantidad").val(data[6]);
      $.ajax({
        url:"ajax/lotes.ajax.php",
        method:"POST",
        data: { "codigo" : data[0],  
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json"
        },
        success:function(respuesta){
          var resp = jQuery.parseJSON(respuesta); 
          for(var i = 0; i < resp.length; i++){   
            table2.row.add([resp[i]["lote"],resp[i]["almacen"],resp[i]["stock_lote"],resp[i]["fecha_lote"]]);
            table2.draw();
          }
        }
      });
    }
  });
})
$('#datatable4 tbody').on('click', 'tr', function () {     
  var table4 = $('#datatable4').DataTable();
  var table = $('#datatable').DataTable();
  if ($(this).hasClass('selected')) {
      $(this).removeClass('selected');
  } else {
    $("#qrcode").html("");
    table4.$('tr.selected').removeClass('selected');
    $(this).addClass('selected');
    var data = table4.row(this).data();
    var codigo = $("#dataCodigo").val();
    var lote = data[0];
    var almacen = data[1];
    var stock = data[2];
    var fecha = data[3];
    var descripcion = $("#dataDescripcion").val();
    var qrcodeContainer = $("#qrcode");
    new QRCode(qrcodeContainer[0],codigo+';'+descripcion+';'+lote+';'+almacen+';'+fecha);
  }
});
$('#datatable6 tbody').on('click', 'tr', function () {     
  var table6 = $('#datatable6').DataTable();
  if ($(this).hasClass('selected')) {
      $(this).removeClass('selected');
  } else {
    $("#qrcode2").html("");
    table6.$('tr.selected').removeClass('selected');
    $(this).addClass('selected');
    var data = table6.row(this).data();
    $.ajax({
        url:"ajax/lotesQR.ajax.php",
        method:"POST",
        data: { "codigo" : data[0], 
                "lote" : data[1], 
                "almacen" : data[3], 
                "fecha" : data[9], 
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json"
        },
        success:function(respuesta){
          var resp = jQuery.parseJSON(respuesta);
          console.log("resp", resp);
          $("#visualCodigo").val(resp["codigo"]);
          $("#visualLote").val(resp["lote"]);
          $("#visualDescripcion").val(resp["descripcion"]);
          $("#visualAlmacen").val(resp["almacen"]);
          $("#visualCategoria").val(resp["categoria"]);
          $("#visualPresentacion").val(resp["presentacion"]);
          $("#visualUmbral").val(resp["umbral"]);
          $("#visualTipo").val(resp["tipo"]);
          var qrcodeContainer = $("#qrcode2");
          new QRCode(qrcodeContainer[0],resp["codigo"]+';'+resp["descripcion"]+';'+resp["lote"]+';'+resp["almacen"]+';'+resp["fecha_lote"]);
          $(".visualizarProductos").modal("show");

        }
      });
  }
});
