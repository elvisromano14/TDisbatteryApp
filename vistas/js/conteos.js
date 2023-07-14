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
  $("#nuevoTotal").val(suma);
});
$("#nuevoCantidad").change(function(){
  var unidades = $("#nuevaUnidad").val();
  var cantidades = $("#nuevoCantidad").val();
  var sobrantes = $("#nuevoSobrante").val();
  var multi = Number(unidades)*Number(cantidades);
  var suma = Number(sobrantes)+Number(multi);
  $("#nuevoTotal").val(suma);
});
$("#nuevoSobrante").change(function(){
  var unidades = $("#nuevaUnidad").val();
  var cantidades = $("#nuevoCantidad").val();
  var sobrantes = $("#nuevoSobrante").val();
  var multi = Number(unidades)*Number(cantidades);
  var suma = Number(sobrantes)+Number(multi);
  $("#nuevoTotal").val(suma);
});
$("#nuevaUnidadQR").change(function(){
  var unidades = $("#nuevaUnidadQR").val();
  var cantidades = $("#nuevoCantidadQR").val();
  var sobrantes = $("#nuevoSobranteQR").val();
  var multi = Number(unidades)*Number(cantidades);
  var suma = Number(sobrantes)+Number(multi);
  $("#nuevoTotalQR").val(suma);
});
$("#nuevoCantidadQR").change(function(){
  var unidades = $("#nuevaUnidadQR").val();
  var cantidades = $("#nuevoCantidadQR").val();
  var sobrantes = $("#nuevoSobranteQR").val();
  var multi = Number(unidades)*Number(cantidades);
  var suma = Number(sobrantes)+Number(multi);
  $("#nuevoTotalQR").val(suma);
});
$("#nuevoSobranteQR").change(function(){
  var unidades = $("#nuevaUnidadQR").val();
  var cantidades = $("#nuevoCantidadQR").val();
  var sobrantes = $("#nuevoSobranteQR").val();
  var multi = Number(unidades)*Number(cantidades);
  var suma = Number(sobrantes)+Number(multi);
  $("#nuevoTotalQR").val(suma);
});
$(document).on('click', '.quitarProducto', function() {
  var table = $('#datatable3').DataTable();
  var row = table.row($(this).closest('tr'));
  row.remove().draw();
});
$(document).on('click', '.bbb', function() {
    let scanner = new Instascan.Scanner({ video: document.getElementById('qrScanner') });
    scanner.addListener('scan', function(content) {
      let text = content;
      const myArray = text.split(";");   
      console.log("myArray", myArray);
      $("#nuevoAlmacenQR").val(myArray[3]);
      $("#nuevoLoteQR").val(myArray[2]);
      $("#nuevoCodigoQR").val(myArray[0]);
      $("#nuevaDescripcionQR").val(myArray[1]);
      $("#nuevaFechaQR").val(myArray[4]);
      $(".qrcodeProductos").modal("hide");
      $(".agregarProductosQR").modal("show");
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
  $(".agregarProductos").modal("hide");2
}
function anexarProductoQR(){
  var table5 = $('#datatable3').DataTable();
  var almacen = $("#nuevoAlmacenQR").val();
  var lote = $("#nuevoLoteQR").val();
  var codigo = $("#nuevoCodigoQR").val();
  var descripcion = $("#nuevaDescripcionQR").val();
  var undmed = $("#nuevaUndMedQR").val();
  var unidades = $("#nuevaUnidadQR").val();
  var cantidades = $("#nuevoCantidadQR").val();
  var sobrantes = $("#nuevoSobranteQR").val();
  var total = $("#nuevoTotalQR").val();
  var fecha = $("#nuevaFechaQR").val();
  table5.row.add(['<tr><td><div class="btn-group"><button class="btn btn-danger btn-xs quitarProducto"><i class="fa fa-trash" aria-hidden="true"></i></button></div</td>',almacen,lote,codigo,descripcion,undmed,unidades,cantidades,sobrantes,total,fecha]).draw().node();
  const myDiv = $('.modalPrdQR');
  myDiv.find('input').val('');
  $(".agregarProductosQR").modal("hide");
}
function guardarConteo(){
  let table = $('#datatable3').DataTable();
  let fecha = $('#nuevaFecha').val();
  let id = $('#nuevoConteo').val();
  let rowData = [];
  table.rows().every(function () {
      let data = this.data();
      rowData.push(data);
  });
  $.ajax({
    url:"ajax/conteo.ajax.php",
    method:"POST",
    data: { "listaProductos" : rowData, "fecha" : fecha, "id" : id},
    cache: false,
    dataType: "json",
    complete:function(){
      swal({
      icon: 'success',
      title: 'Conteo creado con exito',
      }).then(function(result) {
        if (result.value) {
          window.location = "conteos";
        }
      })
    }
  })
}