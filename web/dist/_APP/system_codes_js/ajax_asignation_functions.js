

// funcion a todos los formularios

function asignaciones(){

$(".select2").off('change');

modSelect2();
mod_addEnd_Select2();



// $("textarea").off('hover',areglodeatuo);
// $("textarea").hover(areglodeatuo);



$("textarea").off('each',resize);
$("textarea").each(resize);



// autosize.js
// autosize($('textarea'));

// jquery.autosize.js
/*$('textarea').autosize();*/



$("[seleccion='mod2']").off('change',selectMod2);
$("[seleccion='mod2']").change(selectMod2);
// var elemento = document.querySelectorAll("[seleccion='mod2']");
// for(var i = 0, total = elemento.length; i < total; i++){
// elemento[i].addEventListener("change", selectMod2);
// }



$("[unidadmedida]").off('keyup',unidadmedida);
$("[unidadmedida]").keyup(unidadmedida);
// var elemento = document.querySelectorAll("[unidadmedida]");
// for(var i = 0, total = elemento.length; i < total; i++){
// elemento[i].addEventListener("keyup", unidadmedida);
// }


$("[seleccion='addClassOption']").off('change',addClassOption);
$("[seleccion='addClassOption']").change(addClassOption);
// var elemento = document.querySelectorAll("[seleccion='addClassOption']");
// for(var i = 0, total = elemento.length; i < total; i++){
// elemento[i].addEventListener("change", addClassOption);
// }
// 
$("[seleccion='updateClassOption']").off('change',updateClassOption);
$("[seleccion='updateClassOption']").change(updateClassOption);
// var elemento = document.querySelectorAll("[seleccion='addClassOption']");
// for(var i = 0, total = elemento.length; i < total; i++){
// elemento[i].addEventListener("change", addClassOption);
// }

$("[updateKey]").off('change',updateKey);
$("[updateKey]").change(updateKey);
// var elemento = document.querySelectorAll("[updateKey]");
// for(var i = 0, total = elemento.length; i < total; i++){
// elemento[i].addEventListener("change", updateKey);
// }

$("[verImg]").off('change',verImg);
$("[verImg]").change(verImg);
// var elemento = document.querySelectorAll("[verImg]");
// for(var i = 0, total = elemento.length; i < total; i++){
// elemento[i].addEventListener("change", verImg);
// }


$("[form0]").off('submit',form0);
$("[form0]").submit(form0);
// var elemento = document.querySelectorAll("[form0]");
// for(var i = 0, total = elemento.length; i < total; i++){
// elemento[i].addEventListener("submit",form0);
// }


$("[form01]").off('submit',form01);
$("[form01]").submit(form01);
// var elemento = document.querySelectorAll("[form01]");
// for(var i = 0, total = elemento.length; i < total; i++){
// elemento[i].addEventListener("submit",form01);
// }



$("[seleccion='mod1']").off('change',selectMod1);
$("[seleccion='mod1']").change(selectMod1);
// var elemento = document.querySelectorAll("[seleccion='mod1']");
// for(var i = 0, total = elemento.length; i < total; i++){
// elemento[i].addEventListener("change", selectMod1);
// }



$("[dell='image']").off('click',dellIMG);
$("[dell='image']").click(dellIMG);
// var elemento = document.querySelectorAll("[dell='image']");
// for(var i = 0, total = elemento.length; i < total; i++){
// elemento[i].addEventListener("click", dellIMG);

$("[dell='idvalor']").off('click',dellidvalor);
$("[dell='idvalor']").click(dellidvalor);
// var elemento = document.querySelectorAll("[dell='image']");
// for(var i = 0, total = elemento.length; i < total; i++){
// elemento[i].addEventListener("click", dellIMG);
// }


$("[dell='div']").off('click',delldiv);
$("[dell='div']").click(delldiv);
// var elemento = document.querySelectorAll("[dell='div']");
// for(var i = 0, total = elemento.length; i < total; i++){
// elemento[i].addEventListener("click", delldiv);
// }

$("[link='mod1_first']").off('click',linkMod1_add_first);
$("[link='mod1_first']").click(linkMod1_add_first);
// var elemento = document.querySelectorAll("[link='mod1_first']");
// for(var i = 0, total = elemento.length; i < total; i++){
// elemento[i].addEventListener("click", linkMod1_add_first);
// }

$("[link='mod1_end']").off('click',linkMod1_add_end);
$("[link='mod1_end']").click(linkMod1_add_end);
// var elemento = document.querySelectorAll("[link='mod1_end']");
// for(var i = 0, total = elemento.length; i < total; i++){
// elemento[i].addEventListener("click", linkMod1_add_end);
// }




$("[link='mod1']").off('click',linkMod1);
$("[link='mod1']").click(linkMod1);
// var elemento = document.querySelectorAll("[link='mod1']");
// for(var i = 0, total = elemento.length; i < total; i++){
// elemento[i].addEventListener("click", linkMod1);
// }

$("[link='mod3']").off('click',linkMod3);
$("[link='mod3']").click(linkMod3);



// var elemento = document.querySelectorAll("[link='mod3']");
// for(var i = 0, total = elemento.length; i < total; i++){
// elemento[i].addEventListener("click", linkMod3);
// }

// $("[calcular]").off('click',calcular);
// $("[calcular]").click(calcular);

$("[calcular]").off('keyup',calcular);
$("[calcular]").keyup(calcular);

// $("[calcular]").off('change',calcular);
// $("[calcular]").change(calcular);

// var elemento = document.querySelectorAll("[calcular]");
// for(var i = 0, total = elemento.length; i < total; i++){
// elemento[i].addEventListener("click", calcular);
// }

$("[activasuma]").off('keyup',suma);
$("[activasuma]").keyup(suma);


$("[activasuma]").off('click',suma);
$("[activasuma]").click(suma);



activasuma();

// var elemento = document.querySelectorAll("[cp]");
// for(var i = 0, total = elemento.length; i < total; i++){
// elemento[i].addEventListener("keyup", calcularcp);
// }


$("[link='mod0']").off('click',linkMod0);
$("[link='mod0']").click(linkMod0);
// var elemento = document.querySelectorAll("[link='mod0']");
// for(var i = 0, total = elemento.length; i < total; i++){
// elemento[i].addEventListener("click", linkMod0);
// }




 $(function() {
    $( ".content-element" ).sortable({

    connectWith: ".content-element", //clase donde estan los que se pueden seleccionar
    handle: ".tomar", // de donde se pueden agarrar
    cancel: "" ,//la clase que no se puede seleccionar
    placeholder: "espacioOrden" ,//clase cuando esta seleccionado
forcePlaceholderSize:true,
distance:20,
 delay:2,
 scrollSpeed:10,
 scrollSensitivity:1,
      helper: "clone",
      cursor: "move"


    }).disableSelection();



  } );


/*fechas*/
  $(function () {
     //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

   $(".select2").select2({

   });

/*
tiene que tener 
 multiple="multiple"*/
  $(".select2.etiquetas").select2({
    language: "es",
   tags : true, 
   tokenSeparators : [','], 
    minimumInputLength: 1

   /*se pone la etiqueta al poner una coma, un espacio*/
 }); 

 $('.select2.ajax').select2({
  language: "es",
   placeholder: 'buscar... ',
        ajax: {
          

/*          url: "system_pages/2_2_php.php" ;,*/

          url: "system_pages/"+$('.select2.ajax').attr("cdeAJAX")+".php" ,

          dataType: 'json',
          delay: 400,

data : function ( params ) {
       return {
        action:$(this).attr("actionAJAX") ,
         q : params.term , // search term
         page : params.page
       };
     },

          processResults: function (data) {
            return {
              results: data
            };
          },
          cache: true
        }, 
          minimumInputLength: 1
      });

      /*  url:"select2prueba.php",*/

 


     $(".timepicker").timepicker({
      showInputs: false
    });

    });





function confirmDatePlugin(pluginConfig) {
  const defaultConfig = {
    confirmIcon: "" ,
    confirmText: "OK",
    showAlways: false,
    theme: "light"
  };

  const config = {};
  for (let key in defaultConfig) {
    config[key] = pluginConfig && pluginConfig[key] !== undefined 
      ? pluginConfig[key] 
      : defaultConfig[key];
  }

  return function(fp) {
    const hooks = {
      onKeyDown (_, __, ___, e) {
        if (fp.config.enableTime && e.key === "Tab" && e.target === fp.amPM) {
          e.preventDefault();
          fp.confirmContainer.focus();
        }

        else if (e.key === "Enter" && e.target === fp.confirmContainer)
          fp.close();
      },

      onReady () {
        if (fp.calendarContainer === undefined)
          return;

        fp.confirmContainer = fp._createElement(
          "div", 
          `flatpickr-confirm ${config.showAlways ? "visible" : ""} ${config.theme}Theme`, 
          config.confirmText
        );

        fp.confirmContainer.tabIndex = -1;
        fp.confirmContainer.innerHTML += config.confirmIcon;

        fp.confirmContainer.addEventListener("click", fp.close);
        fp.calendarContainer.appendChild(fp.confirmContainer);
      }
    };

    if (!config.showAlways)
      hooks.onChange = function(dateObj, dateStr) {
        const showCondition = fp.config.enableTime || fp.config.mode === "multiple";
        if(dateStr && !fp.config.inline && showCondition)
          return fp.confirmContainer.classList.add("visible");
        fp.confirmContainer.classList.remove("visible");
      }

    return hooks;
  }
}

if (typeof module !== "undefined")
  module.exports = confirmDatePlugin;


$(".fechas").off('flatpickr');

$(".fechas").flatpickr({

    showAlways: false,
    plugins: [new confirmDatePlugin({})],
    confirmText: "OK"


});

$(function () {
    /*$("#example1").DataTable();
*/
    $('#tabla1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
     $('#tabla2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });



 




 
}

asignaciones();
scripts();

