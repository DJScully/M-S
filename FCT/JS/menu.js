document.addEventListener("readystatechange", cargarEventos, false);

function cargarEventos(evento) {
	if(document.readyState == "interactive") {
        document.getElementById("toogle").addEventListener("click",openNav,false);
        for (let index = 0; index < document.getElementsByClassName("fullWidth").length; index++) {
          
            document.getElementsByClassName("fullWidth")[index].addEventListener("mouseenter",returned,false);
        }
        
    }
}
var cont = 0;
function openNav() {
    var a = document.getElementsByClassName("fullWidth")[0].offsetWidth;
    
    if( a < 1324 && cont %2 == 0){
        document.getElementById("toogle").style.transition = ".3s";
        
       
       
        document.getElementsByClassName("list-group")[0].style.position = "absolute";
        document.getElementsByClassName("list-group")[0].style.display = "flex";  
        var altura =  document.getElementsByClassName("list-group")[0].offsetHeight;
        document.getElementsByClassName(" swiper-container")[0].style.marginTop = altura+"px";
        //document.getElementsByClassName("list-group")[0].style.height = altura+"px";
      
        document.getElementsByClassName("list-group")[0].style.right = "0";
       // alert(document.getElementsByClassName("header")[0].offsetHeight);
       // alert( a);
      //  document.getElementsByClassName("list-group")[0].style.width = a + "px";
        document.getElementById("toogle").innerHTML = "X";
        cont +=1;

     
    } else if(a < 1324 && cont %2 != 0) {
        document.getElementsByClassName("list-group")[0].style.display = "none";

        document.getElementsByClassName(" swiper-container")[0].style.marginTop = 0;
        document.getElementsByClassName("list-group")[0].style.right = "-100%";
        document.getElementById("toogle").innerHTML = "☰";
        document.getElementsByClassName("list-group")[0].style.position = "relative"
        cont +=1;
    }

   /* document.getElementById("boton").removeEventListener("click", closeBtn);
    document.getElementById("boton").addEventListener("click",openNav,false);*/
}

function returned(){
    //alert("al");
    var a = document.getElementsByClassName("fullWidth")[0].offsetWidth;
    if (a > 1324){
        document.getElementsByClassName(" swiper-container")[0].style.marginTop = 0;
        document.getElementsByClassName("list-group")[0].style.display = "flex"; 
        document.getElementsByClassName("list-group")[0].style.right = "0";
        document.getElementsByClassName("list-group")[0].style.position = "relative";
    }
}



