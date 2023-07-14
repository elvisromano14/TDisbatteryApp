$(document).ready(function () {
  var table4 = $('#datatable2').DataTable();
  var table5 = $('#datatable3').DataTable();
  $('#datatable2 tbody').on('click', 'tr', function () {       
    if ($(this).hasClass('selected')) {
        $(this).removeClass('selected');
    }else {
      table4.$('tr.selected').removeClass('selected');
      $(this).addClass('selected');
      var data2 = table4.row(this).data();
      table5.row.add(['<tr><td><div class="btn-group"><button class="btn btn-danger btn-xs quitarProducto" idProducto="'+data2[0]+'"><i class="fa fa-trash" aria-hidden="true"></i></button></div</td>','<td class="nuevoLote"><input type="text" class="form-control nuevoLotePrd" name="nuevoLotePrd" value="'+data2[0]+'" readonly></td>','<td class="nuevoCodigo"><input type="text" class="form-control nuevoCodigoPrd" name="nuevoCodigoPrd" value="'+data2[1]+'" readonly></td>','<td class="nuevaDescripcion"><input type="text" class="form-control nuevaDescripcionPrd" name="nuevaDescripcionPrd" value="'+data2[2]+'" readonly></td>','<td class="nuevaUndMed"><select class="custom-select dataUndMed" name="dataUndMed" id="dataUndMed" required><option value="">Selecciona...</option><option value="Paleta">Paleta</option><option value="Caja">Caja</option><option value="Unidad">Unidad</option></select></td>','<td class="nuevaUnidades"><input type="number" class="form-control nuevoUnidadesPrd" name="nuevoUnidadesPrd" value="0" required></td>','<td class="nuevaCantidades"><input type="number" class="form-control nuevoCantidadPrd" name="nuevoCantidadPrd" value="0" required></td>','<td class="nuevoSobrantes"><input type="number" class="form-control nuevoSobrantePrd" name="nuevoSobrantePrd" value="0" required></td>','<td class="nuevoTotal"><input type="text" class="form-control nuevoTotalPrd" value="" name="nuevoTotalPrd" readonly></td>'+
        '</tr>']).draw().node();
    }
  });
});
$('#datatable2 tbody').on('click', 'tr', function () {  
  var table4 = $('#datatable2').DataTable();
  if ($(this).hasClass('selected')) {
      $(this).removeClass('selected');
  }else {
    table4.$('tr.selected').removeClass('selected');
    $(this).addClass('selected');
    var data2 = table4.row(this).data();
    $("#nuevoAlmacen").val(data2[0]);
    $("#nuevoLote").val(data2[1]);
    $("#nuevoCodigo").val(data2[2]);
    $("#nuevaDescripcion").val(data2[3]);
    $("#nuevaFecha2").val(data2[5]);
  }
});
$("#nuevaUnidad").change(function(){
  var unidades = $("#nuevaUnidad").val();
  var cantidades = $("#nuevoCantidad").val();
  var sobrantes = $("#nuevoSobrante").val();
  var multi = Number(unidades)*Number(cantidades);
  var suma = Number(sobrantes)+Number(multi);
  console.log("suma", suma);
  $("#nuevoTotal").val(suma);
});
$("#nuevoCantidad").change(function(){
  var unidades = $("#nuevaUnidad").val();
  var cantidades = $("#nuevoCantidad").val();
  var sobrantes = $("#nuevoSobrante").val();
  var multi = Number(unidades)*Number(cantidades);
  var suma = Number(sobrantes)+Number(multi);
  console.log("suma", suma);
  $("#nuevoTotal").val(suma);
});
$("#nuevoSobrante").change(function(){
  var unidades = $("#nuevaUnidad").val();
  var cantidades = $("#nuevoCantidad").val();
  var sobrantes = $("#nuevoSobrante").val();
  var multi = Number(unidades)*Number(cantidades);
  var suma = Number(sobrantes)+Number(multi);
  console.log("suma", suma);
  $("#nuevoTotal").val(suma);
});
$(document).on('click', '.quitarProducto', function() {
  var table = $('#datatable3').DataTable();
  var row = table.row($(this).closest('tr'));
  row.remove().draw();
});

$('#datatable3 tbody').on('click', 'tr', function () {
  var listaProductos = [];
  var table = $('#datatable3').DataTable();
  var row = table.row($(this).closest('tr'));
  var newRow = table.row(row).node();
  var lote = $(newRow).find('.nuevoLotePrd').val();
  var descripcion = $(newRow).find('.nuevaDescripcionPrd').val();
  var descripcion2 = $(".nuevaDescripcionPrd");
  var codigo = $(newRow).find('.nuevoCodigoPrd').val();
  var undmed = $(newRow).find('.dataUndMed').val();
  var unidades = $(newRow).find('.nuevoUnidadesPrd').val();
  var cantidades = $(newRow).find('.nuevoCantidadPrd').val();
  var sobrantes = $(newRow).find('.nuevoSobrantePrd').val();
  var calculo = Number(sobrantes) + (Number(unidades) * Number(cantidades));
  var total = $(newRow).find('.nuevoTotalPrd').val(calculo);
  for(var i = 0; i < descripcion2.length; i++){        
      listaProductos.push({"codigo":codigo,"lote":lote,"descripcion":descripcion,"undmed":undmed,"unidades":unidades,"cantidades":cantidades,"sobrantes":sobrantes,"total":calculo})
  }
  $("#listaProductos").val(JSON.stringify(listaProductos)); 
});
$(document).on('click', '.bbb', function() {
    let scanner = new Instascan.Scanner({ video: document.getElementById('qrScanner') });
    scanner.addListener('scan', function(content) {
    $.ajax({
    url:"ajax/productos.ajax.php",
    method:"POST",
    data: { "referencia" : content,  
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json"
    },
    success:function(respuesta){
        var resp = jQuery.parseJSON(respuesta); 
        var table3 = $('#datatable3').DataTable();
        $("#jsGrid-table").append(
        '<tr>'+
          '<td><div class="btn-group"><button class="btn btn-danger btn-xs quitarProducto" idProducto="'+data2[0]+'"><i class="fa fa-trash" aria-hidden="true"></i></button></div</td>'+
          '<td class="nuevoLote" lotePrd="'+resp["lote"]+'">'+resp["lote"]+'</td>'+
          '<td class="nuevoCodigo" codigoPrd="'+resp["codigo"]+'">'+resp["codigo"]+'</td>'+
          '<td class="nuevaDescripcion" descPrd="'+resp["descripcion"]+'">'+resp["descripcion"]+'</td>'+
          '<td class="nuevaUndMed"><select class="custom-select dataUndMed" name="dataUndMed" id="dataUndMed" required>'+
            '<option value="">Selecciona...</option>'+
            '<option value="Paleta">Paleta</option>'+
            '<option value="Caja">Caja</option>'+
            '<option value="Unidad">Unidad</option>'+
          '</select></td>'+
          '<td class="nuevaUnidades"><input type="number" class="form-control nuevoUnidadesPrd" name="nuevoUnidadesPrd" value="0" required></td>'+
          '<td class="nuevaCantidades"><input type="number" class="form-control nuevoCantidadPrd" name="nuevoCantidadPrd" value="0" required></td>'+
          '<td class="nuevoSobrantes"><input type="number" class="form-control nuevoSobrantePrd" name="nuevoSobrantePrd" value="0" required></td>'+
          '<td class="nuevoTotal"><input type="text" class="form-control nuevoTotalPrd" value="" name="nuevoTotalPrd" readonly></td>'+
        '</tr>')
      listarProductos()
        table3.row.add(['<tr><td><button class="btn btn-danger btn-xs quitarProducto"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>',resp["lote"],resp["codigo"],resp["descripcion"],'<tr><td><input type="number" value="'+resp["cantidad"]+'" name="dataCantidad" id="dataCantidad"></td></tr>']);
            table3.draw()
        $('.qrcodeProductos').modal('toggle');

    }
  })
    });
    Instascan.Camera.getCameras().then(function(cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
        } else {
            console.error('No cameras found.');
        }
    }).catch(function(e) {
        console.error(e);
    });
});
function anexarProducto(){
  var table5 = $('#datatable3').DataTable();
  var table4 = $('#datatable2').DataTable();
  var almacen = $("#nuevoAlmacen").val();
  var lote = $("#nuevoLote").val();
  var codigo = $("#nuevoCodigo").val();
  var descripcion = $("#nuevaDescripcion").val();
  var undmed = $("#nuevaUndMed").val();
  var unidades = $("#nuevaUnidad").val();
  var cantidades = $("#nuevoCantidad").val();
  var sobrantes = $("#nuevoSobrante").val();
  var total = $("#nuevoTotal").val();
  var fecha = $("#nuevaFecha2").val();
  table5.row.add(['<tr><td><div class="btn-group"><button class="btn btn-danger btn-xs quitarProducto"><i class="fa fa-trash" aria-hidden="true"></i></button></div</td>',almacen,lote,codigo,descripcion,undmed,unidades,cantidades,sobrantes,total,fecha]).draw().node();
  table4.$('tr.selected').removeClass('selected');
  const myDiv = $('.modalPrd');
  myDiv.find('input').val('');
}