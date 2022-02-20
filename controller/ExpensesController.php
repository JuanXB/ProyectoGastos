<?php

class ExpensesController extends BasicController
{
  public $connect;
  public $adapter;
  public $expenses;
  public $view;

  public function __construct()
  {
    parent::__construct();
    $this->connect = new Connect();
    $this->adapter = $this->connect->conexion();
    $this->expenses = new ExpensesModel($this->adapter);
    $this->view = DEFAULT_ACTION;
  }

  //TODO: hacer que las variables sean llamadas desde la pagina
  // y no desde la clase para que no aparezcan como "not used".
  public function app()
  { //Se establece cual es el nombre de la vista.
    $this->view = "app";

    //Se calcula la cantidad de gastos.
    $amountExpenses = $this->expenses->amountOfExpenses();
    return $amountExpenses;
  }

  public function search()
  {
    $this->view = 'search';

    if (isset($_POST['dataSearch']) && $_POST['dataSearch'] != "") {

      $data = $this->expenses->searchExpenses($_POST['dataSearch']);


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
    $this->view = 'new';
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
  }

  public function list()
  {
    $this->view = 'list';
  }
}
