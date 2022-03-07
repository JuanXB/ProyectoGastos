<?php
if (isset($dataToView["data"])) $expense = $dataToView["data"];
$id = $expense->id;
?>
<form action="index.php?controller=Expenses&action=edit&id='<?php echo $id; ?>'&view='<?php echo $id; ?>'" method="POST">
  Categoria: <input type="text" placeholder="<?php echo $expense->category; ?>" name="category">
  Cantidad de dinero<input type="number" placeholder="<?php echo $expense->amount; ?>" name="amount">
  Descripción: <textarea name="details" placeholder="<?php echo $expense->details; ?>" id="" cols="30" rows="10"></textarea>
  Fecha:<input type="date" placeholder="<?php echo $expense->expensesDate; ?>" name="expenseDate">
  <input type="submit" name="enviar" value="Modificar datos gasto">
</form>
</body>

</html>