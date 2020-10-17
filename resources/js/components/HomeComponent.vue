<template>
    <div class="container mt-5 pt-4">
        <h1 class="fredoka textocolor my-2">Tipos de grafos con los que se trabajara en esta aplicacion web:</h1>
        <div class="row bg-white rounded shadow mt-4 cardaux">
            <div class="col-12 cardaux">
                <div class="row d-flex justify-content-center mx-2 my-2 pt-2">
                    <h4 class="textocolor fredoka my-2">Tipos de grafos</h4>
                </div>
                <hr>
                <div class="row accordion" id="tiposdegrafos">
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
                        <li class="list-group-item analisis info textocolor" data-toggle="collapse" data-target="#Grafoetiquetado" aria-expanded="false" aria-controls="Grafoetiquetado">
                            Grafo Etiquetado
                        </li>
                    </ul>
                    <div class="col-lg-7 col-sm--12 my-2">
                        <div class="collapse" id="Grafosimple" data-parent="#tiposdegrafos">
                            <div class>
                                <div class="row d-flex justify-content-center">
                                    <h4 class="textocolor fredoka">Grafo Simple</h4>
                                </div>
                                <p class="textocolor lato" >Un grafo simple G = (V, A) costa de un conjunto no vacío de vértices V y de
                                un conjunto A de pares no ordenados llamados aristas. En otras palabras un grafo simple es un grafo en
                                los que existe a lo más una arista que une dos vértices distintos.</p>
                                <div class="row justify-content-center">
                                    <div class="image-parent">
                                        <img src="https://sites.google.com/site/matematicasmoralesgalindo/_/rsrc/1464559450575/6-1-elementos-y-caracteristicas-de-los-grafos/6-1-2-tipos-de-grafos-simples-completos-bipartidos-planos-conexos-ponderados/grafo%20completo.png?height=145&width=200" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="collapse" id="Multigrafo" data-parent="#tiposdegrafos">
                            <div class>
                                <div class="row d-flex justify-content-center">
                                    <h4 class="textocolor fredoka">Multigrafo</h4>
                                </div>
                                <p class="textocolor lato"> Un multigrafo G = (V, A) consta de un conjunto V de vértices, un conjunto A de aristas,
                                     donde puede haber más de una arista entre un par de vertices y puede tener lazos/bucles. </p>
                                <div class="row justify-content-center">
                                    <div class="image-parentmg">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/28/6n-graph2.svg/1200px-6n-graph2.svg.png" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="collapse" id="Grafodirigido" data-parent="#tiposdegrafos">
                            <div class>
                                <div class="row d-flex justify-content-center">
                                    <h4 class="textocolor fredoka">Grafo Dirigido</h4>
                                </div>
                                <p class="textocolor lato">Un grafo dirigido G, también llamado digrafo, es lo mismo que un
                                multigrafo, solo que cada arista de G tiene una dirección asignada.</p>
                                <div class="row justify-content-center">
                                    <div class="image-parentmg">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/Directed.svg/1200px-Directed.svg.png" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="collapse" id="Multigrafodirigido" data-parent="#tiposdegrafos">
                            <div class>
                                <div class="row d-flex justify-content-center">
                                    <h4 class="textocolor fredoka">Multigrafo Dirigido</h4>
                                </div>
                                <p class="textocolor lato">Un multigrafo dirigido G = (V, A) consta de un conjunto V de vértices, un conjunto A de aristas,
                                     donde puede poseer más una arista entre un par de vertices, puede tener lazos/bucles pero las aristas tienen una direccion asignada.</p>
                                <div class="row justify-content-center">
                                    <div class="image-parent">
                                        <img src="https://sites.google.com/site/matematicasmoralesgalindo/_/rsrc/1464555806675/6-1-elementos-y-caracteristicas-de-los-grafos/6-1-2-tipos-de-grafos-simples-completos-bipartidos-planos-conexos-ponderados/grafo.png?height=182&width=200" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="collapse" id="Grafoetiquetado" data-parent="#tiposdegrafos">
                            <div class>
                                <div class="row d-flex justify-content-center">
                                    <h4 class="textocolor fredoka">Grafo Etiquetado</h4>
                                </div>
                                <p class="textocolor lato">Un grafo G se dice que esta etiquetado si sus aristas tienen datos asignados. En
                                    particular, se dice que G tiene peso si cada arista e de G tiene asignado un valor numérico
                                    no negativo w (e) llamado peso o longitud de e. En este caso, a cada camino P de G se le
                                    asigna un peso o una longitud que es la suma de los pesos de las aristas que constituyen el
                                    camino P.</p>
                                <div class="row justify-content-center">
                                    <div class="image-parent">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/97/Graceful_labeling.svg/440px-Graceful_labeling.svg.png" class="img-fluid">
                                    </div>
                                </div>
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