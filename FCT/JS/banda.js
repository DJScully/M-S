document.addEventListener("readystatechange", cargarEventos, false);

function cargarEventos(evento) {
	if(document.readyState == "interactive") {
        document.getElementById("id_style").addEventListener("change",estilo,false);
    }
}

function estilo(){
    var a = document.getElementById("id_style").value;
    if (a == "electro" || a == "concierto") {
        document.getElementsByClassName("inactive")[0].style.display = "flex";
    } else {
        document.getElementsByClassName("inactive")[0].style.display = "none";

    }
}