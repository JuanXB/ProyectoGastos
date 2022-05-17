<?php
if (isset($dataToView["data"])) $matchingExpenses = $dataToView["data"];
?>
<form action="index.php?controller=Expenses&action=search" class="formSearch" method="POST">

  <input type="text" name="dataSearch" class="inputSearch" autofocus require>
  <input type="submit" value="Buscar" class="buttomSearch">
</form>
<?php
if (!empty($matchingExpenses)) {
?>
  <div class="contenedorTabla">
    <table>
      <thead>
        <caption>Gastos</caption>
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
        foreach ($matchingExpenses as $expense) {

        ?>
          <tr>
            <td><?php echo $expense->category; ?></td>
            <td><?php echo $expense->amount; ?></td>
            <td><?php echo $expense->details; ?></td>
            <td><?php echo $Controller->expenses->changeFormatDateForView($expense->expensesDate); ?></td>
            <td>
              <div class="btmEdit"><a href="index.php?controller=Expenses&action=modify&id=<?php echo $expense->id; ?>&view=search">Editar</a></div>
            </td>
            <td>
              <div>
                <a href="index.php?controller=Expenses&action=confirmDelete&id=<?php echo $expense->id; ?>&view=search">Borrar</a>
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