<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>new</title>
</head>

<body>
  <h1>new</h1>
  <form action="<?php echo $actionForm ?>" method="POST">
    Categoria: <input type="text" name="category">
    Cantidad de dinero<input type="number" name="amount">
    Descripción: <textarea name="details" id="" cols="30" rows="10"></textarea>
    Fecha:<input type="date" name="expenseDate">
    <input type="submit" name="enviar" value="Nuevo gasto">
  </form>
</body>

</html>