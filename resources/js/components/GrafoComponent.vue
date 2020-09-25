<template>
    <div class="px-3">
        <h1 class="text-center fredoka">Crear Grafo</h1>
        <div class="row justify-content-center">
            <div  class="col-md-5 card mr-3">
                <div class="row ml-3 mt-3">
                    <h3>Seleccione el tipo de grafo:</h3>
                    <form @submit.prevent="">
                        <select  class="custom-select  mb-3">
                            <option selected :value="0">Seleccione un tipo de grafo:</option>
                            <option>Grafo simple /dirigido</option>
                            <option>Grafo dirigido /etiquetado</option>     
                        </select>
                        <div class="container text-center">
                            <button class="btn btn-success mb-3 text-white" type="submit">Seleccionar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div id="tarjeta" class="col-md-5 card ml-3">Aqui dejaria mostrando los grafos siempre</div>
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
            arista:{from:'',to:''},
            nodos:[{id:1,label:'nodo 1'},  //datos para test de funcion
                   {id:2,label:'nodo 2'},
                   {id:3,label:'nodo 3'},
                   {id:4,label:'nodo 4'}],

             
            aristas:[{from:1,to:2},
                     {from:2,to:3},
                     {from:3,to:4},
                     {from:4,to:1},
                     {from:1,to:3}],
            addgrafo: false,

        }
    },

    created(){
        this.matrizAdyacencia(this.nodos.length,this.aristas.length); //test de función
    },


    methods:{

        crearNodo(a,b){
            let nodo={id:a,label:b};
            this.nodos.push(nodo);
        },
        crearArista(a,b){
            let arista={from:a,to:b};
            this.aristas.push(arista);
        },
        createGrafo(){
            this.crearNodo();
            this.crearArista();
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