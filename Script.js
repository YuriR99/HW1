function AggPref2(event){
    let H = event.currentTarget.parentNode.parentNode.querySelector('h2').textContent;
    fetch("Agg_Pref.php?Hotel="+H);
    event.currentTarget.parentNode.parentNode.querySelector('h3').classList.add("N");
}
function main3(json){
    let Lista = document.createElement("div");
    Lista.setAttribute("class","ListaAPI");
    let Met = document.createElement("div");
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
        Pre.textContent = "Aggiungi Ai Preferiti";
        X.appendChild(Pre);
        cont.appendChild(Nome);
        cont.appendChild(X);
        Lista.appendChild(cont);
        Pre.addEventListener("click", AggPref2);
        Gif.classList.add("N");
    }
    cout.appendChild(Lista);
    let Linea = document.createElement("div");
    Linea.setAttribute("class","linea");
    cout.appendChild(Linea);
    

}
function onSuccess(response){
    return response.json()
}
function onError(error){
    console.log('Error' + error);
}
function onJson3(json){
    console.log(json);
    main3(json);
}

function CercaH(event){
    cout.appendChild(Gif);
    Gif.classList.remove("N");
    let val = document.querySelector('#Ricerca').value;
    console.log(val);
    fetch("API.php?Citta="+val).then(onSuccess).then(onJson3).then(onError);
}





const hotel = document.querySelector("#ImgS");
const Pref = document.querySelector("#Preferiti");
const searchBar = document.getElementById('Ricerca');
const cout = document.querySelector("#ListaH");
const Gif = document.createElement("img");
Gif.src = "Load.gif";
document.querySelector('#R').addEventListener('click',CercaH);


console.log(searchBar);

main();


/* API */







