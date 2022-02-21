<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  $amountExpenses = "0";
  if (isset($dataToView["data"])) $amountExpenses = $dataToView["data"];

  echo "<h1>
         Bienvenido a mi contabilidad doméstica<br>
         Actualmente hay $amountExpenses anotaciones
         </h1>";

  ?>
  <div class="option">
    <a href="index.php?controller=Expenses&action=search" id="search">Buscar</a>
    <a href="index.php?controller=Expenses&action=new" id="new">Nuevo gasto</a>
    <a href="index.php?controller=Expenses&action=list" id="list">Lista de gastos</a>

  </div>
</body>

</html>