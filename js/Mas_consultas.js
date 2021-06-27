$(document).ready(function() {
    let funcion;
    venta_mes();
    vendedor_mes();
		ventas_anual();
		/** funcion de ventas anual**/
		async function ventas_anual() {
			funcion ='ventas_anual';
        let lista=['','','','','','','','','','','',''];
            const response = await fetch('../controlador/VentaController.php',{
            method:'POST',
            headers:{'Content-Type':'application/x-www-form-urlencoded'},
            body:'funcion='+funcion
        }).then(function(response) {
            return response.json();
        }).then(function(meses) {
						meses.forEach(mes => {
							if (mes.mes==1) {
									lista[0]=mes;
							}
							if (mes.mes==2) {
									lista[1]=mes;
							}
							if (mes.mes==3) {
									lista[2]=mes;
							}
							if (mes.mes==4) {
									lista[3]=mes;
							}
							if (mes.mes==5) {
									lista[4]=mes;
							}
							if (mes.mes==6) {
									lista[5]=mes;
							}
							if (mes.mes==7) {
									lista[6]=mes;
							}
							if (mes.mes==8) {
									lista[7]=mes;
							}
							if (mes.mes==9) {
									lista[8]=mes;
							}
							if (mes.mes==10) {
									lista[9]=mes;
							}
							if (mes.mes==11) {
									lista[10]=mes;
							}
							if (mes.mes==12) {
									lista[11]=mes;
							}
					});
       })
			 funcion ='venta_mes';
        let lista1=['','','','','','','','','','','',''];
            const response1 = await fetch('../controlador/VentaController.php',{
            method:'POST',
            headers:{'Content-Type':'application/x-www-form-urlencoded'},
            body:'funcion='+funcion
        }).then(function(response1) {
            return response1.json();
        }).then(function(meses) {
						meses.forEach(mes => {
							if (mes.mes==1) {
									lista1[0]=mes;
							}
							if (mes.mes==2) {
									lista1[1]=mes;
							}
							if (mes.mes==3) {
									lista1[2]=mes;
							}
							if (mes.mes==4) {
									lista1[3]=mes;
							}
							if (mes.mes==5) {
									lista1[4]=mes;
							}
							if (mes.mes==6) {
									lista1[5]=mes;
							}
							if (mes.mes==7) {
									lista1[6]=mes;
							}
							if (mes.mes==8) {
									lista1[7]=mes;
							}
							if (mes.mes==9) {
									lista1[8]=mes;
							}
							if (mes.mes==10) {
									lista1[9]=mes;
							}
							if (mes.mes==11) {
									lista1[10]=mes;
							}
							if (mes.mes==12) {
									lista1[11]=mes;
							}
					});
       })
			 let CanvasG3=$('#Grafico3').get(0).getContext('2d');
			 let datos={
					 labels:[
							 'Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'
					 ],
					 datasets:[
							 {
									 label               : 'Año Actual',
									 backgroundColor     : 'rgb(198, 71, 86)',
									 borderColor         : 'rgb(198, 71, 86)',
									 pointRadius         : false,
									 pointColor          : "#96BB7C",
									 pointStrokeColor    : 'rgb(198, 71, 86)',
									 pointHighlightFill  : '#fff',
									 pointHighlightStroke: 'rgb(198, 71, 86)',
									 data                : [lista1[0].cantidad,lista1[1].cantidad,lista1[2].cantidad,lista1[3].cantidad,lista1[4].cantidad,lista1[5].cantidad,lista1[6].cantidad,lista1[7].cantidad,lista1[8].cantidad,lista1[9].cantidad,lista1[10].cantidad,lista1[11].cantidad,]
							 },
							 {
									 label               : 'Año anterior',
									 backgroundColor     : 'rgb(30, 111, 92)',
									 borderColor         : 'rgb(30, 111, 92)',
									 pointRadius         : false,
									 pointColor          : "#E6DD3B",
									 pointStrokeColor    : 'rgb(30, 111, 92)',
									 pointHighlightFill  : '#fff',
									 pointHighlightStroke: 'rgb(30, 111, 92)',
									 data                : [lista[0].cantidad,lista[1].cantidad,lista[2].cantidad,lista[3].cantidad,lista[4].cantidad,lista[5].cantidad,lista[6].cantidad,lista[7].cantidad,lista[8].cantidad,lista[9].cantidad,lista[10].cantidad,lista[11].cantidad,]
							 },
					 ]
			 }
			 let opciones={
					 responsive:true,
					 maintainAspectRatio:false,
					 datasetFill:false,
			 }
			 let G3 = new Chart(CanvasG3,{
					 type:'bar',
					 data:datos,
					 options:opciones

			 })   
		}
    /**funcion de el vendedor de mes */
    async function vendedor_mes() {
        funcion ='vendedor_mes';
        let lista=['','',''];
            const response = await fetch('../controlador/VentaController.php',{
            method:'POST',
            headers:{'Content-Type':'application/x-www-form-urlencoded'},
            body:'funcion='+funcion
        }).then(function(response) {
            return response.json();
        }).then(function(vendedores) {
            let i=0
            vendedores.forEach(vendedor => {
               lista[i]=vendedor;
               i++;
            });
        }) 
        let CanvasG2=$('#Grafico2').get(0).getContext('2d');
        let datos={
            labels:[
                'Mes actual'
            ],
            datasets:[
                {
                    label               : lista[0].vendedor_nombre,
                    backgroundColor     : 'rgba(255, 193, 7)',
                    borderColor         : 'rgba(255, 193, 7)',
                    pointRadius         : false,
                    pointColor          : "#3b8bba",
                    pointStrokeColor    : 'rgba(252, 220, 116)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(252, 220, 116)',
                    data                : [lista[0].cantidad]
                },
                {
                    label               : lista[1].vendedor_nombre,
                    backgroundColor     : 'rgba(121, 82, 179)',
                    borderColor         : 'rgba(121, 82, 179)',
                    pointRadius         : false,
                    pointColor          : "#3b8bba",
                    pointStrokeColor    : 'rgba(88, 61, 114)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(88, 61, 114)',
                    data                : [lista[1].cantidad]
                },
                {
                    label               : lista[2].vendedor_nombre,
                    backgroundColor     : 'rgba(52, 58, 64)',
                    borderColor         : 'rgba(52, 58, 64))',
                    pointRadius         : false,
                    pointColor          : "#3b8bba",
                    pointStrokeColor    : 'rgba(67, 53, 32)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(67, 53, 32)',
                    data                : [lista[2].cantidad]
                },
            ]
        }
        let opciones={
            responsive:true,
            maintainAspectRatio:false,
            datasetFill:false,
        }
        let G2 = new Chart(CanvasG2,{
            type:'bar',
            data:datos,
            options:opciones

        })       
    }
    /** funcion de venta de mes **/
    async function venta_mes() {
        funcion='venta_mes';
        let array=['','','','','','','','','','','',''];
        const response = await fetch('../controlador/VentaController.php',{
            method:'POST',
		    headers:{'Content-Type':'application/x-www-form-urlencoded'},
			body:'funcion='+funcion
        }).then(function(response) {
            return response.json();
        }).then(function(meses) {
            meses.forEach(mes => {
                if (mes.mes==1) {
                    array[0]=mes;
                }
                if (mes.mes==2) {
                    array[1]=mes;
                }
                if (mes.mes==3) {
                    array[2]=mes;
                }
                if (mes.mes==4) {
                    array[3]=mes;
                }
                if (mes.mes==5) {
                    array[4]=mes;
                }
                if (mes.mes==6) {
                    array[5]=mes;
                }
                if (mes.mes==7) {
                    array[6]=mes;
                }
                if (mes.mes==8) {
                    array[7]=mes;
                }
                if (mes.mes==9) {
                    array[8]=mes;
                }
                if (mes.mes==10) {
                    array[9]=mes;
                }
                if (mes.mes==11) {
                    array[10]=mes;
                }
                if (mes.mes==12) {
                    array[11]=mes;
                }
            });
        })
        let CanvasG1=$('#Grafico1').get(0).getContext('2d');
        let datos={
            labels:[
                'Enero',
                'Febrero',
                'Marzo',
                'Abril',
                'Mayo',
                'Junio',
                'Julio',
                'Agosto',
                'Septiembre',
                'Octubre',
                'Nomviembre',
                'Diciembre',
            ],
            datasets:[{
                data:[
                    array[0].cantidad,
                    array[1].cantidad,
                    array[2].cantidad,
                    array[3].cantidad,
                    array[4].cantidad,
                    array[5].cantidad,
                    array[6].cantidad,
                    array[7].cantidad,
                    array[8].cantidad,
                    array[9].cantidad,
                    array[10].cantidad,
                    array[11].cantidad,
                ],
                backgroundColor:[
                    '#FF0000',
                    '#0CFF00',
                    '#001BFF',
                    '#FF00F0',
                    '#F7FF00',
                    '#00FFE8',
                    '#A200FF',
                    '#FF8F00',
                    '#9BFF00',
                    '#000000',
                    '#009EFF',
                    '#108504',                    
                ]
            }]
        }
        let opciones={
            maintainAspectRatio:false,
            responsive:true,
        }
        let G1 = new Chart(CanvasG1,{
            type:'pie',
            data:datos,
            options:opciones
        })
    }
})