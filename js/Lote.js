$(document).ready(function(){
    var funcion;
    buscar_lote();
    /**funcion para buscar lote*/
    function buscar_lote(consulta){
        funcion="buscar";
        $.post('../controlador/LoteController.php',{consulta,funcion},(response)=>{
            const lotes = JSON.parse(response);
            let template='';
            lotes.forEach(lote => {
                template+=`
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                    <i class="fas fa-lg fa-cubes mr-1"></i>${lote.stock}
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>${lote.nombre}</b></h2>                                  
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-mortar-pestle"></i></span> Concentracion: ${lote.concentracion}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-prescription-bottle-alt"></i></span> Adicional: ${lote.adicional}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-flask"></i></span> Laboratorio: ${lote.laboratorio}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-copyright"></i></span> Tipo: ${lote.tipo}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-tablets"></i></span> Presentacion: ${lote.presentacion}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-calendar-times"></i></span> Vencimiento: ${lote.vencimiento}</li>                
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-truck"></i></span> Proveedor: ${lote.proveedor}</li>                
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="${lote.avatar}" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <button class="avatar btn btn-sm bg-teal" type="button" data-toggle="modal" data-target="#cambiologo" title="Cambiar imagen de lote">
                      <i class="fas fa-image"></i>
                    </button>
                    <button class="editar btn btn-sm btn-success" type="button" data-toggle="modal" data-target="#crearlote" title="Editar detalles de lote">
                      <i class="fas fa-edit"></i>
                    </button>
                    <button class="lote btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#crearlote">
                      <i class="fas fa-plus-circle"></i>
                    </button>
                    <button class="borrar btn btn-sm btn-danger" title="Borrar lote">
                      <i class="fas fa-trash"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
                `;
            });
            $('#lotes').html(template);
        });
    }
    /**funcion para buscar prodcuto con filtro FormData */
    $(document).on('keyup','#buscar-lote',function(){
        let valor = $(this).val();
        if(valor!=""){
            buscar_lote(valor); 
        }
        else{
            buscar_lote();
        }
    });
})