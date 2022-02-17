<?php
//Configuracion globales por defecto.
require_once "config/globals.php";
//Controlador basico.
require_once "core/BasicController.php";
// Funciones para el controlador frontal.
require_once "core/FrontControllerAdm.php";
$adminController = new FrontControllerAdministrator();

//Cargamos nuestros controladores y las acciones.

if (isset($_GET['controller'])) {
  $objController = $adminController->loadController($_GET['controller']);
  $adminController->launchAction($objController);
} else {
  $objController = $adminController->loadController(DEFAULT_DRIVER);
  $adminController->launchAction($objController);
}
