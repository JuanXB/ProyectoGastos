<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>list</title>
</head>

<body>
  <?php if (isset($dataToView["data"])) $allExpenses = $dataToView["data"]; ?>
  <h1>list</h1>
  <?php
  if (!empty($allExpenses)) {
  ?>
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
        foreach ($allExpenses as $expense) {
        ?>
          <tr>
            <td><?php echo $expense->category; ?></td>
            <td><?php echo $expense->amount; ?></td>
            <td><?php echo $expense->details; ?></td>
            <td><?php echo $expense->expensesDate; ?></td>
            <td><a href="index.php?controller=Expenses&action=modify&id=<?php echo $expense->id; ?>&view=list">Modificar</a></td>
            <td><a href="index.php?controller=Expenses&action=delete&id=<?php echo $expense->id; ?>&view=list">Borrar</a></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  <?php
  }
  ?>
</body>

</html>