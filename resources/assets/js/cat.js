/**
 * Originalmente escrito por DGmike, atualizado por roberto.cr e Ian Pacheco
 * http://code.google.com/p/tipos-cats-js/
 */

/* Dom Ready */
window.onDomReady = function dgDomReady(fn){
	if(document.addEventListener)	//W3C
		document.addEventListener("DOMContentLoaded", fn, false);
	else //IE
		document.onreadystatechange = function(){dgReadyState(fn);}
}

function dgReadyState(fn){ //dom is ready for interaction (IE)
	if(document.readyState == "interactive") fn();
}

/* Objeto */
var dgTipoCat = function(data) {
  var defaultData = {
    cat: false,
    catVal: '',
    tipo: false,
    tipoVal: '',
    change: false
  }
  for (name in defaultData) {
    if (!data[name]) {
      data[name] = defaultData[name];
    }
  }
  var keys = ['cat', 'tipo'];
  if (data['change']) { //caso change: true, não se trata de um select a ser povoado
    var nome, length = keys.length;
    for (var a=0; a<length; a++ ) {
      nome = keys[a];
      if (data[nome].tagName) {
        var opt = document.createElement('select');
        opt.disabled = null
        for (var i = 0; i < data[nome].attributes.length ; i++) {
          var attr = data[nome].attributes[i];
          if (attr.name != 'type') {
            opt.setAttribute(attr.name, attr.value);
          }
        }
        opt.size=1;
        opt.disabled=false;
        data[nome].parentNode.replaceChild(opt, data[nome]);
        data[nome] = opt;
      }
    }
  }
  this.set(data['cat'], data['tipo']);
  this.start();

  var nome, length = keys.length;
  for (var i=0; i<length; i++) {
    nome = keys[i]; //cat e tipo
	
    if (this[nome].getAttribute('value')) {
      data[nome+'Val'] = this[nome].getAttribute('value');
    }
	
    if (data[nome+'Val']) { //preenche catVal e tipoVal se fornecidos na criação do dgTipoCat.
		var options = this[nome].options;
		if (nome=='cat') this.cat.onchange(); //se tiver preenchido o cat, dá run() pra preencher as tipos
		for (var j = 0; j<options.length; j++) { //olha cada linha e vê se é a que quer... aí coloca como selected.
			if (options[j].tagName == 'OPTION') {
				if (options[j].value == data[nome+'Val']) {
					options[j].setAttribute('selected',true);
					if (nome=='cat'){ //esses dois passos são necessários pro IE6!
						this.cat.selectedIndex=j;
						this.cat.onchange();
					}
				}
			}
		}
	}
	
  }
  
}

