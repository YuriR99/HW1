function jsonCheckUsername(json){
    if(username = !json.exists){
        document.querySelector('.SUsername').classList.add('N');
    }else{
        document.querySelector('.SUsername').textContent = "Nome utente già utilizzato";
        console.log("YES");
        document.querySelector('.SUsername').classList.remove('N');
    }
    
}

function jsonCheckEmail(json){

    if(formStatus.email = !json.exists){
        document.querySelector('.SEmail').classList.add('N');
    }else{
        document.querySelector('.SEmail').textContent = "Email già utilizzata";
        document.querySelector('.SEmail').classList.remove('N');
    }
}

function fetchResponse(response){
    if(!response.ok) return null;
    return response.json();
}

function Username(event){
    const input = document.querySelector('.Username');
    if(fetch("check_username.php?q="+encodeURIComponent(input.value)).then(fetchResponse).then(jsonCheckUsername)){
        input.parentNode.parentNode.parentNode.querySelector('.SUsername').classList.remove('N');
    }else{
        input.parentNode.parentNode.parentNode.querySelector('.SUsername').textContent = "L'username è disponibile";
        input.parentNode.parentNode.parentNode.querySelector('.SUsername').classList.add('N');
    }
}

function checkEmail(event) {
    const emailInput = document.querySelector('.Email');
    if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(emailInput.value).toLowerCase())) {
        document.querySelector('.SEmail').textContent = "Email non valida";
        emailInput.parentNode.parentNode.parentNode.querySelector('.SEmail').classList.remove('N');
        formStatus.email = false;
        
    } else {
        fetch("check_email.php?q="+encodeURIComponent(String(emailInput.value).toLowerCase())).then(fetchResponse).then(jsonCheckEmail);
    }
}

function checkPassword(event){
    console.log(passwordInput.parentNode.parentNode.parentNode);
    if(passwordInput.value.length <4){
        passwordInput.parentNode.parentNode.parentNode.querySelector('.SPassword').textContent = "La Password deve contenre minimo 4 caratteri";
        passwordInput.parentNode.parentNode.parentNode.querySelector('.SPassword').classList.remove('N');
    }else{
        passwordInput.parentNode.parentNode.parentNode.querySelector('.SPassword').classList.add('N');
    }
}

function checkConfirmPassword(event){
    const passwordConfirm = document.querySelector('.ConfirmPass');
    if(passwordConfirm.value != passwordInput.value){
        passwordConfirm.parentNode.parentNode.parentNode.querySelector('.SConfirm').textContent = "Le Password non coincidono";
        passwordConfirm.parentNode.parentNode.parentNode.querySelector('.SConfirm').classList.remove('N');
    } else {
        passwordConfirm.parentNode.parentNode.parentNode.querySelector('.SConfirm').classList.add('N');
    }
}


function checkTelfono(){
    const Tel = document.querySelector('.Telefono');
    if(Tel.value.length == 10){
        document.querySelector('.STel').classList.add('N'); 
    }else{
        if(Tel.value.length <10){
            document.querySelector('.STel').textContent = "Manca qualche numero";
            document.querySelector('.STel').classList.remove('N');
        }if(Tel.value.length>10){
            document.querySelector('.STel').textContent = "C'è qualche numero id troppo";
            document.querySelector('.STel').classList.remove('N'); 
        }
    }
}
const formStatus = {};
const passwordInput = document.querySelector('.Password');
document.querySelector('.Username').addEventListener('blur', Username);
document.querySelector('.Email').addEventListener('blur', checkEmail);
document.querySelector('.Password').addEventListener('blur', checkPassword);
document.querySelector('.ConfirmPass').addEventListener('blur', checkConfirmPassword);
document.querySelector('.Telefono').addEventListener('blur',checkTelfono);

