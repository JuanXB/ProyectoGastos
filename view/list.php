<?php if (isset($dataToView["data"])) $allExpenses = $dataToView["data"]; ?>

<?php
if (!empty($allExpenses)) {
?>
  <div class="contenedorTabla">
    <table>
      <caption>Lista de gastos</caption>
      <thead>

        <tr>
          <th>Categoria</th>
          <th>Importe</th>
          <th>Detalles</th>
          <th>Fecha</th>
          <th colspan="2">Editar</th>

        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($allExpenses as $expense) {
        ?>
          <tr>
            <td><?php echo $expense->category; ?></td>
            <td><?php echo "$" . $expense->amount; ?></td>
            <td>
              <p><?php echo $expense->details; ?></p>
            </td>
            <td><?php echo  $Controller->expenses->changeFormatDateForView($expense->expensesDate); ?></td>
            <td>
              <div class="btmEdit">
                <a href="index.php?controller=Expenses&action=modify&id=<?php echo $expense->id; ?>&view=list">Editar</a>
              </div>
            </td>
            <td>
              <div class="btmDelete">
                <input type="button" id="btmDelete" class="btmDelete" value="Borrar">
              </div>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
  <form action="index.php?controller=Expenses&action=delete&id=<?php echo $expense->id; ?>&view=list" id="confirm" style="display: none;">
    <div class="confirm">
      <b>¿Seguro que desea borrar este gasto?</b>
      <p><?php echo $expense->category; ?></p>
    </div>
    <input type="button" value="Borrar" class="btmDelete">
    <a href="index.php?controller=Expenses&action=list" id="cancel">Cancelar</a>
  </form>

<?php
}
?>
<script type="text/javascript">
  $(document).ready(function() {
    $("#btmDelete").on("click", function() {
      $("#confirm").fadeIn("slow");
    });
    $("#cancel").on("click", function() {
      $("#confirm").fadeOut("slow");
    });
  });
</script>