<template>
    <div class="container mt-5 pt-4">
        <h1 class="fredoka textocolor my-2">Tipos de grafos con los que se trabajara en esta aplicacion web:</h1>
        <!-- DROPDOWN CON INFO -->
        <div class="btn-group-vertical mt-4" role="group" aria-label="Button group with nested dropdown">
            <div class="btn-group dropright" role="group">
                <button id="grafosimple" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Grafo simple
                </button>
                <div class="dropdown-menu text-muted p-3 info" style="min-width: 800px; min-height: 100px;" aria-labelledby="grafosimple">
                    <p class="textocolor lato" >Un grafo simple G = (V, A) costa de un conjunto no vacío de vértices V y de
                            un conjunto A de pares no ordenados llamados aristas. En otras palabras un grafo simple es un grafo en
                            los que existe a lo más una arista que une dos vértices distintos.</p>
                </div>
            </div>
            <div class="btn-group dropright" role="group">
                <button id="multigrafo" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Multigrafos
                </button>
                <div class="dropdown-menu text-muted p-3 info " style="min-width: 800px; min-height: 100px" aria-labelledby="multigrafo">
                    <p class="textocolor lato"> Un multigrafo G = (V, A) consta de un conjunto V de vértices, un conjunto A de aristas, donde puede haber más de una arista entre un par de vertices y puede tener lazos/bucles. </p>
                </div>
            </div>
            <div class="btn-group dropright" role="group">
                <button id="grafodirigido" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Grafo dirigido
                </button>
                <div class="dropdown-menu text-muted p-3 info " style="min-width: 800px; min-height: 100px" aria-labelledby="grafodirigido">
                    <p class="textocolor lato">Un grafo dirigido G, también llamado digrafo, es lo mismo que un
                    multigrafo, solo que cada arista de G tiene una dirección asignada.</p>
                </div>
            </div>
            <div class="btn-group dropright" role="group">
                <button id="multidirigido" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Multigrafo Dirigido
                </button>
                <div class="dropdown-menu text-muted p-3 info " style="min-width: 800px; min-height: 100px" aria-labelledby="multidirigido">
                    <p class="textocolor lato">Un multigrafo dirigido G = (V, A) consta de un conjunto V de vértices, un conjunto A de aristas, donde puede poseer más una arista entre un par de vertices, puede tener lazos/bucles pero las aristas tienen una direccion asignada.</p>
                </div>
            </div>
        </div>
        <h1 class="textocolor fredoka mt-5">Apretar Grafo para seguir trabajando</h1>
    </div>
</template>