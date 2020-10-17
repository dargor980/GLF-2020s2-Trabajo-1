<template>
    <div class="container mt-5 pt-4">
        <h1 class="fredoka textocolor my-2">Tipos de grafos con los que se trabajara en esta aplicacion web:</h1>
        <div class="row bg-white rounded shadow mt-4 cardaux">
            <div class="col-12 cardaux">
                <div class="row d-flex justify-content-center mx-2 my-2 pt-2">
                    <h4 class="textocolor fredoka my-2">Tipos de grafos</h4>
                </div>
                <hr>
                <div class="row">
                    <ul class="col-lg-3 col-sm-12 my-2 list-group list-group-flush">
                        <li class="list-group-item analisis collapsed info textocolor" data-toggle="collapse" data-target="#Grafosimple" aria-expanded="false" aria-controls="Grafosimple">
                            Grafo Simple
                        </li>
                        <li class="list-group-item analisis collapsed  info textocolor" data-toggle="collapse" data-target="#Multigrafo" aria-expanded="false" aria-controls="Multigrafo">
                            Multigrafo
                        </li>
                        <li class="list-group-item analisis info textocolor" data-toggle="collapse" data-target="#Grafodirigido" aria-expanded="false" aria-controls="Gradodirigido">
                            Grafo Dirigido
                        </li>
                        <li class="list-group-item analisis info textocolor" data-toggle="collapse" data-target="#Multigrafodirigido" aria-expanded="false" aria-controls="Multigrafodirigido">
                            Multigrafo Dirigido
                        </li>
                    </ul>
                    <div class="col-lg-7 col-sm--12 my-2">
                        <div class="collapse" id="Grafosimple">
                            <div class>
                                <div class="row d-flex justify-content-center">
                                    <h4 class="textocolor fredoka">Grafo Simple</h4>
                                </div>
                                <p class="textocolor lato" >Un grafo simple G = (V, A) costa de un conjunto no vacío de vértices V y de
                                un conjunto A de pares no ordenados llamados aristas. En otras palabras un grafo simple es un grafo en
                                los que existe a lo más una arista que une dos vértices distintos.</p>
                            </div>
                        </div>
                        <div class="collapse" id="Multigrafo">
                            <div class>
                                <div class="row d-flex justify-content-center">
                                    <h4 class="textocolor fredoka">Multigrafo</h4>
                                </div>
                                <p class="textocolor lato"> Un multigrafo G = (V, A) consta de un conjunto V de vértices, un conjunto A de aristas, donde puede haber más de una arista entre un par de vertices y puede tener lazos/bucles. </p>
                            </div>
                        </div>
                        <div class="collapse" id="Grafodirigido">
                            <div class>
                                <div class="row d-flex justify-content-center">
                                    <h4 class="textocolor fredoka">Grafo Dirigido</h4>
                                </div>
                                <p class="textocolor lato">Un grafo dirigido G, también llamado digrafo, es lo mismo que un
                                multigrafo, solo que cada arista de G tiene una dirección asignada.</p>
                            </div>
                        </div>
                        <div class="collapse" id="Multigrafodirigido">
                            <div class>
                                <div class="row d-flex justify-content-center">
                                    <h4 class="textocolor fredoka">Multigrafo Dirigido</h4>
                                </div>
                                <p class="textocolor lato">Un multigrafo dirigido G = (V, A) consta de un conjunto V de vértices, un conjunto A de aristas,
                                     donde puede poseer más una arista entre un par de vertices, puede tener lazos/bucles pero las aristas tienen una direccion asignada.</p>
                            </div>
                        </div>
                    </div>
                </div>               
            </div>
        </div>
        <div class="row justify-content-center mt-2">
            <div class="col-md-12 card cardaux mt-5">
                <h1 class="textocolor fredoka ">Para trabajar con los Grafos introducidos en esta sección, seleccione Grafos.</h1>
            </div>
        </div>
            
        
    </div>
    
</template>