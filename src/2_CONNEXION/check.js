function check(){
    const log = document.getElementById('log');
    const err = document.getElementById('error');
    if(log.value === ''){
        error.style.color = 'red';
        error.innerHTML ="Veuillez inserer un login";
        return false;
    }
     return true;
}

// const form = document.getElementById('form_connexion');
// const id = document.getElementById('id');
// const error = document.getElementById('msg');

// function check() {
//     for(;;){
//         if(id===" "){
//             console.log("dsad");
//             return false;
//             break;
//         }  
//         else{ return true; break;}
//     }
    
// }
