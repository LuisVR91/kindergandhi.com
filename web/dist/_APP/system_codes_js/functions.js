function respuesta_ajax(response){



/*si existe la propiedad alert*/
if(response.hasOwnProperty('alert')){
  swal({

html:true,

allowEscapeKey:false,
timer: response.alert.timer  ,




          type: response.alert.type,
          title: response.alert.title,
          text: response.alert.text,

          imageUrl: response.alert.img,
           /* imagen que lleva la ventana */
imageSize: response.alert.imageSize,        
          showCancelButton:   response.alert.showCancelButton, 
          /* mostrar boton de cancelar  */
          showConfirmButton: response.alert.showConfirmButton, 
          /* mostrar boton de confirman  */
          
          confirmButtonClass: response.alert.confirmButtonClass,  
          /*  clase que tiene el boton de confimar  */

          confirmButtonText: response.alert.confirmButtonText,
          cancelButtonText: response.alert.cancelButtonText,
          
          closeOnConfirm: response.alert.closeOnConfirm,  
          /* cerrar ventana cuando se preciona el boton confirmar
          si no se cierra pasa a la siguiente funcion  */

          closeOnCancel: response.alert.closeOnCancel
/* cerrar ventana cuando se preciona el boton cancelar
          si no se cierra pasa a la siguiente funcion  */
        }

);

}
/*fin de alerta*/


/* refresca la pagina si existe la propiedad*/
if(response.hasOwnProperty('refresh')){
if(response.refresh=='true'){
location.reload();
}}

/*recorre la propiedad del objeto
actualiza en diferentes respuestas
*/

// if((showMod!=null) ||  (showMod!='')){
// $('#'+showMod).modal('show');
// }


if(response.hasOwnProperty('respuesta')){
if(response.respuesta.hasOwnProperty('div')){


for (indice in response.respuesta.div) {
// document.querySelector(response.respuesta.div[indice]).innerHTML = response.respuesta.contenido[indice];

// identifica todos los nodos que resiviran la misma respuesta
var elemento = document.querySelectorAll(response.respuesta.div[indice]);
for(var i = 0, total = elemento.length; i < total; i++){
console.log(response.respuesta.div[indice]);
elemento[i].innerHTML = response.respuesta.contenido[indice];
}

}
// fin de for
}}
// fin de if
// 


if(response.hasOwnProperty('hidemod')){
if((response.hidemod!=null) || response.hidemod!=''){
$('#'+response.hidemod).modal('hide');
}
}


if(response.hasOwnProperty('showmod')){
if((response.showmod!=null) || response.showmod!=''){
$('#'+response.showmod).modal('show');
}
}




}


