<?php 
/* *******************************
 *
 * Developer by FelipheGomez
 *
 * Git: https://github.com/Feliphegomez/crm-crud-api-php
 * *******************************
 */

//FUNCIONES PARA EL CONTROLADOR FRONTAL
 
function cargarControlador($controller){
    $controlador=ucwords($controller).'Controller';
    $strFileController = folder_admin . '/modules/'.ucwords($controller).'/'.$controlador.'.php';
     
    if(!is_file($strFileController)){
        echo $strFileController = folder_admin . '/modules/'.ucwords(CONTROLADOR_DEFECTO).'/'.ucwords(CONTROLADOR_DEFECTO).'Controller.php';
    }
	if(@file_exists($strFileController)){		
		require_once $strFileController;
		$controllerObj = new $controlador();
		return $controllerObj;
	}
}
 
function cargarAccion($controllerObj,$action){
    $accion=$action;
    $controllerObj->$accion();
}
 
function lanzarAccion($controllerObj){
    if(isset($_GET["action"]) && method_exists($controllerObj, $_GET["action"])){
        cargarAccion($controllerObj, $_GET["action"]);
    }else{
        cargarAccion($controllerObj, ACCION_DEFECTO);
    }
}
 
