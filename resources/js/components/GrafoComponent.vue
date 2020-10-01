<template>
    <div class="px-3">
        <h1 class="text-center fredoka">Crear Grafo</h1>
        <div class="row justify-content-center">
            <div  class="col-md-5 card mr-3">
                <div class="row ml-3 mt-3">
                    <h3>Seleccione el tipo de grafo:</h3> <!--implementación preliminar. Modificar estilos -->
                        <select  class="custom-select  mb-3 mr-3" v-model="option">
                            <option selected :value="0">Seleccione un tipo de grafo:</option>
                            <option :value="1">Grafo simple /no dirigido</option>
                            <option :value="2">Grafo simple /dirigido </option>
                            <option :value="2">Grafo dirigido /etiquetado</option>     
                        </select> 
                          <div class="container px-3" v-if="option===1">
                            <div>
                                <h3 class="mt-2">Grafo simple No dirigido</h3>
                                <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button class="btn btn-success" @click="createNode">Añadir nodo</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button class="btn btn-success" @click="createArista">Añadir arista</button>
                                        </div>
                                    </div>
                                    
                               
                            </div>
                                <div v-if="create" class="my-3">
                                    <div class=" ml-2">
                                        <form @submit.prevent="crearNodo">
                                            <div class="form-group">
                                                <label for="id">ingrese el id: </label> 
                                                <input type="text" v-model="nodo.id" name="id" class="form-control"> 
                                            </div>
                                            <div class="form-group">
                                                <label for="label">ingrese nombre:</label> 
                                                <input type="text" v-model="nodo.label" name="label" class="form-control"> 

                                            </div>

                                            <button class="btn btn-success btn-sm" type="submit">Agregar</button>
                                        </form>
                                    </div>
                                    
                                </div>

                                <div v-if="createAris" class="my-3">
                                  <form @submit.prevent="crearArista">
                                      <div class="form-group">
                                          <label>Ingrese nodo desde el cual sale la arista:</label>
                                          <input type="text" v-model="arista.from" class="form-control"> 
                                      </div>
                                      <div class="form-group">
                                          <label>Ingrese nodo al cual llega la arista:</label>
                                          <input type="text" v-model="arista.to" class="form-control"> 
                                      </div>
                                      <div class="form-group">
                                          <label>Ingrese el peso de la arista: </label>
                                          <input type="text" v-model="arista.value" class="form-control">  <!--peso de la arista en caso de ser etiquetado  -->
                                      </div>
                               
                                      <button class="btn btn-success btn-sm" type="submit" >Agregar</button>
                                      <button class="btn btn-success btn-sm" @click="drawGrafo">dibujar</button>
                                  </form>
                                </div>
                          </div>
                          <div>
                              
                          </div>
                           <!--/implementación preliminar. Modificar estilos --> 
                          <div class="col-md-5 card mr-3" v-if="option===2">
                            <div>
                                <h3> opcion 2</h3>
                            </div>
                          </div>
                </div>
            </div>

          
            <div id="grafo" class="col-md-5 card ml-3">Aqui dejaria mostrando los grafos siempre</div>
        </div>
        <hr>
        <h1 class="text-center fredoka">Análisis del Grafo</h1>
        <div class="row justify-content-center">
            <div id="tarjeta" class="col-md-5 card mr-3">Aqui opciones para crear grafo</div>
            <div id="tarjeta" class="col-md-5 card ml-3">Aqui dejaria mostrando los grafos siempre</div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            /*Variables que almacenan los datos del grafo (nodos, aristas y sus respectivos datos) */
            nodo:{id:'', label:''},
            arista:{from:'',to:''},

            nodos:[{id:'1', label:'a'},{id:'2', label:'b'},{id:'3', label:'c'},{id:'4', label:''},{id:'5', label:''}],   
            aristas:[{from:'1',to:'2'},{from:'2',to:'3'},{from:'3',to:'1'},{from:'4',to:'2'},{from:'5',to:'2'}],
            matrixCaminos:[],
            



            /*variables de control */
            addgrafo: false,
            option:'',
            create:false,
            createAris:false,

        }
    },
    
    created(){
        
        //this.matrizAdyacencia(this.nodos.length,this.aristas.length); //test de función
        this.sumaMat();
        //this.matrizIdentidad();
        //let a = this.matrizAdyacencia();
        //let b = this.matrizAdyacencia();
        //this.multiplicarMatriz(a,b);
        //this.potencia(b);
    },

    

    methods:{
        
        selectGrafo()
        {

        },

        drawGrafo(){  //función que toma los nodos y aristas y procede a graficarlos en el container
            var container= document.getElementById("grafo");
            var data={nodes:this.nodos,
                      edges:this.aristas};
            var options={};
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
            this.nodos.push(this.nodo);
            this.nodo={id:'', label:''}
            this.drawGrafo();
            for(var i=0;i<this.nodos.length;i++) // test de la funcion 
            {
                //console.log(this.nodos.length); //largo del array de nodos 
            }
        },
        
        crearArista(){ // agrega conexion entre nodos
            this.aristas.push(this.arista);
            this.arista={from:'',to:'',value:'0'}
            this.drawGrafo();
            for(var i=0;i<this.aristas.length;i++) // test de la funcion 
            {
                // console.log(this.aristas[i].from); // desde donde sale la aritsa
                // console.log(this.aristas[i].to); //hacia donde llega la arista
                // console.log(this.aristas[i].value);// peso de la arista
            }
        },
        
        matrizAdyacencia(){   // Función que genera la matriz de adyacencia de un grafo simple no dirigido. n: numero de vértices; e: número de aristas
            let matrix=[]; 
            var n = this.nodos.length;//largo del array nodos
            var e = this.aristas.length;//largo del array aristas
            for (var i=0; i<n;i++)  // creación de la matriz 
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
            //console.log(matrix);
            return matrix;
            
        },

        matrizAdyacenciaDirigido(n,e)   //FUnción que genera la matriz de adyacencias de un grafo simple Dirigido.
        {
            let matrix=[];
            for(var i=0; i<n; i++)
            {
                matrix[i]=new Array(n);
            }
            for(var i=0; i<n; i++)
            {
                for(var j=0; j<n;j++)
                {
                    matriz[i][j]=0;
                }
            }
            for(var i=0; i<e;i++)
            {
                var n1=this.aristas[i].from;
                var n2=this.aristas[i].to;
                matrix[n1-1][n2-1]=1;
            }
            return matrix;
        },

        conexo(matCaminos,n){   //Función que retorna valor booleano que determina si un grafo es o no conexo
            for(var i=0;i<n;i++)
            {
                for(var j=0;j<n;j++)
                {
                    if(matCaminos[i][j]===0)
                    {
                        return false;
                    }
                }
            }
            return true;
        },

        isEuleriano(){  //Función que retorna un valor booleano que determina si un grafo es o no Euleriano

        },

        isHamiltoniano(){  //FUnción que retorna un valor booleano que determina si un grafo es o no Hamiltoniano.

        },

        caminoCorto(nodo_inicial){  //Función que analiza el camino mínimo desde un nodo inicial a uno final. Basado en el algoritmo de Dikjstra.
            var camino=[];
            var x=nodo_inicial;
            for(var i=1; i<nodos.length;i++)
            {
                
            }
        },

        kruskal(){ //Función que retorna el árbol generador mínimo a través de la implementación del algoritmo de Kruskal.

        },

        flujoMaximo(){

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

        matrizCaminos(matrizadyacencia)  //Función que retorna los caminos de un grafo.
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
        }
    },
}
</script>