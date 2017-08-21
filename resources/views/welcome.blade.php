@extends('layouts.app')

    @section('content')

    <div id="mainContent" class="container">
        

        <div class="card">
        
            <div class="card-header c_title lighten-1 white-text">
              
                <h2>Análisis de desenpeño</h2>

                <h4>Por consultor:</h4>
    
            </div>
        
            <div class="card-body">
        
                <form action="" method="get" accept-charset="utf-8">

                    <div class="row">

                        <div class="col">
                           
                            <h4>Periodo:</h4>

                            <div id="periodo" class="form-group">
                            
                                <div class="row">    
                                    
                                    <div class="col-1"></div>

                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        
                                        <div class="row">
                                            
                                            <div class="col">
                                                
                                                <label for="desde">Desde:</label>
                                            
                                            </div>
                                        
                                        </div>
                                        
                                        <div id="desde" class="row">
                                            
                                            <div class="col-lg-6">
                                                
                                                <select class="form-control" id="mes-desde">
                                                  
                                                    <option value="">Mes</option>

                                                    <option value="01">Enero</option>

                                                    <option value="02">Febrero</option>

                                                    <option value="03">Marzo</option>

                                                    <option value="04">Abril</option>

                                                    <option value="05">Mayo</option>

                                                    <option value="06">Junio</option>

                                                    <option value="07">Julio</option>

                                                    <option value="08">Agosto</option>

                                                    <option value="09">Septiembre</option>

                                                    <option value="10">Octubre</option>

                                                    <option value="11">Noviembre</option>

                                                    <option value="12">Diciembre</option>                                                                                                
                                                </select>
                                                
                                            </div>
                                            
                                            <div class="col-lg-6">
                                                
                                                <select class="form-control" id="año-desde">
                                                  
                                                <option value="">Año</option>
    
                                                @foreach($years as $year)
                                                    
                                                    <option value="{{$year}}">{{$year}}</option>
                                                
                                                @endforeach
                                        

                                                </select>

                                            </div>

                                        </div>       

                                    </div>

                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        
                                        <div class="row">
                                            
                                            <div class="col">
                                                
                                                <label for="desde">Hasta:</label>
                                            
                                            </div>
                                        
                                        </div>
                                        
                                        <div id="hasta" class="row">
                                            
                                            <div class="col-lg-6">
                                                
                                                <select class="form-control" id="mes-hasta">
                                                  
                                                    <option value="">Mes</option>

                                                    <option value="01">Enero</option>

                                                    <option value="02">Febrero</option>

                                                    <option value="03">Marzo</option>

                                                    <option value="04">Abril</option>

                                                    <option value="05">Mayo</option>

                                                    <option value="06">Junio</option>

                                                    <option value="07">Julio</option>

                                                    <option value="08">Agosto</option>

                                                    <option value="09">Septiembre</option>

                                                    <option value="10">Octubre</option>

                                                    <option value="11">Noviembre</option>

                                                    <option value="12">Diciembre</option>
                                                
                                                </select>
                                                
                                            </div>
                                            
                                            <div class="col-lg-6">
                                                
                                                <select class="form-control" id="año-hasta">
                                                  
                                                    <option value="">Año</option>
           
                                                    @foreach($years as $year)
                                                        
                                                        <option value="{{$year}}">{{$year}}</option>
                                                    
                                                    @endforeach

                                                </select>

                                            </div>

                                        </div>       

                                    </div>

                            </div>

                            <h4>Consultores:</h4>

                            <div id="consultores" class="form-group">
                                
                                <div class="row">

                                    <div class="col-lg-1"></div>
                                    
                                    <div class="col-lg-3">
                                        
                                        <select multiple class="form-control ct-select" id="listaconsult">
                                            
                                            @foreach($users as $user)
                                                
                                                <option value="{{$user->co_usuario}}">{{$user->no_usuario}}</option>
                                            
                                            @endforeach
                                        
                                        </select>

                                    </div>
                                    
                                    <div class="col-lg-2 align-self-center ">
                                        
                                        <div class="row">
                                            
                                            <div class="col-12">
                                                
                                                <button id="add" type="button" class="btn ct-btn form-control">Agregar</button>
                                            
                                            </div>

                                            <div class="col-12">
                                                
                                                <button id="remove" type="button" class="btn ct-btn form-control">Quitar</button>
                                            
                                            </div>
                                                                          
                                        </div>

                                    </div>
                                    
                                    <div class="col-lg-3">
                                    
                                        <select multiple class="form-control ct-select" id="listaselec">    
                                        </select>                                
                                    
                                    </div>
                                    
                                </div>

                            </div>

                            <h4>Reportes:</h4>

                            <div id="reportes" class="form-group">
                            
                                <div class="row">    
                                    
                                    <div class="col-1"></div>
                                    
                                    <div class="col-lg-2">
                                        
                                        <button id="rel-btn" type="button" class="btn ct-btn form-control">Relatório</button>
                                         
                                    </div>

                                    <div class="col-lg-2">
                                        
                                        <button id="graf-btn" type="button" class="btn ct-btn form-control">Gráfico</button>
                                         
                                    </div>

                                    <div class="col-lg-2">
                                        
                                        <button id="pizza-btn" type="button" class="btn ct-btn form-control">Pizza</button>
                                         
                                    </div>

                            </div>

                        </div>

                        <div id="relatorio" class="container"></div>
                        
                        <div id="bargraf" class="ct-chart ct-perfect-fourth">
                            
                        </div>

                        <div id="pizza" class="ct-chart ct-perfect-fourth">
                    
                        </div>
                    
                    </div>
                
                </form>
            
            </div>
        
        </div>


    </div>

    @stop
    
    @section('scripts')

        <script src="{{asset('js/Chart.min.js')}}" type="text/javascript" charset="utf-8" async defer></script>    
        
        <script type="text/javascript">  

            $().ready(function() {  

                $('#add').click(function() {  

                    return !$('#listaconsult option:selected').remove().appendTo('#listaselec');  

                });  

                $('#remove').click(function() {  

                    return !$('#listaselec option:selected').remove().appendTo('#listaconsult');  

                });

                $('#rel-btn').on('click',function(e){

                    e.preventDefault();
                    
                    $('#relatorio').html('');

                    $('#relatorio').slideUp(1000,'linear');
                    
                    $('#bargraf').slideUp(1000,'linear');
                    
                    $('#pizza').slideUp(1000,'linear');
                    
                    var url = 'rel';

                    var consultores = [];

                    var desde;

                    var hasta;

                    desde = new Date($('#año-desde').val(),$('#mes-desde').val(),1);
                    
                    desde = desde.getFullYear()+'-'+(desde.getMonth())+'-'+desde.getDate();


                    hasta = new Date($('#año-hasta').val(),$('#mes-hasta').val(),0);
                    
                    hasta = hasta.getFullYear()+'-'+(hasta.getMonth()+1)+'-'+hasta.getDate();

                    if(($('#mes-desde').val()!='')&&($('#año-desde').val()!='')&&($('#mes-hasta').val()!='')&&($('#año-hasta').val()!='')){

                        if (Date.parse(hasta) >= Date.parse(desde)){

                            $('#listaselec option').each(function(){

                                consultores.push(this.value);
                            });

                            if(!(consultores == '')){

                                data = {

                                    '_token': '{{ csrf_token() }}',

                                    'desde': desde,

                                    'hasta': hasta,

                                    'consultores' : consultores

                                };

                                $.post(url, data, function(result){

                                    var ind = 0;
                                    
                                    var liq_tot,costo_tot,comi_tot,lucro_tot;

                                    // console.log(result);                                    
                                    $.each(result, function(i, x) {

                                        liq_tot = 0;

                                        costo_tot = 0;

                                        comi_tot = 0;

                                        lucro_tot =0;

                                        var nombrecon = encodeURIComponent(x.nombre);

                                        nombrecon = decodeURIComponent(x.nombre);
                                       
                                        $('#relatorio').append('<h3>'+nombrecon+'</h3><table id="tabla'+ind+'base" class="table table-responsive"><thead id="headtable"><tr><th>Período</th><th>Receita Liquida</th><th>Custo Fixo</th><th>Comissao</th><th>Lucro</th></thead><tbody>');                                   
                                        
                                        $.each(x.mes,function(j,y){

                                            liq_tot = liq_tot + y.data.liq;

                                            costo_tot = costo_tot + y.data.costo;

                                            comi_tot = comi_tot + y.data.comision;

                                            lucro_tot = lucro_tot + y.data.lucro;
                                           
                                            $('#tabla'+ind+'base').append('<tr><th scope="row">'+y.date+'</th><td>'+y.data.liq.toFixed(2)+'</td><td>'+y.data.costo.toFixed(2)+'</td><td>'+y.data.comision.toFixed(2)+'</td><td>'+y.data.lucro.toFixed(2)+'</td></tr>');

                                        });

                                        $('#tabla'+ind+'base').append('<tr id="headtable"><th scope="row">Saldo</th><td>'+liq_tot.toFixed(2)+'</td><td>'+costo_tot.toFixed(2)+'</td><td>'+comi_tot.toFixed(2)+'</td><td>'+lucro_tot.toFixed(2)+'</td></tr></tbody></table>');
                                        ind = ind + 1;
                                    });

                                    $('#relatorio').slideDown(1000,'linear'); 

                                });

                            }else{

                                alert('no ha elegido a ningun consultor');

                            }
                        
                        }else{
        
                            alert('error con el periodo la fecha hasta no puede ser mayo que a fecha desde'+desde+'<'+hasta);

                        }

                    }else{

                        alert('Las fechas desde y hasta son obligatorias');

                    }

                }); 

                $('#graf-btn').on('click',function(e){

                    e.preventDefault();

                    var url = 'bar';

                    var consultores = [];

                    var desde;

                    var hasta;

                    $('#bargraf').html('');
                    $('#relatorio').slideUp(1000,'linear');
                    $('#bargraf').slideUp(1000,'linear');
                    $('#pizza').slideUp(1000,'linear');

                    desde = new Date($('#año-desde').val(),$('#mes-desde').val(),1);
                    
                    desde = desde.getFullYear()+'-'+(desde.getMonth())+'-'+desde.getDate();


                    hasta = new Date($('#año-hasta').val(),$('#mes-hasta').val(),0);
                    
                    hasta = hasta.getFullYear()+'-'+(hasta.getMonth()+1)+'-'+hasta.getDate();


                    if(($('#mes-desde').val()!='')&&($('#año-desde').val()!='')&&($('#mes-hasta').val()!='')&&($('#año-hasta').val()!='')){

                        if (Date.parse(hasta) >= Date.parse(desde)){

                            $('#listaselec option').each(function(){

                                consultores.push(this.value);

                            });

                            if(!(consultores == '')){

                                data = {

                                    '_token': '{{ csrf_token() }}',

                                    'desde': desde,

                                    'hasta': hasta,

                                    'consultores' : consultores

                                };

                                $.post(url, data, function(result){

                                    $('#bargraf').html('<canvas id="barChart" width="400" height="400"></canvas>');

                                    var linedata = [];

                                    $.each(result.nombre,function(){
                                        
                                        linedata.push(result.bruto);

                                    });

                                    console.log(linedata);
   
                                    var ctx = document.getElementById("barChart").getContext('2d');
                                    var myChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: result.nombre,
                                            datasets: [{
                                                label: 'Receita liquida',
                                                data: result.liq,
                                                backgroundColor: [
                                                    'rgba(255, 99, 132, 0.2)',
                                                    'rgba(54, 162, 235, 0.2)',
                                                    'rgba(255, 206, 86, 0.2)',
                                                    'rgba(75, 192, 192, 0.2)',
                                                    'rgba(153, 102, 255, 0.2)',
                                                    'rgba(255, 159, 64, 0.2)'
                                                ],
                                                borderColor: [
                                                    'rgba(255,99,132,1)',
                                                    'rgba(54, 162, 235, 1)',
                                                    'rgba(255, 206, 86, 1)',
                                                    'rgba(75, 192, 192, 1)',
                                                    'rgba(153, 102, 255, 1)',
                                                    'rgba(255, 159, 64, 1)'
                                                ],
                                                borderWidth: 1
                                            },{
                                                label: 'Salario bruto',

                                                data: linedata,
                                                // Changes this dataset to become a line
                                                type: 'line',

                                                fill : 'false',

                                                borderColor: 'rgb(54, 162, 235)'
    
                                                }]
                                        },
                                        options: {
                                            scales: {
                                                yAxes: [{
                                                    ticks: {
                                                        beginAtZero:true
                                                    }
                                                }]
                                            }
                                        }
                                    });

                                });

                                $('#bargraf').slideDown(1000,'linear');

                            }else{

                                alert('no ha elegido a ningun consultor');

                            }
                        
                        }else{
        
                            alert('error con el periodo la fecha hasta no puede ser mayo que a fecha desde'+desde+'<'+hasta);

                        }

                    }else{

                        alert('Las fechas desde y hasta son obligatorias');

                    } 
                });

                $('#pizza-btn').on('click',function(e){

                    e.preventDefault();

                    var url = 'pizza';

                    var consultores = [];

                    var desde;

                    var hasta;

                    $('#pizza').html('');
                    $('#relatorio').slideUp(1000,'linear');
                    $('#bargraf').slideUp(1000,'linear');
                    $('#pizza').slideUp(1000,'linear');

                    desde = new Date($('#año-desde').val(),$('#mes-desde').val(),1);
                    
                    desde = desde.getFullYear()+'-'+(desde.getMonth())+'-'+desde.getDate();


                    hasta = new Date($('#año-hasta').val(),$('#mes-hasta').val(),0);
                    
                    hasta = hasta.getFullYear()+'-'+(hasta.getMonth()+1)+'-'+hasta.getDate();


                    if(($('#mes-desde').val()!='')&&($('#año-desde').val()!='')&&($('#mes-hasta').val()!='')&&($('#año-hasta').val()!='')){

                        if (Date.parse(hasta) >= Date.parse(desde)){

                            $('#listaselec option').each(function(){

                                consultores.push(this.value);

                            });

                            if(!(consultores == '')){

                                data = {

                                    '_token': '{{ csrf_token() }}',

                                    'desde': desde,

                                    'hasta': hasta,

                                    'consultores' : consultores

                                };

                                $.post(url, data, function(result){

                                    $('#pizza').html('<canvas id="pizzaChart" width="400" height="400"></canvas>');
                                    console.log(result.nombre);
                                    console.log(result.liq);
                                    new Chart(document.getElementById("pizzaChart"),{
                                        type:'pie',
                                        data:{
                                            labels:result.nombre,
                                                datasets:[{
                                                    label:"ganancia total",
                                                    data:result.liq,
                                                    backgroundColor:["rgb(255, 99, 132)","rgb(54, 162, 235)","rgb(255, 205, 86)","rgb(235, 115, 80)","rgb(147, 90, 170)","rgb(68, 205, 255)","rgb(133, 237, 2)"]

                                                        }]
                                                }
                                    });

                                });

                                $('#pizza').slideDown(1000,'linear');

                            }else{

                                alert('no ha elegido a ningun consultor');

                            }
                        
                        }else{
        
                            alert('error con el periodo la fecha hasta no puede ser mayo que a fecha desde'+desde+'<'+hasta);

                        }

                    }else{

                        alert('Las fechas desde y hasta son obligatorias');

                    } 
                });  
            });
        </script>

    @stop