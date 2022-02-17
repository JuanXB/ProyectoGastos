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
    $amount = count($this->getAll());

    return $amount;
  }
}
