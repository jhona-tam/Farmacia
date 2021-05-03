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
                    <tr labId="${laboratorio.id}" labNombre="${laboratorio.nombre}" labAvatar="${laboratorio.avatar}">>
                        <td>${laboratorio.nombre}</td>
                        <td>
                            <img src="${laboratorio.avatar}" class="img-fluid rounded" width="70" heigth="70">
                        </td>
                        <td>
                            <button class="avatar btn btn-info" title="Cambiar logo de laboratorio" type="button" data-toggle="modal" data-target="#cambiarlogo">
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
    /** funcion de buscar laboratorio */
    $(document).on('keyup','#buscar-laboratorio',function(){
        let valor = $(this).val();
        if(valor!=''){
            buscar_lab(valor);
        }
        else{
            buscar_lab();
        }
    });
    /** funcion cambiar logo de laboratorio */
    $(document).on('click','.avatar',(e)=>{
        funcion="cambiar_logo";
        const elemento = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(elemento).attr('labId');
        const nombre = $(elemento).attr('labNombre');
        const avatar = $(elemento).attr('labAvatar');
        $('#logoactual').attr('src',avatar);
        $('#nombre_logo').html(nombre);
        $('#funcion').val(funcion);
        $('#id_logo_lab').val(id);
    })
    $('#form-logo').submit(e=>{
        let formData = new FormData($('#form-logo')[0]);
        $.ajax({
            url:'../controlador/LaboratorioController.php',
            type:'POST',
            data:formData,
            cache:false,
            processData: false,
            contentType:false
        }).done(function(response){
            const json = JSON.parse(response);
            if(json.alert=='edit'){
                $('#logoactual').attr('src',json.ruta)
                $('#form-logo').trigger('reset');
                $('#edit').hide('slow');
                $('#edit').show(1000);
                $('#edit').hide(2000);
                buscar_lab();
            }
            else{
                $('#noedit').hide('slow');
                $('#noedit').show(1000);
                $('#noedit').hide(2000);
                $('#form-logo').trigger('reset');
            }
        });
        e.preventDefault();
    })
});