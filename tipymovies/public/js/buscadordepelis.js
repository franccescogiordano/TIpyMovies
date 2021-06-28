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

        		document.getElementById("linkpelicuevana").href = item.link;   
            else if (buscador=="gnula")
                document.getElementById("linkpelignula").href = item.link;  
            else if (buscador=="cuevanalive")
                document.getElementById("linkpelicuevanalive").href = item.link; 
            else if (buscador=="cinecalidad")
                document.getElementById("linkpelicinecalidad").href = item.link;
            else if (buscador=="pelisflix")
                document.getElementById("linkpelipelisflix").href = item.link; 
            // in production code, item.htmlTitle should have the HTML entities escaped.


             // document.getElementById("linkpeli").href = item.link;
              // document.getElementById("linkpeli").href = item.link;
        // }
    }

    gapi.load("client");
