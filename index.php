<?php
//Configuracion globales por defecto.
require_once "config/globals.php";
//Controlador basico.
require_once "core/BasicController.php";
// Funciones para el controlador frontal.
require_once 'core/FrontControllerAdm.php';
$adminController = new FrontControllerAdministrator();

//Cargamos nuestros controladores y las acciones.
//Se crea un array donde se guardaran los datos de los metodos
//para pasarselo a las vistas.
$dataToView["data"] = array();

if (isset($_GET['controller'])) {
  $objController = $adminController->loadController($_GET['controller']);
  $dataToView["data"] = $adminController->launchAction($objController);
} else {
  $objController = $adminController->loadController(DEFAULT_CONTROLLER);
  $dataToView["data"] = $adminController->launchAction($objController);
}




//Cargamos las vistas.
require_once "view/" . $objController->view . ".php";
