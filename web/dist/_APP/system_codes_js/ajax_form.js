

/*  select2*/


function activasuma(){


var $eventSelect = $(".activasuma.select2");
$eventSelect.on("change", function (e) {


e.preventDefault();
objetoHTML = e.target;

setTimeout(
   function(){



var objeto=objetoHTML.getAttribute('activasuma');

var respuestaSuma = document.querySelector("[respuestaSuma='"+objeto+"']");
var respuestaDiferencia = document.querySelector("[respuestaDiferencia='"+objeto+"']");
var respuestaCambio = document.querySelector("[respuestaCambio='"+objeto+"']");


var suma=0;
var calculo = document.querySelectorAll("[suma='"+objeto+"'");
for(var i = 0, total = calculo.length; i < total; i++){
suma=(parseFloat(suma)+parseFloat(calculo[i].value));
// alert(calculo[i].value);
}

var resta=0;
var cresta=0;
var calculoR = document.querySelectorAll("[resta='"+objeto+"'");
for(var i = 0, total = calculoR.length; i < total; i++){

// alert(calculoR[i].value);

if(calculoR[i].value==''){
cresta=0;
}else{
  cresta=calculoR[i].value;
}


resta=(parseFloat(resta)+parseFloat(cresta));

}



respuestaSuma.value=(suma).toFixed(2);




// a pagar
// if((suma-resta)>0){
// respuestaDiferencia.value=(suma-resta).toFixed(2);
// }else{
// respuestaDiferencia.value=(0).toFixed(2);
// }
// 
respuestaDiferencia.value=(resta).toFixed(2);


// para el cambio
if((resta>suma)){
respuestaCambio.value=(resta-suma).toFixed(2);
}else{
respuestaCambio.value=(0).toFixed(2);
}


   }, 500);

});
/*fin de mod2*/



}

function mod_addEnd_Select2(){


var $eventSelect = $(".mod1AddEnd.select2");
$eventSelect.on("change", function (e) { 


e.preventDefault();
objetoHTML = e.target;


var valorOpcion = objetoHTML.options[objetoHTML.selectedIndex].value;
var valor2 = objetoHTML.getAttribute('valor2');

var archivo = objetoHTML.getAttribute('cde');
var respuesta = objetoHTML.getAttribute('result');
var action = objetoHTML.getAttribute('action');
var respuesta = document.querySelector("[respuesta='"+respuesta+"']");

// $(objetoHTML).empty()

//name del formulario
ajax = false;
if (window.XMLHttpRequest) { // Mozilla, Safari,…
ajax = new XMLHttpRequest();
if (ajax.overrideMimeType) {
ajax.overrideMimeType('text/xml'); 
// Ver nota sobre esta linea al final 
} }else if (window.ActiveXObject) { // IE
try {
ajax = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
try {
ajax = new ActiveXObject("Microsoft.XMLHTTP");
} catch (e) {}}}
if (!ajax) {
alert('Falla: su navegador actual no soporta esta pagina, utilizar otro navegador');
return false;
}



// ve el estado de del ajax
ajax.onreadystatechange=function(){
if(ajax.readyState == 4 && ajax.status == 200) {


$(respuesta).append(ajax.responseText);


scripts();
asignaciones()



}
}

//abre el archivo
ajax.open("POST","system_pages/"+archivo+".php", true);
ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=ISO-8859-1');
 //lo muestra hazta que se halla completado la instruccion del archivo .open

// envia la variable

ajax.send( "&action="+action+"&option="+valorOpcion +"&valor2="+valor2  );



});
/*fin de mod2*/



}


function modSelect2(){


var $eventSelect = $(".mod1.select2");



$eventSelect.on("change", function (e) { 

e.preventDefault();
objetoHTML = e.target;


var valorOpcion = objetoHTML.options[objetoHTML.selectedIndex].value;

var valor2 = objetoHTML.getAttribute('valor2');
var archivo = objetoHTML.getAttribute('cde');
var respuesta = objetoHTML.getAttribute('result');
var action = objetoHTML.getAttribute('action');
var respuesta = document.querySelector("[respuesta='"+respuesta+"']");

//name del formulario
ajax = false;
if (window.XMLHttpRequest) { // Mozilla, Safari,…
ajax = new XMLHttpRequest();
if (ajax.overrideMimeType) {
ajax.overrideMimeType('text/xml'); 
// Ver nota sobre esta linea al final 
} }else if (window.ActiveXObject) { // IE
try {
ajax = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
try {
ajax = new ActiveXObject("Microsoft.XMLHTTP");
} catch (e) {}}}
if (!ajax) {
alert('Falla: su navegador actual no soporta esta pagina, utilizar otro navegador');
return false;
}


respuesta.innerHTML = "Cargando  <i class='fa fa-circle-o-notch fa-spin'></i>";

// ve el estado de del ajax
ajax.onreadystatechange=function(){
if(ajax.readyState == 4 && ajax.status == 200) {



respuesta.innerHTML = ajax.responseText;

scripts();
asignaciones()



}
}

//abre el archivo
ajax.open("POST","system_pages/"+archivo+".php", true);
ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=ISO-8859-1');
 //lo muestra hazta que se halla completado la instruccion del archivo .open

// envia la variable

ajax.send("&action="+action+"&option="+valorOpcion+"&valor2="+valor2);



});
/*fin de mod2*/



}

/*  select2*/

/*Fin de mod Selec2*/

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})






var delldiv = function(e){

e.preventDefault();
objetoHTML = event.target;
var padre = objetoHTML.getAttribute('padre');

for (var i = 0; i < padre; i++) {
objetoHTML = objetoHTML.parentNode;
}

objetoHTML.remove();

}


var dellidvalor = function(e){

e.preventDefault();
objetoHTML = event.target;

var archivo = objetoHTML.getAttribute('cde');
var padre = objetoHTML.getAttribute('padre');
var idvalor = objetoHTML.getAttribute('idvalor');
var action = objetoHTML.getAttribute('action');



for (var i = 0; i < padre; i++) {
objetoHTML = objetoHTML.parentNode;
}

objetoHTML.remove();

//name del formulario
ajax = false;
if (window.XMLHttpRequest) { // Mozilla, Safari,…
ajax = new XMLHttpRequest();
if (ajax.overrideMimeType) {
ajax.overrideMimeType('text/xml'); 
// Ver nota sobre esta linea al final 
} }else if (window.ActiveXObject) { // IE
try {
ajax = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
try {
ajax = new ActiveXObject("Microsoft.XMLHTTP");
} catch (e) {}}}
if (!ajax) {
alert('Falla: su navegador actual no soporta esta pagina, utilizar otro navegador');
return false;
}

//abre el archivo
ajax.open("POST","system_pages/"+archivo+".php", true);

// envia la variable
ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=ISO-utf8');

// ve el estado de del ajax
ajax.onreadystatechange=function(){
if(ajax.readyState == 4 && ajax.status == 200) {


}
}

// envia la variable
ajax.send( "action="+action+"&idvalor="+idvalor);
}


var dellIMG = function(e){

e.preventDefault();
objetoHTML = event.target;

var archivo = objetoHTML.getAttribute('cde');
var padre = objetoHTML.getAttribute('padre');
var id = objetoHTML.getAttribute('href');
var action = objetoHTML.getAttribute('action');

for (var i = 0; i <= padre; i++) {
objetoHTML = objetoHTML.parentNode;
}

objetoHTML.remove();

//name del formulario
ajax = false;
if (window.XMLHttpRequest) { // Mozilla, Safari,…
ajax = new XMLHttpRequest();
if (ajax.overrideMimeType) {
ajax.overrideMimeType('text/xml'); 
// Ver nota sobre esta linea al final 
} }else if (window.ActiveXObject) { // IE
try {
ajax = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
try {
ajax = new ActiveXObject("Microsoft.XMLHTTP");
} catch (e) {}}}
if (!ajax) {
alert('Falla: su navegador actual no soporta esta pagina, utilizar otro navegador');
return false;
}

//abre el archivo
ajax.open("POST","system_pages/"+archivo+".php", true);

// envia la variable
ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=ISO-utf8');

// ve el estado de del ajax
ajax.onreadystatechange=function(){
if(ajax.readyState == 4 && ajax.status == 200) {

}
}

// envia la variable
ajax.send( "&action="+action+"&id="+id  );
}




var form0 = function(e){


e.preventDefault();
objetoHTML = event.target;


var archivo = objetoHTML.getAttribute('cde');
var formulario = objetoHTML.getAttribute('name');
var respuesta = objetoHTML.getAttribute('result');
var showMod = objetoHTML.getAttribute('show-mod');
var refresh = objetoHTML.getAttribute('refresh');
var title = objetoHTML.getAttribute('title');
var hideMod = objetoHTML.getAttribute('hide-modal');


var respuesta = document.querySelector("[respuesta='"+respuesta+"']");

var oData = new FormData(document.forms.namedItem(formulario));


//name del formulario
ajax = false;
if (window.XMLHttpRequest) { // Mozilla, Safari,…
ajax = new XMLHttpRequest();
if (ajax.overrideMimeType) {
ajax.overrideMimeType('text/xml'); 
// Ver nota sobre esta linea al final 
} }else if (window.ActiveXObject) { // IE
try {
ajax = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
try {
ajax = new ActiveXObject("Microsoft.XMLHTTP");
} catch (e) {}}}
if (!ajax) {
alert('Falla: su navegador actual no soporta esta pagina, utilizar otro navegador');
return false;
}

//abre el archivo
ajax.open("POST","system_pages/"+archivo+".php", true);
// ajax.setRequestHeader('Content-Type', 'charset=ISO-8859-1');

 //lo muestra hazta que se halla completado la instruccion del archivo .open
respuesta.innerHTML = "Cargando  <i class='fa fa-circle-o-notch fa-spin'></i>";

if((hideMod!=null)){
$('#'+hideMod).modal('hide');
}
// ve el estado de del ajax
ajax.onreadystatechange=function(){
if(ajax.readyState == 4 && ajax.status == 200) {

if((title!=null)){
    swal({

          title: 'Acción ha sido realizada correctamente',
          timer: 2000,
      
          /* imagen que lleva la ventana */
          type: "success",
          
          
          showCancelButton: false, 
          /* mostrar boton de cancelar  */
          showConfirmButton: false, 
          /* mostrar boton de confirman  */
          

          confirmButtonClass: 'btn-danger',  
          /*  clase que tiene el boton de cancelar  */


          confirmButtonText: 'Confirmar',
          cancelButtonText: 'Cancelar',
          

          closeOnConfirm: false,  
          /* cerrar ventana cuando se preciona el boton confirmar
          si no se cierra pasa a la siguiente funcion  */

          closeOnCancel: false
/* cerrar ventana cuando se preciona el boton cancelar
          si no se cierra pasa a la siguiente funcion  */
        }
);
}

  if((refresh!=null)){
window.location.reload();
}else{
respuesta.innerHTML = ajax.responseText;
}


if((showMod!=null) ||  (showMod!='')){
$('#'+showMod).modal('show');
}


scripts();
asignaciones()

}
}

// envia la variable
ajax.send(oData);

}


var form01 = function(e){


e.preventDefault();
objetoHTML = event.target;

var archivo = objetoHTML.getAttribute('cde');
var formulario = objetoHTML.getAttribute('name');

var oData = new FormData(document.forms.namedItem(formulario));


//name del formulario
ajax = false;
if (window.XMLHttpRequest) { // Mozilla, Safari,…
ajax = new XMLHttpRequest();
if (ajax.overrideMimeType) {
ajax.overrideMimeType('text/xml'); 
// Ver nota sobre esta linea al final 
} }else if (window.ActiveXObject) { // IE
try {
ajax = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
try {
ajax = new ActiveXObject("Microsoft.XMLHTTP");
} catch (e) {}}}
if (!ajax) {
alert('Falla: su navegador actual no soporta esta pagina, utilizar otro navegador');
return false;
}

//abre el archivo
ajax.open("POST","system_pages/"+archivo+".php", true);
// ajax.setRequestHeader('Content-Type', 'charset=ISO-8859-1');

 //lo muestra hazta que se halla completado la instruccion del archivo .open
// respuesta.innerHTML = "Cargando  <i class='fa fa-circle-o-notch fa-spin'></i>";



// ve el estado de del ajax
ajax.onreadystatechange=function(){
if(ajax.readyState == 4 && ajax.status == 200) {


var response = JSON.parse(ajax.response);
respuesta_ajax(response);



scripts();
asignaciones()

}
}

// envia la variable
ajax.send(oData);

}



var selectMod1 = function(e){

e.preventDefault();
objetoHTML = event.target;

var valorOpcion = objetoHTML.options[objetoHTML.selectedIndex].value;
var refresh = objetoHTML.getAttribute('refresh');
var archivo = objetoHTML.getAttribute('cde');
var respuesta = objetoHTML.getAttribute('result');
var action = objetoHTML.getAttribute('action');
var respuesta = document.querySelector("[respuesta='"+respuesta+"']");

//name del formulario
ajax = false;
if (window.XMLHttpRequest) { // Mozilla, Safari,…
ajax = new XMLHttpRequest();
if (ajax.overrideMimeType) {
ajax.overrideMimeType('text/xml'); 
// Ver nota sobre esta linea al final 
} }else if (window.ActiveXObject) { // IE
try {
ajax = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
try {
ajax = new ActiveXObject("Microsoft.XMLHTTP");
} catch (e) {}}}
if (!ajax) {
alert('Falla: su navegador actual no soporta esta pagina, utilizar otro navegador');
return false;
}


respuesta.innerHTML =  "Cargando  <i class='fa fa-circle-o-notch fa-spin'></i>";

// ve el estado de del ajax
ajax.onreadystatechange=function(){
if(ajax.readyState == 4 && ajax.status == 200) {




 if((refresh!=null)){
window.location.reload();
}

respuesta.innerHTML = ajax.responseText;

scripts();
asignaciones()



}
}

//abre el archivo
ajax.open("POST","system_pages/"+archivo+".php", true);
ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=ISO-8859-1');
 //lo muestra hazta que se halla completado la instruccion del archivo .open

// envia la variable

ajax.send( "&action="+action+"&option="+valorOpcion  );



}



var updateClassOption = function(e){

e.preventDefault();
objetoHTML = event.target;


// $(objetoHTML).each(function(){
//    alert($(this).text()+' valor '+ $(this).attr('value'))
// });



for(var i = 0, totali = objetoHTML.options.length; i < totali; i++){

var classAdd = objetoHTML.options[i].getAttribute('updateClass');
var elementos = objetoHTML.options[i].getAttribute('elemento');

// alert(elementos+' '+classAdd+' '+val);
// var updateClass = document.querySelectorAll('[almacenable]');
var updateDom = document.querySelectorAll(objetoHTML.getAttribute('updateDom'));

// alert(objetoHTML.getAttribute('updateDom'));

for(var k = 0, totalk = updateDom.length; k < totalk; k++){
$(updateDom[k]).removeClass(classAdd);
}

}

var valorOpcion = objetoHTML.options[objetoHTML.selectedIndex].value;


var classAdd = objetoHTML.options[objetoHTML.selectedIndex].getAttribute('updateClass');
var elementos = objetoHTML.options[objetoHTML.selectedIndex].getAttribute('elemento');



var updateClass = document.querySelectorAll(elementos);
for(var i = 0, total = updateClass.length; i < total; i++){

$(updateClass[i]).addClass(classAdd);
}


var valor2 = objetoHTML.getAttribute('valor2');
var archivo = objetoHTML.getAttribute('cde');
var respuesta = objetoHTML.getAttribute('result');
var action = objetoHTML.getAttribute('action');
var respuesta = document.querySelector("[respuesta='"+respuesta+"']");

//name del formulario
ajax = false;
if (window.XMLHttpRequest) { // Mozilla, Safari,…
ajax = new XMLHttpRequest();
if (ajax.overrideMimeType) {
ajax.overrideMimeType('text/xml'); 
// Ver nota sobre esta linea al final 
} }else if (window.ActiveXObject) { // IE
try {
ajax = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
try {
ajax = new ActiveXObject("Microsoft.XMLHTTP");
} catch (e) {}}}
if (!ajax) {
alert('Falla: su navegador actual no soporta esta pagina, utilizar otro navegador');
return false;
}


respuesta.innerHTML = "Cargando  <i class='fa fa-circle-o-notch fa-spin'></i>";

// ve el estado de del ajax
ajax.onreadystatechange=function(){
if(ajax.readyState == 4 && ajax.status == 200) {



respuesta.innerHTML = ajax.responseText;

scripts();
asignaciones()



}
}

//abre el archivo
ajax.open("POST","system_pages/"+archivo+".php", true);
ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=ISO-8859-1');
 //lo muestra hazta que se halla completado la instruccion del archivo .open

// envia la variable

ajax.send( "&action="+action+"&option="+valorOpcion +"&valor2="+valor2  );

}


var addClassOption = function(e){

e.preventDefault();
objetoHTML = event.target;


var valorOpcion = objetoHTML.options[objetoHTML.selectedIndex].value;


var classAdd = objetoHTML.options[objetoHTML.selectedIndex].getAttribute('updateClass');

var updateClass = document.querySelector("[updateClass='"+objetoHTML.getAttribute('updateClass')+"']");
$(updateClass).removeClass();
$(updateClass).addClass(classAdd);


var valor2 = objetoHTML.getAttribute('valor2');
var archivo = objetoHTML.getAttribute('cde');
var respuesta = objetoHTML.getAttribute('result');
var action = objetoHTML.getAttribute('action');
var respuesta = document.querySelector("[respuesta='"+respuesta+"']");

//name del formulario
ajax = false;
if (window.XMLHttpRequest) { // Mozilla, Safari,…
ajax = new XMLHttpRequest();
if (ajax.overrideMimeType) {
ajax.overrideMimeType('text/xml'); 
// Ver nota sobre esta linea al final 
} }else if (window.ActiveXObject) { // IE
try {
ajax = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
try {
ajax = new ActiveXObject("Microsoft.XMLHTTP");
} catch (e) {}}}
if (!ajax) {
alert('Falla: su navegador actual no soporta esta pagina, utilizar otro navegador');
return false;
}


respuesta.innerHTML = "Cargando  <i class='fa fa-circle-o-notch fa-spin'></i>";

// ve el estado de del ajax
ajax.onreadystatechange=function(){
if(ajax.readyState == 4 && ajax.status == 200) {



respuesta.innerHTML = ajax.responseText;

scripts();
asignaciones()



}
}

//abre el archivo
ajax.open("POST","system_pages/"+archivo+".php", true);
ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=ISO-8859-1');
 //lo muestra hazta que se halla completado la instruccion del archivo .open

// envia la variable

ajax.send( "&action="+action+"&option="+valorOpcion +"&valor2="+valor2  );

}



var selectMod2 = function(e){

  // alert('ejecutada');

e.preventDefault();
objetoHTML = event.target;


var valorOpcion = objetoHTML.options[objetoHTML.selectedIndex].value;

var valor2 = objetoHTML.getAttribute('valor2');
var valor3 = objetoHTML.getAttribute('valor3');
var archivo = objetoHTML.getAttribute('cde');
var respuesta = objetoHTML.getAttribute('result');
var action = objetoHTML.getAttribute('action');
var respuesta = document.querySelector("[respuesta='"+respuesta+"']");

//name del formulario
ajax = false;
if (window.XMLHttpRequest) { // Mozilla, Safari,…
ajax = new XMLHttpRequest();
if (ajax.overrideMimeType) {
ajax.overrideMimeType('text/xml'); 
// Ver nota sobre esta linea al final 
} }else if (window.ActiveXObject) { // IE
try {
ajax = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
try {
ajax = new ActiveXObject("Microsoft.XMLHTTP");
} catch (e) {}}}
if (!ajax) {
alert('Falla: su navegador actual no soporta esta pagina, utilizar otro navegador');
return false;
}

respuesta.innerHTML = "<br>Cargando  <i class='fa fa-circle-o-notch fa-spin'></i>";

// ve el estado de del ajax
ajax.onreadystatechange=function(){
if(ajax.readyState == 4 && ajax.status == 200) {

respuesta.innerHTML = ajax.responseText;
scripts();
asignaciones();
// ajax.close();
}
}


//abre el archivo
ajax.open("POST","system_pages/"+archivo+".php", true);
ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=ISO-8859-1');
 //lo muestra hazta que se halla completado la instruccion del archivo .open

// envia la variable

ajax.send( "&action="+action+"&option="+valorOpcion +"&valor2="+valor2+"&valor3="+valor3  );



}


var linkMod0 = function(e){

e.preventDefault();
objetoHTML = event.target;

var archivo = objetoHTML.getAttribute('cde');
var respuesta = objetoHTML.getAttribute('result');
var valor = objetoHTML.getAttribute('value');
var action = objetoHTML.getAttribute('action');



var respuesta = document.querySelector("#"+respuesta);



//name del formulario
ajax = false;
if (window.XMLHttpRequest) { // Mozilla, Safari,…
ajax = new XMLHttpRequest();
if (ajax.overrideMimeType) {
ajax.overrideMimeType('text/xml'); 
// Ver nota sobre esta linea al final 
} }else if (window.ActiveXObject) { // IE
try {
ajax = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
try {
ajax = new ActiveXObject("Microsoft.XMLHTTP");
} catch (e) {}}}
if (!ajax) {
alert('Falla: su navegador actual no soporta esta pagina, utilizar otro navegador');
return false;
}

ajax.open("POST","system_pages/"+archivo+".php", true);
ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=ISO-8859-1');
 //lo muestra hazta que se halla completado la instruccion del archivo .open

respuesta.innerHTML = "Cargando  <i class='fa fa-circle-o-notch fa-spin'></i>";

// ve el estado de del ajax
ajax.onreadystatechange=function(){
if(ajax.readyState == 4 && ajax.status == 200) {


respuesta.innerHTML = ajax.responseText;

scripts();
asignaciones()


}
}


ajax.send( "&action="+action+"&valor="+valor);
// envia la variable
}

var linkMod1_add_first = function(e){


e.preventDefault();
objetoHTML = event.target;

var archivo = objetoHTML.getAttribute('cde');
var respuesta = objetoHTML.getAttribute('result');
var valor = objetoHTML.getAttribute('value');
var valor2 = objetoHTML.getAttribute('valor2');
var action = objetoHTML.getAttribute('action');



var respuesta = document.querySelector("#"+respuesta);



//name del formulario
ajax = false;
if (window.XMLHttpRequest) { // Mozilla, Safari,…
ajax = new XMLHttpRequest();
if (ajax.overrideMimeType) {
ajax.overrideMimeType('text/xml'); 
// Ver nota sobre esta linea al final 
} }else if (window.ActiveXObject) { // IE
try {
ajax = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
try {
ajax = new ActiveXObject("Microsoft.XMLHTTP");
} catch (e) {}}}
if (!ajax) {
alert('Falla: su navegador actual no soporta esta pagina, utilizar otro navegador');
return false;
}

ajax.open("POST","system_pages/"+archivo+".php", true);
ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=ISO-8859-1');
 //lo muestra hazta que se halla completado la instruccion del archivo .open

// ve el estado de del ajax
ajax.onreadystatechange=function(){
if(ajax.readyState == 4 && ajax.status == 200) {


$(respuesta).prepend(ajax.responseText);

scripts();
asignaciones()


}
}


ajax.send( "&action="+action+"&valor="+valor+"&valor2="+valor2);
// envia la variable
}

var linkMod1_add_end = function(e){


e.preventDefault();
objetoHTML = event.target;

var archivo = objetoHTML.getAttribute('cde');
var respuesta = objetoHTML.getAttribute('result');
var valor = objetoHTML.getAttribute('value');
var valor2 = objetoHTML.getAttribute('valor2');
var action = objetoHTML.getAttribute('action');



var respuesta = document.querySelector("#"+respuesta);



//name del formulario
ajax = false;
if (window.XMLHttpRequest) { // Mozilla, Safari,…
ajax = new XMLHttpRequest();
if (ajax.overrideMimeType) {
ajax.overrideMimeType('text/xml'); 
// Ver nota sobre esta linea al final 
} }else if (window.ActiveXObject) { // IE
try {
ajax = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
try {
ajax = new ActiveXObject("Microsoft.XMLHTTP");
} catch (e) {}}}
if (!ajax) {
alert('Falla: su navegador actual no soporta esta pagina, utilizar otro navegador');
return false;
}

ajax.open("POST","system_pages/"+archivo+".php", true);
ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=ISO-8859-1');
 //lo muestra hazta que se halla completado la instruccion del archivo .open

// ve el estado de del ajax
ajax.onreadystatechange=function(){
if(ajax.readyState == 4 && ajax.status == 200) {


$(respuesta).append(ajax.responseText);

scripts();
asignaciones();
// ajax.close();


}
}


ajax.send( "&action="+action+"&valor="+valor+"&valor2="+valor2);
// envia la variable
}



var calcular= function(e){

e.preventDefault();
objetoHTML = event.target;

// alert('se activo el calculo');

// alert(event);
var calcular = objetoHTML.getAttribute('calcular');
var respuesta = document.querySelector("[respuestacalcular='"+calcular+"']");

var total=0;
var PPU=6;

var U=1;


var elementos = document.querySelectorAll("[calcular='"+calcular+"'");
for(var i = 0, largo = elementos.length; i < largo; i++){

if(elementos[i].getAttribute('operador')=='PPU'){ PPU = elementos[i].value; }
if(elementos[i].getAttribute('operador')=='U'){ U = elementos[i].value; }


}

// alert(PPU+' '+U);
total=((parseFloat(PPU)*parseFloat(U)) );


if(isNaN(total)==true){

  total=0;
}

// var calculo = document.querySelectorAll("[resta='"+objeto+"'");
// for(var i = 0, total = calculo.length; i < total; i++){



respuesta.value= total.toFixed(2);

}

var suma= function(e){

e.preventDefault();
objetoHTML = event.target;
// alert('se activo la suma');






var objeto=objetoHTML.getAttribute('activasuma');

var respuestaSuma = document.querySelector("[respuestaSuma='"+objeto+"']");
var respuestaDiferencia = document.querySelector("[respuestaDiferencia='"+objeto+"']");
var respuestaCambio = document.querySelector("[respuestaCambio='"+objeto+"']");


var suma=0;
var calculo = document.querySelectorAll("[suma='"+objeto+"'");
for(var i = 0, total = calculo.length; i < total; i++){
suma=(parseFloat(suma)+parseFloat(calculo[i].value));
// alert(calculo[i].value);
}

var resta=0;
var cresta=0;
var calculoR = document.querySelectorAll("[resta='"+objeto+"'");
for(var i = 0, total = calculoR.length; i < total; i++){

// alert(calculoR[i].value);

if(calculoR[i].value==''){
cresta=0;
}else{
  cresta=calculoR[i].value;
}


resta=(parseFloat(resta)+parseFloat(cresta));

}



respuestaSuma.value=(suma).toFixed(2);




// a pagar
// if((suma-resta)>0){
// respuestaDiferencia.value=(suma-resta).toFixed(2);
// }else{
// respuestaDiferencia.value=(0).toFixed(2);
// }

respuestaDiferencia.value=(resta).toFixed(2);


// para el cambio
if((resta>suma)){
respuestaCambio.value=(resta-suma).toFixed(2);
}else{
respuestaCambio.value=(0).toFixed(2);
}


   

}


var linkMod3 = function(e){
e.preventDefault();
objetoHTML = event.target;

var archivo = objetoHTML.getAttribute('cde');
var valor1 = objetoHTML.getAttribute('value1');
var valor2 = objetoHTML.getAttribute('value2');
var valor3 = objetoHTML.getAttribute('value3');
var action = objetoHTML.getAttribute('action');
var mdl = objetoHTML.getAttribute('mdl');


var respuesta = document.querySelector("#r"+mdl);


//name del formulario
ajax = false;
if (window.XMLHttpRequest) { // Mozilla, Safari,…
ajax = new XMLHttpRequest();
if (ajax.overrideMimeType) {
ajax.overrideMimeType('text/xml'); 
// Ver nota sobre esta linea al final 
} }else if (window.ActiveXObject) { // IE
try {
ajax = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
try {
ajax = new ActiveXObject("Microsoft.XMLHTTP");
} catch (e) {}}}
if (!ajax) {
alert('Falla: su navegador actual no soporta esta pagina, utilizar otro navegador');
return false;
}

ajax.open("POST","system_pages/"+archivo+".php", true);
ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=ISO-8859-1');
 //lo muestra hazta que se halla completado la instruccion del archivo .open

respuesta.innerHTML = "Cargando  <i class='fa fa-circle-o-notch fa-spin'></i>";

// ve el estado de del ajax
ajax.onreadystatechange=function(){
if(ajax.readyState == 4 && ajax.status == 200) {
respuesta.innerHTML = ajax.responseText;

$('#'+mdl).modal('show')


scripts();
asignaciones()


}
}


ajax.send( "&action="+action+"&valor1="+valor1+"&valor2="+valor2+"&valor3="+valor3);
// envia la variable
}

var linkMod1 = function(e){
e.preventDefault();
objetoHTML = event.target;

var archivo = objetoHTML.getAttribute('cde');
var valor = objetoHTML.getAttribute('value');
var valor2 = objetoHTML.getAttribute('value2');
var action = objetoHTML.getAttribute('action');
var mdl = objetoHTML.getAttribute('mdl');


var respuesta = document.querySelector("#r"+mdl);


//name del formulario
ajax = false;
if (window.XMLHttpRequest) { // Mozilla, Safari,…
ajax = new XMLHttpRequest();
if (ajax.overrideMimeType) {
ajax.overrideMimeType('text/xml'); 
// Ver nota sobre esta linea al final 
} }else if (window.ActiveXObject) { // IE
try {
ajax = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
try {
ajax = new ActiveXObject("Microsoft.XMLHTTP");
} catch (e) {}}}
if (!ajax) {
alert('Falla: su navegador actual no soporta esta pagina, utilizar otro navegador');
return false;
}

ajax.open("POST","system_pages/"+archivo+".php", true);
ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=ISO-8859-1');
 //lo muestra hazta que se halla completado la instruccion del archivo .open

respuesta.innerHTML = "Cargando  <i class='fa fa-circle-o-notch fa-spin'></i>";

// ve el estado de del ajax
ajax.onreadystatechange=function(){
if(ajax.readyState == 4 && ajax.status == 200) {
respuesta.innerHTML = ajax.responseText;

$('#'+mdl).modal('show')


scripts();
asignaciones()


}
}


ajax.send( "&action="+action+"&valor="+valor+"&valor2="+valor2);
// envia la variable
}


var unidadmedida = function(e){

e.preventDefault();
objetoHTML = event.target;

var objeto = objetoHTML.value;
var respuesta = objetoHTML.getAttribute('respuesta');

var elementosUnidad = document.querySelectorAll("["+respuesta+"]");
for(var i = 0, total = elementosUnidad.length; i < total; i++){

elementosUnidad[i].innerHTML= objeto;

}

}

var updateKey = function(e){

e.preventDefault();
objetoHTML = event.target;

var archivo = objetoHTML.getAttribute('cde');
var respuesta = objetoHTML.getAttribute('result');
var valor = objetoHTML.value;
var valor1 = objetoHTML.getAttribute('valor1');
var valor2 = objetoHTML.getAttribute('valor2');
var action = objetoHTML.getAttribute('action');


var respuesta = document.querySelector("#"+respuesta);

//name del formulario
ajax = false;
if (window.XMLHttpRequest) { // Mozilla, Safari,…
ajax = new XMLHttpRequest();
if (ajax.overrideMimeType) {
ajax.overrideMimeType('text/xml'); 
// Ver nota sobre esta linea al final 
} }else if (window.ActiveXObject) { // IE
try {
ajax = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
try {
ajax = new ActiveXObject("Microsoft.XMLHTTP");
} catch (e) {}}}
if (!ajax) {
alert('Falla: su navegador actual no soporta esta pagina, utilizar otro navegador');
return false;
}

ajax.open("POST","system_pages/"+archivo+".php", true);
ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=ISO-8859-1');
 //lo muestra hazta que se halla completado la instruccion del archivo .open

respuesta.innerHTML = "actualizando <i class='fa fa-circle-o-notch fa-spin'></i>";

// ve el estado de del ajax
ajax.onreadystatechange=function(){
if(ajax.readyState == 4 && ajax.status == 200) {

respuesta.innerHTML = ajax.responseText;

scripts();
asignaciones()

}
}

ajax.send( "&action="+action+"&valor="+valor+"&valor1="+valor1+"&valor2="+valor2);
// envia la variable
}


var verImg = function(e){

e.preventDefault();
objetoHTML = event.target;

var respuesta = objetoHTML.getAttribute('result');
var respuesta = document.querySelector("[respuesta='"+respuesta+"']");

  
      var file = objetoHTML.files[0],
      imageType = /image.*/;
    
      if (!file.type.match(imageType)){
       return;
      }
  


      var reader = new FileReader();
      reader.onload = fileOnload;
      reader.readAsDataURL(file);
     

     function fileOnload(e) {
      var result= e.target.result;
      $(respuesta).attr("src",result);
     }


}




/*plugins*/

function resize(){
  
    var offset = this.offsetHeight - this.clientHeight;
 
    var resizeTextarea = function(el) {
        jQuery(el).css('height', 'auto').css('height', el.scrollHeight + offset);
    };
    jQuery(this).on('keyup input', function() { resizeTextarea(this); });

}



function areglodeatuo(){
    var offset = this.offsetHeight - this.clientHeight;
 
  
        jQuery(this).css('height', 'auto').css('height', this.scrollHeight + offset);

}


