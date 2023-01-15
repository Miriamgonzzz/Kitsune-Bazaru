function mostrarPassword() {
    let tipo = document.getElementById("contrasena");
    if(tipo.type=='password'){
        tipo.type='text';
    }else {
        tipo.type='password';

    }

}

function mostrar(){
    let contra = document.getElementById("contrasena2");
    if( contra.type=='password'){
        contra.type='text';
    }else{
        contra.type='password';
    }
}

function validar(){
    let tipo = document.getElementById("contrasena").value;

    if(tipo.search(/[0-9]/)<0){
        document.getElementById("numero").style.color="red";
        document.getElementById("cruzNumero").style.visibility="visible";
        document.getElementById("tickNumero").style.visibility="hidden";
    }else{
        document.getElementById("numero").style.color = "green";
        document.getElementById("cruzNumero").style.visibility="hidden";
        document.getElementById("tickNumero").style.visibility="visible";
    }

    if (tipo.search(/[A-z]/)<0){
        document.getElementById("letra").style.color="red";
        document.getElementById("cruzLetra").style.visibility="visible";
        document.getElementById("tickLetra").style.visibility="hidden";
    }else{
        document.getElementById("letra").style.color = "green";
        document.getElementById("cruzLetra").style.visibility="hidden";
        document.getElementById("tickLetra").style.visibility="visible";

    }

    if (tipo.search(/[A-Z]/)<0){
        document.getElementById("mayuscula").style.color="red";
        document.getElementById("cruzMayuscula").style.visibility="visible";
        document.getElementById("tickMayuscula").style.visibility="hidden";
    }else{
        document.getElementById("mayuscula").style.color = "green";
        document.getElementById("cruzMayuscula").style.visibility="hidden";
        document.getElementById("tickMayuscula").style.visibility="visible";
    }

    if(tipo.length>7) {
        document.getElementById("dimension").style.color = "green";
        document.getElementById("cruzLongitud").style.visibility="hidden";
        document.getElementById("tickDimension").style.visibility="visible";
    }else{
        document.getElementById("dimension").style.color="red";
        document.getElementById("cruzLongitud").style.visibility="visible";
        document.getElementById("tickDimension").style.visibility="hidden";
    }


}

function una(){
    let tipo = document.getElementById("contrasena").value;
    let contra = document.getElementById("contrasena2").value;

    if( tipo == contra  ){
        console.log('llego');
        document.getElementById("comparar").style.color="green";
        document.getElementById("cruzComparar").style.visibility="hidden";
        document.getElementById("tickComparar").style.visibility="visible";
    } else{
        console.log('problemas');
        document.getElementById("comparar").style.color="red";
        document.getElementById("cruzComparar").style.visibility="visible";
        document.getElementById("tickComparar").style.visibility="hidden";
}



}
    function validarUsuario(){

        let tipo = document.getElementById("contrasena").value;


        let errors = [];

        if(document.getElementById("nombre").value=="") {
        alert("Debe escribir su nombre");

        return false;
    }
    if(document.getElementById("apellidos").value==""){
        alert("Debe escribir sus apellidos");

        return false;
    }

    if(tipo==""){
            alert('Falta por rellenar el campo "Email"');

            return false;
    }
    let patronEmail=/^[^@\s]+@[^@\.\s]+(\.[^@\.\s]+)+$/;
    if (!(patronEmail.test(document.getElementById("correo").value))) {
                alert('Contenido del email no es un correo electrónico válido.');

                return false;
            }


    if(tipo==""){
                alert("Debe escribir la contraseña");

                return false;
            }

    let paswd=/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]){8,}$/;
    if(paswd.test(tipo)){
        alert("Contenido de la contraseña no es una contraseña valida");
        return false;
    }

        /*let noquerer=/^(?=.*[@#$%^&-+=()])(?=\\S+$).$/;
    if(noquerer.test(tipo)){
        alert("Contenido de la contraseña no es una contraseña valida");
        return false;
    }*/



    if(document.getElementById("contrasena2").value==""){
                alert("Debe escribir la comprobacion");

                return false;
            }
    if(tipo!=document.getElementById("contrasena2").value){
         alert("Las dos contraseñas deben de ser iguales");

         return false;
    }
        /*errors.push if (errors.length > 0) {
            alert(errors.join("\n"));
            return false;
        }
        return true;*/



        document.altaUsuarios.submit();


}

