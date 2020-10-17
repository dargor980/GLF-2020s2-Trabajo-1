<template>
    <div>
        <div>
            <h1 class="text-center textocolor fredoka mt-5 pt-4">Crear Grafo</h1>
            <div class="row justify-content-center">
                <div class="grafo1 col-md-5 card cardaux mr-3">
                    <div class="row ml-2 my-3">
                        <div class="container-fluid mr-4">
                            <h3>Seleccione el tipo de grafo:</h3> <!--implementación preliminar. Modificar estilos -->
                            <select class="custom-select  mb-3 mr-3 mt-2" v-model="option">
                                <option selected :value="0">Seleccione un tipo de grafo:</option>
                                <option :value="1">Grafo simple /no dirigido</option>
                                <option :value="2">Grafo simple /dirigido </option>
                                <option :value="3">Grafo dirigido /etiquetado</option>  
                                <option :value="4">Grafo no dirigido /etiquetado</option>   
                            </select> 
                        </div>
                        <div class="container-fluid py-4 mr-4" v-if="option===1">
                            <h3 class="mt-2">Grafo simple No dirigido</h3>
                            <hr>
                            <div class="row text-center">
                                <div class="col-md-4">
                                    <button class="btn btn-success" @click="createNode">Añadir nodo</button>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-success" @click="createArista">Añadir arista</button>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-danger" @click="delAndClear">Eliminar Grafo</button>
                                </div>
                            </div>
                            <div v-if="create" class="my-3">
                                <div>
                                    <form @submit.prevent="crearNodo">
                                        <div class="form-group">
                                            <label for="id">ingrese el id: </label> 
                                            <input type="number" min="1" v-model="nodo.id" name="id" class="form-control"> 
                                        </div>

                                        <button class="btn btn-success btn-sm" type="submit">Agregar</button>
                                    </form>       
                                </div>
                            </div>
                            <div v-if="createAris" class="my-3">
                                <form @submit.prevent="crearArista">
                                    <div class="form-group">
                                        <label>Ingrese nodo desde el cual sale la arista:</label>
                                        <input type="number" min="1" v-model="arista.from" class="form-control"> 
                                    </div>
                                    <div class="form-group">
                                        <label>Ingrese nodo al cual llega la arista:</label>
                                        <input type="number" min="1" v-model="arista.to" class="form-control"> 
                                    </div>
                            
                                    <button class="btn btn-success btn-sm" type="submit" >Agregar</button>
                                    <button class="btn btn-success btn-sm" @click="drawGrafo">dibujar</button>
                                </form>
                            </div>
                        </div>
                         <!--OPCION 2: GRAFO SIMPLE DIRIGIDO--> 
                            <div class="mr-3 mt-3" v-if="option===2">
                                <div class="ml-2">
                                    <h3 class="mt-2">Grafo simple dirigido</h3> 
                                    <hr>
                                    <div class="row text-center">
                                        <div class="col-md-4">
                                            <button class="btn btn-success" @click="createNode">Añadir nodo</button>
                                        </div>
                                        <div class="col-md-4">
                                            <button class="btn btn-success" @click="createArista">Añadir arista</button>
                                        </div>
                                        <div class="col-md-4">
                                            <button class="btn btn-danger" @click="delAndClear">Eliminar Grafo</button>
                                        </div>
                                    </div>

                                        <div v-if="create" class="my-3">
                                            <div>
                                                <form @submit.prevent="crearNodo">
                                                    <div class="form-group">
                                                        <label for="id">ingrese el id: </label> 
                                                        <input type="number" min="1" v-model="nodo.id" name="id" class="form-control"> 
                                                    </div>

                                                    <button class="btn btn-success btn-sm" type="submit">Agregar</button>
                                                </form>       
                                            </div>
                                        </div>

                                        <div v-if="createAris" class="my-3">
                                            <form @submit.prevent="crearArista">
                                                <div class="form-group">
                                                    <label>Ingrese nodo desde el cual sale la arista:</label>
                                                    <input type="number" min="1" v-model="aristaDirigido.from" class="form-control"> 
                                                </div>
                                                <div class="form-group">
                                                    <label>Ingrese nodo al cual llega la arista:</label>
                                                    <input type="number" min="1" v-model="aristaDirigido.to" class="form-control"> 
                                                </div>
                                        
                                                <button class="btn btn-success btn-sm" type="submit" >Agregar</button>
                                                <button class="btn btn-success btn-sm" @click="drawGrafoDirigido">dibujar</button>
                                            </form>
                                        </div>
                                </div>
                            </div>
                            <!--/OPCION 2: GRAFO SIMPLE DIRIGIDO-->

                            <!--OPCION 3: GRAFO DIRIGIDO ETIQUETADO-->
                            <div class="mr-3 mt-3" v-if="option===3">
                                <div class="ml-2">
                                    <h3 class="mt-2">Grafo Dirigido Etiquetado</h3>
                                    <hr>

                                        <div class="row text-center">
                                            <div class="col-md-4">
                                                <button class="btn btn-success" @click="createNode">Añadir nodo</button>
                                            </div>
                                            <div class="col-md-4">
                                                <button class="btn btn-success" @click="createArista">Añadir arista</button>
                                            </div>
                                            <div class="col-md-4">
                                                <button class="btn btn-danger" @click="delAndClear">Eliminar Grafo</button>
                                            </div>
                                        </div>
                                        <div v-if="create" class="my-3">
                                            <div>
                                                <form @submit.prevent="crearNodo">
                                                    <div class="form-group">
                                                        <label for="id">ingrese el id: </label> 
                                                        <input type="number" min="1" v-model="nodo.id" name="id" class="form-control"> 
                                                    </div>

                                                    <button class="btn btn-success btn-sm" type="submit">Agregar</button>
                                                </form>       
                                            </div>
                                        </div>
                                        <div v-if="createAris" class="my-3">
                                            <form @submit.prevent="crearArista">
                                                <div class="form-group">
                                                    <label>Ingrese nodo desde el cual sale la arista:</label>
                                                    <input type="number" min="1" v-model="aristaEtiquetadaDirigida.from" class="form-control"> 
                                                </div>
                                                <div class="form-group">
                                                    <label>Ingrese nodo al cual llega la arista:</label>
                                                    <input type="number" min="1" v-model="aristaEtiquetadaDirigida.to" class="form-control"> 
                                                </div>
                                                <div class="form-group">
                                                    <label>Ingrese el peso de la arista: </label>
                                                    <input type="number" v-model="aristaEtiquetadaDirigida.label" class="form-control">
                                                </div>
                                        
                                                <button class="btn btn-success btn-sm" type="submit" >Agregar</button>
                                                <button class="btn btn-success btn-sm" @click="drawGrafo">dibujar</button>
                                            </form>
                                        </div>

                                </div>

                            </div>
                            <!--/OPCION 3: GRAFO DIRIGIDO ETIQUETADO-->

                            <!--OPCION 4: GRAFO NO DIRIGIDO ETIQUETADO-->
                            <div class="mr-3 mt-3" v-if="option===4">
                                <div class="ml-2">
                                    <h3 class="mt-2">Grafo No Dirigido Etiquetado</h3>
                                    <hr>

                                        <div class="row text-center">
                                            <div class="col-md-4">
                                                <button class="btn btn-success" @click="createNode">Añadir nodo</button>
                                            </div>
                                            <div class="col-md-4">
                                                <button class="btn btn-success" @click="createArista">Añadir arista</button>
                                            </div>
                                            <div class="col-md-4">
                                                <button class="btn btn-danger" @click="delAndClear">Eliminar Grafo</button>
                                            </div>
                                        </div>
                                        <div v-if="create" class="my-3">
                                            <div>
                                                <form @submit.prevent="crearNodo">
                                                    <div class="form-group">
                                                        <label for="id">ingrese el id: </label> 
                                                        <input type="number" min="1" v-model="nodo.id" name="id" class="form-control"> 
                                                    </div>

                                                    <button class="btn btn-success btn-sm" type="submit">Agregar</button>
                                                </form>       
                                            </div>
                                        </div>
                                        <div v-if="createAris" class="my-3">
                                            <form @submit.prevent="crearArista">
                                                <div class="form-group">
                                                    <label>Ingrese nodo desde el cual sale la arista:</label>
                                                    <input type="number" min="1" v-model="aristaEtiquetada.from" class="form-control"> 
                                                </div>
                                                <div class="form-group">
                                                    <label>Ingrese nodo al cual llega la arista:</label>
                                                    <input type="number" min="1" v-model="aristaEtiquetada.to" class="form-control"> 
                                                </div>
                                                <div class="form-group">
                                                    <label>Ingrese el peso de la arista: </label>
                                                    <input type="number" v-model="aristaEtiquetada.label" class="form-control">
                                                </div>
                                        
                                                <button class="btn btn-success btn-sm" type="submit" >Agregar</button>
                                                <button class="btn btn-success btn-sm" @click="drawGrafo">dibujar</button>
                                            </form>
                                        </div>

                                </div>

                            </div>
                            <!--/OPCION 4: GRAFO NO DIRIGIDO ETIQUETADO-->
                    </div>
                </div>
                <div class="grafo1 col-md-5 card cardaux ml-3">
                    <h3 class="text-center fredoka my-2">Representación</h3>
                    <div id="grafo" class="mb-3" style="border: 1px solid lightgray;"></div>
                </div>
            </div>                                                 <!--/ANALISIS DEL GRAFO : PARTE 2  -->
            <h1 class="text-center fredoka textocolor my-4">Análisis del Grafo</h1>
            <div class="row justify-content-center">
                <div class="card cardaux4 col-md-10 rounded-top">
                    <div class="btn-group justify-content-center" role="group">
                        <a href="#matrizcaminos"><button type="button" class="btn btn-secondary" @click="mostrarOp1">Matriz de caminos</button></a>
                        <a href="#caminocorto"><button type="button" class="btn btn-secondary" @click="mostrarOp2">Camino más corto</button></a>
                        <a href="#hamiltoniano"><button type="button" class="btn btn-secondary" @click="mostrarOp3">Hamiltoniano / Euleriano</button></a>
                        <a href="#flujomaximo"><button type="button" class="btn btn-secondary" @click="mostrarOp4">Flujo Máximo</button></a>
                        <a href="#arbolgenerador"><button type="button" class="btn btn-secondary" @click="mostrarOp5">Arbol Generador</button></a>
                    </div>
                </div>
                <!-- CASO 1: MATRIZ DE CAMINOS -->
                <div class="cardaux2 col-md-10" v-if="controlanalisis==1">
                    <h3 class="text-center fredoka textocolor my-3">Matriz de caminos</h3>
                </div>
                <div id="matrizcaminos" class="card cardaux3 col-md-10 rounded-bottom mb-3" v-if="controlanalisis==1">
                    <div class="container">
                        CASO 1: MATRIZ DE CAMINOS Adyacencia^(n-1)
                        <div class="container mb-2">
                            <div v-for="(item, index) in matrixCaminos"  :key="index">
                                <div class="d-inline-block" v-for="(indice,lalacaminos) in item" :key="lalacaminos">
                                    
                                        <span class="d-inline-block bg-dark pl-2" style="width:40px; height:40px; font-size:25px;">{{indice}}</span>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / CASO 1: MATRIZ DE CAMINOS -->
                
                <!-- CASO 2: CAMINO MAS CORTO -->
                <div class="cardaux2 col-md-10" v-if="controlanalisis==2">
                    <h3 class="text-center fredoka textocolor my-3">Camino más corto</h3>
                </div>
                <div id="caminocorto" class="card cardaux3 col-md-10 rounded-bottom" v-if="controlanalisis==2">
                    <div class="container">
                        CASO 2: CAMINO MAS CORTO
                    </div>
                </div>
                <!-- / CASO 2: CAMINO MAS CORTO -->

                <!-- CASO 3: HAMILTONIANO / EULERIANO -->
                <div class="cardaux2 col-md-10" v-if="controlanalisis==3">
                    <h3 class="text-center fredoka textocolor my-3">Hamiltoniano / Euleriano</h3>
                </div>
                <div id="hamiltoniano" class="card cardaux3 col-md-10 rounded-bottom" v-if="controlanalisis==3">
                    <div class="container">
                        CASO 3: HAMILTONIANO / EULERIANO
                        <div class="container">
                            <div class="">
                                <div v-if="controlanalisis==3">
                                    <div v-if="euler">
                                        Este grafo es Euleriano.
                                        
                                        <div class="form-group">
                                            <form @submit.prevent="graficarCircuitoEuleriano">
                                                <label>Ingrese id de nodo de inicio: </label>
                                                <input type="number" min="1" v-model="eleccion" class="form-control">
                                                <button>Consultar</button>
                                            </form>
                                        </div>
                                        
                                        <div>
                                            {{arregloEuleriano}}
                                        </div>

                                    </div>
                                    <div v-else-if="!euler">
                                        Este grafo no es Euleriano.

                                         
                                        
                                        <div>
                                            
                                        </div>
                                    </div>
                                </div>
    
                                <div class="form-group">
                                    <form @submit.prevent="isHamiltoniano">
                                        <label>Ingrese id de nodo de inicio: </label>
                                        <input type="number" min="1" v-model="eleccion" class="form-control">
                                        <button>Consultar</button>
                                    </form>
                                </div>

                                <div >
                                    
                                    <!-- {{arregloEuleriano}} -->
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <!-- / CASO 3: HAMILTONIANO / EULERIANO -->

                <!-- CASO 4: FLUJO MÁXIMO -->
                <div class="cardaux2 col-md-10" v-if="controlanalisis==4">
                    <h3 class="text-center fredoka textocolor my-3">Flujo Máximo</h3>
                </div>
                <div id="flujomaximo" class="card cardaux3 col-md-10 rounded-bottom" v-if="controlanalisis==4">
                    <div class="container">
                        CASO 4: FLUJO MÁXIMO
                    </div>
                </div>
                <!-- / CASO 4: FLUJO MÁXIMO -->

                <!-- CASO 5: ARBOL GENERADOR -->
                <div class="cardaux2 col-md-10" v-if="controlanalisis==5">
                    <h3 class="text-center fredoka textocolor my-3">Arbol Generador</h3>
                </div>
                <div id="arbolgenerador" class="card cardaux3 col-md-10 rounded-bottom" v-if="controlanalisis==5">
                    <div class="container">
                        ARBOL GENERADO
                    </div>
                </div>
                <!-- / CASO 5: ARBOL GENERADOR -->
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            /*Variables que almacenan los datos del grafo (nodos, aristas y sus respectivos datos) */
            nodo:{id:'', label:'',color:'#C52C0B'},
            arista:{from:'',to:'',color:{color:'rgb(0,0,0)'},font:{color:'rgb(255,255,255)'}},  //arista  no dirigida
            aristaDirigido:{from:'', to:'', color:{color:'rgb(0,0,0)'},font:{color:'rgb(255,255,255)'}}, //arista e dirigida
            aristaEtiquetada:{from:'', to:'', label:'',color:{color:'rgb(0,0,0)'},font:{color:'rgb(255,255,255)'}}, //arista  etiquetada no dirigida
            aristaEtiquetadaDirigida:{from:'', to:'', label:'',color:{color:'rgb(0,0,0)'},font:{color:'rgb(255,255,255)'}}, //arista etiquetada dirigida.

            nodos:[{id:'1', label:'1'},{id:'2', label:'2'},{id:'3', label:'3'},{id:'4', label:'4'},{id:'5', label:'5'},{id:'6', label:'6'},{id:'7', label:'7'},{id:'8', label:'8'}],   
            aristas:[{from:'1',to:'2',label:'1'},{from:'1',to:'3',label:'1'},{from:'1',to:'4',label:'1'},{from:'1',to:'5',label:'1'},{from:'2',to:'3',label:'1'},{from:'2',to:'4',label:'1'},{from:'3',to:'4',label:'1'},{from:'3',to:'5',label:'1'},{from:'3',to:'6',label:'1'},{from:'3',to:'7',label:'1'},{from:'3',to:'8',label:'1'},{from:'4',to:'7',label:'1'},{from:'4',to:'8',label:'1'},{from:'5',to:'6',label:'1'},{from:'5',to:'7',label:'1'},{from:'6',to:'7',label:'1'},{from:'7',to:'8',label:'1'},{from:'7',to:'7',label:'1'}],
            matrixCaminos:[],
            euler:'',
            hamilton:[],
            eleccion:'',
            matrizcostos:[],
            


            /*variables de control */
            addgrafo: false,
            option:'',
            create:false,
            createAris:false,
            controlanalisis: '',
            arregloEuleriano:[],
        }
    }, 
    created(){
        
        //this.matrizAdyacencia(this.nodos.length,this.aristas.length); //test de función
        //this.sumaMat();
        //this.matrizIdentidad();
        //let a = this.matrizAdyacencia();
        //let b = this.matrizAdyacencia();
        //this.multiplicarMatriz(a,b);
        //this.potencia(b);
        //console.log("conexo: ",this.conexo()); 
        //var lala= this.isEuleriano();
        //console.log(lala);
        //this.eliminarGrafo();
        //this.caminoCorto2();
        //this.isHamiltoniano()
        this.matrizcostos=this.matrizCostos();
    },

    

    methods:{
        llamarHam(){
            var ham =this.isHamiltoniano()
            return ham
        },

        delAndClear(){
            this.eliminarGrafo();
            this.drawGrafo();
        },
        

        drawGrafo(){  //función que toma los nodos y aristas y procede a graficarlos en el container
            var container= document.getElementById("grafo");
            var data={nodes:this.nodos,
                      edges:this.aristas};
            var options = {
                height: 520 + 'px',
            };
            var network= new vis.Network(container,data,options);
            var djasd = this.matrizAdyacencia()
            console.log(djasd);
        },

        drawGrafoDirigido(){
            var container= document.getElementById("grafo");
            var data= {nodes:this.nodos,
                       edges:this.aristas};
            var options ={
                height: 520 + 'px',
                edges:{
                    arrows:'to',
                },
            }
            var network= new vis.Network(container,data,options);
            
        },


        drawGrafoEtiquetadoNoDirigido()
        {
            var container= document.getElementById("grafo");
            var data= {nodes:this.nodos,
                       edges:this.aristas};
            var options={
                height:520 + 'px',
            };
            var network= new vis.Network(container,data,options);
        },

        createNode()  //funcion para el control del flujo de vistas 
        {
            this.create=true;
            this.createAris=false;
        },
        
        createArista(){  //función para el control del flujo de vistas
            this.createAris=true;
            this.create=false;
        },

        crearNodo(){   //agrega un nodo al array de nodos , grafo 

            if(this.nodo.id==='')  //verificación que el campo no esté vacío
            {
                alert('Debe ingresar un id.');
                return;
            }
            for(var i=0; i<this.nodos.length;i++)  //verificación de un nodo preexistente en el arreglo de nodos.
            {
                if(this.nodos[i].id==this.nodo.id)
                {
                    alert('El nodo ya existe. Ingrese otro id.');
                    return;
                }
            }
            this.nodo.label=this.nodo.id;
            this.nodos.push(this.nodo);
            this.nodo={id:'', label:'',color:'#C52C0B'}
            this.drawGrafo();
            for(var i=0;i<this.nodos.length;i++) // test de la funcion 
            {
                // console.log("Cantidad de nodos >>> ")
                // console.log(this.nodos.length); //largo del array de nodos 
            }
        },
        
        crearArista(){ // agrega conexion entre nodos

            if(this.option===1)
            {

                if(this.arista.from==='' || this.arista.to==='') //verifica que los extremos de la arista no estén vacíos.
                {
                    alert('Debe ingresar los extremos de la arista.');
                    return;
                }
                for(var i=0; i<this.aristas.length;i++)
                {
                    if(this.arista.from===this.aristas[i].from && this.arista.to===this.aristas[i].to)
                    {
                        alert('ya existe la arista. Igrese otra');
                        return;
                    }
                }
                this.aristas.push(this.arista);
                this.arista={from:'',to:'',color:{color:'rgb(0,0,0)'},font:{color:'rgb(255,255,255)'}};
                this.drawGrafo();
            }
            
            if(this.option===2)
            {
                if(this.aristaDirigido.from==='' || this.aristaDirigido.to==='')
                {
                    alert('Debe ingresar los extremos de la arista.');
                    return;
                }
                for(var i=0; i<this.aristas.length;i++)
                {
                    if(this.aristaDirigido.from===this.aristas[i].from && this.aristaDirigido.to === this.aristas[i].to)
                    {
                        alert('ya existe la arista. Ingrese otra');
                        return;
                    }
                }
                this.aristas.push(this.aristaDirigido);
                this.aristaDirigido={from:'', to:'', color:{color:'rgb(0,0,0)'},font:{color:'rgb(255,255,255)'}};
                this.drawGrafoDirigido();
                var ady= this.matrizAdyacenciaDirigido();
                console.log(ady);
            }

            if(this.option===3)
            {
                if(this.aristaEtiquetadaDirigida.from==='' || this.aristaEtiquetadaDirigida.to==='' || this.aristaEtiquetadaDirigida.label==='')
                {
                    alert("extremos de aristas o peso no indicado. Rellene todos los campos antes de continuar");
                    return;
                }
                for(var i=0; i<this.aristas.length;i++)
                {
                    if(this.aristaEtiquetadaDirigida.from===this.aristas[i].from && this.aristaEtiquetadaDirigida.to===this.aristas[i].to)
                    {
                        alert("La arista ya existe. Ingrese otra");
                        return;
                    }
                    
                }
                this.aristas.push(this.aristaEtiquetadaDirigida);
                this.aristaEtiquetadaDirigida={from:'', to:'', label:'',color:{color:'rgb(0,0,0)'},font:{color:'rgb(255,255,255)'}};
                this.drawGrafoDirigido();
                var ady= this.matrizAdyacenciaDirigido();
                console.log(ady);  //muestra la matriz de adyacencia
            }

            if(this.option===4)
            {
                if(this.aristaEtiquetada.from==='' || this.aristaEtiquetada.to==='' || this.aristaEtiquetada.label==='')
                {
                    alert("extremos de aristas o peso no indicado. Rellene todos los campos antes de continuar");
                    return;
                }
                for(var i=0; i<this.aristas.length;i++)
                {
                    if(this.aristaEtiquetada.from===this.aristas[i].from && this.aristaEtiquetada.to===this.aristas[i].to)
                    {
                        alert("La arista ya existe. Ingrese otra");
                        return;
                    }
                    
                }
                this.aristas.push(this.aristaEtiquetada);
                this.aristaEtiquetada={from:'', to:'', label:'',color:{color:'rgb(0,0,0)'},font:{color:'rgb(255,255,255)'}};
                this.drawGrafoEtiquetadoNoDirigido();
                var ady=this.matrizAdyacencia();
                console.log(ady); //impresion de la matriz adyacencia.

            }
            
            for(var i=0;i<this.aristas.length;i++) // test de la funcion 
            {
                // console.log(this.aristas[i].from); // desde donde sale la aritsa
                // console.log(this.aristas[i].to); // hacia donde llega la arista
                // console.log(this.aristas[i].value); // peso de la arista
            }
        },
//funciones que controla la visualización de las vistas
        mostrarOp1(){
            this.controlanalisis=1;
            this.matrizCaminos();
        },

        mostrarOp2(){
            this.controlanalisis=2;
        },

        mostrarOp3(){
            this.euler=this.isEuleriano();
            this.controlanalisis=3;
        },

        mostrarOp4(){
            this.controlanalisis=4;
        },

        mostrarOp5(){
            this.controlanalisis=5;
        },

        
        matrizAdyacencia(){  // Función que genera la matriz de adyacencia de un grafo simple no dirigido. n: numero de vértices; e: número de aristas
            let matrix=[]; 
            var n = this.nodos.length;//largo del array nodos
            var e = this.aristas.length;//largo del array aristas
            for (var i=0; i<n;i++)  // creación de la matriz ***funcion crear matriz***
            {
                matrix[i]=new Array(n);
            }
            
            for(var i=0; i<n; i++)
            {
                for(var j=0; j<n; j++)
                {
                    matrix[i][j]=0;
                }
            }
            
            for (var i=0; i<e;i++)     
            {
                var n1= this.aristas[i].from;
                var n2= this.aristas[i].to;
                matrix[n1-1][n2-1]=1;
                matrix[n2-1][n1-1]=1;
            } 
            console.log(matrix);
            return matrix;        
        },

        matrizAdyacenciaDirigido()   //FUnción que genera la matriz de adyacencias de un grafo simple Dirigido.
        {
            let matrix=[];
            for(var i=0; i<this.nodos.length; i++)
            {
                matrix[i]=new Array(this.nodos.length);
            }
            for(var i=0; i<this.nodos.length; i++)
            {
                for(var j=0; j<this.nodos.length;j++)
                {
                    matrix[i][j]=0;
                }
            }
            for(var i=0; i<this.aristas.length;i++)
            {
                var n1=this.aristas[i].from;
                var n2=this.aristas[i].to;
                matrix[n1-1][n2-1]=1;
            }
            return matrix;
        },

        conexo(){   //Función que retorna valor booleano que determina si un grafo es o no conexo
            
        var matriz = this.sumaMat();
        var largo = this.nodos.length;
        for(var i=0;i<largo;i++)
            {
                for(var j=0;j<largo;j++)
                {
                    if(matriz[i][j]===0)
                    {
                        return false;
                    }
                }
            }
            return true;
        },

        graficarCircuitoEuleriano(){
            var e=this.eleccion;
            let pasos=[];
            let aux=this.matrizAdyacencia();
            let control=3;
            let indice;
            let largo=this.nodos.length;

            // let aristaslargo = this.aristas.length;
            for(var i=0; i<this.nodos.length; i++)
            {
                if(this.nodos[i].id==e)
                {
                    if( i < (this.nodos.length/2) ){
                        console.log("Der a izq");
                        control=0;
                    }else{
                        if( i >= (this.nodos.length/2) ){
                            console.log("Izq a Der");
                            control=1;
                        }
                    }
                    indice=i;
                }
            }

            if(control==3){
                alert("Ingrese Id valido")
                return;
            }else{
                if(control==1){
                    console.log("Izq a Der: adentro");
                    pasos.push(indice+1); //guardo partida
                    for( indice; indice < this.nodos.length; indice++){
                        for(var j=0; j<this.nodos.length; j++){
                            if(aux[indice][j]==1){
                                aux[indice][j]=2;
                                aux[j][indice]=2;
                                indice=j-1;
                                pasos.push(j+1);
                                j=this.nodo.length+1; //aqui termino el for
                            }
                        }
                    }
                    console.log(pasos);
                }else{
                    console.log("Der a izq: adentro");
                    pasos.push(indice+1);  
                    for( indice; indice < this.nodos.length; indice++){
                        for(var j=largo-1; j>=0; j--){
                            if(aux[indice][j]==1){
                                aux[indice][j]=2;
                                aux[j][indice]=2;
                                indice=j-1;
                                pasos.push(j+1);
                                j=-1;
                            }
                        }
                    }
                    console.log(pasos);
                    this.arregloEuleriano=pasos
                }
            }


        },

        isEuleriano(){  //Función que retorna un valor booleano que determina si un grafo es o no Euleriano, Camino simple contiene todas las aristas del Grafo 
           if(this.conexo())
           {
               var grados=0;
               var matriz=this.matrizAdyacencia();
               for(var i=0; i<this.nodos.length; i++)
               {
                   grados=0;
                   for(var j=0; j<this.nodos.length;j++)
                   {      
                       if(matriz[i][j]==1)
                       {
                           if(i==j && matriz[i][j]==1)
                           {
                               grados+=2;
                           }
                           else{

                               grados++;
                           }
                       }
                   }
                   if(grados%2!=0)
                   {
                       return false;
                   }
               }               
                return true;
           }
           else{
               return false;
           }
        },

        gradosHam(grados,matrix){
            for(var i = 0; i < this.nodos.length; i++){
                    var cont = 0 
                    for( var j = 0 ; j < this.nodos.length; j++){
                        if(matrix[i][j]==1){
                            cont++;
                        }
                    }
                    grados.push(cont)
                }
            return grados
        },

        isHamiltoniano(){  //FUnción que retorna un valor booleano que determina si un grafo es o no Hamiltoniano.
            
            if(this.conexo()){
                var matrix = this.matrizAdyacencia();
                var grados = [];
                var nodo_inicio = this.eleccion;
                var posicion = nodo_inicio-1;
                var contadorAristas = 1;
                var camino = [];
                var control=0;
                //camino.push(posicion)
                grados=this.gradosHam(grados,matrix)
                console.log("arreglo de grados",grados);

                while(contadorAristas!=this.nodos.length){
                    console.log("posicion",posicion);
                    grados = []
                    grados=this.gradosHam(grados,matrix)
                    console.log("arreglo de grados",grados);
                    var adyacencia=[];
                    contadorAristas++;
                    for(var j=0; j<this.nodos.length; j++){
                        if(this.esta(camino, j)==false && grados[j]>0){
                            //console.log("toi dentro");
                            if( matrix[posicion][j] == 1 && j != nodo_inicio-1){
                                adyacencia.push(j);
                                
                                //console.log("this",adyacencia);
                            }else{
                                if( matrix[posicion][j] == 1 && j == nodo_inicio-1 && contadorAristas==this.nodos.length){
                                    adyacencia.push(j);
                                }
                            }
                        }
                    }
                    
                    if(adyacencia.length==0){
                        console.log(false);
                        return false
                    }
                    var menor=adyacencia[0];
                    var aux=0;
                    console.log("arreglo de adyacencia",adyacencia);
                    
                    for(var k=0; k<adyacencia.length; k++){
                        if( grados[adyacencia[aux]] > grados[adyacencia[k]] && k != nodo_inicio-1 ){
                            console.log("Grados de",adyacencia[k]," - ", grados[adyacencia[k]]);
                            aux=k;
                            menor=adyacencia[k];
                        }
                        
                    }
                    
                    console.log("Menor",posicion);
                    
                    if(control!=0){
                        for(var n=0; n<this.nodos.length; n++){
                            matrix[posicion][n]=0;
                            matrix[n][posicion]=0;
                            console.log(matrix);
                        }

                    }
                    else{
                        control=1
                        
                    }
                    camino.push(posicion);
                    posicion=menor;
                    grados[posicion]=0  
                    
                }
                if(camino.length!=this.nodos.length){
                    console.log(false);
                    return false
                }
                if(camino[camino.length-1]!=parseInt(nodo_inicio)-1){
                    console.log(false);
                    return false
                }
                //camino.push(parseInt(nodo_inicio)-1 )
                console.log("arreglo de caminos",this.arreglomas1(camino));
                this.hamilton = camino
                return true
                

            }
            else{
                return false;
            }
        },

        arreglomas1(arreglo){
            for(var i=0 ; i< arreglo.length; i++){
                arreglo[i]++
            }
            return arreglo
        },

        esta(camino, num){
            //camino=[6,0,0,0,0,0,0,0]
            //camino[6,5,4,0,1,2,3,7]
            //camino.lenght==nodos.lenght
            for(var i=0; i<camino.length-1; i++){
                
                if(num==camino[i]){
                    
                    return true;
                }
            }
            return false;
        },

        matrizCostos(){
            let matrix=this.crearMatriz()
            for(var i=0; i<this.nodos.length; i++)
            {
                for(var j=0; j<this.nodos.length;j++)
                {
                    matrix[i][j]=0;
                }
            }
            for(var i=0; i<this.aristas.length;i++)
            {
                var n1=this.aristas[i].from;
                var n2=this.aristas[i].to;
                matrix[n1-1][n2-1]=parseInt(this.aristas[i].label);
            }
            console.log(matrix);
            return matrix;

        },

        caminoCorto(nodo_inicial){  //Función que analiza el camino mínimo desde un nodo inicial a uno final. Basado en el algoritmo de Dikjstra.
            var vertices= this.nodos;
            var distancias=new Array(this.nodos.length);
            var ady=this.matrizAdyacencia();
            var x={
                distanciaAcumulada:0,
                origen: null,
            };
            var actual=nodo_inicial
            var finalizado=[];
            finalizado.push(nodo_inicial);
            while(vertices.length!==0)
            {
                for(var i=0; i<this.nodos.length;i++)
                {
                    for(var j=0; j<this.nodos.length;j++)
                    {
                        if(ady[i][j]!==null)
                        {
                            x={
                                distanciaAcumulada:distanciaAcumulada+ady[i][j],
                                origen:actual,
                            }
                        }
                        vertices.splice(i,1);
                    }
                }
            }
        },
        
        // caminoCorto2(id_nodo){ //fallido segundo camino corto
        //     var nuevo=[];
        //     var camino=[];
        //     console.log("largo aristas", this.aristas.length);
        //     var max=0;
        //     for(var e=0;e<this.aristas.length;e++){//calcula el maximo peso de las aristas
        //         var min=this.aristas[e].value;      
        //         if(max<min){
        //             max=min;
        //         }
        //     }
        //     console.log(max);//muestra maximo
        //     //***************************************** */
        //     for (var i=0;i<this.aristas.length;i++){
        //         var k=0;
        //         while(k<max){
        //             if(this.aristas[i].from===0){
        //                 nuevo.push(this.aristas[i]);
        //                 console.log("nuevo",nuevo[i]);
        //                 this.aristas[i].pop();
        //             }
        //             k++;
        //         }
        //         console.log(nuevo.values);
        //     }

                
        //     for (var j=0;j<nuevo.length;i++){
        //         menor = nuevo[j].value;
        //         mayor = nuevo[j++].value;
        //         if(mayor < menor){
        //             menor=mayor;
        //             camino.push(menor);
        //         }
        //     }
        //     //console.log("camino",camino.values);
        // },

        kruskal(){ //Función que retorna el árbol generador mínimo a través de la implementación del algoritmo de Kruskal.

        },

        flujoMaximo(){

            var menor=1; //capacidad minima entre las ramas
            var rama;
            var camino;
            var acumulado=0;
            if(this.camino(this.inicio,this.destino))
            {
                camino=this.caminoflujo();
            }
            for(var i=0; i<camino.length;i++)
            {
                if(camino[i].value<menor)
                {
                    menor=camino[i].value;
                    rama=camino[i];
                }
            }
            for(var i=0; i<caminos.length;i++)
            {
                caminos[i].value=caminos[i].value-rama.value;
                acumulado=acumulado+caminos[i].value;
            }

            return acumulado;

        },

        camino(){
            
        },

        multiplicarMatriz(matrizA,matrizB)//funcionando Multiplica 
        {
            let res=[];
            var sum=0;
            
            for(var i=0; i<matrizA.length;i++)//crea matriz res[][]
            {
                res[i]= new Array(matrizA.length);
            }
            
            for(var a=0;a<matrizB.length;a++)// recorre columnas matrizB
            {
                for(var i=0; i<matrizA.length;i++)// recorre filas de matrizA
                {
                    sum=0;
                    for(var j=0; j<matrizA.length;j++) //recorre columnas matrizA
                    {
                        sum+= matrizA[i][j]*matrizB[j][a];
                    }
                    res[i][a]=sum;
                }
            }
            //console.log(res); //comentar
            return res;	
        },

        potencia(matriz, largo )//funcionando, eleva una matriz a una potencia que corresponde a su largo-1
        {
            //var largo = this.nodos.length-1;
            var sum=0;
            var aux=matriz;
            var res;
            for(var i=1; i < largo-1 ;i++)
            {
                res=this.multiplicarMatriz(matriz,aux);
                aux=res;
                
            }    
            console.log(`potencia ^${largo}`);	
            console.log(res);
            return res;      
        },

        matrizCaminos()  //Función que retorna los caminos de un grafo.
        {
            this.matrixCaminos=this.sumaMat();
        },

        sumaMat(){ // Funcionando! .Funcion que retorna la suma de las matrices para generar la matriz de caminos
            //sumar matriz adyacencia + matriz adyacencia^(n-1) + mariz identidad 
            var matrizId = this.matrizIdentidad();
            var matrizAd = this.matrizAdyacencia();
            var largo = this.nodos.length;
            let aux = this.crearMatriz();
            let sumPot;
            
            for(var i=0 ; i<largo ; i++ ){ //suma matrizId + MatrizAd
                for(var j=0 ; j<largo ;j++){
                    aux[i][j] =  matrizId[i][j] + matrizAd[i][j];
                }
            }
            for(var i=largo;i>2;i--)
            {
                sumPot=this.potencia(matrizAd,i);
                for(var j=0; j<this.nodos.length;j++)
                {
                    for(var k=0;k<this.nodos.length;k++)
                    {
                        aux[j][k]=aux[j][k]+sumPot[j][k];
                    }
                }
            }
            console.log(matrizId,"identidad");
            console.log(matrizAd,"adyacencia");
            console.log(aux,"suma total");

            return aux;
        },

        crearMatriz(){
            var res = [];
            for(var i=0; i<this.nodos.length;i++)//crea matriz res[][]
            {
                res[i]= new Array(this.nodos.length);
            }
            return res;
        },
        
        matrizIdentidad(){ // matriz identidad, tamaño segun length nodos FUNCIONANDO
            let matriZIdentidad=[];
            var largo = this.nodos.length;
            for(var i=0; i < largo; i++)
            {
                matriZIdentidad[i] = new Array(largo);    
            }
            
            for(var i=0; i < largo ; i++)
            {
                for(var j=0; j < largo ; j++)
                {
                    if(i===j)
                    {
                        matriZIdentidad[i][j]=1;
                    }
                    else{
                        matriZIdentidad[i][j]=0;
                    }
                }
            }
            console.log(matriZIdentidad);
        return matriZIdentidad;
        },
        
        eliminarGrafo(){ //borra todos los elementos del grafo.
            this.nodos=[];
            this.aristas=[];
            //console.log(this.nodos);
            //console.log(this.aristas);
        },


    },
}
</script>

// **Pseudocodigo Dikjstra**
// nodos_visitados=[]
// nodos_no_visitados=[{1,{4,5,6}},{2,{3,5}},3,{6},6,{1}] //{nodo,{nodos_llegada}}
// suma_camino_nodos=0
// nodo_inicial
// for(cada_conexion_del_nodo_inicial){
//     buscar_la_arista_de_salida_con_menor_peso adicionar suma_camino_nodos
// }
// añadir nodo_inicial a nodos_visitados
// eliminar nodo_inicial de nodos_no_visitados
// nodo_inicial = nodo_con_arista_de_menor_peso
// repetir_hasta_vaciar nodos_no_visitados







        