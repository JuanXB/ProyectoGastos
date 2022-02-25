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
    return $this->expensesDate;
  }

  public function setDate($expensesDate)
  {
    $this->expensesDate = $expensesDate;
  }

  public function getDetails()
  {
    return $this->details;
  }

  public function setDetails($details)
  {
    $this->details = $details;
  }

  public function save()
  {

    $category = $this->db()->real_escape_string($this->category);
    $amount = $this->db()->real_escape_string($this->amount);
    $expensesDate = $this->db()->real_escape_string($this->expensesDate);
    $details = $this->db()->real_escape_string($this->details);

    $query = "INSERT INTO expenses(category, amount, expensesDate, details)
              VALUES ('" . $category . "',
                      '" . $amount . "',
                      '" . $expensesDate . "',
                      '" . $details . "');";

    $save = $this->db()->query($query);

    return $save;
  }
}
