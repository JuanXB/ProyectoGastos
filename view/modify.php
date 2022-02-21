<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modify</title>
</head>

<body>
  <?php
  if (isset($dataToView["data"])) $expense = $dataToView["data"];
  $id = $expense->id;
  ?>
  <form action="index.php?controller=Expenses&action=edit&id='<?php echo $id; ?>'&view=list" method="POST">
    Categoria: <input type="text" placeholder="<?php echo $expense->category; ?>" name="category">
    Cantidad de dinero<input type="number" placeholder="<?php echo $expense->amount; ?>" name="amount">
    Descripción: <textarea name="details" placeholder="<?php echo $expense->details; ?>" id="" cols="30" rows="10"></textarea>
    Fecha:<input type="date" placeholder="<?php echo $expense->expensesDate; ?>" name="expenseDate">
    <input type="submit" name="enviar" value="Modificar datos gasto">
  </form>
</body>

</html>