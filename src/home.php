<?php 
session_start(); 
if (! isset($_SESSION["user"])) { 
header("Location: index.php"); 
exit();  
} 
?> 

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Bem-vindo</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="welcome-container"> 
            <h2>Bem-vindo, <?php echo $_SESSION["user"]; ?>!</h2> 
            <a href="logout.php">Sair</a>
        </div>
    </body>
</html>