$(document).ready(function() {
    let funcion="listar";
    

    /**funcion de datatables **/
    let datatable = $('#tabla_venta').DataTable( {
        "ajax":{
            "url": "../controlador/VentaController.php",
            "method": "POST",
            "data":{funcion:funcion}
        },
        "columns": [
            { "data": "id_venta" },
            { "data": "fecha" },
            { "data": "cliente" },
            { "data": "dni" },
            { "data": "total" },
            { "data": "vendedor" },
            { "defaultContent": `<button class="btn btn-secondary" title="Imprimir"><i class="fas fa-print"></i></button>
                                <button class="ver btn btn-success" type="button" data-toggle="modal" data-target="#vista_venta" title="Ver"><i class="fas fa-search"></i></button>
                                <button class="btn btn-danger" title="Eliminar"><i class="fas fa-trash"></i></button`, }
        ],
        "language": espanol
    } );
    $('#tabla_venta tbody').on('click','.ver',function(){
        let datos = datatable.row($(this).parents()).data();
        let id = datos.id_venta;
        funcion="ver"
        $('#codigo_venta').html(datos.id_venta);
        $('#fecha').html(datos.fecha);
        $('#cliente').html(datos.cliente);
        $('#dni').html(datos.dni);
        $('#vendedor').html(datos.vendedor);
        $('#total').html(datos.total);
        $.post('../controlador/VentaProductoController.php',{funcion,id},(response)=>{
            let registros = JSON.parse(response);
            let template="";
            $('#registros').html(template);
            registros.forEach(registro => {
                template+=`
                    <tr>
                        <td>${registro.cantidad}</td>
                        <td>${registro.precio}</td>
                        <td>${registro.producto}</td>
                        <td>${registro.concentracion}</td>
                        <td>${registro.adicional}</td>
                        <td>${registro.laboratorio}</td>
                        <td>${registro.presentacion}</td>
                        <td>${registro.tipo}</td>
                        <td>${registro.subtotal}</td>
                    </tr>
                `;
                $('#registros').html(template);
            });
        })
    })
})
/**español datatable */
let espanol = {
    "processing": "Procesando...",
    "lengthMenu": "Mostrar _MENU_ registros",
    "zeroRecords": "No se encontraron resultados",
    "emptyTable": "Ningún dato disponible en esta tabla",
    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
    "search": "Buscar:",
    "infoThousands": ",",
    "loadingRecords": "Cargando...",
    "paginate": {
        "first": "Primero",
        "last": "Último",
        "next": "Siguiente",
        "previous": "Anterior"
    },
    "aria": {
        "sortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sortDescending": ": Activar para ordenar la columna de manera descendente"
    },
    "buttons": {
        "copy": "Copiar",
        "colvis": "Visibilidad",
        "collection": "Colección",
        "colvisRestore": "Restaurar visibilidad",
        "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
        "copySuccess": {
            "1": "Copiada 1 fila al portapapeles",
            "_": "Copiadas %d fila al portapapeles"
        },
        "copyTitle": "Copiar al portapapeles",
        "csv": "CSV",
        "excel": "Excel",
        "pageLength": {
            "-1": "Mostrar todas las filas",
            "1": "Mostrar 1 fila",
            "_": "Mostrar %d filas"
        },
        "pdf": "PDF",
        "print": "Imprimir"
    }
};