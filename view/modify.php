<?php
if (isset($dataToView["data"])) $expense = $dataToView["data"];
$id = $expense->id;

echo $Controller->redirectView;
?>
<form action="index.php?controller=Expenses&action=edit&id='<?php echo $id; ?>'&view=<?php echo $Controller->redirectView; ?>" class="formModify" method="POST">
  Categoria: <input type="text" class="inputCategory" placeholder="<?php echo $expense->category; ?>" name="category">
  Cantidad de dinero<input type="number" class="inputAmount" placeholder="<?php echo $expense->amount; ?>" name="amount">
  Descripción: <textarea name="details" class="inputDetails" placeholder="<?php echo $expense->details; ?>" id="" cols="30" rows="10"></textarea>
  Fecha:<input type="date" class="inputDate" placeholder="<?php echo $expense->expensesDate; ?>" name="expenseDate">
  <input type="submit" name="enviar" class="inputSend" value="Modificar datos gasto">
</form>