<?php

class ExpensesController extends BasicController
{
  public $connect;
  public $adapter;
  public $expenses;
  public $view;
  public $redirectView;
  public $titlePage;

  public function __construct()
  {
    parent::__construct();
    $this->connect = new Connect();
    $this->adapter = $this->connect->conexion();
    $this->expenses = new ExpensesModel($this->adapter);
    $this->view = DEFAULT_ACTION;
    $this->redirectView = DEFAULT_ACTION;
    $this->titlePage = 'Page';
  }

  public function header()
  {
    //Se calcula la cantidad de gastos.
    $amountExpenses = $this->expenses->amountOfExpenses();

    return $amountExpenses;
  }

  public function app()
  { //Se establece cual es el nombre de la vista.
    $this->view = 'app';
    $this->titlePage = "Menu";
  }

  public function search()
  {
    $this->view = 'search';
    $this->titlePage = "Buscar Gasto";

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
    $this->titlePage = "Nuevo Gasto";

    if (
      isset($_POST['category']) && $_POST['category'] != "" &&
      isset($_POST['amount']) && $_POST['amount'] != ""
    ) {

      $expense = new Expenses($this->adapter);
      $expense->setCategory($_POST['category']);
      $expense->setAmount($_POST['amount']);
      $expense->setDetails($_POST['details']);

      //Se verifica si la fecha a sido especificada ,
      //si no es asi se establece la fecha actual.
      $date = $_POST['expenseDate'];
      if (empty($date)) {
        $date = date('Y/m/d', time());
      }
      $expense->setDate($date);


      $save = $expense->save();
      return $save;
    }
  }

  public function list()
  {
    $this->view = 'list';
    $this->titlePage = "Lista de Gastos";

    return  $this->expenses->getAllByColumDesc("expensesDate");
  }

  public function delete()
  {

    if (isset($_GET['id']) && $_GET['id'] != "") {
      $this->expenses->deleteById($_GET['id']);
    }

    if ($_GET['view'] == 'search') {
      $this->view = 'search';
      $this->titlePage = "Buscar Gasto";

      //TODO: hacer que devuelva el array 
      //con el ultimo input que se uso.
      return  array();
    }

    if ($_GET['view'] == 'list') {
      $this->view = 'list';
      $this->titlePage = "Lista de Gastos";

      return $this->expenses->getAllByColumDesc("expensesDate");
    }
  }


  public function modify()
  {
    $this->view = 'modify';
    $this->redirectView = $_GET['view'];

    if (isset($_GET['id'])) {
      return $this->expenses->getById($_GET['id']);
    }
  }

  public function edit()
  {
    $this->redirectView = $_GET['view'];

    if (
      isset($_POST['category']) && isset($_POST['amount'])
    ) {

      $modifiedSpending = new Expenses($this->adapter);
      $originalExpense = $this->expenses->getById($_GET['id']);


      //Se verifica cuales datos se han modificado,
      //si el dato esta vacio se deja por default el original.
      $modifiedSpending->setId($originalExpense->id);
      $modifiedSpending->setCategory($this->expenses->setDataToModify($originalExpense->category, $_POST['category']));
      $modifiedSpending->setAmount($this->expenses->setDataToModify($originalExpense->amount, $_POST['amount']));
      $modifiedSpending->setDetails($this->expenses->setDataToModify($originalExpense->details, $_POST['details']));
      $modifiedSpending->setDate($this->expenses->setDataToModify($originalExpense->expensesDate, $_POST['expenseDate']));

      //Confirmacion si se modifico. TODO: usarla para cartel de confirmacion.
      $result = $this->expenses->editExpense($modifiedSpending);

      if ($this->redirectView == 'search') {
        $this->view = 'search';
        $this->titlePage = "Buscar Gasto";

        return  array();
      }
      if ($this->redirectView == 'list') {
        $this->view = 'list';
        $this->titlePage = "Lista de Gastos";


        return $this->expenses->getAllByColumDesc("expensesDate");
      }
    }
  }
}
