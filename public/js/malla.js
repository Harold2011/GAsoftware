
contenido=document.getElementById("contenido");

let opcionArea
let opcionGrado

function getUnidadDidactica() {
    area=parseInt(document.getElementById("area").value);
    grado=parseInt(document.getElementById("grado").value);            
    if(area!=0 && grado!=0){
        if(opcionArea!==area || opcionGrado!==grado){
            $.ajax({
                url:"/conseguirUnidad",
                method:"GET",
                headers:{
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data:{
                    grado,
                    area,
                },
                success:function(response)
                {
                    const div = document.createElement("div");
                    const divUnidad=document.getElementById("unidadDiv")
                    if(divUnidad){
                        contenido.removeChild(divUnidad);  
                    }
                    div.id="unidadDiv";
                    div.innerHTML=
                    `
                        <select onclick="getElementosMalla(0)" class="block w-full px-4 py-2 border rounded-md mb-3.5" name="" id="unidad">
                            <option value=0>Selecciona una unidad didactica</option>
                            ${response.map((item)=>(
                                `<option value=${item.id}>${item.name}</option>`
                            ))}
                        </select>
                    `       
                    contenido.appendChild(div);       
                }
            })  
        }   
        opcionArea=area           
        opcionGrado=grado           
    }
}

let opcionUnidad
let opcionComponente
let opcionEstandar
let opcionCompetencia
let opcionDesempeño

const arrayFuncionMalla=[
    {
        elementoAnterior: "unidad",
        url: "/conseguirComponente",
        siguiente:1,
        elementoActual:"componente",
        opcionSeleccionada:opcionUnidad,
    },
    {
        elementoAnterior: "componente",
        url: "/conseguirEstandar",
        siguiente:2,
        elementoActual:"estandar",
        opcionSeleccionada:opcionComponente,
    },
    {
        elementoAnterior: "estandar",
        url: "/conseguirCompetencia",
        siguiente:3,
        elementoActual:"competencia",
        opcionSeleccionada:opcionEstandar,
    },
    {
        elementoAnterior: "competencia",
        url: "/conseguirDesempeño",
        siguiente:4,
        elementoActual:"desempeño",
        opcionSeleccionada:opcionCompetencia,
    },
    {
        elementoAnterior: "desempeño",
        url: "/conseguirIndicadorDesempeño",
        siguiente:5,
        elementoActual:"indicadorDesempeño",
        opcionSeleccionada:opcionDesempeño,
    },
]

function getElementosMalla(indice){
    elemento=parseInt(document.getElementById(`${arrayFuncionMalla[indice].elementoAnterior}`).value);
    if(elemento!==0){
        if(arrayFuncionMalla[indice].opcionSeleccionada!==null && arrayFuncionMalla[indice].opcionSeleccionada!==elemento){
                $.ajax({
                    url:arrayFuncionMalla[indice].url,
                    method:"GET",
                    headers:{
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data:{
                        elemento,
                    },
                    success:function(response)
                    {
                        const divAnterior=document.getElementById(arrayFuncionMalla[indice].elementoAnterior+"Div");
                        const div = document.createElement("div");
                        div.id=arrayFuncionMalla[indice].elementoActual+"Div";
                        div.innerHTML=
                        `
                            <select class="block w-full px-4 py-2 border rounded-md mb-3.5"
                            ${indice!==4 
                                ?
                                `
                                onclick="getElementosMalla(${arrayFuncionMalla[indice].siguiente})" 
                                `
                                :
                                ''
                            }
                            name="" id=${arrayFuncionMalla[indice].elementoActual}>
                                <option value=0>Selecciona un ${arrayFuncionMalla[indice].elementoActual}</option>
                                ${response.map((item,index)=>(
                                    `<option key=${index} value=${item.id}>${item.name}</option>`
                                ))}
                            </select>
                            ${indice===4
                                ? 
                                `<button onclick="crearMalla()" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 bg-sky-400 font-medium text-gray-50 hover:bg-gray-700 hover:text-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">Terminar</button>`
                                :
                                ''
                            }
                        `
                        if(response.length>0){
                            divAgregar=document.getElementById(arrayFuncionMalla[indice].elementoActual+"Div");
                            if(divAgregar){
                                divAnterior.removeChild(divAgregar);
                                divAnterior.appendChild(div); 
                            }else{                                
                                divAnterior.appendChild(div); 
                            }                
                        }                             
                    }
                })  
        }
        arrayFuncionMalla[indice].opcionSeleccionada=elemento;
    }
}

