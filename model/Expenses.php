<?php
class Expenses extends BasicEntity
{
  private $id;
  private $category;
  private $amount;
  private $expensesDate;
  private $details;

  public function __construct($adapter)
  {
    $table = "expenses";
    parent::__construct($table, $adapter);
  }

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }


  public function getCategory()
  {
    return $this->category;
  }

  public function setCategory($category)
  {
    $this->category = $category;
  }

  public function getAmount()
  {
    return $this->amount;
  }

  public function setAmount($amount)
  {
    $this->amount = $amount;
  }

  public function getDate()
  {
    return $this->date;
  }

  public function setDate($expensesDate)
  {
    $this->expensesDate = $expensesDate;
  }

  public function getdetails()
  {
    return $this->details;
  }

  public function setdetails($details)
  {
    $this->details = $details;
  }

  public function save()
  {
    $query = "INSERT INTO expenses(category, amount, expensesDate, details)
              VALUES (NULL, '" . $this->category . "',
                            '" . $this->amount . "',
                            '" . $this->expensesDate . "',
                            '" . $this->details . "');";

    $save = $this->db()->query($query);

    return $save;
  }
}
