const NAME = document.getElementById("name");
const ADDRESS = document.getElementById("address");
const EMAIL = document.getElementById("email");
const TEL = document.getElementById("tel");
const USER = document.getElementById("user");
const PASS = document.getElementById("pass");
const PASS2 = document.getElementById("pass2");
const FORM = document.form;
var elementos = FORM.elements;
let btn = document.getElementById("btn-submit");

const EXPRESION = /\w+@\w+\.+[a-z]/;

btn.addEventListener('click', (e) => {
    if(NAME.value === "") {
        NAME.focus();
        NAME.className = "input-field input-danger";
        e.preventDefault();
    } else if(ADDRESS.value === "") {
        ADDRESS.focus();
        ADDRESS.className = "input-field input-danger";
        e.preventDefault();
    } else if(EMAIL.value === "") {
        EMAIL.focus();
        EMAIL.className = "input-field input-danger";
        e.preventDefault();
    } else if(!EXPRESION.test(EMAIL.value)) {
        EMAIL.focus();
        EMAIL.className = "input-field input-danger";
        e.preventDefault();
    } else if(TEL.value === "") {
        TEL.focus();
        TEL.className = "input-field input-danger";
        e.preventDefault();
    } else if(USER.value === "") {
        USER.focus();
        USER.className = "input-field input-danger";
        e.preventDefault();
    } else if(USER.value.length > 10) {
        USER.focus();
        USER.className = "input-field input-danger";
        e.preventDefault();
    } else if(PASS.value === "") {
        PASS.focus();
        PASS.className = "input-field input-danger";
        e.preventDefault();
    } else if(PASS2.value === "") {
        PASS2.focus();
        PASS2.className = "input-field input-danger";
        e.preventDefault();
    } else if(PASS.value !== PASS2.value) {
        PASS.value = "";
        PASS2.value = "";
        PASS.className = "input-field input-danger";
        PASS2.className = "input-field input-danger";
        PASS.focus();
        e.preventDefault();
    } else {
        e.preventDefault();
        saveUser();        
    }
});

for(let i = 0; i < elementos.length; i++) {
    if((elementos[i].type === 'text') || ((elementos[i].type === 'password'))) {
        elementos[i].addEventListener('focus', (e) => {            
            elementos[i].parentElement.children[0].className = "label-input label-active";
            elementos[i].parentElement.children[1].className = "input-field";
        });
        elementos[i].addEventListener('blur', (e) => {
            if(elementos[i].value <= 0) {                
                elementos[i].parentElement.children[0].className = "label-input";
                elementos[i].parentElement.children[1].className = "input-field input-danger";
            }            
        });
    }
}

function hide(container) {
    setTimeout(
        () => {
            container.className = "container-msj hide";
        }, 
        3000
    );
}

function saveUser() {
    console.log("name=" + NAME.value + "&address=" + ADDRESS.value + "&mail=" + EMAIL.value + "&tel=" + TEL.value + "&user=" + USER.value + "&pass=" + PASS.value);    
    let xhr = new XMLHttpRequest();
    xhr.open('POST', '../controller/CreateUser.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = () => {
        let resp = xhr.responseText;
        let status = xhr.readyState;
        if(status == 4) {
            if(resp === "1") {
                console.log("Usuario Guardado", resp);
            } else {
                console.log("ERROR: ", resp);
            }
        }
    };
    xhr.send("name=" + NAME.value + "&address=" + ADDRESS.value + "&mail=" + EMAIL.value + "&tel=" + TEL.value + "&user=" + USER.value + "&pass=" + PASS.value);
}
