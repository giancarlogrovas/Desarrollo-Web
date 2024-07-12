function updateList(){
    let carrito = JSON.parse(localStorage.getItem("cart"));
    if(carrito === null || carrito === undefined ||  carrito.length == 0){
        return;
    }

    $('#carrito').html('');

    let tbody = "";
    for(let i = 0; i < carrito.length; i++){
        let elem = "<tr>";
        elem += "<td>"+carrito[i].nombre+"</td>";
        elem += "<td>"+carrito[i].precio+"</td>";
        elem += "<td><input id='prod-c-"+i+"' type='number' value='"+carrito[i].cantidad+"'/></td>";
        elem += "<td><button class='btn btn-sm btn-danger' onclick='delItem("+i+")'><i class='fa fa-trash'></i></button></td>";
        elem += "</tr>";
        tbody += elem;
    }
    $('#carrito').html(tbody);
}

function pagar(){
    alert("Ha pagado con éxito!");
    localStorage.setItem("cart","[]");
    location.href = "./misProductos.php";
}

updateList();