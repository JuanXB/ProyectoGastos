<?php
class ExpensesController extends BasicController
{
  public $connect;
  public $adapter;

  public function __construct()
  {
    parent::__construct();
    $this->connect = new Connect();
    $this->adapter = $this->connect->conexion();
  }

  public function app()
  {
    //Se calcula la cantidad de gastos.
    $expenses = new ExpensesModel($this->adapter);
    $amountExpenses = $expenses->amountOfExpenses();

    //Se crean url de los botones.
    $urlSearch = $this->createUrl(DEFAULT_DRIVER, "search");
    $urlNew = $this->createUrl(DEFAULT_DRIVER, "new");
    $urlList = $this->createUrl(DEFAULT_DRIVER, "list");

    require_once "view/app.php";
  }

  public function search()
  {
    require "view/search.php";
  }

  public function new()
  {
    require "view/new.php";
  }

  public function list()
  {
    require "view/list.php";
  }
}
