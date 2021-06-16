$(document).ready(function() {
    let funcion="listar";
    

    /**funcion de datatables */
    ('#tabla_venta').DataTable( {
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
            { "data": "vendedor" }
        ]
    } );
})