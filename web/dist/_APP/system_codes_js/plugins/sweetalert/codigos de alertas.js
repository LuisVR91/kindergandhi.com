 
// un mensaje basico  con solo titulo 
 swal("Titulo");

// un mensaje basico  titulo  y texto secundario
  swal("Here's a message!", "It's pretty, isn't it? pretty, isn't it? pretty, isn't it? pretty, isn't it? pretty, isn't it? pretty, isn't it? pretty, isn't it? pretty, isn't it? pretty, isn't it? pretty, isn't it? pretty, isn't it? pretty, isn't it?")

   swal("Good job!", "You clicked the button!", "success");


/*MEnsaje c*/
   
type: "info",
type: "success",
type: "warning",
type: "error", 

type: "input",
inputPlaceholder: "Write something"

// funcion cuando el type es input
 function (inputValue) {

          if (inputValue === false) return false;
          /*si el input no tiene informacion manda un error
al retornar false no avansa en la funcion
          */
          if (inputValue === "") {
            swal.showInputError("agregar informacion!");
            return false
          }

          swal("Nice!", "You wrote: " + inputValue, "success");

        }




    swal({

          title: "Are you sure?",
          text: "You will not be able to recover this imaginary file!",

          imageUrl: 'hola.jpg',
          /* imagen que lleva la ventana */
          type: "warning",
          
          
          showCancelButton: true, 
          /* mostrar boton de cancelar  */
          showConfirmButton: true, 
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
        },

/* si se preciona el boton confirmar */
        function(isConfirm){
          if (isConfirm){
          	// si se pulsa el boton confirmar
            swal("Deleted!", "Your imaginary file has been deleted!", "success");
          } else {
          	 // si se pulsa el boton cancelar

            swal("Cancelled", "Your imaginary file is safe :)", "error");
          }
        }

        );



