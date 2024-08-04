window.onload=()=>{
    obtenerimg();
    modificarimg();
}

async function obtenerimg(){
   let url = "http://localhost/Gestor_De_Imagenes/backend/controlador/controlador.php?request=obtenerimg";
   let respuesta = await fetch(url);
   let datos = await respuesta.json();
   console.log(datos)
   mostrarImg(datos);
}

function mostrarImg(datos){
    let divimg = document.querySelector("#listaimg");
    divimg.innerHTML="";
    datos.forEach(imagen => {
        divimg.innerHTML+=`
        <div>
        <h3>Nombre de la imagen</h1>
        <h5>${imagen.nombre}</h5>
        <img src="../../../backend/imagenes/${imagen.id}.${imagen.extension}">
        </div>
        `
    });
}