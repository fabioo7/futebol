<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width" />
    <meta charSet="utf-8" />
    <meta name="Aqualizar" content="4" />
    <link rel="shortcut icon" href="https://aquacheck.com.br/public/img/caixa/fav.jpg" type="image/x-icon">
<link type="image/x-icon" rel="shortcut icon" href="https://aquacheck.com.br/public/img/caixa/fav.png"/>
<link rel="icon" sizes="32x32" href="https://aquacheck.com.br/public/img/caixa/fav32x32.png"/>
<link rel="icon" sizes="192x192" href="https://aquacheck.com.br/public/img/caixa/fav192x192.png"/>
<link rel="apple-touch-icon" href="https://aquacheck.com.br/public/img/caixa/fav32x32.png"/>
<link rel="apple-touch-icon" sizes="76x76" href="https://aquacheck.com.br/public/img/caixa/fav76x76.png"/>
<link rel="apple-touch-icon" sizes="120x120" href="https://aquacheck.com.br/public/img/caixa/fav120x120.png"/>
<link rel="apple-touch-icon" sizes="152x152" href="https://aquacheck.com.br/public/img/caixa/fav152x152.png"/>
<link rel="apple-touch-icon" sizes="180x180" href="https://aquacheck.com.br/public/img/caixa/fav180x180.png"/>

    <link rel="stylesheet" href="https://aquacheck.com.br/public/assets_caixa/css/novodash.css" data-n-g as="style" />
    <script src="https://aquacheck.com.br/public/assets_caixa/js/novodash_color.js" defer=""></script>   
    <noscript data-n-css></noscript>
    <!---odometro---->
<script src="https://github.hubspot.com/odometer/odometer.js"></script>
<link rel="stylesheet" href="https://github.hubspot.com/odometer/themes/odometer-theme-car.css" />
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<script src="https://code.jquery.com/jquery-1.9.1.js"></script>


@foreach ($lista as $t)

<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.js"></script>
<script>
setInterval(function() {
    $(document).ready(function() {
        $.get('{!! url('caixadaguanivel')!!}/{{$t->id_caixa}}',
            function(resultado) {
                resultado[1] = "cm";

                var espaçoVasioTampaCapacidadeTotal = 19; //19 distancia minima
                var capacidadeTotal = 72; //72cm
                var cm = (resultado[0].cm);
                var datetime = (resultado[0].updated_at);
                var sinal = (resultado[0].sinal);
                var total_litros_atual = (resultado[0].total_litros);
                var vazao_atual = (resultado[0].vazao);

                if (sinal < '-50') {

                }

                var nivel = capacidadeTotal - cm + espaçoVasioTampaCapacidadeTotal;

                if (nivel < 74) {

                    if (nivel == 72) { // total
                        var litros = 2000;
                        var porcentagem = 100;
                        var status = 'Alto';
                    } else if ((nivel < 72) && (nivel > 62)) {
                        var litros = 1800;
                        var porcentagem = 90;
                        var status = 'Normal';
                    } else if ((nivel <= 62) && (nivel > 52)) {
                        var litros = 1660;
                        var porcentagem = 80;
                        var status = 'Normal';
                    } else if ((nivel <= 52) && (nivel > 42)) {
                        var litros = 1340;
                        var porcentagem = 60;
                        var status = 'Normal';
                    } else if ((nivel <= 42) && (nivel > 32)) {
                        var litros = 1040;
                        var porcentagem = 50;
                        var status = 'Médio';
                    } else if ((nivel <= 32) && (nivel > 22)) {
                        var litros = 760;
                        var porcentagem = 40;
                        var status = 'Baixo';
                    } else if ((nivel <= 22) && (nivel > 12)) {
                        var litros = 500;
                        var porcentagem = 20;
                        var status = 'Crítico';
                    } else if ((nivel <= 12) && (nivel > 6)) {
                        var litros = 260;
                        var porcentagem = 10;
                        var status = 'Crítico';
                    } else if ((nivel <= 6) && (nivel > 0)) {
                        var litros = 130;
                        var porcentagem = 0;
                        var status = 'Sem Água';

                    }


                } else {
                    var litros = 0;
                    var porcentagem = 0;
                }



                let objectDate = new Date(datetime);
                let day = objectDate.getDate();
                let month = objectDate.getMonth();
                let mes = (month + 1);
                let year = objectDate.getFullYear();

                let hora = objectDate.getHours();
                let min = objectDate.getMinutes();

                let data = (day + '/' + mes + '/' + year); // datas
                let horas = (hora + ':' + min); // horas

                console.log(nivel);
                //Console.log();
                console.log(litros);
                console.log(porcentagem);
                console.log(total_litros_atual);
                console.log(vazao_atual);
                document.getElementById("nivel").innerHTML = nivel + '';
                document.getElementById("nivelstatus").innerHTML = nivel + 'cm';
                document.getElementById("litros").innerHTML = litros + 'L';
                document.getElementById("porcentagem").innerHTML = porcentagem + '%';
                document.getElementById("data_at").innerHTML = data;
                document.getElementById("horas").innerHTML = horas;
                document.getElementById("status").innerHTML = status;
                document.getElementById("vazao_atual_web").innerHTML = vazao_atual + ' L/min';

                setTimeout(function() {
                    odometer.innerHTML = total_litros_atual;
                }, 1000);





//////////////////Google chart Velocimetro
google.charts.load('current', {'packages':['gauge']});
        google.charts.setOnLoadCallback(drawChart);
	    let valor =  parseFloat(vazao_atual);

		function drawChart() {
			var data = google.visualization.arrayToDataTable([
			['Label', 'Value'],
			['L/Min', valor]
			]);
			var options = {
			width: 200, height: 120,
			redFrom: 0, redTo: 2,
			yellowFrom:2, yellowTo: 5,
			greenFrom:5, greenTo: 12,
			minorTicks: 5,
			max: 12.0,
			min: 0,
			};

			var chart = new google.visualization.Gauge(document.getElementById('chart_div6'));
			

			chart.draw(data, options);
			setInterval(function() {
			data.setValue(0, 1, valor - 0.5 );
			chart.draw(data, options);
			}, 1000);
		}
//////////////////Google chart Velocimetro


            
            })
    });
}, 1000);

</script>


<script>
//incializo a div de listagem

$(document).ready(function() {
    $('#img').load('https://aquacheck.com.br/caixaimg/{{$t->id_caixa}}');
});


$(document).ready(function() {
    $('#img_vazao').load('https://aquacheck.com.br/vazaoimg/{{$t->id_caixa}}');
});
$(document).ready(function() {
    $('#img_vazao2').load('https://aquacheck.com.br/vazaoimg/{{$t->id_caixa}}');
});

$(document).ready(function() {
    $('#ultimos5').load('https://aquacheck.com.br/ultimos5/{{$t->id_caixa}}');
});


setInterval(function() {
    $(document).ready(function() {
        $('#img').load('https://aquacheck.com.br/caixaimg/{{$t->id_caixa}}');
    });







    $(document).ready(function() {
        $('#reboots').load('https://aquacheck.com.br/reboots/{{$t->id_caixa}}');
    });

    $(document).ready(function() {
        $('#vazao_media').load('https://aquacheck.com.br/vazao_media/{{$t->id_caixa}}');
    });


}, 9000);
</script>



<!--------odometro---------->
<style>
.odometer {
    font-size: 30px;
}
</style>



<?php


$sinal1 = str_replace("-","",$sinal);
if ($sinal1 <= 50){
	$img_sinal = "sinal_otimo.jpg";
	$nivel_sinal = 'Ótimo';
}elseif(($sinal1 > '50') && ($sinal1 < '60'  )){
	$img_sinal = "sinal_bom.jpg"; 
	$nivel_sinal = 'Bom';
}elseif(($sinal1 >= '60') && ($sinal1 < '70'  )){
	$img_sinal = "sinal_medio.jpg"; 
	$nivel_sinal = 'Médio';
}elseif(($sinal1 >= '70') && ($sinal1 < '90'  )){
	$nivel_sinal = 'Fraco';
	$img_sinal = "sinal_fraco.jpg"; 
}else{
	
	$nivel_sinal = 'sem Sinal';
	$img_sinal = "sinal_fraco.jpg";
}


$agora = date('Y/m/d H:i:s'); 
$datatime1 = new DateTime($agora);
$datatime2 = new DateTime($ultimo_boot);

$data1  = $datatime1->format('Y-m-d H:i:s');
$data2  = $datatime2->format('Y-m-d H:i:s');

$diff = $datatime1->diff($datatime2);
$horas = $diff->h + ($diff->days * 24);

?>


    


<body>
    <div id="__next" data-reactroot="">
        <div class="min-h-screen bg-gray-100 dark:bg-black2 dark:text-white">
            <main class="md:flex max-w-screen-2xl mx-auto overflow-x-hidden"><svg xmlns="http://www.w3.org/2000/svg"
                    width="0" height="0">
                            

                    <div
                        class="md:w-1/3 p-3 md:py-5 md:px-5 lg:px-10 md:rounded-r-3xl md:rounded-s-3xl bg-white dark:bg-black">
                        
                        <img src="https://aqualizar.com.br/public/assets_caixa/images/logo-dark.png" class="brround" style="width: 400px; padding-left: 120px; " alt="User Avatar">
                   
                        <div class="flex space-x-2 lg:space-x-4 items-center justify-center bg-gray-100 dark:bg-black2 p-2 rounded-full mt-3 md:mt-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" aria-hidden="true" class="h-5 w-5 text-black dark:text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg><input type="text" class="outline-none bg-transparent flex-1 md:w-full"
                                placeholder="Search for place" /><button class=""><svg
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" aria-hidden="true" class="h-5 w-5 text-gray-400">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg></button>
                        </div>

                        <div class="row">
                                        <div class="col-sm-12" style=" text-align: center; padding-left: 16px;">
										<div id="img" ></div>
                                        </div>
                                    </div>

                        <div class="flex flex-col py-2 md:py-8 space-y-4 px-4 lg:px-12">
                            <div class="flex md:flex-col justify-between mt-5 md:mt-0">
                               
                                <div class="flex text-[4rem] md:text-[6rem] font-extralight">
                                    <h2><div id="nivel"></div></h2>
                                    <p class="text-[3rem] md:text-[4rem] md:leading-normal"><span style="font-size: 35px ;">⇵</span>
                                          Cm
                                    </p> 
                                </div>
                            </div>
                            <div class="grid lg:flex justify-between">
                                <h1 class="text-xl font-bold">{{$titulo}}</h1>
                                <div class="flex">
                                    <h2 class="text-lg font-medium"></h2>
                                    <p class="text-lg font-thin"><div id="data_at"></div></p>
                                </div>
                            </div>


                    

                            <hr />
                            <div class="flex items-center space-x-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true"
                                    class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z">
                                    </path>
                                </svg>
                                <h3 class="flex-1"><div id="status"></div></h3>
                            </div>
                            <div class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true"
                                    class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <h3 class="flex-1"><div id="horas"></div>
                               
                                </h3>
                            </div>
                            <div class="flex items-center space-x-2">   
                            <svg fill="#000000" width="20px" height="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M5,7.414V21a1,1,0,0,0,1,1H18a1,1,0,0,0,1-1V4h2v7a1,1,0,0,0,2,0V4a2,2,0,0,0-2-2H2a1,1,0,0,0-.707,1.707ZM17,4V20H7V18h3a1,1,0,0,0,0-2H7V14h3a1,1,0,0,0,0-2H7V10h3a1,1,0,0,0,0-2H7V7a1,1,0,0,0-.293-.707L4.414,4Z"/></svg>
                            <h3 class="flex-1"><div id="horas"></div><div id="litros"></div> </h3>
                            </div>

                            <div class="flex items-center space-x-2">   
                            <svg fill="#000000" width="20px" height="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M5,7.414V21a1,1,0,0,0,1,1H18a1,1,0,0,0,1-1V4h2v7a1,1,0,0,0,2,0V4a2,2,0,0,0-2-2H2a1,1,0,0,0-.707,1.707ZM17,4V20H7V18h3a1,1,0,0,0,0-2H7V14h3a1,1,0,0,0,0-2H7V10h3a1,1,0,0,0,0-2H7V7a1,1,0,0,0-.293-.707L4.414,4Z"/></svg>
                            <h3 class="flex-1"><div id="horas"></div><div id="nivelstatus"></div> </h3>
                            </div>

                            
                            <div class="flex items-center space-x-2">   
                                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 2H15C20 2 22 4 22 9V15C22 20 20 22 15 22H9C4 22 2 20 2 15V9C2 4 4 2 9 2Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M8.57007 15.27L15.11 8.72998" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M8.98001 10.3699C9.65932 10.3699 10.21 9.81923 10.21 9.13992C10.21 8.46061 9.65932 7.90991 8.98001 7.90991C8.3007 7.90991 7.75 8.46061 7.75 9.13992C7.75 9.81923 8.3007 10.3699 8.98001 10.3699Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M15.52 16.0899C16.1993 16.0899 16.75 15.5392 16.75 14.8599C16.75 14.1806 16.1993 13.6299 15.52 13.6299C14.8407 13.6299 14.29 14.1806 14.29 14.8599C14.29 15.5392 14.8407 16.0899 15.52 16.0899Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                <h3 class="flex-1"><div id="horas"></div><div id="porcentagem"></div></h3>
                            </div>
    

                            <div class="flex items-center space-x-2">   
                            <svg xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                aria-hidden="true" class="h-4 w-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0">
                                                </path>
                                            </svg>
                                <h3 class="flex-1"><div id="horas"></div><div id="porcentagem"></div></h3>
                            </div>


                              

                         
                        </div>
                    </div>

                    <div class="md:w-2/3 bg-gray-100 dark:bg-black2 py-5 px-5 lg:px-10 md:overflow-y-scroll">
                        <div class="text-black dark:text-white space-y-4">
                            <div class="sm:flex justify-between items-center">
                                <div class="flex flex-1 space-x-8 items-center">
                                    <p class="text-2xl font-black">Controle de Água</p>
                                </div>
                                <div class="flex items-center space-x-8 justify-between mt-5 sm:mt-0">
                                    <div class="flex items-center space-x-4"><button
                                            class="bg-black text-white dark:bg-white dark:text-black2 hover:scale-110 rounded-full p-1 h-8 w-10 shadow-md flex justify-center items-center">°C</button><button
                                            class="bg-white text-black dark:bg-black dark:text-white hover:scale-110 rounded-full p-1 h-8 w-10 shadow-md flex justify-center items-center">°F</button>
                                    </div><button class=""><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            aria-hidden="true" class="w-6 h-6 hidden dark:block">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                                            </path>
                                        </svg><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" aria-hidden="true"
                                            class="w-6 h-6 dark:hidden">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">
                                            </path>
                                        </svg></button>
                                    <div class="relative"><button
                                            class="text-white dark:text-black group rounded-md inline-flex items-center font-medium hover:text-opacity-100 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75"
                                            id="headlessui-popover-button-undefined" type="button"
                                            aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                aria-hidden="true" class="w-6 h-6 text-black dark:text-white mt-1">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                                </path>
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg></button></div>
                                </div>
                            </div>
                            <div class="flex justify-between overflow-x-scroll w-screen md:w-full p-0 md:p-6 pl-0">
                               
                                @foreach ($count_entrada as $t)
                                <?php
                                
                                $diasemanahoje = strftime("%A", strtotime($hoje = date('Y-m-d')));
                                $diasemanahoje = substr($diasemanahoje, 0, 3);
                                
                                
                                $diasemana = strftime("%A", strtotime($t->date));
                                $diasemana = substr($diasemana, 0, 3);
                                $total3 =  $t->maximo - $t->minimo;
                                
                                
                                if ($diasemana == $diasemanahoje){
                                $gota = 'gotared2.png'; 
                                }else{
                                $gota = 'gotaazul2.png'; 	
                                }
                                ?>	
                                
                                <div class="flex flex-col space-y-2 m-2 bg-white dark:bg-black shadow-lg py-6 px-9 rounded-lg justify-center items-center transition-all hover:translate-y-5">
                                    <p>{{$diasemana}}</p>
                                  

                                    <figure>

                                    <img src="https://aquacheck.com.br/public/img/caixa/{{$gota}}" style="width: 60px;" alt="">
                              
                                    </figure>
                                    <div class="flex items-center">
                                        <p class="font-medium">
                                        {{$total3}}L
                                        </p>
                                        
                                    </div>
                                </div>


                                @endforeach						                     
                               
                               
                         



                               
                                
                             
                             
                                
                            </div>
                            <div class="flex flex-col space-y-4">
                                <h3 class="text-lg font-bold">Dados de Consumo</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                    


                                    <div class="bg-white dark:bg-black rounded-2xl shadow-sm p-4 h-56 flex flex-col items-center space-y-6">
                                        <p class="text-gray-400 w-full">Velocidade de Vazão</p>

                                        <div class="flex space-x-4">
                                            <figure>
                                                <div  id="chart_div6"></div>
                                               
                                            </figure>
                                            <div>
                                                <p> <div id="img_vazao"></div></p>
                                                <p class="text-xs text-gray-400"><div id="vazao_atual_web"></div></p>
                                            </div>
                                        </div>
                                       
                                    </div>


                    

                                    <div class="bg-white dark:bg-black rounded-2xl shadow-sm p-4 h-56 flex flex-col items-center space-y-6">
                                    <p class="text-gray-400 w-full">Bateria</p>
                                    <div class="flex space-x-4">
                                        <figure>
                                            <img src="https://aquacheck.com.br/public/img/caixa/funcionando.jpg" alt="">
                                        </figure>
                                        <div><br><br>
                                            <p>Ligado a </p>
                                            <p class="text-xs text-gray-400">{{$horas}} horas</p>

                                          


                                        </div>
                                    </div>
                                   
                                </div>


                                    <div class="bg-white dark:bg-black rounded-2xl shadow-sm p-4 h-56 flex flex-col items-center space-y-6">
                                        <p class="text-gray-400 w-full">Nivel Sinal Wifi</p>
                                        <div class="flex space-x-4">
                                            <figure>
                                                <img src="https://aquacheck.com.br/public/img/caixa/{{$img_sinal}}" style="width: 100%;" alt="">
                                            </figure>
                                            <div><br><br>
                                                <p>{{$nivel_sinal}}</p>
                                                <p class="text-xs text-gray-400">{{$sinal}} db</p>
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <div
                                        class="bg-white dark:bg-black rounded-2xl shadow-sm p-4 h-56 flex flex-col space-y-4">
                                        <p class="text-gray-400">Hidrometro</p>
                                        <div class="flex items-top">
                                           
                                            <div id="odometer" class="odometer" style="position: relative; left: 10px">00000000 </div>
                                        </div>
                                        <div class="flex items-center space-x-2"><svg xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                aria-hidden="true" class="h-4 w-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0">
                                                </path>
                                            </svg>
                                            <p class="w-full">No data </p>
                                        </div>
                                    </div>
                                    <div
                                        class="bg-white dark:bg-black rounded-2xl shadow-sm p-4 h-56 flex flex-col space-y-4">
                                        <p class="text-gray-400">Visibility</p>
                                       
                                        <div class="flex items-center space-x-2"><svg xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                aria-hidden="true" class="h-4 w-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0">
                                                </path>
                                            </svg>
                                            <p class="w-full">No data </p>
                                        </div>
                                    </div>
                                    <div
                                        class="bg-white dark:bg-black rounded-2xl shadow-sm p-4 h-56 flex flex-col space-y-4">
                                        <p class="text-gray-400">Air Quality</p>
                                        <div class="flex items-top">
                                            <p class=" text-[4rem] font-light">105</p>
                                            <div class="mt-5"></div>
                                        </div>
                                        <div class="flex items-center space-x-2"><svg xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                aria-hidden="true" class="h-4 w-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0">
                                                </path>
                                            </svg>
                                            <p class="w-full">No data </p>
                                        </div>
                                    </div>







                                </div>


<p class="mg-b-20">Visualize Horários de maior consumo  .</p>
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
var data = google.visualization.arrayToDataTable([
['Horas', 'Nivel', 'Topo',  'Base'],
@foreach ($lista3 as $t)

['{{ $t->hora }}h',  {{ 72 -$t->cm + 19   }},   72 , 2],

@endforeach
]);

var options = {
title: "Nivel da Caixa D'agua por Hora {{$hoje}}",
chartArea: {'width': '90%', 'height': '70%'},
curveType: 'function',
legend: { position: 'bottom' }
};
var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
chart.draw(data, options);
}
</script>
<div id="curve_chart" style="" ></div>



<p class="mg-b-20">Visualize os Dias de maior consumo  .</p>
			<script type="text/javascript">
											google.charts.load('current', {'packages':['corechart']});
											google.charts.setOnLoadCallback(drawChart);

											function drawChart() {
												var data = google.visualization.arrayToDataTable([
												['Dia', 'Máxima', 'Mínima',  'Base'],
												@foreach ($lista2 as $t)


												['{{ date("d", strtotime($t->date)) }}',  {{ 72 -$t->minimo + 19   }},   {{ 72 -$t->maximo + 19   }} , 2],
												
												@endforeach
												]);

												var options = {
												title: "Nivel da Caixa D'agua Diário",
												chartArea: {'width': '90%', 'height': '70%'},
												curveType: 'function',
												legend: { position: 'bottom' }
												};

												var chart = new google.visualization.LineChart(document.getElementById('curve_chart2'));

												chart.draw(data, options);
											}
											</script>

										<div id="curve_chart2"></div>
									















                            </div>
                        </div>
                    </div>
            </main>
        </div>
    </div>


    
   
                    
                    
                    
    
   
    @endforeach

    <script src="https://admintravel.com.br/public/assets/plugins/jquery/jquery.min.js"></script>

</body>

</html>