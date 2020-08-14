<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Sortable - Connect lists</title>
  <link rel="stylesheet" href="jquery-ui.css">
  <style>
  #sortable1, #sortable2 {
    border: 1px solid #eee;
    width: 142px;
    min-height: 20px;
    list-style-type: none;
    margin: 0;
    padding: 5px 0 0 0;
    float: left;
    margin-right: 10px;
  }
  #sortable1 li, #sortable2 li {
    margin: 0 5px 5px 5px;
    padding: 5px;
    font-size: 1.2em;
    width: 120px;
  }


  </style>
  <script src="jquery.js"></script>
  <script src="jquery-ui.js"></script>
  <script>
  $( function() {
    $( ".connectedSortable" ).sortable({
    connectWith: ".connectedSortable", //clase donde estan los que se pueden seleccionar
    handle: "", // de donde se pueden agarrar
    cancel: "" ,//la clase que no se puede seleccionar
    placeholder: "" //clase cuando esta seleccionado
    }).disableSelection();



  } );
  </script>
</head>
<body>

<ul id="sortable1" class="connectedSortable">
  <li class="no ui-state-default">Item 1</li>
  <li class="ui-state-default">
<br>
  <span style='background: red; padding: 3px;'>aqui es mueve</span>Item 2</li>
  <li class="ui-state-default">Item 3</li>
  <li class="ui-state-default">Item 4</li>
  <li class="ui-state-default">Item 5</li>
</ul>

<ul id="sortable2" class="connectedSortable">
  <li class="ui-state-highlight">Item 1</li>
  <li class="ui-state-highlight">Item 2</li>
  <li class="ui-state-highlight">Item 3</li>
  <li class="ui-state-highlight">Item 4</li>
  <li class="ui-state-highlight">Item 5</li>
</ul>


</body>




</html>