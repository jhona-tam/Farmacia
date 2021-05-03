$(document).ready(function(){
    buscar_lab();
    var funcion;
    /**funcion de crear laboratorio */
    $('#form-crear-laboratorio').submit(e=>{
        let nombre_laboratorio = $('#nombre-laboratorio').val();
        funcion='crear';
        $.post('../controlador/LaboratorioController.php',{nombre_laboratorio,funcion},(response)=>{
            if(response=='add'){
                $('#add-laboratorio').hide('slow');
                $('#add-laboratorio').show(1000);
                $('#add-laboratorio').hide(2000);
                $('#form-crear-laboratorio').trigger('reset');
                buscar_lab();
            }
            else{
                $('#noadd-laboratorio').hide('slow');
                $('#noadd-laboratorio').show(1000);
                $('#noadd-laboratorio').hide(2000);
                $('#form-crear-laboratorio').trigger('reset');
            }
        })
        e.preventDefault();
    });
    /**funcion buscar laboratorio */
    function buscar_lab(consulta){
        funcion='buscar';
        $.post('../controlador/LaboratorioController.php',{consulta,funcion},(response)=>{
            const laboratorios = JSON.parse(response);
            let template='';
            laboratorios.forEach(laboratorio => {
                template+=`
                    <tr labId="${laboratorio.id}">
                        <td>${laboratorio.nombre}</td>
                        <td>
                            <img src="${laboratorio.avatar}" class="img-fluid rounded" width="70" heigth="70">
                        </td>
                        <td>
                            <button class="avatar btn btn-info" title="Cambiar logo de laboratorio">
                                <i class="far fa-image"></i>
                            </button>
                            <button class="editar btn btn-success" title="Editar nombre de laboratorio">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="borrar btn btn-danger" title="Borrar laboratorio">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                `;   
            });
            $('#laboratorios').html(template);
        })
    }
    $(document).on('keyup','#buscar-laboratorio',function(){
        let valor = $(this).val();
        if(valor!=''){
            buscar_lab(valor);
        }
        else{
            buscar_lab();
        }
    });
});