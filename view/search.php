<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>search</title>
</head>

<body>
  <?php
  if (isset($dataToView["data"])) $matchingExpenses = $dataToView["data"];
  ?>
  <h1>search</h1>
  <form action="index.php?controller=Expenses&action=search" class="search" method="POST">
    <input type="text" name="dataSearch" require>
    <input type="submit" value="Buscar">
  </form>
  <?php
  if (!empty($matchingExpenses)) {
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
        foreach ($matchingExpenses as $expense) {
        ?>
          <tr>
            <td><?php echo $expense->category ?></td>
            <td><?php echo $expense->amount ?></td>
            <td><?php echo $expense->expensesDate ?></td>
            <td><?php echo $expense->details ?></td>
            <td><a href="">Modificar</a></td>
            <td><a href="index.php?controller=Expenses&action=delete&id=<?php echo $expense->id; ?>&view=search">Borrar</a></td>
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