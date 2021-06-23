@extends('layout')

@section('content')
<div>

</div>
<div class="container">

	<div class="d-flex justify-content-center">
		<img class="img-fluid" id="Poster" src='{{ $peliculas->getPoster() }}' alt='{{ $peliculas->getTitulo() }}' >
	</div>
	<ul >
		<li>Titulo: {{$peliculas->getTitulo()}}</li>
		<li>Duracion : {{$peliculas->getRuntime()}}</li>
		<li>Clasificacion : {{$peliculas->getRated()}}</li>
		<li>Sinopsis: {{$peliculas->getPlot()}}</li>
		<li>Genero: {{$peliculas->getGenero()}}</li>
		<li>Actores: {{$peliculas->getActores()}}</li>
	</ul>
    <div class="d-flex justify-content-center">
        <p class="heading">Opciones para ver:</p>
    </div>
	<div class="d-flex justify-content-center">
		<a class="botoncito" href="" id="linkpeli" target="_blank">Ver Pelicula</a>
		<a class="botoncito" href="" id="linkpelicuevana" target="_blank">Cuevana</a>
        <a class="botoncito" href="" id="linkpelignula" target="_blank">Gnula</a>
        <a class="botoncito" href="" id="linkpelicuevanalive" target="_blank">Cuevana live</a>
        <a class="botoncito" href="" id="linkpelicinecalidad" target="_blank">Cine Calidad</a>
        <a class="botoncito" href="" id="linkpelipelisflix" target="_blank">Pelisflix</a>
	</div><br>
    <div class="d-flex justify-content-center">
        @auth
        <a class="botoncito" href="{{ Route('MiniJuego1', ['titulo' => $peliculas->getTitulo(), 'imdbID' => $peliculas->getId()]) }}" id="linkpeli">Jugar</a>
        <a class="botoncito" href="{{ Route('Agregar.pregunta', ['titulo' => $peliculas->getTitulo(), 'imdbID' => $peliculas->getId()]) }}" id="linkpeli">Agregar pregunta</a>
        @endauth
    </div>

</div>
<script src="https://apis.google.com/js/api.js"></script>
<script>
	window.onload=loadClient;
	 //loadClient("datospeli");
	// sleep(500);
	 //execute("datospeli");
  /**
   * Sample JavaScript code for search.cse.list
   * See instructions for running APIs Explorer code samples locally:
   * https://developers.google.com/explorer-help/guides/code_samples#javascript
   */

   function getParameterByName(name) {
   	name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
   	var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
   	results = regex.exec(location.search);
   	return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
   }

   function sleep(ms) {
   	return new Promise(resolve => setTimeout(resolve, ms));
   }
   function loadClient() {

   	gapi.client.setApiKey("AIzaSyByZD4zxHn5Z6VaC09o618n85H4AL-Kf_0");
   	return gapi.client.load("https://content.googleapis.com/discovery/v1/apis/customsearch/v1/rest")
   	.then(function() {
   		execute();
   		console.log("GAPI client loaded for API");
   		executecuevana();
        executegnula();
        executecuevanalive();
        executecinecalidad();
        executepelisflix();
   	},
   	function(err) { console.error("Error loading GAPI client for API", err); });

   }
  // Make sure the client is loaded before calling this method.
  function execute() {
    var idpeli = "<?php echo $peliculas->getTitulo() ?>";//getParameterByName('titlepeli');
    return gapi.client.search.cse.list({
    	"cx": "4fbfe7043c59bf552",
    	"exactTerms": idpeli
    })
    .then(function(response) {
                // Handle the results here (response.result has the parsed body).
                console.log("Response", response.body);
                hndlr(response.body,"general");
            },
            function(err) { console.error("Execute error", err); });
}

function executecuevana() {
    var idpeli = "<?php echo $peliculas->getTitulo() ?>";//getParameterByName('titlepeli');
    return gapi.client.search.cse.list({
    	"cx": "940606f731f5063c3",
    	"exactTerms": idpeli
    })
    .then(function(response) {
                // Handle the results here (response.result has the parsed body).
                console.log("Response", response.body);
                hndlr(response.body,"cuevana");
            },
            function(err) { console.error("Execute error", err); });
}

function executegnula() {
    var idpeli = "<?php echo $peliculas->getTitulo() ?>";//getParameterByName('titlepeli');
    return gapi.client.search.cse.list({
        "cx": "439931c605d1d5492",
        "exactTerms": idpeli
    })
    .then(function(response) {
                // Handle the results here (response.result has the parsed body).
                console.log("Response", response.body);
                hndlr(response.body,"gnula");
            },
            function(err) { console.error("Execute error", err); });
}

function executecuevanalive() {
    var idpeli = "<?php echo $peliculas->getTitulo() ?>";//getParameterByName('titlepeli');
    return gapi.client.search.cse.list({
        "cx": "811695755b88a6ae1",
        "exactTerms": idpeli
    })
    .then(function(response) {
                // Handle the results here (response.result has the parsed body).
                console.log("Response", response.body);
                hndlr(response.body,"cuevanalive");
            },
            function(err) { console.error("Execute error", err); });
}

function executecinecalidad() {
    var idpeli = "<?php echo $peliculas->getTitulo() ?>";//getParameterByName('titlepeli');
    return gapi.client.search.cse.list({
        "cx": "37dcf2f17ad42f967",
        "exactTerms": idpeli
    })
    .then(function(response) {
                // Handle the results here (response.result has the parsed body).
                console.log("Response", response.body);
                hndlr(response.body,"cinecalidad");
            },
            function(err) { console.error("Execute error", err); });
}

function executepelisflix() {
    var idpeli = "<?php echo $peliculas->getTitulo() ?>";//getParameterByName('titlepeli');
    return gapi.client.search.cse.list({
        "cx": "84cf979474c1da608",
        "exactTerms": idpeli
    })
    .then(function(response) {
                // Handle the results here (response.result has the parsed body).
                console.log("Response", response.body);
                hndlr(response.body,"pelisflix");
            },
            function(err) { console.error("Execute error", err); });
}

function hndlr(response, buscador) {
    //for (var i = 0; i < response.items.length; i++) {
    	var response = JSON.parse(response);
    	var item = response.items[0];
    	console.log(response);
    	console.log(item);
    	if (buscador=="general")
    		document.getElementById("linkpeli").href = item.link;
    	else if (buscador=="cuevana")
<<<<<<< HEAD
    		document.getElementById("linkpelicuevana").href = item.link;   
        else if (buscador=="gnula")
            document.getElementById("linkpelignula").href = item.link;  
        else if (buscador=="cuevanalive")
            document.getElementById("linkpelicuevanalive").href = item.link; 
        else if (buscador=="cinecalidad")
            document.getElementById("linkpelicinecalidad").href = item.link;
        else if (buscador=="pelisflix")
            document.getElementById("linkpelipelisflix").href = item.link; 
=======
    		document.getElementById("linkpelicuevana").href = item.link;
>>>>>>> 26d57713c8fc0615b935584b52dc9b9dde818d5b
        // in production code, item.htmlTitle should have the HTML entities escaped.


         // document.getElementById("linkpeli").href = item.link;
          // document.getElementById("linkpeli").href = item.link;
    // }
}

gapi.load("client");
</script>


@endsection
