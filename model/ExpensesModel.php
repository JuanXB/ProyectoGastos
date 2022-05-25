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

    $query = "SELECT * FROM expenses WHERE category  LIKE ? OR details LIKE ? ORDER BY expensesDate DESC;";
    $type = 'ss';
    $parameters = array($dataCategory, $dataCategory);

    return $this->runSql($query, $type, $parameters);
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
      $type = 'sdssi';
      $parameters = array($category, $amount, $expensesDate, $details, $id);

      return $this->runSql($query, $type, $parameters);
    }
  }

  public function changeFormatDateForView($date)
  {
    if (isset($date) && !empty($date)) {
      $newDateFormat = new DateTime($date);
      return $newDateFormat->format('d/m/Y');
    }
  }
}
