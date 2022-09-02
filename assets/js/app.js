$(document).ready(function() {
    $(document).on('click','.configurar-servicios',function(){
        let elemento=$(this)[0].parentElement.parentElement;
        let id=$(elemento).attr('idServicios')
        
        $.post('servicios_configurar.php',{id} ,function(response){            
            //window.open("servicios_configurar.php","_self");
        //    console.log(response);
           //windows.open('servicios_configurar.php','_blank');
            //window.open('http://190.66.195.62/resultados/pdf/'+ response +'.pdf'); 
        });
        
        
    });
    $(document).on('click','.estado-deco', function () {
        let element = $(this)[0].parentElement.parentElement;
            let id=$(element).attr('iddeco');            
            $.post('evento_estado.php',{id}, function (response) {
                console.log(response);
                //const task=JSON.parse(response);
                //$('#name').val(task.nombre);
                //$('#description').val(task.descripcion);
                //$('#taskId').val(task.id);
                //editar=true;
            });
    });
    $(document).on('click','.instalar-deco', function () {
        let element = $(this)[0].parentElement.parentElement;
            let id=$(element).attr('iddeco');            
            $.post('evento_instalar.php',{id}, function (response) {
                console.log(response);
                const validacion=JSON.parse(response);
                //console.log(validacion.resultado);
                if(validacion.resultado=="0"){                    
                    //llamamos Evento guardar
                    const postData={
                        NumeroTarjeta: id,
                        Evento: 'INSTALAR',
                        Mensaje: 'CONFIRMADO',
                        Estado: 'ACTIVO'

                    };
                    $.post('evento_guardar.php',postData,function (response){
                        console.log(response);
                    });
                    alert('La Instalacion del DECO - Tarjeta: ' + id + ' se realizo satisfactoriamente');
                    location.reload(true);
                    return;
                }else{                    
                    const postData={
                        NumeroTarjeta: id,
                        Evento: 'INSTALAR',
                        Mensaje: 'RECHAZADO',
                        Estado: ''
                    };
                    $.post('evento_guardar.php',postData,function (response){
                        console.log(response);
                    });
                    alert('No se ha podido realizar la operacion con el DECO, Numero Tarjeta: ' + id + ' DECO Principal no Instalado');
                    //$('#deco_frm').submit();                    
                }
                //const task=JSON.parse(response);
                //$('#name').val(task.nombre);
                //$('#description').val(task.descripcion);
                //$('#taskId').val(task.id);
                //editar=true;
            });
    });
    $(document).on('click','.conectar-deco', function () {
        let element = $(this)[0].parentElement.parentElement;
            let id=$(element).attr('iddeco');            
            $.post('evento_conectar.php',{id}, function (response) {
                console.log(response);
                const validacion=JSON.parse(response);
                if(validacion.resultado=="0"){
                    //llamamos Evento guardar
                    const postData={
                        NumeroTarjeta: id,
                        Evento: 'RECONECTAR',
                        Mensaje: 'CONFIRMADO',
                        Estado: 'ACTIVO'

                    };
                    $.post('evento_guardar.php',postData,function (response){
                        console.log(response);
                    });
                    alert('La Reconexion del DECO - Tarjeta: ' + id + ' se realizo satisfactoriamente');
                    location.reload(true);
                    return;                
                }else{
                    const postData={
                        NumeroTarjeta: id,
                        Evento: 'RECONECTAR',
                        Mensaje: 'RECHAZADO',
                        Estado: ''
                    };
                    $.post('evento_guardar.php',postData,function (response){
                        console.log(response);
                    });
                    alert('No se ha podido realizar la operacion con el DECO, Numero Tarjeta: ' + id);
                }
            });
    });
    $(document).on('click','.desconectar-deco', function () {
        let element = $(this)[0].parentElement.parentElement;
            let id=$(element).attr('iddeco');            
            $.post('evento_desconectar.php',{id}, function (response) {
                console.log(response);                
                const validacion=JSON.parse(response);
                if(validacion.resultado=="0"){
                    //llamamos Evento guardar
                    const postData={
                        NumeroTarjeta: id,
                        Evento: 'DESCONECTAR',
                        Mensaje: 'CONFIRMADO',
                        Estado: 'SUSPENDIDO'

                    };
                    $.post('evento_guardar.php',postData,function (response){
                        console.log(response);
                    });
                    alert('La Desconexion del DECO - Tarjeta: ' + id + ' se realizo satisfactoriamente');
                    location.reload(true);
                    return;                
                }else{
                    const postData={
                        NumeroTarjeta: id,
                        Evento: 'DESCONECTAR',
                        Mensaje: 'RECHAZADO',
                        Estado: ''
                    };
                    $.post('evento_guardar.php',postData,function (response){
                        console.log(response);
                    });
                    $('#procesando').html(``);
                    alert('No se ha podido realizar la operacion con el DECO, Numero Tarjeta: ' + id);
                }
                
            });
            console.log('procesando');
            $('#procesando').html(`<div class="d-flex align-items-center">
            <strong>Procesando, Favor esperar mientras se realiza el evento...</strong>
            <div class="spinner-border ml-auto text-primary" role="status" aria-hidden="true"></div>
        </div>`);
    });
    // DESINSTALAR DECO
    $(document).on('click','.desinstalar-deco', function () {
        let element = $(this)[0].parentElement.parentElement;
            let id=$(element).attr('iddeco');            
            $.post('evento_desinstalar.php',{id}, function (response) {
                console.log(response);
                
                // Cristian Inicio
                const validacion=JSON.parse(response);
                if(validacion.resultado=="0"){
                    //llamamos Evento guardar
                    const postData={
                        NumeroTarjeta: id,
                        Evento: 'DESINSTALAR',
                        Mensaje: 'CONFIRMADO',
                        Estado: 'ASIGNADO'

                    };
                    $.post('evento_guardar.php',postData,function (response){
                        console.log(response);
                    });
                    alert('La Desinstalacion del DECO - Tarjeta: ' + id + ' se realizo satisfactoriamente');
                    location.reload(true);
                    return;                
                }else{
                    const postData={
                        NumeroTarjeta: id,
                        Evento: 'DESINSTALAR',
                        Mensaje: 'RECHAZADO',
                        Estado: ''
                    };
                    $.post('evento_guardar.php',postData,function (response){
                        console.log(response);
                    });
                    alert('No se ha podido realizar la operacion con el DECO, Numero Tarjeta: ' + id);
                }
                //Cristian Fin
            });
    });
    $(document).on('click','.validar-tarjeta', function (evento) {
        evento.preventDefault();
        let id=document.getElementById('NumeroTarjeta').value;
        $.post('deco_validar.php',{id}, function (response) {
            console.log(response);
            const validacion=JSON.parse(response);
            console.log(validacion);
            if(validacion.name=='true'){
                alert('1- El Numero de Tarjeta: ' + id + ' ya ha sido Registrado');
                return;
            }else{                    
                $('#deco_frm').submit();                    
            }
        });
    });
    $(document).on('click','.validar-servicio', function (evento) {
        evento.preventDefault();
        let id=document.getElementById('ServicioCliente').value;
        $.post('servicios_validar.php',{id}, function (response) {
            const validacion=JSON.parse(response);
            if(validacion.name=='true'){
                alert('El Cliente ya tiene Servicios Registrados');
                return;
            }else{                    
                $('#servicios_frm').submit();                    
            }
        });
    });
    $(document).on('click','.asignar-deco', function (evento) {
        evento.preventDefault();
        const postData={
            idServicio: $('#idServicio').val(),
            idDeco: $('#idDeco').val()
        };        
        $.post('servicios_guardar_detalle.php',postData, function (response) {
            const validacion=JSON.parse(response);
            console.log(response);            
            if(validacion.name=='true'){
                alert('Este Deco ya fue asignado');
                return;
            }else{                    
                console.log('DECO Valido');
                let decos_detalle_servicios=JSON.parse(response);
                let template='';                
                decos_detalle_servicios.forEach(decos_detalle_servicio => {
                    template += `<tr>
                        <td>${decos_detalle_servicio.id}</td>
                        <td>${decos_detalle_servicio.numerotarjeta}</td>
                        <td>${decos_detalle_servicio.stbid}</td>
                        <td>${decos_detalle_servicio.modelostb}</td>
                        <td>${decos_detalle_servicio.tipodeco}</td>
                        <td>${decos_detalle_servicio.estado}</td>
                        <td><button class="eliminar-deco btn btn-danger btn-sm" title="Eliminar"><i class="bi bi-x-lg"></i></button></td>
                    </tr>`
                });
                $('#idConsultaServicios').html(template);
                //$('#servicios_frm').submit();                    
            }
        });
    });
    $(document).on('click','.cargar_file', function (evento) {
        //console.log($('#file').val());
        let file =document.querySelector('input[type=file]').files[0];
        let reader = new FileReader();        
        reader.onload = (e) => {
            // Cuando el archivo se terminó de cargar
            let lines = parseCSV(e.target.result);
            let template=''; 
            //let output = reverseMatrix(lines);
            if(lines[0].length !=7){
                alert('El Archivo Cargado no cumple con la Estructura Requerida, Cargue un Archivo Valido');
                //console.log(lines[0].length);
            }else{
                for (x=0;x<lines.length;x++) {
                    //console.log(lines[x]);
                    const postData={
                        TipoIdentificacion: lines[x][0],
                        Identificacion: lines[x][1],
                        Nombre: lines[x][2],
                        Direccion: lines[x][3],
                        Telefono: lines[x][4],
                        Email: lines[x][5],
                        Estado: lines[x][6]
                    }                
                    $.post('clientes_csv.php',postData, function (response) {
                        template+=`<spam>${response}</spam><br>`;
                        console.log(response);
                        $('#DatosCargados').html(template);
                    });                
                }
            }       

        };
        reader.readAsBinaryString(file);
        
        //$.post('prueba.php',postData, function (response) {
        //    console.log(response);
        //});
        
    });
    $(document).on('click','.deco_cargar_file', function (evento) {
        //console.log($('#file').val());
        let file =document.querySelector('input[type=file]').files[0];
        let reader = new FileReader();        
        reader.onload = (e) => {
            // Cuando el archivo se terminó de cargar
            let lines = parseCSV(e.target.result);
            let template=''; 
            //let output = reverseMatrix(lines);
            if(lines[0].length !=4){
                alert('El Archivo Cargado no cumple con la Estructura Requerida, Cargue un Archivo Valido');
                //console.log(lines[0].length);
            }else{
                for (x=0;x<lines.length;x++) {
                    //console.log(lines[x]);
                    const postData={
                        NumeroTarjeta: lines[x][0],
                        StbId: lines[x][1],
                        ModeloStb: lines[x][2],
                        Serial: lines[x][3]
                    }                
                    $.post('deco_csv.php',postData, function (response) {
                        template+=`<spam>${response}</spam><br>`;
                        console.log(response);
                        $('#DatosCargados').html(template);
                    });                
                }
            }
        };
        reader.readAsBinaryString(file);
        
        //$.post('prueba.php',postData, function (response) {
        //    console.log(response);
        //});
        
    });
    function parseCSV(text) {
        // Obtenemos las lineas del texto
        let lines = text.replace(/\r/g, '').split('\n');
        return lines.map(line => {
            // Por cada linea obtenemos los valores
            let values = line.split(',');
            return values;
        });
    }
    
    
});