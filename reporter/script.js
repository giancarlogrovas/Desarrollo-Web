var datos = [];
async function load(){
    datos = await (await fetch('visitas.json')).json();

    let header = "";
    Object.keys(datos[0]).forEach(k=>{
        header+="<th>"+k+"</th>";
    });
    $('#thead').html(header);



    let resumen = {
        "nac":0,
        "ext":0,
        "lang":{},
    };

    let lineas = [];
    for(let i = 0; i < datos.length; i++){
        let html = "";
        html += "<tr>"
        Object.keys(datos[i]).forEach(k=>{
            html+="<td>"+datos[i][k]+"</td>";
        });
        if (datos[i]['NACIONALID'] == 1){
            resumen['nac']++;
        }else{
            resumen['ext']++;
        }

        resumen['lang'][datos[i]['LENGUA_2']] = resumen['lang'][datos[i]['LENGUA_2']] || 0;
        resumen['lang'][datos[i]['LENGUA_1']] = resumen['lang'][datos[i]['LENGUA_1']] || 0;
        resumen['lang'][datos[i]['LENGUA_3']] = resumen['lang'][datos[i]['LENGUA_3']] || 0;
        resumen['lang'][datos[i]['LENGUA_1']]++;
        resumen['lang'][datos[i]['LENGUA_2']]++;
        resumen['lang'][datos[i]['LENGUA_3']]++;


        html += "</tr>";
        if(i < 10){
            lineas.push(html);
        }  
    }



    let langs = { 'k':0,'v':0};

    delete resumen['lang'][""];
    for(let j = 1; j < 3; j++){
        langs = { 'k':0,'v':0}
        Object.keys(resumen['lang']).forEach(l=>{
            if(langs['v'] < resumen['lang'][l]){
                langs['k'] = l;
                langs['v'] = resumen['lang'][l];
            }
        });
        $('#lang'+j).html(langs['k']);
        delete resumen['lang'][langs['k']];
    }


    $('#nac').html(resumen['nac']);
    $('#ext').html(resumen['ext']);
    $('#tbody').html(lineas.join(''));
}

load();