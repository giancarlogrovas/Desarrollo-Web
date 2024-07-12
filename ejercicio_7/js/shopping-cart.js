
let productos = {};

async function addProducto(i){
    let carrito = JSON.parse(localStorage.getItem("cart"));
    if(carrito === null || carrito === undefined){
        carrito = [];
    }
    productos = await (await fetch('./db/productos.json')).json();

    let inCarrito = false;
    for(let j = 0; j < carrito.length; j++){
        if(carrito[j].nombre == productos[i].nombre){
            carrito[j].cantidad += 1;
            inCarrito = true;
        }
    }

    if(!inCarrito){
        productos[i].cantidad = 1;
        carrito.push(productos[i]);
    }
    
    localStorage.setItem("cart",JSON.stringify(carrito));
    updateCart();
    console.log(localStorage.getItem("cart"));
}

function updateCart(){
    let carrito = JSON.parse(localStorage.getItem("cart"));
    if(carrito === null || carrito === undefined){
        return;
    }

    if(carrito.length>0){
        //document.getElementById('product-number').innerHTML = "("+carrito.length+")";
        $('#product-number').html("("+carrito.length+")");
    }else{
        $('#product-number').html("");
    }
    
}

updateCart();