<?php
if (isset($dataToView["data"])) $expense = $dataToView["data"];
$id = $expense->id;

?>
<div class="confirmDelete">
  <b>¿Seguro que desea borrar este gasto?</b>
  <p><?php echo $expense->category . "-" . $expense->details; ?></p>

  <div class="btmDelete">
    <a href="index.php?controller=Expenses&action=delete&id='<?php echo $id; ?>' &view=<?php echo $Controller->redirectView; ?>">Borrar</a>
  </div>
  <a href=" index.php?controller=Expenses&action=<?php echo $Controller->redirectView; ?>" class="cancelDelete">Cancelar</a>
</div>