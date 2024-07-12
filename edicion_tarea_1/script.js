function colapsar(elemento){
    console.log(elemento.childNodes);
    let display = ""
    for(let i = 0; i < elemento.childNodes.length; i++){
        if(elemento.childNodes[i].nodeName == "DIV"){
            display = elemento.childNodes[i].style.display;
            break;
        }
    }
    console.log(display);
    for(let i = 0; i < elemento.childNodes.length; i++){
        if(elemento.childNodes[i].nodeName != "H3"){
            if(elemento.childNodes[i].style != undefined){
                elemento.childNodes[i].style.display = display != 'none'? 'none':'block';
            } 
        }
    }
    /*
    if (elemento.childNodes[1].style.display != "none"){
        elemento.childNodes[1].style.display = "none";
        elemento.childNodes[5].style.display = "none";
    }else{
        elemento.childNodes[1].style.display = "block";
        elemento.childNodes[5].style.display = "block";
    }
    */
}