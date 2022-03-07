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
    $amountExpenses = $objController->header();
    ?>

   <header>
     <h1>Cantidad de anotaciones de Gastos <?php echo $amountExpenses ?> </h1>
   </header>