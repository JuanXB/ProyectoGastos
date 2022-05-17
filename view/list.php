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
                <a href="index.php?controller=Expenses&action=confirmDelete&id=<?php echo $expense->id; ?>&view=list">Borrar</a>
              </div>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>

<?php
}
?>