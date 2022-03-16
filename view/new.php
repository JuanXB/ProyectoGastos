<?php
$save = false;
if (isset($dataToView["data"])) $save = $dataToView["data"]; ?>
<form action="index.php?controller=Expenses&action=new" class="formNew" method="POST">
  Categoria: <input type="text" name="category" class="inputCategory" require>
  Coste $:<input type="number" name="amount" class="inputAmount" require>
  Descripción: <textarea name="details" class="inputDetails" cols="30" rows="10" maxlength="400" placeholder="Maximo 400 caracteres"></textarea>
  Fecha:<input type="date" class="inputDate" name="expenseDate">
  <input type="submit" name="enviar" class="inputSend" value="Nuevo gasto">
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