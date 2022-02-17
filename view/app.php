<?php
include("inc_header.php");


echo "<h1>
         Bienvenido a mi contabilidad doméstica<br>
         Actualmente hay $amountExpenses anotaciones
         </h1>";
?>
<div class="option">
  <a href="<?php echo $urlSearch ?>" &id="search">Buscar</a>
  <a href="<?php echo $urlNew ?>" &id="new">Nuevo gasto</a>
  <a href="<?php echo $urlList ?>" &id="list">Lista de gastos</a>

</div>

<?php
include("inc_footer.php");
