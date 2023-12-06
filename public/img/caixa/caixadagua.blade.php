<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <!--ScriptSharp library-->
    <script src="https://fabiorangel.com.br/public/medidores/Scripts/mscorlib.js" type="text/javascript"></script>
    <!--Perfectwidgets library-->
    <script src="https://fabiorangel.com.br/public/medidores/Scripts/PerfectWidgets.js" type="text/javascript"></script>
    <script type="text/javascript">
        var slider;
        window.onload = function () {
            //widget model
			
            var jsonModel = {"Active":true,"BreakEventsBubbling":false,"CssClass":{},"Fill":null,"JSBindingsText":null,"Name":"Instrument","RecalculateAll":false,"Smooth":true,"Stroke":null,"Style":"","ToolTipValue":null,"Visible":true,"Elements":[{"__type":"Guide:#PerpetuumSoft.Instrumentation.Model","Active":true,"BreakEventsBubbling":false,"CssClass":{},"Fill":null,"JSBindingsText":null,"Name":"Guide1","RecalculateAll":false,"Smooth":true,"Stroke":null,"Style":"","ToolTipValue":null,"Visible":true,"Elements":[{"__type":"Scale:#PerpetuumSoft.Instrumentation.Model","Active":true,"BreakEventsBubbling":false,"CssClass":{},"Fill":null,"JSBindingsText":null,"Name":"Scale1","RecalculateAll":false,"Smooth":true,"Stroke":null,"Style":"","ToolTipValue":null,"Visible":true,"Elements":[{"__type":"NumericLabels:#PerpetuumSoft.Instrumentation.Model","Active":true,"BreakEventsBubbling":false,"CssClass":{},"Fill":null,"JSBindingsText":"this.setDistance((PerfectWidgets.Framework.Geometry.GeometryUtilities.getDistance(this.getInstrument().getByName('Guide1').getStartPoint(), this.getInstrument().getByName('Guide1').getEndPoint())\/4));\u000a","Name":"NumericLabels1","RecalculateAll":false,"Smooth":false,"Stroke":null,"Style":"","ToolTipValue":null,"Visible":true,"Colorizer":null,"Distance":192.1875,"Dock":0,"MaxLimitWrapper":{"__type":"SmartValueWrapper:#PerpetuumSoft.Instrumentation.Model","Kind":0,"Value":0},"MinLimitWrapper":{"__type":"SmartValueWrapper:#PerpetuumSoft.Instrumentation.Model","Kind":0,"Value":0},"OriginWrapper":{"__type":"SmartValueWrapper:#PerpetuumSoft.Instrumentation.Model","Kind":0,"Value":0},"Padding":0,"Font":{"Bold":0,"FamilyName":"Microsoft Sans Serif","Italic":0,"Size":10,"Strikeout":0,"Underline":0},"Format":{"CurrencyNegativePattern":0,"CurrencyPositivePattern":0,"CurrencySymbol":"$","DateSeparator":".","DecimalPlaces":2,"DecimalSeparator":".","FormatMask":"","FormatStyle":0,"GroupSeparator":" ","NumberNegativePattern":0,"PercentNegativePattern":0,"PercentPositivePattern":0,"UseCultureSettings":true,"UseGroupSeparator":true},"Formula":"","ItemMargins":{},"OddLabelsDistance":0,"Position":1,"ShowSuperposableLabels":true,"TextAlignment":1,"TextAngle":0,"TextRotationMode":1,"Divisions":10,"StepWrapper":{"__type":"SmartValueWrapper:#PerpetuumSoft.Instrumentation.Model","Kind":0,"Value":0},"UseRoundValues":false},{"__type":"Ticks:#PerpetuumSoft.Instrumentation.Model","Active":true,"BreakEventsBubbling":false,"CssClass":{},"Fill":{"__type":"SolidFill:#PerpetuumSoft.Framework.Drawing","Color":{"knownColor":164,"name":null,"state":1,"value":0}},"JSBindingsText":"this.setDistance((PerfectWidgets.Framework.Geometry.GeometryUtilities.getDistance(this.getInstrument().getByName('Guide1').getStartPoint(), this.getInstrument().getByName('Guide1').getEndPoint())\/6));\u000a","Name":"Ticks1","RecalculateAll":false,"Smooth":true,"Stroke":{"__type":"SimpleStroke:#PerpetuumSoft.Framework.Drawing","Width":1,"Color":{"knownColor":35,"name":null,"state":1,"value":0},"DashLenght":5,"DotLenght":1,"SpaceLenght":2,"Style":1},"Style":"Default","ToolTipValue":null,"Visible":true,"Colorizer":null,"Distance":128.125,"Dock":0,"MaxLimitWrapper":{"__type":"SmartValueWrapper:#PerpetuumSoft.Instrumentation.Model","Kind":0,"Value":0},"MinLimitWrapper":{"__type":"SmartValueWrapper:#PerpetuumSoft.Instrumentation.Model","Kind":0,"Value":0},"OriginWrapper":{"__type":"SmartValueWrapper:#PerpetuumSoft.Instrumentation.Model","Kind":0,"Value":0},"Padding":0,"Divisions":10,"StepWrapper":{"__type":"SmartValueWrapper:#PerpetuumSoft.Instrumentation.Model","Kind":0,"Value":0},"SubDivisions":4,"SubTicksPosition":0,"UseDescreteValues":false,"UseRoundValues":false,"Length":10,"SubLength":5},{"__type":"Slider:#PerpetuumSoft.Instrumentation.Model","Active":true,"BreakEventsBubbling":false,"CssClass":{},"Fill":null,"JSBindingsText":null,"Name":"Slider1","RecalculateAll":false,"Smooth":true,"Stroke":null,"Style":"","ToolTipValue":null,"Visible":true,"Elements":[{"__type":"Tank:#PerpetuumSoft.Instrumentation.Model","Active":true,"BreakEventsBubbling":false,"CssClass":{},"Fill":null,"JSBindingsText":"this.setValue(this.getInstrument().getByName('Slider1').getAnimationValue());\u000athis.setWidth((PerfectWidgets.Framework.Geometry.GeometryUtilities.getDistance(this.getInstrument().getByName('Guide1').getStartPoint(), this.getInstrument().getByName('Guide1').getEndPoint())\/6));\u000athis.setDepth((PerfectWidgets.Framework.Geometry.GeometryUtilities.getDistance(this.getInstrument().getByName('Guide1').getStartPoint(), this.getInstrument().getByName('Guide1').getEndPoint())\/12));\u000a","Name":"Tank1","RecalculateAll":false,"Smooth":true,"Stroke":null,"Style":"","ToolTipValue":null,"Visible":true,"Colorizer":null,"Distance":0,"Dock":0,"MaxLimitWrapper":{"__type":"SmartValueWrapper:#PerpetuumSoft.Instrumentation.Model","Kind":0,"Value":0},"MinLimitWrapper":{"__type":"SmartValueWrapper:#PerpetuumSoft.Instrumentation.Model","Kind":0,"Value":0},"OriginWrapper":{"__type":"SmartValueWrapper:#PerpetuumSoft.Instrumentation.Model","Kind":0,"Value":0},"Padding":0,"ValueWrapper":{"__type":"SmartValueWrapper:#PerpetuumSoft.Instrumentation.Model","Kind":1,"Value":48.3739837398374},"Depth":64.0625,"Effect3D":0,"LiquidColor":{"knownColor":151,"name":null,"state":1,"value":0},"TankColor":{"knownColor":74,"name":null,"state":1,"value":0},"TankWidth":25,"Width":128.125}],"MaxLimit":{"Kind":0,"Value":0},"MinLimit":{"Kind":0,"Value":0},"Step":0,"Value":48.3739837398374}],"Colorizer":null,"Maximum":50,"Minimum":0,"Reverse":false}],"Margins":{},"Align":0,"EndPoint":{"Height":93.75,"Length":237.99290955824714,"Rotation":0.40489178628508343,"Width":218.75,"X":218.75,"Y":93.75},"GuideDirection":1,"StartPoint":{"Height":862.5,"Length":889.8077390650185,"Rotation":1.3224105218266067,"Width":218.75,"X":218.75,"Y":862.5}}],"Enabled":true,"Focused":false,"GridStep":50,"IsFixed":false,"MeasureUnit":{},"Parameters":[],"ShowGrid":false,"Size":{"Height":1050,"Length":1162.9703349613008,"Rotation":1.1263771168937977,"Width":500,"X":500,"Y":1050},"SnapToGrid":true,"Styles":[{"__type":"Style:#PerpetuumSoft.Instrumentation.Styles","Fill":{"__type":"SolidFill:#PerpetuumSoft.Framework.Drawing","Color":{"knownColor":164,"name":null,"state":1,"value":0}},"Font":{"Bold":0,"FamilyName":"Microsoft Sans Serif","Italic":0,"Size":10,"Strikeout":0,"Underline":0},"Image":null,"Name":"Default","Stroke":{"__type":"SimpleStroke:#PerpetuumSoft.Framework.Drawing","Width":1,"Color":{"knownColor":35,"name":null,"state":1,"value":0},"DashLenght":5,"DotLenght":1,"SpaceLenght":2,"Style":1}},{"__type":"Style:#PerpetuumSoft.Instrumentation.Styles","Fill":{"__type":"SolidFill:#PerpetuumSoft.Framework.Drawing","Color":{"knownColor":95,"name":null,"state":1,"value":0}},"Font":{"Bold":0,"FamilyName":"Microsoft Sans Serif","Italic":0,"Size":10,"Strikeout":0,"Underline":0},"Image":null,"Name":"Tank","Stroke":null},{"__type":"Style:#PerpetuumSoft.Instrumentation.Styles","Fill":{"__type":"SolidFill:#PerpetuumSoft.Framework.Drawing","Color":{"knownColor":150,"name":null,"state":1,"value":0}},"Font":{"Bold":0,"FamilyName":"Microsoft Sans Serif","Italic":0,"Size":10,"Strikeout":0,"Underline":0},"Image":null,"Name":"TankTop","Stroke":{"__type":"SimpleStroke:#PerpetuumSoft.Framework.Drawing","Width":1,"Color":{"knownColor":74,"name":null,"state":1,"value":0},"DashLenght":5,"DotLenght":1,"SpaceLenght":2,"Style":1}},{"__type":"Style:#PerpetuumSoft.Instrumentation.Styles","Fill":{"__type":"SolidFill:#PerpetuumSoft.Framework.Drawing","Color":{"knownColor":95,"name":null,"state":1,"value":0}},"Font":{"Bold":0,"FamilyName":"Microsoft Sans Serif","Italic":0,"Size":10,"Strikeout":0,"Underline":0},"Image":null,"Name":"TankTopInternal","Stroke":{"__type":"SimpleStroke:#PerpetuumSoft.Framework.Drawing","Width":1,"Color":{"knownColor":74,"name":null,"state":1,"value":0},"DashLenght":5,"DotLenght":1,"SpaceLenght":2,"Style":1}},{"__type":"Style:#PerpetuumSoft.Instrumentation.Styles","Fill":{"__type":"SolidFill:#PerpetuumSoft.Framework.Drawing","Color":{"knownColor":151,"name":null,"state":1,"value":0}},"Font":{"Bold":0,"FamilyName":"Microsoft Sans Serif","Italic":0,"Size":10,"Strikeout":0,"Underline":0},"Image":null,"Name":"Liguid","Stroke":null},{"__type":"Style:#PerpetuumSoft.Instrumentation.Styles","Fill":{"__type":"LinearGradientFill:#PerpetuumSoft.Framework.Drawing","Angle":30,"Colors":[{"__type":"GradientColor:#PerpetuumSoft.Framework.Drawing","Color":{"knownColor":67,"name":null,"state":1,"value":0},"Portion":0},{"__type":"GradientColor:#PerpetuumSoft.Framework.Drawing","Color":{"knownColor":100,"name":null,"state":1,"value":0},"Portion":1}],"EndColor":{"knownColor":100,"name":null,"state":1,"value":0},"StartColor":{"knownColor":67,"name":null,"state":1,"value":0}},"Font":{"Bold":0,"FamilyName":"Microsoft Sans Serif","Italic":0,"Size":10,"Strikeout":0,"Underline":0},"Image":null,"Name":"LiguidTop","Stroke":{"__type":"SimpleStroke:#PerpetuumSoft.Framework.Drawing","Width":1,"Color":{"knownColor":28,"name":null,"state":1,"value":0},"DashLenght":5,"DotLenght":1,"SpaceLenght":2,"Style":1}}]};
            //creating widget	
			
			var widget = new PerfectWidgets.Widget("root", jsonModel);
            //getting slider object
            slider = widget.getByName("Slider1");
			
        }
     
    </script>
</head>
<body>
@foreach ($lista as $t)
	
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.js"></script>
<script>
setInterval(function(){
	$(document).ready(function() {
		$.get('{!! url('caixadaguanivel')!!}', function(resultado){
		resultado[1]="cm";
		
		var espaçoVasioTampaCapacidadeTotal = 19; //19 distancia minima
		var capacidadeTotal = 72; //72cm
		var cm = (resultado[0].cm);
		var datetime = (resultado[0].updated_at);

		

		var nivel = capacidadeTotal - cm + espaçoVasioTampaCapacidadeTotal;

if(nivel < 74 ){		

             if(nivel == 72){ // total
				var litros  = 2000;
				var porcentagem = 100;
			 }else if((nivel < 72 )&&(nivel > 62 ) ){
			   var litros  = 1800;
			   var porcentagem = 90;
			 }else if((nivel <= 62 )&&(nivel > 52 ) ){
			   var litros  = 1660;
			   var porcentagem = 80;
			 }else if((nivel <= 52 )&&(nivel > 42 ) ){
			   var litros  = 1340;
			   var porcentagem = 60;   
			}else if((nivel <= 42 )&&(nivel > 32 ) ){
			   var litros  = 1040;
			   var porcentagem = 50;   
			}else if((nivel <= 32 )&&(nivel > 22 ) ){
			   var litros  = 760;
			   var porcentagem = 40;   
			}else if((nivel <= 22 )&&(nivel > 12 ) ){
			   var litros  = 500;
			   var porcentagem = 20;   
			}else if((nivel <= 12 )&&(nivel > 6 ) ){
			   var litros  = 260;
			   var porcentagem = 10;   
			}else if((nivel <= 6 )&&(nivel > 0 ) ){
			   var litros  = 130;
			   var porcentagem = 0;   
			   
			}


}else{
	            var litros  = 0;
				var porcentagem = 0;
}




		console.log(nivel);
		console.log(datetime);
		console.log(litros);
		console.log(porcentagem);
		document.getElementById("nivel").innerHTML = nivel+'cm';
		document.getElementById("litros").innerHTML = litros+'L';
		document.getElementById("porcentagem").innerHTML = porcentagem+'%';
		document.getElementById("datetime").innerHTML = datetime;
		slider.setValue(nivel);
	})
});
},9000);
</script>






<h1 style="text-align: center; font-size: 60px; font-family: Verdana, Geneva, Tahoma, sans-serif;">Nivel de Valume de Caixa D'agua</h1>
<h1 style="text-align: center; font-size: 50px; font-family: Verdana, Geneva, Tahoma, sans-serif;">2 Mil Litros</h1>

<img src="https://fabiorangel.com.br/public/img/caixa/65.jpg" alt="" style="width: 1300px;">

<br>
<h1 style="padding-left: 380px; text-align: center; font-size: 50px; font-family: Verdana, Geneva, Tahoma, sans-serif;"> Ultima Atualização<div id="datetime"></div></h1>

<div style=" padding-left: 300px; font-size: 90px; width: 800px;">
	<table border="1">
	<tr>
		<td style="width: 320px;">Altura</td>
		<td style="width: 270px;">Litros</td>
		<td style="width: 270px;">Nivel</td>
		<tr>
			<td><div id="nivel"></div></h1></td>
			<td><div id="litros"></div></td>
			<td><div id="porcentagem"></div></td>
		</tr>
	</tr>
</table>
<br><br><br><br>
<a href="https://fabiorangel.com.br/relatorio_diario/2023-02-16">Relatório</a>
</div>


<!--
<div id="root" style="margin-left: -100px; width:1400px;height:1400px"></div>
-->

	



<div id="caixa" style="width: 100%; height: 500px">
</div>
	


	@endforeach
</body>
</html>
