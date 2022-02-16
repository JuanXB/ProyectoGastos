<?php
class BasicController
{
  public function __construct()
  {
    require_once "Connect.php";
    require_once "BasicEntity.php";
    require_once "BasicModel.php";

    //Incluir todos los modelos.
    foreach (glob("model/*.php") as $file) {
      require_once $file;
    }
  }

  public function redirect($controller = DEFAULT_DRIVER, $action = DEFAULT_ACTION)
  {
    header("Location:index.php?controller=" . $controller . "&action=" . $action);
  }
}
