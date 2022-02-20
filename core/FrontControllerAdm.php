<?php
//Esta clase contiene metodo que ayudan al Front Controller 
// a manejar los controladores y las acciones.
class FrontControllerAdministrator
{

  //Carga la clase del controlador que se pasa como argumento.
  public function loadController($controller)
  {
    //Crear nombre del fichero controlador.
    $controller = ucwords($controller) . 'Controller';
    //Ruta del controlador.
    $strFileController = 'controller/' . $controller . '.php';

    if (!is_file($strFileController)) {
      $strFileController = 'controller/' . ucwords(DEFAULT_CONTROLLER) . 'Controller';
    }

    //Se llama al archivo del controlador.
    require_once $strFileController;
    $objController = new $controller();

    return $objController;
  }


  //Carga el metodo del controlador que se pasa
  // por la variable $action.
  private function loadAction($objController, $action)
  {
    $controllerMethod = $action;
    $objController->$controllerMethod();
  }


  //Lanza la peticion para cargar el metodo del controlador,
  //si el metodo no existe carga el definido en globals.php
  public function launchAction($objController)
  {

    if (isset($_GET['action']) && method_exists($objController,  $_GET['action'])) {
      $this->loadAction($objController,  $_GET['action']);
    } else {
      $this->loadAction($objController, DEFAULT_ACTION);
    }
  }

  //Crea la url que redrije a la vista.
  public function viewRequired($vista)
  {

    require_once 'view/' . $vista . '.php';
  }
}
