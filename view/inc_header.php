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
       <nav class="menu">
         <ul>
           <li><a href="index.php?controller=Expenses&action=app">Inicio</a></li>
           <li><a href="index.php?controller=Expenses&action=search">Buscar</a></li>
           <li><a href="index.php?controller=Expenses&action=list">Lista</a></li>
           <li><a href="index.php?controller=Expenses&action=new">Nuevo</a></li>
         </ul>
       </nav>
       <h1>Cantidad de Gastos <?php echo $amountExpenses ?> </h1>
     </header>