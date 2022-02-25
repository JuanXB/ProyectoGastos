<?php
class ExpensesModel extends BasicModel
{
  public $table;

  public function __construct($adapter)
  {
    $this->table = "expenses";
    parent::__construct($this->table, $adapter);
  }

  public function amountOfExpenses()
  {
    $expenses = $this->getAll();

    $amountExpenses = count($expenses);

    return $amountExpenses;
  }

  public function searchExpenses($data)
  {
    $data = $this->db()->real_escape_string($data);

    $query = "SELECT * FROM $this->table
              WHERE category  LIKE '%$data%'  OR
              details LIKE '%$data%' 
              ORDER BY expensesDate DESC;";

    $resultSet = $this->runSql($query);

    //Si la consulta se realizo con exito pero
    //no se encontro ningun match se devuelve un array vacio.
    if ($resultSet === true) {
      $resultSet = array();
    }

    return $resultSet;
  }


  public function editExpense($data)
  {
    if (isset($data) && !empty($data)) {
      $id = $this->db()->real_escape_string($data->getId());
      $category =  $this->db()->real_escape_string($data->getCategory());
      $amount =  $this->db()->real_escape_string($data->getAmount());
      $details =  $this->db()->real_escape_string($data->getDetails());
      $expensesDate =  $this->db()->real_escape_string($data->getDate());


      $query = "UPDATE expenses SET category = '$category', amount = '$amount', expensesDate = '$expensesDate', details = '$details' WHERE id = $id ;";
      return $this->runUpdate($query);
    }
  }
}
