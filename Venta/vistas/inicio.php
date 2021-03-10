<?php
session_start();

if(isset($_SESSION['usuario']))
{

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <?php require_once "menu.php" ?>
</body>
</html>
<?php
}
else
{
    header("location: ../index.php");
}
?>