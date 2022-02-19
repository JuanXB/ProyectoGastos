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

  //TODO: hacer que las variables sean llamadas desde la pagina
  // y no desde la clase para que no aparezcan como "not used".
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

    if (isset($_POST['dataSearch']) && $_POST['dataSearch'] != "") {
      $data = new ExpensesModel($this->adapter);
      $data = $data->searchExpenses($_POST['dataSearch']);


      if ($data) {
        foreach ($data as $row) {
          echo $row->category,
          $row->amount,
          $row->expensesDate,
          $row->details;
          echo "<br>";
        }
      }
    }
  }

  public function new()
  {

    $actionForm = $this->createUrl(DEFAULT_DRIVER, 'new');
    require "view/new.php";

    if (
      isset($_POST['category']) && $_POST['category'] != "" &&
      isset($_POST['amount']) && $_POST['amount'] != ""
    ) {

      $expense = new Expenses($this->adapter);
      $expense->setCategory($_POST['category']);
      $expense->setAmount($_POST['amount']);
      $expense->setDetails($_POST['details']);
      $expense->setDate($_POST['expenseDate']);
      $save = $expense->save();
      if ($save) {
        echo "Gasto agregado con exito";
      }
    }
    require "view/new.php";
  }

  public function list()
  {
    require "view/list.php";
  }
}
