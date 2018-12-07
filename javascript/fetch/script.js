let content = document.getElementById('content');
        
function getData(){
    fetch_1();
    // fetch_2();
}






function fetch_1(){
    fetch( "https://ghibliapi.herokuapp.com/films", {
        method: "GET",
        // mode: 'cors',
        // cache: 'default',
        // headers: {
        //     Authorization: `Bearer ${userAccessToken}`     
        // },
        // body: 'foo=bar&lorem=ipsum'
    })
    // Se obtiene un objeto Response del cual se puede obtener una promesa 
    // utilizando la función .json(), al ser retornada esta puede
    // ser manejada como una promesa independiente (por fuera del primer "then")
    // o dentro de la misma haciendo uso del "then" junto a la llamada de .json
    // en el cual se obtiene el objeto del response (JSON o cualquiera enviado por el server)
    // EX: response.json().then( callback(data) ) (mirar funcion "fetch_2")
    .then( response => response.json() )
    .then( films => {
        films.forEach( (film, index) => {
            // console.log(`Film ${index} starts at ${film.start}`);
            let draft = content.innerHTML;
            content.innerHTML = draft + film.title + "<br>";
        });
        console.log("OK");
    })
    .catch(function(error) {
        console.log('Hubo un problema con la petición Fetch: ' + error.message);
    });
}



function fetch_2(){
    fetch( "https://ghibliapi.herokuapp.com/films", {
        method: "GET"
    })
    .then( response => {
        // revisando codigo de respuetsa
        if (response.status !== 200) {
            console.log('Looks like there was a problem. Status Code: ' + response.status);
            return;
        }

        // obteniendo headers
        console.log( response.headers.get('Content-Type') );

        // si no hay errores, se obtiene JSON de response (promesa)
        response.json()
            .then( function(data){
                console.log(data);
            });
    })
    .catch(function(error) {
        console.log('Hubo un problema con la petición Fetch: ' + error.message);
    });
}