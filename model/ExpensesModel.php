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
    $amountExpenses = $expenses->num_rows();

    return $amountExpenses;
  }

  public function searchExpenses($data)
  {
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
}
