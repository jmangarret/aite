<?php
ini_set("display_errors", 0);
require_once "header.php";
?>	
<h3 class="text-center">
	<a href="index.php"><i class="glyphicon glyphicon-home">Home</i></a>
</h3>

<ul class="nav nav-tabs" role="tablist" id="myTab">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#paso1" role="tab">REGISTRO DE USUARIOS</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#paso2" role="tab">LISTADO DE USUARIOS</a>
  </li>
</ul>
<!-- Pestaña 1 -->
<form name="form1" id="form1" method="post">
<div class="tab-content">
<div class="tab-pane active" id="paso1" role="tabpanel">    
	    <div class="form-group col-xs-12 col-sm-12">
	        <label for="nombre">Nombres * :</label>
	        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre completo" required="required">
	    </div>
	    <div class="form-group col-xs-12 col-sm-12">
	        <label for="telf">Telf * :</label>
	        <input type="text" class="form-control" id="telf" name="telf" placeholder="Num. de Telf." required="required">
	    </div>
	    <div class="form-group col-xs-12 col-sm-12">
	        <label for="email">Email: </label>
	        <input type="email" class="form-control" id="email" name="email" placeholder="Correo eletronico xxxxx@dominio.com" >
	    </div>
	    <div class="form-group col-xs-12 col-sm-12" id="amigos"><!-- Espacio para listar check amigos con jquery --></div>    
	    <div class="col-xs-12 col-sm-12 text-center">
	        <input type="submit" name="enviar" id="enviar" class="btn btn-primary" value="Guardar" >
	    </div>    	    
</div>
</form>
<!-- Pestaña 2 -->
<div class="tab-pane" id="paso2" role="tabpanel">
<div class="col-xs-12 col-md-12 col-centered box-content">
	<div class="col-xs-12 col-sm-12" id="listado"><!-- Espacio para listar usuarios con jquery --></div>
	<div class="col-xs-12 col-sm-12 text-center">
	    <input type="button" name="eliminar" id="eliminar" class="btn btn-danger" value="Eliminar Todo" >
	</div>
</div>
</div>

</div>
<?php
include_once("footer.php");
?>