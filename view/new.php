<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>new</title>
</head>

<body>
  <?php
  $save = false;
  if (isset($dataToView["data"])) $save = $dataToView["data"]; ?>
  <h1>new</h1>
  <form action="index.php?controller=Expenses&action=new" method="POST">
    Categoria: <input type="text" name="category">
    Cantidad de dinero<input type="number" name="amount">
    Descripción: <textarea name="details" id="" cols="30" rows="10"></textarea>
    Fecha:<input type="date" name="expenseDate">
    <input type="submit" name="enviar" value="Nuevo gasto">
  </form>
  <?php
  if (isset($_POST["submit"])) {
    if ($save) {
      echo "<p>Gasto guadado con exito</p>";
    } else {
      echo "<p>Algo salio mal al intentar guardar el gasto</p>";
    }
  }
  ?>
</body>

</html>