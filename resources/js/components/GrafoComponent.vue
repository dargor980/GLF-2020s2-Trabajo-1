<template>
    <div class="px-3">
        <h1 class="text-center fredoka">Crear Grafo</h1>
        <div class="row justify-content-center">
            <div  class="col-md-5 card mr-3">
                <div class="row ml-3 mt-3">
                    <h3>Seleccione el tipo de grafo:</h3>
                        <select  class="custom-select  mb-3" v-model="option">
                            <option selected :value="0">Seleccione un tipo de grafo:</option>
                            <option :value="1">Grafo simple /no dirigido</option>
                            <option :value="2">Grafo simple /dirigido </option>
                            <option :value="2">Grafo dirigido /etiquetado</option>     
                        </select> 
                          <div class="card mr-3" v-if="option===1">
                            <div>
                                <h3>Grafo simple No dirigido</h3>
                                <hr>
                                
                                    <div class="col-md-6">
                                        <button class="btn btn-success" @click="createNode">Añadir nodo</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-success" @click="createArista">Añadir arista</button>
                                    </div>
                               
                            </div>
                                <div v-if="create">
                                    <form @submit.prevent="crearNodo">
                                        <input type="text" v-model="nodo.id"> ingrese el id:
                                        <input type="text" v-model="nodo.label"> ingrese nombre:

                                        <button class="btn btn-success btn-sm" type="submit">Agregar</button>
                                    </form>
                                </div>
                          </div>
                          <div>
                              <div v-if="createAris">
                                  <form @submit.prevent="crearArista">
                                      <input type="text" v-model="arista.from"> Ingrese nodo desde el cual sale la arista:
                                      <input type="text" v-model="arista.to"> Ingrese nodo al cual llega la arista:
                                      <input type="text" v-model="arista.value"> Ingrese el peso de la arista: <!--peso de la arista en caso de ser etiquetado  -->
                                      <button class="btn btn-success btn-sm" type="submit" >Agregar</button>
                                  </form>

                              </div>
                          </div>
                            
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
            nodo:{id:'', label:''},
            arista:{from:'',to:'',value:'0'},
            nodos:[],

             
            aristas:[],
            addgrafo: false,



            /*variables de control */

            option:'',
            create:false,
            createAris:false,

        }
    },

    created(){
        this.matrizAdyacencia(this.nodos.length,this.aristas.length); //test de función
    },


    methods:{

        selectGrafo()
        {

        },

        createNode()
        {
            this.create=true;
            this.createAris=false;
        },
        createArista(){
            this.createAris=true;
            this.create=false;
        },

        crearNodo(){   //agrega un nodo al array de nodos , grafo 
            this.nodos.push(this.nodo);
            this.nodo={id:'', label:''}
            for(var i=0;i<this.nodos.length;i++) // test de la funcion 
            {
                console.log(this.nodos.length); //largo del array de nodos 
            }
        },
        crearArista(){ // agrega conexion entre nodos 
            this.aristas.push(this.arista);
            this.arista={from:'',to:'',value:'0'}
            for(var i=0;i<this.aristas.length;i++) // test de la funcion 
            {
                console.log(this.aristas[i].from); // desdedonde sale la aritsa
                console.log(this.aristas[i].to); //hacia donde llega la arista
                console.log(this.aristas[i].value);// peso de la arista
            }
        },
        

        matrizAdyacencia(n,e){   // n: numero de vértices; e: número de aristas
            let matrix=[]; 
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
            console.log(matrix);
            
        },

        matrizAdyacenciaDirigido(n,e)
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
        },


        conexo(matCaminos,n){
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


        isEuleriano(){

        },

        isHamiltoniano(){

        },

        caminoCorto(){

        },

        kruskal(){

        },

        flujoMaximo(){

        }

    },

}
</script>