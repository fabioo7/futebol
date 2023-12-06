<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php 
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo'); 
?>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="X-UA-Compatible" content="IE=9" />
		<!-- Title -->
<title> Caixa D'Água Inteligente </title>
<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">


<link rel="shortcut icon" href="https://aquacheck.com.br/public/img/caixa/fav.jpg" type="image/x-icon">
<link type="image/x-icon" rel="shortcut icon" href="https://aquacheck.com.br/public/img/caixa/fav.png"/>
<link rel="icon" sizes="32x32" href="https://aquacheck.com.br/public/img/caixa/fav32x32.png"/>
<link rel="icon" sizes="192x192" href="https://aquacheck.com.br/public/img/caixa/fav192x192.png"/>
<link rel="apple-touch-icon" href="https://aquacheck.com.br/public/img/caixa/fav32x32.png"/>
<link rel="apple-touch-icon" sizes="76x76" href="https://aquacheck.com.br/public/img/caixa/fav76x76.png"/>
<link rel="apple-touch-icon" sizes="120x120" href="https://aquacheck.com.br/public/img/caixa/fav120x120.png"/>
<link rel="apple-touch-icon" sizes="152x152" href="https://aquacheck.com.br/public/img/caixa/fav152x152.png"/>
<link rel="apple-touch-icon" sizes="180x180" href="https://aquacheck.com.br/public/img/caixa/fav180x180.png"/>


<link href="https://admintravel.com.br/public/assets/css/icons.css" rel="stylesheet">
<link href="https://admintravel.com.br/public/assets/plugins/mscrollbar/jquery.mCustomScrollbar.css" rel="stylesheet"/>
<link href="https://admintravel.com.br/public/assets/plugins/sidebar/sidebar.css" rel="stylesheet">
<link rel="stylesheet" href="https://admintravel.com.br/public/assets/css/sidemenu.css">
<link href="https://admintravel.com.br/public/assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet" />
<link href="https://admintravel.com.br/public/assets/plugins/jqvmap/jqvmap.min.css" rel="stylesheet">
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.js"></script>
<!-- Maps css -->
<link href="https://admintravel.com.br/public/assets/plugins/jqvmap/jqvmap.min.css" rel="stylesheet">
<link href="https://admintravel.com.br/public/assets/css/style.css" rel="stylesheet">
<link href="https://admintravel.com.br/public/assets/css/style-dark.css" rel="stylesheet">
<link href="https://admintravel.com.br/public/assets/css/skin-modes.css" rel="stylesheet" />	</head>
	
<!---odometro---->
<script src="https://github.hubspot.com/odometer/odometer.js"></script>
<link rel="stylesheet" href="https://github.hubspot.com/odometer/themes/odometer-theme-car.css" />
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">



@foreach ($lista as $t)
	
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.js"></script>
<script>
setInterval(function(){
	$(document).ready(function() {
		$.get('{!! url('caixadaguanivel')!!}/{{$t->id_caixa}}', function(resultado){
		resultado[1]="cm";
		
		var espaçoVasioTampaCapacidadeTotal = 19; //19 distancia minima
		var capacidadeTotal = 72; //72cm
		var cm = (resultado[0].cm);
		var datetime = (resultado[0].updated_at);
		var sinal = (resultado[0].sinal);
		var total_litros_atual = (resultado[0].total_litros);
		var vazao_atual = (resultado[0].vazao);

        if(sinal < '-50' ){
			
		}

		var nivel = capacidadeTotal - cm + espaçoVasioTampaCapacidadeTotal;

        if(nivel < 74 ){		

             if(nivel == 72){ // total
				var litros  = 2000;
				var porcentagem = 100;
				var status = 'Alto';
			 }else if((nivel < 72 )&&(nivel > 62 ) ){
			   var litros  = 1800;
			   var porcentagem = 90;
			   var status = 'Normal';
			 }else if((nivel <= 62 )&&(nivel > 52 ) ){
			   var litros  = 1660;
			   var porcentagem = 80;
			   var status = 'Normal';
			 }else if((nivel <= 52 )&&(nivel > 42 ) ){
			   var litros  = 1340;
			   var porcentagem = 60;
			   var status = 'Normal';   
			}else if((nivel <= 42 )&&(nivel > 32 ) ){
			   var litros  = 1040;
			   var porcentagem = 50;
			   var status = 'Médio';   
			}else if((nivel <= 32 )&&(nivel > 22 ) ){
			   var litros  = 760;
			   var porcentagem = 40;
			   var status = 'Baixo';   
			}else if((nivel <= 22 )&&(nivel > 12 ) ){
			   var litros  = 500;
			   var porcentagem = 20;
			   var status = 'Crítico';   
			}else if((nivel <= 12 )&&(nivel > 6 ) ){
			   var litros  = 260;
			   var porcentagem = 10;
			   var status = 'Crítico';  
			}else if((nivel <= 6 )&&(nivel > 0 ) ){
			   var litros  = 130;
			   var porcentagem = 0;   
			   var status = 'Sem Água';  
			   
			}


}else{
	            var litros  = 0;
				var porcentagem = 0;
}



let objectDate = new Date(datetime);
let day = objectDate.getDate();
let month = objectDate.getMonth();
let mes = (month + 1); 
let year = objectDate.getFullYear();

let hora = objectDate.getHours();
let min = objectDate.getMinutes();

let data = (day+'/'+mes+'/'+year); // datas
let horas = (hora+':'+min); // horas

		console.log(nivel);
		//Console.log();
		console.log(litros);
		console.log(porcentagem);
		console.log(total_litros_atual);
		console.log(vazao_atual);
		document.getElementById("nivel").innerHTML = nivel+'cm';
		document.getElementById("nivelstatus").innerHTML = nivel+'cm';
		document.getElementById("litros").innerHTML = litros+'L';
		document.getElementById("porcentagem").innerHTML = porcentagem+'%';
		document.getElementById("data").innerHTML = data;
		document.getElementById("horas").innerHTML = horas;
		document.getElementById("status").innerHTML = status;
	    //document.getElementById("sinal").innerHTML = sinal;
		//document.getElementById("total_litros_atual").innerHTML = total_litros_atual+' L';
		document.getElementById("vazao_atual_web").innerHTML = vazao_atual+' L/min';

		setTimeout(function(){
        odometer.innerHTML = total_litros_atual;
        }, 1000);

		
		<?php
			$useragent=$_SERVER['HTTP_USER_AGENT'];
			if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
			{
		?>		
			document.getElementById("total_litros_atual_cel").innerHTML = total_litros_atual+' L';
		document.getElementById("vazao_atual_cel").innerHTML = vazao_atual+' L/min';
		<?php }?>



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
},1000);





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


setInterval(function(){
$(document).ready(function() {
    $('#img').load('https://aquacheck.com.br/caixaimg/{{$t->id_caixa}}');
});







$(document).ready(function() {
    $('#reboots').load('https://aquacheck.com.br/reboots/{{$t->id_caixa}}');
});

$(document).ready(function() {
    $('#vazao_media').load('https://aquacheck.com.br/vazao_media/{{$t->id_caixa}}');
});


},9000);
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


<div class="container-fluid">
								
<div class="breadcrumb-header justify-content-between">
	
	                    <!----1º Div --->
						<div class="col-sm-12 col-xl-4 col-lg-12">
                            <div class="card user-wideget user-wideget-widget widget-user">
                                <div class="widget-user-header bg-primary">
                                    <h5 class="widget-user-desc">Nível de Caixa D'água</h5>
                                    <h5 class="widget-user-desc">Fabio Rangel</h5>
                                </div>
                                <div class="widget-user-image">
                                    <img src="https://aquacheck.com.br/public/img/caixa/casa-belavista.jpg" class="brround" alt="User Avatar">
                                </div>


								<div class="row">
										<div class="col-md-12" style="position: absolute; color: white; text-align: right; width: 100px; padding-left: 85%; top: 20px;"> 
											<div class="">
										
											<table>
											
												<tr><td> Hoje</td></tr>
											</table>

										
											</div>
										</div>
										
									</div>


									<div class="d-flex flex-row justify-content-between  mg-b-20">
											<div class="pd-10 ">
												<i class="far fa-calendar"> </i>&nbsp;<spam id="data"></spam><br> <span style="font-size: 10px;"> Ultima data Atualizada </span>
											</div>
											<div class="pd-10 ">
												<i class="far fa-calendar"> </i></spam>
											</div>
											<div class="pd-10 ">
												<i class="far fa-clock"> </i>&nbsp;<spam id="horas"></spam><br> <span style="font-size: 10px;"> Ultima Hora Atualizada </span>
											</div>
										</div>
											
											

								
							

                                <div class="user-wideget-footer">
                                    <div class="row">
                                        <div class="col-sm-12 border-end" style="text-align: center;">
										<div id="img" ></div>
                                        </div>
                                    </div>


									<div class="row">
                                        <div class="col text-center">
                                            <label class="tx-12">Altura</label>
                                            <p class="fw-bold tx-20"><b><div id="nivel"></div></b></p>
                                        </div><!-- col -->
                                        <div class="col border-start text-center">
                                            <label class="tx-12">Litros</label>
                                            <p class="fw-bold tx-20"><b><div id="litros"></div></b></p>
                                        </div><!-- col -->
                                        <div class="col border-start text-center">
                                            <label class="tx-12">Nível</label>
                                            <p class="fw-bold tx-20"><b><div id="porcentagem"></div></b></p>
                                        </div><!-- col -->
                                    </div>
								
									
                                </div>
                            </div>

						          <div class="d-flex justify-content-between">
                                        <h4 class="csard-title mb-3">Entradas</h4>
                                    </div>
                                    <div class="d-flex mb-0" >
											<table style="width: 100%;" border="1" >
												<tr style="">
												@foreach ($count_entrada as $t)
<?php

$diasemanahoje = strftime("%A", strtotime($hoje = date('Y-m-d')));
$diasemanahoje = substr($diasemanahoje, 0, 3);


$diasemana = strftime("%A", strtotime($t->date));
$diasemana = substr($diasemana, 0, 3);
$total3 =  $t->maximo - $t->minimo;


if ($diasemana == $diasemanahoje){
$gota = 'gotared.png'; 
}else{
$gota = 'gotaazul.png'; 	
}
?>		
<td style="background-color: rgb(231, 234, 236) ;eight: 100px; text-align: center; border-style:solid; border-color: blue; border-width: 1px;">
<img src="https://aquacheck.com.br/public/img/caixa/{{$gota}}" style="width: 20px;" alt=""><br>{{$diasemana}}<br><b style="font-size: 12px;" > {{$total3}}L</b>
</td>
@endforeach						
														
												</tr>
											</table>



											


                                    </div>



                                </div>
                          		<br><br>				
						<!----2º Div --->
						<div class="col-sm-12 col-xl-4 col-lg-12">
						<div class="card bg-success-gradient text-white">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="icon1 mt-2 text-center" >
                                              <h2><div id="status"></div></h2>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mt-0 text-center">
                                                <span class="text-white">Nivel</span>
                                                <h2 class="text-white mb-0"><div id="nivelstatus"></div></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>




					<?php  // se mobile
						$useragent=$_SERVER['HTTP_USER_AGENT'];
						if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
						{
					?>

					    <!----3º Div --->
							<div class="row">
										<div class="col-md-4"> 
											<div class="card">
												<div class="card-body iconfont text-center">
													 <table style="width: 100%; text-align: center; font-size: 100%;">
														<tr><td style=" width: 30%;">{{$sinal}}  db</td><td style=""><img src="https://aquacheck.com.br/public/img/caixa/{{$img_sinal}}" style="width: 60%;" alt=""></td><td style=" width: 30%;">{{$nivel_sinal}}</td></tr>
													 </table>
												     
												</div>
											</div>
										</div>
										<div class="col-md-4"> 
											<div class="card">
												<div class="card-body iconfont text-center">
												<table style="width: 100%; text-align: center; font-size: 100%;">
														<tr>
														<td style=" width: 30%;">
														<div id="vazao_atual_web"></div>
														</td>
														<td>
														<div id="img_vazao"></div>
													
														</td><td style=" width: 30%;"> <div id="total_litros_atual_cel"></div> </td></tr>
													 </table>
											
												</div>
											</div>
										</div>
										<div class="col-md-4"> 
											<div class="card">
												
												
												<table style="width: 100%; text-align: center; font-size: 100%;">
														<tr>
														<td style=" width: 33%;">
															Ligado a
														
														</td>
														<td>
															<div ><img src="https://aquacheck.com.br/public/img/caixa/funcionando.jpg" alt=""></div>
													
														</td><td style=" width: 33%;"> <span style="font-size: 15px;"> {{$horas}} Hr </span> </td></tr>
													 </table>
												
												
												
											
												
											
												</div>
										</div>
									</div>	

									<div class="row">
										<div class="col-md-12"> 
											<div class="card">
												<div class="card-body iconfont text-center">
													<div style="width: 1000px;" id="chart_div6"></div>xx
											
												</div>
											</div>
										</div>
										
									</div>


											
			                 <?php }else{	?>
	




								<div class="row">
										<div class="col-md-4"> 
											<div class="card">
												<div class="card-body iconfont text-center">
													<img src="https://aquacheck.com.br/public/img/caixa/{{$img_sinal}}" alt="">
												  <span style="font-size: 15px;">	{{$sinal}}  </span>
											
												</div>
											</div>
										</div>
										<div class="col-md-4"> 
											<!--
											<div class="card">
												<div class="card-body iconfont text-center">
												</div>
											</div>
							 		-->
										</div>
										<div class="col-md-4"> 
											<div class="card">
												<div class="card-body iconfont text-center">
													<img src="https://aquacheck.com.br/public/img/caixa/funcionando.jpg" alt="">
													<span style="font-size: 15px;">Ligado a {{$horas}} Hr </span>
												</div>
											</div>
										</div>
									</div>



									<div class="row">
										<div class="col-md-6"> 
											<div class="card">
												<div class="card-body iconfont text-center">
													<div style="position: relative; left: 25px;" id="chart_div6"></div>
											
												</div>
											</div>
										</div>
										<div class="col-md-6"> 
											<div class="card">
												<div class="card-body iconfont text-center">
													<div id="img_vazao2"></div>
													<span style="font-size: 15px;">	<div id="vazao_atual_web"></div>  </span>
							
												</div>
											</div>
										</div>
									</div>



                               <?php } ?>




							   <div class="card" style="text-align: center;" >
                                <div class="card-body" style="text-align: center;">
								
<table width="100%">
	<tr><td><div id="odometer" class="odometer" style="position: relative; left: 10px">00000000 </div></td><td>           <img src="https://aquacheck.com.br/public/img/caixa/clock1.gif" width="90" style="padding-left: 30px;" alt="" >
							</td></tr>
</table>
                                		
                             	

									</div>
									</div>


									

						

							<div class="card">
                                <div class="card-body iconfont text-start">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="card-title mb-3">Últimos Registros</h4>
                                    </div>
                                    <div class="d-flex mb-0">
											<div style="width: 100%" id="ultimos5"></div>
                                    </div>

								
                                </div>
                            </div>


							<div class="card">
                                <div class="card-body iconfont text-start">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="card-title mb-3">Reboots</h4>
                                    </div>
                                    <div class="d-flex mb-0">
											<div style="width: 100%" id="reboots"></div>
                                    </div>

								
                                </div>
                            </div>





							</div>


							
<div class="col-sm-12 col-xl-4 col-lg-12">
<div class="card mg-b-20">
		<div class="card-body">
			<div class="main-content-label mg-b-5">
				Nível da Caixa
			</div>
			<p class="mg-b-20">Visualize Horários de maior consumo  .</p>
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


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

<br>










</div>
</div>




<div class="card mg-b-20">
		<div class="card-body">
			<div class="main-content-label mg-b-5">
				Nível da Caixa Diário
			</div>
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




<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
	var data = google.visualization.arrayToDataTable([
	['Horas', 'Vazão'],
	@foreach ($chart_vazao as $t)

	['{{ $t->hora }}h',  {{$t->vazao}}],
		
	@endforeach
	]);

	var options = {
	title: " 1 Fluxo de Vazão de Agua {{$hoje}}",
	chartArea: {'width': '90%', 'height': '70%'},
	curveType: 'function',
	legend: { position: 'bottom' }
	};
	var chart = new google.visualization.LineChart(document.getElementById('vazao_chart'));
	chart.draw(data, options);
}
</script>
<div id="vazao_chart" style="" ></div>

<br>


<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
	var data = google.visualization.arrayToDataTable([
	['Horas', 'Max'],
	@foreach ($chart_vazao2 as $t)

	['{{ $t->hora }}h',  {{$t->maximo}} ],
		
	@endforeach
	]);

	var options = {
	title: "Fluxo de Vazão de Agua {{$hoje}}",
	chartArea: {'width': '90%', 'height': '70%'},
	curveType: 'function',
	legend: { position: 'bottom' }
	};
	var chart = new google.visualization.LineChart(document.getElementById('vazao_chart2'));
	chart.draw(data, options);
}
</script>
<div id="vazao_chart2" style="" ></div>

<br>





			<p class="mg-b-20">Visualize os Dias de maior consumo  .</p>
	
<script type="text/javascript">
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawMultSeries);

function drawMultSeries() {
      var data = new google.visualization.DataTable();
      data.addColumn('timeofday', 'Time of Day');
      data.addColumn('number', 'Motivation Level');
      data.addColumn('number', 'Energy Level');


	  

	  data.addRows([

@foreach ($lista2 as $t)


//['{{ date("d", strtotime($t->date)) }}',  {{ 72 -$t->minimo + 19   }},   {{ 72 -$t->maximo + 19   }} , 2],

@endforeach


	  [{v: [8, 0, 0], f: '8 am'}, 1, .25],
        [{v: [9, 0, 0], f: '9 am'}, 2, .5],
        [{v: [10, 0, 0], f:'10 am'}, 3, 1],
      ]);

      var options = {
        title: 'Motivation and Energy Level Throughout the Day',
        hAxis: {
          title: 'Time of Day',
          format: 'h:mm a',
          viewWindow: {
            min: [7, 30, 0],
            max: [17, 30, 0]
          }
        },
        vAxis: {
          title: 'Rating (scale of 1-10)'
        }
      };

      var chart = new google.visualization.ColumnChart(
        document.getElementById('chart_div5'));

      chart.draw(data, options);
    }
	</script>
										<div id="chart_div5"></div>



<br>

</div>


</div>



</div>

</div>
</div>

</div>
</div>
@endforeach
<script src="https://admintravel.com.br/public/assets/plugins/jquery/jquery.min.js"></script>
<script src="https://admintravel.com.br/public/assets/plugins/ionicons/ionicons.js"></script>
<script src="https://admintravel.com.br/public/assets/js/custom.js"></script><!-- Left-menu js-->
	</body>
</html>








