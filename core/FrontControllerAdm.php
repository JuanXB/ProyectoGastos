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
      $strFileController = 'controller/' . ucwords(DEFAULT_DRIVER) . 'Controller';
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
    $method = $_GET['action'];
    if (isset($method) && method_exists($objController, $method)) {
      $this->loadAction($objController, $method);
    } else {
      $this->loadAction($objController, DEFAULT_ACTION);
    }
  }
}
