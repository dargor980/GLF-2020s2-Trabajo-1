<template>
    <div class="px-3">
        <h1 class="text-center fredoka">Crear Grafo</h1>
        <div class="row justify-content-center">
            <div id="tarjeta" class="col-md-5 card mr-3">Aqui opciones para crear grafo</div>
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
            grafo:[],
            vertice:{id:'', label:''},
            arista:{from:'',to:''},
            aristas:[],

        }
    },

    created(){

    },

    methods:{

        createGrafo(){

        },

        conexo(){

        },

        matrizAdyacencia(n,e){   // n: numero de vértices; e: número de aristas
            var matrix=[]; 
            for (var i=0; i<n;i++)  // creación de la matriz 
            {
                matrix[i]=new Array(n);
            }
            for (var i=0; i<e;i++)     
            {
                var n1= this.aristas[i].from;
                var n2= this.aristas[i].to;
                matrix[n1][n2]=1;
                matrix[n2][n1]=1;
            }
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