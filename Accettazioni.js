function ACC(json){
    const IaD = document.createElement("div");
    const T = document.createElement("table");
        const TR = document.createElement("tr");
        const TD = document.createElement("td");
        const TD1 = document.createElement("td");
        const TD2 = document.createElement("td");
        TD.textContent = 'Hotel';
        TR.appendChild(TD);
        TD1.textContent = 'Stanza';
        TR.appendChild(TD1);
        TD2.textContent = 'Data Check In';
        TR.appendChild(TD2);
        T.appendChild(TR);
        for(let c of json){
        const TR1 = document.createElement("tr");
        const TD3 = document.createElement("td");
        const TD4 = document.createElement("td");
        const TD5 = document.createElement("td");
        TD3.textContent = c.Nome_Hotel;
        TR1.appendChild(TD3);
        TD4.textContent = c.Tipo_Stanza;
        TR1.appendChild(TD4);
        TD5.textContent = c.Data_In;
        TR1.appendChild(TD5);
        T.appendChild(TR1);
        }
        IaD.appendChild(T);
        Ia.appendChild(IaD);
}
function onSuccess(response){
    return response.json()
}
function onError(error){
    console.log('Error' + error);
}
function onJson3(json){
    console.log(json);
    ACC(json);
}

fetch("Accettazioni.php").then(onSuccess).then(onJson3).then(onError);

const Ia = document.querySelector('#IA');