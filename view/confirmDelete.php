<?php
if (isset($dataToView["data"])) $expense = $dataToView["data"];
$id = $expense->id;

?>
<form action="index.php?controller=Expenses&action=delete&id='<?php echo $id; ?>'&view=<?php echo $Controller->redirectView; ?>" method="POST" class="formModify">
  <div>
    <b>¿Seguro que desea borrar este gasto?</b>
    <p><?php echo $expense->category . "-" . $expense->details; ?></p>
  </div>
  <input type="submit" value="Borrar" class="btmDelete">
  <a href="index.php?controller=Expenses&action=list">Cancelar</a>
</form>