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

    $dataCategory = "%$data%";

    $query = "SELECT * FROM $this->table
              WHERE category  LIKE ? 
              ORDER BY expensesDate DESC;";

    $statment = $this->db()->prepare($query);
    $statment->bind_param("s", $dataCategory);
    $statment->execute();
    $result = $statment->get_result();

    $statment->close();


    // if ($row = $result->fetch_assoc()) {
    //   $resultSet = $row;
    // } else {
    while ($row =  $result->fetch_assoc()) {
      $resultSet[] = $row;
    }
    if (!isset($resultSet)) {
      $resultSet = array();
    }
    // }



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
      //Obtencion de datos y escapado de caracteres especiales.
      $id =  $this->db()->real_escape_string($data->getId());
      $category =  $this->db()->real_escape_string($data->getCategory());
      $amount = $this->db()->real_escape_string($data->getAmount());
      $details =  $this->db()->real_escape_string($data->getDetails());
      $expensesDate =  $this->db()->real_escape_string($data->getDate());


      $query = "UPDATE expenses SET category = ? , amount = ? , expensesDate = ? , details = ? WHERE id = ? ;";

      $statment = $this->db()->prepare($query);
      $statment->bind_param("sdssi", $category, $amount, $expensesDate, $details, $id);
      $result = $statment->execute();


      $statment->close();
      return $result;
    }
  }
}
