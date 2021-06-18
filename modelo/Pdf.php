<?php
include_once 'Venta.php';
include_once 'VentaProducto.php';
function getHtml($id_venta){
    $venta=new Venta();
    $venta_producto=new VentaProducto();
    $venta->buscar_id($id_venta);
    $venta_producto->ver($id_venta);
    //html de comprobante
    $plantilla='
    <body>
    <header class="clearfix">
      <h1>COMPROBANTE DE PAGO</h1>
      <div id="company" class="clearfix">
        <div id="negocio">Lia adriana</div>
        <div>Direccion Numero ###,<br /> Ciudad, Provincia</div>
        <div>(344) 342234</div>
        <div><a href="mailto:company@example.com">liaadriana@gmail.com</a></div>
      </div>';
      foreach ($venta->objetos as $objeto) {
    
      $plantilla.='
    
      <div id="project">
        <div><span>Codigo de Venta: </span>'.$objeto->id_venta.'</div>
        <div><span>Cliente: </span>'.$objeto->cliente.'</div>
        <div><span>DNI: </span>'.$objeto->dni.'</div>
        <div><span>Fecha y Hora: </span>'.$objeto->fecha.'</div>
        <div><span>Vendedor: </span>'.$objeto->vendedor.'</div>
      </div>';
      }
    $plantilla.='
        </header>
        <main>
        <table>
            <thead>
            <tr>            
                <th class="service">Producto</th>
                <th class="service">Concentracion</th>
                <th class="service">Adicional</th>
                <th class="service">Laboratorio</th>
                <th class="service">Presentacion</th>
                <th class="service">Tipo</th>
                <th class="service">Cantidad</th>
                <th class="service">Precio</th>
                <th class="service">Subtotal</th>
            </tr>
            </thead>
            <tbody>';
            foreach ($venta_producto->objetos as $objeto) {
            
            $plantilla.='<tr>
                
                <td class="servic">'.$objeto->producto.'</td>
                <td class="servic">'.$objeto->concentracion.'</td>
                <td class="servic">'.$objeto->adicional.'</td>
                <td class="servic">'.$objeto->laboratorio.'</td>
                <td class="servic">'.$objeto->presentacion.'</td>
                <td class="servic">'.$objeto->tipo.'</td>
                <td class="servic">'.$objeto->cantidad.'</td>
                <td class="servic">'.$objeto->precio.'</td>
                <td class="servic">'.$objeto->subtotal.'</td>
            </tr>';
            }
            $calculos= new Venta();
            $calculos->buscar_id($id_venta);
            foreach ($calculos->objetos as $objeto) {
            $igv=$objeto->total*0.18;
            $sub=$objeto->total-$igv;
            
            $plantilla.='
            <tr>
                <td colspan="8" class="grand total">SUBTOTAL</td>
                <td class="grand total">S/.'.$sub.'</td>
            </tr>
            <tr>
                <td colspan="8" class="grand total">IGV(18%)</td>
                <td class="grand total">S/.'.$igv.'</td>
            </tr>
            <tr>
                <td colspan="8" class="grand total">TOTAL</td>
                <td class="grand total">S/.'.$objeto->total.'</td>
            </tr>';

            }
        $plantilla.='
            </tbody>
        </table>
        <div id="notices">
            <div>NOTICE:</div>
            <div class="notice">*Presentar este comprobante de pago para cualquier reclamo o devolucion.</div>
            <div class="notice">*El reclamo procedera dentro de las 24 horas de haber hecho la compra.</div>
            <div class="notice">*Si el producto esta daÃ±ado o abierto, la devolucion no procedera.</div>
            <div class="notice">*Revise su cambio antes de salir del establecimiento.</div>
        </div>
        </main>
        <footer>
        farmacia lia adriana - cusco -santiago
        </footer>
    </body>';
    return $plantilla;
}
?>