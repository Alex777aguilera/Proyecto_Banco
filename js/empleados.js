$(document).ready(function(){
  $('#txtIdentidad').mask('0000-0000-00000');
});

function revisarCampos()
{
	if (document.getElementById("txtIdentidad").value == "") {
        alert("Por favor, ingrese su número de identidad.");
        document.getElementById("txtIdentidad").focus();
	} else if (document.getElementById("txtNombre").value == "") {
        alert("Por favor, ingrese su nombre.");
        document.getElementById("txtNombre").focus();
    } else if (document.getElementById("txtApellido").value == "") {
        alert("Por favor, ingrese su Apellido.");
        document.getElementById("txtApellido").focus();
    } else if (document.getElementById("txtDireccion").value == "") {
        alert("Por favor, ingrese su dirección completa.");
        document.getElementById("txtDireccion").focus();
    } else if (document.getElementById("cbxGenero").value == "") {
        alert("Por favor, seleccione su Género.");
        document.getElementById("cbxGenero").focus();
    } else if (document.getElementById("cbxCargo").value == "") {
        alert("Por favor, seleccione su Cargo a emplear.");
        document.getElementById("cbxCargo").focus();
    } else if (document.getElementById("txtFechaEdad").value == "") {
        alert("Por favor, escriba su fecha de nacimiento.");
        document.getElementById("txtFechaEdad").focus();
    } else {
    	getFechaEdad();
        document.getElementById("accion").value = "insertar";
        document.getElementById("formulario").submit();
    }
    return false;
}

function rcModBuscar(){
    if (document.getElementById("txtIdentidad_search").value == "") {
        alert("Por favor, ingrese un número de identidad válido.");
        document.getElementById("txtIdentidad_search").focus();
    } else {
        document.getElementById("accion").value = "buscar";
        document.getElementById("form").submit();
    }
}

////Formulario de Modificar
//Botón de actualización
function modActualizar(){
    if (document.getElementById("txtIdentidad").value == "") {
        alert("Por favor, ingrese su número de identidad.");
        document.getElementById("txtIdentidad").focus();
    } else if (document.getElementById("txtNombre").value == "") {
        alert("Por favor, ingrese su nombre.");
        document.getElementById("txtNombre").focus();
    } else if (document.getElementById("txtApellido").value == "") {
        alert("Por favor, ingrese su Apellido.");
        document.getElementById("txtApellido").focus();
    } else if (document.getElementById("txtDireccion").value == "") {
        alert("Por favor, ingrese su dirección completa.");
        document.getElementById("txtDireccion").focus();
    } else if (document.getElementById("cbxGenero").value == "") {
        alert("Por favor, seleccione su Género.");
        document.getElementById("cbxGenero").focus();
    } else if (document.getElementById("cbxCargo").value == "") {
        alert("Por favor, seleccione su Cargo a emplear.");
        document.getElementById("cbxCargo").focus();
    } else if (document.getElementById("txtEdad").value == "") {
        alert("Por favor, escriba su Edad.");
        document.getElementById("txtEdad").focus();
    } else {
        document.getElementById("accion").value = "actualizar";
        document.getElementById("formulario").submit();
    }
    return false;
}

function modEliminar(){
    if (confirm("Este registro se eliminará para siempre. ¿Desea eliminarlo por completo?")) {
        document.getElementById("accion").value = "eliminar";
        document.getElementById("formulario").submit();
    } else {
       console.log('Operación abortada.'); 
    }
}

function getFechaEdad(){
	var fecha = document.getElementById("txtFechaEdad").value;
	/*
	var year = fecha.substring(6,10);
	alert(year);
	*/
	var newfecha = new Date(fecha);
	var diff = Math.abs(new Date() - newfecha);
	var edad_year = convertmili(diff);
	document.getElementById("edad").value = edad_year;
}

function convertmili(ms)
{
    var checkYear = Math.floor(ms / 31536000000);
    return checkYear;
}