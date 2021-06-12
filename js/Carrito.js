$(document).ready(function(){
Contar_productos();
RecuperarLS_carrito();

	/**funcion agregar carrito */
    $(document).on('click','.agregar-carrito',(e)=>{
        const elemento = $(this)[0].activeElement.parentElement.parentElement.parentElement.parentElement;
        const id = $(elemento).attr('prodId');
        const nombre=$(elemento).attr('prodNombre');
        const concentracion=$(elemento).attr('prodConcentracion');
        const adicional=$(elemento).attr('prodAdicional');
        const precio=$(elemento).attr('prodPrecio');
        const laboratorio=$(elemento).attr('prodLaboratorio');
        const tipo=$(elemento).attr('prodTipo');
        const presentacion=$(elemento).attr('prodPresentacion');
        const avatar=$(elemento).attr('prodAvatar');

        const producto={
            id: id,
            nombre: nombre,
            concentracion: concentracion,
            adicional: adicional,
            precio: precio,
            laboratorio: laboratorio,
            tipo: tipo,
            presentacion: presentacion,
            avatar: avatar,
            cantidad:1
        }
				let id_producto;
				let productos;
				productos = RecuperarLS();
				productos.forEach(prod => {
					if(prod.id===producto.id){
						id_producto=prod.id;
					}
				});
				if(id_producto === producto.id){
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'El producto se repite!',
					})
				}
				else{
					template=`
					<tr prodId="${producto.id}">
							<td>${producto.id}</td>
							<td>${producto.nombre}</td>
							<td>${producto.concentracion}</td>
							<td>${producto.adicional}</td>
							<td>${producto.precio}</td>
							<td><button class="borrar-producto btn btn-danger"><i class="fas fa-times-circle"></i></button></td>
					</tr>
			`;
			$('#lista').append(template);
			AgregarLS(producto);
			let contador;			
			Contar_productos();			
			}        
    })
		/**borrar prodcuto de carrito */
    $(document).on('click','.borrar-producto',(e)=>{
        const elemento = $(this)[0].activeElement.parentElement.parentElement;
				const id = $(elemento).attr('prodId');
        elemento.remove();
		Eliminar_producto_LS(id);
		Contar_productos();
    })
		/**vaciar carrito */
    $(document).on('click','#vaciar-carrito',(e)=>{
        $('#lista').empty();
		EliminarLS();
		Contar_productos();		
    })
		/**funcion de recuperar con local storage los productos cuando actualizamos */
		function RecuperarLS() {
			let productos;
			if (localStorage.getItem('productos')===null){
				productos=[];
			}
			else{
				productos= JSON.parse(localStorage.getItem('productos'))
			}
			return productos
		}
		/**funcion de agregar con local storage productos */
		function AgregarLS(producto){
			let productos;
			productos = RecuperarLS();
			productos.push(producto);
			localStorage.setItem('productos',JSON.stringify(productos))
		}
		/**funcion de recuperar carrito con local storage */
		function RecuperarLS_carrito(){
			let productos;
			productos = RecuperarLS();
			productos.forEach(producto => {
				template=`
            <tr prodId="${producto.id}">
                <td>${producto.id}</td>
                <td>${producto.nombre}</td>
                <td>${producto.concentracion}</td>
                <td>${producto.adicional}</td>
                <td>${producto.precio}</td>
                <td><button class="borrar-producto btn btn-danger"><i class="fas fa-times-circle"></i></button></td>
            </tr>
        `;
        $('#lista').append(template);
			});
		}
		/**eliminar productos de local storage con el boton */
		function Eliminar_producto_LS(id){
			let productos;
			productos = RecuperarLS();
			productos.forEach(function(producto,indice) {
				if (producto.id===id){
					productos.splice(indice,1);
				}
			});
			localStorage.setItem('productos',JSON.stringify(productos));
		}
		/**elimanar local storage */
		function EliminarLS(){
			localStorage.clear();
		}
		/**funcion para el contador de productos en el carrito */
		function Contar_productos(){
			let producto;
			let contador=0;
			productos=RecuperarLS();
			productos.forEach(producto => {
				contador++;
			});
			$('#contador').html(contador);
		}
})