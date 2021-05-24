function main2(json){
    let Lista = document.createElement("div");
    Lista.setAttribute("class","ListaAPI");
    let Met = document.createElement("div");
    Met.setAttribute("class","meteo");
    let C = document.createElement("h1");
    let Ci = document.createTextNode(json.term);
    C.appendChild(Ci);
    Met.appendChild(C);
    Lista.appendChild(Met);

    for(let c of json.suggestions[1].entities)
    {
        let cont = document.createElement("div");
        cont.setAttribute("class","L");
        let Nome = document.createElement("h2");
        Nome.textContent = c.name;
        let X = document.createElement("h3");
        const Pre = document.createElement("a");
        Pre.setAttribute("class","F");
        Pre.textContent = "Aggiungi Hai Preferiti";
        X.appendChild(Pre);
        cont.appendChild(Nome);
        cont.appendChild(X);
        Lista.appendChild(cont);
    }
    cout.appendChild(Lista);
    let Linea = document.createElement("div");
    Linea.setAttribute("class","linea");
    cout.appendChild(Linea);

    fetch("http://api.weatherstack.com/current?access_key="+M+"&query="+json.term).then(onSuccess).then(onJson2).then(onError);
}

function onSuccess(response){
    return response.json()
}
function onError(error){
    console.log('Error' + error);
}
function onJson(json){
    console.log(json);
    main2(json);
}

    fetch("http://localhost/php7/API.php",{headers:{
    }}).then(onSuccess).then(onJson).then(onError);