<form action="index.php?controller=Expenses&action=delete&id=<?php echo $expense->id; ?>&view=list">
  <div class="confirm">
    <b>¿Seguro que desea borrar este gasto?</b>
    <p><?php echo $expense->category; ?></p>
  </div>
  <input type="button" value="Borrar" class="btmDelete">
  <a href="index.php?controller=Expenses&action=list">Cancelar</a>
</form>