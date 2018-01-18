/*Click al seleccionar pestaña*/
$('#myTab a').click(function (e) {
  	e.preventDefault();
  	$(this).tab('show');
});
/*Function para pasar de una pestaña otra  */
var siguiente=function(pasoSiguiente){    
	var tab='#myTab a[href="#'+pasoSiguiente+'"]';
	$(tab).trigger('click');
};
/*Registro de usuario y lista*/
$("#form1").submit(function(e) {
	var formdata = $(this).serialize();
	listaUsuarios(formdata);
	siguiente("paso2");
	$(this)[0].reset();
	e.preventDefault();
});
/*Eliminar Todo*/
$("#eliminar").click(function(){
	var confirma = confirm("Seguro desea eliminar toda la data?");
	if (confirma){
		$.ajax({
		    url : 'ajaxEliminarTodo.php',
		    dataType : 'html',
		    success : function(response) {
		    	alert(response);
		        listaUsuarios();
		        $("#form1")[0].reset();
		        siguiente("paso1");
		    },		 
		});		
	}
});
/*Carga de usuarios*/
var listaUsuarios=function(formdata){
	$.ajax({
	    url : 'ajaxUsuario.php',
	    data : formdata,
	    type : 'POST',
	    dataType : 'html',
	    success : function(response) {
	    	listaAmigos();
	        $("#listado").html(response);
	    },
	 
	});
}
/*Carga de amigos*/
var listaAmigos=function(){
	$.ajax({
	    url : 'ajaxAmigos.php',
	    dataType : 'html',
	    success : function(response) {
	        $("#amigos").html(response);
	    },
	 
	});
}
//Listar usuarios/amigos al iniciar
listaUsuarios();
