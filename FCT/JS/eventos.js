document.addEventListener("readystatechange", cargarEventos, false);

function cargarEventos(evento) {
	if(document.readyState == "interactive") {
        document.getElementById("id_servicios").addEventListener("change",serv,false);
    }
}
function serv(){
    var a = document.getElementById("id_servicios").value;
    if (a == "regalo") {
        window.location="regalo/regalo.php";
    } else if (a == "concierto") {
        window.location="banda/banda.php";
    } else if(a == "acompanante") {
        
    }
}

