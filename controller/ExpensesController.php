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
    return $this->expenses->amountOfExpenses();
  }

  public function search()
  {
    $this->view = 'search';
    if (isset($_POST['dataSearch']) && $_POST['dataSearch'] != "") {

      $matchingExpenses = $this->expenses->searchExpenses($_POST['dataSearch']);

      return $matchingExpenses;
    } else {
      return $matchingExpenses = array();
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
      return $save;
    }
  }

  public function list()
  {
    $this->view = 'list';
    return  $this->expenses->getAll();
  }

  public function delete()
  {

    if (isset($_GET['id']) && $_GET['id'] != "") {
      $query = $this->expenses->deleteById($_GET['id']);
      $this->expenses->runSql($query);
    }

    if ($_GET['view'] == 'search') {
      $this->view = 'search';
      //TODO: hacer que devuelva el array 
      //con el ultimo input que se uso.
      return  array();
    }

    if ($_GET['view'] == 'list') {
      $this->view = 'list';
      return $this->expenses->getAll();
    }
  }


  public function modify()
  {
    $this->view = 'modify';
    if (isset($_GET['id'])) {
      return $this->expenses->getById($_GET['id']);
    }
  }

  public function edit()
  {

    if (
      isset($_POST['category']) && $_POST['category'] != "" &&
      isset($_POST['amount']) && $_POST['amount'] != ""
    ) {

      $modifiedSpending = new Expenses($this->adapter);
      $modifiedSpending->setId($_GET['id']);
      $modifiedSpending->setCategory($_POST['category']);
      $modifiedSpending->setAmount($_POST['amount']);
      $modifiedSpending->setDetails($_POST['details']);
      $modifiedSpending->setDate($_POST['expenseDate']);

      $this->expenses->editExpense($modifiedSpending);
    }
    if ($_GET['view'] == 'search') {
      $this->view = 'search';
      //TODO: hacer que devuelva el array 
      //con el ultimo input que se uso.
      return  array();
    }

    if ($_GET['view'] == 'list') {
      $this->view = 'list';
      return $this->expenses->getAll();
    }
  }
}
