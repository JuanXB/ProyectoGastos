<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/app.css">
  <title><?php echo $objController->titlePage; ?></title>
</head>

<body>
  <?php
  $amountExpenses = $objController->header();
  ?>
  <div class="contenedor">
    <header>
      <h1 class="tituloApp">Aplicacion para administración de gastos</h1>
      <h2>Cantidad de Gastos almacenados <?php echo $amountExpenses ?> </h2>
    </header>
    <div class="option">
      <a href="index.php?controller=Expenses&action=search" id="search">Buscar gasto</a>
      <a href="index.php?controller=Expenses&action=new" id="new">Nuevo gasto</a>
      <a href="index.php?controller=Expenses&action=list" id="list">Lista de gastos</a>

    </div>